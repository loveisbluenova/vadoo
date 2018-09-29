<?php
ob_start('ob_gzhandler');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$user_id=htmlspecialchars($_GET['user-id']);
$status=htmlspecialchars($_GET['status']);
$ip = $_SERVER['REMOTE_ADDR'];

include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
 $session_countrequestprivacy_query="SELECT COUNT(*) FROM buzzyprivacyrequests WHERE buzzyuser_id=$user_id AND buzzyaccepter_id=$session_user_id";
 foreach ($connread->query($session_countrequestprivacy_query) as $row) { 
 $count_requests=$row['COUNT(*)']; 
 if ($count_requests!=0){
 if ($status=='accept'){		 
 $update_acstatus_query = "UPDATE buzzyprivacyrequests SET buzzyprivacyrequest_status=1 WHERE buzzyuser_id=$user_id AND buzzyaccepter_id=$session_user_id";
        $stmt = $connwrite->prepare($update_acstatus_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		
		
$OK = false;
$delete_nots_query = "DELETE FROM buzzynotifications WHERE buzzyuser_id=$session_user_id AND buzzyfriend_id=$user_id AND buzzynotification_type=1";
$stmt = $connwrite->prepare($delete_nots_query);
$stmt->execute();
$OK = $stmt->rowCount();

		
        header('Location: '.$link_prefix.'page.php?user-id='.$session_user_id.'&accepted-access=true');			  				
 }
 else  if ($status=='reject'){	
 
$OK = false; 
$delete_acstatus_query = "DELETE FROM buzzyprivacyrequests WHERE buzzyuser_id=$user_id AND buzzyaccepter_id=$session_user_id";
$stmt = $connwrite->prepare($delete_acstatus_query);
$stmt->execute();
$OK = $stmt->rowCount();
				
$OK = false;
$delete_nots_query = "DELETE FROM buzzynotifications WHERE buzzyuser_id=$session_user_id AND buzzyfriend_id=$user_id AND buzzynotification_type=1";
$stmt = $connwrite->prepare($delete_nots_query);
$stmt->execute();
$OK = $stmt->rowCount();		
    header('Location: '.$link_prefix.'page.php?user-id='.$session_user_id.'&rejected-access=true');			  				
 } 
 }
 else if($count_requests==0){
        header('Location: '.$link_prefix.'page.php?user-id='.$session_user_id.''); 
 }
 }	
