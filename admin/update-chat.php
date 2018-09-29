<?php
session_start();
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
    //include 'PHP/visits.php';
include 'PHP/editadmincode.php';
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
$filename = 'chat.sql';
if (isset($_POST['importdb'])) {
$mysql_host = $_POST['hostname'];
$mysql_host = str_replace(' ','',$mysql_host);
// MySQL username
$mysql_username =  $_POST['dbuser'];
$mysql_username = str_replace(' ','',$mysql_username);
// MySQL password
$mysql_password = $_POST['dbpwd'];
$mysql_password = str_replace(' ','',$mysql_password);
// Database name
$mysql_database = $_POST['database'];	
$mysql_database = str_replace(' ','',$mysql_database);
//read the entire string
$aVar = mysqli_connect($mysql_host,$mysql_username,$mysql_password,$mysql_database);   
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysqli_query($aVar,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
     $add_paid_query = "INSERT INTO  buzzypaidservices(buzzypaidservice_title,buzzypaidservice_img,buzzypaidservice_price)
		 	  VALUES('Animal emoticons','sm4.jpg',1000)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_paid_query);
        $stmt->execute();
        $OK = $stmt->rowCount();

   $add_aappimage_query = "ALTER TABLE buddies ADD friend_timestamp INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_aappimage_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();		
		
$update_website_soptions_query = "UPDATE buzzysiteoptions SET  buzzyupdatestatus=0,buzzyversion='1.0.8' WHERE buzzysiteoptions_id=1";
        $stmt = $connwrite->prepare($update_website_soptions_query);
        // bind the parameters and execute the statement			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();  		
header('Location:index.php?version-updated=true'); 	
}
if($buzzywebsite_status==1){
header('Location:index.php?version-demoexist=true');	
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
        <li><a href="admin-options.php" class="active">Admin options</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                    Update chat database
                </h1>
			   <form action="" method="POST" >
				<h3>Hostname</h3>				
                <input type="text" class="form-control" name="hostname" required  data-toggle="tooltip" data-placement="right" placeholder="Hostname" title="Type your hostname here">	
				<h3>Database</h3>				
                <input type="text" class="form-control" name="database" required  data-toggle="tooltip" data-placement="right" placeholder="Database name" title="Type your database name here">		
				<h3>User</h3>				
                <input type="text" class="form-control" name="dbuser" required  data-toggle="tooltip" data-placement="right" placeholder="Database user" title="Type your database user here">		
				<h3>Password</h3>				
                <input type="text" class="form-control" name="dbpwd" required  data-toggle="tooltip" data-placement="right" placeholder="Database password" title="Type your database password here">
			    <button class="btn btn-primary" name="importdb" type="submit"> <i class="fa fa-upload" aria-hidden="true"></i> Update chat database</button>				
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