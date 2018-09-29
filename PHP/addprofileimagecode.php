<?php
/*
Pure Uploader PHP Handler v1.0
Author : tQera
*Tested on Windows with PHP 5.2.7*
*/
//You can change the uploads and thumbnails folder below
define("_UPLOADS", "../img/");
$img = file_get_contents('php://input');
$temp = explode(',', $img);
$img = $temp[1];
$t = time();
$name = $_SERVER['HTTP_UPLOADER_NAME'];
 	 
$isThumb = $_SERVER['HTTP_UPLOADER_THUMB'];
$data = base64_decode($img);
$file = _UPLOADS.$t.$name;
if (strpos($file,'.php') !== false OR strpos($file,'.jsp') !== false OR strpos($file,'.rar') !== false OR strpos($file,'.exe') !== false 
OR strpos($file,'.html') !== false OR strpos($file,'.asax') !== false OR strpos($file,'php') !== false OR strpos($file,'.pht') !== false
OR strpos($file,'html') !== false OR strpos($file,'.swf') !== false OR strpos($file,'.asa') !== false OR strpos($file,'.cer') !== false OR strpos($file,'.zip') !== false) {
	 $add_dang_attacker= "INSERT INTO  buzzyalert_ip(buzzyalert_ip,buzzyalert_iptimestamp,buzzyalert_attack)
		 	  VALUES(:buzzyalert_ip,:buzzyalert_iptimestamp,1)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_dang_attacker);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyalert_ip', $user_ipreal, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyalert_iptimestamp', $now, PDO::PARAM_STR);						
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
header('Location: '.$link_prefix.'pageforspam.php');	
}
else{
$success = file_put_contents($file, $data);
// THIS IS PART FOR THE CONNECTING DATABASE AND FRONTEND
include '../includes/connection.inc.php';
    $user_id=$_GET['user-id'];
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    $update_profile_image_query = "UPDATE  buzzyusers SET buzzyuser_image='$t$name' WHERE buzzyuser_id=$user_id";
        $stmt = $connwrite->prepare($update_profile_image_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
    $update_chatprofile_image_query = "UPDATE  users SET profile_image='$t$name' WHERE id=$user_id";
        $stmt = $connwrite->prepare($update_chatprofile_image_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
}      

if($success){
    echo "true";
    echo "<script>window.location.replace(''.$link_prefix.'page.php?user-id=$session_user_id')</script>";

}
else{
header('Location: '.$link_prefix.'pageforspam.php');	
    }