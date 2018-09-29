<?php
session_start();
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
	  include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
    //include 'PHP/visits.php';
include 'PHP/editseocode.php';
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
$current20='';
$current21='current	';

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
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                    Change SEO settings
                </h1>
			    <?php
                foreach ($connread->query($website_options_query) as $row) {
				$buzzysitename=$row['buzzysitename'];
				$buzzysiteurl=$row['buzzysiteurl'];
				$buzzytitletag=$row['buzzytitletag'];
				$buzzymetatag=$row['buzzymetatag'];
				$buzzyads=$row['buzzyads'];
				$buzzyemail=$row['buzzyemail'];
                $buzzygrideffect=$row['buzzygrideffect'];
				$buzzyfacebookid=$row['buzzyfacebookid'];			
				$buzzyprivacy=$row['buzzyprivacy'];
				$buzzyterms=$row['buzzyterms'];		
                $buzzynewslimit=$row['buzzynewslimit'];		
                $buzzydistance_mesaure=$row['buzzydistance_mesaure'];				
                $buzzyoptimizedstatus=$row['buzzyoptimizedstatus'];		
                $buzzytimezone=$row['buzzytimezone'];
                $buzzycolumns=$row['buzzycolumns'];	
                $buzzyanimationspeed=$row['buzzyanimationspeed'];	
                $buzzywebsite_status=$row['buzzywebsite_status'];	
				$buzzydistance_mesaure=$row['buzzydistance_mesaure'];
				$buzzysitemeasure=$row['buzzysitemeasure'];				
				$buzzymax_pages=$row['buzzymax_pages'];
			    $buzzyuserimage_status=$row['buzzyuserimage_status'];
                $buzzylanguage_status=$row['buzzylanguage_status'];
                $buzzy_gzip=$row['buzzy_gzip'];
			    if ($buzzy_gzip==0){
                $selectedgz1='selected';
                $selectedgz2='';				
                }	
			    else if ($buzzy_gzip==1){
                $selectedgz1='';					
                $selectedgz2='selected';
                }					
				
				if ($buzzylanguage_status==0){
                $selectedlgg1='selected';
                $selectedlgg2='';				
                }	
			    else if ($buzzylanguage_status==1){
                $selectedlgg1='';
                $selectedlgg2='selected';				
                }				
				
				if ($buzzyuserimage_status==0){
                $selectedupup1='selected';
                $selectedupup2='';				
                }	
			    else if ($buzzyuserimage_status==1){
                $selectedupup1='';
                $selectedupup2='selected';				
                }
				
				if ($buzzywebsite_status==0){
                $selectedliv1='selected';
                $selectedliv2='';				
                }	
			    else if ($buzzywebsite_status==1){
                $selectedliv1='';
                $selectedliv2='selected';				
                }
	
			    if ($buzzydistance_mesaure==0){
                $selectedmes1='selected';
                $selectedmes2='';				
                }	
			    else if ($buzzydistance_mesaure==1){
                $selectedmes1='';
                $selectedmes2='selected';					
                }
	
			    if ($buzzysitemeasure==0){
                $selectedmec1='selected';
                $selectedmec2='';				
                }	
			    else if ($buzzysitemeasure==1){
                $selectedmec1='';
                $selectedmec2='selected';					
                }	
	
	
	
	
	

			    if ($buzzyanimationspeed=='slow'){
                $selected1a='selected';
				$selected2a='';
				$selected3a='';			
                }	
			    else if ($buzzyanimationspeed=='normal'){
				$selected1a='';		
                $selected2a='selected';
				$selected3a='';	
                }
			    else if ($buzzyanimationspeed=='fast'){
				$selected1a='';						
                $selected3a='selected';
                $selected2a='';	
                }				
			    if ($buzzyoptimizedstatus==0){
                $checkedseo='';
                }
				else if ($buzzyoptimizedstatus==1){
                $checkedseo='checked';
                }
				
                if ($buzzynewslimit==25){
                $checked25='active';
                }	
                else if ($buzzynewslimit!=25){
                $checked25='';
                }	
                if ($buzzynewslimit==50){
                $checked50='active';
                }	
                else if ($buzzynewslimit!=50){
                $checked50='';
                }	
                if ($buzzynewslimit==75){
                $checked75='active';
                }	
                else if ($buzzynewslimit!=75){
                $checked75='';
                }	
                if ($buzzynewslimit==100){
                $checked100='active';           
			    }	
                else if ($buzzynewslimit!=100){
                $checked100='';
                }				
		        ?>
                <form action="" method="POST"> 
			  <h3>Website title tag</h3>
				<input type="text" class="form-control" name="buzzytitletag" required value=" <?php echo $buzzytitletag; ?>" data-toggle="tooltip" data-placement="right" title="Change main page title tag">			
				<h3>Website meta tag</h3>
				<input type="text" name="buzzymetatag"  class="form-control"  required value="<?php echo $buzzymetatag ;?>" data-toggle="tooltip" data-placement="top"	title="You type your website meta tag here...">
				<input type="hidden" name="buzzy_gzip" value="0" />
				<div class="checkbox">
                <label>
                <input type="checkbox" name="buzzyoptimizedstatus" value="1" <?php echo $checkedseo; ?> data-toggle="tooltip" data-placement="top" title="Make your urls SEO friendly... Beware, you must check your .httacces file
				and do not check this option at your localhost"> Make urls SEO optimized
                </label>
                </div>					 
				<?php }	?>
				<br>
					<button type="submit" name="update_website_options" class="btn btn-primary">Submit website options</button>
                </form>
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