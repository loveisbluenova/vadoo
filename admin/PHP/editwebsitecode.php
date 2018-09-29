<?php
$website_options_query = "SELECT * FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1";
   foreach ($connread->query($website_options_query) as $row) {
   $rowbuzzynewslimit=$row['buzzynewslimit'];
   $rowbuzzytimezone=$row['buzzytimezone'];
   }
   if ($_SESSION["buzzyadmin_id"]==1){   
   if (isset($_POST['update_website_options'])) {
        if (isset($_POST['buzzytimezone'])) {
		$buzzytimezone=$_POST['buzzytimezone'];
		}
	    else if (!isset($_POST['buzzytimezone'])) {
		$buzzytimezone=$rowbuzzytimezone;
		}
		
		if (isset($_POST['buzzynewslimit'])) {
		$buzzynewslimit=$_POST['buzzynewslimit'];
		}
	    else if (!isset($_POST['buzzynewslimit'])) {
		$buzzynewslimit=$rowbuzzynewslimit;
		}
		
        if (isset($_POST['buzzygrideffect'])) {
		$buzzygrideffect=$_POST['buzzygrideffect'];
		}
	    else if (!isset($_POST['buzzygrideffect'])) {
		$buzzygrideffect='2';
		}
		if (isset($_POST['buzzycolumns'])) {
		$buzzycolumns=$_POST['buzzycolumns'];
		}
		else if (!isset($_POST['buzzycolumns'])) {
		$buzzycolumns='three-columns';
		}
		if (isset($_POST['buzzyanimationspeed'])) {
		$buzzyanimationspeed=$_POST['buzzyanimationspeed'];
		}
		else if (!isset($_POST['buzzyanimationspeed'])) {
		$buzzyanimationspeed='normal';
		}
		if (isset($_POST['buzzyoptimizedstatus'])) {
		$buzzyoptimizedstatus=$_POST['buzzyoptimizedstatus'];
		}
		else if (!isset($_POST['buzzyoptimizedstatus'])) {
		$buzzyoptimizedstatus=0;
		}
		 $buzzyemailpass=$_POST['buzzyemailpass'];	
     $buzzyemailpass1 = htmlspecialchars($buzzyemailpass, ENT_QUOTES);	
     $enc_buzzyemailpass1=md5($buzzyemailpass1);	 	
        $OK = false;
        $update_website_options_query = "UPDATE buzzysiteoptions SET  buzzywebsite_status=:buzzywebsite_status,buzzysitename=:buzzysitename, buzzysiteurl=:buzzysiteurl, buzzyfacebookid=:buzzyfacebookid,
		buzzyanimationspeed=:buzzyanimationspeed,
		buzzygrideffect=:buzzygrideffect,buzzycolumns=:buzzycolumns,buzzytitletag=:buzzytitletag,buzzymax_pages=:buzzymax_pages,
		buzzymetatag=:buzzymetatag,buzzyemail=:buzzyemail,buzzyemailpass=:buzzyemailpass,buzzyprivacy=:buzzyprivacy,buzzyterms=:buzzyterms,buzzysitemeasure=:buzzysitemeasure,buzzydistance_mesaure=:buzzydistance_mesaure,buzzytimezone=:buzzytimezone,buzzyoptimizedstatus=:buzzyoptimizedstatus,
		buzzynewslimit=:buzzynewslimit,buzzyuserimage_status=:buzzyuserimage_status,buzzylanguage_status=:buzzylanguage_status,
		buzzy_access=:buzzy_access,buzzy_accesstime=:buzzy_accesstime,buzzy_frontpage=:buzzy_frontpage,buzzy_forbid=:buzzy_forbid,buzzy_ajaxcount=:buzzy_ajaxcount WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_options_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzywebsite_status', $_POST['buzzywebsite_status'], PDO::PARAM_STR);		
        $stmt->bindParam(':buzzysitename', $_POST['buzzysitename'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzysiteurl', $_POST['buzzysiteurl'], PDO::PARAM_STR);
	    $stmt->bindParam(':buzzyfacebookid', $_POST['buzzyfacebookid'], PDO::PARAM_STR);
        $stmt->bindParam(':buzzygrideffect', $buzzygrideffect, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyanimationspeed', $buzzyanimationspeed, PDO::PARAM_STR);
		$stmt->bindParam(':buzzycolumns', $buzzycolumns, PDO::PARAM_STR);
		$stmt->bindParam(':buzzytitletag', $_POST['buzzytitletag'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzymax_pages', $_POST['buzzymax_pages'], PDO::PARAM_STR);		
		$stmt->bindParam(':buzzymetatag', $_POST['buzzymetatag'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyemail', $_POST['buzzyemail'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyemailpass', $enc_buzzyemailpass1, PDO::PARAM_STR);		
	    $stmt->bindParam(':buzzyprivacy', $_POST['buzzyprivacy'], PDO::PARAM_STR);
	    $stmt->bindParam(':buzzyterms', $_POST['buzzyterms'], PDO::PARAM_STR);		
	    $stmt->bindParam(':buzzysitemeasure', $_POST['buzzysitemeasure'], PDO::PARAM_STR);			
	    $stmt->bindParam(':buzzydistance_mesaure', $_POST['buzzydistance_mesaure'], PDO::PARAM_STR);			
	    $stmt->bindParam(':buzzytimezone', $buzzytimezone, PDO::PARAM_STR);
	    $stmt->bindParam(':buzzyoptimizedstatus', $buzzyoptimizedstatus, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzynewslimit', $buzzynewslimit, PDO::PARAM_STR);
	    $stmt->bindParam(':buzzyuserimage_status', $_POST['buzzyuserimage_status'], PDO::PARAM_STR);		
	    $stmt->bindParam(':buzzylanguage_status', $_POST['buzzylanguage_status'], PDO::PARAM_STR);		
	    $stmt->bindParam(':buzzy_access', $_POST['buzzy_access'], PDO::PARAM_STR);	
	    $stmt->bindParam(':buzzy_accesstime', $_POST['buzzy_accesstime'], PDO::PARAM_STR);		
	    $stmt->bindParam(':buzzy_frontpage', $_POST['buzzy_frontpage'], PDO::PARAM_STR);		
	    $stmt->bindParam(':buzzy_forbid', $_POST['buzzy_forbid'], PDO::PARAM_STR);		
	    $stmt->bindParam(':buzzy_ajaxcount', $_POST['buzzy_ajaxcount'], PDO::PARAM_STR);		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	  	header('Location: index.php?add-settings-success=true');	
		}
   }
      if ($_SESSION["buzzyadmin_id"]==2){
	if (isset($_POST['update_website_options'])) {
  	header('Location: index.php?onlydemo=true');
     }      
	  }