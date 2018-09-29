<?php
session_start();
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
	  include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
    //include 'PHP/visits.php';
include 'PHP/editapicode.php';
$current1 = '';
$current2 = '';
$current3 = '';
$current4='';
$current5='';
$current6='';
$current7='';
$current8='';
$current9='';
$current10='';	
$current11='';
$current12='';
$current13='';
$current14='';	
$current15='current';
$current16='';
$current17='';
$current18='';		
foreach ($connread->query($website_options_query) as $row) {
$buzzysiteurl=$row['buzzysiteurl'];	
$buzzysitelogo=$row['buzzysitelogo'];
$buzzyoptimizedstatus=$row['buzzyoptimizedstatus'];
$buzzynewslimit=$row['buzzynewslimit'];
$buzzyyoutubeapi=$row['buzzyyoutubeapi'];
$buzzyfortumoid=$row['buzzyfortumoid'];
$buzzyfacebookaccess=$row['buzzyfacebookaccess'];
$buzzyfortumosecret=$row['buzzyfortumosecret'];
$buzzydistance_mesaure=$row['buzzydistance_mesaure'];
$buzzywebsite_status=$row['buzzywebsite_status'];
$buzzyversion=$row['buzzyversion'];
$buzzyupdatestatus=$row['buzzyupdatestatus'];
}
if ($_SESSION["buzzyadmin_id"]==1){	
if($buzzywebsite_status==1){
$delete_usersunactive_query = "DELETE   FROM buzzyusers WHERE buzzyuser_age=0 AND buzzyuser_onlinestatus=0";
$stmt = $connwrite->prepare($delete_usersunactive_query);
$stmt->execute();
$OK = $stmt->rowCount();
}
}	
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buzzybuz - Admin panel for controlling website</title>
    <meta name="description" content="Loading Effects for Grid Items with CSS Animations"/>
    <meta name="keywords" content="css animation, loading effect, google plus, grid items, masonry"/>
    <meta name="author" content="Codrops"/>
    <link rel="shortcut icon" href="../favicon.ico">
    		<link rel="stylesheet" type="text/css" href="css/admin.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
    <link rel="stylesheet" type="text/css" href="css/default.css"/>
    <link rel="stylesheet" type="text/css" href="css/component.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../dist/sweetalert.css">		
    <script src="bootstrap/js/angular.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/npm.js"></script>
    <script src="charts/Chart.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
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
                <h1>
                    Change website api settings
                </h1>
				<?php
				   if ($_SESSION["buzzyadmin_id"]==1){
				?>
			    <?php
                foreach ($connread->query($website_api_query) as $row) {
				$buzzyfacebookid=$row['buzzyfacebookid'];
				$buzzyfacebooksecret=$row['buzzyfacebooksecret'];	
                $buzzyfacebookaccess=$row['buzzyfacebookaccess'];				
				$buzzyyoutubeapi=$row['buzzyyoutubeapi'];
				$buzzyvimeoaccesstoken=$row['buzzyvimeoaccesstoken'];				
				$buzzyamazonapi=$row['buzzyamazonapi'];
				$buzzyamazonaccesskey=$row['buzzyamazonaccesskey'];
				$buzzyamazonsecretkey=$row['buzzyamazonsecretkey'];	
                $buzzydribbbleclientid=$row['buzzydribbbleclientid'];		
                $buzzydribbblesecret=$row['buzzydribbblesecret'];	
                $buzzydribbbleaccesstoken=$row['buzzydribbbleaccesstoken'];	
                $buzzycaptcha_sitekey=$row['buzzycaptcha_sitekey'];
                $buzzycaptcha_secretkey=$row['buzzycaptcha_secretkey'];				
		        ?>
                <form action="" method="POST">   
				<h3>Facebook api id</h3>
                <input type="text" class="form-control" name="buzzyfacebookid" required value="<?php echo $buzzyfacebookid;?>" data-toggle="tooltip" data-placement="right" title="You type your facebook api id here">	   
				<h3>Facebook secret key</h3>
                <input type="text" class="form-control" name="buzzyfacebooksecret" required value="<?php echo $buzzyfacebooksecret;?>" data-toggle="tooltip" data-placement="right" title="You type your facebook api id here">	 				
 				<h3>Facebook access key</h3>
                <input type="text" class="form-control" name="buzzyfacebookaccess" required value="<?php echo $buzzyfacebookaccess;?>" data-toggle="tooltip" data-placement="right" title="You type your facebook api id here">	 
               	<?php
                 if(2>5){
	             ?>
 	            <h3>Vimeo access token</h3>
			    <input type="text" class="form-control" name="buzzyvimeoaccesstoken" required value="<?php echo $buzzyvimeoaccesstoken;?>" data-toggle="tooltip" data-placement="right" title="You type your vimeo access token here">					
				
				<h3>Amazon Afiliate ID</h3>				
                <input type="text" class="form-control" name="buzzyamazonapi" required value="<?php echo $buzzyamazonapi; ?>" data-toggle="tooltip" data-placement="right"
				title="Change Amazon.com ID here">	  
                <h3>Amazon Access key</h3>				
                <input type="text" class="form-control" name="buzzyamazonaccesskey" required value="<?php echo $buzzyamazonaccesskey; ?>" data-toggle="tooltip" data-placement="right"
				title="Change Amazon.com Access key here">	  
                <h3>Amazon Secret key</h3>				
                <input type="text" class="form-control" name="buzzyamazonsecretkey" required value="<?php echo $buzzyamazonsecretkey; ?>" data-toggle="tooltip" data-placement="right"
				title="Change Amazon.com Secret key here">			

				<h3>Dribbble client ID</h3>				
                <input type="text" class="form-control" name="buzzydribbbleclientid" required value="<?php echo $buzzydribbbleclientid; ?>" data-toggle="tooltip" data-placement="right"
				title="Change Amazon.com ID here">	  
                <h3>Dribbble Secret key</h3>				
                <input type="text" class="form-control" name="buzzydribbblesecret" required value="<?php echo $buzzydribbblesecret; ?>" data-toggle="tooltip" data-placement="right"
				title="Change Amazon.com Access key here">	  
                <h3>Dribbble Access token</h3>				
                <input type="text" class="form-control" name="buzzydribbbleaccesstoken" required value="<?php echo $buzzydribbbleaccesstoken; ?>" data-toggle="tooltip" data-placement="right"
				title="Change Amazon.com Secret key here">									
				<div class="clearfix"></div>
				<?php }	?>					
				<h3>Google map api key (important for user maps)</h3>
			    <input type="text" class="form-control" name="buzzyyoutubeapi" required value="<?php echo $buzzyyoutubeapi;?>" data-toggle="tooltip" data-placement="right" title="You type your Google map api id here">	
				<h3>Google captcha site key</h3>
                <input type="text" class="form-control" name="buzzycaptcha_sitekey" required value="<?php echo $buzzycaptcha_sitekey;?>" data-toggle="tooltip" data-placement="right" title="You type your Google captcha site key here">

			    <h3>Google captcha secret key</h3>
                <input type="text" class="form-control" name="buzzycaptcha_secretkey" required value="<?php echo $buzzycaptcha_secretkey;?>" data-toggle="tooltip" data-placement="right" title="You type your Google captcha secret key here">	   				
				<br>
					<button type="submit" name="update_api_options" class="btn btn-primary">Submit api keys</button>
                </form>			
				<?php }	?>
				<?php }	?>
			<?php
				   if ($_SESSION["buzzyadmin_id"]==2){
				?>	
				 <div class="alert alert-info" style="margin-top:20px!important;" role="alert">You cannot see apis in demo version of the website.</div>
				   <?php } ?>	
                <br><br>				   
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