<?php
	include('../includes/loader_ajax.php');
		
include '../../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../../PHP/timezone.php';
$website_language_query = "SELECT * FROM buzzylanguages WHERE buzzylanguage_id=1";
		  foreach ($connread->query($website_language_query) as $row) {
		  $lng=$row['buzzylanguage'];
		  include '../../languages/'.$lng.'.php';
		  }
	header('Content-Type: text/html; charset=utf-8');
	if(isset($_POST['id']))
	{
		$user_id = $db->escape($_POST['id']);
		
		$message = $db->escape($_POST['message']);
			
		$cdata = $msg->add_message($user_id, $message);
		
		$new_msg = true;
		
		if($cdata) 
		{
			include('../html_chat.php');
		} 
	}
?>