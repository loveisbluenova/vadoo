 <?php
 if ($_GET["user-id"]){
 $user_id=$_GET["user-id"];
 }

 $this_user_query = "SELECT buzzyuser_id,buzzyuser_first_name,buzzyuser_last_name,buzzyuser_username,buzzyuser_image,buzzyuser_location,
 buzzyuser_cover,buzzyuser_email,buzzyuser_birthdate,buzzyuser_password,buzzyuser_registration_date,
 buzzyuser_aboutme, buzzyuser_status,buzzyuser_emailstatus,buzzyuser_lat,buzzyuser_long, buzzyuser_fullnamestatus,buzzyuser_credits,buzzyuser_visibility,buzzyuser_fbconfirm,buzzyuser_privacy, buzzyuser_contactsstatus FROM buzzyusers WHERE buzzyuser_id=$user_id";
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