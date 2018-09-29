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
$current11='';	
$current12='current';	
$current13='';
$current14='';
$current15='';
$current16='';
$current17='';
$current18='';
 if ($_SESSION["buzzyadmin_id"]==1){   	
   if (isset($_POST['update_language'])) {
	   $postbuzzylanguage=$_POST['buzzylanguage'];   
        $OK = false;
        $update_lng_query = "UPDATE buzzylanguages SET buzzylanguage=:buzzylanguage WHERE buzzylanguage_id=1";
        $stmt = $connwrite->prepare($update_lng_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzylanguage', $postbuzzylanguage, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	    header('Location: customlng.php?add-settings-success=true');
		}
    }

	
	$website_language_query = "SELECT * FROM  buzzylanguages WHERE buzzylanguage_id=1";
    foreach ($connread->query($website_language_query) as $row) {
	$buzzylanguage=$row['buzzylanguage'];
    }	
if($buzzylanguage=='en'){
	$selected_lang1='selected';	
	$selected_lang2='';	
	$selected_lang3='';
	$selected_lang4='';
	$selected_lang5='';
	$selected_lang6='';
	$selected_lang7='';		
	$selected_lang8='';	
	$selected_lang9='';		
	$selected_lang10='';		
	}
	else if($buzzylanguage=='de'){
	$selected_lang1='';	
	$selected_lang2='selected';	
	$selected_lang3='';
	$selected_lang4='';
	$selected_lang5='';
	$selected_lang6='';
	$selected_lang7='';		
	$selected_lang8='';	
	$selected_lang9='';		
		$selected_lang10='';
	}
	else if($buzzylanguage=='es'){
	$selected_lang1='';	
	$selected_lang2='';	
	$selected_lang3='selected';
	$selected_lang4='';
	$selected_lang5='';
	$selected_lang6='';
	$selected_lang7='';		
	$selected_lang8='';	
	$selected_lang9='';		
		$selected_lang10='';
	}	
	else if($buzzylanguage=='fr'){
	$selected_lang1='';	
	$selected_lang2='';	
	$selected_lang3='';
	$selected_lang4='selected';
	$selected_lang5='';
	$selected_lang6='';
	$selected_lang7='';		
	$selected_lang8='';	
	$selected_lang9='';		
		$selected_lang10='';
	}	
	else if($buzzylanguage=='it'){
	$selected_lang1='';	
	$selected_lang2='';	
	$selected_lang3='';
	$selected_lang4='';
	$selected_lang5='selected';
	$selected_lang6='';
	$selected_lang7='';		
	$selected_lang8='';	
	$selected_lang9='';		
		$selected_lang10='';
	}
	else if($buzzylanguage=='tr'){
	$selected_lang1='';	
	$selected_lang2='';	
	$selected_lang3='';
	$selected_lang4='';
	$selected_lang5='';
	$selected_lang6='selected';
	$selected_lang7='';		
	$selected_lang8='';	
	$selected_lang9='';		
		$selected_lang10='';
	}
	else if($buzzylanguage=='ch'){
	$selected_lang1='';	
	$selected_lang2='';	
	$selected_lang3='';
	$selected_lang4='';
	$selected_lang5='';
	$selected_lang6='';
	$selected_lang7='selected';		
	$selected_lang8='';		
	$selected_lang9='';		
		$selected_lang10='';
	}
	else if($buzzylanguage=='pt'){
	$selected_lang1='';	
	$selected_lang2='';	
	$selected_lang3='';
	$selected_lang4='';
	$selected_lang5='';
	$selected_lang6='';
	$selected_lang7='';		
	$selected_lang8='selected';	
	$selected_lang9='';		
		$selected_lang10='';
	}
	else if($buzzylanguage=='nl'){
	$selected_lang1='';	
	$selected_lang2='';	
	$selected_lang3='';
	$selected_lang4='';
	$selected_lang5='';
	$selected_lang6='';
	$selected_lang7='';		
	$selected_lang8='';	
	$selected_lang9='selected';
	$selected_lang10='';	
	}
	else if($buzzylanguage=='sr'){
	$selected_lang1='';	
	$selected_lang2='';	
	$selected_lang3='';
	$selected_lang4='';
	$selected_lang5='';
	$selected_lang6='';
	$selected_lang7='';		
	$selected_lang8='';	
	$selected_lang9='';
	$selected_lang10='selected';	
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
                  Choose website language
                </h1>		 
                <form action="" method="POST"> 
                	<select class="form-control" name="buzzylanguage" required >	
     					<option <?php echo $selected_lang1;?> value="en">
						English
						</option>	
                       <option <?php echo $selected_lang2;?> value="de">
						German
						</option>	
     					<option <?php echo $selected_lang3;?> value="es">
						Spanish
						</option>	
                       <option <?php echo $selected_lang4;?> value="fr">
					   French
						</option>
                       <option <?php echo $selected_lang5;?> value="it">
						Italian
						</option>	
                       <option <?php echo $selected_lang6;?> value="tr">
						Turkish
						</option>							
                       <option <?php echo $selected_lang7;?> value="ch">
						Chinese
						</option>
                       <option <?php echo $selected_lang8;?> value="pt">
						Portuguese
						</option>	
                       <option <?php echo $selected_lang9;?> value="nl">
						Dutch
						</option>	
                       <option <?php echo $selected_lang10;?> value="sr">
						Serbian
						</option>							
				</select>
				<br>
	            <button type="submit" name="update_language" class="btn btn-primary">Submit website options</button>				
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