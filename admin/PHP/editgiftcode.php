<?php
   if ($_SESSION["buzzyadmin_id"]==1){
   if (isset($_POST['update_gift'])) {
	   $postbuzzygift_title=$_POST['buzzygift_title'];
	   $postbuzzygift_price=$_POST['buzzygift_price'];	   
        $OK = false;
        $update_gift_query = "UPDATE buzzynewgifts SET buzzygift_title=:buzzygift_title,buzzygift_price=:buzzygift_price WHERE buzzygift_id=$gift_id";
        $stmt = $connwrite->prepare($update_gift_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzygift_title', $postbuzzygift_title, PDO::PARAM_STR);
        $stmt->bindParam(':buzzygift_price', $postbuzzygift_price, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	    header('Location: vadoogifts.php?add-settings-success=true');
		}
    }
   if ($_SESSION["buzzyadmin_id"]==2){
	if (isset($_POST['update_gift'])) {
	header('Location: vadoogifts.php?onlydemo=true');
   }   
   }	   