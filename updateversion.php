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
echo $host;
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
		
header('Location:index.php?version-updated=true');  
  }	
  
  else if($buzzyversion=='1.0.1' AND $buzzywebsite_status==0){	
    $create_mailing_list = "CREATE TABLE IF NOT EXISTS  buzzymailing_list(
    buzzymailing_list_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    buzzymailing_list_email VARCHAR(255) NOT NULL,
    buzzymailing_list_timestamp INT NOT NULL
    )";	
         $stmt = $connwrite->prepare($create_mailing_list);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();  

    $create_alert_list = "CREATE TABLE IF NOT EXISTS  buzzyalert_ip(
    buzzyalert_ipid INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    buzzyalert_ip VARCHAR(255) NOT NULL,
    buzzyalert_iptimestamp INT NOT NULL,
    buzzyalert_attack INT NOT NULL,
	buzzyalert_attackfile VARCHAR(255) NOT NULL
    )";	
         $stmt = $connwrite->prepare($create_alert_list);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount(); 	


    $create_block_list = "CREATE TABLE IF NOT EXISTS  buzzyblocked_ip(
    buzzyblocked_ip_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    buzzyblocked_ip VARCHAR(255) NOT NULL
    )";	
         $stmt = $connwrite->prepare($create_block_list);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount(); 



    $create_fake_users = "CREATE TABLE IF NOT EXISTS buzzyfakefilter(
    buzzyfakefilter_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
	buzzyfakefilter_gender INT NOT NULL,
    buzzyfakefilter_agemin INT NOT NULL,
    buzzyfakefilter_agemax INT NOT NULL
    )";	
         $stmt = $connwrite->prepare($create_fake_users);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount(); 


		

        $add_security_query = "ALTER TABLE buzzysiteoptions ADD buzzysite_safeupload INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_security_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
        $update_website_fboptions_query = "UPDATE buzzysiteoptions SET  buzzyfb_images=0 WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_fboptions_query);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();  	
 $update_website_soptions_query = "UPDATE buzzysiteoptions SET  buzzyupdatestatus=0,buzzyversion='1.0.2' WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_soptions_query);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount(); 	
header('Location:index.php?version-updated=true'); 
  }
  
  
   else if($buzzyversion=='1.0.2' AND $buzzywebsite_status==0){
	   
        $add_chattime_query = "ALTER TABLE buzzyusers ADD buzzyuser_chatlimittime INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_chattime_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	

        $add_measure_query = "ALTER TABLE buzzysiteoptions ADD buzzysitemeasure INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_measure_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	

        $add_fakecountry_query = "ALTER TABLE buzzyfakefilter ADD buzzyfakefilter_country INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_fakecountry_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	


        $add_appimage_query = "ALTER TABLE buzzyuserimages ADD buzzyuserimage_approval INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_appimage_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();

        $add_imagetab_query = "ALTER TABLE buzzysiteoptions ADD buzzyuserimage_status INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_imagetab_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
		
	    $add_userstab_query = "ALTER TABLE buzzyusers ADD buzzyuser_moderator INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_userstab_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	
        $add_lngtab_query = "ALTER TABLE buzzysiteoptions ADD buzzylanguage_status INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_lngtab_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
	
	$update_website_soptions_query = "UPDATE buzzysiteoptions SET  buzzyupdatestatus=0,buzzyversion='1.0.3' WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_soptions_query);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();    
header('Location:index.php?version-updated=true'); 
   } 

 else if($buzzyversion=='1.0.3' AND $buzzywebsite_status==0){
	    $add_msg_query = "ALTER TABLE messages ADD start INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_msg_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	 
		
	    $add_frnd_query = "ALTER TABLE friends ADD friend_status INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_frnd_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
	
	$update_website_soptions_query = "UPDATE buzzysiteoptions SET  buzzyupdatestatus=0,buzzyversion='1.0.4' WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_soptions_query);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();  
		
header('Location:index.php?version-updated=true');  
   }   
 else if($buzzyversion=='1.0.4' AND $buzzywebsite_status==0){
	    $add_userc_query = "ALTER TABLE buzzyusers ADD buzzyuser_confirmed INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_userc_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();

	$update_website_soptions_query = "UPDATE buzzysiteoptions SET  buzzyupdatestatus=0,buzzyversion='1.0.5' WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_soptions_query);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();  		
header('Location:index.php?version-updated=true');  
   }   

 else if($buzzyversion=='1.0.5' AND $buzzywebsite_status==0){
	    $add_wopt_query = "ALTER TABLE buzzysiteoptions ADD buzzy_gzip INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_wopt_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	

	    $add_wopta_query = "ALTER TABLE buzzysiteoptions ADD buzzy_theme INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_wopta_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
		
		 $add_userc_query = "ALTER TABLE buzzyusers ADD buzzyuser_theme INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_userc_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();

	$update_website_soptions_query = "UPDATE buzzysiteoptions SET  buzzyupdatestatus=0,buzzyversion='1.0.6' WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_soptions_query);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();  		
header('Location:index.php?version-updated=true');  
   }  
    else if($buzzyversion=='1.0.6' AND $buzzywebsite_status==0){
	
		 $add_userc_query = "ALTER TABLE buzzyusers ADD buzzyuser_animation INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_userc_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();

	$update_website_soptions_query = "UPDATE buzzysiteoptions SET  buzzyupdatestatus=0,buzzyversion='1.0.7' WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_soptions_query);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();  		
header('Location:index.php?version-updated=true');  
   }



   
