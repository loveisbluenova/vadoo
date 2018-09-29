<?php
session_start();
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
	include '../PHP/timezone.php';
    include 'PHP/logincode.php';
    include 'PHP/basic.php';
include 'PHP/addregimgcode.php';	
    //include 'PHP/visits.php';
	$current1='';
	$current2='';
        $current3='';
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
	/*
Pure Uploader PHP Handler v1.0
Author : tQera
*Tested on Windows with PHP 5.2.7*
*/
if ($_SESSION["buzzyadmin_id"]==2){
	  	header('Location: index.php?onlydemo=true');	
}	
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		
		<title>Buzzybuz - Admin panel for controlling website</title>
		<meta name="description" content="Loading Effects for Grid Items with CSS Animations" />
		<meta name="keywords" content="css animation, loading effect, google plus, grid items, masonry" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
				<link rel="stylesheet" type="text/css" href="css/admin.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
		<link href="bootstrap/css/tQera.Uploader.Bootstrap.css" rel="stylesheet" />
		<link href="bootstrap/css/app.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<script src="charts/Chart.js"></script>
		<script src="ckeditor/ckeditor.js"></script>
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
             <li><a href="css-options.php" class="active">Css options</a></li>
         </ol>
    <!-- Breadcrumbs for admin panel ------ END -->	
  <div class="content-empty">
 <div class="clearfix"></div>
 </div>
 <div class="content">
	<div id="sample">
  <div class="content-empty">
   <h1>
   Add background image (for register page)
  </h1>
	<br>
    <form method="post" id="dropper" enctype="multipart/form-data" action="">
       <input required type="file" accept='image/x-png, image/jpeg' name="userfile" />	
        <br>	   
       <button type="submit" name="add_regimg"  class="btn btn-primary buttontr">Add background image</button>
     </form>	 
     <div class="clearfix"></div>
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
		<script src="admin/js/classie.js"></script>
		<!-- ADMIN WRAPPER ------ END -->
	</body>
</html>