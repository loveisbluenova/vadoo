<?php
/**
 * PHP CODE FOR CREATE NEW CATEGORY  ---- START
 */
if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['add_category'])) {
	    $buzzynewscategory=$_POST['buzzynewscategory'];
		$buzzynewscategory1 = strtolower($buzzynewscategory);
		$buzzynewscategory_url = preg_replace("/[\s_]/", "-", $buzzynewscategory1);
        $OK = false;
        // create database connection
        // initialize prepared statement
        // create SQL
        $register_category_query = "INSERT INTO  buzzynewscategories(buzzynewscategory,buzzynewscategory_url,buzzynewscategory_metatag,buzzynewscategory_datecreated)
		 	  VALUES(:buzzynewscategory,:buzzynewscategory_url,:buzzynewscategory_metatag,NOW())";
        // prepare the statement
        $stmt = $connwrite->prepare($register_category_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzynewscategory', $buzzynewscategory, PDO::PARAM_STR);
        $stmt->bindParam(':buzzynewscategory_url', $buzzynewscategory_url, PDO::PARAM_STR);
        $stmt->bindParam(':buzzynewscategory_metatag', $_POST['buzzynewscategory_metatag'], PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        if ($OK != 0) {
	header('Location: categories.php?add-settings-success=true');
        } else if ($OK == 0) {
          echo '<script>
          alert("There is already url with this name. Please choose another one.");
         </script>';
        }
    }
 }
 
if ($_SESSION["buzzyadmin_id"]==2){ 
if (isset($_POST['add_category'])) {
	header('Location: categories.php?onlydemo=true');
}	
}
/**
 * PHP CODE FOR CREATE NEW CATEGORY  ---- END
 */