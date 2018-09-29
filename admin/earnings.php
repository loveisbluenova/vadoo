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
        $current9='';
        $current10='';
$current11='';
$current12='';
$current13='';
$current14='';
$current15='';
$current16='current';
$current17='';
$current18='';		
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
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
             <li><a href="#" class="active">Earnings</a></li>
         </ol>
    <!-- Breadcrumbs for admin panel ------ END -->	
  <div class="content-empty">
 <div class="clearfix"></div>
 </div>
 <div class="content">
 <?php
   $website_userglobals_query = "SELECT * FROM  buzzyuserglobals WHERE buzzyuserglobal_id=1";				
	foreach ($connread->query($website_userglobals_query) as $row) {
     $buzzyuserpaypal_currency=$row['buzzyuserpaypal_currency'];
	}
 ?>
	<div class="table-responsive">
	<?php
    $total_earnings_query = "SELECT SUM(payment_gross) FROM  payments ORDER by payment_id ASC";
    foreach ($connread->query($total_earnings_query) as $row) {
    $sum_earnings=$row['SUM(payment_gross)'];
	?>
	 <h3 style="margin-left:20px!important;">Your total earnings are <?php echo $sum_earnings;?> <?php echo $buzzyuserpaypal_currency;?></h3>
    <?php } ?>	 
  <table class="table" id="table_id" class="display">
  <thead>
  <tr>
    <th>Payment id</th>
    <th>Transaction id</th>
	<th>Payment value</th>
	<th>Payment currency</th>
	<th>User</th>
	<th>Transaction time</th>
    <th>Payment server</th>
  </tr>
  </thead>
    <tbody>
  <?php
  $all_earnings_query = "SELECT * FROM  payments ORDER by payment_id ASC";
  foreach ($connread->query($all_earnings_query) as $row) {
  $payment_id=$row['payment_id'];
  $txn_id=$row['txn_id'];
  $payment_gross=$row['payment_gross'];
  $currency_code=$row['currency_code'];
  $payment_status=$row['payment_status'];
  $buzzyuser_id = $row['buzzyuser_id'];
  $transaction_time=$row['transaction_time'];  
  $formated_transaction_time=date('d-M-Y, H:i:s', $transaction_time);  
  $payment_kind=$row['payment_kind'];  
  if($payment_kind==0){
  $payment_serverr='PayPal';	  	  
  }
  else if($payment_kind==1){
  $payment_serverr='Fortumo';	  	  
  }  
  $payment_user_query = "SELECT * FROM buzzyusers WHERE buzzyuser_id=$buzzyuser_id";
  foreach ($connread->query($payment_user_query) as $row) {
  $buzzyuser_first_name=$row['buzzyuser_first_name'];
  $buzzyuser_last_name=$row['buzzyuser_last_name'];
  }   
  ?>
  <tr>
    <td><?php echo $payment_id;?></td>
    <td><?php echo $txn_id;?></td>
	<td><?php echo $payment_gross;?></td>
	<td><?php echo $currency_code;?></td>
	<td><?php echo $buzzyuser_first_name;?> <?php echo $buzzyuser_last_name;?></td>
	<td><?php echo $formated_transaction_time;?></td>		
	<td><?php echo $payment_serverr;?></td>	
   </tr>
  <?php } ?>
   </tbody>
  </table>
  <script>
  $(document).ready( function () {
    $('#table_id').DataTable();
} );
  </script>
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