<?php
session_start();
include 'security/xss-security.php';
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
include 'PHP/editwebsitecssfontcode.php';
$current1 = '';
$current2 = '';
$current3 = '';
$current4='';
$current5='current';
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
	<script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../dist/sweetalert.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="bootstrap/js/angular.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/npm.js"></script>
	<script src="js/jscolor.min.js"></script>
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
        <li><a href="css-options.php" class="active">CSS 3 options</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
<div class="content-empty">
 <div class="clearfix"></div>
 </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                    Change font size 
                </h1>
				                <form action="#" method="POST"> 
<?php
$website_css_options_query = "SELECT * FROM  buzzycss WHERE buzzycss_id=$chosen_buzzytheme_id";	
foreach ($connread->query($website_css_options_query) as $row) {
$buzzycsspsize=substr($row['buzzycsspsize'], 0, -2);	
$buzzycssh1size=substr($row['buzzycssh1size'], 0, -2);
$buzzycssh2size=substr($row['buzzycssh2size'], 0, -2);
$buzzycssh3size=substr($row['buzzycssh3size'], 0, -2);
$buzzycssh4size=substr($row['buzzycssh4size'], 0, -2);
$buzzycssh5size=substr($row['buzzycssh5size'], 0, -2);
$buzzycssh6size=substr($row['buzzycssh6size'], 0, -2);
?>
    <h3>H1 font size</h3>		
	<input  type="number" class="form-control" min="8" max="72" name="buzzycssh1size" value="<?php echo $buzzycssh1size;?>">
			<h3>H2 font size</h3>		
	<input  type="number" class="form-control" min="8" max="72" name="buzzycssh2size" value="<?php echo $buzzycssh2size;?>">
			<h3>H3 font size</h3>		
	<input  type="number" class="form-control" min="8" max="72" name="buzzycssh3size" value="<?php echo $buzzycssh3size;?>">
			<h3>H4 font size</h3>		
	<input  type="number" class="form-control" min="8" max="72" name="buzzycssh4size" value="<?php echo $buzzycssh4size;?>">	
			<h3>H5 font size</h3>		
	<input  type="number" class="form-control" min="8" max="72" name="buzzycssh5size" value="<?php echo $buzzycssh5size;?>">	
			<h3>H6 font size</h3>		
	<input  type="number" class="form-control" min="8" max="72" name="buzzycssh6size" value="<?php echo $buzzycssh6size;?>">	
			<h3>P font size</h3>		
	<input  type="number" class="form-control" min="8" max="72" name="buzzycsspsize" value="<?php echo $buzzycsspsize;?>">		
<?php } ?>	
				<button type="submit" name="update_cssfont_options" class="btn btn-primary">Submit CSS 3 team options</button>
                </form>
                <br><br>
            </div>
        </div>
    </div>
	<div class="clearfix"></div>
<br>
	</div>

<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<!-- ADMIN WRAPPER ------ END -->
<?php
  include '../HTML/modal-sweet-alerts.html';
?>
</body>
</html>