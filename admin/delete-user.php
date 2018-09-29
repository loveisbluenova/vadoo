<?php 
session_start();
    $user_id=$_GET['user-id'];
    include 'security/xss-security.php';
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    include 'PHP/logincode.php';
	
	$deleted_users_query = "SELECT buzzyuser_email FROM buzzyusers WHERE buzzyuser_id=$user_id";
	foreach ($connread->query($deleted_users_query) as $row) {
    $buzzyuser_email=$row['buzzyuser_email'];
    }
	
	if ($_SESSION["buzzyadmin_id"]==1){ 
    $OK = false;
		$update_fakeuser_query = "UPDATE buzzyfakeusers SET buzzyfakeuser_insertedstatus=0 WHERE buzzyfakeuser_email='$buzzyuser_email'";
        $stmt = $connwrite->prepare($update_fakeuser_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
$delete_user_query = "DELETE FROM buzzyusers WHERE buzzyuser_id=$user_id";
$stmt = $connwrite->prepare($delete_user_query);
$stmt->execute();
$OK = $stmt->rowCount();

$delete_userliked_query = "DELETE FROM buzzyuserliked WHERE buzzyliked_id=$user_id";
$stmt = $connwrite->prepare($delete_userliked_query);
$stmt->execute();
$OK = $stmt->rowCount();

$delete_userlikedtwo_query = "DELETE FROM buzzyuserliked WHERE buzzyuser_id=$user_id";
$stmt = $connwrite->prepare($delete_userlikedtwo_query);
$stmt->execute();
$OK = $stmt->rowCount();

$delete_userunliked_query = "DELETE FROM buzzyuserunliked WHERE buzzyunliked_id=$user_id";
$stmt = $connwrite->prepare($delete_userunliked_query);
$stmt->execute();
$OK = $stmt->rowCount();

$delete_userunlikedtwo_query = "DELETE FROM buzzyuserunliked WHERE buzzyuser_id=$user_id";
$stmt = $connwrite->prepare($delete_userunlikedtwo_query);
$stmt->execute();
$OK = $stmt->rowCount();

$delete_userdata_query = "DELETE FROM buzzyuser_data WHERE buzzyuser_id=$user_id";
$stmt = $connwrite->prepare($delete_userdata_query);
$stmt->execute();
$OK = $stmt->rowCount();

$delete_userint_query = "DELETE FROM buzzyuser_interests WHERE buzzyuser_id=$user_id";
$stmt = $connwrite->prepare($delete_userint_query);
$stmt->execute();
$OK = $stmt->rowCount();

$delete_userr_query = "DELETE FROM users WHERE id=$user_id";
$stmt = $connwrite->prepare($delete_userr_query);
$stmt->execute();
$OK = $stmt->rowCount();

header('Location: users.php');
	}
    
	if ($_SESSION["buzzyadmin_id"]==2){
    header('Location:users.php');	
    }		