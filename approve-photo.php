<?php 
session_start();
    $photo_id=$_GET['photo-id'];	
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
if($session_buzzyuser_moderator==0){
header('Location: '.$link_prefix.'index.php');	
}
if ($buzzywebsite_status==0 AND $session_buzzyuser_moderator==1){
    $OK = false;
		$update_imgimg_query = "UPDATE buzzyuserimages SET buzzyuserimage_approval=0 WHERE buzzyuserimage_id=$photo_id";
        $stmt = $connwrite->prepare($update_imgimg_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
    header('Location:'.$link_prefix.'page.php?photo-review-id=1');		
	}
    
if ($buzzywebsite_status==1 AND $session_buzzyuser_moderator==1){
    header('Location:'.$link_prefix.'page.php?photo-review-id=1&onlydemo=true');	
	}