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

    $buzzyuser_id= $_POST['btn-unpin'];
	$user_liked_query1 = "SELECT COUNT(*) FROM  buzzyuserunliked WHERE buzzyunliked_id=$buzzyuser_id AND buzzyuser_id=$session_user_id";
			foreach ($connread->query($user_liked_query1) as $row) {
			$count_liked1_query=$row['COUNT(*)'];
		if ($count_liked1_query==0){	
        $pin_liked_query = "INSERT INTO buzzyuserunliked(buzzyunliked_id,buzzyuser_id)
        VALUES(:buzzyunliked_id,:buzzyuser_id)";
        // prepare the statement
        $stmt = $connwrite->prepare($pin_liked_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyunliked_id', $buzzyuser_id, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_id', $session_user_id, PDO::PARAM_STR);	
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
		

		
}
}
}