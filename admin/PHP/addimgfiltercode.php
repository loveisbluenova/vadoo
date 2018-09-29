<?php

 
  if ($_SESSION["buzzyadmin_id"]==1){ 
  if (isset($_POST['add_img-filter'])) {
$buzzyimgfilter_bright=$_POST['buzzyimgfilter_bright'];
$buzzyimgfilter_cont=$_POST['buzzyimgfilter_cont'];
$buzzyimgfilter_gray=$_POST['buzzyimgfilter_gray'];
$buzzyimgfilter_hue=$_POST['buzzyimgfilter_hue'];
$buzzyimgfilter_invert=$_POST['buzzyimgfilter_invert'];
$buzzyimgfilter_opacity=$_POST['buzzyimgfilter_opacity'];
$buzzyimgfilter_sat=$_POST['buzzyimgfilter_sat'];
$buzzyimgfilter_sepia=$_POST['buzzyimgfilter_sepia'];
        $OK = false;
        $update_imgfilter_query = "UPDATE buzzyimgfilter SET buzzyimgfilter_bright=:buzzyimgfilter_bright,buzzyimgfilter_cont=:buzzyimgfilter_cont,
    	buzzyimgfilter_gray=:buzzyimgfilter_gray,buzzyimgfilter_hue=:buzzyimgfilter_hue,buzzyimgfilter_invert=:buzzyimgfilter_invert,
        buzzyimgfilter_opacity=:buzzyimgfilter_opacity,buzzyimgfilter_sat=:buzzyimgfilter_sat,buzzyimgfilter_sepia=:buzzyimgfilter_sepia WHERE buzzyarticle_special=$chosen_buzzytheme_id";
        $stmt = $connwrite->prepare($update_imgfilter_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyimgfilter_bright', $buzzyimgfilter_bright, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyimgfilter_cont', $buzzyimgfilter_cont, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyimgfilter_gray', $buzzyimgfilter_gray, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyimgfilter_hue', $buzzyimgfilter_hue, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyimgfilter_invert', $buzzyimgfilter_invert, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyimgfilter_opacity', $buzzyimgfilter_opacity, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyimgfilter_sat', $buzzyimgfilter_sat, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyimgfilter_sepia', $buzzyimgfilter_sepia, PDO::PARAM_STR);			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		header('Location: css-options.php?add-settings-success=true');
		}
  }
  
   if ($_SESSION["buzzyadmin_id"]==2){
   if (isset($_POST['add_img-filter'])) {
	header('Location: css-options.php?onlydemo=true');
   }   
   }