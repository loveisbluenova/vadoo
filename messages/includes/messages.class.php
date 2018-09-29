<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	/*********************************************************************************************************************************
	**********************************************************************************************************************************
	***** Ajax Chat/Private Messages System
	***** Author: Paulo Regina
	***** Author URI: www.pauloreg.com
	***** Version: 1.1
	*****
	***** Your messages table must have at least: id, messages, time, user_id, receiver, storage_a, storage_b, status
	***** Your users table must have at least: id, display_name
	***** Your friends table must have at least: id, user_id, friend (If you want to use friends_approach option)
	**********************************************************************************************************************************
	**********************************************************************************************************************************/
	
	class Messages
	{
		// Register the id of the logged user
		public $logged_user_id;
		
		// If you want your contacts to be your friends or all users
		public $friends_approach = true;
		
		// Messages Table
		public $messages_table = 'messages';
		
		// Users Table
		public $users_table = 'users';
		
		// Friends Table
		public $friends_table = 'friends';
		
		// Chat languages
		public $chat_languages = 'buzzylanguages';
		
		// Is it chat or contacts tab?
		public $active_tab = 'chats';
		
		// Limit chars
		private $word_limit = 40;
		
		// Emoticons
		public $emoticons = array(
			':)' => '<img class="embed-emoticon" style="width:16px!important; height:16px!important;" src="img/emots/smile.png" />',
			':(' => '<img class="embed-emoticon"  style="width:16px!important; height:16px!important;"  src="img/emots/sad.png" />',
			':sleep:' => '<img class="embed-emoticon"  style="width:16px!important; height:16px!important;"  src="img/emots/sleep.png" />',			
			':P' => '<img class="embed-emoticon"  style="width:16px!important; height:16px!important;"  src="img/emots/bla.png" />',	
			':O' => '<img class="embed-emoticon"   style="width:16px!important; height:16px!important;"  src="img/emots/conf.png" />',	
			':love:' => '<img class="embed-emoticon"  style="width:16px!important; height:16px!important;"  src="img/emots/love.png" />',		
			':D' => '<img class="embed-emoticon"   style="width:16px!important; height:16px!important;"  src="img/emots/smilebig.png" />',	
			':coffee:' => '<img class="embed-emoticon"   style="width:16px!important; height:16px!important;"  src="img/emots/coffee.png" />',
			':burger:' => '<img class="embed-emoticon"   style="width:16px!important; height:16px!important;"  src="img/emots/burger.png" />',	
			':cake:' => '<img class="embed-emoticon"   style="width:16px!important; height:16px!important;"  src="img/emots/cake.png" />',
			':santa:' => '<img class="embed-emoticon"   style="width:16px!important; height:16px!important;"  src="img/emots/santa1.png" />',
			':shy:' => '<img class="embed-emoticon"   style="width:16px!important; height:16px!important;"  src="img/emots/shy.png" />',			
			':char:' => '<img class="embed-emoticon"   style="width:16px!important; height:16px!important;"  src="img/emots/char.png" />',	
			':apple:' => '<img class="embed-emoticon"   style="width:16px!important; height:16px!important;"  src="img/emots/apple.png" />',
			':banana:' => '<img class="embed-emoticon"   style="width:16px!important; height:16px!important;"  src="img/emots/banana.png" />',
			':lemon:' => '<img class="embed-emoticon"   style="width:16px!important; height:16px!important;"  src="img/emots/lemon.png" />',
			':melon:' => '<img class="embed-emoticon"   style="width:16px!important; height:16px!important;"  src="img/emots/melon.png" />',
			':grape:' => '<img class="embed-emoticon"   style="width:16px!important; height:16px!important;"  src="img/emots/grape.png" />',
			
			':an1:' => '<img class="embed-emoticon"  style="width:60px!important; height:60px!important;"  src="http://www.allsmileys.com/files/smiley-central-animals/5132.gif" />',
			':an2:' => '<img class="embed-emoticon"  style="width:60px!important; height:60px!important;"  src="http://www.allsmileys.com/files/smiley-central-animals/5123.gif" />',	
			':an3:' => '<img class="embed-emoticon"   style="width:60px!important; height:60px!important;"   src="http://www.allsmileys.com/files/smiley-central-animals/5131.gif" />',
			':an4:' => '<img class="embed-emoticon"   style="width:60px!important; height:60px!important;" src="http://www.allsmileys.com/files/smiley-central-animals/5128.gif" />',
			':an5:' => '<img class="embed-emoticon"  style="width:60px!important; height:60px!important;"   src="http://www.allsmileys.com/files/smiley-central-animals/5136.gif" />',
			':an6:' => '<img class="embed-emoticon"  style="width:60px!important; height:60px!important;"   src="http://www.allsmileys.com/files/smiley-central-animals/5122.gif" />',		
			':an7:' => '<img class="embed-emoticon"  style="width:60px!important; height:60px!important;"   src="http://www.allsmileys.com/files/smiley-central-animals/5133.gif" />',		
			':an8:' => '<img class="embed-emoticon"  style="width:60px!important; height:60px!important;"   src="http://www.allsmileys.com/files/smiley-central-animals/5127.gif" />',	
			':an9:' => '<img class="embed-emoticon"  style="width:60px!important; height:60px!important;"   src="http://www.allsmileys.com/files/smiley-central-animals/5121.gif" />',
			':an10:' => '<img class="embed-emoticon"  style="width:60px!important; height:60px!important;"   src="http://www.allsmileys.com/files/smiley-central-animals/5124.gif" />',
			':an11:' => '<img class="embed-emoticon"  style="width:60px!important; height:60px!important;"   src="http://www.allsmileys.com/files/smiley-central-animals/5126.gif" />',	
			':an12:' => '<img class="embed-emoticon"  style="width:60px!important; height:60px!important;"   src="http://www.allsmileys.com/files/smiley-central-animals/5120.gif" />',
			
			
			':love1:' => '<img class="embed-emoticon"  style=" width:48px!important;" src="http://www.myemoticons.com/images/love/couples/couples.gif" />',
			':love2:' => '<img class="embed-emoticon"  style=" width:48px!important;" src="http://www.myemoticons.com/images/love/couples/on-the-cheek.gif" />',		
			':love3:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/love/kisses/kisses.gif" />',		
			':love4:' => '<img class="embed-emoticon" style=" width:48px!important;"  src="http://www.myemoticons.com/images/love/kisses/valentine-butterfly-kiss.gif" />',	
			':love5:' => '<img class="embed-emoticon"  style=" width:48px!important;"  src="http://www.myemoticons.com/images/love/kisses/blow-kiss.gif" />',	
			':love6:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/love/hearts-2/dating.gif" />',		
			':love7:' => '<img class="embed-emoticon"  style=" width:48px!important;" src="http://www.myemoticons.com/images/love/hearts-2/i-love-you.gif" />',	
			':love8:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/love/hearts-2/cupid.gif" />',	
			':love9:' => '<img class="embed-emoticon" style=" width:48px!important;"  src="http://www.myemoticons.com/images/love/hearts-3/i-love-you.gif" />',	
			':love10:' => '<img class="embed-emoticon" style=" width:48px!important;"    src="http://www.myemoticons.com/images/love/hearts-3/call-me.gif" />',
			':love11:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/love/hearts-3/burning-heart.gif" />',			
			':love12:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/love/other/hi-there-sweetheart.gif" />',
			':love13:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/love/other/love-sick.gif" />',
			':love14:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/love/hearts-1/blings.gif" />',	
			':love15:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/love/hearts-1/yowza.gif" />',
			':love16:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/love/hearts-1/valentine-heart-bottle.gif" />',

			':sport1:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/sports/basketball/basketball.gif" />',
			':sport2:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/sports/basketball/basketball-1.gif" />',		
			':sport3:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/sports/olympics/soccer.gif" />',
			':sport4:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/sports/olympics/torch.gif" />',
			':sport5:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/sports/olympics/slugger-1.gif" />',
			':sport6:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/sports/tennis/tennis.gif" />',	
			':sport7:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/sports/water/scuba-diver.gif" />',		
			':sport8:' => '<img class="embed-emoticon" style=" width:48px!important;"   src="http://www.myemoticons.com/images/sports/golf/golfer.gif" />'			
			);

		// Read Messages
		public function read_messages($msg)
		{
			global $maps, $attach, $embed;
			echo $maps->to_maps($attach->attachments($this->decode_message($embed->oembed($msg))));	
		}
		
		// Formats the message + Emoticons
		public function decode_message($message)
		{
			$dont_need = array('\n', '\r\n', '\r');
			$message = str_replace($dont_need, "<br />", $message);
			
			$message = str_replace(array_keys($this->emoticons), array_values($this->emoticons), $message);
			
			return stripslashes($message);		
		}
		
		// Count
		public function count_($array)
		{
			if(is_null($array) || is_string($array) || $array == false || empty($array) == true)
			{ 
				return 0;
			} else {
				return count($array);
			}
		}
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// User Related
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// format date
		public function format_date_default($time)
		{
			return date('d. M Y, H:i', $time);
		}
		
		// return user display_name
		public function return_display_name($user_id)
		{
			global $db;
			
			if($db->sanitize_integer($user_id) !== 0)
			{
				$query = $db->query(sprintf("SELECT display_name FROM $this->users_table WHERE id = %d", 
							$db->escape($user_id)
						 ));
						 
				if($db->num_rows($query) == 1)
				{
					$row = $db->fetch_row($query);
					return $row['display_name'];
				} else {
					return false;	
				}
			} else {
				return false;	
			}
		}	
		
		// return user profile picture
		public function user_profile_picture($user_id, $base_url)
		{
			global $db;
							
			$query = $db->query(sprintf("SELECT profile_image FROM $this->users_table WHERE id = '%d'", 
								$db->escape($user_id)
							));
															
			$row = $db->fetch_row($query);
			
			$result = $row['profile_image'];
			
			if(empty($result) || $result == NULL) {
				return $result;
			} else {
				return $result;
			}	
		}
		
		

		// return language
		public function select_chat_language()
		{
			global $db;
							
			$query = $db->query(sprintf("SELECT buzzylanguage FROM $this->chat_languages WHERE  buzzylanguage_id = 1"
							));
															
			$row = $db->fetch_row($query);
			
			$lng =  $row['buzzylanguage'];
			include '../../languages/'.$lng.'.php';
			if($db->num_rows($query) > 0)
			{
				return $result;
			} else {
				return $result;
			}	
		}
		
		
		
		
		// return user status 
		public function user_profile_status($user_id, $option='')
		{
			global $db;
							
			$query = $db->query(sprintf("SELECT status FROM $this->users_table WHERE id = %d", 
								$db->escape($user_id)
							));
															
			$row = $db->fetch_row($query);
			
			if($db->num_rows($query) > 0)
			{
				if($option == "TRUNCATE")
				{
					return $this->truncate($row['status'], $this->word_limit);		
				} else {
					return $row['status'];
				}	
			} else {
				return false;	
			}	
		}
		
		
		
		
				// return user status 

		
		
		// get a list of friends
		private function get_friends_list($user_id, $limit='')
		{
			global $db;

			if($db->sanitize_integer($user_id) !== 0)
			{
				$query = $db->query(sprintf("SELECT id, user_id, friend FROM $this->friends_table WHERE user_id = %d || friend = %d $limit", 
							$db->escape($user_id), $db->escape($user_id)
						 ));
						 
				if($db->num_rows($query) > 0)
				{
					return $db->results($query);
				} else {
					return false;	
				}
			} else {
				return false;	
			}
		}
		
		// get a list of friends that the user started a chat with
		private function get_chat_friends_list($user_id, $limit='')
		{
			global $db;

			if($db->sanitize_integer($user_id) !== 0)
			{
				$query = $db->query(sprintf("SELECT id, user_id, receiver AS friend FROM $this->messages_table WHERE user_id = %d || receiver = %d GROUP BY friend $limit", 
							$db->escape($user_id), $db->escape($user_id)
						 ));
						 
				if($db->num_rows($query) > 0)
				{
					return $db->results($query);
				} else {
					return false;	
				}
			} else {
				return false;	
			}
		}
		
		// get a list of users
		private function get_users($user_id, $limit='')
		{
			global $db;
			
			if($db->sanitize_integer($user_id) !== 0)
			{
				$query = $db->query(sprintf("SELECT id, id AS user_id, id AS friend FROM $this->users_table WHERE id != $this->logged_user_id $limit"));
						 
				if($db->num_rows($query) > 0)
				{
					return $db->results($query);
				} else {
					return false;	
				}
			} else {
				return false;	
			}
		}
		
		// Pull a list of contacts, using friends and all users approach
		public function pull_contacts($user_id, $limit='', $counter='')
		{
			if($this->friends_approach == true)
			{
				if($this->active_tab == 'chats' && $counter !== true)
				{
					return $this->get_chat_friends_list($user_id, $limit);
				} else {
					return $this->get_friends_list($user_id, $limit);
				}
			} else {
				if($this->active_tab == 'chats' && $counter !== true)
				{
					return $this->get_chat_friends_list($user_id, $limit);
				} else {
					return $this->get_users($user_id, $limit);
				}	
			}
		}
		
		// Count your contacts
		public function count_contacts($user_id, $limit='')
		{
			$count = $this->pull_contacts($user_id, $limit='', true);
						
			if(is_null($count) || is_string($count) || $count == false || empty($count) == true)
			{
				return 0;
			} else {
				return count($count);	
			}
		}
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Messages
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// Get total messages of the user (since 1.5)
		public function total_unread_messages($format='(%s) ')
		{
			global $db;
			
			$receiver = $db->escape($this->logged_user_id);
			
			$query = $db->query("SELECT COUNT(id) as total_unread_messages FROM $this->messages_table WHERE status = 'unread' AND receiver = $receiver");
			
			if($db->num_rows($query) == 0)
			{
				return false;
			} else {
				$row = $db->fetch_row($query);
				$cn = $row['total_unread_messages'];
				if($cn == 0)
				{
					return false;
				} else {
					return sprintf($format, $cn);
				}
			}

		}
		
		// Get unread messages and count by user
		public function get_unread_messages_count_by_user()
		{	
			global $db;
			
			$sender = $db->escape($this->logged_user_id); // receiver in this case
						
			$query = $db->query("SELECT id, message, time, user_id, receiver, storage_a, storage_b, status, COUNT(user_id) as counted FROM $this->messages_table WHERE receiver = $sender AND status = 'unread' || user_id = $sender AND status = 'unread' GROUP BY user_id");
						
			if($db->num_rows($query) == 0)
			{
				return '';
			} else {
				$rows = $db->results($query);
				
				foreach($rows as $res)
				{
					// get only messages that are not deleted
					// just to order data based on logged_in user
					if($res['user_id'] == $sender || $res['receiver'] == $sender)
					{
						if(
							$res['user_id'] == $sender && $res['storage_a'] == 0 ||
							$res['receiver'] == $sender && $res['storage_b'] == 0 ||
							$res['storage_a'] == 0 && $res['storage_b'] == 0
						)
						{
							// kill it
						} else {
							$results[] = array(
								'user_id' => $res['user_id'],
								'counted' => $res['counted']
							);	
						}
					} 
				}
				
				if(isset($results) && is_array($results) == true)
				{
					return $results;
				} else {
					return false;	
				}
			}	
		}
		
		// Get the unread messages
		public function get_unread_messages()
		{
			global $db;
			
			$query = $db->query(
				sprintf("
					SELECT grouped.id, grouped.user_id, $this->messages_table.message FROM (SELECT MAX(id) AS id, user_id FROM $this->messages_table WHERE receiver = %d AND status = 'unread'
					GROUP BY user_id 
					ORDER BY MAX(id) DESC LIMIT 10) AS grouped, $this->messages_table WHERE grouped.id = $this->messages_table.id
				", 
								$db->escape($this->logged_user_id)
					));
				 						
			if($db->num_rows($query) == 0)
			{
				return false;
			} else {
				return $db->results($query);	
			}
		}
		
		private function messages_processor($query, $sender, $option)
		{
			global $db;
			
			$row = $db->fetch_row($query);
			
			// get only messages that are not deleted
			// just to order data based on logged_in user
			if($row['user_id'] == $sender || $row['receiver'] == $sender)
			{
				if(
					$row['user_id'] == $sender && $row['storage_a'] == 0 ||
					$row['receiver'] == $sender && $row['storage_b'] == 0 ||
					$row['storage_a'] == 0 && $row['storage_b'] == 0
				)
				{
					// kill it
				} else {
					$result = array(
						'id' => $row['id'],
						'message' => $row['message'],
						'time' => $row['time'],
						'user_id' => $row['user_id'],
						'receiver' => $row['receiver'],
						'storage_a' => $row['storage_a'],
						'storage_b' => $row['storage_b'],
						'status' => $row['status']
					);	
				}
			} 
			
			if(isset($result) && is_array($result) == true)
			{
				if($option == "TRUNCATE")
				{
					return $this->truncate($result['message'], $this->word_limit);		
				} else {
					return $row;
				}	
			} else {
				return false;	
			}	
		}
		
		// Get the last message between the two users
		public function get_the_last_message($user_id, $option="TRUNCATE")
		{
			global $db;
			
			$sender = $this->logged_user_id;
			
			$query = $db->query(sprintf("SELECT id, message, time, user_id, receiver, storage_a, storage_b, status FROM $this->messages_table WHERE storage_a != 0 AND user_id = %d AND receiver = %d || user_id = %d AND receiver = %d AND storage_a != 0 AND storage_b != 0 ORDER BY id DESC LIMIT 1", 
						$db->escape($this->logged_user_id), $db->escape($user_id), $db->escape($user_id), $db->escape($this->logged_user_id)
					));
					
			if($db->num_rows($query) == 0)
			{
				return false;
			} else {
				return $this->messages_processor($query, $sender, $option);
			}	
		}
		
		// Get last user message
		public function get_last_message_from($user_id, $option="TRUNCATE")
		{
			global $db;
			
			$query = $db->query(sprintf("SELECT id, message, time, user_id, receiver, storage_a, storage_b, status FROM $this->messages_table WHERE user_id = %d ORDER BY id DESC LIMIT 1", 
								$db->escape($user_id)
					));
				 						
			if($db->num_rows($query) == 0)
			{
				return false;
			} else {
				return $this->messages_processor($query, $sender, $option);
			}
		}
		
		// Get message of a user (replicates get_messages but to a single message) (since 1.1)
		public function get_last_message($user_id)
		{
			global $db;
			
			$sender = $this->logged_user_id;
			
			$query = $db->query(sprintf("SELECT id, message, time, user_id, receiver, storage_a, storage_b, status FROM $this->messages_table WHERE 
			user_id = %d AND receiver = %d
			|| user_id = %d AND receiver = %d
			ORDER BY id DESC LIMIT 1",
						$db->escape($sender), $db->escape($user_id),
						$db->escape($user_id), $db->escape($sender)
					));
			
			if($db->num_rows($query) == 0)
			{
				return false;
			} else {
				$rows = $db->results($query);
				
				foreach($rows as $res)
				{
					// get only messages that are not deleted
					// just to order data based on logged_in user
					if($res['user_id'] == $sender || $res['receiver'] == $sender)
					{
						if(
							$res['user_id'] == $sender && $res['storage_a'] == 0 ||
							$res['receiver'] == $sender && $res['storage_b'] == 0 ||
							$res['storage_a'] == 0 && $res['storage_b'] == 0
						)
						{
							// kill it
						} else {
							$result = array(
								'id' => $res['id'],
								'message' => $res['message'],
								'time' => $res['time'],
								'user_id' => $res['user_id'],
								'receiver' => $res['receiver'],
								'storage_a' => $res['storage_a'],
								'storage_b' => $res['storage_b'],
								'status' => $res['status']
							);	
						}
					} 
				}
				
				if(isset($result) && is_array($result) == true)
				{
					return $result;
				} else {
					return false;	
				}
			}	
			
		}
		
		// Last message id (since 1.1)
		public function messages_last_id()
		{
			global $db;
			
			$query = $db->query("SELECT id FROM $this->messages_table ORDER BY id DESC LIMIT 1");
			
			if($db->num_rows($query) == 0)
			{
				return false;
			} else {
				$row = $db->fetch_row($query);
				return $row['id'];	
			}
				
		}
		
		// Get all messages of those users
		public function get_messages($user_id, $limit='')
		{
			global $db;
			
			$sender = $this->logged_user_id;
			
			$query = $db->query(sprintf("SELECT id, message, time, user_id, receiver, storage_a, storage_b, status FROM $this->messages_table WHERE storage_a != 0 AND user_id = %d AND receiver = %d || user_id = %d AND receiver = %d $limit", 
						$db->escape($sender), $db->escape($user_id), $db->escape($user_id), $db->escape($sender)
					));
					
			if($db->num_rows($query) == 0)
			{
				return false;
			} else {
				$rows = $db->results($query);
				
				foreach($rows as $res)
				{
					// get only messages that are not deleted
					// just to order data based on logged_in user
					if($res['user_id'] == $sender || $res['receiver'] == $sender)
					{
						if(
							$res['user_id'] == $sender && $res['storage_a'] == 0 ||
							$res['receiver'] == $sender && $res['storage_b'] == 0 ||
							$res['storage_a'] == 0 && $res['storage_b'] == 0
						)
						{
							// kill it
						} else {
							$results[] = array(
								'id' => $res['id'],
								'message' => $res['message'],
								'time' => $res['time'],
								'user_id' => $res['user_id'],
								'receiver' => $res['receiver'],
								'storage_a' => $res['storage_a'],
								'storage_b' => $res['storage_b'],
								'status' => $res['status']
							);	
						}
					} 
				}
				
				if(isset($results) && is_array($results) == true)
				{
					return $results;
				} else {
					return false;	
				}
			}	
		}
		
		// limit text by a certain amount of chars
		public function truncate($string, $length, $dots = "...") 
		{
			return (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . ' '.$dots : $string;
		}
		
		// Search Friend (Friends Approach: true)
		private function Search_Friend($filterword) 
		{
			global $db;
			
			$filterword = $db->escape($filterword);
			$logged_in = $db->escape($this->logged_user_id);
			
			$sql = "
				SELECT friend, display_name FROM (SELECT $this->users_table.id as UID, $this->users_table.display_name, $this->friends_table.id AS FID, TRIM(BOTH $logged_in FROM CONCAT(user_id, friend)) AS friend FROM $this->friends_table, $this->users_table
				WHERE user_id = $logged_in 
				|| 
				friend = $logged_in 
				HAVING friend = $this->users_table.id) AS merged WHERE display_name LIKE '%$filterword%'";

			$query = $db->query($sql);
								
			if($db->num_rows($query) == 0)
			{
				return false;
			} else {
				return $db->results($query);	
			}
		}
		
		// Search Users (Friends Approach: false)
		private function Search_Users($filterword) 
		{
			global $db;
			
			$filterword = $db->escape($filterword);
			$logged_in = $db->escape($this->logged_user_id);
			
			$sql = "SELECT id AS friend, display_name FROM $this->users_table WHERE display_name LIKE '%$filterword%' AND id != $this->logged_user_id";

			$query = $db->query($sql);
								
			if($db->num_rows($query) == 0)
			{
				return false;
			} else {
				return $db->results($query);	
			}
		}
		
		// Search your contacts
		public function Search_Contact($filterword)
		{
			if($this->friends_approach == true)
			{
				return $this->Search_Friend($filterword);
			} else {
				return $this->Search_Users($filterword);
			}
		}
		
		// Last Seen 
		public function last_seen($user_id)
		{
			global $db;
			
			$query = $db->query(
				sprintf("SELECT last_seen FROM $this->users_table WHERE id = %d", $db->escape($user_id))
			);
			
			if($db->num_rows($query) !== 0)
			{
				$row = $db->fetch_row($query);
				return $row['last_seen'];
			} else {
				return false;
			}
				
		}
		
		// Calculate Last Seen
		public function calculate_last_seen($timestamp, $user_id)
		{
			$user_status = $this->get_user_session_status($user_id);
			
			if($user_status == 'offline')
			{
				$then = $timestamp;
				$now = time();	
	
				$result = $now - $then;
				
				$date = date('H:i', $then);
				if($result <= 86400)
				{
					return  $date;	
				} elseif($result <= 172800) {
					return $date;
				} else {
					return date("j/m/Y H:i", $then);	
				}
			} elseif($user_status == 'online') {
				return 'online';	
			} else {
				return '';	
			}
			
		}
		
		// Get User Session Status
		public function get_user_session_status($user_id)
		{
			global $db;
			
			$query = $db->query(
				sprintf("SELECT session_status FROM $this->users_table WHERE id = %d", $db->escape($user_id))
			);
			
			if($db->num_rows($query) !== 0)
			{
				$row = $db->fetch_row($query);
				return $row['session_status'];
			} else {
				return false;
			}
		}
				
		// Add Message (chat)
		public function add_message($user_id, $message)
		{
		$realtime = time();
			global $db;
			
			$query = $db->query(sprintf("INSERT INTO $this->messages_table SET message = '%s', user_id = %d, receiver = %d, storage_a = %d, storage_b = %d, time = %d, status = 'unread'", 
						$db->escape(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')), $db->escape($this->logged_user_id), $db->escape($user_id), $db->escape($this->logged_user_id), $db->escape($user_id), $db->escape($realtime)
					));
					
			if($db->affected_rows($query) == 1)
			{
				return true;
			} else {
				return false;
			}	
		}
		
		// private update status
		private function update_session_status($status)
		{
			global $db;
			
			$query = $db->query(
				sprintf("UPDATE $this->users_table
							SET 
							  session_status = '%s',
							  last_seen = %d
							WHERE
							  id = %d
						", 
						$status,
						time(),
						$db->escape($this->logged_user_id)
					)
				);

			if($db->affected_rows($query) == 1)
			{
				return true;	
			} else {
				return false;	
			}
		}
		
		// Update user status
		public function set_user_sessionStatus($status)
		{						
			switch($status)
			{
				case "online":
					return $this->update_session_status('online');
				break;
				
				case "offline":
					return $this->update_session_status('offline');
				break;
			}
		}
		
		// Update Messaget Status (chat) 'works with unread messages counter'
		public function update_message_status($message_id, $user_id)
		{
			global $db;
			
			$message_id = $db->escape($message_id);
			
			$query = $db->query("UPDATE $this->messages_table SET status = 'read' WHERE id = $message_id AND user_id = $user_id");
			
			if($db->affected_rows($query) == 1)
			{
				return true;
			} else {
				return false;
			}
		}
		
		// testing (since 1.1)
		public function chat_type($status, $id='')
		{
			global $db;
			
			// for get typing status
			if(strlen($id) !== 0)
			{
				$user = $db->escape($id); // clist
				$log_user = $db->escape($this->logged_user_id); // log user
								
				$status = 'typing_'.$log_user;
				$tq = $db->query("SELECT id, type_status FROM $this->users_table WHERE id = $user AND type_status = '$status'");
				
				if($db->num_rows($tq) == 1)
				{
					return $user;
				} else {
					return 'stopped';
				}
			
			// for setting typing status	
			} else {
				
				$user = $db->escape($this->logged_user_id);
				
				$query = $db->query("SELECT id, type_status FROM $this->users_table WHERE id = $user");
			
				if($db->num_rows($query) == 1)
				{
					if($status !== 'stopped')
					{
						$status = $db->escape($status);
						$tq = $db->query("UPDATE $this->users_table SET type_status = '$status' WHERE id = $user");
					} elseif($status == 'stopped') {
						$tq = $db->query("UPDATE $this->users_table SET type_status = 'stopped' WHERE id = $user");	
					}	
				}
				
				if($db->affected_rows($tq) == 1)
				{
					return $user;
				} else {
					return 'stopped';
				}	
			}
			
		}
		
		// Delete Message (chat)
		public function delete_message($message_id, $user_id)
		{
			global $db;
			
			// Find Owner
			$query = $db->query(
					sprintf("SELECT user_id, receiver, storage_a, storage_b FROM $this->messages_table
								WHERE
								  id = %d
							", 
							 $db->escape($message_id)
					)
				);	
				
				$row = $db->fetch_row($query);
				
				// Delete Magic
				if($row['user_id'] == $this->logged_user_id || $row['receiver'] == $this->logged_user_id)
				{
					if($row['user_id'] == $this->logged_user_id)
					{
						$internal_storage_a = 0;
						$internal_storage_b = $row['storage_b'];
					}
					
					if($row['receiver'] == $this->logged_user_id)
					{
						$internal_storage_a = $row['storage_a'];
						$internal_storage_b = 0;
					} 
				} 
						
				// Register Storages (a => logged_user_id/user_id, b => user_id/logged_user_id)
				$updated = $db->query(
					sprintf("UPDATE $this->messages_table
								SET 
								  storage_a = %d,
								  storage_b = %d
								WHERE
								  id = %d
							", 
							 $db->escape($internal_storage_a),
							 $db->escape($internal_storage_b),
							 $db->escape($message_id)
					));	
				
				if($db->affected_rows() == 1)
				{
					// check if both users does not have the messages to remove them
					// If you want to never delete messages remove this code and left just return true;
					
					// Look again
					$query_d = $db->query(
						sprintf("SELECT storage_a, storage_b FROM $this->messages_table
									WHERE
									  id = %d
								", 
								 $db->escape($message_id)
						)
					);
						
					$r = $db->fetch_row($query_d);
					
					// permanent delete it
					if($r['storage_a'] == 0 && $r['storage_b'] == 0)
					{
						$db->query(
							sprintf("DELETE FROM $this->messages_table WHERE id = %d", 
									$db->escape($message_id)
							)
						);			
					}
					
					return true;
					
				} else {
					return false;	
				}
		}
	}
	
?>