<?php
ob_start('ob_gzhandler');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$now=time();

include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';

//Store transaction information from PayPal
$item_number = htmlspecialchars($_GET['item_number'], ENT_QUOTES); 
$txn_id = htmlspecialchars($_GET['tx'], ENT_QUOTES); 
$payment_gross = htmlspecialchars($_GET['amt'], ENT_QUOTES); 
$currency_code = htmlspecialchars($_GET['cc'], ENT_QUOTES); 
$payment_status = htmlspecialchars($_GET['st'], ENT_QUOTES); 

      if(!empty($txn_id)){
      $add_payment_query = "INSERT INTO  payments(item_number,txn_id,payment_gross,currency_code,payment_status,buzzyuser_id,transaction_time)
	  VALUES(:item_number,:txn_id,:payment_gross,:currency_code,:payment_status,:buzzyuser_id,:transaction_time)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_payment_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':item_number', $item_number, PDO::PARAM_STR);
        $stmt->bindParam(':txn_id', $txn_id, PDO::PARAM_STR);	
        $stmt->bindParam(':payment_gross', $payment_gross, PDO::PARAM_STR);			
        $stmt->bindParam(':currency_code', $currency_code, PDO::PARAM_STR);
        $stmt->bindParam(':payment_status', $payment_status, PDO::PARAM_STR);			
		$stmt->bindParam(':buzzyuser_id',   $session_user_id, PDO::PARAM_STR);
		$stmt->bindParam(':transaction_time',   $now, PDO::PARAM_STR);		
	    // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
		

	    $session_buzzyuser_creditsplus=$session_buzzyuser_credits+$item_number;	
        $update_usercredits_query = "UPDATE buzzyusers SET buzzyuser_credits=:buzzyuser_credits WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_usercredits_query);
        // bind the parameters and execute the statement
	    $stmt->bindParam(':buzzyuser_credits', $session_buzzyuser_creditsplus, PDO::PARAM_STR);
	    // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
if($item_number==$buzzyuserglobal_credits){		
header('Location: '.$link_prefix.'page.php?user-id='.$session_user_id.'&buypponesuccess=true');
}
else if ($item_number==$twobuzzyuserglobal_credits){
header('Location: '.$link_prefix.'page.php?user-id='.$session_user_id.'&buypptwosuccess=true');	
}
else if ($item_number==$fourbuzzyuserglobal_credits){
header('Location: '.$link_prefix.'page.php?user-id='.$session_user_id.'&buyppfoursuccess=true');	
}
else if ($item_number==$eightbuzzyuserglobal_credits){
header('Location: '.$link_prefix.'page.php?user-id='.$session_user_id.'&buyppeightsuccess=true');	
}
?>
<?php
}else{
header('Location: '.$link_prefix.'index.php?paypalerror=true');
?>

<?php
}
?>