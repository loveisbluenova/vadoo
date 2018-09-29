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
	$OK = false;
        $add_stripe_query = "INSERT INTO buzzystripepayments(buzzyuser_id,buzzystripepayment_timestamp)
		 	  VALUES(:buzzyuser_id,:buzzystripepayment_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_stripe_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_id', $session_user_id, PDO::PARAM_STR);
		$stmt->bindParam(':buzzystripepayment_timestamp', $now, PDO::PARAM_STR);		
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        header('Location: '.$link_prefix.'page.php?user-id='.$session_user_id.'&buyonesuccess=success');			