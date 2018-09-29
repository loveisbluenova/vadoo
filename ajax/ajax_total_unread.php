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
	if(isset($_POST['total_unread']) && $_POST['total_unread'] == 'true')
	{
		$t_r = $msg->total_unread_messages();
		if($t_r !== false)
		{ 
			echo $t_r; 
		} else {
			echo '';	
		}
	}

?>