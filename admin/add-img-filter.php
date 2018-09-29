<?php
session_start();
include 'security/xss-security.php';
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
include '../languages/en.php';
//include 'PHP/visits.php';
include 'PHP/addimgfiltercode.php';
$current1 = '';
$current2 = '';
$current3 = 'current';
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


$website_imgfilter_query = "SELECT * FROM  buzzyimgfilter WHERE buzzyarticle_special=$chosen_buzzytheme_id";  
foreach ($connread->query($website_imgfilter_query) as $row) {
$buzzyimgfilter_bright=$row['buzzyimgfilter_bright'];
$buzzyimgfilter_cont=$row['buzzyimgfilter_cont'];
$buzzyimgfilter_gray=$row['buzzyimgfilter_gray'];
$buzzyimgfilter_hue=$row['buzzyimgfilter_hue'];
$buzzyimgfilter_invert=$row['buzzyimgfilter_invert'];
$buzzyimgfilter_opacity=$row['buzzyimgfilter_opacity'];
$buzzyimgfilter_sat=$row['buzzyimgfilter_sat'];
$buzzyimgfilter_sepia=$row['buzzyimgfilter_sepia'];
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
	<script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../dist/sweetalert.css">	
    <script src="bootstrap/js/angular.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/npm.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="charts/Chart.js"></script>
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
        <li><a href="articles.php" class="active">Articles</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                    Add CSS 3 filter to all images
                </h1>

                <form action="" method="POST">
				<h3>Image brightness</h3>
                    <input type="number" style="width:160px;" step="0.01" value="<?php echo $buzzyimgfilter_bright;?>" min="0" max="2" name="buzzyimgfilter_bright" class="form-control" required
                           placeholder="Image brightness">
				<h3>Image contrast</h3>						   
                    <input type="number" style="width:160px;"   step="0.01" value="<?php echo $buzzyimgfilter_cont;?>" min="0" max="2" name="buzzyimgfilter_cont" class="form-control" required
                           placeholder="Image contrast">
				<h3>Image grayscale</h3>
                    <input type="number"style="width:160px;"  step="0.01" value="<?php echo $buzzyimgfilter_gray;?>" min="0" max="1" name="buzzyimgfilter_gray" class="form-control" required
                           placeholder="Image grayscale">
				<h3>Image hue-rotate</h3>						   
                    <input type="number" style="width:160px;"   step="1" value="<?php echo $buzzyimgfilter_hue;?>" min="0" max="360" name="buzzyimgfilter_hue" class="form-control" required
                           placeholder="Image hue">
				<h3>Image invert</h3>						   
                    <input type="number" style="width:160px;"  step="0.01" value="<?php echo $buzzyimgfilter_invert;?>" min="0" max="1" name="buzzyimgfilter_invert" class="form-control" required
                           placeholder="Image invert">
				<h3>Image opacity</h3>
                    <input type="number" style="width:160px;"   step="0.01" value="<?php echo $buzzyimgfilter_opacity;?>" min="0" max="1" name="buzzyimgfilter_opacity" class="form-control" required
                           placeholder="Image opacity">
				<h3>Image saturation</h3>
                    <input type="number"  style="width:160px;"  step="1" value="<?php echo $buzzyimgfilter_sat;?>" min="0" max="10" name="buzzyimgfilter_sat" class="form-control" required
                           placeholder="Image saturation">	
				<h3>Image sepia</h3>
                    <input type="number" style="width:160px;"   step="0.01" value="<?php echo $buzzyimgfilter_sepia;?>" min="0" max="1" name="buzzyimgfilter_sepia" class="form-control" required
                           placeholder="Image sepia">							   
                    <button type="submit"   name="add_img-filter" class="btn btn-primary">Add filter</button>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<!-- ADMIN WRAPPER ------ END -->
<?php
  include '../HTML/modal-sweet-alerts.html';
?>
</body>
</html>