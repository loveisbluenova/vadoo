<?php
session_start();

include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
//include 'PHP/visitcount.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
if (isset($_SESSION["buzzyuser_id"])) {		

    $buzzyuser_id= $_POST['btn-pin'];
	$user_liked_query1 = "SELECT COUNT(*) FROM  buzzyuserliked WHERE buzzyliked_id=$buzzyuser_id AND buzzyuser_id=$session_user_id";
			foreach ($connread->query($user_liked_query1) as $row) {
			$count_liked1_query=$row['COUNT(*)'];
		if ($count_liked1_query==0){	
        $pin_liked_query = "INSERT INTO buzzyuserliked(buzzyliked_id,buzzyuser_id,buzzyuserliked_timestamp)
        VALUES(:buzzyliked_id,:buzzyuser_id,:buzzyuserliked_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($pin_liked_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyliked_id', $buzzyuser_id, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_id', $session_user_id, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuserliked_timestamp', $now, PDO::PARAM_STR);		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
        $us_lov_query = "INSERT INTO buzzyuserloveable(buzzyuserloveable_timestamp,buzzyuser_id)
        VALUES(:buzzyuserloveable_timestamp,:buzzyuser_id)";
        // prepare the statement
        $stmt = $connwrite->prepare($us_lov_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuserloveable_timestamp', $now, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyuser_id', $buzzyuser_id, PDO::PARAM_STR);			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		
		
	

       $already_liked_query = "SELECT COUNT(*) FROM buzzyuserliked WHERE buzzyliked_id=$session_user_id AND buzzyuser_id=$buzzyuser_id";
       foreach ($connread->query($already_liked_query) as $row) {
	   $count_al_liked=$row['COUNT(*)']; 
	   }
	   if($count_al_liked!=0){
	   if ($buzzywebsite_status==0){
	   $already_matched_query = "SELECT COUNT(*) FROM buzzymatches WHERE (buzzymatcher_one=$session_user_id AND buzzymatcher_two=$buzzyuser_id)
	   OR (buzzymatcher_one=$buzzyuser_id AND buzzymatcher_two=$session_user_id)";			
       foreach ($connread->query($already_matched_query) as $row) {
	   $count_al_matched=$row['COUNT(*)']; 
	   }
	   if($count_al_matched==0){	   
        $pin_match_query = "INSERT INTO buzzymatches(buzzymatcher_one,buzzymatcher_two,buzzymatch_timestamp)
        VALUES(:buzzymatcher_one,:buzzymatcher_two,:buzzymatch_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($pin_match_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzymatcher_one', $buzzyuser_id, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzymatcher_two', $session_user_id, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzymatch_timestamp', $now, PDO::PARAM_STR);			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	   }	
	   }	
	   }


	
$add_lovednots_query = "INSERT INTO buzzynotifications(buzzynotification_type,buzzyuser_id,buzzyfriend_id,buzzynotification_status,buzzynotification_timestamp,buzzynotification_alias)
		 	  VALUES(2,:buzzyuser_id,:buzzyfriend_id,0,:buzzynotification_timestamp,'likednots')";
        // prepare the statement
        $stmt = $connwrite->prepare($add_lovednots_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_id', $buzzyuser_id, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyfriend_id', $session_user_id, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynotification_timestamp', $now, PDO::PARAM_STR);		
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();			
		}
		
		if ($count_liked1_query!=0){	
		
	   $seluser_matched_query = "SELECT COUNT(*) FROM  buzzymatches WHERE buzzymatcher_one=$session_user_id AND buzzymatcher_two=$buzzyuser_id";
       foreach ($connread->query($seluser_matched_query) as $row) {
	   $count_sess_liked=$row['COUNT(*)']; 
	   }
	   if($count_sess_liked!=0){  
       $OK = false;
        $delete_match1_query = "DELETE FROM  buzzymatches WHERE buzzymatcher_one=$session_user_id AND buzzymatcher_two=$buzzyuser_id";
        $stmt = $connwrite->prepare($delete_match1_query);
        $stmt->execute();
        $OK = $stmt->rowCount();	   
	   }   
		
	   $seluser_matched1_query = "SELECT COUNT(*) FROM  buzzymatches WHERE buzzymatcher_one=$buzzyuser_id AND buzzymatcher_two=$session_user_id";
       foreach ($connread->query($seluser_matched1_query) as $row) {
	   $count_sess1_liked=$row['COUNT(*)']; 
	   }
	   if($count_sess1_liked!=0){
       if ($buzzywebsite_status==0){		   
       $OK = false;
        $delete_match2_query = "DELETE FROM   buzzymatches WHERE buzzymatcher_one=$buzzyuser_id AND buzzymatcher_two=$session_user_id";
        $stmt = $connwrite->prepare($delete_match2_query);
        $stmt->execute();
        $OK = $stmt->rowCount();	   
	   }  		
	   }
		
        $OK = false;
        $delete_pinned1_query = "DELETE FROM  buzzyuserliked WHERE buzzyliked_id=$buzzyuser_id AND buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($delete_pinned1_query);
        $stmt->execute();
        $OK = $stmt->rowCount();
		
		$OK = false;
        $delete_lovnots_query = "DELETE FROM buzzynotifications WHERE buzzyuser_id=$buzzyuser_id AND buzzyfriend_id=$session_user_id AND buzzynotification_type=2";
         $stmt = $connwrite->prepare($delete_lovnots_query);
        $stmt->execute();
        $OK = $stmt->rowCount();

        }		
}
}