<?php   
session_start(); //to ensure you are using same session
$aip = $_SERVER['REMOTE_ADDR'];
$bip = $_SERVER['HTTP_X_FORWARDED_FOR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
// Do this each time the user successfully logs in.
$_SESSION['ident'] = hash("sha256", $aip . $bip . $agent);

// Do this every time the client makes a request to the server, after authenticating
$ident = hash("sha256", $aip . $bip . $agent);
if ($ident != $_SESSION['ident'])
{
    end_session();
    header("Location: index.php");
    // add some fancy pants GET/POST var headers for login.php, that lets you
    // know in the login page to notify the user of why they're being challenged
    // for login again, etc.
}
$ip = $_SERVER['REMOTE_ADDR'];
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
  $update_userlogin_query = "UPDATE buzzyusers SET buzzyuser_last_login=:buzzyuser_last_login,buzzyuser_onlinestatus=0 WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_userlogin_query);
        // bind the parameters and execute the statement
	    $stmt->bindParam(':buzzyuser_last_login', $now, PDO::PARAM_STR);	
        // execute and get number of affected rows
        $stmt->execute();		
        $OK = $stmt->rowCount();
if($buzzywebsite_status==1){
$delete_usersunactive_query = "DELETE   FROM buzzyusers WHERE buzzyuser_age=0 AND buzzyuser_onlinestatus=0 AND buzzyuser_id!=344";
$stmt = $connwrite->prepare($delete_usersunactive_query);
$stmt->execute();
$OK = $stmt->rowCount();
}		
session_destroy(); //destroy the session
header("location:index.php"); //to redirect back to "index.php" after logging out
exit();
