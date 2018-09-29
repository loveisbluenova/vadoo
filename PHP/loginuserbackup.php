<?php
$now=time();
$url= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	// if the user is logged in from Social -->
	//echo $url. die();
   if (isset($_POST['login'])) {
    $buzzyuser_email=$_POST["buzzyuser_email"];
    $buzzyuser_password=$_POST["buzzyuser_password"];
    $buzzyuser_email = stripslashes($buzzyuser_email);
    $buzzyuser_password= stripslashes($buzzyuser_password);
	$buzzyuser_email1 = htmlspecialchars($buzzyuser_email, ENT_QUOTES);
    $buzzyuser_password1= htmlspecialchars($buzzyuser_password, ENT_QUOTES);
    $login_query = "SELECT * FROM buzzyusers WHERE buzzyuser_email='$buzzyuser_email1' AND buzzyuser_password = '$buzzyuser_password1'";
    $stmt = $connwrite->prepare($login_query);
  // bind the parameters and execute the statement	
  // execute and get number of affected rows
    $stmt->execute();
    $OK = $stmt->rowCount();
        foreach ($connread->query($login_query) as $row) {
        $_SESSION["buzzyuser_id"] = $row['buzzyuser_id'];
		$logged_in_user_id=$row['buzzyuser_id'];;		
        } 
       if ($OK!=0){
        $OK = false;
        $update_userlogin_query = "UPDATE buzzyusers SET buzzyuser_last_login=:buzzyuser_last_login WHERE buzzyuser_id=$logged_in_user_id";
        $stmt = $connwrite->prepare($update_userlogin_query);
        // bind the parameters and execute the statement
	    $stmt->bindParam(':buzzyuser_last_login', $now, PDO::PARAM_STR);	
        // execute and get number of affected rows
        $stmt->execute();		
        $OK = $stmt->rowCount();		   
	   header('Location: '.$link_prefix.$user_id_url.$_SESSION["buzzyuser_id"].'');
	   }
	   else if ($OK==0){
	   header('Location:'.$link_prefix.'index.php?login=false');
	   }
		}
		 // Other functions - start
    if (isset($_SESSION["buzzyuser_id"])) {				
    $session_user_id=$_SESSION["buzzyuser_id"];	
		
    $session_user_query="SELECT * FROM buzzyusers WHERE buzzyuser_id=$session_user_id";
    foreach ($connread->query($session_user_query) as $row) { 
    $session_buzzyuser_username = $row['buzzyuser_username'];
	$session_buzzyuser_image = $row['buzzyuser_image'];
	$session_buzzyuser_email = $row['buzzyuser_email'];
	$session_buzzyuser_status = $row['buzzyuser_status'];
	
	$sesscount_user_query="SELECT COUNT(*) FROM users WHERE id=$session_user_id";
	foreach ($connread->query($sesscount_user_query) as $row) { 
	$count_userss=$row['COUNT(*)'];
	if($count_userss==0){
	$register_userr = "INSERT INTO  users
       (id,username,display_name,profile_image,status,type_status,last_seen,session_status)
		 	  VALUES (:id,:username,:display_name,:profile_image,'','stopped','0','online')";
        // prepare the statement
        $stmt = $connwrite->prepare($register_userr);
        // bind the parameters and execute the statement
		$stmt->bindParam(':id', $session_user_id, PDO::PARAM_STR);
		$stmt->bindParam(':username', $session_buzzyuser_username, PDO::PARAM_STR);
        $stmt->bindParam(':display_name',$session_buzzyuser_username, PDO::PARAM_STR);
        $stmt->bindParam(':profile_image', $session_buzzyuser_image, PDO::PARAM_STR);	
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
	}
	}
	
    }
	
   if (isset($_POST["settings"])) {
   $userbirthdate = date('Y-m-d', strtotime($_POST['buzzyuser_birthdate']));
	  $OK = false;
        $update_user_query = "UPDATE buzzyusers SET buzzyuser_first_name=:buzzyuser_first_name,buzzyuser_last_name=:buzzyuser_last_name, buzzyuser_username=:buzzyuser_username,
		buzzyuser_birthdate=:buzzyuser_birthdate,buzzyuser_location=:buzzyuser_location,buzzyuser_email=:buzzyuser_email, buzzyuser_password=:buzzyuser_password,
		buzzyuser_aboutme=:buzzyuser_aboutme,buzzyuser_emailstatus=:buzzyuser_emailstatus,buzzyuser_fullnamestatus=:buzzyuser_fullnamestatus,buzzyuser_contactsstatus=:buzzyuser_contactsstatus WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_user_query);
        // bind the parameters and execute the statement
	    $stmt->bindParam(':buzzyuser_first_name', $_POST['buzzyuser_first_name'], PDO::PARAM_STR);	
	    $stmt->bindParam(':buzzyuser_last_name', $_POST['buzzyuser_last_name'], PDO::PARAM_STR);		
	    $stmt->bindParam(':buzzyuser_username', $_POST['buzzyuser_username'], PDO::PARAM_STR);
	    $stmt->bindParam(':buzzyuser_birthdate',  $userbirthdate, PDO::PARAM_STR);		
	    $stmt->bindParam(':buzzyuser_location', $_POST['buzzyuser_location'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_email', $_POST['buzzyuser_email'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_password', $_POST['buzzyuser_password'], PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_aboutme', $_POST['buzzyuser_aboutme'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_emailstatus', $_POST['buzzyuser_emailstatus'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_fullnamestatus', $_POST['buzzyuser_fullnamestatus'], PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyuser_contactsstatus', $_POST['buzzyuser_contactsstatus'], PDO::PARAM_STR);		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
   }
  $select_count_messages_query = "SELECT COUNT(*) FROM messages WHERE status='unread' AND receiver=$session_user_id";
  $select_count_pinned_query = "SELECT COUNT(*) FROM buzzynewspinned WHERE buzzyuser_id=$session_user_id";
   }