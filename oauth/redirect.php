<?php
session_start();
require_once "twitter/twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;
$actual_link = "https://$_SERVER[HTTP_HOST]";
define('CONSUMER_KEY', 'cG39lzSkU5xCtcHp4zUkwcB1l');
define('CONSUMER_SECRET', 'aPbMmfWwyBzXMzTtwllQkDr5sg4iwXGHp2uiZxWwtyp1EfUpD9');
define('OAUTH_CALLBACK', $actual_link.'/oauth/redirect.php');


// Pulling the temporary oauth_token back out of sessions
$request_token = array();

$request_token['oauth_token'] = $_SESSION['twtr_oauth_token'];
$request_token['oauth_token_secret'] = $_SESSION['twtr_oauth_token_secret'];

if (isset($_REQUEST['oauth_token']) && $request_token['oauth_token'] !== $_REQUEST['oauth_token']) {
    echo "Something is wrong";
}
// Make a TwitterOAuth instance with the temporary request token.
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);

// Get access tokens
$access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));

require "db/dbconfig.php";

//first check whether the returned userid exists in the twitter_oauth table
$query = 'SELECT * FROM  buzzy_oauth_twtr_users WHERE oauth_uid = '. $access_token['user_id'] . ';';
$result = mysqli_query($dbLink,$query); 
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

//if the result is NULL then the user is new and has to be inserted, else it is not new user and we have the details in db
if ( $row === NULL) {
	// insert the user tokens in the respective tables
	// Create a user 
	$query = 'INSERT INTO buzzy_oauth_twtr_users VALUES ("TWITTER", "'. $access_token['user_id'] . '","'.$access_token['oauth_token'] . '","'.$access_token['oauth_token_secret'] . '","'.$access_token['screen_name']  .'");';
	$query2 = 'INSERT INTO buzzyusers (buzzyuser_username, buzzyuser_registration_date, buzzyuser_status,buzzyuser_image) VALUES ("'.$access_token['screen_name'].'", NOW() , 1,"profile-icon1.jpg");';
	$query1 = 'SELECT * FROM buzzyusers WHERE buzzyuser_username = "' . $access_token['screen_name'] . '";';
	mysqli_query($dbLink,$query); 
	mysqli_query($dbLink,$query2); 
	$result1 = mysqli_query($dbLink,$query1);
	$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
	$_SESSION["buzzyuser_id"] = $row1["buzzyuser_id"];
	// Redirecting to index
	header('Location: ../index.php');
}
else {
	$query1 = 'SELECT * FROM buzzyusers WHERE buzzyuser_username = "' . $row['screen_name'] . '";';
	$result1 = mysqli_query($dbLink,$query1);
	$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
	$_SESSION["buzzyuser_id"] = $row1["buzzyuser_id"];
	// Redirecting to index
	header('Location: ../index.php');
}
?>