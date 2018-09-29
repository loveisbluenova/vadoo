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
	if(isset($_POST['id']))
	{
		$user_id = $db->escape($_POST['id']);

		$message = $msg->get_last_message($user_id);
		
		if(!empty($message['user_id']))
		{
			if($message['user_id'] == $msg->logged_user_id)
			{
				$chat_name = $you;
			} else {
				$chat_name = $msg->return_display_name($message['user_id']);	
			}
					
			include('../html_realtime_chat.php');
		}
	}
?>