<?php
/**
 * PHP CODE FOR CREATE NEWS  ---- START
 */
$now = time();
if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['add_custom_page'])) {	
 $OK = false;
    $buzzycustompage_title=$_POST['buzzycustompage_title'];
    $buzzycustompage_url=$_POST['buzzycustompage_url'];  
    $buzzycustompage_text=$_POST['buzzycustompage_text'];					
	
        // create database connection
        // initialize prepared statement
        // create SQL

        $add_page_query = "INSERT INTO  buzzycustompages(buzzycustompage_title,buzzycustompage_url,buzzycustompage_text)
		 	  VALUES(:buzzycustompage_title,:buzzycustompage_url,:buzzycustompage_text)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_page_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzycustompage_title', $buzzycustompage_title, PDO::PARAM_STR);
        $stmt->bindParam(':buzzycustompage_url', $buzzycustompage_url, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzycustompage_text', $buzzycustompage_text, PDO::PARAM_STR);
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        if ($OK != 0) {
	    header('Location:custom-pages.php');
        } 
		else if ($OK == 0) {
        header('Location:custom-pages.php?error=errorupload');
        }
    }
}

if ($_SESSION["buzzyadmin_id"]==2){ 
    if (isset($_POST['add_custom_page'])) {
	    header('Location: custom-pages.php?onlydemo=true');
        }
		}

/**
 * PHP CODE FOR CREATE NEWS CATEGORY  ---- END
 */