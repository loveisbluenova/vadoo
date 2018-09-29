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
	if(isset($_POST['filterword']))
	{
		$filter_word = $db->escape($_POST['filterword']);
		
		if($filter_word !== '[unread]')
		{
			$filter_friends = $msg->Search_Contact($filter_word);
			
			if(isset($filter_friends) && $filter_friends == true)
			{
				foreach($filter_friends as $org)
				{
					$friends_array[$org['friend']] = $org['display_name'];
				}
				$friends = true;
			} else {
				$friends = false;	
			}
		} elseif($filter_word == '[unread]') {
			$unread_messages = $msg->get_unread_messages();
			if($unread_messages)
			{
				foreach($unread_messages as $m)
				{
					$friends[] = array('id' => $m['user_id'], 'user_id' => $msg->logged_user_id, 'friend' => $m['user_id']);
				}
			} else {
				$friends = false;	
			}
			
			$list_unread_messages = $msg->get_unread_messages_count_by_user();
			
			if($list_unread_messages)
			{
				foreach($list_unread_messages as $c)
				{
					$list_unread_message[$c['user_id']] = $c['counted'];
				}
			} 
			
		} else {
			$friends = false;	
		}
		
		$filter_load_more = false;
		
		include('../html_chat_list.php');
			
	}
?>