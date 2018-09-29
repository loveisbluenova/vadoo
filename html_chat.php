<?php
	$i = 0;
	if(isset($lastid)) { } else { $lastid = 0; } 

	if($lastid == '' || $lastid == 0)
	{
		$lastid = 0; // for pagination
	}

	$limit_clause = ' ORDER BY id DESC LIMIT '.$db->escape($lastid).','.$perpage;

	$messages = $msg->get_messages($user_id, $limit_clause);
	
	if(is_array($messages)) 
	{ 
		$total = $msg->count_($msg->get_messages($user_id));
		$current = $msg->count_($messages); 
	} else { 
		$total = 0; 
		$current = 0;
	}
		// return language
        $website_language_query = "SELECT * FROM buzzylanguages WHERE buzzylanguage_id=1";
?>
<?php
 if(!isset($load_more)) { 
?> 
<div class="active-message">
    <div class="media">
		<div class="message-btn-targeta">
		<a href="#type" style="float:right!important; margin-top:10px; margin-right:10px;" class="btn btn-primary btn-sm" id="type-a-message" data-toggle="collapse">
                <i class="glyphicon glyphicon-pencil"></i> <?php echo $write;?>
            </a>
		</div>	
        <div class="media-body innerBox-topbottom innerBox-right" style="width:100%!important;">
            <div class="innerBox-top innerBox-half pull-right message-btn-target">
           
            </div>
            <h4 style="margin-left:10px!important;" class="no-margin">
				<?php echo $msg->return_display_name($user_id); ?>
            	<br />
                <span id="last-seen">
					<?php 
						$last_seen = $msg->last_seen($user_id);
						if($last_seen !== false)
						{
							echo $last_seen_at . ' ' . $msg->calculate_last_seen($last_seen, $user_id);
						}
					?>
                </span>
            </h4>
        </div>
    </div>
</div>

<div id="type" class="collapse border-top">
<?php include 'HTML/chatarea.html';?>
	<br><br>	
</div>
<?php } ?>

<?php
$more = $lastid + 1;
if($more == 1)
{
	$account = $total - $perpage;
} else {
	$account = $total - $more - 1;	
}

if($account > 0)
{
	if($total > $current && $total !== $more)
	{
		echo '<div id="more'.$lastid.'" class="more-messages-parent bg-gray innerBox innerBox-half text-center margin-none border-top border-bottom">';
			echo '<a href="#" class="load-more-messages text-muted" id="'.$lastid.'" rel="'.$user_id.'">(<span id="count-old-messages">'.$view_old_messages.' ' .$account.'</span>)</a>';
		echo '</div>';
	}
}

?>

<?php if(!isset($load_more)) { ?>
<div id="type" class="collapse border-top">
    <textarea type="text" class="form-control border-none" id="type-a-message-box" placeholder=""></textarea>
</div>

<div class="border-top" id="text-messages">
<?php } ?>
	
    <?php if($messages !== false) { ?>
    	
    <?php foreach($messages as $message) {  
	$session_id=$message['user_id'];
	$session_user_query="SELECT * FROM buzzyusers WHERE buzzyuser_id=$session_id";
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
				if($i > 0) { $class = ' border-top'; }
				if($message['user_id'] == $msg->logged_user_id)
				{
					$chat_name = $you;
				} else {
					$chat_name = $msg->return_display_name($message['user_id']);	
				}
				
				if(!isset($new_msg))
				{
					if($message['status'] == 'unread')
					{
						$msg->update_message_status($message['id'], $user_id);	
					}	
				}
			?>
            <div class="media innerBox msg-div" id="u_msg<?php echo $message['id']; ?>">
			              <span style="text-align:right!important;" class="pull-right innerBox-right text-muted"> <?php echo $msg->format_date_default($message['time']); ?></span>
            <a href="../page.php?user-id=<?php echo $message['user_id']; ?>" class="pull-left">
                <img src="<?php echo $final_session_buzzyuser_image;?>" class="media-object" alt="" style="width:48px; height:48px;" >
            </a>
			<script type="text/javascript">
            $("img").bind("contextmenu",function(e){
            return false;
            });
         </script>	
            <div class="media-body" style="width:100%!important;">
                <div class="row">
			
                    <div class="col-sm-10">
                        <div class="">
                            <div class="media">
                                <div class="pull-left">
                                  
                                </div>
                                <div class="media-body">
                                    <a href="../page.php?user-id=<?php echo $message['user_id']; ?>" class="strong text-inverse"><?php echo $chat_name; ?></a><br />
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
            
        <?php $i++; } ?>
        
    <?php } else { ?>
    	<p class="innerBox border-top no-messages"></p>
    <?php } ?>
 
<?php if(!isset($load_more)) { ?>    
</div>
<?php } ?>
			<br><br><br><br>
