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
	if(isset($_POST['id']) || isset($_POST['uid']))
	{
		if(isset($_POST['id']))
		{
			$id = $db->escape($_POST['id']);
		} else {
			$id = $db->escape($_POST['uid']);	
		}
		
		$list_unread_messages = $msg->get_unread_messages_count_by_user();
		if($list_unread_messages)
		{
			foreach($list_unread_messages as $c)
			{
				$list_unread_message[$c['user_id']] = $c['counted'];
			}
		} 

		if(isset($list_unread_message[$id]))
		{
			echo $list_unread_message[$id];
		} 
	}
?>