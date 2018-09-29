<?php				   
   if ($_SESSION["buzzyadmin_id"]==1){   
   if (isset($_POST['update_fortumo_options'])) {
   $buzzyfortumoid=$_POST['buzzyfortumoid'];
   $buzzyfortumosecret=$_POST['buzzyfortumosecret']; 
   $buzzyfortumo_price=$_POST['buzzyfortumo_price'];   
   $fortumo_status=$_POST['fortumo_status'];      
  
        $OK = false;
        $update_fortumo_options_query = "UPDATE buzzysiteoptions SET  buzzyfortumoid=:buzzyfortumoid,buzzyfortumosecret=:buzzyfortumosecret,buzzyfortumo_price=:buzzyfortumo_price,
        fortumo_status=:fortumo_status
		WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_fortumo_options_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyfortumoid', $buzzyfortumoid, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyfortumosecret', $buzzyfortumosecret, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyfortumo_price', $buzzyfortumo_price, PDO::PARAM_STR);		
        $stmt->bindParam(':fortumo_status', $fortumo_status, PDO::PARAM_STR);			 		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	  	header('Location: fortumoapi.php?add-settings-success=true');	
		}
   }
      if ($_SESSION["buzzyadmin_id"]==2){
	if (isset($_POST['update_fortumo_options'])) {
  	header('Location: fortumoapi.php?onlydemo=true');
     }      
	  }