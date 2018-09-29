<?php 
session_start();
    $cat_id=$_GET['cat-id'];
    include 'security/xss-security.php';
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    include 'PHP/logincode.php';
	

	
	if ($_SESSION["buzzyadmin_id"]==1){ 
		
$delete_intcat_query = "DELETE FROM buzzyuser_interest_categories WHERE buzzyuser_interest_category_id=$cat_id";
$stmt = $connwrite->prepare($delete_intcat_query);
$stmt->execute();
$OK = $stmt->rowCount();
header('Location: interestcategories.php');
	}
    
	if ($_SESSION["buzzyadmin_id"]==2){
    header('Location:interestcategories.php');	
    }		