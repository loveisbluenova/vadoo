<?php
/**
 * LOGIN PHP CODE  ---- START
 */
 $allowed_ip='';
 if (isset($_POST['admin-login'])) {
    $buzzyadmin_user = !empty($_POST['buzzyadmin_user']) ? trim($_POST['buzzyadmin_user']) : null;
    $buzzyadmin_password = !empty($_POST['buzzyadmin_password']) ? trim($_POST['buzzyadmin_password']) : null;
    $buzzyadmin_user1 = htmlspecialchars($buzzyadmin_user, ENT_QUOTES);
    $buzzyadmin_password1 = htmlspecialchars($buzzyadmin_password, ENT_QUOTES);
	$enc_buzzyadmin_password1=md5($buzzyadmin_password);
    $buzzy_login_query = "SELECT * FROM buzzyadmin WHERE buzzyadmin_user = :buzzyadmin_user AND buzzyadmin_password = :buzzyadmin_password";
    $stmt = $connwrite->prepare($buzzy_login_query);
	   //Bind value.
    $stmt->bindParam(':buzzyadmin_user', $buzzyadmin_user1, PDO::PARAM_STR);
    $stmt->bindParam(':buzzyadmin_password', $enc_buzzyadmin_password1, PDO::PARAM_STR);
  // bind the parameters and execute the statement	
  // execute and get number of affected rows
    $stmt->execute();
    $OK = $stmt->rowCount();
	if ($OK==1){
   $buzzy_logintwo_query = "SELECT * FROM buzzyadmin WHERE buzzyadmin_user='$buzzyadmin_user1' AND buzzyadmin_password = '$enc_buzzyadmin_password1'";
    $stmt = $connwrite->prepare($buzzy_logintwo_query);		
    foreach ($connread->query($buzzy_logintwo_query) as $row) {
         $_SESSION["buzzyadmin_id"] = $row['buzzyadmin_id'];
        }   
	}
  }
if (!isset($_SESSION["buzzyadmin_id"])) {
header('Location:login.php');
}