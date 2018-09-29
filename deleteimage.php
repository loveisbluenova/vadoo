<?php
ob_start('ob_gzhandler');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$image_id=htmlspecialchars($_GET['image-id']);
$ip = $_SERVER['REMOTE_ADDR'];

include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
	$OK = false;
$delete_imageg_query = "DELETE FROM buzzyuserimages WHERE buzzyuserimage_id=$image_id";
$stmt = $connwrite->prepare($delete_imageg_query);
$stmt->execute();
$OK = $stmt->rowCount();
        header('Location: '.$link_prefix.'page.php?user-id='.$session_user_id.'');			  				
		
