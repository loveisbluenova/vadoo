<?php
ob_start('ob_gzhandler');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$image_id=htmlspecialchars($_GET['image-id']);
$user_id=htmlspecialchars($_GET['user-id']);
$ip = $_SERVER['REMOTE_ADDR'];

include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
 $session_countrequestprivacy_query="SELECT COUNT(*) FROM buzzyprivacyrequests WHERE buzzyuser_id=$session_user_id AND buzzyaccepter_id=$user_id";
 foreach ($connread->query($session_countrequestprivacy_query) as $row) { 
 $count_requests=$row['COUNT(*)']; 
 if ($count_requests==0){
 $add_requestacc_query = "INSERT INTO buzzyprivacyrequests(buzzyuser_id,buzzyaccepter_id)
		 	  VALUES(:buzzyuser_id,:buzzyaccepter_id)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_requestacc_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_id', $session_user_id, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyaccepter_id', $user_id, PDO::PARAM_STR);
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	

 $add_requestnots_query = "INSERT INTO buzzynotifications(buzzynotification_type,buzzyuser_id,buzzyfriend_id,buzzynotification_status,buzzynotification_timestamp,buzzynotification_alias)
		 	  VALUES(1,:buzzyuser_id,:buzzyfriend_id,0,:buzzynotification_timestamp,'albumrequest')";
        // prepare the statement
        $stmt = $connwrite->prepare($add_requestnots_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_id', $user_id, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyfriend_id', $session_user_id, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynotification_timestamp', $now, PDO::PARAM_STR);		
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
		
        header('Location: '.$link_prefix.'page.php?user-id='.$user_id.'&request-access=true');			  				
 }
 else if($count_requests!=0){
        header('Location: '.$link_prefix.'page.php?user-id='.$user_id.'&requested-access=true'); 
 }
 }	
