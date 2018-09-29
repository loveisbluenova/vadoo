<?php 
session_start();
    $page_id=$_GET['page-id'];
    include 'security/xss-security.php';
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    include 'PHP/logincode.php';	
	if ($_SESSION["buzzyadmin_id"]==1){ 	
$delete_page_query = "DELETE FROM buzzycustompages WHERE buzzycustompage_id=$page_id";
$stmt = $connwrite->prepare($delete_page_query);
$stmt->execute();
$OK = $stmt->rowCount();
header('Location: custom-pages.php');
	}
    
	if ($_SESSION["buzzyadmin_id"]==2){
    header('Location:custom-pages.php?onlydemo=true');	
    }		