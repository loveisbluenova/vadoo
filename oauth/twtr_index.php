<?php
session_start();

require_once "twitter/twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', 'iqeEM62zY9e81CjbrOG64Ttw3');
define('CONSUMER_SECRET', 'YwpNWHQnbi5MHzNwRwlGPlU9LYh1OYGZ51saubN9QAlEAwE0lm');
define('OAUTH_CALLBACK','https://vadoodemo.site/oauth/redirect.php');

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);

// requesting tokens
$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
//echo 'hello <br />'; echo CONSUMER_KEY; die();
// saving the above tokens in Session for the usage till the session exist.exist
$_SESSION['twtr_oauth_token'] = $request_token['oauth_token'];
$_SESSION['twtr_oauth_token_secret'] = $request_token['oauth_token_secret'];
$oauth_token=$request_token['oauth_token'];
$oauth_token_secret= $request_token['oauth_token_secret'];
$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token'])); 
header('Location: ' . $url);
?>