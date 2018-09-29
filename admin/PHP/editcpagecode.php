<?php
   
   if ($_SESSION["buzzyadmin_id"]==1){   
   if (isset($_POST['edit_page'])) {
    $buzzycustompage_title=$_POST['buzzycustompage_title']; 
    $buzzycustompage_url=$_POST['buzzycustompage_url'];  
    $buzzycustompage_text=$_POST['buzzycustompage_text'];   
        $OK = false;
        $update_cpage_query = "UPDATE buzzycustompages SET  buzzycustompage_title=:buzzycustompage_title,buzzycustompage_url=:buzzycustompage_url, 
	    buzzycustompage_text=:buzzycustompage_text WHERE buzzycustompage_id=$page_id";
        $stmt = $connwrite->prepare($update_cpage_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzycustompage_title', $buzzycustompage_title, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzycustompage_url', $buzzycustompage_url, PDO::PARAM_STR);
		$stmt->bindParam(':buzzycustompage_text', $buzzycustompage_text, PDO::PARAM_STR);	
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	  	header('Location: custom-pages.php?add-settings-success=true');	
		}
   }
      if ($_SESSION["buzzyadmin_id"]==2){
	if (isset($_POST['edit_page'])) {
  	header('Location: custom-pages.php?onlydemo=true');
     }      
	  }
	  $website_options_query = "SELECT * FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1";