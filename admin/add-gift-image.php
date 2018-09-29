<?php
session_start();
    $gift_id=$_GET['gift-id'];    
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
	include '../PHP/timezone.php';
    include 'PHP/logincode.php';
    include 'PHP/basic.php';
    //include 'PHP/visits.php';
	$current1='';
	$current2='current';
        $current3='';
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
	/*
Pure Uploader PHP Handler v1.0
Author : tQera
*Tested on Windows with PHP 5.2.7*
*/

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
             <li><a href="vadoogifts.php" class="active">Gifts</a></li>
         </ol>
    <!-- Breadcrumbs for admin panel ------ END -->	
  <div class="content-empty">
 <div class="clearfix"></div>
 </div>
 <div class="content">
	<div id="sample">
  <div class="content-empty">
   <h1>
   Add gift image
  </h1>

   <div class="">
   <form class="row-fluid" id="dropper">
        <div class="text-center">
            <input id="fileInput" name="fileInput"  accept="image/x-png, image/gif, image/jpeg"  type="file" class="btn btn-file hide" multiple />
        </div>
        <div style="padding-bottom: 20px">
        </div>
        <div class="row-fluid text-center" data-toggle="tooltip" data-placement="top" title="Drop your  image here!">
            <div class="span12 drop-zone" id="dropPlace">
            </div>
        </div>
		<br>
		<button type="submit" name="upload_image" class="btn btn-primary"><i class="icon-white icon-arrow-up"></i>Start Upload</button>
        <div class="row-fluid images" id="imageHolder">
        </div>
    </form>
	</div>	
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="bootstrap/js/tQera.Image.Uploader.js"></script>
	<?php
	if ($_SESSION["buzzyadmin_id"]==1){ 
	?>
    <script>
        var d = new tQEraUploader(
{
    drop: true,
    imageHolder: document.getElementById("imageHolder"),
    dragHoverClass: "drop_hover",
    image_thumb_width: 128,
    image_thumb_height:128,
    dropPlace: document.getElementById("dropPlace"),
    form: document.getElementById("dropper"),
    fileInput: document.getElementById("fileInput"),
    file_closebutton_class: "btn btn-danger close",
    file_class: "list-i",
    file_filter: "",
    image_thumb: false,
	icon_path: "bootstrap/FileIcons/",
			icon_default: "bootstrap/FileIcons/image.png",
    limit: 0,
    ajax: {
        url: 'PHP/addgiftimgcode.php?gift-id=<?php echo $gift_id; ?>',
        clearAfterUpload: true
    },
    watermark: {
        text: ""
    },
       html5Error:
        function (uploader) {

            uploader.settings.imageHolder.style.display = "none";
            //document.getElementById("dropper").removeChild(imageholder);

            uploader.settings.dropPlace.style.display = "none";
            var error = document.createElement("div");
            error.className = "alert alert-danger";
            error.appendChild(document.createTextNode("Unfortunately, you browser doesn't support HTML 5!"));
            uploader.settings.form.appendChild(error);
        },
    progress:
                 function (data) {
                     var template = document.getElementById(data.template);
                     console.log(data.template);
                     if (template) {
                         var progress = document.getElementById("progress_" + data.template);

                         if (progress) {
                             progress.style.width = data.percent + "%";
                         }
                         else {
                             var div = document.createElement("div");
                             div.className = "progress progress-striped active";

                             progress = document.createElement("div");
                             progress.id = "progress_" + data.template;
                             progress.className = "bar";
                             progress.style.width = data.percent + "%";
                             div.appendChild(progress);

                             template.appendChild(div);
                         }
                     }

                 },
    success:
        function (event) {
            console.log("Its uploaded ");
			window.location.href = 'vadoogifts.php';
        }
});
    </script>
	<?php } ?>
 <br>
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