<?php
	// configurations for html_chat_list
	if(isset($init_load))
	{
		$i = 0;
	
		if(isset($lastid)) { } else { $lastid = 0; }
		
		if($lastid == '' || $lastid == 0)
		{
			$lastid = 0; // for pagination
		}
		
		$limit_clause = ' ORDER BY id DESC LIMIT '.$db->escape($lastid).','.$contacts_per_page;
		
		$friends = $msg->pull_contacts($msg->logged_user_id, $limit_clause);
		
		if(is_array($friends)) 
		{ 
			$total = $msg->count_($msg->pull_contacts($msg->logged_user_id));
			$current = $msg->count_($friends); 
		} else { 
			$total = 0; 
			$current = 0;
		}

		$list_unread_messages = $msg->get_unread_messages_count_by_user();
		
		if($list_unread_messages)
		{
			foreach($list_unread_messages as $c)
			{
				$list_unread_message[$c['user_id']] = $c['counted'];
			}
		} 
	}
?>

<?php if(!isset($load_more)) { ?>
<ul class="list-unstyled p0" id="messages-stack-list">
<?php } ?>

<?php if($friends == true) {

	if(!isset($filter_friends))
	{
		$buffer = '';
		foreach($friends as $o_f) 
		{
			if($o_f['user_id'] == $msg->logged_user_id) 
			{
				$friend_o = $o_f['friend'];
			} else {
				$friend_o = $o_f['user_id'];	
			}
			$buffer .= $friend_o.',';
		}
		
		$buffer = rtrim($buffer, ',');
		$prepare_friends = explode(',', $buffer);

		// Associate them
		$dn = '';
		foreach($prepare_friends as $fr)
		{
			$dn .= $msg->return_display_name($fr).',';
		}
		
		$dn = rtrim($dn, ',');
		$prepare_friends_displayName = explode(',', $dn);
		
		$friends_array = array_combine($prepare_friends, $prepare_friends_displayName);
		
		asort($friends_array);
	}

	foreach($friends_array as $friend_id => $friend_display_name)
	{			
?>
    <li class="prepare-message border-bottom" id="<?php echo $friend_id; ?>">
        <div class="media innerBox">
            <div class="media-object pull-left hidden-phone">
                <a href="#">
                    <img src="<?php echo profile_picture($friend_id, $base_url); ?>" width="50" height="50" alt="User">
                </a>
            </div>
            <div class="media-body">
                <div>

				
                	<span class="strong"><?php echo $friend_display_name ?></span> 
				     <?php
							if($msg->get_user_session_status($friend_id) == 'online')
							{
								echo '<br>
					<span style="color:#33d058!important;">Online</span>							
								';	
							}
						?>	
				     <?php
							if($msg->get_user_session_status($friend_id) == 'offline')
							{
								echo '<br>
					<span style="">Offline</span>							
								';	
							}
						?>							
                	<div class="pull-right">
                    	<?php
							if($msg->get_user_session_status($friend_id) == 'online')
							{
								echo '';	
							}
						?>
                    </div>
                </div>
                <div id="type-status-<?php echo $friend_id; ?>"></div>
                <div id="unreader-counter<?php echo $friend_id; ?>"><?php if(isset($list_unread_message[$friend_id])) { echo ''.$unread.' <span class="label label-warning" id="unreader-count-'.$friend_id.'">'.$list_unread_message[$friend_id].'</span>'; } ?></div>
                <?php
					if(isset($chat_tab))
					{
						echo '';
					} else {
						echo '<p>'.$msg->user_profile_status($friend_id, 'TRUNCATE').'</p>';	
					}
				?>
            </div>
        </div>
    </li>
    
	<?php } ?>
	<?php
		if(!isset($filter_load_more))
		{
			$more = $lastid + 1;
			if($more == 1)
			{
				$account = $total - $contacts_per_page;
			} else {
				$account = $total - $more - 1;	
				if($account == 1) { $account = 0; }
			}
			
			if($account > 0)
			{
				if($total > $current && $total !== $more)
				{
					echo '<div id="more-contacts'.$lastid.'" class="more-contacts-parent bg-gray innerBox innerBox-half text-center margin-none border-top border-bottom">';
						echo '<a href="#" class="load-more-contacts text-muted" id="'.$lastid.'" rel="'.$friend_id.'">More (<span id="count-more-friends">'.$account.'</span>)</a>';
					echo '</div>';
				}
			}
		}
	?>
    
<?php } else { ?>
    <li class="border-bottom" id="no_chat_users_found"><p class="innerBox">No users found</p></li>
<?php } ?>

<?php if(!isset($load_more)) { ?>
</ul>
<?php } ?>