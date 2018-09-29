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
	$website_imagepriv_query = "SELECT * FROM  buzzyuserimages WHERE buzzyuserimage_id=$image_id";	
	foreach ($connread->query($website_imagepriv_query) as $row) {
	$buzzyuserimage_privatestatus=$row['buzzyuserimage_privatestatus'];	
    }
if($buzzyuserimage_privatestatus==0){
$priv_inc=1;	
}	
else if($buzzyuserimage_privatestatus==1){
$priv_inc=0;	
}	 
        $update_privacy_query = "UPDATE buzzyuserimages SET buzzyuserimage_privatestatus=:buzzyuserimage_privatestatus WHERE buzzyuserimage_id=$image_id";
        // prepare the statement
        $stmt = $connwrite->prepare($update_privacy_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyuserimage_privatestatus', $priv_inc, PDO::PARAM_STR);
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();					
        header('Location: '.$link_prefix.'page.php?user-id='.$session_user_id.'&image-private=true');			  				
		
