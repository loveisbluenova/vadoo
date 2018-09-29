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
	if(isset($_POST['lastid']) && isset($_POST['uid']))
	{
		$lastid = intval($db->escape($_POST['lastid']));
		$lastid = $lastid + $contacts_per_page;
		$user_id = $db->escape($_POST['uid']);
		
		$init_load = true;
		$load_more = true;
		
		if($_POST['tab'] == 'contacts') 
		{ 
			$msg->active_tab = 'contacts';
		} else { 
			$msg->active_tab = 'chats';
		}
				
		include('../html_chat_list.php');
	}
	
?>