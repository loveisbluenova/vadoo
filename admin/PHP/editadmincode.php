<?php
$select_admin_query = "SELECT * FROM  buzzyadmin WHERE buzzyadmin_id=1";
if ($_SESSION["buzzyadmin_id"]==1){ 		
   if (isset($_POST['update_admin'])) {
	 $buzzyadmin_user = !empty($_POST['buzzyadmin_user']) ? trim($_POST['buzzyadmin_user']) : null;
    $buzzyadmin_password = !empty($_POST['buzzyadmin_password']) ? trim($_POST['buzzyadmin_password']) : null;
    $buzzyadmin_user1 = htmlspecialchars($buzzyadmin_user, ENT_QUOTES);
    $buzzyadmin_password1 = htmlspecialchars($buzzyadmin_password, ENT_QUOTES);
	$enc_buzzyadmin_password1=md5($buzzyadmin_password);
        $OK = false;
        $update_admin_query = "UPDATE buzzyadmin SET buzzyadmin_user=:buzzyadmin_user,buzzyadmin_password=:buzzyadmin_password WHERE buzzyadmin_id=1";
        $stmt = $connwrite->prepare($update_admin_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyadmin_user',  $buzzyadmin_user1, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyadmin_password', $enc_buzzyadmin_password1, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		header('Location:admin-options.php?add-settings-success=true');
		}
	}
	if ($_SESSION["buzzyadmin_id"]==2){
        if (isset($_POST['update_admin'])) {
		header('Location:admin-options.php?onlydemo=true');	
        }
	}	
