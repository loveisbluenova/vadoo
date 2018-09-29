<?php
session_start();
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
	  include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
    //include 'PHP/visits.php';
include 'PHP/editpaypalcode.php';
$current1 = 'current';
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
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                    Change Paypal settings
                </h1>
				<?php
				   if ($_SESSION["buzzyadmin_id"]==1){
				?>
			    <?php
                $website_userglobals_query = "SELECT * FROM  buzzyuserglobals WHERE buzzyuserglobal_id=1";				
				foreach ($connread->query($website_userglobals_query) as $row) {
                $buzzyuserglobal_credits=$row['buzzyuserglobal_credits'];
                $buzzyuserglobal_creditprice=$row['buzzyuserglobal_creditprice'];
                $buzzyuserpaypal_currency=$row['buzzyuserpaypal_currency'];
                $buzzypaypal_email=$row['buzzypaypal_email'];
                $buzzyuserskrill_currency=$row['buzzyuserskrill_currency'];
                $buzzyskrill_email=$row['buzzyskrill_email'];
                $paypal_url=$row['paypal_url'];					
                if($paypal_url=='https://www.sandbox.paypal.com/cgi-bin/webscr'){
                $checkedppurl1='Checked';
                $checkedppurl2='';	
                }
                else if($paypal_url=='https://www.paypal.com/cgi-bin/webscr'){
                $checkedppurl1='';
                $checkedppurl2='Checked';	
                 }				
		        ?>
                <form action="" method="POST">  
              <h3>Paypal email</h3>
             <input type="email" class="form-control" name="buzzypaypal_email" required value="<?php echo $buzzypaypal_email;?>" data-toggle="tooltip" data-placement="right" title="You type your paypal email here">	   				
               <h3>Paypal mode</h3>	  
               <div class="radio">
                <label >
                  <input type="radio" <?php echo $checkedppurl1;?> name="paypal_url" id="option1" value="https://www.sandbox.paypal.com/cgi-bin/webscr"  >  Sandbox mode
                </label>
					<br>
                <label >
                  <input type="radio" <?php echo $checkedppurl2;?> name="paypal_url" id="option1" value="https://www.paypal.com/cgi-bin/webscr"  >  Live mode
                </label>				
                 </div>	
				
				<h3>Paypal credits</h3>
                <input type="number" class="form-control" name="buzzyuserglobal_credits" required value="<?php echo $buzzyuserglobal_credits;?>" data-toggle="tooltip" data-placement="right" title="You type your credit ammount here">	   
				<h3>Paypal credit price</h3>
                <input type="number" class="form-control" name="buzzyuserglobal_creditprice" required value="<?php echo $buzzyuserglobal_creditprice;?>" data-toggle="tooltip" data-placement="right" title="You type your credit price here">	 				
				
		  <h3>Payment currency</h3>	
          <select class="form-control" name="buzzyuserpaypal_currency">
		  <?php
		    foreach ($connread->query($website_allcurrencies_query) as $row) { 
			$buzzycurrencylist_title=$row['buzzycurrencylist_title'];
			$buzzycurrencylist_sign=$row['buzzycurrencylist_sign'];		
			if($buzzycurrencylist_sign==$buzzyuserpaypal_currency){
			$selectedcur='selected';	
			}
			else if($buzzycurrencylist_sign!=$buzzyuserpaypal_currency){
			$selectedcur='';				
			}
		  ?>
		  <option <?php echo $selectedcur;?> value="<?php echo $buzzycurrencylist_sign;?>"><?php echo $buzzycurrencylist_title;?></option>
			<?php } ?>
		</select>
				
				<div class="clearfix"></div>					
				<?php }	?>				
				<br>
					<button type="submit" name="update_paypal" class="btn btn-primary">Submit Paypal settings</button>
                </form>
				<?php }	?>	
				<?php
				   if ($_SESSION["buzzyadmin_id"]==2){
				?>	
				 <div class="alert alert-info" style="margin-top:20px!important;" role="alert">You cannot see apis in demo version of the website.</div>
				   <?php } ?>				
                <br><br>
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