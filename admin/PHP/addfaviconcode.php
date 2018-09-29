<?php
/*
Pure Uploader PHP Handler v1.0
Author : tQera
*Tested on Windows with PHP 5.2.7*
*/
//You can change the uploads and thumbnails folder below
define("_UPLOADS", "../../img/");
define("_THUMBNAIL", "../../img/thumbnails/");
$img = file_get_contents('php://input');
$temp = explode(',', $img);
$img = $temp[1];
$t = time();
$name = $_SERVER['HTTP_UPLOADER_NAME'];
$isThumb = $_SERVER['HTTP_UPLOADER_THUMB'];
$data = base64_decode($img);
$file = _UPLOADS.$t.$name;
$success = file_put_contents($file, $data);
// THIS IS PART FOR THE CONNECTING DATABASE AND FRONTEND
function dbConnect($usertype, $connectionType = 'mysqli')
{
    $host =  'tipster365com.ipagemysql.com';
    $db = 'buzzybuzz';
    // the password for this core user is factional
    if ($usertype == 'read') {
         $user = 'branko';
        $pwd = 'branko';
    } elseif ($usertype == 'write') {
       $user = 'branko';
        $pwd = 'branko';
    } else {
        exit('Unrecognized connection type');
    }
    if ($connectionType == 'mysqli') {
        $conn = new mysqli($host, $user, $pwd, $db);
        if ($conn->mysqli_error) {
            die('Cannot open database');
        }
        return $conn;
    } else {
        try {
            return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        } catch (PDOException $e) {
            echo 'Cannot connect to database';
            exit;
        }
    }
}
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    $update_buzzy_favicon = "UPDATE  buzzysiteoptions SET buzzyfavicon='$t$name' WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_buzzy_favicon);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();

if($success){

    echo "true";

}
else{
    echo "Server failed for file: ".$name;
    }