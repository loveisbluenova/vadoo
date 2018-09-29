<?php
session_start(); 
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
		  include '../PHP/timezone.php';
    include 'PHP/logincode.php';
    include 'PHP/basic.php';
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
		<script src="charts/Chart.js"></script>
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
             <li><a href="#" class="active">Users</a></li>
         </ol>	 
    <!-- Breadcrumbs for admin panel ------ END -->	
  <div class="content-empty">
    <a href="add-interest-category.php" class="btn btn-primary">Add new category</a>
    <div class="clearfix"></div>
 </div>	
 <div class="content">
	<div class="table-responsive">
  <table class="table" id="table_id" class="display">
  <thead>
  <tr>
    <th>Interest category id</th>
    <th>Interest category</th>
	<th>Interest category icon</th>
	<th>Manage category</th>
	<th>Delete category</th>
  </tr>
  </thead>
    <tbody>
  <?php
  $all_userintcat_query = "SELECT * FROM buzzyuser_interest_categories ORDER by buzzyuser_interest_category_id ASC"; 
  foreach ($connread->query($all_userintcat_query) as $row) {
  $buzzyuser_interest_category_id=$row['buzzyuser_interest_category_id'];
  $buzzyuser_interest_category=$row['buzzyuser_interest_category'];
  $buzzyuser_interest_category_icon=$row['buzzyuser_interest_category_icon'];
  ?>
  <tr>
    <td><?php echo $buzzyuser_interest_category_id;?></td>
    <td><?php echo $buzzyuser_interest_category;?></td>
	<td><?php echo $buzzyuser_interest_category_icon;?></td>
	<td><a href="manage-intcat.php?cat-id=<?php echo $buzzyuser_interest_category_id;?>"  data-toggle="tooltip" data-placement="left" title="Manage user"><span class="glyphicon glyphicon-pencil"></span></a></td>
	<td><a href="delete-intcat.php?cat-id=<?php echo $buzzyuser_interest_category_id;?>" data-toggle="tooltip" data-placement="left" title="Delete user"><span class="glyphicon glyphicon-trash"></span></a></td>
   </tr>
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
	</body>
	<?php
  include '../HTML/modal-sweet-alerts.html';
?>
</html>