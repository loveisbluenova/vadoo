<?php
   if ($_SESSION["buzzyadmin_id"]==1){ 
   if (isset($_POST['update_chatlimit'])) {
	   $buzzylimit_chatone=$_POST['buzzylimit_chatone'];
	   $buzzylimit_chattwo=$_POST['buzzylimit_chattwo'];
	   $buzzylimit_chatthree=$_POST['buzzylimit_chatthree'];	   
        $OK = false;
        $update_chatlimit_query = "UPDATE buzzylimits SET buzzylimit_chatone=:buzzylimit_chatone,
		buzzylimit_chattwo=:buzzylimit_chattwo,buzzylimit_chatthree=:buzzylimit_chatthree WHERE buzzylimit_id=1";
        $stmt = $connwrite->prepare($update_chatlimit_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzylimit_chatone',  $buzzylimit_chatone, PDO::PARAM_STR);
		$stmt->bindParam(':buzzylimit_chattwo',  $buzzylimit_chattwo, PDO::PARAM_STR);
		$stmt->bindParam(':buzzylimit_chatthree',  $buzzylimit_chatthree, PDO::PARAM_STR);		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	    header('Location: chat-limit.php?add-settings-success=true');
		}
	}
	if ($_SESSION["buzzyadmin_id"]==2){
				$select_admin_query = "SELECT * FROM  buzzyadmin WHERE buzzyadmin_id=2";
        if (isset($_POST['update_chatlimit'])) {
		    header('Location: chat-limit.php?onlydemo=true');
        }
	}	
