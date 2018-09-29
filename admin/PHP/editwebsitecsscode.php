<?php
if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['update_css_options'])) {
        $OK = false;	
		$buzzycss_loader=$_POST['buzzycss_loader'];
		$buzzycss_color_css=$_POST['buzzycss_color_css'];
		$buzzycss_color_css1=$_POST['buzzycss_color_css1'];	
		$buzzycss_color_css2=$_POST['buzzycss_color_css2'];	
		$buzzycss_color_css3=$_POST['buzzycss_color_css3'];	
		$buzzycss_color_css4=$_POST['buzzycss_color_css4'];	
		$buzzycss_color_css5=$_POST['buzzycss_color_css5'];			
        $buzzycss_width=$_POST['buzzycss_width'];
		$buzzycss_btnradius=$_POST['buzzycss_btnradius'];								
		if (!isset($_POST['buzzycss_headings_font_family'])){		
		$buzzycss_headings_font_family='roboto';
		}
		else {
		$buzzycss_headings_font_family=$_POST['buzzycss_headings_font_family'];
        }	
		if (!isset($_POST['buzzycss_body_font_family'])){	
		$buzzycss_body_font_family='arial';
		}
		else {
		$buzzycss_body_font_family=$_POST['buzzycss_body_font_family'];
        }		
        $update_website_cssoptions_query = "UPDATE buzzycss SET buzzycss_color_css=:buzzycss_color_css,buzzycss_color_css1=:buzzycss_color_css1,buzzycss_color_css2=:buzzycss_color_css2,buzzycss_color_css3=:buzzycss_color_css3,
		buzzycss_color_css4=:buzzycss_color_css4,buzzycss_color_css5=:buzzycss_color_css5,buzzycss_width=:buzzycss_width,buzzycss_headings_font_family=:buzzycss_headings_font_family,
		buzzycss_body_font_family=:buzzycss_body_font_family,buzzycss_loader=:buzzycss_loader,buzzycss_btnradius=:buzzycss_btnradius  WHERE buzzycss_id=$chosen_buzzytheme_id";
        $stmt = $connwrite->prepare($update_website_cssoptions_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzycss_color_css', $buzzycss_color_css, PDO::PARAM_STR);
		$stmt->bindParam(':buzzycss_color_css1', $buzzycss_color_css1, PDO::PARAM_STR);
		$stmt->bindParam(':buzzycss_color_css2', $buzzycss_color_css2, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzycss_color_css3', $buzzycss_color_css3, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzycss_color_css4', $buzzycss_color_css4, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzycss_color_css5', $buzzycss_color_css5, PDO::PARAM_STR);			
		$stmt->bindParam(':buzzycss_width', $buzzycss_width, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzycss_headings_font_family', $buzzycss_headings_font_family, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzycss_body_font_family', $buzzycss_body_font_family, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzycss_loader', $buzzycss_loader, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzycss_btnradius', $buzzycss_btnradius, PDO::PARAM_STR);			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	     header('Location: css-options.php?add-settings-success=true');
		}
     }
	 
	  if ($_SESSION["buzzyadmin_id"]==2){ 
      if (isset($_POST['update_css_options'])) {
	    header('Location:css-options.php?onlydemo=true');	   
      }
	  }