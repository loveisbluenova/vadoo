<?php
/*
Upload link for your image ---- start 
*/
 if (isset($_POST['upload_image_link'])) {
    $update_news_image_link = "UPDATE  buzzynews SET buzzynews_image=:buzzynews_image WHERE buzzynews_id=$news_id";
        $stmt = $connwrite->prepare($update_news_image_link);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
		$stmt->bindParam(':buzzynews_image', $_POST['buzzynews_image'], PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		header('Location: news.php');
}
/*
Upload link for your image ---- end 
*/