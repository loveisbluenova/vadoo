<?php
	$message = $msg->get_the_last_message($user_id, "DO_NOT_TRUNCATE");
?>

<div class="active-message">
    <div class="media">
        <a href="#" class="pull-left">
            <img src="<?php echo profile_picture($user_id, $base_url); ?>" class="media-object" width="65" height="65">
        </a>
        <div class="media-body innerBox-topbottom innerBox-right">
            <div class="innerBox-top innerBox-half pull-right message-btn-target">
            <a href="#type" class="btn btn-default btn-sm" id="type-a-message" data-toggle="collapse">
                <i class="glyphicon glyphicon-pencil"></i> <?php echo $write; ?>
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
						echo $msg->calculate_last_seen($last_seen, $user_id);
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
        <a id="send-photo" href="#"><i class="fa fa-video-camera" aria-hidden="true"></i></a>
        <div class="clearfix"></div>
    </div>
    <textarea class="form-control border-none type-a-message-box" id="<?php echo $user_id; ?>" placeholder="<?php echo $write_message; ?>"></textarea>
</div>

<?php if($message == false) { ?>
<p class="innerBox border-top no-messages"><?php echo $no_message;?></p>
<?php } ?>
