<?php
   $this_category_query = "SELECT buzzynewscategory_id,buzzynewscategory,buzzynewscategory_url,buzzynewscategory_metatag,
   DATE_FORMAT(buzzynewscategory_datecreated,'%d. %m. %Y') as buzzynewscategory_datecreated FROM  buzzynewscategories WHERE buzzynewscategory_id=$this_category_id";
   if ($_SESSION["buzzyadmin_id"]==1){
   if (isset($_POST['update_category'])) {
        $OK = false;
        $update_category_query = "UPDATE buzzynewscategories SET buzzynewscategory=:buzzynewscategory,buzzynewscategory_url=:buzzynewscategory_url, 
		buzzynewscategory_metatag=:buzzynewscategory_metatag WHERE buzzynewscategory_id=$this_category_id";
        $stmt = $connwrite->prepare($update_category_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzynewscategory', $_POST['buzzynewscategory'], PDO::PARAM_STR);
        $stmt->bindParam(':buzzynewscategory_url', $_POST['buzzynewscategory_url'], PDO::PARAM_STR);
        $stmt->bindParam(':buzzynewscategory_metatag', $_POST['buzzynewscategory_metatag'], PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	    header('Location: categories.php?add-settings-success=true');
		}
    }
   if ($_SESSION["buzzyadmin_id"]==2){
	if (isset($_POST['update_category'])) {
	header('Location: categories.php?onlydemo=true');
   }   
   }	   