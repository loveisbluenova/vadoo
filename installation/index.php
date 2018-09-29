<?php
session_start();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
if(!isset($_GET['step'])){
 header('Location: index.php?step=syscheck');	
}
$check_system=htmlspecialchars($_GET['step'], ENT_QUOTES);

if ($check_system=='sitename'){
	include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
   if (isset($_POST['update_website_options'])) {	

   
$from=strip_tags($_POST['envatomail']);  
$to = 'vadoolegal@gmail.com';
$subject = 'Website Legal Mail';
$headers = "From: " . strip_tags($_POST['envatomail']) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_POST['envatomail']) . "\r\n";
$headers .= "CC: vadoobm83@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = '<html><body>
<p><strong>Envato username:</strong>' . strip_tags($_POST['envatousername']) . '</p>
<p><strong>Envato email:</strong>' . strip_tags($_POST['envatomail']) . '</p>
<p><strong>User website:</strong>' . strip_tags($_POST['buzzysiteurl']) . '</p>
</body></html>
';
 mail($to, $subject, $message, $headers);

        $OK = false;
		$buzzysiteurl=$_POST['buzzysiteurl'];
        $update_website_options_query = "UPDATE buzzysiteoptions SET buzzysiteurl=:buzzysiteurl";
        $stmt = $connwrite->prepare($update_website_options_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzysiteurl', $buzzysiteurl, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		
		
$dbstra=file_get_contents('../includes/connection.php');
$dbstra1 = htmlspecialchars($dbstra, ENT_QUOTES);
$oldonetxt = array("FULL-URL-OF-YOUR-WEBSITE-HERE");
$newonetxt   = array("https://$buzzysiteurl/");
$newphrase = str_replace($oldonetxt , $newonetxt, $dbstra);
file_put_contents("../includes/connection.php",$newphrase);				
header('Location: index.php?step=success');	
		}
	
}

