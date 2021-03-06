<?php
session_start();
include '../includes/connection.inc.php';
$buzzypaidservice_id=$_GET['service-id'];
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
	include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
    //include 'PHP/visits.php';
include 'PHP/editapicode.php';	
include 'PHP/editservicecode.php';
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
$current13='current';
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
    <script src="bootstrap/js/angular.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/npm.js"></script>
    <script src="charts/Chart.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
	<?php
	if (isset($_GET["error"])) {
	if ($_GET["error"]=='errorupload'){
	?>
    <script>
    alert("There is already url with this name. Please choose another one.");
    </script>
    <?php } ?>
    <?php } ?>
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
        <li><a href="paid-services.php" class="active">Services</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                   Edit paid (premium) service
                </h1>
				<?php
          $this_service_query = "SELECT * FROM  buzzypaidservices  WHERE buzzypaidservice_id=$buzzypaidservice_id";
           foreach ($connread->query($this_service_query) as $row) {
  $buzzypaidservice_title=$row['buzzypaidservice_title'];
  $buzzypaidservice_price=$row['buzzypaidservice_price'];				
				?>
                <form action="" method="POST">
				<h3>Service title</h3>
                <input type="text" name="buzzypaidservice_title" disabled class="form-control" required value="<?php echo $buzzypaidservice_title;?>" data-toggle="tooltip" data-placement="right" title="Update your Gift title here">
 				<h3>Service price (credits)</h3>
                <input type="number" name="buzzypaidservice_price" min="0" max="10000" value="<?php echo $buzzypaidservice_price;?>"  class="form-control" required placeholder="0" data-toggle="tooltip" data-placement="right" title="Update your Gift price here">                   
                    <button type="submit" name="update_service" class="btn btn-primary">Update service</button>
                </form>
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
<script src="js/classie.js"></script>
<script src="js/AnimOnScroll.js"></script>
<script>
    new AnimOnScroll(document.getElementById('grid'), {
        minDuration: 0.4,
        maxDuration: 0.7,
        viewportFactor: 0.2
    });
</script>
<!-- ADMIN WRAPPER ------ END -->
</body>
</html>