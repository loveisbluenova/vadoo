<?php 
session_start();
$request_id=$_GET['request-id'];	
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';


if (!isset($_SESSION["buzzyuser_id"])) {
header('Location:'.$link_prefix.'index.php');		   
}		   
$accfriend_request_query="SELECT COUNT(*) FROM buddies WHERE user_id=$request_id AND friend=$session_user_id  AND friend_status=0";
foreach ($connread->query($accfriend_request_query) as $row) {
$count_req=$row['COUNT(*)'];	
}	
if ($buzzywebsite_status==0 AND $count_req!=0){
$OK = false;
$delete_friend_query = "DELETE FROM buddies  WHERE user_id=$request_id AND friend=$session_user_id  AND friend_status=0";
$stmt = $connwrite->prepare($delete_friend_query);
$stmt->execute();
$OK = $stmt->rowCount();

$delete_msg_query = "DELETE FROM messages  WHERE user_id=$session_user_id AND receiver=$request_id";
$stmt = $connwrite->prepare($delete_msg_query);
$stmt->execute();
$OK = $stmt->rowCount();

$delete_msgtwo_query = "DELETE FROM messages  WHERE user_id=$request_id AND receiver=$session_user_id";
$stmt = $connwrite->prepare($delete_msgtwo_query);
$stmt->execute();
$OK = $stmt->rowCount();
						
header('Location:'.$link_prefix.'page.php?friends='.$session_user_id.'');		
}
else if ($buzzywebsite_status==0 AND $count_req==0){
header('Location:'.$link_prefix.'page.php?friends='.$session_user_id.'&onlydemo=true');	
}    
else if ($buzzywebsite_status==1){
header('Location:'.$link_prefix.'page.php?friends='.$session_user_id.'&onlydemo=true');	
}
?>
