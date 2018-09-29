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
        $OK = false;
        $update_website_options_query = "UPDATE buzzysiteoptions SET buzzytitletag=:buzzytitletag,
		buzzymetatag=:buzzymetatag,buzzyoptimizedstatus=:buzzyoptimizedstatus,
		buzzy_gzip=:buzzy_gzip WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_options_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzytitletag', $_POST['buzzytitletag'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzymetatag', $_POST['buzzymetatag'], PDO::PARAM_STR);
	    $stmt->bindParam(':buzzyoptimizedstatus', $buzzyoptimizedstatus, PDO::PARAM_STR);			
	    $stmt->bindParam(':buzzy_gzip', $_POST['buzzy_gzip'], PDO::PARAM_STR);			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	  	header('Location: seo.php?add-settings-success=true');	
		}
   }
      if ($_SESSION["buzzyadmin_id"]==2){
	if (isset($_POST['update_website_options'])) {
  	header('Location: seo.php?onlydemo=true');
     }      
	  }
	  $website_options_query = "SELECT * FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1";