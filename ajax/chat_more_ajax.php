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
	if(isset($_POST['lastid']) && isset($_POST['uid']))
	{
		$lastid = intval($db->escape($_POST['lastid']));
		$lastid = $lastid + $perpage;
		$user_id = $db->escape($_POST['uid']);
		
		$load_more = true;
				
		include('../html_chat.php');
	}
	
?>