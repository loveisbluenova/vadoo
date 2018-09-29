<?php
$session_messages_query="SELECT * FROM buzzymessages WHERE buzzysender_id=$session_user_id OR buzzyreceiver_id=$session_user_id ORDER by buzzymessage_id DESC";
          foreach ($connread->query($session_messages_query) as $row) {
		  $buzzymessage_text=$row['buzzymessage_text'];
          $buzzysender_id=$row['buzzysender_id'];
		  $buzzyreceiver_id=$row['buzzyreceiver_id'];
		  if ($buzzysender_id==$session_user_id){
          $mybuzzytalker_id=$row['buzzyreceiver_id'];
          }	
		  else if ($buzzyreceiver_id==$session_user_id){
          $mybuzzytalker_id=$row['buzzysender_id'];
          }		  
		  }