<?php 
session_start();
    $user_id=$_GET['user-id'];
    include 'security/xss-security.php';
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    include 'PHP/logincode.php';	
	if ($_SESSION["buzzyadmin_id"]==1){ 	
$delete_vf_query = "DELETE FROM buzzyphoto_verimg WHERE buzzyuser_id=$user_id";
$stmt = $connwrite->prepare($delete_vf_query);
$stmt->execute();
$OK = $stmt->rowCount();
header('Location: verify-photo.php');
	}
    
	if ($_SESSION["buzzyadmin_id"]==2){
    header('Location: verify-photo.php?onlydemo=true');	
    }		