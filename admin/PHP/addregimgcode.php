<?php
if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['add_regimg'])) {     
    $allowed_filetypes = array('.jpg', '.jpeg', '.png','.gif');
    $max_filesize = 10485760;
    $upload_path = '../img/';
	$upload_db_path = '';
    $filename = $_FILES['userfile']['name'];
	$image=$upload_db_path . $filename;
    $ext = substr($filename, strpos($filename, '.'), strlen($filename) - 1);
     if (!in_array($ext, $allowed_filetypes)){
        die('You must upload allowed image type in order to update your database.');
    }
    if (filesize($_FILES['userfile']['tmp_name']) > $max_filesize){
        die('The file you attempted to upload is too large.');
     }
    // if (!is_writable($upload_path)){
    //     die('You cannot upload to the specified directory, please CHMOD it to 777.');
    //  }
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_path . $filename)) {
$update_bg_image_query = "UPDATE  buzzycss
SET buzzycssland_bg=:buzzycssland_bg WHERE buzzycss_id=1";
        $stmt = $connwrite->prepare($update_bg_image_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->bindParam(':buzzycssland_bg', $image, PDO::PARAM_STR);				
        $stmt->execute();
        $OK = $stmt->rowCount();
}
header('Location:css-options.php?add-settings-success=true');
}
}
if ($_SESSION["buzzyadmin_id"]==2){
if (isset($_POST['add_regimg'])) {
header('Location: css-options?onlydemo=true');
}      
}