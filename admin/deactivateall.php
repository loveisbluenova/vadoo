<?php 
session_start();
    $buzzysiderss_id=$_GET['rss-id'];
    
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    include 'PHP/logincode.php';
	if ($_SESSION["buzzyadmin_id"]==1){ 
$OK = false;
$deactivate_all_query = "UPDATE buzzysiderss SET buzzysiderss_status=0";
        $stmt = $connwrite->prepare($deactivate_all_query );
        // bind the parameters and execute the statement	
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
    header('Location: siderss.php');		
	}	
    else if ($_SESSION["buzzyadmin_id"]==2){ 
    header('Location: siderss.php');		
	}