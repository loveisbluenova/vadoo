<?php
session_start();
    include 'security/xss-security.php';
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
		  include '../PHP/timezone.php';
    include 'PHP/logincode.php';
    include 'PHP/basic.php';
	include 'PHP/addrssfeedcode.php';
    //include 'PHP/visits.php';
	$current1='';
	$current2='';
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
        $current18='current';				
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
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
       <script src="../dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="../dist/sweetalert.css">			
		<script src="bootstrap/js/angular.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<script src="bootstrap/js/npm.js"></script>
		<!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css"> 
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>
		 <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
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
             <li><a href="#" class="active">Products</a></li>
         </ol>
    <!-- Breadcrumbs for admin panel ------ END -->	
  <div class="content-empty">
	<a href="add-fbpage.php" class="btn btn-primary">Add facebook page</a>
	<a href="delete-unaproved-pages.php"  class="btn btn-primary">Delete unaproved pages</a>
    <a href="unfeatured-all-pages.php"  class="btn btn-primary">Unfeature all pages</a>
	<div class="clearfix"></div>
 </div>
 <div class="content">
	<div class="table-responsive">
  <table class="table" id="table_id" class="display">
  <thead>
  <tr>
    <th>Facebook page id</th>
    <th>Facebook page title</th>
	<th>Facebook page image</th>
	<th>Facebook page thumbnail</th>	
	<th>Creation date</th>
	<th>Category name</th>
	<th>Feature this</th>
	<th>Facebook status</th>
	<th></th>
	<th></th>	
  </tr>
  </thead>
    <tbody>
  <?php
 foreach ($connread->query($all_fb_query ) as $row) {
  $buzzynews_id=$row['buzzynews_id'];
  $buzzynews_title=$row['buzzynews_title'];
  $buzzynews_image=$row['buzzynews_image'];
  $buzzynews_timage=$row['buzzynews_timage'];
  $buzzynews_text=$row['buzzynews_text'];
  $short_buzzynews_text = substr($buzzynews_text, 0, 100);
  $buzzynews_datetime=$row['buzzynews_datetime'];
  $buzzynewscategory_id=$row['buzzynewscategory_id'];
  $buzzynews_likes=$row['buzzynews_likes'];
  $buzzynews_unlikes=$row['buzzynews_unlikes'];
  $buzzynews_views=$row['buzzynews_views'];
  $buzzynews_comments=$row['buzzynews_comments'];
  $buzzynews_visitors=$row['buzzynews_visitors'];
  $buzzynews_source_name=$row['buzzynews_source_name'];	
  $buzzynews_source_url=$row['buzzynews_source_url'];
  $buzzynews_approval_status=$row['buzzynews_approval_status'];
  $buzzynews_feature_status=$row['buzzynews_feature_status']; 
  if($buzzynews_feature_status!='featured'){
  $feature_class='nofeature';
  }
  else if ($buzzynews_feature_status=='featured'){
  $feature_class='';
  }
  if($buzzynews_image!=''){
  $final_buzzynews_image=$buzzynews_image;
  }
  else {
  $final_buzzynews_image='../img/addimage.jpg';
  }
  if (substr($final_buzzynews_image, 0, 7) == 'https://' OR substr($final_buzzynews_image, 0, 8) == 'https://') {
  $image_prefix='';
  }
  else  if (substr($final_buzzynews_image, 0, 7) != 'https://') {
  $image_prefix='../img/';
  }
  
    if($buzzynews_timage!=''){
  $final_buzzynews_timage=$buzzynews_timage;
    $timage_prefix='../img/';
  }
  else {
  $final_buzzynews_timage='../img/addimage.jpg';
    $timage_prefix='';
  }

 
  
  
  if($buzzynews_approval_status=='0'){
  $approvaltext="<a href='approvenews.php?news-id=$buzzynews_id'  data-toggle='tooltip' data-placement='top' title='Aprove news and publish it!'>Aprove!</a>";
  }
  else if($buzzynews_approval_status=='1'){
  $approvaltext="<span class='success'>Approved</span>";
  }


  
  $this_category_query = "SELECT buzzynewscategory_id,buzzynewscategory FROM  buzzynewscategories WHERE buzzynewscategory_id=$buzzynewscategory_id";
  foreach ($connread->query($this_category_query) as $row) {
  $buzzynewscategory=$row['buzzynewscategory'];
  ?>
  <tr>
    <td><?php echo $buzzynews_id;?></td>
    <td><?php echo $buzzynews_title;?></td>
	<td>
	<a href="add-news-image.php?news-id=<?php echo $buzzynews_id;?>" data-toggle="tooltip" data-placement="right" title="Upload news image here"><img src="<?php echo $image_prefix;?><?php echo $final_buzzynews_image;?>"
	class="img-thumbnail small-img" alt="<?php echo $buzzynews_title;?>"/></a>
	</td>
	<td>
	<a href="add-news-thumbnail.php?news-id=<?php echo $buzzynews_id;?>" data-toggle="tooltip" data-placement="right" title="Upload news thumbnail here"><img src="<?php echo $timage_prefix;?><?php echo $final_buzzynews_timage;?>"
	class="img-thumbnail small-img" alt="<?php echo $buzzynews_title;?>"/></a>
	</td>	
	<td style="width:100px;"><?php echo $buzzynews_datetime;?></td>
	<td><?php echo $buzzynewscategory;?></td>
	<td><a href="featurefb.php?news-id=<?php echo $buzzynews_id;?>"><img src="img/star.png" class="<?php echo $feature_class;?>"></a></td>
	<td><span class="success"><?php echo $approvaltext;?></span></td>
	<td><a href="edit-fbpage.php?fb-id=<?php echo $buzzynews_id;?>" data-toggle="tooltip" data-placement="left" title="Edit facebook page"><span class="glyphicon glyphicon-pencil"></span></a></td>
	<td><a href="delete-fbpage.php?fb-id=<?php echo $buzzynews_id;?>" data-toggle="tooltip" data-placement="left" title="Delete facebook page"><span class="glyphicon glyphicon-trash"></span></a></td>
   </tr>
  <?php } ?>
  <?php } ?>
   </tbody>
  </table>
  <script>
  $(document).ready( function () {
    $('#table_id').DataTable();
} );
  </script>
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