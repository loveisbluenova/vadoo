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
		$update_ci_query = "UPDATE buzzyusers SET buzzyphoto_ver=1 WHERE buzzyuser_id=$user_id";
        $stmt = $connwrite->prepare($update_ci_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
    header('Location:photoconf.php?add-settings-success=true');		
	}
    
	if ($_SESSION["buzzyadmin_id"]==2){
    header('Location:photoconf.php?onlydemo=true');	
	}