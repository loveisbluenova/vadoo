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
	if(isset($_POST['post_tabs']) && $_POST['post_tabs'] == 'contacts')
	{
		$init_load = true;
		$load_more = true;
		
		$msg->active_tab = 'contacts';
				
		include('../html_chat_list.php');
	}
	
	if(isset($_POST['post_tabs']) && $_POST['post_tabs'] == 'chats')
	{
		$init_load = true;
		$load_more = true;
		$chat_tab = true;
		
		$msg->active_tab = 'chats';
				
		include('../html_chat_list.php');
	}
?>