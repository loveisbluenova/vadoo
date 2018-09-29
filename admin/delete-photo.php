<?php 
session_start();
    $photo_id=$_GET['photo-id'];
    include 'security/xss-security.php';
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    include 'PHP/logincode.php';
	
	if ($_SESSION["buzzyadmin_id"]==1){ 	
$delete_imgimg_query = "DELETE FROM buzzyuserimages WHERE buzzyuserimage_id=$photo_id";
$stmt = $connwrite->prepare($delete_imgimg_query);
$stmt->execute();
$OK = $stmt->rowCount();
    header('Location:usphotos.php');
	}
    
	if ($_SESSION["buzzyadmin_id"]==2){
    header('Location:usphotos.php?onlydemo=true');	
    }		