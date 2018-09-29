<?php
include('../includes/loader_ajax.php');	
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../PHP/timezone.php';
$website_language_query = "SELECT * FROM buzzylanguages WHERE buzzylanguage_id=1";
		  foreach ($connread->query($website_language_query) as $row) {
		  $lng=$row['buzzylanguage'];
		  include '../languages/'.$lng.'.php';
		  }	if(isset($_POST['status']) || isset($_POST['id']))
	{
		if(isset($_POST['id'])) 
		{
			$id = $db->escape($_POST['id']);	
		} else {
			$id = '';	
		}
		
		if(isset($_POST['status']))
		{
			$status = $db->escape($_POST['status']);
		} else {
			$status = 'stopped';	
		}
		
		$res = $msg->chat_type($status, $id);
		
		echo $res;
	}
?>