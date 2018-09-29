<?php
  $this_fb_query = "SELECT buzzynews_id,buzzynews_title,buzzynews_image,buzzynews_text,buzzynews_url,buzzynews_title_tag,buzzynews_metatag,
  DATE_FORMAT(buzzynews_datetime,'%d. %m. %Y') as buzzynews_datetime,buzzynewscategory_id,buzzynews_likes,buzzynews_unlikes,buzzynews_views,
  buzzynews_comments,buzzynews_visitors,buzzynews_source_name,buzzynews_source_url FROM  buzzynews WHERE buzzynews_id=$facebook_id";
  foreach ($connread->query($this_fb_query) as $row) {
  $taken_buzzynewscategory_id=$row['buzzynewscategory_id'];
  }
  
  if ($_SESSION["buzzyadmin_id"]==1){ 
  if (isset($_POST['update_fb'])) {
		$buzzynewscategory_id=$_POST['buzzynewscategory_id'];
		$buzzynews_metatag=$_POST['buzzynews_metatag'];
        $OK = false;
        $update_news_query = "UPDATE buzzynews SET buzzynewscategory_id=:buzzynewscategory_id, 
		buzzynews_metatag=:buzzynews_metatag WHERE buzzynews_id=$facebook_id";
        $stmt = $connwrite->prepare($update_news_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzynewscategory_id', $buzzynewscategory_id, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_metatag', $buzzynews_metatag, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		header('Location: facebookpg.php?add-settings-success=true');
		}
  }
  
   if ($_SESSION["buzzyadmin_id"]==2){
   if (isset($_POST['update_fb'])) {
	header('Location: facebookpg.php?onlydemo=true');
   }   
   }