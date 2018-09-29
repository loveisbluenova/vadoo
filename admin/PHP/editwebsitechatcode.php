<?php
if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['update_chat_options'])) {
        $OK = false;	
		$chat_option_coloone=$_POST['chat_option_coloone'];
$chat_option_colotwo=$_POST['chat_option_colotwo'];
$chat_option_colothree=$_POST['chat_option_colothree'];
$chat_option_refresh=$_POST['chat_option_refresh'];
$chat_option_radius=$_POST['chat_option_radius'];
        $update_website_choptions_query = "UPDATE chat_options SET chat_option_coloone=:chat_option_coloone,chat_option_colotwo=:chat_option_colotwo,
		chat_option_colothree=:chat_option_colothree,chat_option_refresh=:chat_option_refresh,
		chat_option_radius=:chat_option_radius  WHERE chat_option_id=1";
        $stmt = $connwrite->prepare($update_website_choptions_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':chat_option_coloone', $chat_option_coloone, PDO::PARAM_STR);
		$stmt->bindParam(':chat_option_colotwo', $chat_option_colotwo, PDO::PARAM_STR);
		$stmt->bindParam(':chat_option_colothree', $chat_option_colothree, PDO::PARAM_STR);	
		$stmt->bindParam(':chat_option_refresh', $chat_option_refresh, PDO::PARAM_STR);			
		$stmt->bindParam(':chat_option_radius', $chat_option_radius, PDO::PARAM_STR);		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	     header('Location: chat-options.php?add-settings-success=true');
		}
     }
	 
	  if ($_SESSION["buzzyadmin_id"]==2){ 
      if (isset($_POST['update_chat_options'])) {
	    header('Location:chat-options.php?onlydemo=true');	   
      }
	  }