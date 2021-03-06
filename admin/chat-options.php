<?php
session_start();
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
include 'PHP/editwebsitechatcode.php';
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
$current29='current';	
foreach ($connread->query($website_options_query) as $row) {
$buzzysiteurl=$row['buzzysiteurl'];	
$buzzysitelogo=$row['buzzysitelogo'];
$buzzyoptimizedstatus=$row['buzzyoptimizedstatus'];
$buzzynewslimit=$row['buzzynewslimit'];
$buzzyyoutubeapi=$row['buzzyyoutubeapi'];
$buzzyfortumoid=$row['buzzyfortumoid'];
$buzzyfacebookaccess=$row['buzzyfacebookaccess'];
$buzzyfortumosecret=$row['buzzyfortumosecret'];
$buzzydistance_mesaure=$row['buzzydistance_mesaure'];
$buzzywebsite_status=$row['buzzywebsite_status'];
$buzzyversion=$row['buzzyversion'];
$buzzyupdatestatus=$row['buzzyupdatestatus'];
}	
if($buzzywebsite_status==0){
$fin_chat_option_refresh=$chat_option_refresh;	
}
else if($buzzywebsite_status==1){
$fin_chat_option_refresh=3000;		
}
	
foreach ($connread->query($website_css_options_query) as $row) {
$buzzycss_width=$row['buzzycss_width'];	
$buzzycsscont_style=$row['buzzycsscont_style'];
$buzzycss_loader=$row['buzzycss_loader'];


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
        <li><a href="chat-options.php" class="active">Chat options</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
<div class="content-empty">

 <div class="clearfix"></div>
 </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                    Change CSS 3 options
                </h1>
                <form action="#" method="POST"> 
	<h3>Bubble one color </h3>			
	<input id="chosen-value3" style="color:#ffffff!important;" class="form-control jscolor {valueElement:'chosen-value3', onFineChange:'setMainColor(this)'}" name="chat_option_coloone" 
	value="<?php echo $chat_option_coloone;?>">
	<script>
	function setMainColor(picker) {
		document.getElementsByTagName('body')[0].style.color = '#' + picker.toString()
	}
	</script>
	
		<h3>Bubble two color </h3>			
	<input id="chosen-value4" style="color:#ffffff!important;" class="form-control jscolor {valueElement:'chosen-value4', onFineChange:'setMainColor(this)'}" name="chat_option_colotwo" 
	value="<?php echo $chat_option_colotwo;?>">
	<script>
	function setMainColor(picker) {
		document.getElementsByTagName('body')[0].style.color = '#' + picker.toString()
	}
	</script>
	
	<h3>Active user color </h3>			
	<input id="chosen-value4" style="color:#ffffff!important;" class="form-control jscolor {valueElement:'chosen-value4', onFineChange:'setMainColor(this)'}" name="chat_option_colothree" 
	value="<?php echo $chat_option_colothree;?>">
	<script>
	function setMainColor(picker) {
		document.getElementsByTagName('body')[0].style.color = '#' + picker.toString()
	}
	</script>
	  <h3>Chat refresh in miliseconds (1000 - 60000)</h3>									
                <input type="number" class="form-control" name="chat_option_refresh" required value="<?php echo $fin_chat_option_refresh;?>"  min="1000" max="60000" data-toggle="tooltip" data-placement="right"
				title="Change your chat refresh rate">											
				 <h3>Chat user image radius</h3>									
                <input type="number" class="form-control" name="chat_option_radius" required value="<?php echo $chat_option_radius;?>"  min="0" max="150" data-toggle="tooltip" data-placement="right"
				title="Change your chat user radius">											

					<button type="submit" name="update_chat_options" class="btn btn-primary">Submit chat options</button>
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