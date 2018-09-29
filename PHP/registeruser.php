<?php
$now = time();
//converting one date format into another
$website_mail_query = "SELECT buzzysiteurl,buzzyemail FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1";
foreach ($connread->query($website_mail_query) as $row) { 
$buzzysiteurl=$row['buzzysiteurl'];
$buzzyemail=$row['buzzyemail'];
}





if (isset($_POST['reg'])) {	

    $postbuzzyuser_email=$_POST["buzzyuser_email"];
    $postbuzzyuser_email = stripslashes($postbuzzyuser_email);
    $postbuzzyuser_email1= htmlspecialchars($postbuzzyuser_email, ENT_QUOTES);
    $postbuzzyuser_username=$_POST["buzzyuser_username"];
    $postbuzzyuser_username = stripslashes($postbuzzyuser_username);
    $postbuzzyuser_usernamel1= htmlspecialchars($postbuzzyuser_username, ENT_QUOTES);
	
  //get age from date or birthdate
$afrom = new DateTime($userbirthdate);
$ato   = new DateTime('today');
$postage =  $afrom->diff($ato)->y;

$check_email_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_email='$postbuzzyuser_email'";
$stmt = $connwrite->prepare($check_email_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
		
$check_username_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_username='$postbuzzyuser_usernamel1'";
$stmt = $connwrite->prepare($check_username_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		
		
foreach ($connread->query($check_email_query) as $row) { 
$check_email=$row['COUNT(*)'];
}

foreach ($connread->query($check_username_query) as $row) { 
$check_username=$row['COUNT(*)'];
}
if($check_email==0 AND $check_username==0) {	
	 $buzzyuser_password=$_POST['buzzyuser_password'];	
     $buzzyuser_password1 = htmlspecialchars($buzzyuser_password, ENT_QUOTES);	
     $enc_buzzyuser_password1=md5($buzzyuser_password1);	 
$ip_address = $_SERVER['REMOTE_ADDR'];
$buzzyuser_location=$_POST['buzzyuser_location'];
 $buzzyuser_location1 = urlencode($buzzyuser_location);
  $request_url = "https://maps.googleapis.com/maps/api/geocode/xml?address=".$buzzyuser_location1."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $new_user_lat = $xml->result->geometry->location->lat;
      $new_user_lon = $xml->result->geometry->location->lng;
  }
if ($status!="OK") {
$ch = curl_init();
            $headr = array();
            $headr[] = 'Content-length: 0';
            $headr[] = 'Content-type: application/json';
            curl_setopt($ch, CURLOPT_URL, 'https://ip-api.com/json/'.$user_ipreal.'');
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; xxxxx)'); // my product name
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $ch_data = curl_exec($ch);
            curl_close($ch);
            if(!empty($ch_data))
            {
            $json_data = json_decode($ch_data, true);
            //print_r($json_data);
            $new_user_city=$json_data['city'];
            $new_user_region=$json_data['country'];
            $new_user_lat=$json_data['lat'];	
            $new_user_lon=$json_data['lon'];			
			}
        $buzzyuser_location = $new_user_city.', '.$new_user_region;			
}						
        $buzzyuser_genre=10;
        $buzzyuser_data_sexual_orientation=10;	 	
        $OK = false;
        // create database connection
        // initialize prepared statement
        // create SQL
		$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
		if($buzzy_access==1){
		$buzzyuser_status=0;	
		}
		else if($buzzy_access==0){
		$buzzyuser_status=0;		
		}
        $register_user = "INSERT INTO  buzzyusers      (buzzyuser_first_name,buzzyuser_last_name,buzzyuser_username,buzzyuser_image,buzzyuser_location,buzzyuser_data_sexual_orientation,buzzyuser_lat,buzzyuser_long,buzzyuser_email,buzzyuser_password,buzzyuser_hash,buzzyuser_registration_date,buzzyuser_last_login,buzzyuser_registration_timestamp,buzzyuser_status_timestamp,buzzyuser_credits,buzzyuser_fbconfirm,
	    buzzyuser_googleconfirm,buzzyuser_emailstatus,buzzyuser_fullnamestatus,buzzyuser_contactsstatus,buzzyuser_visibility,buzzyuser_privacy,buzzyuser_genre,buzzyuser_onlinestatus,buzzyuser_fortumo_tnx,buzzyuser_chatlimit,buzzyuser_animation,buzzyuser_status,buzzyuser_theme,buzzyuser_demostatus,buzzyuser_year)
		 	  VALUES (:buzzyuser_first_name,:buzzyuser_last_name,:buzzyuser_username,'profile-icon1.jpg',:buzzyuser_location,:buzzyuser_data_sexual_orientation,
			  :buzzyuser_lat,:buzzyuser_long,:buzzyuser_email,:buzzyuser_password,:buzzyuser_hash,NOW(),:buzzyuser_last_login,:buzzyuser_registration_timestamp,:buzzyuser_status_timestamp,0,0,0,0,0,0,
			  0,0,:buzzyuser_genre,1,'eruezrufjde',0,6,:buzzyuser_status,2,0,2018)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyuser_first_name', $_POST['buzzyuser_first_name'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_last_name', $_POST['buzzyuser_last_name'], PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_username', $_POST['buzzyuser_username'], PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_location', $buzzyuser_location, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_age', $postage, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_data_sexual_orientation', $buzzyuser_data_sexual_orientation, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_lat', $new_user_lat, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_long', $new_user_lon, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_email', $_POST['buzzyuser_email'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_password', $enc_buzzyuser_password1, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_hash', $hash, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_last_login', $now, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_registration_timestamp', $now, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyuser_status_timestamp', $now, PDO::PARAM_STR);			
		$stmt->bindParam(':buzzyuser_genre', $buzzyuser_genre, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_status', $buzzyuser_status, PDO::PARAM_STR);			
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		if($OK!=0){
        $new_user_query = "SELECT * FROM buzzyusers ORDER by buzzyuser_id DESC LIMIT 1";
		foreach ($connread->query($new_user_query) as $row) { 
		$last_buzzyuser_id=$row['buzzyuser_id'];
		$_SESSION["buzzyuser_id"] = $row['buzzyuser_id'];
		if (isset($_SESSION["buzzyuser_id"])) {
    $register_session_user_query="SELECT * FROM buzzyusers WHERE buzzyuser_id=$last_buzzyuser_id";
    foreach ($connread->query($register_session_user_query) as $row) { 
    $session_buzzyuser_username = $row['buzzyuser_username'];
	$session_buzzyuser_image = $row['buzzyuser_image'];
	$session_buzzyuser_email = $row['buzzyuser_email'];
	$session_buzzyuser_status = $row['buzzyuser_status'];
	$session_buzzyuser_genre = $row['buzzyuser_genre'];	
	$session_buzzyuser_hash = $row['buzzyuser_hash'];
    $register_user_to_messages = "INSERT INTO  users
       (id,username,display_name,profile_image,type_status,last_seen,session_status)
		 	  VALUES (:id,:username,:display_name,'default.jpg','stopped',:last_seen,'offline')";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_messages);
        // bind the parameters and execute the statement
		$stmt->bindParam(':id', $last_buzzyuser_id, PDO::PARAM_STR);
		$stmt->bindParam(':username', $session_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':display_name', $session_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':last_seen', $now, PDO::PARAM_STR);		
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
			
	    $register_user_to_mailing = "INSERT INTO  buzzymailing_list
       (buzzymailing_list_email,buzzymailing_list_timestamp)
		 	  VALUES (:buzzymailing_list_email,:buzzymailing_list_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_mailing);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzymailing_list_email', $session_buzzyuser_email, PDO::PARAM_STR);
		$stmt->bindParam(':buzzymailing_list_timestamp', $now, PDO::PARAM_STR);
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
     }
		
     }
 $mail->FromName = 'Activate your profile';
 $mail->addAddress($session_buzzyuser_email);            
 $mail->Subject = 'Do not reply on this message.'; 
 $mail->Body   = '<div style="background:#eee!important; width:100%!important;">
  <div style="background:#'.$buzzycss_color_css.'!important; width:100%!important; height:130px!important;" >
  <br>
  <p style="text-align:center; padding-top:20px!important;  color:#fff!important; font-size:28px!important; font-family:Comfortaa;" ><img src="https://icons.iconarchive.com/icons/designbolts/free-valentine-heart/48/Heart-icon.png"
  style="margin-right:10px!important; width:32px!important;">'.$buzzysitename.'</p> 
  </div> 
 <div style="width:480px!important; margin:0 auto; height:280px!important; margin-top:20px; position:absolute!important; background:#fff!important;  border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;">
 <div style="width:80px!important; margin:0 auto!important; padding-top:20px!important;"><img src="'.$actual_link2 .'img/'.$session_buzzyuser_image.'" style=" border-radius:120px 120px 120px 120px;
-moz-border-radius:120px 120px 120px 120px;
-webkit-border-radius:120px 120px 120px 120px; width:80px!important; height:80px!important;"></div> 
 <p style="font-size:15px; text-align:center!important; color:#333!important;"><strong>Please activate your profile. Click on button and activate your profile.</strong></p>
 <br>
 <p style="text-align:center!important;"><a class="btn btn-primary" style="
background:#'.$buzzycss_color_css.'!important;
border:0px solid #000;
border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;
padding:8px!important;
color:#fff;
font-size:16px; font-weight:700!important; text-decoration: none;"  href="'.$buzzysiteurl.'/activateyourlink.php?link='.$session_buzzyuser_hash.'">Profile activation</a></p>
 </div>  
 <div class="clearfix"></div>
 <br>
 <p style="margin-left:20px!important; color:#4e4e4e;">
 <span class="links" style="float:left; font-size:13px!important; border:0px solid #333!important;  '.$color_foot.'" >'.$buzzysitename .' &#169;  '.date("Y").' All rights reserved</span></p>
 <br><br><br><br>
  </div>';  
  
  $mail->AltBody = 'This is the body in plain text for non-HTML mail  clients';    
  if(!$mail->send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
  echo 'Message has been sent';
 }       
		if($buzzy_access==0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		else if($buzzy_access==1 AND $session_buzzyuser_genre!=0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		else if($buzzy_access==1 AND $session_buzzyuser_genre==0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=trial');
		}		
		}
		}
		if($OK==0){
        header('Location:'.$link_prefix.'index.php?error-reg=true');
	    }
	}
	else if($check_email==0 AND $check_username==1) {
    header('Location:'.$link_prefix.'index.php?usernametaken=true');		
	}	
	else{
    header('Location:'.$link_prefix.'index.php?emailtaken=true');	
	}
	}



if (isset($_POST['register_usertwo'])) {	
	$month=$_POST['month'];
	$day=$_POST['day'];	
	$year=$_POST['year'];
    $post_buzzyuser_birthdate=$year.'-'.$month.'-'.$day;	
	
$userbirthdate = date('Y-m-d', strtotime($post_buzzyuser_birthdate));
    $postbuzzyuser_email=$_POST["buzzyuser_email"];
    $postbuzzyuser_email = stripslashes($postbuzzyuser_email);
    $postbuzzyuser_email1= htmlspecialchars($postbuzzyuser_email, ENT_QUOTES);

    $postbuzzyuser_username=$_POST["buzzyuser_username"];
    $postbuzzyuser_username = stripslashes($postbuzzyuser_username);
    $postbuzzyuser_usernamel1= htmlspecialchars($postbuzzyuser_username, ENT_QUOTES);
	
  //get age from date or birthdate
$afrom = new DateTime($userbirthdate);
$ato   = new DateTime('today');
$postage =  $afrom->diff($ato)->y;

$check_email_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_email='$postbuzzyuser_email'";
$stmt = $connwrite->prepare($check_email_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
$check_username_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_username='$postbuzzyuser_usernamel1'";
$stmt = $connwrite->prepare($check_username_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		
		
foreach ($connread->query($check_email_query) as $row) { 
$check_email=$row['COUNT(*)'];
}

foreach ($connread->query($check_username_query) as $row) { 
$check_username=$row['COUNT(*)'];
}
if($check_email==0 AND $check_username==0) {	
	 $buzzyuser_password=$_POST['buzzyuser_password'];	
     $buzzyuser_password1 = htmlspecialchars($buzzyuser_password, ENT_QUOTES);	
     $enc_buzzyuser_password1=md5($buzzyuser_password1);	 
$ip_address = $_SERVER['REMOTE_ADDR'];
$buzzyuser_location=$_POST['buzzyuser_location'];
 $buzzyuser_location1 = urlencode($buzzyuser_location);
  $request_url = "https://maps.googleapis.com/maps/api/geocode/xml?address=".$buzzyuser_location1."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $new_user_lat = $xml->result->geometry->location->lat;
      $new_user_lon = $xml->result->geometry->location->lng;
  }
if ($status!="OK") {
$ch = curl_init();
            $headr = array();
            $headr[] = 'Content-length: 0';
            $headr[] = 'Content-type: application/json';
            curl_setopt($ch, CURLOPT_URL, 'https://ip-api.com/json/'.$user_ipreal.'');
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; xxxxx)'); // my product name
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $ch_data = curl_exec($ch);
            curl_close($ch);
            if(!empty($ch_data))
            {
            $json_data = json_decode($ch_data, true);
            //print_r($json_data);
            $new_user_city=$json_data['city'];
            $new_user_region=$json_data['country'];
            $new_user_lat=$json_data['lat'];	
            $new_user_lon=$json_data['lon'];			
			}
        $buzzyuser_location = $new_user_city.', '.$new_user_region;			
}						
        $buzzyuser_genre=0;
        $buzzyuser_data_sexual_orientation=1;	 	
        $OK = false;
        // create database connection
        // initialize prepared statement
        // create SQL
		$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
		if($buzzy_access==1){
		$buzzyuser_status=0;	
		}
		else if($buzzy_access==0){
		$buzzyuser_status=0;		
		}
        $register_user = "INSERT INTO  buzzyusers       (buzzyuser_first_name,buzzyuser_last_name,buzzyuser_username,buzzyuser_image,buzzyuser_birthdate,buzzyuser_location,buzzyuser_age,buzzyuser_data_sexual_orientation,buzzyuser_lat,buzzyuser_long,buzzyuser_email,buzzyuser_password,buzzyuser_hash,buzzyuser_registration_date,buzzyuser_last_login,buzzyuser_registration_timestamp,buzzyuser_status_timestamp,buzzyuser_credits,buzzyuser_fbconfirm,
	    buzzyuser_googleconfirm,buzzyuser_emailstatus,buzzyuser_fullnamestatus,buzzyuser_contactsstatus,buzzyuser_visibility,buzzyuser_privacy,buzzyuser_genre,buzzyuser_onlinestatus,buzzyuser_fortumo_tnx,buzzyuser_chatlimit,buzzyuser_animation,buzzyuser_status,buzzyuser_theme,buzzyuser_demostatus)
		 	  VALUES (:buzzyuser_first_name,:buzzyuser_last_name,:buzzyuser_username,'profile-icon1.jpg',:buzzyuser_birthdate,:buzzyuser_location,:buzzyuser_age,:buzzyuser_data_sexual_orientation,
			  :buzzyuser_lat,:buzzyuser_long,:buzzyuser_email,:buzzyuser_password,:buzzyuser_hash,NOW(),:buzzyuser_last_login,:buzzyuser_registration_timestamp,:buzzyuser_status_timestamp,0,0,0,0,0,0,
			  0,0,:buzzyuser_genre,1,'eruezrufjde',0,6,:buzzyuser_status,2,:buzzyuser_demostatus)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyuser_first_name', $_POST['buzzyuser_first_name'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_last_name', $_POST['buzzyuser_last_name'], PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_username', $_POST['buzzyuser_username'], PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyuser_birthdate', $userbirthdate, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_location', $buzzyuser_location, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_age', $postage, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_data_sexual_orientation', $buzzyuser_data_sexual_orientation, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_lat', $new_user_lat, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_long', $new_user_lon, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_email', $_POST['buzzyuser_email'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_password', $enc_buzzyuser_password1, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_hash', $hash, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_last_login', $now, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_registration_timestamp', $now, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyuser_status_timestamp', $now, PDO::PARAM_STR);			
		$stmt->bindParam(':buzzyuser_genre', $buzzyuser_genre, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_status', $buzzyuser_status, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyuser_demostatus', $buzzyuser_demostatus, PDO::PARAM_STR);			
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		if($OK!=0){
        $new_user_query = "SELECT * FROM buzzyusers ORDER by buzzyuser_id DESC LIMIT 1";
		foreach ($connread->query($new_user_query) as $row) { 
		$last_buzzyuser_id=$row['buzzyuser_id'];
		$_SESSION["buzzyuser_id"] = $row['buzzyuser_id'];
		if (isset($_SESSION["buzzyuser_id"])) {
    $register_session_user_query="SELECT * FROM buzzyusers WHERE buzzyuser_id=$last_buzzyuser_id";
    foreach ($connread->query($register_session_user_query) as $row) { 
    $session_buzzyuser_username = $row['buzzyuser_username'];
	$session_buzzyuser_image = $row['buzzyuser_image'];
	$session_buzzyuser_email = $row['buzzyuser_email'];
	$session_buzzyuser_status = $row['buzzyuser_status'];
	$session_buzzyuser_genre = $row['buzzyuser_genre'];	
	$session_buzzyuser_hash = $row['buzzyuser_hash'];
    $register_user_to_messages = "INSERT INTO  users
       (id,username,display_name,profile_image,type_status,last_seen,session_status)
		 	  VALUES (:id,:username,:display_name,'default.jpg','stopped',:last_seen,'offline')";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_messages);
        // bind the parameters and execute the statement
		$stmt->bindParam(':id', $last_buzzyuser_id, PDO::PARAM_STR);
		$stmt->bindParam(':username', $session_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':display_name', $session_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':last_seen', $now, PDO::PARAM_STR);		
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
			
	    $register_user_to_mailing = "INSERT INTO  buzzymailing_list
       (buzzymailing_list_email,buzzymailing_list_timestamp)
		 	  VALUES (:buzzymailing_list_email,:buzzymailing_list_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_mailing);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzymailing_list_email', $session_buzzyuser_email, PDO::PARAM_STR);
		$stmt->bindParam(':buzzymailing_list_timestamp', $now, PDO::PARAM_STR);
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
     }
		
     }
$mail->FromName = 'Activate your profile';
   $mail->addAddress($session_buzzyuser_email);            
  $mail->Subject = 'Do not reply on this message.';
 $mail->Body   = '<div style="background:#eee!important; width:100%!important;">
  <div style="background:#'.$buzzycss_color_css.'!important; width:100%!important; height:130px!important;" >
  <br>
  <p style="text-align:center; padding-top:20px!important;  color:#fff!important; font-size:28px!important; font-family:Comfortaa;" ><img src="https://icons.iconarchive.com/icons/designbolts/free-valentine-heart/48/Heart-icon.png"
  style="margin-right:10px!important; width:32px!important;">'.$buzzysitename.'</p> 
  </div> 
 <div style="width:480px!important; margin:0 auto; height:280px!important; margin-top:20px; position:absolute!important; background:#fff!important;  border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;">
 <div style="width:80px!important; margin:0 auto!important; padding-top:20px!important;"><img src="'.$actual_link2 .'img/'.$session_buzzyuser_image.'" style=" border-radius:120px 120px 120px 120px;
-moz-border-radius:120px 120px 120px 120px;
-webkit-border-radius:120px 120px 120px 120px; width:80px!important; height:80px!important;"></div> 
 <p style="font-size:15px; text-align:center!important; color:#333!important;"><strong>Please activate your profile. Click on button and activate your profile.</strong></p>
 <br>
 <p style="text-align:center!important;"><a class="btn btn-primary" style="
background:#'.$buzzycss_color_css.'!important;
border:0px solid #000;
border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;
padding:8px!important;
color:#fff;
font-size:16px; font-weight:700!important; text-decoration: none;"  href="'.$buzzysiteurl.'/activateyourlink.php?link='.$session_buzzyuser_hash.'">Profile activation</a></p>
 </div>  
 <div class="clearfix"></div>
 <br>
 <p style="margin-left:20px!important; color:#4e4e4e;">
 <span class="links" style="float:left; font-size:13px!important; border:0px solid #333!important;  '.$color_foot.'" >'.$buzzysitename .' &#169;  '.date("Y").' All rights reserved</span></p>
 <br><br><br><br>
  </div>';  
  $mail->AltBody = 'This is the body in plain text for non-HTML mail  clients';    
  if(!$mail->send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
  echo 'Message has been sent';
 }         
		if($buzzy_access==0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		else if($buzzy_access==1 AND $session_buzzyuser_genre!=0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		else if($buzzy_access==1 AND $session_buzzyuser_genre==0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=trial');
		}		
		}
		}
		if($OK==0){
        header('Location:'.$link_prefix.'index.php?error-reg=true');
	    }
	}
	else if($check_email==0 AND $check_username==1) {
    header('Location:'.$link_prefix.'index.php?usernametaken=true');		
	}	
	else{
    header('Location:'.$link_prefix.'index.php?emailtaken=true');	
	}
	}


	
if (isset($_POST['register_userthree'])) {	
	$month=$_POST['month'];
	$day=$_POST['day'];	
	$year=$_POST['year'];
    $post_buzzyuser_birthdate=$year.'-'.$month.'-'.$day;	
	
$userbirthdate = date('Y-m-d', strtotime($post_buzzyuser_birthdate));
    $postbuzzyuser_email=$_POST["buzzyuser_email"];
    $postbuzzyuser_email = stripslashes($postbuzzyuser_email);
    $postbuzzyuser_email1= htmlspecialchars($postbuzzyuser_email, ENT_QUOTES);

    $postbuzzyuser_username=$_POST["buzzyuser_username"];
    $postbuzzyuser_username = stripslashes($postbuzzyuser_username);
    $postbuzzyuser_usernamel1= htmlspecialchars($postbuzzyuser_username, ENT_QUOTES);
	
  //get age from date or birthdate
$afrom = new DateTime($userbirthdate);
$ato   = new DateTime('today');
$postage =  $afrom->diff($ato)->y;

$check_email_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_email='$postbuzzyuser_email'";
$stmt = $connwrite->prepare($check_email_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
$check_username_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_username='$postbuzzyuser_usernamel1'";
$stmt = $connwrite->prepare($check_username_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		
		
foreach ($connread->query($check_email_query) as $row) { 
$check_email=$row['COUNT(*)'];
}

foreach ($connread->query($check_username_query) as $row) { 
$check_username=$row['COUNT(*)'];
}
if($check_email==0 AND $check_username==0) {	
	 $buzzyuser_password=$_POST['buzzyuser_password'];	
     $buzzyuser_password1 = htmlspecialchars($buzzyuser_password, ENT_QUOTES);	
     $enc_buzzyuser_password1=md5($buzzyuser_password1);	 
$ip_address = $_SERVER['REMOTE_ADDR'];
$buzzyuser_location=$_POST['buzzyuser_location'];
 $buzzyuser_location1 = urlencode($buzzyuser_location);
  $request_url = "https://maps.googleapis.com/maps/api/geocode/xml?address=".$buzzyuser_location1."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $new_user_lat = $xml->result->geometry->location->lat;
      $new_user_lon = $xml->result->geometry->location->lng;
  }
if ($status!="OK") {
$ch = curl_init();
            $headr = array();
            $headr[] = 'Content-length: 0';
            $headr[] = 'Content-type: application/json';
            curl_setopt($ch, CURLOPT_URL, 'https://ip-api.com/json/'.$user_ipreal.'');
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; xxxxx)'); // my product name
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $ch_data = curl_exec($ch);
            curl_close($ch);
            if(!empty($ch_data))
            {
            $json_data = json_decode($ch_data, true);
            //print_r($json_data);
            $new_user_city=$json_data['city'];
            $new_user_region=$json_data['country'];
            $new_user_lat=$json_data['lat'];	
            $new_user_lon=$json_data['lon'];			
			}
        $buzzyuser_location = $new_user_city.', '.$new_user_region;			
}						
        $buzzyuser_genre=0;
        $buzzyuser_data_sexual_orientation=2;	 	
        $OK = false;
        // create database connection
        // initialize prepared statement
        // create SQL
		$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
		if($buzzy_access==1){
		$buzzyuser_status=0;	
		}
		else if($buzzy_access==0){
		$buzzyuser_status=0;		
		}
        $register_user = "INSERT INTO  buzzyusers
       (buzzyuser_first_name,buzzyuser_last_name,buzzyuser_username,buzzyuser_image,buzzyuser_birthdate,buzzyuser_location,buzzyuser_age,buzzyuser_data_sexual_orientation,buzzyuser_lat,buzzyuser_long,buzzyuser_email,buzzyuser_password,buzzyuser_hash,buzzyuser_registration_date,buzzyuser_last_login,buzzyuser_registration_timestamp,buzzyuser_status_timestamp,buzzyuser_credits,buzzyuser_fbconfirm,
	    buzzyuser_googleconfirm,buzzyuser_emailstatus,buzzyuser_fullnamestatus,buzzyuser_contactsstatus,buzzyuser_visibility,buzzyuser_privacy,buzzyuser_genre,buzzyuser_onlinestatus,buzzyuser_fortumo_tnx,buzzyuser_chatlimit,buzzyuser_animation,buzzyuser_status,buzzyuser_theme,buzzyuser_demostatus)
		 	  VALUES (:buzzyuser_first_name,:buzzyuser_last_name,:buzzyuser_username,'profile-icon1.jpg',:buzzyuser_birthdate,:buzzyuser_location,:buzzyuser_age,:buzzyuser_data_sexual_orientation,
			  :buzzyuser_lat,:buzzyuser_long,:buzzyuser_email,:buzzyuser_password,:buzzyuser_hash,NOW(),:buzzyuser_last_login,:buzzyuser_registration_timestamp,:buzzyuser_status_timestamp,0,0,0,0,0,0,
			  0,0,:buzzyuser_genre,1,'eruezrufjde',0,6,:buzzyuser_status,2,:buzzyuser_demostatus)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyuser_first_name', $_POST['buzzyuser_first_name'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_last_name', $_POST['buzzyuser_last_name'], PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_username', $_POST['buzzyuser_username'], PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyuser_birthdate', $userbirthdate, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_location', $buzzyuser_location, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_age', $postage, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_data_sexual_orientation', $buzzyuser_data_sexual_orientation, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_lat', $new_user_lat, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_long', $new_user_lon, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_email', $_POST['buzzyuser_email'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_password', $enc_buzzyuser_password1, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_hash', $hash, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_last_login', $now, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_registration_timestamp', $now, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyuser_status_timestamp', $now, PDO::PARAM_STR);			
		$stmt->bindParam(':buzzyuser_genre', $buzzyuser_genre, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_status', $buzzyuser_status, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_demostatus', $buzzyuser_demostatus, PDO::PARAM_STR);			
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		if($OK!=0){
        $new_user_query = "SELECT * FROM buzzyusers ORDER by buzzyuser_id DESC LIMIT 1";
		foreach ($connread->query($new_user_query) as $row) { 
		$last_buzzyuser_id=$row['buzzyuser_id'];
		$_SESSION["buzzyuser_id"] = $row['buzzyuser_id'];
		if (isset($_SESSION["buzzyuser_id"])) {
    $register_session_user_query="SELECT * FROM buzzyusers WHERE buzzyuser_id=$last_buzzyuser_id";
    foreach ($connread->query($register_session_user_query) as $row) { 
    $session_buzzyuser_username = $row['buzzyuser_username'];
	$session_buzzyuser_image = $row['buzzyuser_image'];
	$session_buzzyuser_email = $row['buzzyuser_email'];
	$session_buzzyuser_status = $row['buzzyuser_status'];
	$session_buzzyuser_genre = $row['buzzyuser_genre'];	
	$session_buzzyuser_hash = $row['buzzyuser_hash'];
    $register_user_to_messages = "INSERT INTO  users
       (id,username,display_name,profile_image,type_status,last_seen,session_status)
		 	  VALUES (:id,:username,:display_name,'default.jpg','stopped',:last_seen,'offline')";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_messages);
        // bind the parameters and execute the statement
		$stmt->bindParam(':id', $last_buzzyuser_id, PDO::PARAM_STR);
		$stmt->bindParam(':username', $session_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':display_name', $session_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':last_seen', $now, PDO::PARAM_STR);		
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
			
	    $register_user_to_mailing = "INSERT INTO  buzzymailing_list
       (buzzymailing_list_email,buzzymailing_list_timestamp)
		 	  VALUES (:buzzymailing_list_email,:buzzymailing_list_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_mailing);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzymailing_list_email', $session_buzzyuser_email, PDO::PARAM_STR);
		$stmt->bindParam(':buzzymailing_list_timestamp', $now, PDO::PARAM_STR);
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
     }
		
     }
$mail->FromName = 'Activate your profile';
   $mail->addAddress($session_buzzyuser_email);            
  $mail->Subject = 'Do not reply on this message.';
  $mail->Body   = '<div style="background:#eee!important; width:100%!important;">
  <div style="background:#'.$buzzycss_color_css.'!important; width:100%!important; height:130px!important;" >
  <br>
  <p style="text-align:center; padding-top:20px!important;  color:#fff!important; font-size:28px!important; font-family:Comfortaa;" ><img src="https://icons.iconarchive.com/icons/designbolts/free-valentine-heart/48/Heart-icon.png"
  style="margin-right:10px!important; width:32px!important;">'.$buzzysitename.'</p> 
  </div> 
 <div style="width:480px!important; margin:0 auto; height:280px!important; margin-top:20px; position:absolute!important; background:#fff!important;  border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;">
 <div style="width:80px!important; margin:0 auto!important; padding-top:20px!important;"><img src="'.$actual_link2 .'img/'.$session_buzzyuser_image.'" style=" border-radius:120px 120px 120px 120px;
-moz-border-radius:120px 120px 120px 120px;
-webkit-border-radius:120px 120px 120px 120px; width:80px!important; height:80px!important;"></div> 
 <p style="font-size:15px; text-align:center!important; color:#333!important;"><strong>Please activate your profile. Click on button and activate your profile.</strong></p>
 <br>
 <p style="text-align:center!important;"><a class="btn btn-primary" style="
background:#'.$buzzycss_color_css.'!important;
border:0px solid #000;
border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;
padding:8px!important;
color:#fff;
font-size:16px; font-weight:700!important; text-decoration: none;"  href="'.$buzzysiteurl.'/activateyourlink.php?link='.$session_buzzyuser_hash.'">Profile activation</a></p>
 </div>  
 <div class="clearfix"></div>
 <br>
 <p style="margin-left:20px!important; color:#4e4e4e;">
 <span class="links" style="float:left; font-size:13px!important; border:0px solid #333!important;  '.$color_foot.'" >'.$buzzysitename .' &#169;  '.date("Y").' All rights reserved</span></p>
 <br><br><br><br>
  </div>';  
  $mail->AltBody = 'This is the body in plain text for non-HTML mail  clients';    
   if(!$mail->send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
  echo 'Message has been sent';
 }        
		if($buzzy_access==0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		else if($buzzy_access==1 AND $session_buzzyuser_genre!=0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		else if($buzzy_access==1 AND $session_buzzyuser_genre==0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=trial');
		}		
		}
		}
		if($OK==0){
        header('Location:'.$link_prefix.'index.php?error-reg=true');
	    }
	}
	else if($check_email==0 AND $check_username==1) {
    header('Location:'.$link_prefix.'index.php?usernametaken=true');		
	}	
	else{
    header('Location:'.$link_prefix.'index.php?emailtaken=true');	
	}
	}

	
	





if (isset($_POST['register_userfour'])) {	
	$month=$_POST['month'];
	$day=$_POST['day'];	
	$year=$_POST['year'];
    $post_buzzyuser_birthdate=$year.'-'.$month.'-'.$day;	
	
$userbirthdate = date('Y-m-d', strtotime($post_buzzyuser_birthdate));
    $postbuzzyuser_email=$_POST["buzzyuser_email"];
    $postbuzzyuser_email = stripslashes($postbuzzyuser_email);
    $postbuzzyuser_email1= htmlspecialchars($postbuzzyuser_email, ENT_QUOTES);

    $postbuzzyuser_username=$_POST["buzzyuser_username"];
    $postbuzzyuser_username = stripslashes($postbuzzyuser_username);
    $postbuzzyuser_usernamel1= htmlspecialchars($postbuzzyuser_username, ENT_QUOTES);
	
  //get age from date or birthdate
$afrom = new DateTime($userbirthdate);
$ato   = new DateTime('today');
$postage =  $afrom->diff($ato)->y;

$check_email_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_email='$postbuzzyuser_email'";
$stmt = $connwrite->prepare($check_email_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
$check_username_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_username='$postbuzzyuser_usernamel1'";
$stmt = $connwrite->prepare($check_username_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		
		
foreach ($connread->query($check_email_query) as $row) { 
$check_email=$row['COUNT(*)'];
}

foreach ($connread->query($check_username_query) as $row) { 
$check_username=$row['COUNT(*)'];
}
if($check_email==0 AND $check_username==0) {	
	 $buzzyuser_password=$_POST['buzzyuser_password'];	
     $buzzyuser_password1 = htmlspecialchars($buzzyuser_password, ENT_QUOTES);	
     $enc_buzzyuser_password1=md5($buzzyuser_password1);	 
$ip_address = $_SERVER['REMOTE_ADDR'];
$buzzyuser_location=$_POST['buzzyuser_location'];
 $buzzyuser_location1 = urlencode($buzzyuser_location);
  $request_url = "https://maps.googleapis.com/maps/api/geocode/xml?address=".$buzzyuser_location1."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $new_user_lat = $xml->result->geometry->location->lat;
      $new_user_lon = $xml->result->geometry->location->lng;
  }
if ($status!="OK") {
$ch = curl_init();
            $headr = array();
            $headr[] = 'Content-length: 0';
            $headr[] = 'Content-type: application/json';
            curl_setopt($ch, CURLOPT_URL, 'https://ip-api.com/json/'.$user_ipreal.'');
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; xxxxx)'); // my product name
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $ch_data = curl_exec($ch);
            curl_close($ch);
            if(!empty($ch_data))
            {
            $json_data = json_decode($ch_data, true);
            //print_r($json_data);
            $new_user_city=$json_data['city'];
            $new_user_region=$json_data['country'];
            $new_user_lat=$json_data['lat'];	
            $new_user_lon=$json_data['lon'];			
			}
        $buzzyuser_location = $new_user_city.', '.$new_user_region;			
}						
        $buzzyuser_genre=1;
        $buzzyuser_data_sexual_orientation=0;	 	
        $OK = false;
        // create database connection
        // initialize prepared statement
        // create SQL
		$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
		if($buzzy_access==1){
		$buzzyuser_status=0;	
		}
		else if($buzzy_access==0){
		$buzzyuser_status=0;		
		}
        $register_user = "INSERT INTO  buzzyusers
       (buzzyuser_first_name,buzzyuser_last_name,buzzyuser_username,buzzyuser_image,buzzyuser_birthdate,buzzyuser_location,buzzyuser_age,buzzyuser_data_sexual_orientation,buzzyuser_lat,buzzyuser_long,buzzyuser_email,buzzyuser_password,buzzyuser_hash,buzzyuser_registration_date,buzzyuser_last_login,buzzyuser_registration_timestamp,buzzyuser_status_timestamp,buzzyuser_credits,buzzyuser_fbconfirm,
	    buzzyuser_googleconfirm,buzzyuser_emailstatus,buzzyuser_fullnamestatus,buzzyuser_contactsstatus,buzzyuser_visibility,buzzyuser_privacy,buzzyuser_genre,buzzyuser_onlinestatus,buzzyuser_fortumo_tnx,buzzyuser_chatlimit,buzzyuser_animation,buzzyuser_status,buzzyuser_theme,buzzyuser_demostatus)
		 	  VALUES (:buzzyuser_first_name,:buzzyuser_last_name,:buzzyuser_username,'profile-icon1.jpg',:buzzyuser_birthdate,:buzzyuser_location,:buzzyuser_age,:buzzyuser_data_sexual_orientation,
			  :buzzyuser_lat,:buzzyuser_long,:buzzyuser_email,:buzzyuser_password,:buzzyuser_hash,NOW(),:buzzyuser_last_login,:buzzyuser_registration_timestamp,:buzzyuser_status_timestamp,0,0,0,0,0,0,
			  0,0,:buzzyuser_genre,1,'eruezrufjde',0,6,:buzzyuser_status,2,:buzzyuser_demostatus)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyuser_first_name', $_POST['buzzyuser_first_name'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_last_name', $_POST['buzzyuser_last_name'], PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_username', $_POST['buzzyuser_username'], PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyuser_birthdate', $userbirthdate, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_location', $buzzyuser_location, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_age', $postage, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_data_sexual_orientation', $buzzyuser_data_sexual_orientation, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_lat', $new_user_lat, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_long', $new_user_lon, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_email', $_POST['buzzyuser_email'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_password', $enc_buzzyuser_password1, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_hash', $hash, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_last_login', $now, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_registration_timestamp', $now, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyuser_status_timestamp', $now, PDO::PARAM_STR);			
		$stmt->bindParam(':buzzyuser_genre', $buzzyuser_genre, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_status', $buzzyuser_status, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyuser_demostatus', $buzzyuser_demostatus, PDO::PARAM_STR);			
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		if($OK!=0){
        $new_user_query = "SELECT * FROM buzzyusers ORDER by buzzyuser_id DESC LIMIT 1";
		foreach ($connread->query($new_user_query) as $row) { 
		$last_buzzyuser_id=$row['buzzyuser_id'];
		$_SESSION["buzzyuser_id"] = $row['buzzyuser_id'];
		if (isset($_SESSION["buzzyuser_id"])) {
    $register_session_user_query="SELECT * FROM buzzyusers WHERE buzzyuser_id=$last_buzzyuser_id";
    foreach ($connread->query($register_session_user_query) as $row) { 
    $session_buzzyuser_username = $row['buzzyuser_username'];
	$session_buzzyuser_image = $row['buzzyuser_image'];
	$session_buzzyuser_email = $row['buzzyuser_email'];
	$session_buzzyuser_status = $row['buzzyuser_status'];
	$session_buzzyuser_genre = $row['buzzyuser_genre'];	
	$session_buzzyuser_hash = $row['buzzyuser_hash'];
    $register_user_to_messages = "INSERT INTO  users
       (id,username,display_name,profile_image,type_status,last_seen,session_status)
		 	  VALUES (:id,:username,:display_name,'default.jpg','stopped',:last_seen,'offline')";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_messages);
        // bind the parameters and execute the statement
		$stmt->bindParam(':id', $last_buzzyuser_id, PDO::PARAM_STR);
		$stmt->bindParam(':username', $session_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':display_name', $session_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':last_seen', $now, PDO::PARAM_STR);		
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
			
	    $register_user_to_mailing = "INSERT INTO  buzzymailing_list
       (buzzymailing_list_email,buzzymailing_list_timestamp)
		 	  VALUES (:buzzymailing_list_email,:buzzymailing_list_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_mailing);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzymailing_list_email', $session_buzzyuser_email, PDO::PARAM_STR);
		$stmt->bindParam(':buzzymailing_list_timestamp', $now, PDO::PARAM_STR);
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
     }
		
     }
$mail->FromName = 'Activate your profile';
   $mail->addAddress($session_buzzyuser_email);            
  $mail->Subject = 'Do not reply on this message.';
 $mail->Body   = '<div style="background:#eee!important; width:100%!important;">
  <div style="background:#'.$buzzycss_color_css.'!important; width:100%!important; height:130px!important;" >
  <br>
  <p style="text-align:center; padding-top:20px!important;  color:#fff!important; font-size:28px!important; font-family:Comfortaa;" ><img src="https://icons.iconarchive.com/icons/designbolts/free-valentine-heart/48/Heart-icon.png"
  style="margin-right:10px!important; width:32px!important;">'.$buzzysitename.'</p> 
  </div> 
 <div style="width:480px!important; margin:0 auto; height:280px!important; margin-top:20px; position:absolute!important; background:#fff!important;  border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;">
 <div style="width:80px!important; margin:0 auto!important; padding-top:20px!important;"><img src="'.$actual_link2 .'img/'.$session_buzzyuser_image.'" style=" border-radius:120px 120px 120px 120px;
-moz-border-radius:120px 120px 120px 120px;
-webkit-border-radius:120px 120px 120px 120px; width:80px!important; height:80px!important;"></div> 
 <p style="font-size:15px; text-align:center!important; color:#333!important;"><strong>Please activate your profile. Click on button and activate your profile.</strong></p>
 <br>
 <p style="text-align:center!important;"><a class="btn btn-primary" style="
background:#'.$buzzycss_color_css.'!important;
border:0px solid #000;
border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;
padding:8px!important;
color:#fff;
font-size:16px; font-weight:700!important; text-decoration: none;"  href="'.$buzzysiteurl.'/activateyourlink.php?link='.$session_buzzyuser_hash.'">Profile activation</a></p>
 </div>  
 <div class="clearfix"></div>
 <br>
 <p style="margin-left:20px!important; color:#4e4e4e;">
 <span class="links" style="float:left; font-size:13px!important; border:0px solid #333!important;  '.$color_foot.'" >'.$buzzysitename .' &#169;  '.date("Y").' All rights reserved</span></p>
 <br><br><br><br>
  </div>';  
  $mail->AltBody = 'This is the body in plain text for non-HTML mail  clients';    
   if(!$mail->send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
  echo 'Message has been sent';
 }        
		if($buzzy_access==0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		else if($buzzy_access==1 AND $session_buzzyuser_genre!=0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		else if($buzzy_access==1 AND $session_buzzyuser_genre==0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=trial');
		}		
		}
		}
		if($OK==0){
        header('Location:'.$link_prefix.'index.php?error-reg=true');
	    }
	}
	else if($check_email==0 AND $check_username==1) {
    header('Location:'.$link_prefix.'index.php?usernametaken=true');		
	}	
	else{
    header('Location:'.$link_prefix.'index.php?emailtaken=true');	
	}
	}



if (isset($_POST['register_userfive'])) {	
	$month=$_POST['month'];
	$day=$_POST['day'];	
	$year=$_POST['year'];
    $post_buzzyuser_birthdate=$year.'-'.$month.'-'.$day;	
	
$userbirthdate = date('Y-m-d', strtotime($post_buzzyuser_birthdate));
    $postbuzzyuser_email=$_POST["buzzyuser_email"];
    $postbuzzyuser_email = stripslashes($postbuzzyuser_email);
    $postbuzzyuser_email1= htmlspecialchars($postbuzzyuser_email, ENT_QUOTES);

    $postbuzzyuser_username=$_POST["buzzyuser_username"];
    $postbuzzyuser_username = stripslashes($postbuzzyuser_username);
    $postbuzzyuser_usernamel1= htmlspecialchars($postbuzzyuser_username, ENT_QUOTES);
	
  //get age from date or birthdate
$afrom = new DateTime($userbirthdate);
$ato   = new DateTime('today');
$postage =  $afrom->diff($ato)->y;

$check_email_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_email='$postbuzzyuser_email'";
$stmt = $connwrite->prepare($check_email_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
$check_username_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_username='$postbuzzyuser_usernamel1'";
$stmt = $connwrite->prepare($check_username_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		
		
foreach ($connread->query($check_email_query) as $row) { 
$check_email=$row['COUNT(*)'];
}

foreach ($connread->query($check_username_query) as $row) { 
$check_username=$row['COUNT(*)'];
}
if($check_email==0 AND $check_username==0) {	
	 $buzzyuser_password=$_POST['buzzyuser_password'];	
     $buzzyuser_password1 = htmlspecialchars($buzzyuser_password, ENT_QUOTES);	
     $enc_buzzyuser_password1=md5($buzzyuser_password1);	 
$ip_address = $_SERVER['REMOTE_ADDR'];
$buzzyuser_location=$_POST['buzzyuser_location'];
 $buzzyuser_location1 = urlencode($buzzyuser_location);
  $request_url = "https://maps.googleapis.com/maps/api/geocode/xml?address=".$buzzyuser_location1."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $new_user_lat = $xml->result->geometry->location->lat;
      $new_user_lon = $xml->result->geometry->location->lng;
  }
if ($status!="OK") {
$ch = curl_init();
            $headr = array();
            $headr[] = 'Content-length: 0';
            $headr[] = 'Content-type: application/json';
            curl_setopt($ch, CURLOPT_URL, 'https://ip-api.com/json/'.$user_ipreal.'');
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; xxxxx)'); // my product name
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $ch_data = curl_exec($ch);
            curl_close($ch);
            if(!empty($ch_data))
            {
            $json_data = json_decode($ch_data, true);
            //print_r($json_data);
            $new_user_city=$json_data['city'];
            $new_user_region=$json_data['country'];
            $new_user_lat=$json_data['lat'];	
            $new_user_lon=$json_data['lon'];			
			}
        $buzzyuser_location = $new_user_city.', '.$new_user_region;			
}						
        $buzzyuser_genre=1;
        $buzzyuser_data_sexual_orientation=1;	 	
        $OK = false;
        // create database connection
        // initialize prepared statement
        // create SQL
		$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
		if($buzzy_access==1){
		$buzzyuser_status=0;	
		}
		else if($buzzy_access==0){
		$buzzyuser_status=0;		
		}
        $register_user = "INSERT INTO  buzzyusers
       (buzzyuser_first_name,buzzyuser_last_name,buzzyuser_username,buzzyuser_image,buzzyuser_birthdate,buzzyuser_location,buzzyuser_age,buzzyuser_data_sexual_orientation,buzzyuser_lat,buzzyuser_long,buzzyuser_email,buzzyuser_password,buzzyuser_hash,buzzyuser_registration_date,buzzyuser_last_login,buzzyuser_registration_timestamp,buzzyuser_status_timestamp,buzzyuser_credits,buzzyuser_fbconfirm,
	    buzzyuser_googleconfirm,buzzyuser_emailstatus,buzzyuser_fullnamestatus,buzzyuser_contactsstatus,buzzyuser_visibility,buzzyuser_privacy,buzzyuser_genre,buzzyuser_onlinestatus,buzzyuser_fortumo_tnx,buzzyuser_chatlimit,buzzyuser_animation,buzzyuser_status,buzzyuser_theme,buzzyuser_demostatus)
		 	  VALUES (:buzzyuser_first_name,:buzzyuser_last_name,:buzzyuser_username,'profile-icon1.jpg',:buzzyuser_birthdate,:buzzyuser_location,:buzzyuser_age,:buzzyuser_data_sexual_orientation,
			  :buzzyuser_lat,:buzzyuser_long,:buzzyuser_email,:buzzyuser_password,:buzzyuser_hash,NOW(),:buzzyuser_last_login,:buzzyuser_registration_timestamp,:buzzyuser_status_timestamp,0,0,0,0,0,0,
			  0,0,:buzzyuser_genre,1,'eruezrufjde',0,6,:buzzyuser_status,2,:buzzyuser_demostatus)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyuser_first_name', $_POST['buzzyuser_first_name'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_last_name', $_POST['buzzyuser_last_name'], PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_username', $_POST['buzzyuser_username'], PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyuser_birthdate', $userbirthdate, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_location', $buzzyuser_location, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_age', $postage, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_data_sexual_orientation', $buzzyuser_data_sexual_orientation, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_lat', $new_user_lat, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_long', $new_user_lon, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_email', $_POST['buzzyuser_email'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_password', $enc_buzzyuser_password1, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_hash', $hash, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_last_login', $now, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_registration_timestamp', $now, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyuser_status_timestamp', $now, PDO::PARAM_STR);			
		$stmt->bindParam(':buzzyuser_genre', $buzzyuser_genre, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_status', $buzzyuser_status, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyuser_demostatus', $buzzyuser_demostatus, PDO::PARAM_STR);			
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		if($OK!=0){
        $new_user_query = "SELECT * FROM buzzyusers ORDER by buzzyuser_id DESC LIMIT 1";
		foreach ($connread->query($new_user_query) as $row) { 
		$last_buzzyuser_id=$row['buzzyuser_id'];
		$_SESSION["buzzyuser_id"] = $row['buzzyuser_id'];
		if (isset($_SESSION["buzzyuser_id"])) {
    $register_session_user_query="SELECT * FROM buzzyusers WHERE buzzyuser_id=$last_buzzyuser_id";
    foreach ($connread->query($register_session_user_query) as $row) { 
    $session_buzzyuser_username = $row['buzzyuser_username'];
	$session_buzzyuser_image = $row['buzzyuser_image'];
	$session_buzzyuser_email = $row['buzzyuser_email'];
	$session_buzzyuser_status = $row['buzzyuser_status'];
	$session_buzzyuser_genre = $row['buzzyuser_genre'];	
	$session_buzzyuser_hash = $row['buzzyuser_hash'];
    $register_user_to_messages = "INSERT INTO  users
       (id,username,display_name,profile_image,type_status,last_seen,session_status)
		 	  VALUES (:id,:username,:display_name,'default.jpg','stopped',:last_seen,'offline')";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_messages);
        // bind the parameters and execute the statement
		$stmt->bindParam(':id', $last_buzzyuser_id, PDO::PARAM_STR);
		$stmt->bindParam(':username', $session_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':display_name', $session_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':last_seen', $now, PDO::PARAM_STR);		
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
			
	    $register_user_to_mailing = "INSERT INTO  buzzymailing_list
       (buzzymailing_list_email,buzzymailing_list_timestamp)
		 	  VALUES (:buzzymailing_list_email,:buzzymailing_list_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_mailing);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzymailing_list_email', $session_buzzyuser_email, PDO::PARAM_STR);
		$stmt->bindParam(':buzzymailing_list_timestamp', $now, PDO::PARAM_STR);
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
     }
		
     }
$mail->FromName = 'Activate your profile';
   $mail->addAddress($session_buzzyuser_email);            
  $mail->Subject = 'Do not reply on this message.';
   $mail->Body   = '<div style="background:#eee!important; width:100%!important;">
  <div style="background:#'.$buzzycss_color_css.'!important; width:100%!important; height:130px!important;" >
  <br>
  <p style="text-align:center; padding-top:20px!important;  color:#fff!important; font-size:28px!important; font-family:Comfortaa;" ><img src="https://icons.iconarchive.com/icons/designbolts/free-valentine-heart/48/Heart-icon.png"
  style="margin-right:10px!important; width:32px!important;">'.$buzzysitename.'</p> 
  </div> 
 <div style="width:480px!important; margin:0 auto; height:280px!important; margin-top:20px; position:absolute!important; background:#fff!important;  border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;">
 <div style="width:80px!important; margin:0 auto!important; padding-top:20px!important;"><img src="'.$actual_link2 .'img/'.$session_buzzyuser_image.'" style=" border-radius:120px 120px 120px 120px;
-moz-border-radius:120px 120px 120px 120px;
-webkit-border-radius:120px 120px 120px 120px; width:80px!important; height:80px!important;"></div> 
 <p style="font-size:15px; text-align:center!important; color:#333!important;"><strong>Please activate your profile. Click on button and activate your profile.</strong></p>
 <br>
 <p style="text-align:center!important;"><a class="btn btn-primary" style="
background:#'.$buzzycss_color_css.'!important;
border:0px solid #000;
border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;
padding:8px!important;
color:#fff;
font-size:16px; font-weight:700!important; text-decoration: none;"  href="'.$buzzysiteurl.'/activateyourlink.php?link='.$session_buzzyuser_hash.'">Profile activation</a></p>
 </div>  
 <div class="clearfix"></div>
 <br>
 <p style="margin-left:20px!important; color:#4e4e4e;">
 <span class="links" style="float:left; font-size:13px!important; border:0px solid #333!important;  '.$color_foot.'" >'.$buzzysitename .' &#169;  '.date("Y").' All rights reserved</span></p>
 <br><br><br><br>
  </div>';  
  $mail->AltBody = 'This is the body in plain text for non-HTML mail  clients';    
  if(!$mail->send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
  echo 'Message has been sent';
 }         
		if($buzzy_access==0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		else if($buzzy_access==1 AND $session_buzzyuser_genre!=0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		else if($buzzy_access==1 AND $session_buzzyuser_genre==0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=trial');
		}		
		}
		}
		if($OK==0){
        header('Location:'.$link_prefix.'index.php?error-reg=true');
	    }
	}
	else if($check_email==0 AND $check_username==1) {
    header('Location:'.$link_prefix.'index.php?usernametaken=true');		
	}	
	else{
    header('Location:'.$link_prefix.'index.php?emailtaken=true');	
	}
	}


	
if (isset($_POST['register_usersix'])) {	
	$month=$_POST['month'];
	$day=$_POST['day'];	
	$year=$_POST['year'];
    $post_buzzyuser_birthdate=$year.'-'.$month.'-'.$day;	
	
$userbirthdate = date('Y-m-d', strtotime($post_buzzyuser_birthdate));
    $postbuzzyuser_email=$_POST["buzzyuser_email"];
    $postbuzzyuser_email = stripslashes($postbuzzyuser_email);
    $postbuzzyuser_email1= htmlspecialchars($postbuzzyuser_email, ENT_QUOTES);

    $postbuzzyuser_username=$_POST["buzzyuser_username"];
    $postbuzzyuser_username = stripslashes($postbuzzyuser_username);
    $postbuzzyuser_usernamel1= htmlspecialchars($postbuzzyuser_username, ENT_QUOTES);
	
  //get age from date or birthdate
$afrom = new DateTime($userbirthdate);
$ato   = new DateTime('today');
$postage =  $afrom->diff($ato)->y;

$check_email_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_email='$postbuzzyuser_email'";
$stmt = $connwrite->prepare($check_email_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
$check_username_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_username='$postbuzzyuser_usernamel1'";
$stmt = $connwrite->prepare($check_username_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		
		
foreach ($connread->query($check_email_query) as $row) { 
$check_email=$row['COUNT(*)'];
}

foreach ($connread->query($check_username_query) as $row) { 
$check_username=$row['COUNT(*)'];
}
if($check_email==0 AND $check_username==0) {	
	 $buzzyuser_password=$_POST['buzzyuser_password'];	
     $buzzyuser_password1 = htmlspecialchars($buzzyuser_password, ENT_QUOTES);	
     $enc_buzzyuser_password1=md5($buzzyuser_password1);	 
$ip_address = $_SERVER['REMOTE_ADDR'];
$buzzyuser_location=$_POST['buzzyuser_location'];
 $buzzyuser_location1 = urlencode($buzzyuser_location);
  $request_url = "https://maps.googleapis.com/maps/api/geocode/xml?address=".$buzzyuser_location1."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $new_user_lat = $xml->result->geometry->location->lat;
      $new_user_lon = $xml->result->geometry->location->lng;
  }
if ($status!="OK") {
$ch = curl_init();
            $headr = array();
            $headr[] = 'Content-length: 0';
            $headr[] = 'Content-type: application/json';
            curl_setopt($ch, CURLOPT_URL, 'https://ip-api.com/json/'.$user_ipreal.'');
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; xxxxx)'); // my product name
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $ch_data = curl_exec($ch);
            curl_close($ch);
            if(!empty($ch_data))
            {
            $json_data = json_decode($ch_data, true);
            //print_r($json_data);
            $new_user_city=$json_data['city'];
            $new_user_region=$json_data['country'];
            $new_user_lat=$json_data['lat'];	
            $new_user_lon=$json_data['lon'];			
			}
        $buzzyuser_location = $new_user_city.', '.$new_user_region;			
}						
        $buzzyuser_genre=1;
        $buzzyuser_data_sexual_orientation=2;	 	
        $OK = false;
        // create database connection
        // initialize prepared statement
        // create SQL
		$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
		if($buzzy_access==1){
		$buzzyuser_status=0;	
		}
		else if($buzzy_access==0){
		$buzzyuser_status=0;		
		}
        $register_user = "INSERT INTO  buzzyusers
       (buzzyuser_first_name,buzzyuser_last_name,buzzyuser_username,buzzyuser_image,buzzyuser_birthdate,buzzyuser_location,buzzyuser_age,buzzyuser_data_sexual_orientation,buzzyuser_lat,buzzyuser_long,buzzyuser_email,buzzyuser_password,buzzyuser_hash,buzzyuser_registration_date,buzzyuser_last_login,buzzyuser_registration_timestamp,buzzyuser_status_timestamp,buzzyuser_credits,buzzyuser_fbconfirm,
	    buzzyuser_googleconfirm,buzzyuser_emailstatus,buzzyuser_fullnamestatus,buzzyuser_contactsstatus,buzzyuser_visibility,buzzyuser_privacy,buzzyuser_genre,buzzyuser_onlinestatus,buzzyuser_fortumo_tnx,buzzyuser_chatlimit,buzzyuser_animation,buzzyuser_status,buzzyuser_theme,buzzyuser_demostatus)
		 	  VALUES (:buzzyuser_first_name,:buzzyuser_last_name,:buzzyuser_username,'profile-icon1.jpg',:buzzyuser_birthdate,:buzzyuser_location,:buzzyuser_age,:buzzyuser_data_sexual_orientation,
			  :buzzyuser_lat,:buzzyuser_long,:buzzyuser_email,:buzzyuser_password,:buzzyuser_hash,NOW(),:buzzyuser_last_login,:buzzyuser_registration_timestamp,:buzzyuser_status_timestamp,0,0,0,0,0,0,
			  0,0,:buzzyuser_genre,1,'eruezrufjde',0,6,:buzzyuser_status,2,:buzzyuser_demostatus)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyuser_first_name', $_POST['buzzyuser_first_name'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_last_name', $_POST['buzzyuser_last_name'], PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_username', $_POST['buzzyuser_username'], PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyuser_birthdate', $userbirthdate, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_location', $buzzyuser_location, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_age', $postage, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_data_sexual_orientation', $buzzyuser_data_sexual_orientation, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_lat', $new_user_lat, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_long', $new_user_lon, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_email', $_POST['buzzyuser_email'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_password', $enc_buzzyuser_password1, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_hash', $hash, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_last_login', $now, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_registration_timestamp', $now, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyuser_status_timestamp', $now, PDO::PARAM_STR);			
		$stmt->bindParam(':buzzyuser_genre', $buzzyuser_genre, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_status', $buzzyuser_status, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyuser_demostatus', $buzzyuser_demostatus, PDO::PARAM_STR);			
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		if($OK!=0){
        $new_user_query = "SELECT * FROM buzzyusers ORDER by buzzyuser_id DESC LIMIT 1";
		foreach ($connread->query($new_user_query) as $row) { 
		$last_buzzyuser_id=$row['buzzyuser_id'];
		$_SESSION["buzzyuser_id"] = $row['buzzyuser_id'];
		if (isset($_SESSION["buzzyuser_id"])) {
    $register_session_user_query="SELECT * FROM buzzyusers WHERE buzzyuser_id=$last_buzzyuser_id";
    foreach ($connread->query($register_session_user_query) as $row) { 
    $session_buzzyuser_username = $row['buzzyuser_username'];
	$session_buzzyuser_image = $row['buzzyuser_image'];
	$session_buzzyuser_email = $row['buzzyuser_email'];
	$session_buzzyuser_status = $row['buzzyuser_status'];
	$session_buzzyuser_genre = $row['buzzyuser_genre'];	
	$session_buzzyuser_hash = $row['buzzyuser_hash'];
    $register_user_to_messages = "INSERT INTO  users
       (id,username,display_name,profile_image,type_status,last_seen,session_status)
		 	  VALUES (:id,:username,:display_name,'default.jpg','stopped',:last_seen,'offline')";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_messages);
        // bind the parameters and execute the statement
		$stmt->bindParam(':id', $last_buzzyuser_id, PDO::PARAM_STR);
		$stmt->bindParam(':username', $session_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':display_name', $session_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':last_seen', $now, PDO::PARAM_STR);		
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
			
	    $register_user_to_mailing = "INSERT INTO  buzzymailing_list
       (buzzymailing_list_email,buzzymailing_list_timestamp)
		 	  VALUES (:buzzymailing_list_email,:buzzymailing_list_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_mailing);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzymailing_list_email', $session_buzzyuser_email, PDO::PARAM_STR);
		$stmt->bindParam(':buzzymailing_list_timestamp', $now, PDO::PARAM_STR);
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
     }		
     }
$mail->FromName = 'Activate your profile';
   $mail->addAddress($session_buzzyuser_email);            
  $mail->Subject = 'Do not reply on this message.';
  $mail->Body   = '<div style="background:#eee!important; width:100%!important;">
  <div style="background:#'.$buzzycss_color_css.'!important; width:100%!important; height:130px!important;" >
  <br>
  <p style="text-align:center; padding-top:20px!important;  color:#fff!important; font-size:28px!important; font-family:Comfortaa;" ><img src="https://icons.iconarchive.com/icons/designbolts/free-valentine-heart/48/Heart-icon.png"
  style="margin-right:10px!important; width:32px!important;">'.$buzzysitename.'</p> 
  </div> 
 <div style="width:480px!important; margin:0 auto; height:280px!important; margin-top:20px; position:absolute!important; background:#fff!important;  border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;">
 <div style="width:80px!important; margin:0 auto!important; padding-top:20px!important;"><img src="'.$actual_link2 .'img/'.$session_buzzyuser_image.'" style=" border-radius:120px 120px 120px 120px;
-moz-border-radius:120px 120px 120px 120px;
-webkit-border-radius:120px 120px 120px 120px; width:80px!important; height:80px!important;"></div> 
 <p style="font-size:15px; text-align:center!important; color:#333!important;"><strong>Please activate your profile. Click on button and activate your profile.</strong></p>
 <br>
 <p style="text-align:center!important;"><a class="btn btn-primary" style="
background:#'.$buzzycss_color_css.'!important;
border:0px solid #000;
border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;
padding:8px!important;
color:#fff;
font-size:16px; font-weight:700!important; text-decoration: none;"  href="'.$buzzysiteurl.'/activateyourlink.php?link='.$session_buzzyuser_hash.'">Profile activation</a></p>
 </div>  
 <div class="clearfix"></div>
 <br>
 <p style="margin-left:20px!important; color:#4e4e4e;">
 <span class="links" style="float:left; font-size:13px!important; border:0px solid #333!important;  '.$color_foot.'" >'.$buzzysitename .' &#169;  '.date("Y").' All rights reserved</span></p>
 <br><br><br><br>
  </div>';  
  $mail->AltBody = 'This is the body in plain text for non-HTML mail  clients';    
   if(!$mail->send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
  echo 'Message has been sent';
 }        
		if($buzzy_access==0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		else if($buzzy_access==1 AND $session_buzzyuser_genre!=0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		else if($buzzy_access==1 AND $session_buzzyuser_genre==0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=trial');
		}		
		}
		}
		if($OK==0){
        header('Location:'.$link_prefix.'index.php?error-reg=true');
	    }
	}
	else if($check_email==0 AND $check_username==1) {
    header('Location:'.$link_prefix.'index.php?usernametaken=true');		
	}	
	else{
    header('Location:'.$link_prefix.'index.php?emailtaken=true');	
	}
	}



	


if (isset($_POST['register_user']) && $_POST['buzzyuser_first_name']!='' && $_POST['buzzyuser_last_name']!='' 
&& $_POST['buzzyuser_username']!='' && $_POST['buzzyuser_birthdate']!='' && $_POST['buzzyuser_email']!=''
&& $_POST['buzzyuser_password']!='') {
$userbirthdate = date('Y-m-d', strtotime($_POST['buzzyuser_birthdate']));
    $postbuzzyuser_email=$_POST["buzzyuser_email"];
    $postbuzzyuser_email = stripslashes($postbuzzyuser_email);
    $postbuzzyuser_email1= htmlspecialchars($postbuzzyuser_email, ENT_QUOTES);

    $postbuzzyuser_username=$_POST["buzzyuser_username"];
    $postbuzzyuser_username = stripslashes($postbuzzyuser_username);
    $postbuzzyuser_usernamel1= htmlspecialchars($postbuzzyuser_username, ENT_QUOTES);
	
  //get age from date or birthdate
$afrom = new DateTime($userbirthdate);
$ato   = new DateTime('today');
$postage =  $afrom->diff($ato)->y;

$check_email_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_email='$postbuzzyuser_email'";
$stmt = $connwrite->prepare($check_email_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
$check_username_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_username='$postbuzzyuser_usernamel1'";
$stmt = $connwrite->prepare($check_username_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		
		
foreach ($connread->query($check_email_query) as $row) { 
$check_email=$row['COUNT(*)'];
}

foreach ($connread->query($check_username_query) as $row) { 
$check_username=$row['COUNT(*)'];
}
if($check_email==0 AND $check_username==0) {	
	 $buzzyuser_password=$_POST['buzzyuser_password'];	
     $buzzyuser_password1 = htmlspecialchars($buzzyuser_password, ENT_QUOTES);	
     $enc_buzzyuser_password1=md5($buzzyuser_password1);	 
$ip_address = $_SERVER['REMOTE_ADDR'];
$buzzyuser_location=$_POST['buzzyuser_location'];
 $buzzyuser_location1 = urlencode($buzzyuser_location);
  $request_url = "https://maps.googleapis.com/maps/api/geocode/xml?address=".$buzzyuser_location1."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $new_user_lat = $xml->result->geometry->location->lat;
      $new_user_lon = $xml->result->geometry->location->lng;
  }
if ($status!="OK") {
$ch = curl_init();
            $headr = array();
            $headr[] = 'Content-length: 0';
            $headr[] = 'Content-type: application/json';
            curl_setopt($ch, CURLOPT_URL, 'https://ip-api.com/json/'.$user_ipreal.'');
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; xxxxx)'); // my product name
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $ch_data = curl_exec($ch);
            curl_close($ch);
            if(!empty($ch_data))
            {
            $json_data = json_decode($ch_data, true);
            //print_r($json_data);
            $new_user_city=$json_data['city'];
            $new_user_region=$json_data['country'];
            $new_user_lat=$json_data['lat'];	
            $new_user_lon=$json_data['lon'];			
			}
        $buzzyuser_location = $new_user_city.', '.$new_user_region;			
}						
        $buzzyuser_genre=$_POST['buzzyuser_genre'];	 	
        $OK = false;
        // create database connection
        // initialize prepared statement
        // create SQL
		$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
		if($buzzy_access==1){
		$buzzyuser_status=0;	
		}
		else if($buzzy_access==0){
		$buzzyuser_status=0;		
		}
        $register_user = "INSERT INTO  buzzyusers
       (buzzyuser_first_name,buzzyuser_last_name,buzzyuser_username,buzzyuser_image,buzzyuser_birthdate,buzzyuser_location,buzzyuser_age,buzzyuser_data_sexual_orientation,buzzyuser_lat,buzzyuser_long,buzzyuser_email,buzzyuser_password,buzzyuser_hash,buzzyuser_registration_date,buzzyuser_last_login,buzzyuser_registration_timestamp,buzzyuser_status_timestamp,buzzyuser_credits,buzzyuser_fbconfirm,
	    buzzyuser_googleconfirm,buzzyuser_emailstatus,buzzyuser_fullnamestatus,buzzyuser_contactsstatus,buzzyuser_visibility,buzzyuser_privacy,buzzyuser_genre,buzzyuser_onlinestatus,buzzyuser_fortumo_tnx,buzzyuser_chatlimit,buzzyuser_animation,buzzyuser_status,buzzyuser_theme,buzzyuser_demostatus)
		 	  VALUES (:buzzyuser_first_name,:buzzyuser_last_name,:buzzyuser_username,'profile-icon1.jpg',:buzzyuser_birthdate,:buzzyuser_location,:buzzyuser_age,:buzzyuser_data_sexual_orientation,
			  :buzzyuser_lat,:buzzyuser_long,:buzzyuser_email,:buzzyuser_password,:buzzyuser_hash,NOW(),:buzzyuser_last_login,:buzzyuser_registration_timestamp,:buzzyuser_status_timestamp,0,0,0,0,0,0,
			  0,0,:buzzyuser_genre,1,'eruezrufjde',0,6,:buzzyuser_status,2,:buzzyuser_demostatus)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyuser_first_name', $_POST['buzzyuser_first_name'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_last_name', $_POST['buzzyuser_last_name'], PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_username', $_POST['buzzyuser_username'], PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyuser_birthdate', $userbirthdate, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_location', $buzzyuser_location, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_age', $postage, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_data_sexual_orientation', $_POST['buzzyuser_data_sexual_orientation'], PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_lat', $new_user_lat, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_long', $new_user_lon, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_email', $_POST['buzzyuser_email'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_password', $enc_buzzyuser_password1, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_hash', $hash, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_last_login', $now, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_registration_timestamp', $now, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyuser_status_timestamp', $now, PDO::PARAM_STR);			
		$stmt->bindParam(':buzzyuser_genre', $buzzyuser_genre, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_status', $buzzyuser_status, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_demostatus', $buzzyuser_demostatus, PDO::PARAM_STR);			
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		if($OK!=0){
        $new_user_query = "SELECT * FROM buzzyusers ORDER by buzzyuser_id DESC LIMIT 1";
		foreach ($connread->query($new_user_query) as $row) { 
		$last_buzzyuser_id=$row['buzzyuser_id'];
		$_SESSION["buzzyuser_id"] = $row['buzzyuser_id'];
		if (isset($_SESSION["buzzyuser_id"])) {
    $register_session_user_query="SELECT * FROM buzzyusers WHERE buzzyuser_id=$last_buzzyuser_id";
    foreach ($connread->query($register_session_user_query) as $row) { 
    $session_buzzyuser_username = $row['buzzyuser_username'];
	$session_buzzyuser_image = $row['buzzyuser_image'];
	$session_buzzyuser_email = $row['buzzyuser_email'];
	$session_buzzyuser_status = $row['buzzyuser_status'];
	$session_buzzyuser_genre = $row['buzzyuser_genre'];	
	$session_buzzyuser_hash = $row['buzzyuser_hash'];
    $register_user_to_messages = "INSERT INTO  users
       (id,username,display_name,profile_image,type_status,last_seen,session_status)
		 	  VALUES (:id,:username,:display_name,'default.jpg','stopped',:last_seen,'offline')";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_messages);
        // bind the parameters and execute the statement
		$stmt->bindParam(':id', $last_buzzyuser_id, PDO::PARAM_STR);
		$stmt->bindParam(':username', $session_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':display_name', $session_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':last_seen', $now, PDO::PARAM_STR);		
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
			
	    $register_user_to_mailing = "INSERT INTO  buzzymailing_list
       (buzzymailing_list_email,buzzymailing_list_timestamp)
		 	  VALUES (:buzzymailing_list_email,:buzzymailing_list_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_mailing);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzymailing_list_email', $session_buzzyuser_email, PDO::PARAM_STR);
		$stmt->bindParam(':buzzymailing_list_timestamp', $now, PDO::PARAM_STR);
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
     }
		
     }
   $mail->FromName = 'Activate your profile';
   $mail->addAddress($session_buzzyuser_email);            
  $mail->Subject = 'Do not reply on this message.';
 $mail->Body   = '<div style="background:#eee!important; width:100%!important;">
  <div style="background:#'.$buzzycss_color_css.'!important; width:100%!important; height:130px!important;" >
  <br>
  <p style="text-align:center; padding-top:20px!important;  color:#fff!important; font-size:28px!important; font-family:Comfortaa;" ><img src="https://icons.iconarchive.com/icons/designbolts/free-valentine-heart/48/Heart-icon.png"
  style="margin-right:10px!important; width:32px!important;">'.$buzzysitename.'</p> 
  </div> 
 <div style="width:480px!important; margin:0 auto; height:280px!important; margin-top:20px; position:absolute!important; background:#fff!important;  border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;">
 <div style="width:80px!important; margin:0 auto!important; padding-top:20px!important;"><img src="'.$actual_link2 .'img/'.$session_buzzyuser_image.'" style=" border-radius:120px 120px 120px 120px;
-moz-border-radius:120px 120px 120px 120px;
-webkit-border-radius:120px 120px 120px 120px; width:80px!important; height:80px!important;"></div> 
 <p style="font-size:15px; text-align:center!important; color:#333!important;"><strong>Please activate your profile. Click on button and activate your profile.</strong></p>
 <br>
 <p style="text-align:center!important;"><a class="btn btn-primary" style="
background:#'.$buzzycss_color_css.'!important;
border:0px solid #000;
border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;
padding:8px!important;
color:#fff;
font-size:16px; font-weight:700!important; text-decoration: none;"  href="'.$buzzysiteurl.'/activateyourlink.php?link='.$session_buzzyuser_hash.'">Profile activation</a></p>
 </div>  
 <div class="clearfix"></div>
 <br>
 <p style="margin-left:20px!important; color:#4e4e4e;">
 <span class="links" style="float:left; font-size:13px!important; border:0px solid #333!important;  '.$color_foot.'" >'.$buzzysitename .' &#169;  '.date("Y").' All rights reserved</span></p>
 <br><br><br><br>
  </div>';  
  $mail->AltBody = 'This is the body in plain text for non-HTML mail  clients';     
  if(!$mail->send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
  echo 'Message has been sent';
 }   
		if($buzzy_access==0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		else if($buzzy_access==1 AND $session_buzzyuser_genre!=0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		else if($buzzy_access==1 AND $session_buzzyuser_genre==0){
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=trial');
		}		
		}
		}
		if($OK==0){
        header('Location:'.$link_prefix.'index.php?error-reg=true');
	    }
	}
	else if($check_email==0 AND $check_username==1) {
    header('Location:'.$link_prefix.'index.php?usernametaken=true');		
	}	
	else{
    header('Location:'.$link_prefix.'index.php?emailtaken=true');	
	}
	}