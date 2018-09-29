<?php
   if ($_SESSION["buzzyadmin_id"]==1){
   if (isset($_POST['update_service'])) {
  $buzzypaidservice_price=$_POST['buzzypaidservice_price'];   
        $OK = false;
        $update_service_query = "UPDATE buzzypaidservices SET buzzypaidservice_price=:buzzypaidservice_price WHERE buzzypaidservice_id=$buzzypaidservice_id";
        $stmt = $connwrite->prepare($update_service_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzypaidservice_price', $buzzypaidservice_price, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	    header('Location: paid-services.php?add-settings-success=true');
		}
    }
   if ($_SESSION["buzzyadmin_id"]==2){
	if (isset($_POST['update_service'])) {
	header('Location: paid-services.php?onlydemo=true');
   }   
   }	   