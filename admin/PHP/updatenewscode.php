<?php
	if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['update_news_data'])) {
        $OK = false;
        $update_news_query = "UPDATE buzzynews SET buzzynewscategory_id=:buzzynewscategory_id WHERE buzzynews_id=$news_id";
        $stmt = $connwrite->prepare($update_news_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzynewscategory_id', $_POST['buzzynewscategory_id'], PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        if ($OK != 0) {
	    header('Location: add-news-image.php?news-id='.$news_id.'');
        } 
		else if ($OK == 0) {
        header('Location: add-news-category.php?error=errorupload');
        } 
		}
	}
		if ($_SESSION["buzzyadmin_id"]==2){
        if (isset($_POST['update_news_data'])) {
	    header('Location: add-news-image.php?news-id='.$news_id.'');	
        }
		}		