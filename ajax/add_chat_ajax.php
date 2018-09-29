<?php
include('../includes/loader_ajax.php');		
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../PHP/timezone.php';
$website_language_query = "SELECT * FROM buzzylanguages WHERE buzzylanguage_id=1";
		  foreach ($connread->query($website_language_query) as $row) {
		  $lng=$row['buzzylanguage'];
		  include '../languages/'.$lng.'.php';
		  }
	header('Content-Type: text/html; charset=utf-8');

	if(isset($_POST['id']))
	{						
		
		$user_id = $db->escape($_POST['id']);
		
 if (strpos($_POST['message'],'document(') !== false) {
 $message='Undefined...';	
 }
  else if (strpos($_POST['message'],'body onload') !== false) {
 $message='Undefined...';	
 }
 else if (strpos($_POST['message'],'alert') !== false) {
 $message='Undefined...';	
 }
 else if (strpos($_POST['message'],'onerror=alert') !== false) {
 $message='Undefined...';	
 }
 else if (strpos($_POST['message'],'META HTTP') !== false) {
 $message='Undefined...';	
 }
  else if (strpos($_POST['message'],'<%') !== false) {
 $message='Undefined...';	
 }
 else if (strpos($_POST['message'],'urldecode') !== false) {
 $message='Undefined...';	
 }	
  else if (strpos($_POST['message'],'html') !== false) {
 $message='Undefined...';	
 }
      else{
		$message = $db->escape($_POST['message']);
       }			
		$cdata = $msg->add_message($user_id, $message);
		
		$new_msg = true;
		
		if($cdata) 
		{
			include('../html_chat.php');
		} 
	}
?>