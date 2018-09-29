<?php
/**
 * PHP CODE FOR CREATE NEW VIDEO  ---- START
 */
// error handler function

 $website_options_query = "SELECT * FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1";
   foreach ($connread->query($website_options_query) as $row) {
   $buzzyyoutubeapi=$row['buzzyyoutubeapi'];
   $buzzyvimeoaccesstoken=$row['buzzyvimeoaccesstoken'];
   $buzzyfacebookaccess=$row['buzzyfacebookaccess'];
   $buzzydribbbleclientid=$row['buzzydribbbleclientid'];		
   $buzzydribbblesecret=$row['buzzydribbblesecret'];	
   $buzzydribbbleaccesstoken=$row['buzzydribbbleaccesstoken'];	
  }
 
$now = time();
if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['add_dribbble_url'])) {
      $buzzydribbble_url=$_POST['buzzydribbble_url'];
$urla = explode('/', $buzzydribbble_url);
$format_buzzydribbble_url = array_pop($urla);	  
			$ch = curl_init();
            $headr = array();
            $headr[] = 'Content-length: 0';
            $headr[] = 'Content-type: application/json';
            curl_setopt($ch, CURLOPT_URL, 'https://api.dribbble.com/v1/shots/'.$format_buzzydribbble_url.'/?access_token='.$buzzydribbbleaccesstoken.'');
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; xxxxx)'); // my product name
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $ch_data = curl_exec($ch);
            curl_close($ch);
	        $buzzynewscategory_id=$_POST['buzzynewscategory_id'];	 			
            if(!empty($ch_data))
            {
            $json_data = json_decode($ch_data, true);
            //print_r($json_data);
					
	        if(isset($json_data['title'])){		
            $buzzynews_title=$json_data['title'];
			}
			else  {
	        header('Location:dribbblepg.php?add-tokken-error1=true');
		    }	
			if(isset($json_data['description'])){					
            $buzzynews_text=$json_data['description'];
            }
			else  {
	        header('Location:dribbblepg.php?add-tokken-error2=true');
		    }	
			if(isset($json_data['images']['hidpi'])){				
			$buzzynews_image=$json_data['images']['hidpi']; 
			}
			else  {
	        header('Location:dribbblepg.php?add-tokken-error3=true');
		    }	
			if(isset($json_data['images']['normal'])){				
			$buzzynews_timage=$json_data['images']['normal']; 
			}
			else  {
	        header('Location:dribbblepg.php?add-tokken-error4=true');
		    }

			
			if(isset($json_data['html_url'])){				
			$buzzynews_source_url=$json_data['html_url']; 
			$buzzynews_url=$json_data['html_url']; 			
			}
			else  {
	        header('Location:dribbblepg.php?add-tokken-error5=true');
		    }	
            $buzzynews_metatag=$_POST['buzzynews_metatag']; 

			$buzzynews_titlestr = strtolower($buzzynews_title);
    //Make alphanumeric (removes all other characters)
    $buzzynews_titlestr1 = preg_replace("/[^a-z0-9_\s-]/", "", $buzzynews_titlestr);
    //Clean up multiple dashes or whitespaces
    $buzzynews_titlestr2 = preg_replace("/[\s-]+/", " ", $buzzynews_titlestr1);
    //Convert whitespaces and underscore to dash
    $buzzynews_url = preg_replace("/[\s_]/", "-", $buzzynews_titlestr2);								
      }
	      $add_fb_query = "INSERT INTO  buzzynews(buzzynews_title,buzzynews_title_tag,buzzynews_image,buzzynews_timage,buzzynewscategory_id,buzzynews_text,buzzynews_url,buzzynews_metatag,buzzynews_source_name,buzzynews_source_url,
		buzzynews_datetime,buzzynews_timestamp,buzzynews_approval_status,buzzynews_gstatus)
		 	  VALUES(:buzzynews_title,:buzzynews_title_tag,:buzzynews_image,:buzzynews_timage,:buzzynewscategory_id,:buzzynews_text,:buzzynews_url,:buzzynews_metatag,'Facebook page',:buzzynews_source_url,NOW(),:buzzynews_timestamp,1,51)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_fb_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzynews_title', $buzzynews_title, PDO::PARAM_STR);
        $stmt->bindParam(':buzzynews_title_tag', $buzzynews_titlestr2, PDO::PARAM_STR);			
		$stmt->bindParam(':buzzynews_image', $buzzynews_image, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzynews_timage', $buzzynews_timage, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzynewscategory_id', $buzzynewscategory_id, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzynews_text', $buzzynews_text, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_url', $buzzynews_url, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_metatag', $buzzynews_metatag, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_source_url', $buzzynews_source_url, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzynews_timestamp', $now, PDO::PARAM_STR);		
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        if ($OK != 0) {
        header('Location: dribbblepg.php?add-settings-success=true');
        } else if ($OK == 0) {
	     
        }

      else{
	   header('Location: dribbblepg.php?add-error=true');	
      }	      
      } 
else{

}	  
    }	
	if ($_SESSION["buzzyadmin_id"]==2){ 
    if (isset($_POST['add_dribbble_url'])) {
	    header('Location: dribbblepg.php?onlydemo=true');
        }
    }
	
/**
 * PHP CODE FOR ADD NEW VIDEO  ---- END
 */