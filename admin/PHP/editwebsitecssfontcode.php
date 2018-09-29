<?php
if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['update_cssfont_options'])) {
        $OK = false;	
$buzzycsspsize=$_POST['buzzycsspsize'];	
$buzzycssh1size=$_POST['buzzycssh1size'];
$buzzycssh2size=$_POST['buzzycssh2size'];
$buzzycssh3size=$_POST['buzzycssh3size'];
$buzzycssh4size=$_POST['buzzycssh4size'];
$buzzycssh5size=$_POST['buzzycssh5size'];
$buzzycssh6size=$_POST['buzzycssh6size'];	

$final_buzzycsspsize=$buzzycsspsize.'px';	
$final_buzzycssh1size=$buzzycssh1size.'px';
$final_buzzycssh2size=$buzzycssh2size.'px';
$final_buzzycssh3size=$buzzycssh3size.'px';
$final_buzzycssh4size=$buzzycssh4size.'px';
$final_buzzycssh5size=$buzzycssh5size.'px';
$final_buzzycssh6size=$buzzycssh6size.'px';	
				
        $update_website_cssfontoptions_query = "UPDATE buzzycss SET buzzycsspsize=:buzzycsspsize,buzzycssh1size=:buzzycssh1size,buzzycssh2size=:buzzycssh2size,
		buzzycssh3size=:buzzycssh3size,buzzycssh4size=:buzzycssh4size,buzzycssh5size=:buzzycssh5size,buzzycssh6size=:buzzycssh6size  WHERE buzzycss_id=$chosen_buzzytheme_id";
        $stmt = $connwrite->prepare($update_website_cssfontoptions_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzycsspsize', $final_buzzycsspsize, PDO::PARAM_STR);
		$stmt->bindParam('buzzycssh1size', $final_buzzycssh1size, PDO::PARAM_STR);
		$stmt->bindParam('buzzycssh2size', $final_buzzycssh2size, PDO::PARAM_STR);
		$stmt->bindParam('buzzycssh3size', $final_buzzycssh3size, PDO::PARAM_STR);
		$stmt->bindParam('buzzycssh4size', $final_buzzycssh4size, PDO::PARAM_STR);			
		$stmt->bindParam('buzzycssh5size', $final_buzzycssh5size, PDO::PARAM_STR);
		$stmt->bindParam('buzzycssh6size', $final_buzzycssh6size, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	     header('Location: css-options.php?add-settings-success=true');
		}
     }
	 
	  if ($_SESSION["buzzyadmin_id"]==2){ 
      if (isset($_POST['update_cssfont_options'])) {
	    header('Location:css-options.php?onlydemo=true');	   
      }
	  }
