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
	if(isset($_POST['id']) && isset($_POST['uid']))
	{
		$message_id = $db->escape($_POST['id']);
		
		$user_id = $db->escape($_POST['uid']);
					
		$ok = $msg->delete_message($message_id, $user_id);
				
		if($ok) 
		{
			echo true;
		} else {
			echo false;	
		}
	}
?>