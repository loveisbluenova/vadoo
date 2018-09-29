<?php
session_start();
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
    //include 'PHP/visits.php';
include 'PHP/editwebsitecode.php';
foreach ($connread->query($website_options_query) as $row) {
$buzzysiteurl=$row['buzzysiteurl'];	
$buzzysitelogo=$row['buzzysitelogo'];
$buzzyoptimizedstatus=$row['buzzyoptimizedstatus'];
$buzzynewslimit=$row['buzzynewslimit'];
$buzzyyoutubeapi=$row['buzzyyoutubeapi'];
$buzzyfortumoid=$row['buzzyfortumoid'];
$buzzyfacebookaccess=$row['buzzyfacebookaccess'];
$buzzyfortumosecret=$row['buzzyfortumosecret'];
$buzzydistance_mesaure=$row['buzzydistance_mesaure'];
$buzzywebsite_status=$row['buzzywebsite_status'];
$buzzyversion=$row['buzzyversion'];
$buzzyupdatestatus=$row['buzzyupdatestatus'];
}
if($buzzyversion=='1.0.0' AND $buzzywebsite_status==0){
	
$add_fortumoprice_query = "ALTER TABLE buzzyuserglobals ADD buzzyfortumo_price INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_fortumoprice_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	

$add_fortumopricetwo_query = "ALTER TABLE buzzysiteoptions ADD buzzyfortumo_price INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_fortumopricetwo_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		

$add_paymentkind_query = "ALTER TABLE payments ADD payment_kind INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_paymentkind_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();			
	
	
	 $update_website_soptions_query = "UPDATE buzzysiteoptions SET  buzzyupdatestatus=0,buzzyversion='1.0.1' WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_soptions_query);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount(); 

 $stmt = $connwrite->prepare($sql);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount(); 
		
header('Location:index.php?version-updated=true');  
  }	
  
  else if($buzzyversion=='1.0.1' AND $buzzywebsite_status==0){
	
		
header('Location:index.php?version-notexist=true');  
  }
  
else if($buzzywebsite_status==1){
	 $update_website_soptions_query = "UPDATE buzzysiteoptions SET  buzzyupdatestatus=0 WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_soptions_query);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();  
header('Location:index.php?version-demoexist=true');  
  }	  
?>
		
		
