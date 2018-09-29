<?php
   if ($_SESSION["buzzyadmin_id"]==1){	
   if (isset($_POST['edit_interest_category'])) {
    $buzzyuser_interest_category=$_POST['buzzyuser_interest_category'];	
    $buzzyuser_interest_category_icon=$_POST['buzzyuser_interest_category_icon'];	
     $OK = false;
        $update_int_status_query = "UPDATE buzzyuser_interest_categories SET buzzyuser_interest_category=:buzzyuser_interest_category,buzzyuser_interest_category_icon=:buzzyuser_interest_category_icon WHERE buzzyuser_interest_category_id=$cat_id";
        $stmt = $connwrite->prepare($update_int_status_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_interest_category', $buzzyuser_interest_category, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_interest_category_icon', $buzzyuser_interest_category_icon, PDO::PARAM_STR);		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		header('Location:interestcategories.php?add-settings-success=true');
   }
   }
   else  if ($_SESSION["buzzyadmin_id"]==2){	
   if (isset($_POST['edit_interest_category'])) {
		header('Location:interestcategories.php?onlydemo=true');
   }
   }
