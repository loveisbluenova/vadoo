<?php 
ob_start('ob_gzhandler');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$ip = $_SERVER['REMOTE_ADDR'];
include 'security/xss-security.php';
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
if(isset($_POST["submit-like"])){
$pin_liked_query = "INSERT INTO buzzyuserliked(buzzyliked_id,buzzyuser_id)
        VALUES(:buzzyliked_id,:buzzyuser_id)";
        // prepare the statement
        $stmt = $connwrite->prepare($pin_liked_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyliked_id', $randombuzzyuser_id, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_id', $session_user_id, PDO::PARAM_STR);		           
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        header('Location: '.$link_prefix.'page.php?hotnot-id=true');	   		
}
