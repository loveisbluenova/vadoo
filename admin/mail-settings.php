<?php
session_start();
include 'security/xss-security.php';
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
	  include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
    //include 'PHP/visits.php';
include 'PHP/editmailsettingscode.php';
$current1 = '';
$current2 = '';
$current3 = '';
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
        <li><a href="mail-settings.php" class="active">E-mail settings</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                    Change mail settings
                </h1>
			    <?php
                foreach ($connread->query($website_options_query) as $row) {
				$buzzyemail=$row['buzzyemail'];
				$buzzyemailpassword=$row['buzzyemailpassword'];		
		        ?>
                <form action="" method="POST">   
                <input type="text" class="form-control" name="buzzyemail" required value="<?php echo $buzzyemail; ?>" data-toggle="tooltip" data-placement="right" title="Insert your website email here...">	
                <input type="text" class="form-control" name="buzzyemailpassword" required value="<?php echo $buzzyemailpassword; ?>" data-toggle="tooltip" data-placement="right" title="Insert your email password here. This is password that you enter in your regular e-mail">	 
                 <select class="form-control" name="buzzystpmserver" required>
                    <option disabled selected>Select your mail server</option>
                   	<option value="smtp.gmail.com">Gmail</option>		
        	        <option value="pop3.live.com">Outlook.com</option>			
        	        <option value="outlook.office365.com">Office365.com</option>	
        	        <option value="pop.mail.yahoo.com">Yahoo Mail</option>		
        	        <option value="plus.pop.mail.yahoo.com">Yahoo Mail Plus</option>
        	        <option value="pop3.o2.ie">O2</option>	
        	        <option value="pop.att.yahoo.com">AT & T</option>		
        	        <option value="pop.orange.net">Orange</option>		
        	        <option value="pop3.live.com">Hotmail</option>		
        	        <option value="incoming.verizon.net">Verizon</option>	
                  </select>					
				  <div class="clearfix"></div>	
                   <br>				  
					<button type="submit" name="update_mail-options" class="btn btn-primary">Submit e-mail options</button>
                </form>
				<?php } ?>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<!-- ADMIN WRAPPER ------ END -->
</body>
</html>