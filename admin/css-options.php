<?php
session_start();
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
include 'PHP/editwebsitecsscode.php';
$current1 = '';
$current2 = '';
$current3 = '';
$current4='';
$current5='current';
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
		
foreach ($connread->query($website_css_options_query) as $row) {
$buzzycss_width=$row['buzzycss_width'];	
$buzzycsscont_style=$row['buzzycsscont_style'];
$buzzycss_loader=$row['buzzycss_loader'];
$buzzycss_btnradius=$row['buzzycss_btnradius'];

if($buzzycss_loader=='0'){
$checkedload1='checked';
$checkedload2='';	
}
else if($buzzycss_loader=='1'){
$checkedload1='';
$checkedload2='checked';	
}

if($buzzycss_width=='1180'){
$checked1='checked';
$checked2='';	
$checked3='';
}
else if($buzzycss_width=='1240'){
$checked1='';
$checked2='checked';	
$checked3='';
}
else if($buzzycss_width=='1330'){
$checked1='';
$checked2='';	
$checked3='checked';
}

if($buzzycsscont_style=='wide'){
$checkedstyle1='checked';
$checkedstyle2='';	
}
else if($buzzycsscont_style=='boxed'){
$checkedstyle1='';
$checkedstyle2='checked';	
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
	<script src="js/jscolor.min.js"></script>
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
        <li><a href="css-options.php" class="active">CSS 3 options</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
<div class="content-empty">
 <a href="add-img-filter.php" class="btn btn-primary">Add CSS filter to your images</a>
  <a href="add-font-size.php" class="btn btn-primary">Add font sizes</a>
  <a href="add-bg-image.php" class="btn btn-primary">Add website background</a> 
  <a href="add-reg-image.php" class="btn btn-primary">Add register page background</a>  
 <div class="clearfix"></div>
 </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                    Change CSS 3 options
                </h1>
                <form action="#" method="POST"> 
	<h3>Website  preloader</h3>		
         <div class="radio">
				<label>
                <input type="radio" <?php echo $checkedload1;?> name="buzzycss_loader"  data-toggle="tooltip" value="0" data-placement="top" > Disabled
                </label>
				<br>
				<label>
                <input type="radio" <?php echo $checkedload2;?>   name="buzzycss_loader" data-toggle="tooltip" value="1" data-placement="top" > Enabled
                </label>
          </div>		
	<h3>Website layout color </h3>			
	<input id="chosen-value3" style="color:#ffffff!important;" class="form-control jscolor {valueElement:'chosen-value3', onFineChange:'setMainColor(this)'}" name="buzzycssmain_bg" value="<?php echo $buzzycssmain_bg;?>">
	<script>
	function setMainColor(picker) {
		document.getElementsByTagName('body')[0].style.color = '#' + picker.toString()
	}
	</script>
	<h3>Main color </h3>			
	<input id="chosen-value" style="color:#ffffff!important;" class="form-control jscolor {valueElement:'chosen-value', onFineChange:'setTextColor(this)'}" name="buzzycss_color_css" value="<?php echo $buzzycss_color_css;?>">
	<script>
	function setTextColor(picker) {
		document.getElementsByTagName('body')[0].style.color = '#' + picker.toString()
	}
	</script>
	<h3>Second color (hover color)</h3>	
	<input id="chosen-value1" style="color:#ffffff!important;" class="form-control jscolor {valueElement:'chosen-value1', onFineChange:'setTextColor1(this)'}" name="buzzycss_color_css1" value="<?php echo $buzzycss_color_css1;?>">
	<script>
	function setTextColor1(picker) {
		document.getElementsByTagName('body')[0].style.color = '#' + picker.toString()
	}
	</script>
	<h3>Third color (border color)</h3>	
	<input id="chosen-value2" style="color:#ffffff!important;" class="form-control jscolor {valueElement:'chosen-value2', onFineChange:'setTextColor2(this)'}" name="buzzycss_color_css2" value="<?php echo $buzzycss_color_css2;?>">
	<script>
	function setTextColor2(picker) {
		document.getElementsByTagName('body')[0].style.color = '#' + picker.toString()
	}
	</script>
	<h3>Fourth color </h3>	
	<input id="chosen-value7" style="color:#ffffff!important;" class="form-control jscolor {valueElement:'chosen-value7', onFineChange:'setTextColor7(this)'}"
	name="buzzycss_color_css3" value="<?php echo $buzzycss_color_css3;?>">
	<script>
	function setTextColor7(picker) {
		document.getElementsByTagName('body')[0].style.color = '#' + picker.toString()
	}
	</script>	
	
   <h3>Badoo theme color </h3>	
	<input id="chosen-value8" style="color:#ffffff!important;" class="form-control jscolor {valueElement:'chosen-value8', onFineChange:'setTextColor8(this)'}"
	name="buzzycss_color_css4" value="<?php echo $buzzycss_color_css4;?>">
	<script>
	function setTextColor8(picker) {
		document.getElementsByTagName('body')[0].style.color = '#' + picker.toString()
	}
	</script>	

  <h3>Badoo theme second color </h3>	
	<input id="chosen-value9" style="color:#ffffff!important;" class="form-control jscolor {valueElement:'chosen-value9', onFineChange:'setTextColor9(this)'}"
	name="buzzycss_color_css5" value="<?php echo $buzzycss_color_css5;?>">
	<script>
	function setTextColor9(picker) {
		document.getElementsByTagName('body')[0].style.color = '#' + picker.toString()
	}
	</script>
	
	<h3>Heading fonts (Paste regular of Google font here)</h3>	
	<input  class="form-control" name="buzzycss_headings_font_family" value="<?php echo $buzzycss_headings_font_family;?>">
	<h3>Body fonts (Paste regular of Google font here)</h3>	
	<input  class="form-control" name="buzzycss_body_font_family" value="<?php echo $buzzycss_body_font_family;?>">			
		        <h3>Wrapper width</h3>									
                <input type="number" class="form-control" name="buzzycss_width" required value="<?php echo $buzzycss_width;?>"  min="720" max="1440" data-toggle="tooltip" data-placement="right"
				title="Change your wrapper width here">	
	            <h3>Button radius</h3>									
                <input type="number" class="form-control" name="buzzycss_btnradius" required value="<?php echo $buzzycss_btnradius;?>"  min="0" max="365" data-toggle="tooltip" data-placement="right"
				title="Change your wrapper width here">								
					<button type="submit" name="update_css_options" class="btn btn-primary">Submit CSS 3 options</button>
                </form>
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