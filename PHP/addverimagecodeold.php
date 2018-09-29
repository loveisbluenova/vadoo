<?php
if ($buzzywebsite_status==0){
if ($buzzysite_safeupload==1) { 
$safe_path='../safetoupload/';
$safe_db_path='http://brankomatovic.net/safetoupload/';
}
else if ($buzzysite_safeupload==0) { 
$safe_path='img/';
$safe_db_path='';
}

if (isset($_POST['add_verimg'])) {     
    $allowed_filetypes = array('.jpg', '.jpeg', '.png','.gif');
    $max_filesize = 10485760;
    $upload_path = $safe_path;
	$upload_db_path = $safe_db_path;
    $filename = $_FILES['userfile']['name'];
	$image=$upload_db_path . $filename;
    $ext = substr($filename, strpos($filename, '.'), strlen($filename) - 1);
     if (!in_array($ext, $allowed_filetypes)){
 $add_dang_attacker= "INSERT INTO  buzzyalert_ip(buzzyalert_ip,buzzyalert_iptimestamp,buzzyalert_attack,buzzyalert_attackfile)
		 	  VALUES(:buzzyalert_ip,:buzzyalert_iptimestamp,1,:buzzyalert_attackfile)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_dang_attacker);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyalert_ip', $user_ipreal, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyalert_iptimestamp', $now, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyalert_attackfile', $filename, PDO::PARAM_STR);						
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	 
     header('Location: '.$link_prefix.'pageforspam.php');
    }
	
 if (!@getimagesize($_FILES['userfile']['tmp_name'])){
 $add_dang_attacker= "INSERT INTO  buzzyalert_ip(buzzyalert_ip,buzzyalert_iptimestamp,buzzyalert_attack,buzzyalert_attackfile)
		 	  VALUES(:buzzyalert_ip,:buzzyalert_iptimestamp,1,:buzzyalert_attackfile)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_dang_attacker);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyalert_ip', $user_ipreal, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyalert_iptimestamp', $now, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyalert_attackfile', $filename, PDO::PARAM_STR);							
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
     header('Location: '.$link_prefix.'pageforspam.php');		
	}

    if (filesize($_FILES['userfile']['tmp_name']) > $max_filesize){
        die('The file you attempted to upload is too large.');
     }
    // if (!is_writable($upload_path)){
    //     die('You cannot upload to the specified directory, please CHMOD it to 777.');
    //  }
    if (in_array($ext, $allowed_filetypes)){
	if (@getimagesize($_FILES['userfile']['tmp_name'])){
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_path . $filename)) {
           $add_ver_query = "INSERT INTO  buzzyphoto_verimg(buzzyphoto_verimg,buzzyuser_id)
		 	  VALUES(:buzzyphoto_verimg,:buzzyuser_id)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_ver_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyphoto_verimg', $image, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_id', $session_user_id, PDO::PARAM_STR);
        $stmt->execute();
        $OK = $stmt->rowCount();		
		header('Location: '.$link_prefix.'page.php?user-id='.$session_user_id.'&add-verimage-success=success');
}
}
}
}
}
else if ($buzzywebsite_status==1){
	if (isset($_POST['add_verimg'])) {  
		header('Location: '.$link_prefix.'index.php?onlydemo=true');	
}	
}