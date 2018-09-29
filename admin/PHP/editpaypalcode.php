<?php
   if ($_SESSION["buzzyadmin_id"]==1){
   if (isset($_POST['update_paypal'])) {
        $OK = false;
        $update_payment_query = "UPDATE buzzyuserglobals SET buzzyuserglobal_creditprice=:buzzyuserglobal_creditprice,
		buzzypaypal_email=:buzzypaypal_email,buzzyuserpaypal_currency=:buzzyuserpaypal_currency,
		paypal_url=:paypal_url WHERE buzzyuserglobal_id=1";
        $stmt = $connwrite->prepare($update_payment_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyuserglobal_creditprice', $_POST['buzzyuserglobal_creditprice'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzypaypal_email', $_POST['buzzypaypal_email'], PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuserpaypal_currency', $_POST['buzzyuserpaypal_currency'], PDO::PARAM_STR);	
		$stmt->bindParam(':paypal_url', $_POST['paypal_url'], PDO::PARAM_STR);			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	     header('Location: paypal-settings.php?add-settings-success=true');		
		}
   }
   
      if ($_SESSION["buzzyadmin_id"]==2){ 
      if (isset($_POST['update_paypal'])) {
	    header('Location:paypal-settings.php?onlydemo=true');	   
      }
	  }