else if($buzzyversion=='1.0.7' AND $buzzywebsite_status==0){	
header('Location:update-chat.php');  
   }
   
  else if($buzzyversion=='1.0.8' AND $buzzywebsite_status==0){
 header('Location:update-big.php');
   }
    else if($buzzyversion=='1.0.9' AND $buzzywebsite_status==0){
    $create_quiz_answers = "CREATE TABLE IF NOT EXISTS buzzyquizanswers(
    buzzyquizanswer_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
	buzzyquizanswerone INT NOT NULL,
    buzzyquizanswertwo INT NOT NULL,
    buzzyquizanswerthree INT NOT NULL,
    buzzyquizanswerfour INT NOT NULL,
    buzzyquizanswerfive INT NOT NULL,
    buzzyquizanswersix INT NOT NULL,
    buzzyquizanswerseven INT NOT NULL,
    buzzyquizanswereight INT NOT NULL,	
	buzzyquizanswernine INT NOT NULL,
    buzzyquizanswerten INT NOT NULL,		
    buzzyquizanswereleven INT NOT NULL,
    buzzyquizanswertwelve INT NOT NULL,		
    buzzyquizanswerthirteen INT NOT NULL,
    buzzyquizanswerfourteen INT NOT NULL,
    buzzyquizanswerfifteen INT NOT NULL,	
    buzzyquizanswersixteen INT NOT NULL,	
    buzzyquizanswerseventeen INT NOT NULL,	
    buzzyquizanswereightteen INT NOT NULL,	
    buzzyquizanswernineteen INT NOT NULL,	
    buzzyquizanswertwenty INT NOT NULL
    )";	
         $stmt = $connwrite->prepare($create_quiz_answers);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();

		$add_acc_query = "ALTER TABLE buzzysiteoptions ADD buzzy_access INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_acc_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();

		$add_acct_query = "ALTER TABLE buzzysiteoptions ADD buzzy_accesstime INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_acct_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		

		$add_csscol_query = "ALTER TABLE buzzycss ADD buzzycss_color_css4 VARCHAR(255) NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_csscol_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();

		$add_csscolm_query = "ALTER TABLE buzzycss ADD buzzycss_color_css5 VARCHAR(255) NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_csscolm_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();

		$add_csshash_query = "ALTER TABLE buzzyusers ADD buzzyuser_pwdhash VARCHAR(255) NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_csshash_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		
	

$add_reg_query = "INSERT INTO  buzzypaidservices(buzzypaidservice_title,buzzypaidservice_img,buzzypaidservice_price)
		 	  VALUES('Regular status','regicon.png','200')";
        // prepare the statement
        $stmt = $connwrite->prepare($add_reg_query);
        // bind the parameters and execute the statement	
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
	
		$add_csshash_query = "ALTER TABLE buzzyusers ADD buzzyuser_pwdhash VARCHAR(255) NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_csshash_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
		
		$add_qa_query = "ALTER TABLE buzzyquizanswers ADD buzzyuser_id INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_qa_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
			
	
 $update_website_soptions_query = "UPDATE buzzysiteoptions SET  buzzyupdatestatus=0,buzzyversion='1.1.0' WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_soptions_query);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount(); 	
header('Location:index.php?version-updated=true'); 	
	
	}
	
    else if($buzzyversion=='1.1.0' AND $buzzywebsite_status==0){
		
 $create_fav = "CREATE TABLE IF NOT EXISTS buzzyfavorites(
    buzzyfavorite_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
	buzzyfavorite INT NOT NULL,
    buzzyuser_id INT NOT NULL,
    buzzyfavorite_timestamp INT NOT NULL
    )";	
         $stmt = $connwrite->prepare($create_fav);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
		
		
 $create_rem = "CREATE TABLE IF NOT EXISTS buzzyuser_reminders(
    buzzyuser_reminder_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
	buzzyuser_reminder_sender INT NOT NULL,
    buzzyuser_reminder_receiver INT NOT NULL,	
    buzzyuser_reminder_timestamp INT NOT NULL,
    buzzyuser_reminder_type INT NOT NULL	
    )";	
         $stmt = $connwrite->prepare($create_rem);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	


 $create_fri = "CREATE TABLE IF NOT EXISTS buzzyfriends(
    buzzyfriend_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, 
	buzzyuser_id INT NOT NULL,
    buzzyfriend INT NOT NULL,	
    buzzyfriend_status INT NOT NULL,
    buzzyfriend_timestamp INT NOT NULL	
    )";	
         $stmt = $connwrite->prepare($create_fri);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();			


	$add_pass_query = "ALTER TABLE buzzysiteoptions ADD buzzyemailpass VARCHAR(255) NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_pass_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();

		
	$add_passtwo_query = "ALTER TABLE buzzysiteoptions ADD buzzy_frontpage INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_passtwo_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	

	$add_passthree_query = "ALTER TABLE buzzysiteoptions ADD buzzy_forbid INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_passthree_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();			
	
	$add_passfour_query = "ALTER TABLE buzzysiteoptions ADD buzzy_ajaxcount INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_passfour_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	

	$add_usy_query = "ALTER TABLE buzzyusers ADD buzzyuser_year INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_usy_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();

$update_website_soptions_query = "UPDATE buzzysiteoptions SET  buzzyupdatestatus=0,buzzyversion='1.1.1' WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_soptions_query);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount(); 	
header('Location:index.php?version-updated=true'); 	
		
	}	
  

    else if($buzzyversion=='1.1.1' AND $buzzywebsite_status==0){
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
		
		
