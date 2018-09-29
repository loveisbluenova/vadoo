<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
$user_id = $_GET['user-id'];
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
	  include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
include 'PHP/editusercode.php';
include 'PHP/add-mail-code.php';
$current1 = '';
$current2 = '';
$current3 = '';
$current4='';
$current5='';
$current6='current';
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
foreach ($connread->query($website_options_query) as $row) {
$buzzy_access=$row['buzzy_access'];	
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
        <li><a href="users.php" class="active">Users</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                 Manage user
                </h1>
                <?php
                foreach ($connread->query($this_user_query) as $row) {
			    if ($row['buzzyuser_image']==''){
			    $buzzyuser_image='profile-icon.jpg';
			    }
			    else if ($row['buzzyuser_image']!=''){
			    $buzzyuser_image=$row['buzzyuser_image'];
			    }
			    if ($row['formated_buzzyuser_birthdate']=='00/00/0000'){
			    $buzzyuser_birthdate='';
			    }
			    else if ($row['formated_buzzyuser_birthdate']!='0000-00-00'){
			    $buzzyuser_birthdate=$row['formated_buzzyuser_birthdate'];
			    }
			    if ($row['buzzyuser_aboutme']==''){
                $buzzyuser_aboutme='';
                }
			    else if ($row['buzzyuser_aboutme']!=''){
			    $buzzyuser_aboutme=$row['buzzyuser_aboutme'];
			    }
			    $buzzyuser_username=$row['buzzyuser_username'];
				$buzzyuser_first_name=$row['buzzyuser_first_name'];
				$buzzyuser_last_name=$row['buzzyuser_last_name'];
			    $buzzyuser_email=$row['buzzyuser_email'];
			    $buzzyuser_location=$row['buzzyuser_location'];	
                $buzzyuser_status=$row['buzzyuser_status'];	
				$buzzyuser_credits=$row['buzzyuser_credits'];
				$buzzyuser_moderator=$row['buzzyuser_moderator'];
				
				if($row['buzzyuser_moderator']=='0'){
				$selectedmod1='selected';
				$selectedmod2='';				
                }
                else if($row['buzzyuser_moderator']=='1'){
				$selectedmod1='';
				$selectedmod2='selected';				
                }
				
				if($row['buzzyuser_status']=='0'){
				$selectedstat1='selected';
				$selectedstat2='';
				$selectedstat3='';
				$selectedstat4='';	
				$selectedstat5='';					
                }
                else if($row['buzzyuser_status']=='1'){
				$selectedstat1='';
				$selectedstat2='selected';
				$selectedstat3='';
				$selectedstat4='';	
				$selectedstat5='';					
                }
                else if($row['buzzyuser_status']=='2'){
				$selectedstat1='';
				$selectedstat2='';
				$selectedstat3='selected';
				$selectedstat4='';	
				$selectedstat5='';					
                }
                else if($row['buzzyuser_status']=='3'){
				$selectedstat1='';
				$selectedstat2='';
				$selectedstat3='';
				$selectedstat4='selected';	
				$selectedstat5='';					
                }
                else if($row['buzzyuser_status']=='10'){
				$selectedstat1='';
				$selectedstat2='';
				$selectedstat3='';
				$selectedstat4='';	
				$selectedstat5='selected';					
                }					
				
				
 if($buzzyuser_image!=''){
  $final_buzzyuser_image=$buzzyuser_image;
  }
  else {
  $final_buzzyuser_image='profile-icon.jpg';
  }
  
  if (substr($final_buzzyuser_image, 0, 7) == 'https://' OR substr($final_buzzyuser_image, 0, 8) == 'https://') {
  $image_prefix='';
  }
  else  if (substr($final_buzzyuser_image, 0, 7) != 'https://') {
  $image_prefix='../img/';
  }				
			    ?>
				<img style="margin-bottom:0px!important;" src="<?php echo $image_prefix;?><?php echo $final_buzzyuser_image;?>" class="thumbnail" id="small-user" />
                <?php } ?>
				<div class="clearfix"></div>
				<h3>Username: </h3>
				<input type="text" disabled class="form-control"  value="<?php echo $buzzyuser_username; ?>" data-toggle="tooltip" data-placement="right">									
				<h3>Fullname: </h3>
				<input type="text" class="form-control"  disabled value="<?php echo $buzzyuser_first_name;?> <?php echo $buzzyuser_last_name;?>" data-toggle="tooltip" data-placement="right">							
				<h3>Location: </h3>
				<input type="text" class="form-control"  disabled value="<?php echo $buzzyuser_location;?>" data-toggle="tooltip" data-placement="right">		
				<h3>Email:  </h3>
                <input type="text" class="form-control"  disabled value="<?php echo $buzzyuser_email;?>" data-toggle="tooltip" data-placement="right">		
                <h3>Credits:  </h3>
                <input type="text" class="form-control"  disabled value="<?php echo $buzzyuser_credits;?>" data-toggle="tooltip" data-placement="right">							
                <form action="" method="Post">
				<h3>User status:  </h3>				
                 <select class="form-control" name="buzzyuser_status" required>
				   <?php 
				   if($buzzy_access==1){
				   ?>   
				   <option  value="10" <?php echo $selectedstat5;?>>
					Restricted
				   </option>
				   <?php } ?>
                    <option  value="0" <?php echo $selectedstat1;?>>
					Regular
					</option>
                    <option  value="1" <?php echo $selectedstat2;?>>
					Premium
					</option>	
                    <option  value="2" <?php echo $selectedstat3;?>>
					Gold
					</option>							
                    <option  value="3" <?php echo $selectedstat4;?>>
					Vip
					</option>				
     		    </select>	

				<h3>Promote user to moderator: </h3>				
                 <select class="form-control" name="buzzyuser_moderator" required>
                    <option  value="0" <?php echo $selectedmod1;?>>
					Basic user
					</option>
                    <option  value="1" <?php echo $selectedmod2;?>>
					Moderator level 1
					</option>	                  				
     		    </select>	


					
					
				<h3>Give credits to user: </h3>
				<input type="number" name="buzzyuser_credits" class="form-control" value="0" data-toggle="tooltip" data-placement="right">							
				 <button type="submit" name="change_user_status" class="btn btn-primary">Update user </button>
                </form>
				<br>
            </div>
			<br>
        </div>
    </div>
</div>

</div>
<!-- ADMIN WRAPPER ------ END -->
<?php
  include '../HTML/modal-sweet-alerts.html';
?>
</body>
</html>