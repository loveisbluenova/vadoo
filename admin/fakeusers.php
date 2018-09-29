<?php
session_start(); 
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
		  include '../PHP/timezone.php';
    include 'PHP/logincode.php';
    include 'PHP/basic.php';
    //include 'PHP/visits.php';
foreach ($connread->query($website_options_query) as $row) {
$buzzysiteurl=$row['buzzysiteurl'];	
$buzzysitelogo=$row['buzzysitelogo'];
$buzzywebsite_status=$row['buzzywebsite_status'];
$buzzyversion=$row['buzzyversion'];
$buzzyupdatestatus=$row['buzzyupdatestatus'];
}	
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
if($buzzyversion=='1.0.2' AND $buzzywebsite_status==0){
        $add_fakecountry_query = "ALTER TABLE buzzyfakefilter ADD buzzyfakefilter_country INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_fakecountry_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		
}	
$count_fake_filter_query = "SELECT COUNT(*) FROM  buzzyfakefilter";
foreach ($connread->query($count_fake_filter_query) as $row) {
$count_ffilter=$row['COUNT(*)'];	
}
$fake_filter_query = "SELECT * FROM  buzzyfakefilter";
foreach ($connread->query($fake_filter_query) as $row) {
$buzzyfakefilter_gender=$row['buzzyfakefilter_gender'];
if($buzzyfakefilter_gender==0){
$selectedfak1='selected';
$selectedfak2='';
$selectedfak3='';
}
else if($buzzyfakefilter_gender==1){
$selectedfak1='';
$selectedfak2='selected';
$selectedfak3='';
}
else{
$selectedfak1='';
$selectedfak2='';
$selectedfak3='selected';
}


$buzzyfakefilter_country=$row['buzzyfakefilter_country'];
if($buzzyfakefilter_country==0){
$selectedfacn1='selected';
$selectedfacn2='';
}
else if($buzzyfakefilter_country==1){
$selectedfacn1='';
$selectedfacn2='selected';
}



$buzzyfakefilter_agemin=$row['buzzyfakefilter_agemin'];	
$buzzyfakefilter_agemax=$row['buzzyfakefilter_agemax']; 
}

if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['addfakefilter'])) {
 if (isset($_POST['buzzyfakefilter_country'])) {	
 $buzzyfakefilter_country=$_POST['buzzyfakefilter_country'];
 } 
 else{
 $buzzyfakefilter_country=0;	 
 }
 $buzzyfakefilter_gender=$_POST['buzzyfakefilter_gender'];
 $buzzyfakefilter_agemin=$_POST['buzzyfakefilter_agemin'];		
 $buzzyfakefilter_agemax=$_POST['buzzyfakefilter_agemax'];	
        $OK = false;
        // create database connection
        // initialize prepared statement
        // create SQL
		if($count_ffilter==0){
        $add_fakefilter_query = "INSERT INTO  buzzyfakefilter(buzzyfakefilter_id,buzzyfakefilter_gender,buzzyfakefilter_agemin,buzzyfakefilter_agemax,buzzyfakefilter_country)
		 	  VALUES(1,:buzzyfakefilter_gender,:buzzyfakefilter_agemin,:buzzyfakefilter_agemax,:buzzyfakefilter_country)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_fakefilter_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyfakefilter_gender', $buzzyfakefilter_gender, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyfakefilter_agemin', $buzzyfakefilter_agemin, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyfakefilter_agemax', $buzzyfakefilter_agemax, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyfakefilter_country', $buzzyfakefilter_country, PDO::PARAM_STR);		
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        if ($OK != 0) {
	    header('Location:fakeusersimport.php');
        } 
		else if ($OK == 0) {
        header('Location: fakeusersimport.php');
        }
		}	
		if($count_ffilter!=0){
       $OK = false;
        $update_ffilter_query = "UPDATE buzzyfakefilter SET buzzyfakefilter_gender=:buzzyfakefilter_gender,buzzyfakefilter_agemin=:buzzyfakefilter_agemin,buzzyfakefilter_agemax=:buzzyfakefilter_agemax,
		buzzyfakefilter_country=:buzzyfakefilter_country
		WHERE buzzyfakefilter_id=1";
        $stmt = $connwrite->prepare($update_ffilter_query);
        $stmt->bindParam(':buzzyfakefilter_gender', $buzzyfakefilter_gender, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyfakefilter_agemin', $buzzyfakefilter_agemin, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyfakefilter_agemax', $buzzyfakefilter_agemax, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyfakefilter_country', $buzzyfakefilter_country, PDO::PARAM_STR);			
        $stmt->execute();
        $OK = $stmt->rowCount();
        if ($OK != 0) {
	    header('Location:fakeusersimport.php');
        } 
		else if ($OK == 0) {
        header('Location: fakeusersimport.php');
        }
		}		
		
    }
}

if ($_SESSION["buzzyadmin_id"]==2){ 
if (isset($_POST['addfakefilter'])) {	
	    header('Location: fakeusers.php?onlydemo=true');
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
    <script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../dist/sweetalert.css">			
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
   Generate fake users (Up to 100)
  </h1>
  <form action="" method="POST">
    <h3>Choose gender for users</h3>
  <select class="form-control" name="buzzyfakefilter_gender" required>
    <option <?php echo $selectedfak1;?> value="0">
	Male
	</option>
    <option  <?php echo $selectedfak2;?> value="1">
	Female
    </option>
    <option <?php echo $selectedfak3;?> value="2">
	Both
    </option>	
	</select>	
  <h3>Choose age span for users</h3>
        <div class="nstSlider" data-range_min="18" data-range_max="80" 
           data-cur_min="<?php echo $buzzyfakefilter_agemin;?>"    data-cur_max="<?php echo $buzzyfakefilter_agemax;?>">
          <div class="bar">
	      </div>    
	      <span  class="leftGrip"></span>
          <span  class="rightGrip"></span>	
       </div>
	   <div style="width:200px!important; margin-top:10px;">
<span style="float:left!important; font-size:13px!important; font-weight:bold;" name="" class="leftLabel" ></span>
<span style="float:right!important; font-size:13px!important; font-weight:bold;" name="" class="rightLabel" ></span>
<input type="hidden" value="" class="leftLabel" name="buzzyfakefilter_agemin" />
<input type="hidden"  value="" class="rightLabel" name="buzzyfakefilter_agemax"/>
 </div>
        <script type="text/javascript">
$('.nstSlider').nstSlider({
    "crossable_handles": false,
    "left_grip_selector": ".leftGrip",
    "right_grip_selector": ".rightGrip",
    "value_bar_selector": ".bar",
    "value_changed_callback": function(cause, leftValue, rightValue) {
        $(this).parent().find('.leftLabel').text(leftValue);
        $(this).parent().find('.rightLabel').text(rightValue);
        $(this).parent().find('.leftLabel').val(leftValue);
        $(this).parent().find('.rightLabel').val(rightValue);	
    }
}); 
        </script>
	<div class="clearfix"></div>	
		<button type="submit" name="addfakefilter" class="btn btn-primary" >Submit</button>
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
	<?php
    include '../HTML/modal-sweet-alerts.html';
    ?>	
	</body>
</html>