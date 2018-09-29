<?php		
include '../../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../../PHP/timezone.php';
$website_language_query = "SELECT * FROM buzzylanguages WHERE buzzylanguage_id=1";
		  foreach ($connread->query($website_language_query) as $row) {
		  $lng=$row['buzzylanguage'];
		  include '../../languages/'.$lng.'.php';
		  }
	include('../includes/loader_ajax.php');
	
	if(isset($_POST['offline']) && $_POST['offline'] == 'true')
	{
		$msg->set_user_sessionStatus('offline');
	} elseif(isset($_POST['offline']) && $_POST['offline'] == 'false') {
		$msg->set_user_sessionStatus('online');	
	}

?>