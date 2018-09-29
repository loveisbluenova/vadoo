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
        $current9='current';
        $current10='';
$current11='';
$current12='';
$current13='';
$current14='';
$current15='';
$current16='';
$current17='';
$current18='';	
$fake_filter_query = "SELECT * FROM  buzzyfakefilter";
foreach ($connread->query($fake_filter_query) as $row) {
$buzzyfakefilter_gender=$row['buzzyfakefilter_gender'];
if($buzzyfakefilter_gender!=2){
$pre_text='buzzyfakeuser_genre=';
$final_buzzyfakefilter_gender=$buzzyfakefilter_gender;
$front_text=' AND';
}
else{
$pre_text='';	
$final_buzzyfakefilter_gender='';	
$front_text='';
}
$total_filter_text=$pre_text . $final_buzzyfakefilter_gender . $front_text;
$buzzyfakefilter_agemin=$row['buzzyfakefilter_agemin'];	
$buzzyfakefilter_agemax=$row['buzzyfakefilter_agemax']; 
$buzzyfakefilter_country=$row['buzzyfakefilter_country'];
}

if($buzzyfakefilter_country==0){
$import_link='fakeusersimportcode.php';	
$count_fake_users_query = "SELECT COUNT(*) FROM  buzzyfakeusers WHERE $total_filter_text  buzzyfakeuser_age<=$buzzyfakefilter_agemax AND buzzyfakeuser_age>=$buzzyfakefilter_agemin AND buzzyfakeuser_insertedstatus=0";
}
else if($buzzyfakefilter_country==1){	
$import_link='fakeusersusaimportcode.php';	 
$count_fake_users_query = "SELECT COUNT(*) FROM  buzzyfakeusersusa WHERE $total_filter_text  buzzyfakeuserusa_age<=$buzzyfakefilter_agemax AND buzzyfakeuserusa_age>=$buzzyfakefilter_agemin AND buzzyfakeuserusa_insertedstatus=0";
}
foreach ($connread->query($count_fake_users_query) as $row) {
$count_fake=$row['COUNT(*)'];	
}	

if($buzzyfakefilter_country==0){
$all_fake_users_query = "SELECT * FROM  buzzyfakeusers WHERE $total_filter_text buzzyfakeuser_age<=$buzzyfakefilter_agemax AND buzzyfakeuser_age>=$buzzyfakefilter_agemin AND buzzyfakeuser_insertedstatus=0";
foreach ($connread->query($all_fake_users_query) as $row) {
$buzzyfakeuser_id=$row['buzzyfakeuser_id'];	
$buzzyfakeuser_firstname=$row['buzzyfakeuser_firstname'];	
$buzzyfakeuser_lastname=$row['buzzyfakeuser_lastname'];	
$buzzyfakeuser_image=$row['buzzyfakeuser_image'];
$buzzyfakeuser_email=$row['buzzyfakeuser_email'];
$buzzyfakeuser_birthdate=$row['buzzyfakeuser_birthdate'];
$buzzyfakeuser_age=$row['buzzyfakeuser_age'];
$buzzyfakeuser_location=$row['buzzyfakeuser_location'];
$buzzyfakeuser_genre=$row['buzzyfakeuser_genre'];
}
}
else if($buzzyfakefilter_country==1){
$all_fake_users_query = "SELECT * FROM  buzzyfakeusersusa WHERE $total_filter_text buzzyfakeuserusa_age<=$buzzyfakefilter_agemax AND buzzyfakeuserusa_age>=$buzzyfakefilter_agemin AND buzzyfakeuserusa_insertedstatus=0";
foreach ($connread->query($all_fake_users_query) as $row) {
$buzzyfakeuser_id=$row['buzzyfakeuserusa_id'];	
$buzzyfakeuser_firstname=$row['buzzyfakeuserusa_firstname'];	
$buzzyfakeuser_lastname=$row['buzzyfakeuserusa_lastname'];	
$buzzyfakeuser_image=$row['buzzyfakeuserusa_image'];
$buzzyfakeuser_email=$row['buzzyfakeuserusa_email'];
$buzzyfakeuser_birthdate=$row['buzzyfakeuserusa_birthdate'];
$buzzyfakeuser_age=$row['buzzyfakeuserusa_age'];
$buzzyfakeuser_location=$row['buzzyfakeuserusa_location'];
$buzzyfakeuser_genre=$row['buzzyfakeuser_genre'];
}
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
    <link rel="stylesheet" type="text/css" href="../css/jquery.nstSlider.css"/>			
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="../js/jquery.nstSlider.js"></script>   		
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
	  <style>
.nstSlider{
background:#cccccc!important;
height:5px!important;
width:200px!important;
}
.bar{
background:none!important;
}
.leftGrip{
background:#fff!important;
margin-top:-5px!important;
height:15px!important;
width:15px!important;
border:4px solid #<?php echo $buzzycss_color_css;?>!important;
}
.rightGrip{
background:#fff!important;
margin-top:-5px!important;
height:15px!important;
width:15px!important;
border:4px solid #<?php echo $buzzycss_color_css;?>!important;
}	  
	  </style>
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
 <div class="clearfix"></div>
 </div>
 <div class="content">
 <div class="content-empty">
   <h1>
   Import your fake users
   </h1>
<div class="alert alert-success">
 You have selected <?php echo $count_fake;?> users from fake users database.
</div>
		<div class="clearfix"></div>
		<form action="<?php echo $import_link;?>" method="POST">
		<input type="password" class="form-control" name="buzzyfakeuser_password" required placeholder="Add password for your fake users" data-toggle="tooltip" data-placement="right" title="Add password for your fake users">	 
		<button type="submit" name="importfilter" class="btn btn-primary" >Import fake users</button>
        </form>
		</div>
  <br>
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
</html>