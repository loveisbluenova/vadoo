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
	$website_vip_query = "SELECT * FROM  buzzypaidservices WHERE buzzypaidservice_id=5";	
	foreach ($connread->query($website_vip_query) as $row) {
	$buzzypaidservice_title=$row['buzzypaidservice_title'];	
	$buzzypaidservice_price=$row['buzzypaidservice_price'];	
    }
	
	 if($session_buzzyuser_credits>=$buzzypaidservice_price){	  
        $update_userstatus_query = "UPDATE buzzyusers SET buzzyuser_status=3,buzzyuser_status_timestamp=:buzzyuser_status_timestamp WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_userstatus_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyuser_status_timestamp', $now, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	

        $buzzyuser_credits_increment=$session_buzzyuser_credits-$buzzypaidservice_price;   		
        $update_credit_query = "UPDATE buzzyusers SET buzzyuser_credits=:buzzyuser_credits WHERE buzzyuser_id=$session_user_id";
        // prepare the statement
        $stmt = $connwrite->prepare($update_credit_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyuser_credits', $buzzyuser_credits_increment, PDO::PARAM_STR);
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();							
        header('Location: '.$link_prefix.'page.php?user-id='.$session_user_id.'');			  				
        }		
		else if($session_buzzyuser_credits<$buzzypaidservice_price){	 
        header('Location: '.$link_prefix.'page.php?user-id='.$session_user_id.'&low-credit=true');				  
		}