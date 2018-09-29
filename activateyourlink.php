<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
    $link=$_GET['link'];
	$OK = false;
        $update_activation_query = "UPDATE buzzyusers SET buzzyuser_googleconfirm=1,buzzyuser_confirmed=1 WHERE buzzyuser_hash='$link'";
        $stmt = $connwrite->prepare($update_activation_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		$select_user_query = "SELECT * FROM buzzyusers WHERE buzzyuser_hash='$link'";
		foreach ($connread->query($select_user_query) as $row) { 
		$_SESSION["buzzyuser_id"]=$row['buzzyuser_id'];
		$logged_in_user_id=$row['buzzyuser_id'];;
		header("Location: page.php?user-id=$logged_in_user_id");
		}