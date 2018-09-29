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
if($isThumb == true && stristr($_SERVER['CONTENT_TYPE'], "image") == true){
    $thumbWidth = $_SERVER['HTTP_UPLOADER_THUMBWIDTH'];
    $thumbHeight = $_SERVER['HTTP_UPLOADER_THUMBHEIGHT'];

    $newThumb = imagecreatetruecolor($thumbWidth, $thumbHeight);
    $thumbTemp = imagecreatefromstring($data);
    $thumb = imagecopyresampled($newThumb, $thumbTemp, 0, 0, 0, 0, $thumbWidth, $thumbHeight, imagesx($thumbTemp), imagesy($thumbTemp));

    $thumbFile = _THUMBNAIL.$t.$name;
    imagejpeg($newThumb, $thumbFile, 90);
}
// THIS IS PART FOR THE CONNECTING DATABASE AND FRONTEND
include '../../includes/connection.inc.php';
    $news_id=$_GET['news-id'];
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    $update_news_image = "UPDATE  buzzynews SET buzzynews_timage='$t$name' WHERE buzzynews_id=$news_id";
        $stmt = $connwrite->prepare($update_news_image);
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
