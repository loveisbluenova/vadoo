<?php
include('../includes/loader_ajax.php');		
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../PHP/timezone.php';
include '../PHP/basic.php';
include '../PHP/loginuser.php';
if (!isset($_SESSION["buzzyuser_id"])) {
header('Location: '.$link_prefix.'register.php');	
}	
$website_language_query = "SELECT * FROM buzzylanguages WHERE buzzylanguage_id=1";
		  foreach ($connread->query($website_language_query) as $row) {
		  $lng=$row['buzzylanguage'];
		  include '../languages/'.$lng.'.php';
		  }
	header('Content-Type: text/html; charset=utf-8');

	if(isset($_POST['id']))
	{
		$user_id = $db->escape($_POST['id']);

		$cdata = $msg->get_messages($user_id);
		
		if($cdata) 
		{
			include('../html_chat.php');
		} else {
			include('../html_chat_start.php');	
		}
	}
?>