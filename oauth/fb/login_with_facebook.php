<?php
ob_start();
require('http.php');
	require('oauth_client.php');
	require_once('../db/dbconfig.php');
    $now = time();
	$client = new oauth_client_class;
	$client->debug = false;
	$client->debug_http = true;
	$client->server = 'Facebook';
	$client->redirect_uri = 'https://'.$_SERVER['HTTP_HOST'].
		dirname(strtok($_SERVER['REQUEST_URI'],'?')).'/login_with_facebook.php';


	$client->client_id = '613416985685196'; $application_line = __LINE__;
	$client->client_secret = 'ac044dbf369e4cc3e0e7c7e4466b5de1';
	if(strlen($client->client_id) == 0
	|| strlen($client->client_secret) == 0)
		die('Please go to Facebook Apps page https://developers.facebook.com/apps , '.
			'create an application, and in the line '.$application_line.
			' set the client_id to App ID/API Key and client_secret with App Secret');
	/* API permissions
	 */

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
$user_ipreal = getUserIP();	 
$ch = curl_init();
            $headr = array();
            $headr[] = 'Content-length: 0';
            $headr[] = 'Content-type: application/json';
            curl_setopt($ch, CURLOPT_URL, 'http://ip-api.com/json/'.$user_ipreal.'');
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; xxxxx)'); // my product name
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $ch_data = curl_exec($ch);
            curl_close($ch);
            if(!empty($ch_data))
            {
            $json_data = json_decode($ch_data, true);
            //print_r($json_data);
            $new_user_city=$json_data['city'];
            $new_user_region=$json_data['country'];
            $new_user_lat=$json_data['lat'];	
            $new_user_lon=$json_data['lon'];			
			}
        $buzzyuser_location = $new_user_city.', '.$new_user_region;			
     $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $randompwd=implode($pass); //turn the array into a string
	$client->scope = 'email';
	if(($success = $client->Initialize()))
	{
		if(($success = $client->Process()))
		{
			if(strlen($client->access_token))
			{
				$success = $client->CallAPI(
					'https://graph.facebook.com/v2.8/me?fields=id,email,name,first_name,last_name,gender,link,timezone,updated_time,verified', 
					'GET', array(), array('FailOnAccessError'=>true), $user);
/*
				if($success)
				{
					// Get Friends that use the same application

					$success = $client->CallAPI(
						'https://graph.facebook.com/v2.8/me/friends', 
						'GET', array(), array('FailOnAccessError'=>true), $friends);
				}
*/
/*				if($success)
				{
					// Requires publish_actions permissions and your application needs to be submitted for review
					$values = array(
						// You can no longer pre-fill the user message
						'message'=>'',
						'link'=>'http://www.phpclasses.org/package/7700-PHP-Authorize-and-access-APIs-using-OAuth.html',
						// The name of the post can be retrieved from the page title
						//'name' => 'This is the title',
						// the description of the post can be retrieved from the page meta description
						'description'=>'This post was submitted using this PHP OAuth API client class.',
						'picture' => 'http://files.phpclasses.org/files/blog/package/7700/file/PHP%2BOAuth.png'
					);
					$success = $client->CallAPI(
						'https://graph.facebook.com/v2.8/me/feed', 
						'POST', $values, array('FailOnAccessError'=>true), $post);
				}
*/
/*
				if($success)
				{
					// Post photos in your time line

					$success = $client->CallAPI(
						"https://graph.facebook.com/me/photos",
						'POST', array(
							'message'=>'This is a test to post photos in Facebook time line using this the PHP OAuth API class: http://www.phpclasses.org/oauth-api',
							'source'=>'picture.jpg'
						),
						array(
							'FailOnAccessError'=>true,
							'Files'=>array(
								'source'=>array(
						)
					)
				), $upload);
				}
*/
			}
		}
		$success = $client->Finalize($success);
	}
	if($client->exit)
		exit;
	if($success) //if the user was logged in successfully
	{
		if($user->{'gender'}=='male'){
		$gender=0;	
		}
		else if($user->{'gender'}=='female'){
		$gender=1;	
		}		
		
		session_start();
		//first check whether the returned userid exists in the fb_oauth table
		$query = 'SELECT * FROM  buzzy_oauth_fb_users WHERE id = '. $user->{'user_id'} . ';';
		$result = mysqli_query($dbLink,$query); 
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				
		//if the result is NULL then the user is new and has to be inserted, else it is not new user and we have the details in db
		if ( $row === NULL) {
	    $user_image='http://graph.facebook.com/'. $user->{'id'} . '/picture?type=large';		
			// insert the user tokens in the respective tables
			// Create a user 
			$query = 'INSERT INTO buzzy_oauth_fb_users VALUES ("'. $user->{'id'} . '","'. $user->{'email'} . '","'. $user->{'first_name'} . '","'. $user->{'last_name'}  . '","'. $user->{'gender'}. '","'. $user->{'link'}. '","'. $user->{'locale'}.  '","'. $user->{'name'}.  '","'. $user->{'timezone'}.  '","'. $user->{'updated_time'}.  '","'. $user->{'verified'}. '");';
		    $query20 = 'INSERT INTO users VALUES ("'. $user->{'id'} . '","'. $user->{'first_name'} . '","'. $user->{'first_name'} . '","'. $user->{'link'}  . '"," ","stopped","0","online");';			
			$query1 = 'SELECT * FROM buzzyusers WHERE buzzyuser_email = "' . $user->{'email'} . '";';
			mysqli_query($dbLink,$query); 
			$result1 = mysqli_query($dbLink,$query1);
			$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
			// if the email of the user was preent already then just redirect. We have already made him a oauth user too
			if ( $row1['buzzyuser_email'] === $user->{'email'} ) {
				$_SESSION["buzzyuser_id"] = $row1["buzzyuser_id"];
				header('Location: ../../page.php?user-id='.$_SESSION["buzzyuser_id"].'');
			}
			else {
			$query25 = 'INSERT INTO buzzymailing_list(buzzymailing_list_email,buzzymailing_list_timestamp) VALUES ("'. $user->{'email'}.'","'. $now . '");';
			mysqli_query($dbLink,$query25);
								
				$query2 = 'INSERT INTO buzzyusers (buzzyuser_first_name, buzzyuser_last_name,buzzyuser_image,buzzyuser_location,buzzyuser_lat,buzzyuser_long, buzzyuser_username,buzzyuser_birthdate,buzzyuser_email,
				buzzyuser_password, buzzyuser_registration_date,buzzyuser_last_login, buzzyuser_registration_timestamp, buzzyuser_status,buzzyuser_genre,buzzyuser_fortumo_tnx,buzzyuser_animation,buzzyuser_theme) VALUES ("'.$user->{'first_name'}. '","'. $user->{'last_name'} . '","'. $user_image . '","'.$buzzyuser_location.'","'. $new_user_lat.'","'. $new_user_lon.'",
				"'. $user->{'name'} . '","1970-01-01",
				"'. $user->{'email'}.'","'. $randompwd .'", NOW() ,"'. $now . '","'. $now . '", 0,"'. $gender .'","eruezrufjde",6,2);';
				mysqli_query($dbLink,$query2);
			}
			$query1 = 'SELECT * FROM buzzyusers WHERE buzzyuser_email = "' . $user->{'email'} . '";';
			$result1 = mysqli_query($dbLink,$query1);
			$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
			$_SESSION["buzzyuser_id"] = $row1["buzzyuser_id"];
			// Redirecting to index
			header('Location: ../../page.php?user-id='.$_SESSION["buzzyuser_id"].'');
		}
		else {
			$query1 = 'SELECT * FROM buzzyusers WHERE buzzyuser_email = "' . $user->{'email'} . '";';
			$result1 = mysqli_query($dbLink,$query1);
			$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
			$_SESSION["buzzyuser_id"] = $row1["buzzyuser_id"];	
            $session_buzzyuser_id = $row1["buzzyuser_id"];			
				$query2 = 'INSERT INTO buzzylogins (buzzylogin_timestamp, buzzyuser_id) VALUES ("'.$now. '","'. $session_buzzyuser_id . '");';
				mysqli_query($dbLink,$query2);			
			// Redirecting to index
			header('Location: ../../page.php?user-id='.$_SESSION["buzzyuser_id"].'');
		}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">q
<html>
<head>
<title>Facebook OAuth client results</title>
</head>
<body>
<?php
		echo '<h1>', HtmlSpecialChars($user->name), 
			' you have logged in successfully with Facebook!</h1>';
		echo '<pre>', HtmlSpecialChars(print_r($user, 1)), '</pre>';
		echo '<pre>', HtmlSpecialChars(print_r($post, 1)), '</pre>';
?>
</body>
</html>
<?php
	}
	else
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>OAuth client error</title>
</head>
<body>
<h1>OAuth client error</h1>
<pre>Error: <?php echo HtmlSpecialChars($client->error); ?></pre>
</body>
</html>
<?php } ?>