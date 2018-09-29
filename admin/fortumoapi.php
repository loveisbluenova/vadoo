<?php
session_start();
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
	  include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
    //include 'PHP/visits.php';
include 'PHP/editfortumoapicode.php';
$current1 = 'current';
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
$current15='';
$current16='';
$current17='';
$current18='';			
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
                    Change Fortumo settings
                </h1>
				<?php
				   if ($_SESSION["buzzyadmin_id"]==1){
				?>
			    <?php
                $website_userglobals_query = "SELECT * FROM  buzzyuserglobals WHERE buzzyuserglobal_id=1";				
				foreach ($connread->query($website_userglobals_query) as $row) {
                $buzzyuserpaypal_currency=$row['buzzyuserpaypal_currency'];
				}
                foreach ($connread->query($website_options_query) as $row) {
				$buzzyfortumoid=$row['buzzyfortumoid'];
				$buzzyfortumosecret=$row['buzzyfortumosecret'];	
				$buzzyfortumo_price=$row['buzzyfortumo_price'];
                $fortumo_status=$row['fortumo_status'];	
                if($fortumo_status==0){
				$selectedfor1='selected';
				$selectedfor2='';				
				}
                else if($fortumo_status==1){
				$selectedfor1='';
				$selectedfor2='selected';					
				}				
		        ?>
                <form action="" method="POST">   
				<h3>Fortumo id</h3>
                <input type="text" class="form-control" name="buzzyfortumoid" required value="<?php echo $buzzyfortumoid;?>" data-toggle="tooltip" data-placement="right" title="You type your fortumo id here">	   
				<h3>Fortumo secret</h3>
                <input type="text" class="form-control" name="buzzyfortumosecret" required value="<?php echo $buzzyfortumosecret;?>" data-toggle="tooltip" data-placement="right" title="You type your fortumo secret here">
				<h3>Fortumo neto price </h3>
				<span>(how much you earn aproximately per 100 credits buying in <?php echo $buzzyuserpaypal_currency;?>)</span>
				<div class="clearfix"></div>
				<br>
                <input type="text" class="form-control" name="buzzyfortumo_price" required value="<?php echo $buzzyfortumo_price;?>" data-toggle="tooltip" data-placement="right" title="You type your fortumo secret here">				
 				<h3>Fortumo status</h3>
                <select class="form-control" name="fortumo_status" >
                <option <?php echo $selectedfor1;?> value="0">Test</option>
				<option <?php echo $selectedfor2;?> value="1">Live</option>
                </select>				
				<div class="clearfix"></div>					
				<?php }	?>				
				<br>
					<button type="submit" name="update_fortumo_options" class="btn btn-primary">Submit fortumo api keys</button>
                </form>
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