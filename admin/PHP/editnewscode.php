<?php
  $this_news_query = "SELECT buzzynews_id,buzzynews_title,buzzynews_image,buzzynews_text,buzzynews_url,buzzynews_title_tag,buzzynews_metatag,
  DATE_FORMAT(buzzynews_datetime,'%d. %m. %Y') as buzzynews_datetime,buzzynewscategory_id,buzzynews_likes,buzzynews_unlikes,buzzynews_views,
  buzzynews_comments,buzzynews_visitors,buzzynews_source_name,buzzynews_source_url FROM  buzzynews WHERE buzzynews_id=$news_id";
  foreach ($connread->query($this_news_query) as $row) {
  $taken_buzzynewscategory_id=$row['buzzynewscategory_id'];
  }
  
  if ($_SESSION["buzzyadmin_id"]==1){ 
  if (isset($_POST['update_news'])) {
		$buzzynewscategory_id=$_POST['buzzynewscategory_id'];
		$buzzynews_text=$_POST['buzzynews_text'];
		$buzzynews_url= $_POST['buzzynews_url'];
		$formated_buzzynews_url =  preg_replace("/[\s_]/", "-", $buzzynews_url);
        $OK = false;
        $update_news_query = "UPDATE buzzynews SET buzzynews_title=:buzzynews_title,buzzynewscategory_id=:buzzynewscategory_id, 
		buzzynews_url=:buzzynews_url,buzzynews_title_tag=:buzzynews_title_tag, buzzynews_metatag=:buzzynews_metatag, buzzynews_source_name=:buzzynews_source_name, 
		buzzynews_source_url=:buzzynews_source_url,buzzynews_text=:buzzynews_text WHERE buzzynews_id=$news_id";
        $stmt = $connwrite->prepare($update_news_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzynews_title', $_POST['buzzynews_title'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzynewscategory_id', $buzzynewscategory_id, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_url', $formated_buzzynews_url, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_title_tag', $_POST['buzzynews_title_tag'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_metatag', $_POST['buzzynews_metatag'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_source_name', $_POST['buzzynews_source_name'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_source_url', $_POST['buzzynews_source_url'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_text', $buzzynews_text, PDO::PARAM_STR);	
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		header('Location: news.php?add-settings-success=true');
		}
  }
  
   if ($_SESSION["buzzyadmin_id"]==2){
   if (isset($_POST['update_news'])) {
	header('Location: news.php?onlydemo=true');
   }   
   }