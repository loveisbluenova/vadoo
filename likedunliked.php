<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$ip = $_SERVER['REMOTE_ADDR'];
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
if(isset($_POST["submit-like"])){
	$likedid=$_POST['likedid'];	
	   $already_liked_query = "SELECT COUNT(*) FROM buzzyuserliked WHERE buzzyliked_id=$session_user_id AND buzzyuser_id=$likedid";
       foreach ($connread->query($already_liked_query) as $row) {
	   $count_al_liked=$row['COUNT(*)']; 
	   }
	   if($count_al_liked!=0){
		if ($buzzywebsite_status==0){
			
			
	   $already_matched_query = "SELECT COUNT(*) FROM buzzymatches WHERE (buzzymatcher_one=$session_user_id AND buzzymatcher_two=$likedid)
	   OR (buzzymatcher_one=$likedid AND buzzymatcher_two=$session_user_id)";			
       foreach ($connread->query($already_matched_query) as $row) {
	   $count_al_matched=$row['COUNT(*)']; 
	   }
	   if($count_al_matched==0){	   
        $pin_match_query = "INSERT INTO buzzymatches(buzzymatcher_one,buzzymatcher_two,buzzymatch_timestamp)
        VALUES(:buzzymatcher_one,:buzzymatcher_two,:buzzymatch_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($pin_match_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzymatcher_one', $likedid, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzymatcher_two', $session_user_id, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzymatch_timestamp', $now, PDO::PARAM_STR);			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	   }
	    }		
	   }	
	   
        $us_lov_query = "INSERT INTO buzzyuserloveable(buzzyuserloveable_timestamp,buzzyuser_id)
        VALUES(:buzzyuserloveable_timestamp,:buzzyuser_id)";
        // prepare the statement
        $stmt = $connwrite->prepare($us_lov_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuserloveable_timestamp', $now, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyuser_id', $likedid, PDO::PARAM_STR);			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	  
	  
    $pin_liked_query = "INSERT INTO buzzyuserliked(buzzyliked_id,buzzyuser_id,buzzyuserliked_timestamp)
        VALUES(:buzzyliked_id,:buzzyuser_id,:buzzyuserliked_timestamp)";
        // prepare the statement
        $stmt = $connwrite->prepare($pin_liked_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyliked_id', $likedid, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_id', $session_user_id, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuserliked_timestamp', $now, PDO::PARAM_STR);			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
header('Location: '.$link_prefix.'page.php?hotnot-id=true');	   		
}
if(isset($_POST["submit-unlike"])){
	$likedid=$_POST['likedid'];
		   
$pin_liked_query = "INSERT INTO buzzyuserunliked(buzzyunliked_id,buzzyuser_id)
        VALUES(:buzzyunliked_id,:buzzyuser_id)";
        // prepare the statement
        $stmt = $connwrite->prepare($pin_liked_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyunliked_id', $likedid, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_id', $session_user_id, PDO::PARAM_STR);		           
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
header('Location: '.$link_prefix.'page.php?hotnot-id=true');	   		
}
else{
header('Location: '.$link_prefix.'page.php?hotnot-id=true');	
}
