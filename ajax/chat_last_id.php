<?php
include('../includes/loader_ajax.php');		
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../PHP/timezone.php';
include '../PHP/basic.php';
include '../PHP/registeruser.php';
include '../PHP/loginuser.php';
$website_language_query = "SELECT * FROM buzzylanguages WHERE buzzylanguage_id=1";
		  foreach ($connread->query($website_language_query) as $row) {
		  $lng=$row['buzzylanguage'];
		  include '../languages/'.$lng.'.php';
		  }
	if(isset($_POST['id']))
	{
		$user_id = $db->escape($_POST['id']);
		
		$message = $msg->get_last_message($user_id);
		
		$c_id = $message['id'];

		if($c_id == false)
		{
			exit();
		} else {
			echo 'u_msg'.$c_id;
		}
	}
?>