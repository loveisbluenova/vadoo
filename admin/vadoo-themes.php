<?php
session_start();
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
	  include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
    //include 'PHP/visits.php';
   $website_options_query = "SELECT * FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1";
   foreach ($connread->query($website_options_query) as $row) {
   $buzzy_theme=$row['buzzy_theme'];

if($buzzy_theme==0){
$selhone='selected';	
$selhtwo='';
$selhthree='';
$selhfour='';
$selhfive='';
}
if($buzzy_theme==1){
$selhone='';	
$selhtwo='selected';
$selhthree='';
$selhfour='';
$selhfive='';
}    
if($buzzy_theme==2){
$selhone='';	
$selhtwo='';
$selhthree='selected';
$selhfour='';
$selhfive='';
} 
if($buzzy_theme==3){
$selhone='';	
$selhtwo='';
$selhthree='';
$selhfour='selected';
$selhfive='';
} 
if($buzzy_theme==4){
$selhone='';	
$selhtwo='';
$selhthree='';
$selhfour='';
$selhfive='selected';
}
   }
   
   if ($_SESSION["buzzyadmin_id"]==1){   
   if (isset($_POST['update_website_theme'])) {
       $OK = false;
        $update_website_options_query = "UPDATE buzzysiteoptions SET  buzzy_theme=:buzzy_theme WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_options_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzy_theme', $_POST['buzzy_theme'], PDO::PARAM_STR);				
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	  	header('Location: vadoo-themes.php?add-settings-success=true');	
   }
   }
   if ($_SESSION["buzzyadmin_id"]==2){   
   if (isset($_POST['update_website_theme'])) {
	  	header('Location: vadoo-themes.php?onlydemo=true');	
   }
   }     
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
$current19='';
$current20='current';	
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
	<link rel="stylesheet" type="text/css" href="<?php echo $link_prefix;?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $link_prefix;?>css/animate.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"/>		
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
             <li><a href="#" class="active">Vadoo themes</a></li>
         </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                    Choose Vadoo theme
                </h1>
				<form action="" method="POST">
					<select class="form-control" name="buzzy_theme" required>
                    <option <?php echo $selhone;?> value="0">
				     Classic theme
					</option>
                    <option <?php echo $selhthree;?> value="2">
					Badoo theme 
					</option>	             			
					</select>	
             <div class="clearfix"></div>	
             <br>
		    <button type="submit" name="update_website_theme" class="btn btn-primary">Submit theme</button>	
			</form>
             <div class="clearfix"></div>				
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
<!-- ADMIN WRAPPER ------ END -->
<?php
  include '../HTML/modal-sweet-alerts.html';
?>
</body>
</html>