if ($check_system=='adminupload'){
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
 if (isset($_POST['update_admin'])) {
	   $buzzyadmin_user=$_POST['buzzyadmin_user'];
	   $buzzyadmin_password=$_POST['buzzyadmin_password'];	 
	   $enc_buzzyadmin_password=md5($buzzyadmin_password);	   
        $OK = false;
        $update_admin_query = "UPDATE buzzyadmin SET buzzyadmin_user=:buzzyadmin_user,buzzyadmin_password=:buzzyadmin_password WHERE buzzyadmin_id=1";
        $stmt = $connwrite->prepare($update_admin_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyadmin_user', $buzzyadmin_user, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyadmin_password', $enc_buzzyadmin_password, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        header('Location: index.php?step=sitename');		
		}
}	
if(phpversion()>'5.3'){
$phpver_status='<i class="fa fa-check" style="color:#07A82C!important;" aria-hidden="true"></i> <span>Your PHP version is compatible with script ('.phpversion().').</span>';	
$passone=0;
}
else if(phpversion()<'5.3'){
$phpver_status='<i class="fa fa-times" style="color:#911122!important;" aria-hidden="true"></i> <span>Your PHP version is not compatible with script ('.phpversion().').</span>';	
$passone=1;
}

if(shell_exec('mysql -V') != ''){
$mysql_status='<i class="fa fa-check" style="color:#07A82C!important;" aria-hidden="true"></i> <span>MySQL is enabled at your server.</span>';	
$passtwo=0;	
}
else if(shell_exec('mysql -V') == ''){
$mysql_status='<i class="fa fa-times" style="color:#911122!important;" aria-hidden="true"></i> <span>MySQL is not enabled at your server.</span>';	
$passtwo=1;		
}

if(ini_get('safe_mode') ){
$safem_status='<i class="fa fa-times" style="color:#911122!important;" aria-hidden="true"></i> <span>Safe mode is enabled at your server.</span>';	
$passthree=1;	
}
else if(!ini_get('safe_mode') ){
 $safem_status='<i class="fa fa-check" style="color:#07A82C!important;" aria-hidden="true"></i> <span>Safe mode is disabled at your server.</span>';	
 $passthree=0;	
 }


if(ini_get('file_uploads') == 1)
{
$fileup_status='<i class="fa fa-check" style="color:#07A82C!important;" aria-hidden="true"></i> <span>File upload is enabled at your server.</span>';	
$passfour=0;		
}
else if(!ini_get('file_uploads') == 1)
{
$fileup_status='<i class="fa fa-times" style="color:#911122!important;" aria-hidden="true"></i> <span>File upload is not enabled at your server.</span>';	
$passfour=1;
}

if(ini_get('allow_url_fopen') == TRUE)
{
$urlop_status='<i class="fa fa-check" style="color:#07A82C!important;" aria-hidden="true"></i> <span>Allow url open is enabled at your server.</span>';		
$passfive=0;
}
else if(ini_get('allow_url_fopen') == FALSE)
{
$urlop_status='<i class="fa fa-times" style="color:#911122!important;" aria-hidden="true"></i> <span>Allow url open is not enabled at your server.</span>';	
$passfive=1;
}


if(ini_get('allow_url_include') == TRUE)
{
$urlin_status='<i class="fa fa-check" style="color:#07A82C!important;" aria-hidden="true"></i> <span>Allow url include is enabled at your server.</span>';	
$passsix=0;	
}
else if(ini_get('allow_url_include') == FALSE)
{
$urlin_status='<i class="fa fa-times" style="color:#911122!important;" aria-hidden="true"></i> <span>Allow url include is not enabled at your server.</span>';	
$passsix=1;
}


	
$filename = 'SQL.sql';
$dbstr=file_get_contents('../includes/connection.inc.php');
$dbstr1 = htmlspecialchars($dbstr, ENT_QUOTES);

$dbstra=file_get_contents('../includes/connection.php');
$dbstra1 = htmlspecialchars($dbstra, ENT_QUOTES);

$dbstrb=file_get_contents('../oauth/db/dbconfig.php');
$dbstrb1 = htmlspecialchars($dbstrb, ENT_QUOTES);
if (isset($_POST['importdb'])) {
$mysql_host = $_POST['hostname'];
$mysql_host = str_replace(' ','',$mysql_host);
// MySQL username
$mysql_username =  $_POST['dbuser'];
$mysql_username = str_replace(' ','',$mysql_username);
// MySQL password
$mysql_password = $_POST['dbpwd'];
$mysql_password = str_replace(' ','',$mysql_password);
// Database name
$mysql_database = $_POST['database'];	
$mysql_database = str_replace(' ','',$mysql_database);
//read the entire string
//replace something in the file string - this is a VERY simple example

$oldonetxt = array("your-host-here", "your-database-here", "your-database-user", "your-database-password");
$newonetxt   = array($mysql_host,$mysql_database,$mysql_username,$mysql_password);
$newphrase = str_replace($oldonetxt , $newonetxt, $dbstr);
$newphrasea = str_replace($oldonetxt , $newonetxt, $dbstra);
$newphraseb = str_replace($oldonetxt , $newonetxt, $dbstrb);
file_put_contents("../includes/connection.inc.php",$newphrase);
file_put_contents("../includes/connection.php",$newphrasea);
file_put_contents("../oauth/db/dbconfig.php",$newphraseb);
$aVar = mysqli_connect($mysql_host,$mysql_username,$mysql_password,$mysql_database);   
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysqli_query($aVar,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
 header('Location: index.php?step=adminupload');	
} 
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vadoo - Admin panel for controlling website</title>
    <meta name="description" content="Loading Effects for Grid Items with CSS Animations"/>
    <meta name="keywords" content="css animation, loading effect, google plus, grid items, masonry"/>
    <meta name="author" content="Codrops"/>
    <link rel="shortcut icon" href="../favicon.ico">
    		<link rel="stylesheet" type="text/css" href="../admin/css/admin.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
    <link rel="stylesheet" type="text/css" href="../admin/css/default.css"/>
    <link rel="stylesheet" type="text/css" href="../admin/css/component.css"/>
    <link rel="stylesheet" type="text/css" href="../admin/bootstrap/css/bootstrap.css"/>
	<script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../dist/sweetalert.css">	
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="../css/animate.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"/>	
    <script src="../admin/bootstrap/js/angular.js"></script>
    <script src="../admin/js/modernizr.custom.js"></script>
    <script src="../admin/bootstrap/js/bootstrap.js"></script>
    <script src="../admin/bootstrap/js/npm.js"></script>
    <script src="../admin/charts/Chart.js"></script>
    <script src="../admin/ckeditor/ckeditor.js"></script>
    <script>
        var bootstrapButton = $.fn.button.noConflict() // return $.fn.button to previously assigned value
        $.fn.bootstrapBtn = bootstrapButton            // give $().bootstrapBtn the Bootstrap functionality
    </script>
    <script>

        // Code that uses other library's $ can follow here.
    </script>
</head>
<body>

<!-- Admin panel Header ------ START -->
<div id="admin-header">
    <?php
    include 'HTML/admin-header.html';
    ?>
</div>
<!-- Admin panel Header ------ END -->
<br><br>

<!-- ADMIN WRAPPER ------ START -->

<!-- Side page of the Admin panel ------ START -->
<div class="one-sixth-column big-screen">
    <div id="admin-side-page">
        <?php
        include 'HTML/admin-side-page.html';
        ?>
    </div>
</div>
<!-- Side page of the Admin panel ------ END -->

<div class="fifth-sixth-column">
    <!-- Breadcrumbs for admin panel ------ START -->
    <ol class="breadcrumb">
        <li><a href="index.php"><span class="glyphicon glyphicon-home "></span>Home</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
				<?php
				if ($check_system=='dbupload'){
				?>
				 <h1>
                    Database upload
                </h1>
				<form action="" method="POST" >
				<h3>Hostname</h3>				
                <input type="text" class="form-control" name="hostname" required  data-toggle="tooltip" data-placement="right" placeholder="Hostname" title="Type your hostname here">	
				<h3>Database</h3>				
                <input type="text" class="form-control" name="database" required  data-toggle="tooltip" data-placement="right" placeholder="Database name" title="Type your database name here">		
				<h3>User</h3>				
                <input type="text" class="form-control" name="dbuser" required  data-toggle="tooltip" data-placement="right" placeholder="Database user" title="Type your database user here">		
				<h3>Password</h3>				
                <input type="text" class="form-control" name="dbpwd" required  data-toggle="tooltip" data-placement="right" placeholder="Database password" title="Type your database password here">
			    <button class="btn btn-primary" name="importdb" type="submit"> <i class="fa fa-upload" aria-hidden="true"></i> Install database</button>				
				</form>
				 <br><br>
				<?php } ?>
				
				<?php
				if ($check_system=='syscheck'){
				?>  <h1>
                  System checking
                </h1>
			   <?php echo $phpver_status;?>
			   <br>
			   <?php echo $mysql_status;?>
			   <br>
			   <?php echo $safem_status;?>		
			   <br>
			   <?php echo $fileup_status;?>	
               <br>
               <?php echo $urlop_status;?>		
               <br>
               <?php echo $urlin_status;?>					   
			   	<br><br>
				<?php
				if ($passtotal==0){
				?> 
				<div class="alert alert-success" role="alert">Your server settings are fully compatible with script. You can start your installation.</div>	
				<?php } ?>
				<?php
				if ($passtotal!=0){
				?> 
				<div class="alert alert-danger" role="alert">Your server settings are not compatible with script. Please setup your php.ini file.</div>	
				<?php } ?>				
			   <a href="index.php?step=dbupload" class="btn btn-primary"> <i class="fa fa-download" aria-hidden="true"></i> Begin installation</a>
				                <br><br>
				<?php } ?>
				<?php
				if ($check_system=='adminupload'){
				?> 
				<h1>
                 Admin credentials (username and password)
                </h1>
				<form action="" method="POST" >
				<h3>Admin User name</h3>				
                <input type="text" class="form-control" name="buzzyadmin_user" required  data-toggle="tooltip" data-placement="right" placeholder="Admin user name" title="Type your Admin username here">	
				<h3>Admin password</h3>				
                <input type="text" class="form-control" name="buzzyadmin_password" required  data-toggle="tooltip" data-placement="right" placeholder="Admin password" title="Type your Admin password here">				
			    <button class="btn btn-primary" name="update_admin" type="submit">Update admin credentials</button>				
				</form>
				                <br><br>
				<?php } ?>
				<?php
				if ($check_system=='sitename'){
				?> 	
                <form action="" method="POST"> 				
               <h1>Website url here like this (www.example.com)</h1>				
				<input type="text" class="form-control" name="buzzysiteurl" required placeholder="www.example.com" data-toggle="tooltip" data-placement="right" title="You type your website url here without https://.. It is important to post this because of social network connectivity and so on..">	                	
 				<input type="text" class="form-control" name="envatousername" required placeholder="Write your Envato username here" data-toggle="tooltip" data-placement="right" title="You type your Envato username here...">	                	
				<input type="text" class="form-control" name="envatomail" required placeholder="Write your Envato email here" data-toggle="tooltip" data-placement="right" title="You type your Envato email here...">	
                <button type="submit" name="update_website_options" class="btn btn-primary">Submit website options</button>
                </form>
					<br>
				<div class="alert alert-info" role="alert">You should write your Envato user name and Envato email in order to receive better support and also it is my step to fight against piracy. Thank you. Branko83</div>
				                <br><br>
			  <?php } ?>
		

			    <?php
				if ($check_system=='success'){
				?> 
				<br>
				<div class="alert alert-success" role="alert">You have succesfully install script. Delete your root/installation folder for security reasons. Setup your api keys in admin panel.</div>
				<?php } ?>				

            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/imagesloaded.js"></script>
<script src="js/classie.js"></script>
<!-- ADMIN WRAPPER ------ END -->
<?php
  include '../HTML/modal-sweet-alerts.html';
?>
</body>
</html>