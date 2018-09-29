<?php
ob_start('ob_gzhandler');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$ip = $_SERVER['REMOTE_ADDR'];
if (isset($_GET["visitors-page"])) {
$visitors_page=htmlspecialchars($_GET["visitors-page"], ENT_QUOTES);
}
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
</head>
<body>
<p style="text-align:center!important;"><img style="" src="https://m.popkey.co/a3d87f/bgbOV.gif" /></p>
<h1 style="text-align:center!important;">During your previous spamming and attacking activity you cannot view Vadoo script. 
Best wishes in further life and work.
<br>
Branko 83
 </h1>
</body>
</html>