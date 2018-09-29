<?php 
session_start();
    $gift_id=$_GET['gift-id'];
    
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    include 'PHP/logincode.php';
	if ($_SESSION["buzzyadmin_id"]==1){ 
$OK = false;
$delete_gift_query = "DELETE FROM buzzynewgifts WHERE buzzygift_id=$gift_id";
$stmt = $connwrite->prepare($delete_gift_query);
$stmt->execute();
$OK = $stmt->rowCount();
header('Location: vadoogifts.php');
	}
    
	if ($_SESSION["buzzyadmin_id"]==2){
    header('Location:vadoogifts.php');	
    }		