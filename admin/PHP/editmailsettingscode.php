   <?php
   if (isset($_POST['update_mail-options'])) {
        if (isset($_POST['buzzystpmserver'])) {
		$buzzystpmserver=$_POST['buzzystpmserver'];
		}
	    else if (!isset($_POST['buzzystpmserver'])) {
		$buzzystpmserver='smtp.gmail.com';
		}
        $OK = false;
        $update_mail_options_query = "UPDATE buzzysiteoptions SET buzzyemail=:buzzyemail,buzzyemailpassword=:buzzyemailpassword, buzzystpmserver=:buzzystpmserver WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_mail_options_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyemail', $_POST['buzzyemail'], PDO::PARAM_STR);
	    $stmt->bindParam(':buzzyemailpassword', $_POST['buzzyemailpassword'], PDO::PARAM_STR);
        $stmt->bindParam(':buzzystpmserver', $buzzystpmserver, PDO::PARAM_STR);		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		}
		$website_options_query = "SELECT * FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1";