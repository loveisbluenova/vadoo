<?php
session_start();
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
	  include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
    //include 'PHP/visits.php';
include 'PHP/editwebsitecode.php';
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
$current11='current';
$current12='';
$current13='';
$current14='';
$current15='';
$current16='';
$current17='';	
$current18='';

if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['choose_theme'])) {
 $OK = false;
        $update_theme_query = "UPDATE buzzychosenthemes SET buzzytheme_id=:buzzytheme_id WHERE buzzychosentheme_id=1";
        $stmt = $connwrite->prepare($update_theme_query);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzytheme_id', $_POST['buzzytheme_id'], PDO::PARAM_STR);
        $stmt->execute();
        $OK = $stmt->rowCount();
        header('Location:website-templates.php');		
}
}

	  if ($_SESSION["buzzyadmin_id"]==2){ 
      if (isset($_POST['choose_theme'])) {
	    header('Location:website-templates.php?onlydemo=true');	   
      }
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                   Dashboard
                </h1>
                <br>
	 <div class="one-quarter-column left">
			   <div class="dashfour bluedash ">	
			   <div class="half-column">
			   <h2>
	<?php
    foreach ($connread->query($count_users_query) as $row) {
	$count_users=$row['count_users'];
	echo $count_users;
	}
	?>
			   <br>
			   <span style="font-size:14px;">Total users</span>
			   </h2>
			   </div>
			   <div class="half-column">
               <span class="glyphicon glyphicon-user dashicon"></span>	               
			   </div>			   
			   </div>
			   </div>		
			   
 
 <div class="one-quarter-column left">
			   <div class="dashfour violetdash marginonefixone">	
			   <div class="half-column">
			   <h2>
	<?php
    foreach ($connread->query($count_today_users_query) as $row) {
	$count_today_users=$row['count_today_users'];
	echo $count_today_users;
	}
	?>
			   <br>
			   <span style="font-size:14px;"> Registration today</span>
			   </h2>
			   </div>
			   <div class="half-column">
               <span class="glyphicon glyphicon-user dashicon"></span>	               
			   </div>			   
			   </div>
			   </div>
 
			   
			    <div class="one-quarter-column left">
               <div class="dashfour orangedash margintwofixone">	
               <div class="half-column">			   
               <h2>
	<?php
    foreach ($connread->query($count_onusers_query) as $row) {
	$count_onusers=$row['count_onusers'];
	echo $count_onusers;
	}
	?>
	<br>
				   <span style="font-size:14px;"> Online users</span>
			   </h2>
			   </div>
			   <div class="half-column">			   
               <span class="glyphicon glyphicon-user dashicon"></span>		   
			
			   </div>
			   </div>			   
			   </div>
			   
        <div class="one-quarter-column left">
               <div class="dashfour greendash marginthreefixone">	
               <div class="half-column">			   
               <h2>
	<?php
    foreach ($connread->query($count_allimages_query) as $row) {
	$count_allimages=$row['count_allimages'];
	echo $count_allimages;
	}
	?>
	<br>
	<span style="font-size:14px;"> Total images</span>
			   </h2>
			   </div>
			   <div class="half-column">			   
               <span class="glyphicon glyphicon-camera dashicon"></span>		   
			
			   </div>
			   </div>			   
			   </div>				   			                		              		   
				<div class="clearfix"></div>				
		   <div class="half-column">
  	       <div class="dashhalf yellowtop"> 
				<h5>Recently registered users</h5>
				<hr>
				<?php
				foreach ($connread->query($recently_users_query) as $row) {
	           if ($row['buzzyuser_image']==''){
		       $buzzyuser_image='profile-icon.jpg';		  
		       }
		       else if ($row['buzzyuser_image']!=''){
		      $buzzyuser_image=$row['buzzyuser_image'];
		       }			
	  if($buzzyuser_image!=''){
  $final_buzzyuser_image=$buzzyuser_image;
  }
  else {
  $final_buzzyuser_image='profile-icon.jpg';
  }
  
  if (substr($final_buzzyuser_image, 0, 7) == 'http://' OR substr($final_buzzyuser_image, 0, 8) == 'https://') {
  $image_prefix='';
  }
  else  if (substr($final_buzzyuser_image, 0, 7) != 'http://') {
  $image_prefix='../img/';
  }
				$buzzyuser_first_name=$row['buzzyuser_first_name'];
				$buzzyuser_last_name=$row['buzzyuser_last_name'];				
				$buzzyuser_username=$row['buzzyuser_username'];
				$buzzyuser_registration_timestamp=$row['buzzyuser_registration_timestamp'];
                $buzzyuser_location=$row['buzzyuser_location'];		

				$buzzyuser_difference=$now-$buzzyuser_registration_timestamp;
				if ($buzzyuser_difference>=86400){
				$final_buzzyuser_difference=round($buzzyuser_difference/86400);	
                $date_measure='days';				
				}
				else if ($buzzyuser_difference<86400 AND $buzzyuser_difference>=3600){
				$final_buzzyuser_difference=round($buzzyuser_difference/3600);	
                $date_measure='hours';				
				}	
				else if ($buzzyuser_difference<3600){
				$final_buzzyuser_difference=round($buzzyuser_difference/60);	
                $date_measure='minutes';				
				}				
                ?>	
				<div class="smalldash">
               <img class="left" src="<?php echo $image_prefix;?><?php echo $final_buzzyuser_image;?>" />	
			   	<span><?php echo $buzzyuser_first_name;?> <?php echo $buzzyuser_last_name;?> (<?php echo $buzzyuser_username;?>) - <?php echo $buzzyuser_location;?></span>
				<br>
				<span><?php echo $final_buzzyuser_difference;?> <?php echo $date_measure;?> ago</span>
				</div>
				<div class="clearfix"></div>
				  <hr>
		   <div class="clearfix"></div>				
				<?php } ?>				
		   <div class="moreread">
                 <a href="users.php"><span>View more...</span></a>	
				 <div class="clearfix"></div>				 
				 </div>	
           </div>		  
           </div> 	
		   <div class="half-column">
        <div class="dashhalf redtop marginthreeefixone">
 				<h5>Recently logged in users</h5>
				<hr>
				<?php
				foreach ($connread->query($recently_login_users_query) as $row) {
	           if ($row['buzzyuser_image']==''){
		       $buzzyuser_image='profile-icon.jpg';		  
		       }
		       else if ($row['buzzyuser_image']!=''){
		      $buzzyuser_image=$row['buzzyuser_image'];
		       }			
	  if($buzzyuser_image!=''){
  $final_buzzyuser_image=$buzzyuser_image;
  }
  else {
  $final_buzzyuser_image='profile-icon.jpg';
  }
  
  if (substr($final_buzzyuser_image, 0, 7) == 'http://' OR substr($final_buzzyuser_image, 0, 8) == 'https://') {
  $image_prefix='';
  }
  else  if (substr($final_buzzyuser_image, 0, 7) != 'http://') {
  $image_prefix='../img/';
  }
				$buzzyuser_first_name=$row['buzzyuser_first_name'];
				$buzzyuser_last_name=$row['buzzyuser_last_name'];				
				$buzzyuser_username=$row['buzzyuser_username'];
				$buzzyuser_last_login=$row['buzzyuser_last_login'];
                $buzzyuser_location=$row['buzzyuser_location'];		

				$buzzyuser_difference=$now-$buzzyuser_last_login;
				if ($buzzyuser_difference>=86400){
				$final_buzzyuser_difference=round($buzzyuser_difference/86400);	
                $date_measure='days';				
				}
				else if ($buzzyuser_difference<86400 AND $buzzyuser_difference>=3600){
				$final_buzzyuser_difference=round($buzzyuser_difference/3600);	
                $date_measure='hours';				
				}	
				else if ($buzzyuser_difference<3600){
				$final_buzzyuser_difference=round($buzzyuser_difference/60);	
                $date_measure='minutes';				
				}				
                ?>	
				<div class="smalldash">
               <img class="left" src="<?php echo $image_prefix;?><?php echo $final_buzzyuser_image;?>" />	
			   	<span><?php echo $buzzyuser_first_name;?> <?php echo $buzzyuser_last_name;?> (<?php echo $buzzyuser_username;?>) - <?php echo $buzzyuser_location;?></span>
				<br>
				<span><?php echo $final_buzzyuser_difference;?> <?php echo $date_measure;?> ago</span>
				</div>
				<div class="clearfix"></div>
				  <hr>
		   <div class="clearfix"></div>				
				<?php } ?>				
		   <div class="moreread">
                 <a href="users.php"><span>View more...</span></a>	
				 <div class="clearfix"></div>				 
				 </div>      
   	   </div>  
           </div> 	
		   <div class="clearfix"></div>

		   <div class="dash-third-column">
	       <div class="dashhalf rosedash">
                          <div class="half-column">			   
               <h2>
	<?php
    foreach ($connread->query($count_yesterday_visits_query) as $row) {
	$count_yesterday_visits=$row['count_yesterday_visits'];
	echo $count_yesterday_visits;
	}
	?>
	<br>
				   <span style="font-size:14px;"> Today visits</span>
			   </h2>
			   </div>
			   <div class="half-column">			   
               <span class="glyphicon glyphicon-eye-open dashicon"></span>		   
			
			   </div>
           </div>		   
           </div>
		   <div class="dash-third-column">
		    <div class="dashhalf aquadash marginonefixtwo">
 <div class="half-column">			   
               <h2>
	<?php
    foreach ($connread->query($count_week_visits_query) as $row) {
	$count_week_visits=$row['count_week_visits'];
	echo $count_week_visits;
	}
	?>
	<br>
				   <span style="font-size:14px;"> Last week visits</span>
			   </h2>
			   </div>
			   <div class="half-column">			   
               <span class="glyphicon glyphicon-eye-open dashicon"></span>		   
			
			   </div>
           </div>	
           </div>
		   <div class="dash-third-column">
		   	<div class="dashhalf winedash marginonefixtwo">
             <div class="half-column">			   
               <h2>
	<?php
    foreach ($connread->query($count_month_visits_query ) as $row) {
	$count_month_visits=$row['count_month_visits'];
	echo $count_month_visits;
	}
	?>
	<br>
				   <span style="font-size:14px;"> Last month visits</span>
			   </h2>
			   </div>
			   <div class="half-column">			   
               <span class="glyphicon glyphicon-eye-open dashicon"></span>		   
			
			   </div>
           </div>	
           </div>
   		   <div class="clearfix"></div>        
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
<!-- ADMIN WRAPPER ------ END -->
<?php
  include '../HTML/modal-sweet-alerts.html';
?>
</body>
</html>