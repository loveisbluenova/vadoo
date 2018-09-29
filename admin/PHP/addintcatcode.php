<?php
/**
 * PHP CODE FOR CREATE NEWS  ---- START
 */
$now = time();
if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['add_interest_category'])) {	
 $buzzyuser_interest_category=$_POST['buzzyuser_interest_category'];
 $buzzyuser_interest_category_icon=$_POST['buzzyuser_interest_category_icon'];						
        $OK = false;
        // create database connection
        // initialize prepared statement
        // create SQL
        $add_intcat_query = "INSERT INTO  buzzyuser_interest_categories(buzzyuser_interest_category,buzzyuser_interest_category_icon)
		 	  VALUES(:buzzyuser_interest_category,:buzzyuser_interest_category_icon)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_intcat_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_interest_category', $buzzyuser_interest_category, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_interest_category_icon', $buzzyuser_interest_category_icon, PDO::PARAM_STR);
	
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        if ($OK != 0) {
	    header('Location:interestcategories.php');
        } 
		else if ($OK == 0) {
        header('Location: interestcategories.php?error=errorupload');
        }
    }
}

if ($_SESSION["buzzyadmin_id"]==2){ 
    if (isset($_POST['add_interest_category'])) {
	    header('Location: interestcategories.php?onlydemo=true');
        }
		}

/**
 * PHP CODE FOR CREATE NEWS CATEGORY  ---- END
 */