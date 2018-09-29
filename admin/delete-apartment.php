<?php 
session_start();
    $apartment_id=$_GET['apartment-id'];
    include 'security/xss-security.php';
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    include 'PHP/logincode.php';
	

	
	if ($_SESSION["buzzyadmin_id"]==1){ 
		
$delete_apartment_query = "DELETE FROM buzzyapartments WHERE buzzyapartment_id=$apartment_id";
$stmt = $connwrite->prepare($delete_apartment_query);
$stmt->execute();
$OK = $stmt->rowCount();
header('Location: real-estates.php');
	}
    
	if ($_SESSION["buzzyadmin_id"]==2){
    header('Location:real-estates.php');	
    }		