<?php
ob_start('ob_gzhandler');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$ip = $_SERVER['REMOTE_ADDR'];

include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
$sesscountfb_user_query="SELECT COUNT(*) FROM buzzy_oauth_fb_users WHERE email='$session_buzzyuser_email'";
		foreach ($connread->query($sesscountfb_user_query) as $row) { 
	    $count_fb=$row['COUNT(*)'];
		if($count_fb!=0){
		 $update_user_fb_query = "UPDATE buzzyusers SET buzzyuser_fbconfirm=1 WHERE buzzyuser_id=$session_user_id";
         $stmt = $connwrite->prepare($update_user_fb_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	    header('Location: '.$link_prefix.$user_id_url.$_SESSION["buzzyuser_id"].'');		
		}
		
		if($count_fb==0){
	    header('Location: '.$link_prefix.'page.php?user-id='.$_SESSION["buzzyuser_id"].'&no-facebook=true');		
		}		
		}