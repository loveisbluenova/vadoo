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
        <a href="#" class="pull-left">
            <img src="<?php echo profile_picture($user_id, $base_url); ?>" class="media-object" width="65" height="65">
        </a>
        <div class="media-body innerBox-topbottom innerBox-right">
            <div class="innerBox-top innerBox-half pull-right message-btn-target">
            <a href="#type" class="btn btn-default btn-sm" id="type-a-message" data-toggle="collapse">
                <i class="glyphicon glyphicon-pencil"></i> <?php echo $write;?>
            </a>
            </div>
            <h4 class="pull-left strong no-margin">
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
	<div id="chat-toolbar">
    	<a id="emoticons" href="#"><i class="fa fa-smile-o" aria-hidden="true"></i></a>
		<a id="animals" href="#"><i class="fa fa-camera-retro" aria-hidden="true"></i></a>
        <a id="send-photo" href="#"><i class="fa fa-camera-retro" aria-hidden="true"></i></a>
        <div class="clearfix"></div>
    </div>
    <textarea class="type-a-message-box form-control border-none" id="<?php echo $user_id; ?>" placeholder=""></textarea>
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
			              <span style="text-align:right!important;" class="pull-right innerBox-right text-muted"><strong> <?php echo $msg->format_date_default($message['time']); ?></strong></span>
            <a href="../user.php?user-id=<?php echo $message['user_id']; ?>" class="pull-left">
                <img src="<?php echo profile_picture($message['user_id'], $base_url); ?>" class="media-object" width="48" height="48">
            </a>
            <div class="media-body" style="width:100%!important;">
                <div class="row">
			
                    <div class="col-sm-10">
                        <div class="">
                            <div class="media">
                                <div class="pull-left">
                                  
                                </div>
                                <div class="media-body">
                                    <a href="../user.php?user-id=<?php echo $message['user_id']; ?>" class="strong text-inverse"><?php echo $chat_name; ?></a><br />
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