<?php
session_start();
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
    //include 'PHP/visits.php';
include 'PHP/editchatlimitcode.php';
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
$current15='';
$current16='';
$current17='';
$current18='';
$current19='current';

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
        <li><a href="usphotos.php" class="active">User photos (waiting for approval)</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                    User photos for approval
				</h1>
   <?php
  $basic_countusimg_query = "SELECT COUNT(*)  as count_usimg FROM buzzyuserimages WHERE  buzzyuserimage_approval=1";
  foreach ($connread->query($basic_countusimg_query) as $row) {
  $count_usimg=$row['count_usimg'];
	}
	?>		
	<?php	
	if ($count_usimg==0){
	?>	
			<br>	
			<div class="alert alert-info">
               There is no any images for review! All user images are approved.
             </div>
			<br>
	<?php } ?>		

		<?php
                  $all_images_query="SELECT * FROM buzzyuserimages WHERE  buzzyuserimage_approval=1 ORDER by buzzyuserimage_id DESC";
  foreach ($connread->query($all_images_query) as $row) { 
  $buzzyuserimage_id=$row['buzzyuserimage_id'];  
  $buzzyuserimage=$row['buzzyuserimage'];
  $buzzyuserimage_privatestatus=$row['buzzyuserimage_privatestatus'];
if (strpos($buzzyuserimage,'facebook') !== false) {
			$final_image_prefix='';		  
		    }
			else if (strpos($buzzyuserimage,'http') !== false) {
			$final_image_prefix='';		  
		    }			
			else if (strpos($buzzyuserimage,'fbcdn') !== false) {
			$final_image_prefix='';		  
		    }
		    else if (strpos($buzzyuserimage,'http://brankomatovic.net/safetoupload/') !== false) {
			$final_image_prefix='';		  
		    }			
			else {
			$final_image_prefix='../img/';					
			}
			$buzzyuser_id=$row['buzzyuser_id'];
			
			$image_users_query = "SELECT * FROM buzzyusers WHERE buzzyuser_id=$buzzyuser_id";
           foreach ($connread->query($image_users_query) as $row) { 
		   $buzzyuser_username=$row['buzzyuser_username'];
		 ?>
		 <div class="one-eight-column" style="margin-bottom:30px!important;">
		 <img class="thumbnail" style="width:120px!important; height:120px!important;"  src="<?php echo $final_image_prefix;?><?php echo $buzzyuserimage;?>" alt="" />
		 <span style="font-weight:700; color:#4b90e5!important;">By <?php echo $buzzyuser_username;?></span>
		 <br><br>
		 <a href="approve-photo.php?photo-id=<?php echo $buzzyuserimage_id;?>" style="font-size:11px!important; font-weight:700; margin-right:8px!important; padding-left:5px!important; padding-right:5px!important; padding-top:5px!important; padding-bottom:5px!important;" class="btn btn-success btn-small">Aprove!</a>
		 <a href="delete-photo.php?photo-id=<?php echo $buzzyuserimage_id;?>" style="font-size:11px!important; font-weight:700; margin-right:8px!important; padding-left:5px!important; padding-right:5px!important; padding-top:5px!important; padding-bottom:5px!important;" class="btn btn-danger btn-small">Delete!</a>		 
         </div>
		 
  <?php } ?>
  <?php } ?>
  <div class="clearfix"></div>
   <br>
  </div>
        </div>
    </div>
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