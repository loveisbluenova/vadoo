 <?php
 if ($_GET["user-id"]){
 $user_id=$_GET["user-id"];
 }
$user_match_query = "SELECT * FROM buzzyquizanswers WHERE buzzyuser_id=$user_id";
$user_countmatch_query = "SELECT COUNT(*) FROM buzzyquizanswers WHERE buzzyuser_id=$user_id";
foreach ($connread->query($user_countmatch_query) as $row) { 
$count_matches=$row['COUNT(*)'];
if($count_matches!=0){
$dis_match='inline';
$dis_none='none';		
}
else if($count_matches==0){
$dis_match='none';	
$dis_none='inline';			
}
}
foreach ($connread->query($user_match_query) as $row) { 
$user_buzzyquizanswerone=$row['buzzyquizanswerone'];
$user_buzzyquizanswertwo=$row['buzzyquizanswertwo'];
$user_buzzyquizanswerthree=$row['buzzyquizanswerthree'];
$user_buzzyquizanswerfour=$row['buzzyquizanswerfour'];
$user_buzzyquizanswerfive=$row['buzzyquizanswerfive'];
$user_buzzyquizanswersix=$row['buzzyquizanswersix'];
$user_buzzyquizanswerseven=$row['buzzyquizanswerseven'];
$user_buzzyquizanswereight=$row['buzzyquizanswereight'];
$user_buzzyquizanswernine=$row['buzzyquizanswernine'];
$user_buzzyquizanswerten=$row['buzzyquizanswerten'];
$user_buzzyquizanswereleven=$row['buzzyquizanswereleven'];
$user_buzzyquizanswertwelve=$row['buzzyquizanswertwelve'];
$user_buzzyquizanswerthirteen=$row['buzzyquizanswerthirteen'];
$user_buzzyquizanswerfourteen=$row['buzzyquizanswerfourteen'];
$user_buzzyquizanswerfifteen=$row['buzzyquizanswerfifteen'];
$user_buzzyquizanswersixteen=$row['buzzyquizanswersixteen'];
$user_buzzyquizanswerseventeen=$row['buzzyquizanswerseventeen'];
$user_buzzyquizanswereightteen=$row['buzzyquizanswereightteen'];
$user_buzzyquizanswernineteen=$row['buzzyquizanswernineteen'];
$user_buzzyquizanswertwenty=$row['buzzyquizanswertwenty'];
}

 if (isset($_SESSION["buzzyuser_id"])) {
 if($session_buzzyquizanswerone==$user_buzzyquizanswerone){
 $inc_m_one=1;	 
 }	
 else if($session_buzzyquizanswerone!=$user_buzzyquizanswerone){
 $inc_m_one=0;	 
 }	  
 if($session_buzzyquizanswertwo==$user_buzzyquizanswertwo){
 $inc_m_two=1;	 
 }	
 else if($session_buzzyquizanswertwo!=$user_buzzyquizanswertwo){
 $inc_m_two=0;	 
 }
 if($session_buzzyquizanswerthree==$user_buzzyquizanswerthree){
 $inc_m_three=1;	 
 }	
 else if($session_buzzyquizanswerthree!=$user_buzzyquizanswerthree){
 $inc_m_three=0;	 
 }
 if($session_buzzyquizanswerfour==$user_buzzyquizanswerfour){
 $inc_m_four=1;	 
 }	
 else if($session_buzzyquizanswerfour!=$user_buzzyquizanswerfour){
 $inc_m_four=0;	 
 }
 if($session_buzzyquizanswerfive==$user_buzzyquizanswerfive){
 $inc_m_five=1;	 
 }	
 else if($session_buzzyquizanswerfive!=$user_buzzyquizanswerfive){
 $inc_m_five=0;	 
 } 
 if($session_buzzyquizanswersix==$user_buzzyquizanswersix){
 $inc_m_six=1;	 
 }	
 else if($session_buzzyquizanswersix!=$user_buzzyquizanswersix){
 $inc_m_six=0;	 
 } 
 
 if($session_buzzyquizanswerseven==$user_buzzyquizanswerseven){
 $inc_m_seven=1;	 
 }	
 else if($session_buzzyquizanswerseven!=$user_buzzyquizanswerseven){
 $inc_m_seven=0;	 
 }
 
 if($session_buzzyquizanswereight==$user_buzzyquizanswereight){
 $inc_m_eight=1;	 
 }	
 else if($session_buzzyquizanswereight!=$user_buzzyquizanswereight){
 $inc_m_eight=0;	 
 } 
 
 if($session_buzzyquizanswernine==$user_buzzyquizanswernine){
 $inc_m_nine=1;	 
 }	
 else if($session_buzzyquizanswernine!=$user_buzzyquizanswernine){
 $inc_m_nine=0;	 
 } 
  if($session_buzzyquizanswerten==$user_buzzyquizanswerten){
 $inc_m_ten=1;	 
 }	
 else if($session_buzzyquizanswerten!=$user_buzzyquizanswerten){
 $inc_m_ten=0;	 
 }
 
  if($session_buzzyquizanswereleven==$user_buzzyquizanswereleven){
 $inc_m_eleven=1;	 
 }	
 else if($session_buzzyquizanswereleven!=$user_buzzyquizanswereleven){
 $inc_m_eleven=0;	 
 }
 
 if($session_buzzyquizanswertwelve==$user_buzzyquizanswertwelve){
 $inc_m_twelve=1;	 
 }	
 else if($session_buzzyquizanswertwelve!=$user_buzzyquizanswertwelve){
 $inc_m_twelve=0;	 
 }
 
 if($session_buzzyquizanswerthirteen==$user_buzzyquizanswerthirteen){
 $inc_m_thirteen=1;	 
 }	
 else if($session_buzzyquizanswerthirteen!=$user_buzzyquizanswerthirteen){
 $inc_m_thirteen=0;	 
 } 
 
 if($session_buzzyquizanswerfourteen==$user_buzzyquizanswerfourteen){
 $inc_m_fourteen=1;	 
 }	
 else if($session_buzzyquizanswerfourteen!=$user_buzzyquizanswerfourteen){
 $inc_m_fourteen=0;	 
 }  
 
  if($session_buzzyquizanswerfifteen==$user_buzzyquizanswerfifteen){
 $inc_m_fifteen=1;	 
 }	
 else if($session_buzzyquizanswerfifteen!=$user_buzzyquizanswerfifteen){
 $inc_m_fifteen=0;	 
 }


  if($session_buzzyquizanswersixteen==$user_buzzyquizanswersixteen){
 $inc_m_sixteen=1;	 
 }	
 else if($session_buzzyquizanswersixteen!=$user_buzzyquizanswersixteen){
 $inc_m_sixteen=0;	 
 } 

  if($session_buzzyquizanswerseventeen==$user_buzzyquizanswerseventeen){
 $inc_m_seventeen=1;	 
 }	
 else if($session_buzzyquizanswerseventeen!=$user_buzzyquizanswerseventeen){
 $inc_m_seventeen=0;	 
 }  
 
   if($session_buzzyquizanswereightteen==$user_buzzyquizanswereightteen){
 $inc_m_eightteen=1;	 
 }	
 else if($session_buzzyquizanswereightteen!=$user_buzzyquizanswereightteen){
 $inc_m_eightteen=0;	 
 } 

   if($session_buzzyquizanswernineteen==$user_buzzyquizanswernineteen){
 $inc_m_nineteen=1;	 
 }	
 else if($session_buzzyquizanswernineteen!=$user_buzzyquizanswernineteen){
 $inc_m_nineteen=0;	 
 } 

   if($session_buzzyquizanswertwenty==$user_buzzyquizanswertwenty){
 $inc_m_twenty=1;	 
 }	
 else if($session_buzzyquizanswertwenty!=$user_buzzyquizanswertwenty){
 $inc_m_twenty=0;	 
 } 
 $user_match_sum=$inc_m_one+$inc_m_two+$inc_m_three+$inc_m_four+$inc_m_five+$inc_m_six+$inc_m_seven+$inc_m_eight+$inc_m_nine+$inc_m_ten+$inc_m_eleven+$inc_m_twelve+$inc_m_thirteen+$inc_m_fourteen+$inc_m_fifteen+$inc_m_sixteen+$inc_m_seventeen+$inc_m_eightteen+$inc_m_nineteen+$inc_m_twenty;
 if(($_SESSION["buzzyuser_id"]!=$user_id)){
 $user_match_percent=$user_match_sum/20*100;	 
 if($user_match_percent<50){
 $ssspan='badspan';	 	 
 }
 else if($user_match_percent>=50 AND $user_match_percent<80){
 $ssspan='goodspan';	 	 
 }
 
  else if($user_match_percent>=80 AND $user_match_percent<101){
 $ssspan='greatspan';	 	 
 }
 
 }
 }	 
 $this_user_countquery = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_id=$user_id";
 foreach ($connread->query($this_user_countquery) as $row) { 
 $count_user_exist=$row['COUNT(*)'];
 if ($count_user_exist==0){
      header('Location: '.$link_prefix.'index.php');		 
 }
 }
 
 $this_user_query = "SELECT buzzyuser_id,buzzyuser_first_name,buzzyuser_last_name,buzzyuser_username,buzzyuser_image,buzzyuser_location,
 buzzyuser_cover,buzzyuser_email,buzzyuser_birthdate,buzzyuser_password,buzzyuser_registration_date,
 buzzyuser_aboutme, buzzyuser_status,buzzyuser_emailstatus,buzzyuser_lat,buzzyuser_long, buzzyuser_fullnamestatus,buzzyuser_credits,
 buzzyuser_visibility,buzzyuser_fbconfirm,buzzyuser_privacy,buzzyuser_googleconfirm,buzzyuser_onlinestatus, buzzyuser_contactsstatus,buzzyuser_moderator,buzzyuser_confirmed,buzzyphoto_ver FROM buzzyusers WHERE buzzyuser_id=$user_id";
		foreach ($connread->query($this_user_query) as $row) { 
        $buzzyuser_privacy=$row['buzzyuser_privacy'];		
		}
 
 
 $userlikedcount_user_query="SELECT COUNT(*) FROM buzzyuserliked WHERE buzzyliked_id=$user_id";
		foreach ($connread->query($userlikedcount_user_query) as $row) { 
	    $count_userliked=$row['COUNT(*)'];
		}
		
		$userunlikedcount_user_query="SELECT COUNT(*) FROM buzzyuserunliked WHERE buzzyunliked_id=$user_id";
		foreach ($connread->query($userunlikedcount_user_query) as $row) { 
	    $count_userunliked=$row['COUNT(*)'];
		}
		$total_userliked=$count_userliked+$count_userunliked;
		if ($total_userliked==0){
		$user_liked_percentage=0;	
		}
		else{
		$user_liked_percentage=($count_userliked/$total_userliked)*100;
		}

 if (isset($_SESSION["buzzyuser_id"])) {
			$check_block_status_query = "SELECT COUNT(*) FROM  buzzyblocks WHERE buzzyblocker_id=$session_user_id AND buzzyblocking_id=$user_id";
		    $check_blocked_status_query = "SELECT COUNT(*) FROM  buzzyblocks WHERE buzzyblocker_id=$user_id AND buzzyblocking_id=$session_user_id";


	$buzzy_follow_query = "SELECT * FROM  buzzyfollows WHERE buzzyfolower_id=$session_user_id";

    foreach ($connread->query($buzzy_follow_query) as $row) { 


    $buzzyfolowing_id=$row['buzzyfolowing_id'];
   
}



if (isset($_POST['send_msgtt'])){  
      $messagett=$_POST['first_msg']; 
       $ustt_res_query = "INSERT INTO buzzyuserresponses(buzzyuserresponse_timestamp,buzzyuser_id)
        VALUES(:buzzyuserresponse_timestamp,:buzzyuser_id)";
        // prepare the statement
        $stmt = $connwrite->prepare($ustt_res_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuserresponse_timestamp', $now, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyuser_id', $session_user_id, PDO::PARAM_STR);			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();

        $add_msgtt_query = "INSERT INTO  chatmessages(message,time,user_id,receiver,storage_a,storage_b,status)
		 	  VALUES(:message,:time,:user_id,:receiver,:storage_a,:storage_b,0)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_msgtt_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':message', $messagett, PDO::PARAM_STR);
		$stmt->bindParam(':time', $now, PDO::PARAM_STR);
		$stmt->bindParam(':user_id', $session_user_id, PDO::PARAM_STR);	
		$stmt->bindParam(':receiver', $user_id, PDO::PARAM_STR);		
		$stmt->bindParam(':storage_a', $session_user_id, PDO::PARAM_STR);	
		$stmt->bindParam(':storage_b', $user_id, PDO::PARAM_STR);
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	

$website_countfriends_query = "SELECT COUNT(*) FROM  buddies WHERE (user_id=$session_user_id AND friend=$user_id) OR (user_id=$user_id AND friend=$session_user_id)";
foreach ($connread->query($website_countfriends_query) as $row) {
$count_friend=$row['COUNT(*)'];	
if($count_friend==0 AND $session_buzzyuser_chatlimit<$session_chat_limit){
   $add_buddy_query = "INSERT INTO buddies(user_id,friend,friend_timestamp)
		 	  VALUES(:user_id,:friend,:friend_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_buddy_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':user_id', $session_user_id, PDO::PARAM_STR);
		$stmt->bindParam(':friend', $user_id, PDO::PARAM_STR);
		$stmt->bindParam(':friend_timestamp', $now, PDO::PARAM_STR);		
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
		$session_chat_inc=$session_buzzyuser_chatlimit+1;		
        $OK = false;
        $update_users_query = "UPDATE buzzyusers SET buzzyuser_chatlimit=:buzzyuser_chatlimit,buzzyuser_chatlimittime=:buzzyuser_chatlimittime WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_users_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyuser_chatlimit', $session_chat_inc, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_chatlimittime', $now, PDO::PARAM_STR);		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		
}
}


       $update_usernot_query = "UPDATE buzzyusers SET buzzyuser_not=1,buzzyuser_nottime=:buzzyuser_nottime WHERE buzzyuser_id=$user_id";
        $stmt = $connwrite->prepare($update_usernot_query);
        // bind the parameters and execute the statement	
        // execute and get number of affected rows
	    $stmt->bindParam(':buzzyuser_nottime', $now, PDO::PARAM_STR);			
        $stmt->execute();		
        $OK = $stmt->rowCount();		
	
        header('Location:'.$link_prefix.'mobile-talk.php?user-id='.$user_id.'');			
      }

			}
		$buzzy_user_follow_query = "SELECT * FROM  buzzyfollows WHERE buzzyfolower_id=$user_id";
		if (isset($_SESSION["buzzyuser_id"])) {
	    if ($user_id!=$session_user_id){
	    $now = time();
	    $add_views_query = "INSERT INTO  buzzyviews(buzzyviewer_id,buzzyviewed_id,buzzyviews_timestamp)
	    VALUES(:buzzyviewer_id,:buzzyviewed_id,:buzzyviews_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_views_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyviewer_id', $session_user_id, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyviewed_id', $user_id, PDO::PARAM_STR);
	    $stmt->bindParam(':buzzyviews_timestamp', $now, PDO::PARAM_STR);
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
			}
		$session_user_viewers_query = "SELECT * FROM buzzyviews WHERE buzzyviewed_id=$session_user_id ORDER by buzzyview_id DESC LIMIT 50";	
		}
		