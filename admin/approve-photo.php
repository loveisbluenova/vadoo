<?php 
session_start();
    $photo_id=$_GET['photo-id'];
    include 'security/xss-security.php';
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    include 'PHP/logincode.php';
	if ($_SESSION["buzzyadmin_id"]==1){ 
    $OK = false;
		$update_imgimg_query = "UPDATE buzzyuserimages SET buzzyuserimage_approval=0 WHERE buzzyuserimage_id=$photo_id";
        $stmt = $connwrite->prepare($update_imgimg_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
    header('Location:usphotos.php');		
	}
    
	if ($_SESSION["buzzyadmin_id"]==2){
    header('Location:usphotos.php?onlydemo=true');	
	}