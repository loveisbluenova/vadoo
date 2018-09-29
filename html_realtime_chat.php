<?php
$userr_id=$message['user_id'];
	$session_user_query="SELECT * FROM buzzyusers WHERE buzzyuser_id=$userr_id";
    foreach ($connread->query($session_user_query) as $row) { 
    $session_buzzyuser_username = $row['buzzyuser_username'];
	$session_buzzyuser_image = $row['buzzyuser_image'];
	$session_buzzyuser_email = $row['buzzyuser_email'];
	$session_buzzyuser_status = $row['buzzyuser_status']; 
   }
   if($session_buzzyuser_image!=''){
        if (strpos($session_buzzyuser_image,'http') !== false) {
		$img_prefix='';
		}
		else{
		$img_prefix=$base_url.'img/';			
		}
		$final_session_buzzyuser_image=$img_prefix . $session_buzzyuser_image; 
   }
?>
<div class="media innerBox msg-div" id="u_msg<?php echo $message['id']; ?>">
 <span style="text-align:right!important;" class="pull-right innerBox-right text-muted"><strong> <?php echo $msg->format_date_default(($message['time'])); ?></strong></span>
<a href="../page.php?user-id=<?php echo $message['user_id']; ?>" class="pull-left hidden-xs">
    <img src="<?php echo $final_session_buzzyuser_image; ?>" class="media-object" width="60" height="60">
</a>
<div class="media-body" style="width:100%!important;"> 
    <div class="row">
        <div class="col-sm-10">
            <div class="">
                <div class="media">
                    <div class="pull-left">
                        <span class="innerBox-right text-muted visible-xs"><?php echo $msg->format_date_default($message['time']); ?> </span>
                    </div>
															
                    <div class="media-body">
                        <a href="../page.php?id=<?php echo $message['user_id']; ?>" class="strong text-inverse"><?php echo $chat_name; ?></a><br />
                        <?php echo $msg->read_messages($message['message']); ?>
                    </div>
                </div>
            </div>	
        </div>
        <div class="col-sm-2 hidden-xs">
           
        </div>
    </div>
</div>
</div>
