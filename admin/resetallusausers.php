<?php 
session_start();
    $user_id=$_GET['user-id'];
    include 'security/xss-security.php';
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    include 'PHP/logincode.php';
	if ($_SESSION["buzzyadmin_id"]==1){ 
    $OK = false;
		$update_fakeuser_query = "UPDATE buzzyfakeusersusa SET buzzyfakeuserusa_insertedstatus=0";
        $stmt = $connwrite->prepare($update_fakeuser_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		
	}
    
	if ($_SESSION["buzzyadmin_id"]==2){
    header('Location:users.php');	
	}