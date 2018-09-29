<?php
$now = time();
//converting one date format into another
$website_mail_query = "SELECT buzzysiteurl,buzzyemail FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1";
foreach ($connread->query($website_mail_query) as $row) { 
$buzzysiteurl=$row['buzzysiteurl'];
$buzzyemail=$row['buzzyemail'];
}
if (isset($_POST['register_user']) && $_POST['buzzyuser_first_name']!='' && $_POST['buzzyuser_last_name']!='' 
&& $_POST['buzzyuser_username']!='' && $_POST['buzzyuser_birthdate']!='' && $_POST['buzzyuser_email']!=''
&& $_POST['buzzyuser_password']!='') {
$userbirthdate = date('Y-m-d', strtotime($_POST['buzzyuser_birthdate']));

  //get age from date or birthdate
$afrom = new DateTime($userbirthdate);
$ato   = new DateTime('today');
$postage =  $afrom->diff($ato)->y;

$check_email_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_email=:buzzyuser_email";
$stmt = $connwrite->prepare($check_email_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_email', $_POST['buzzyuser_email'], PDO::PARAM_STR);
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
foreach ($connread->query($check_email_query) as $row) { 
$check_email=$row['COUNT(*)'];
}
if($check_email==0) {
	
	 $buzzyuser_password=$_POST['buzzyuser_password'];	
     $buzzyuser_password1 = htmlspecialchars($buzzyuser_password, ENT_QUOTES);	
     $enc_buzzyuser_password1=md5($buzzyuser_password1);
	 
$ip_address = $_SERVER['REMOTE_ADDR'];

$buzzyuser_location=$_POST['buzzyuser_location'];
 $buzzyuser_location = urlencode($buzzyuser_location);
  $request_url = "https://maps.googleapis.com/maps/api/geocode/xml?address=".$buzzyuser_location."&sensor=true";
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
}			
			
        $buzzyuser_genre=$_POST['buzzyuser_genre'];	 
        $buzzyuser_location = $new_user_city.', '.$new_user_region;
		
		
        $OK = false;
        // create database connection
        // initialize prepared statement
        // create SQL
		$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
        $register_user = "INSERT INTO  buzzyusers
       (buzzyuser_first_name,buzzyuser_last_name,buzzyuser_username,buzzyuser_image,buzzyuser_birthdate,buzzyuser_location,buzzyuser_age,buzzyuser_data_sexual_orientation,buzzyuser_lat,buzzyuser_long,buzzyuser_email,buzzyuser_password,buzzyuser_hash,buzzyuser_registration_date,buzzyuser_last_login,buzzyuser_registration_timestamp,buzzyuser_status_timestamp,buzzyuser_genre,buzzyuser_fortumo_tnx)
		 	  VALUES (:buzzyuser_first_name,:buzzyuser_last_name,:buzzyuser_username,'profile-icon1.jpg',:buzzyuser_birthdate,:buzzyuser_location,:buzzyuser_age,:buzzyuser_data_sexual_orientation,:buzzyuser_lat,:buzzyuser_long,:buzzyuser_email,:buzzyuser_password,:buzzyuser_hash,NOW(),:buzzyuser_last_login,:buzzyuser_registration_timestamp,:buzzyuser_status_timestamp,:buzzyuser_genre,'eruezrufjde')";
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
		// execute and get number of affected rows
        $stmt->execute();
        $OK_register = $stmt->rowCount();
		if($OK_register!=0){
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
     }
		
     }
        $subject = 'Do not reply on this message.';
        $from = $buzzyemail;
		$to=$session_buzzyuser_email;
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // Create email headers
        $headers .= 'From: '.$buzzyemail."\r\n".
        'Reply-To: '.$buzzyemail."\r\n" .
        'X-Mailer: PHP/' . phpversion();
// Compose a simple HTML email message
      $message= 'Please activate your profile. Click on '.$buzzysiteurl.'/activateyourlink.php?link='.$session_buzzyuser_hash.'';
	  if(mail($to, $subject, $message, $headers)){
		}
   
		header('Location:'.$link_prefix.$user_id_url.$last_buzzyuser_id.'&&user-registration=success');
		}
		}
		if($OK_register==0){

	    }
	}
	else{
    echo '<script>alert("You must write all of requested data!");</script>';
	}
	}


	