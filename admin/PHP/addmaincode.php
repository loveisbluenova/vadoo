<?php
/**
 * PHP CODE FOR CREATE NEW VIDEO  ---- START
 */
// error handler function

 $website_options_query = "SELECT * FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1";
   foreach ($connread->query($website_options_query) as $row) {
   $buzzyyoutubeapi=$row['buzzyyoutubeapi'];
   $buzzyvimeoaccesstoken=$row['buzzyvimeoaccesstoken'];
  }
 
$now = time();
if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['add_video'])) {
      $longbuzzyvideo=$_POST['buzzyvideo_id']; 
      $image_url = parse_url($longbuzzyvideo);	  
      if (strpos($longbuzzyvideo,'youtube') !== false) {
      if (strpos($longbuzzyvideo,'list') === false) {	
      if((preg_match('/https:\/\/(www\.)*youtube\.com\/.*/',$longbuzzyvideo)) OR (preg_match('/http:\/\/(www\.)*youtube\.com\/.*/',$longbuzzyvideo))){	   
      $array = explode("&", $image_url['query']);
      $buzzyvideo_id=substr($array[0], 2);
	  $buzzynewscategory_id=$_POST['buzzynewscategory_id'];	  
			$ch = curl_init();
            $headr = array();
            $headr[] = 'Content-length: 0';
            $headr[] = 'Content-type: application/json';
            curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/videos?id='.$buzzyvideo_id.'&key='.$buzzyyoutubeapi.'&part=snippet,contentDetails,statistics,status');
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; xxxxx)'); // my product name
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $ch_data = curl_exec($ch);
            curl_close($ch);
            if(!empty($ch_data))
            {
            $json_data = json_decode($ch_data, true);
            //print_r($json_data);
					
			if(isset($json_data['items'][0]["snippet"]["title"])){		
            $buzzynews_title=$json_data['items'][0]["snippet"]["title"];
			}
			else  {
	        header('Location:videos.php?add-main-error=true');
		    }	
			if(isset($json_data['items'][0]["snippet"]["description"])){					
            $buzzynews_text=$json_data['items'][0]["snippet"]["description"];
            }
			else  {
	        header('Location:videos.php?add-main-error=true');
		    }	
			if(isset($json_data['items'][0]["snippet"]["thumbnails"]["medium"]["url"])){				
			$buzzynews_image=$json_data['items'][0]["snippet"]["thumbnails"]["medium"]["url"]; 
			}
			else  {
	        header('Location:videos.php?add-main-error=true');
		    }	

			$buzzynews_titlestr = strtolower($buzzynews_title);
    //Make alphanumeric (removes all other characters)
    $buzzynews_titlestr1 = preg_replace("/[^a-z0-9_\s-]/", "", $buzzynews_titlestr);
    //Clean up multiple dashes or whitespaces
    $buzzynews_titlestr2 = preg_replace("/[\s-]+/", " ", $buzzynews_titlestr1);
    //Convert whitespaces and underscore to dash
    $buzzynews_url = preg_replace("/[\s_]/", "-", $buzzynews_titlestr2);		
			$buzzynews_source_url='https://www.youtube.com/'.$buzzyvideo_id.'';										
      }
	      $add_news_query = "INSERT INTO  buzzynews(buzzynews_title,buzzynews_title_tag,buzzyvideo_id,buzzynews_image,buzzynewscategory_id,buzzynews_text,buzzynews_url,buzzynews_metatag,buzzynews_source_name,buzzynews_source_url,
		buzzynews_datetime,buzzynews_timestamp,buzzynews_approval_status,buzzynews_gstatus)
		 	  VALUES(:buzzynews_title,:buzzynews_title_tag,:buzzyvideo_id,:buzzynews_image,:buzzynewscategory_id,:buzzynews_text,:buzzynews_url,:buzzynews_metatag,'Youtube video',:buzzynews_source_url,NOW(),:buzzynews_timestamp,1,1)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_news_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzynews_title', $buzzynews_title, PDO::PARAM_STR);
        $stmt->bindParam(':buzzynews_title_tag', $buzzynews_titlestr2, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyvideo_id', $buzzyvideo_id, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzynews_image', $buzzynews_image, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzynewscategory_id', $buzzynewscategory_id, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzynews_text', $buzzynews_text, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_url', $buzzynews_url, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_metatag', $buzzynews_text, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_source_url', $buzzynews_source_url, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzynews_timestamp', $now, PDO::PARAM_STR);		
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        if ($OK != 0) {
        header('Location: videos.php?add-settings-success=true');
        } else if ($OK == 0) {
	        header('Location: videos.php?add-main-error=true');
        }
	  }	
      else{
	   header('Location: videos.php?add-main-error=true');	
      }	  
	  }
	  }  
	      if (strpos($longbuzzyvideo,'youtube') !== false) {
      if (strpos($longbuzzyvideo,'list') !== false) {	
      if((preg_match('/https:\/\/(www\.)*youtube\.com\/.*/',$longbuzzyvideo)) OR (preg_match('/http:\/\/(www\.)*youtube\.com\/.*/',$longbuzzyvideo))){	   
      parse_str($image_url['query'],$q);
	  $buzzyvideo_id=$q['list'];
	  $buzzynewscategory_id=$_POST['buzzynewscategory_id'];	  
			$ch = curl_init();
            $headr = array();
            $headr[] = 'Content-length: 0';
            $headr[] = 'Content-type: application/json';
            curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/playlists?part=snippet&id='.$buzzyvideo_id.'&key='.$buzzyyoutubeapi.'');
   curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; xxxxx)'); // my product name
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $ch_data = curl_exec($ch);
            curl_close($ch);
            if(!empty($ch_data))
            {
            $json_data = json_decode($ch_data, true);
            //print_r($json_data);
					
			if(isset($json_data['items'][0]["snippet"]["title"])){		
            $buzzynews_title=$json_data['items'][0]["snippet"]["title"];
			}
			else  {
	        header('Location:videos.php?add-main-error=true');
		    }	
			if(isset($json_data['items'][0]["snippet"]["description"])){					
            $buzzynews_text=$json_data['items'][0]["snippet"]["description"];
            }
			else  {
	        header('Location:videos.php?add-main-error=true');
		    }	
			if(isset($json_data['items'][0]["snippet"]["thumbnails"]["high"]["url"])){				
			$buzzynews_image=$json_data['items'][0]["snippet"]["thumbnails"]["high"]["url"]; 
			}
			else  {
	        header('Location:videos.php?add-main-error=true');
		    }	

			$buzzynews_titlestr = strtolower($buzzynews_title);
    //Make alphanumeric (removes all other characters)
    $buzzynews_titlestr1 = preg_replace("/[^a-z0-9_\s-]/", "", $buzzynews_titlestr);
    //Clean up multiple dashes or whitespaces
    $buzzynews_titlestr2 = preg_replace("/[\s-]+/", " ", $buzzynews_titlestr1);
    //Convert whitespaces and underscore to dash
    $buzzynews_url = preg_replace("/[\s_]/", "-", $buzzynews_titlestr2);		
			$buzzynews_source_url='https://vimeo.com/'.$buzzyvideo_id.'';
							
      }
	      $add_news_query = "INSERT INTO  buzzynews(buzzynews_title,buzzyvideo_id,buzzynews_image,buzzynewscategory_id,buzzynews_text,buzzynews_url,buzzynews_metatag,buzzynews_source_name,buzzynews_source_url,
		buzzynews_datetime,buzzynews_timestamp,buzzynews_approval_status,buzzynews_gstatus,buzzyvideo_playlist_status)
		 	  VALUES(:buzzynews_title,:buzzyvideo_id,:buzzynews_image,:buzzynewscategory_id,:buzzynews_text,:buzzynews_url,:buzzynews_metatag,'Youtube video',:buzzynews_source_url,NOW(),:buzzynews_timestamp,1,1,1)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_news_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzynews_title', $buzzynews_title, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyvideo_id', $buzzyvideo_id, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzynews_image', $buzzynews_image, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzynewscategory_id', $buzzynewscategory_id, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzynews_text', $buzzynews_text, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_url', $buzzynews_url, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_metatag', $buzzynews_text, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_source_url', $buzzynews_source_url, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzynews_timestamp', $now, PDO::PARAM_STR);		
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        if ($OK != 0) {
        header('Location: videos.php?add-settings-success=true');
        } else if ($OK == 0) {
	        header('Location: videos.php?add-main-error=true');
        }
	  }	
      else{
	   header('Location: videos.php?add-main-error=true');	
      }	  
	  }
	  }    
	 
	 
	 
	 
	 
	 
	 
	  else if (strpos($longbuzzyvideo,'vimeo') !== false) {
      if((preg_match('/https:\/\/(www\.)*vimeo\.com\/.*/',$longbuzzyvideo)) OR (preg_match('/http:\/\/(www\.)*vimeo\.com\/.*/',$longbuzzyvideo))){		  
      $buzzyvideo_id=substr($image_url['path'], 1);	 
	  $buzzynewscategory_id=$_POST['buzzynewscategory_id'];	 
			$ch1 = curl_init();
            $headr1 = array();
            $headr1[] = 'Content-length: 0';
            $headr1[] = 'Content-type: application/json';
			$headr1[] = 'Authorization: Bearer '.$buzzyvimeoaccesstoken.''; // my token for the api
            curl_setopt($ch1, CURLOPT_URL, 'https://api.vimeo.com/videos/'.$buzzyvideo_id.'');
            curl_setopt($ch1, CURLOPT_HTTPHEADER,$headr1);
            curl_setopt($ch1, CURLOPT_HTTPHEADER,$headr1);
            curl_setopt($ch1, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; xxxxx)'); // my product name
            curl_setopt($ch1, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true); 
            $ch_data1 = curl_exec($ch1);
            curl_close($ch1);
            if(!empty($ch_data1))
            {
            $json_data1 = json_decode($ch_data1, true);
            //print_r($json_data);
			if(isset($json_data1['name'])){
            $buzzynews_title=$json_data1['name'];
		    }
            else  {
	        header('Location:videos.php?add-main-error=true');
		    }			
			if(isset($json_data1['description'])){			
			$buzzynews_text=$json_data1['description'];	
            }
			else  {
	        header('Location:videos.php?add-main-error=true');
		    }	
			if(isset($json_data1['pictures']['sizes'][3]['link'])){				
            $buzzynews_image=$json_data1['pictures']['sizes'][3]['link'];							
            }
	        else  {
	        header('Location:videos.php?add-main-error=true');
		    }	
			}
	
            $ch2 = curl_init();
            $headr2 = array();
            $headr2[] = 'Content-length: 0';
            $headr2[] = 'Content-type: application/json';
			$headr2[] = 'Authorization: Bearer '.$buzzyvimeoaccesstoken.''; // my token for the api
            curl_setopt($ch2, CURLOPT_URL, 'https://api.vimeo.com/videos/'.$buzzyvideo_id.'/categories');
            curl_setopt($ch2, CURLOPT_HTTPHEADER,$headr2);
            curl_setopt($ch2, CURLOPT_HTTPHEADER,$headr2);
            curl_setopt($ch2, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; xxxxx)'); // my product name
            curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true); 
            $ch_data2 = curl_exec($ch2);
            curl_close($ch2);
            if(!empty($ch_data2))
            {
            $json_data2 = json_decode($ch_data2, true);
            //print_r($json_data);
            if (isset ($json_data2['data'][1]['name'])){
            $buzzynews_category=$json_data2['data'][1]['name'];	
			}
            if (!isset ($json_data2['data'][1]['name'])){
            $buzzynews_category='rest';	
			}			
            }
			$buzzynews_titlestr = strtolower($buzzynews_title);
    //Make alphanumeric (removes all other characters)
    $buzzynews_titlestr1 = preg_replace("/[^a-z0-9_\s-]/", "", $buzzynews_titlestr);
    //Clean up multiple dashes or whitespaces
    $buzzynews_titlestr2 = preg_replace("/[\s-]+/", " ", $buzzynews_titlestr1);
    //Convert whitespaces and underscore to dash
    $buzzynews_url = preg_replace("/[\s_]/", "-", $buzzynews_titlestr2);		
			$buzzynews_source_url='https://www.youtube.com/'.$buzzyvideo_id.'';
			
      $add_news_query = "INSERT INTO  buzzynews(buzzynews_title,buzzyvideo_id,buzzynews_image,buzzynewscategory_id,buzzynews_text,buzzynews_url,buzzynews_metatag,buzzynews_source_name,buzzynews_source_url,
		buzzynews_datetime,buzzynews_timestamp,buzzynews_approval_status,buzzynews_gstatus,buzzyvideo_playlist_status)
		 	  VALUES(:buzzynews_title,:buzzyvideo_id,:buzzynews_image,:buzzynewscategory_id,:buzzynews_text,:buzzynews_url,:buzzynews_metatag,'Vimeo video',:buzzynews_source_url,NOW(),:buzzynews_timestamp,1,1,2)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_news_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzynews_title', $buzzynews_title, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyvideo_id', $buzzyvideo_id, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzynews_image', $buzzynews_image, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzynewscategory_id', $buzzynewscategory_id, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzynews_text', $buzzynews_text, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_url', $buzzynews_url, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_metatag', $buzzynews_text, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_source_url', $buzzynews_source_url, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzynews_timestamp', $now, PDO::PARAM_STR);		
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        if ($OK != 0) {
        header('Location: videos.php?add-video-success=true');
        } else if ($OK == 0) {
	        header('Location:add-video.php?add-main-error=true');
        }
	  }	
      else{
	   header('Location:add-video.php?add-main-error=true');	
      }		  
	 } 

	 
	  
     
      } 
else{

}
	  
    }
	
	if ($_SESSION["buzzyadmin_id"]==2){ 
    if (isset($_POST['add_main'])) {
	    header('Location: videos.php?onlydemo=true');
        }
    }
	
/**
 * PHP CODE FOR ADD NEW VIDEO  ---- END
 */