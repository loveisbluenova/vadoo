<?php
   $this_user_query = 'SELECT buzzyuser_id,buzzyuser_first_name,buzzyuser_last_name,buzzyuser_username,buzzyuser_image,buzzyuser_location,
   buzzyuser_cover,buzzyuser_email,buzzyuser_credits,DATE_FORMAT(buzzyuser_birthdate, "%d/%m/%Y") as formated_buzzyuser_birthdate,buzzyuser_password,buzzyuser_registration_date,
   buzzyuser_aboutme,buzzyuser_status,buzzyuser_moderator FROM buzzyusers WHERE buzzyuser_id='.$user_id.'';
   
    foreach ($connread->query($this_user_query) as $row) {
    $buzzyuser_credits=$row['buzzyuser_credits'];	
	}

   if ($_SESSION["buzzyadmin_id"]==1){	
   if (isset($_POST['change_user_status'])) {
    $postbuzzyuser_credits=$_POST['buzzyuser_credits'];	
    $incbuzzyuser_credits=$buzzyuser_credits+$postbuzzyuser_credits;	
     $OK = false;
        $update_user_status_query = "UPDATE buzzyusers SET buzzyuser_status=:buzzyuser_status,buzzyuser_credits=:buzzyuser_credits,buzzyuser_moderator=:buzzyuser_moderator WHERE buzzyuser_id=$user_id";
        $stmt = $connwrite->prepare($update_user_status_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_status', $_POST['buzzyuser_status'], PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_credits', $incbuzzyuser_credits, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_moderator', $_POST['buzzyuser_moderator'], PDO::PARAM_STR);		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		header('Location: manage-user.php?user-id='.$user_id.'&add-settings-success=true');
   }
   }
   else  if ($_SESSION["buzzyadmin_id"]==2){	
   if (isset($_POST['change_user_status'])) {
		header('Location: manage-user.php?user-id='.$user_id.'&onlydemo=true');
   }
   }
