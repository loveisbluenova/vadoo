   <?php
   if (isset($_POST['update_language'])) {
        $OK = false;
        $update_website_language_query = "UPDATE buzzylanguages SET buzzylanguage=:buzzylanguage WHERE buzzylanguage_id=1";
        $stmt = $connwrite->prepare($update_website_language_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzylanguage', $_POST['buzzylanguage'], PDO::PARAM_STR);		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		}
