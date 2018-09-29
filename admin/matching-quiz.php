<?php
session_start();
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
	  include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
    //include 'PHP/visits.php';
include 'PHP/editquizcode.php';
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
$current35='current';	
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
                    Change quiz questions
                </h1>
			    <?php
                foreach ($connread->query($all_quiz_query) as $row) {
				$buzzyquiz_one=$row['buzzyquiz_one'];
				$buzzyquiz_two=$row['buzzyquiz_two'];	
                $buzzyquiz_three=$row['buzzyquiz_three'];				
				$buzzyquiz_four=$row['buzzyquiz_four'];
				$buzzyquiz_five=$row['buzzyquiz_five'];				
				$buzzyquiz_six=$row['buzzyquiz_six'];
				$buzzyquiz_seven=$row['buzzyquiz_seven'];
				$buzzyquiz_eight=$row['buzzyquiz_eight'];	
                $buzzyquiz_nine=$row['buzzyquiz_nine'];		
                $buzzyquiz_ten=$row['buzzyquiz_ten'];	
                $buzzyquiz_eleven=$row['buzzyquiz_eleven'];	
                $buzzyquiz_twelve=$row['buzzyquiz_twelve'];
                $buzzyquiz_thirteen=$row['buzzyquiz_thirteen'];			
                $buzzyquiz_fourteen=$row['buzzyquiz_fourteen'];		
                $buzzyquiz_fifteen=$row['buzzyquiz_fifteen'];	
                $buzzyquiz_sixteen=$row['buzzyquiz_sixteen'];	
	            $buzzyquiz_seventeen=$row['buzzyquiz_seventeen'];	
	            $buzzyquiz_eightteen=$row['buzzyquiz_eightteen'];		
	            $buzzyquiz_nineteen=$row['buzzyquiz_nineteen'];			
	            $buzzyquiz_twenty=$row['buzzyquiz_twenty'];						
		        ?>
                <form action="" method="POST">   
				<h3>First question</h3>
                <input type="text" class="form-control" name="buzzyquiz_one" required value="<?php echo $buzzyquiz_one;?>" data-toggle="tooltip" data-placement="right" title="First question here">	   
				<h3>Second question</h3>
                <input type="text" class="form-control" name="buzzyquiz_two" required value="<?php echo $buzzyquiz_two;?>" data-toggle="tooltip" data-placement="right" title="Second question here">					
				<h3>Third question</h3>
                <input type="text" class="form-control" name="buzzyquiz_three" required value="<?php echo $buzzyquiz_three;?>" data-toggle="tooltip" data-placement="right" title="Three question here">	
				<h3>Fourth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_four" required value="<?php echo $buzzyquiz_four;?>" data-toggle="tooltip" data-placement="right" title="Fourth question here">	
				<h3>Fifth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_five" required value="<?php echo $buzzyquiz_five;?>" data-toggle="tooltip" data-placement="right" title="Fifth question here">					
				<h3>Sixth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_six" required value="<?php echo $buzzyquiz_six;?>" data-toggle="tooltip" data-placement="right" title="Sixth question here">		
				<h3>Seventh question</h3>
                <input type="text" class="form-control" name="buzzyquiz_seven" required value="<?php echo $buzzyquiz_seven;?>" data-toggle="tooltip" data-placement="right" title="Seventh question here">		
				<h3>Eighth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_eight" required value="<?php echo $buzzyquiz_eight;?>" data-toggle="tooltip" data-placement="right" title="Eighth question here">		
				<h3>Ninth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_nine" required value="<?php echo $buzzyquiz_nine;?>" data-toggle="tooltip" data-placement="right" title="Ninth question here">	
				<h3>Tenth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_ten" required value="<?php echo $buzzyquiz_ten;?>" data-toggle="tooltip" data-placement="right" title="Tenth question here">	
				<h3>Eleventh question</h3>
                <input type="text" class="form-control" name="buzzyquiz_eleven" required value="<?php echo $buzzyquiz_eleven;?>" data-toggle="tooltip" data-placement="right" title="Eleventh question here">		
				<h3>Twelvth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_twelve" required value="<?php echo $buzzyquiz_twelve;?>" data-toggle="tooltip" data-placement="right" title="Twelvth question here">	 
				<h3>Thirteenth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_thirteen" required value="<?php echo $buzzyquiz_thirteen;?>" data-toggle="tooltip" data-placement="right" title="Thirteenth question here">	  
				<h3>Fourteenth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_fourteen" required value="<?php echo $buzzyquiz_fourteen;?>" data-toggle="tooltip" data-placement="right" title="Fourteenth question here">	
				<h3>Fifteenth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_fifteen" required value="<?php echo $buzzyquiz_fifteen;?>" data-toggle="tooltip" data-placement="right" title="Fifteenth question here">
				<h3>Sixteenth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_sixteen" required value="<?php echo $buzzyquiz_sixteen;?>" data-toggle="tooltip" data-placement="right" title="Sixteenth question here">
				<h3>Seventeenth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_seventeen" required value="<?php echo $buzzyquiz_seventeen;?>" data-toggle="tooltip" data-placement="right" title="Seventeenth question here">				
				<h3>Eighteenth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_eightteen" required value="<?php echo $buzzyquiz_eightteen;?>" data-toggle="tooltip" data-placement="right" title="Eighteenth question here">	
				<h3>Nineteenth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_nineteen" required value="<?php echo $buzzyquiz_nineteen;?>" data-toggle="tooltip" data-placement="right" title="Nineteenth question here">					
				<h3>Twentieth question</h3>
                <input type="text" class="form-control" name="buzzyquiz_twenty" required value="<?php echo $buzzyquiz_twenty;?>" data-toggle="tooltip" data-placement="right" title="Twentieth question here">							
		<br>
					<button type="submit" name="update_quiz_questions" class="btn btn-primary">Submit quiz questions</button>
                </form>			
				<?php }	?>
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