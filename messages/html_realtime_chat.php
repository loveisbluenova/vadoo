<div class="media innerBox msg-div" id="u_msg<?php echo $message['id']; ?>">
 <span style="text-align:right!important;" class="pull-right innerBox-right text-muted"><strong> <?php echo $msg->format_date_default(($message['time']-7200)); ?></strong></span>
<a href="profile.php?id=<?php echo $message['user_id']; ?>" class="pull-left hidden-xs">
    <img src="<?php echo profile_picture($message['user_id'], $base_url); ?>" class="media-object" width="48" height="48">
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
                        <a href="profile.php?id=<?php echo $message['user_id']; ?>" class="strong text-inverse"><?php echo $chat_name; ?></a><br />
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