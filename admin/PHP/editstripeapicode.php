<?php				   
   if ($_SESSION["buzzyadmin_id"]==1){   
   if (isset($_POST['update_stripe_options'])) {
   $buzzy_stripekey=$_POST['buzzy_stripekey'];
   $buzzy_stripeprice=$_POST['buzzy_stripeprice'];   
   
        $OK = false;
        $update_stripe_options_query = "UPDATE buzzyuserglobals SET  buzzy_stripekey=:buzzy_stripekey,buzzy_stripeprice=:buzzy_stripeprice
		WHERE buzzyuserglobal_id=1";
        $stmt = $connwrite->prepare($update_stripe_options_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzy_stripekey', $buzzy_stripekey, PDO::PARAM_STR);
        $stmt->bindParam(':buzzy_stripeprice', $buzzy_stripeprice, PDO::PARAM_STR);				 		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	  	header('Location: stripeapi.php?add-settings-success=true');	
		}
   }
      if ($_SESSION["buzzyadmin_id"]==2){
	if (isset($_POST['update_stripe_options'])) {
  	header('Location: stripeapi.php?onlydemo=true');
     }      
	  }