<?php
   $website_api_query = "SELECT * FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1";
                foreach ($connread->query($website_api_query) as $row) {
				$buzzyfacebookid=$row['buzzyfacebookid'];
				$buzzyfacebooksecret=$row['buzzyfacebooksecret'];	
				$buzzyfacebookaccess=$row['buzzyfacebookaccess'];	
				
				   }
				   
   if ($_SESSION["buzzyadmin_id"]==1){   
   if (isset($_POST['update_api_options'])) {
   $postbuzzyyoutubeapi= $_POST['buzzyyoutubeapi']; 
   $postbuzzyfacebookid=$_POST['buzzyfacebookid'];
   $postbuzzyfacebooksecret=$_POST['buzzyfacebooksecret'];  
   $postbuzzyfacebookaccess=$_POST['buzzyfacebookaccess'];      
   $postbuzzycaptcha_sitekey=$_POST['buzzycaptcha_sitekey'];
   $postbuzzycaptcha_secretkey=$_POST['buzzycaptcha_secretkey'];
   
$dbstr=file_get_contents('../oauth/fb/login_with_facebook.php');
$dbstr1 = htmlspecialchars($dbstr, ENT_QUOTES);;
$oldonetxt = array($buzzyfacebookid, $buzzyfacebooksecret);
$newonetxt   = array($postbuzzyfacebookid,$postbuzzyfacebooksecret);
$newphrase = str_replace($oldonetxt , $newonetxt, $dbstr);
file_put_contents("../oauth/fb/login_with_facebook.php",$newphrase);
   
        $OK = false;
        $update_api_options_query = "UPDATE buzzysiteoptions SET  buzzyyoutubeapi=:buzzyyoutubeapi,buzzyfacebookid=:buzzyfacebookid,buzzyfacebooksecret=:buzzyfacebooksecret,
        buzzyfacebookaccess=:buzzyfacebookaccess,buzzycaptcha_sitekey=:buzzycaptcha_sitekey,buzzycaptcha_secretkey=:buzzycaptcha_secretkey
		WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_api_options_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyyoutubeapi', $postbuzzyyoutubeapi, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyfacebookid', $postbuzzyfacebookid, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyfacebooksecret', $postbuzzyfacebooksecret, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyfacebookaccess', $postbuzzyfacebookaccess, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzycaptcha_sitekey', $postbuzzycaptcha_sitekey, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzycaptcha_secretkey', $postbuzzycaptcha_secretkey, PDO::PARAM_STR);			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	  	header('Location: apis.php?add-settings-success=true');	
		}
   }
      if ($_SESSION["buzzyadmin_id"]==2){
	if (isset($_POST['update_api_options'])) {
  	header('Location: apis.php?onlydemo=true');
     }      
	  }