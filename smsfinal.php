<?php
ob_start('ob_gzhandler');
session_start();
$now=time();  
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';

 // check that the request comes from Fortumo server
  if(!in_array($_SERVER['REMOTE_ADDR'],
      array('81.20.151.38', '81.20.148.122', '79.125.125.1', '209.20.83.207'))) {
    die("Error: Unknown IP");
  }

  // check the signature
  $secret = '49aeaf6a437f2998f97c8edb3d8d5e92'; // insert your secret between ''
  if(!empty($secret) && !check_signature($_GET, $secret)) {
    die("Error: Invalid signature");
  }
  
  if(isset($_GET['sender'])) {
  $sender = $_GET['sender'];
  }
  if(isset($_GET['amount'])) {
  $amount = $_GET['amount'];
  }
  if(isset($_GET['cuid'])) {
  $cuid = $_GET['cuid'];
  }
  if(isset($_GET['payment_id'])) {
  $payment_id = $_GET['payment_id'];
  }
  
  
        $session_buzzyuser_creditsplus=$session_buzzyuser_credits+100;	
        $update_usercredits_query = "UPDATE buzzyusers SET buzzyuser_credits=:buzzyuser_credits WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_usercredits_query);
        // bind the parameters and execute the statement
	    $stmt->bindParam(':buzzyuser_credits', $session_buzzyuser_creditsplus, PDO::PARAM_STR);
	    // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount(); 

//find or create payment by payment_id
//add $sender, $amount and $cuid to payment if needed
  
  if(preg_match("/failed/i", $_GET['status'])) {
   // mark payment as failed
      echo"Payment error!";
  } else {
   // mark payment successful
   echo"Thanks for payment!";
  }

  // print out the reply
  echo('OK');
 
  function check_signature($params_array, $secret) {
    ksort($params_array);

    $str = '';
    foreach ($params_array as $k=>$v) {
      if($k != 'sig') {
        $str .= "$k=$v";
      }
    }
    $str .= $secret;
    $signature = md5($str);

    return ($params_array['sig'] == $signature);
  }
?>