<?php
	$message = $msg->get_the_last_message($user_id, "DO_NOT_TRUNCATE");
?>

<div class="active-message"> 
    <div class="media">
		<div class="message-btn-targeta">
		<a href="#type" style="float:right!important; margin-top:10px; margin-right:10px;" class="btn btn-primary btn-sm" id="type-a-message" data-toggle="collapse">
                <i class="glyphicon glyphicon-pencil"></i> <?php echo $write;?>
            </a>
		</div>
        <div class="media-body innerBox-topbottom innerBox-right">
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
						echo $msg->calculate_last_seen($last_seen, $user_id);
					}
				?>
                </span>
            </h4>
        </div>
    </div>
</div>

<div id="type" class="collapse border-top">
<?php include 'HTML/chatarea.html';?>
	<br>	
</div>

<?php if($message == false) { ?>
<div class="alert alert-info" style="margin-top:20px; margin-left:10px!important; margin-right:10px!important;" role="alert"><?php echo $no_message;?></div>
<?php } ?>
