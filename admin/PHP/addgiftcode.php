<?php
/**
 * PHP CODE FOR CREATE NEWS  ---- START
 */
$now = time();
if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['add_gift'])) {	
 $buzzygift_title=$_POST['buzzygift_title'];
 $buzzygift_price=$_POST['buzzygift_price'];						
        $OK = false;
        // create database connection
        // initialize prepared statement
        // create SQL
        $add_gift_query = "INSERT INTO  buzzynewgifts(buzzygift_title,buzzygift_img,buzzygift_price)
		 	  VALUES(:buzzygift_title,'gifticon.png',:buzzygift_price)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_gift_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzygift_title', $buzzygift_title, PDO::PARAM_STR);
		$stmt->bindParam(':buzzygift_price', $buzzygift_price, PDO::PARAM_STR);
	
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        if ($OK != 0) {
	    header('Location:vadoogifts.php');
        } 
		else if ($OK == 0) {
        header('Location: vadoogifts.php?error=errorupload');
        }
    }
}

if ($_SESSION["buzzyadmin_id"]==2){ 
    if (isset($_POST['add_gift'])) {
	    header('Location: vadoogifts.php?onlydemo=true');
        }
		}

/**
 * PHP CODE FOR CREATE NEWS CATEGORY  ---- END
 */