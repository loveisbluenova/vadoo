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
	$enc_buzzyuser_password1=md5($buzzyuser_password1);		
    $logintest_query = "SELECT * FROM buzzyusers WHERE buzzyuser_email=:buzzyuser_email AND buzzyuser_password = :buzzyuser_password";
	$stmt = $connwrite->prepare($logintest_query);
	$stmt->bindParam(':buzzyuser_email', $buzzyuser_email1, PDO::PARAM_STR);
    $stmt->bindParam(':buzzyuser_password', $enc_buzzyuser_password1, PDO::PARAM_STR);
	 $stmt->execute();
    $OK = $stmt->rowCount();
    if ($OK==1){
    $login_query = "SELECT * FROM buzzyusers WHERE buzzyuser_email='$buzzyuser_email1' AND buzzyuser_password = '$enc_buzzyuser_password1'";
    $stmt = $connwrite->prepare($login_query);
  // bind the parameters and execute the statement	
  // execute and get number of affected rows
    $stmt->execute();
    $OK = $stmt->rowCount();
       if ($OK!=0){	 
        foreach ($connread->query($login_query) as $row) {
        $_SESSION["buzzyuser_id"] = $row['buzzyuser_id'];
		$logged_in_user_id=$row['buzzyuser_id'];;		
        }	   
	    $us_act_query = "INSERT INTO buzzyuseractivities(buzzyuseractivity_timestamp,buzzyuser_id)
        VALUES(:buzzyuseractivity_timestamp,:buzzyuser_id)";
        // prepare the statement
        $stmt = $connwrite->prepare($us_act_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuseractivity_timestamp', $now, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyuser_id', $logged_in_user_id, PDO::PARAM_STR);			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		   
		   
if($buzzy_frontpage==0){
$fp_link=$link_prefix.$user_id_url.$logged_in_user_id;
}	
else if($buzzy_frontpage==1){
$fp_link=$link_prefix.'index.php';
}	
else if($buzzy_frontpage==2){
$fp_link=$link_prefix.'page.php?hotnot-id=true';
}		   
$OK = false;
        $update_userlogin_query = "UPDATE buzzyusers SET buzzyuser_last_login=:buzzyuser_last_login,buzzyuser_onlinestatus=1,buzzyuser_theme=2 WHERE buzzyuser_id=$logged_in_user_id";
        $stmt = $connwrite->prepare($update_userlogin_query);
        // bind the parameters and execute the statement
	    $stmt->bindParam(':buzzyuser_last_login', $now, PDO::PARAM_STR);	
        // execute and get number of affected rows
        $stmt->execute();		
        $OK = $stmt->rowCount();	
if ($OK!=0){		
header('Location: '.$fp_link.'');
    }
else if ($OK==0){
header('Location:'.$link_prefix.'index.php?login=false');
	}
	}	
	   }	   			
   }
		 // Other functions - start
    if (isset($_SESSION["buzzyuser_id"])) {
    $session_user_id=$_SESSION["buzzyuser_id"];	
       $count_sesvisitor_query = "SELECT COUNT(*) FROM buzzyuser_visitors WHERE buzzyuser_id=$session_user_id AND buzzyuser_visitor_seen=0";
       foreach ($connread->query($count_sesvisitor_query) as $row) {
       $count_ses_visitors=$row['COUNT(*)'];
	   
	   	if($count_ses_visitors==0){
    $display_classs3='display:none;';		
	}
	else if($count_ses_visitors!=0){
    $display_classs3='';			
	}
	   }

       $count_notifications_query = "SELECT COUNT(*) FROM buzzynotifications WHERE buzzyuser_id=$session_user_id AND buzzynotification_status=0";
       foreach ($connread->query($count_notifications_query) as $row) {
       $count_nots=$row['COUNT(*)'];
	   
	 if($count_nots==0){
    $display_classs4='display:none;';		
	}
	else if($count_nots!=0){
    $display_classs4='';			
	}
	   }
	   
    $session_user_query="SELECT buzzyuser_id,buzzyuser_first_name,buzzyuser_last_name,buzzyuser_username,buzzyuser_image,buzzyuser_location,
 buzzyuser_cover,buzzyuser_email,buzzyuser_birthdate,buzzyuser_password,buzzyuser_registration_date,
 buzzyuser_aboutme, buzzyuser_status,buzzyuser_emailstatus,buzzyuser_lat,buzzyuser_long,buzzyuser_chatlimit,
 buzzyuser_chatlimittime,buzzyuser_genre, buzzyuser_fullnamestatus,buzzyuser_credits,buzzyuser_age,
 buzzyuser_visibility,buzzyuser_fbconfirm,buzzyuser_googleconfirm,buzzyuser_registration_timestamp,buzzyuser_last_login,buzzyuser_birthdate, buzzyuser_contactsstatus,
 buzzyuser_fortumo_tnx,buzzyuser_privacy,buzzyuser_moderator,buzzyuser_confirmed,buzzyuser_onlinestatus,buzzyuser_last_login,buzzyuser_status_timestamp,buzzyuser_theme,buzzyuser_animation,buzzyphoto_ver,
 buzzyuser_not,buzzyuser_nottime FROM buzzyusers WHERE buzzyuser_id=$session_user_id";
    foreach ($connread->query($session_user_query) as $row) { 
	$session_buzzyuser_first_name = $row['buzzyuser_first_name'];
	$session_buzzyuser_last_name = $row['buzzyuser_last_name'];	 
    $session_buzzyuser_username = $row['buzzyuser_username'];
	$session_buzzyuser_image = $row['buzzyuser_image'];
	$session_buzzyuser_email = $row['buzzyuser_email'];
	$session_buzzyuser_location=$row['buzzyuser_location'];
	$session_buzzyuser_status = $row['buzzyuser_status'];
	$session_buzzyuser_status_timestamp=$row['buzzyuser_status_timestamp'];
	$buzzy_accessdiff=$now-$buzzy_accesstimestamp;	
	$session_buzzyuser_chatlimit=$row['buzzyuser_chatlimit'];
	$session_buzzyuser_chatlimittime=$row['buzzyuser_chatlimittime'];
	$session_buzzyuser_confirmed=$row['buzzyuser_confirmed'];
	$session_buzzyuser_theme=$row['buzzyuser_theme'];
	$session_buzzyuser_registration_timestamp=$row['buzzyuser_registration_timestamp'];
	$session_buzzyuser_animation=$row['buzzyuser_animation'];
	$session_buzzyphoto_ver=$row['buzzyphoto_ver'];	
	$session_buzzyuser_onlinestatus=$row['buzzyuser_onlinestatus'];
	$session_buzzyuser_not=$row['buzzyuser_not'];	
	$session_buzzyuser_nottime=$row['buzzyuser_nottime'];
	$session_buzzyuser_animationtwo=$session_buzzyuser_animation+1;			
				$chatlimittime_difference=$now-$session_buzzyuser_chatlimittime;
				if ($chatlimittime_difference>=86400){
        $OK = false;	
        $update_usersch_query = "UPDATE buzzyusers SET buzzyuser_chatlimit=0 WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_usersch_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
				}
	$not_diff=$now-$session_buzzyuser_nottime;
	if($not_diff>21){
	     $update_usernotsa_query = "UPDATE buzzyusers SET buzzyuser_not=0,buzzyuser_nottime=:buzzyuser_nottime 
		 WHERE buzzyuser_id=$session_user_id AND buzzyuser_not=1";
        $stmt = $connwrite->prepare($update_usernotsa_query);
        // bind the parameters and execute the statement	
        // execute and get number of affected rows
	    $stmt->bindParam(':buzzyuser_nottime', $now, PDO::PARAM_STR);			
        $stmt->execute();		
        $OK = $stmt->rowCount();
				 }

	
	$session_buzzyuser_genre=$row['buzzyuser_genre'];
	$session_buzzyuser_privacy=$row['buzzyuser_privacy'];
	$session_buzzyuser_password=$row['buzzyuser_password'];	
	$session_buzzyuser_age=$row['buzzyuser_age'];		
	if ($session_buzzyuser_status == 0) {
	$session_chat_limit=$buzzylimit_chatone;	
	}			
	else if ($session_buzzyuser_status == 1) {
	$session_chat_limit=$buzzylimit_chattwo;	
	}
	else if ($session_buzzyuser_status == 2) {
	$session_chat_limit=$buzzylimit_chatthree;	
	}
    else {
	$session_chat_limit=1000000;		
	}		
    $session_buzzyuser_credits=$row['buzzyuser_credits'];
    $session_buzzyuser_lat=$row['buzzyuser_lat'];	
    $session_buzzyuser_long=$row['buzzyuser_long'];
	$session_buzzyuser_visibility=$row['buzzyuser_visibility'];
    $session_buzzyuser_fbconfirm=$row['buzzyuser_fbconfirm'];	
	$session_buzzyuser_googleconfirm=$row['buzzyuser_googleconfirm'];
    $session_buzzyuser_fortumo_tnx=$row['buzzyuser_fortumo_tnx'];
    $session_buzzyuser_moderator=$row['buzzyuser_moderator'];
    $session_buzzyuser_last_login=$row['buzzyuser_last_login'];
	$msgmsg_diff=$now-$session_buzzyuser_last_login;

	if ($buzzy_access==1 AND $buzzy_accessdiff>$session_buzzyuser_status_timestamp AND $session_buzzyuser_genre==0 AND $session_buzzyuser_status==0){
    $update_userstat_query = "UPDATE buzzyusers SET buzzyuser_status=10 WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_userstat_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
      header('Location:'.$link_prefix.'index.php?status=restricted'); 		
	}	

if($session_buzzyuser_theme==0){
$selhone='selected';	
$selhtwo='';
$selhthree='';
$selhfour='';
$selhfive='';
}
if($session_buzzyuser_theme==1){
$selhone='';	
$selhtwo='selected';
$selhthree='';
$selhfour='';
$selhfive='';
}    
if($session_buzzyuser_theme==2){
$selhone='';	
$selhtwo='';
$selhthree='selected';
$selhfour='';
$selhfive='';
} 
if($session_buzzyuser_theme==3){
$selhone='';	
$selhtwo='';
$selhthree='';
$selhfour='selected';
$selhfive='';
} 
if($session_buzzyuser_theme==4){
$selhone='';	
$selhtwo='';
$selhthree='';
$selhfour='';
$selhfive='selected';
}	
	
if($buzzywebsite_status==1 AND  $session_buzzyuser_email=='jonhydoebmt@gmail.com' AND $msgmsg_diff<2){
$website_msg_query = "SELECT * FROM messages WHERE id=675";
    foreach ($connread->query($website_msg_query) as $row) {
	$msg_status=$row['status'];
    if ($msg_status=='read'){	
	$update_msgstatus_query = "UPDATE messages SET  status='unread' WHERE id=675";
        $stmt = $connwrite->prepare($update_msgstatus_query);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();  
	
	}
	}			
	}
	
  if($session_buzzyuser_genre==0){
  $selected_gen1='selected';
  $selected_gen2=''; 
  }
  else if($session_buzzyuser_genre==1){
  $selected_gen1='';
  $selected_gen2='selected'; 
  }
	
  if($session_buzzyuser_privacy==0){
  $selected_vis1='selected';
  $selected_vis2=''; 
  }
  else if($session_buzzyuser_privacy==1){
  $selected_vis1='';
  $selected_vis2='selected'; 
  }	
	
	
if (strpos($session_buzzyuser_image,'facebook') !== false) {
			$final_image_prefix='';		  
		    }
			else if (strpos($session_buzzyuser_image,'fbcdn') !== false) {
			$final_image_prefix='';		  
		    }
		    else if (strpos($session_buzzyuser_image,'http://brankomatovic.net/safetoupload/') !== false) {
			$final_image_prefix='';		  
		    }
		    else if (strpos($session_buzzyuser_image,'http://') !== false) {
			$final_image_prefix='';		  
		    }	
		    else if (strpos($session_buzzyuser_image,'https://') !== false) {
			$final_image_prefix='';		  
		    }				
			else {
			$final_image_prefix=$link_prefix.'img/';					
			}
    if($session_buzzyuser_fbconfirm==0){
	$fb_con_txt='';	
	}
	else if($session_buzzyuser_fbconfirm==1){
	$fb_con_txt='<p style="color:#1d7824; font-weight:400; margin-top:0px!important; font-size:13px!important;">
	<i class="fa fa-check" aria-hidden="true"></i> <i class="fa fa-facebook" aria-hidden="true"></i> Your facebook profile is confirmed</p>';			
	}
	
	if($session_buzzyuser_googleconfirm==0){
	$google_con_txt='';	
	}
	else if($session_buzzyuser_googleconfirm==1){
	$google_con_txt='<p style="color:#1d7824; font-weight:400; margin-top:0px!important; font-size:13px!important;">
	<i class="fa fa-check" aria-hidden="true"></i> <i class="fa fa-envelope" aria-hidden="true"></i> Your email is confirmed</p>';			
	}
	
			if ($row['buzzyuser_birthdate']=='00/00/0000'){
			$session_buzzyuser_birthdate='';
			}
			else if ($row['buzzyuser_birthdate']!='0000-00-00'){
			$session_buzzyuser_birthdate=$row['buzzyuser_birthdate'];
			}
            $birthdate_time = strtotime($session_buzzyuser_birthdate);
			$formated_day_from_bir =  date('d', $birthdate_time);
			$formated_month_from_bir =  date('m', $birthdate_time);			
            $birdaymonth=$formated_day_from_bir . $formated_month_from_bir;        
			
			if($birdaymonth==$currdaymonth){

			}
			
# object oriented
$from = new DateTime($session_buzzyuser_birthdate);
$to   = new DateTime('today');
$session_age =  $from->diff($to)->y;
		
	
	$messagescount_query="SELECT COUNT(*) FROM chatmessages WHERE receiver=$session_user_id AND status='0'";
	foreach ($connread->query($messagescount_query) as $row) { 
	$count_unmessages=$row['COUNT(*)'];
	if($count_unmessages==0){
    $display_classs1='display:none;';		
	}
	else if($count_unmessages!=0){
    $display_classs1='';			
	}
	}	
	
		$sessunreadlikedcount_user_query="SELECT COUNT(*) FROM buzzyuserliked WHERE buzzyliked_id=$session_user_id AND buzzyuserliked_status=0";
		foreach ($connread->query($sessunreadlikedcount_user_query) as $row) { 
	    $count_usunreadliked=$row['COUNT(*)'];
		
	if($count_usunreadliked==0){
    $display_classs2='display:none;';		
	}
	else if($count_usunreadliked!=0){
    $display_classs2='';			
	}
		
		}
		
	$friendscount_query="SELECT COUNT(*) FROM buddies WHERE friend=$session_user_id AND friend_status=0";
	foreach ($connread->query($friendscount_query) as $row) { 
	$count_unnfriends=$row['COUNT(*)'];
	if($count_unnfriends==0){
    $display_classs16='display:none;';		
	}
	else if($count_unnfriends!=0){
    $display_classs16='';			
	}
	}	


    $friendses_query="SELECT * FROM buddies WHERE user_id=$session_user_id";
	foreach ($connread->query($friendses_query) as $row) { 
    $friend=$row['friend'];		
    $all_usersmmm_query="SELECT * FROM buzzyusers WHERE buzzyuser_id=$friend LIMIT 1";
    foreach ($connread->query($all_usersmmm_query) as $row) { 
	$mmmbuzzyuser_email=$row['buzzyuser_email'];	
	}
  $all_mamcount_query="SELECT COUNT(*) FROM buzzyuser_reminders WHERE buzzyuser_reminder_receiver=$friend AND buzzyuser_reminder_sender=$session_user_id";	
	foreach ($connread->query($all_mamcount_query) as $row) { 
	$count_mamus=$row['COUNT(*)'];
	if($count_mamus==0){
	 $us_mmm_query = "INSERT INTO buzzyuser_reminders(buzzyuser_reminder_sender,buzzyuser_reminder_receiver,buzzyuser_reminder_timestamp)
        VALUES(:buzzyuser_reminder_sender,:buzzyuser_reminder_receiver,:buzzyuser_reminder_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($us_mmm_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_reminder_sender', $session_user_id, PDO::PARAM_STR);				
        $stmt->bindParam(':buzzyuser_reminder_receiver', $friend, PDO::PARAM_STR);				
        $stmt->bindParam(':buzzyuser_reminder_timestamp', $now, PDO::PARAM_STR);				
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
$mail->FromName = $you_hav_new_msg;
    $mail->addAddress($mmmbuzzyuser_email);            
    $mail->Subject = $you_hav_new_msg;
    $mail->Body   = '<div style="background:#eee!important; width:100%!important;">
  <div style="background:#'.$buzzycss_color_css.'!important; width:100%!important; height:130px!important;" >
  <br>
  <p style="text-align:center; padding-top:20px!important;  color:#fff!important; font-size:28px!important; font-family:Comfortaa;" ><img src="http://icons.iconarchive.com/icons/designbolts/free-valentine-heart/48/Heart-icon.png"
  style="margin-right:10px!important; width:32px!important;">'.$buzzysitename.'</p> 
  </div> 
 <div style="width:480px!important; margin:0 auto; height:280px!important; margin-top:20px; position:absolute!important; background:#fff!important;  border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;">
  <div style="width:80px!important; margin:0 auto!important; padding-top:20px!important;"><img src="'.$actual_link2 .'img/'.$session_buzzyuser_image.'" style=" border-radius:120px 120px 120px 120px;
-moz-border-radius:120px 120px 120px 120px;
-webkit-border-radius:120px 120px 120px 120px; width:80px!important; height:80px!important;"></div> 
  <br>
 <p style="font-size:22px!important; margin-top:0px!important; text-align:center;">Do you know '.$session_buzzyuser_first_name.'</p> 
 <p  style="font-size:15px!important; margin-top:0px!important; margin-bottom:20px!important; color:#4e4e4e!important;  text-align:center;">'.$session_buzzyuser_first_name.' is your contact and is online right now.</p> 
 <p style="text-align:center!important;" ><a style="background:#'.$buzzycss_color_css.'!important;
border:0px solid #000;
border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;
padding:8px!important;
color:#fff;
font-size:18px; padding:10px!important; font-weight:700!important; text-decoration: none;" href="'.$actual_link2 .'page.php?user-id='.$session_user_id.'">View user</a></p>
 </div>  
 <div class="clearfix"></div>
 <br>
 <p style="margin-left:20px!important; color:#4e4e4e;">
 <span class="links" style="float:left; font-size:13px!important; border:0px solid #333!important;  '.$color_foot.'" >'.$buzzysitename .' &#169;  '.date("Y").' All rights reserved</span></p>
 <br><br><br><br>
  </div>';
   $mail->AltBody = 'This is the body in plain text for non-HTML mail  clients';    
   if(!$mail->send()) {

   } else {

  } 		
	}
   else if($count_mamus!=0){	   
$all_mam_query="SELECT * FROM buzzyuser_reminders WHERE buzzyuser_reminder_receiver=$friend AND buzzyuser_reminder_sender=$session_user_id";	
	foreach ($connread->query($all_mam_query) as $row) {    
   $mmmbuzzyuser_reminder_timestamp=$row['buzzyuser_reminder_timestamp'];	
    $mmmbuzzyuser_reminder_diff=$now-$mmmbuzzyuser_reminder_timestamp;	
	if($mmmbuzzyuser_reminder_diff>604800){
$mail->FromName = $you_hav_new_msg;
    $mail->addAddress($mmmbuzzyuser_email);            
    $mail->Subject = $you_hav_new_msg;
  $mail->Body   = '<div style="background:#eee!important; width:100%!important;">
  <div style="background:#'.$buzzycss_color_css.'!important; width:100%!important; height:130px!important;" >
  <br>
  <p style="text-align:center; padding-top:20px!important;  color:#fff!important; font-size:28px!important; font-family:Comfortaa;" ><img src="http://icons.iconarchive.com/icons/designbolts/free-valentine-heart/48/Heart-icon.png"
  style="margin-right:10px!important; width:32px!important;">'.$buzzysitename.'</p> 
  </div> 
 <div style="width:480px!important; margin:0 auto; height:280px!important; margin-top:20px; position:absolute!important; background:#fff!important;  border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;">
  <div style="width:80px!important; margin:0 auto!important; padding-top:20px!important;"><img src="'.$actual_link2 .'img/'.$session_buzzyuser_image.'" style=" border-radius:120px 120px 120px 120px;
-moz-border-radius:120px 120px 120px 120px;
-webkit-border-radius:120px 120px 120px 120px; width:80px!important; height:80px!important;"></div> 
  <br>
 <p style="font-size:22px!important; margin-top:0px!important; text-align:center;">Do you know '.$session_buzzyuser_first_name.'</p> 
 <p  style="font-size:15px!important; margin-top:0px!important; margin-bottom:20px!important; color:#4e4e4e!important;  text-align:center;">'.$session_buzzyuser_first_name.' is your contact and is online right now.</p> 
 <p style="text-align:center!important;" ><a style="background:#'.$buzzycss_color_css.'!important;
border:0px solid #000;
border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;
padding:8px!important;
color:#fff;
font-size:18px; padding:10px!important; font-weight:700!important; text-decoration: none;" href="'.$actual_link2 .'page.php?user-id='.$session_user_id.'">View user</a></p>
 </div>  
 <div class="clearfix"></div>
 <br>
 <p style="margin-left:20px!important; color:#4e4e4e;">
 <span class="links" style="float:left; font-size:13px!important; border:0px solid #333!important;  '.$color_foot.'" >'.$buzzysitename .' &#169;  '.date("Y").' All rights reserved</span></p>
 <br><br><br><br>
  </div>';
   $mail->AltBody = 'This is the body in plain text for non-HTML mail  clients';    
   if(!$mail->send()) {

   } else {

  } 		
	   
	     $update_mmm_query = "UPDATE buzzyuser_reminders SET buzzyuser_reminder_timestamp=:buzzyuser_reminder_timestamp
		 WHERE buzzyuser_reminder_sender=$session_user_id AND buzzyuser_reminder_receiver=$friend";
        $stmt = $connwrite->prepare($update_mmm_query);
        // bind the parameters and execute the statement	
        // execute and get number of affected rows
	    $stmt->bindParam(':buzzyuser_reminder_timestamp', $now, PDO::PARAM_STR);			
        $stmt->execute();		
        $OK = $stmt->rowCount();	
	}	
	}
	}
    }
	}	
if (isset($_POST['update_website_theme'])) {
       $OK = false;
        $update_us_options_query = "UPDATE buzzyusers SET buzzyuser_theme=:buzzyuser_theme WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_us_options_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_theme', $_POST['buzzyuser_theme'], PDO::PARAM_STR);				
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
header('Location:'.$link_prefix.'index.php');		
}

if (isset($_POST['update_website_anim'])) {
	$buzzyuser_animation=$_POST['buzzyuser_animationtwo']-1;
       $OK = false;
        $update_usss_options_query = "UPDATE buzzyusers SET buzzyuser_animation=:buzzyuser_animation WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_usss_options_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_animation', $buzzyuser_animation, PDO::PARAM_STR);				
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
header('Location:'.$link_prefix.'index.php');		
}			
		
		
	
		$sesslikedcount_user_query="SELECT COUNT(*) FROM buzzyuserliked WHERE buzzyliked_id=$session_user_id";
		foreach ($connread->query($sesslikedcount_user_query) as $row) { 
	    $count_usliked=$row['COUNT(*)'];
		}
		
		$sesslunlikedcount_user_query="SELECT COUNT(*) FROM buzzyuserunliked WHERE buzzyunliked_id=$session_user_id";
		foreach ($connread->query($sesslunlikedcount_user_query) as $row) { 
	    $count_usunliked=$row['COUNT(*)'];
		}
		$total_usliked=$count_usliked+$count_usunliked;
		if ($total_usliked==0){
		$session_liked_percentage=0;	
		}
		else{
		$session_liked_percentage=($count_usliked/$total_usliked)*100;
		}
		
		if($session_liked_percentage<=40){
		$ratcolor='c12d2d';	
		}
		else if($session_liked_percentage>40 && $session_liked_percentage<=60){
		$ratcolor='dcac06';	
		}	
		else if($session_liked_percentage>60 && $session_liked_percentage<=100){
		$ratcolor='2aa703';	
		}		
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
	   if (isset($_SESSION["buzzyuser_id"])) {
	 $update_alluserloginadr_query = "UPDATE buzzyusers SET buzzyuser_onlinestatus=1,buzzyuser_last_login=:buzzyuser_last_login WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_alluserloginadr_query);
        // bind the parameters and execute the statement	
        // execute and get number of affected rows
	    $stmt->bindParam(':buzzyuser_last_login', $now, PDO::PARAM_STR);			
        $stmt->execute();		
        $OK = $stmt->rowCount();		   
		   
       $session_filter_query = "SELECT COUNT(*) FROM buzzyfilter WHERE buzzyuser_id=$session_user_id";
       foreach ($connread->query($session_filter_query) as $row) {
       $count_filter=$row['COUNT(*)'];
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
  if (isset($_SESSION["buzzyuser_id"])) {  
  $session_countliked_query = "SELECT  COUNT(*) FROM buzzyuserliked WHERE buzzyliked_id=$session_user_id";
  $session_countvisits_query = "SELECT COUNT(*) FROM buzzyuser_visitors WHERE buzzyuser_id=$session_user_id"; 
  foreach ($connread->query($session_countvisits_query) as $row) { 
  $count_sesvisits=$row['COUNT(*)'];
  if($count_sesvisits!=0){	  
  $visitors_href=$link_prefix.'page.php?visitors-page=true';  
  }  
  else if($count_sesvisits==0){
   $visitors_href=$link_prefix.'page.php?no-visitors=true';  
  }
  }	
  foreach ($connread->query($session_countliked_query) as $row) { 
  $count_seslikes=$row['COUNT(*)'];
  if($count_seslikes!=0){	  
  $likes_href=$link_prefix.'index.php?likes-page=true';  
  }  
  else if($count_seslikes==0){
  $likes_href=$link_prefix.'page.php?no-likers=true';    
  }
  }	
  } 
else if($buzzywebsite_status==1){
$register_inc='registeruserdemo.php';
$fb_loginurl='oauth/fb/login_with_facebook.php';	
$log_user='jonhydoebmt@gmail.com';
$log_pwd='123123';
$demomessage='Hi, you are nice too.. :)';
$demodiff=$now-$session_buzzyuser_last_login;
$messagescountfddd_query="SELECT COUNT(*) FROM chatmessages WHERE receiver=344 AND time>1493634184"; 
foreach ($connread->query($messagescountfddd_query) as $row) { 
	$count_unmessagesffdd=$row['COUNT(*)'];
}
if($demodiff>5 AND $count_unmessagesffdd==0){
    $us_res_query = "INSERT INTO buzzyuserresponses(buzzyuserresponse_timestamp,buzzyuser_id)
        VALUES(:buzzyuserresponse_timestamp,344)";
        // prepare the statement
        $stmt = $connwrite->prepare($us_res_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuserresponse_timestamp', $now, PDO::PARAM_STR);				
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();

        $add_msg_query = "INSERT INTO  chatmessages(message,time,user_id,receiver,storage_a,storage_b,status)
		 	  VALUES(:message,:time,670,344,670,344,0)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_msg_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':message', $demomessage, PDO::PARAM_STR);
		$stmt->bindParam(':time', $now, PDO::PARAM_STR);
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		}
}  	



$session_match_query = "SELECT * FROM buzzyquizanswers WHERE buzzyuser_id=$session_user_id";
foreach ($connread->query($session_match_query) as $row) { 
$session_buzzyquizanswerone=$row['buzzyquizanswerone'];
$session_buzzyquizanswertwo=$row['buzzyquizanswertwo'];
$session_buzzyquizanswerthree=$row['buzzyquizanswerthree'];
$session_buzzyquizanswerfour=$row['buzzyquizanswerfour'];
$session_buzzyquizanswerfive=$row['buzzyquizanswerfive'];
$session_buzzyquizanswersix=$row['buzzyquizanswersix'];
$session_buzzyquizanswerseven=$row['buzzyquizanswerseven'];
$session_buzzyquizanswereight=$row['buzzyquizanswereight'];
$session_buzzyquizanswernine=$row['buzzyquizanswernine'];
$session_buzzyquizanswerten=$row['buzzyquizanswerten'];
$session_buzzyquizanswereleven=$row['buzzyquizanswereleven'];
$session_buzzyquizanswertwelve=$row['buzzyquizanswertwelve'];
$session_buzzyquizanswerthirteen=$row['buzzyquizanswerthirteen'];
$session_buzzyquizanswerfourteen=$row['buzzyquizanswerfourteen'];
$session_buzzyquizanswerfifteen=$row['buzzyquizanswerfifteen'];
$session_buzzyquizanswersixteen=$row['buzzyquizanswersixteen'];
$session_buzzyquizanswerseventeen=$row['buzzyquizanswerseventeen'];
$session_buzzyquizanswereightteen=$row['buzzyquizanswereightteen'];
$session_buzzyquizanswernineteen=$row['buzzyquizanswernineteen'];
$session_buzzyquizanswertwenty=$row['buzzyquizanswertwenty'];
}


 