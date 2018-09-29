<?php
session_start(); 
    include '../includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['importfilter'])) {
$buzzyfakeuser_password=$_POST['buzzyfakeuser_password'];
$buzzyfakeuser_password1 = htmlspecialchars($buzzyfakeuser_password, ENT_QUOTES);
$enc_buzzyfakeuser_password1=md5($buzzyfakeuser_password1);
	
$fake_filter_query = "SELECT * FROM  buzzyfakefilter";
foreach ($connread->query($fake_filter_query) as $row) {
$buzzyfakefilter_gender=$row['buzzyfakefilter_gender'];
if($buzzyfakefilter_gender!=2){
$pre_text='buzzyfakeuser_genre=';
$final_buzzyfakefilter_gender=$buzzyfakefilter_gender;
$front_text=' AND';
}
else{
$pre_text='';	
$final_buzzyfakefilter_gender='';	
$front_text='';
}
$total_filter_text=$pre_text . $final_buzzyfakefilter_gender . $front_text;
$buzzyfakefilter_agemin=$row['buzzyfakefilter_agemin'];	
$buzzyfakefilter_agemax=$row['buzzyfakefilter_agemax']; 
}	 
$count_afake_users_query = "SELECT COUNT(*) FROM  buzzyfakeusersusa WHERE $total_filter_text buzzyfakeuserusa_age<=$buzzyfakefilter_agemax AND buzzyfakeuserusa_age>=$buzzyfakefilter_agemin AND buzzyfakeuserusa_insertedstatus=0";
foreach ($connread->query($count_afake_users_query) as $row) {
$count_fake=$row['COUNT(*)'];	
}	

$all_fake_users_query = "SELECT * FROM  buzzyfakeusersusa WHERE $total_filter_text  buzzyfakeuserusa_age<=$buzzyfakefilter_agemax AND buzzyfakeuserusa_age>=$buzzyfakefilter_agemin AND buzzyfakeuserusa_insertedstatus=0";
foreach ($connread->query($all_fake_users_query) as $row) {
$buzzyfakeuser_id=$row['buzzyfakeuserusa_id'];	
$buzzyfakeuser_firstname=$row['buzzyfakeuserusa_firstname'];	
$buzzyfakeuser_lastname=$row['buzzyfakeuserusa_lastname'];	
$buzzyfakeuser_username=$buzzyfakeuser_firstname . $buzzyfakeuser_lastname;
$buzzyfakeuser_image=$row['buzzyfakeuserusa_image'];
$buzzyfakeuser_email=$row['buzzyfakeuserusa_email'];
$buzzyfakeuser_birthdate=$row['buzzyfakeuserusa_birthdate'];
$buzzyfakeuser_age=$row['buzzyfakeuserusa_age'];
$buzzyfakeuser_location=$row['buzzyfakeuserusa_location'];
$buzzyfakeuser_lat=$row['buzzyfakeuserusa_lat'];
$buzzyfakeuser_long=$row['buzzyfakeuserusa_long'];
$buzzyfakeuser_genre=$row['buzzyfakeuser_genre'];
$register_user = "INSERT INTO  buzzyusers
       (buzzyuser_first_name,buzzyuser_last_name,buzzyuser_username,buzzyuser_image,buzzyuser_birthdate,buzzyuser_location,buzzyuser_age,buzzyuser_data_sexual_orientation,buzzyuser_lat,buzzyuser_long,buzzyuser_email,buzzyuser_password,buzzyuser_registration_date,buzzyuser_last_login,buzzyuser_registration_timestamp,buzzyuser_status,buzzyuser_status_timestamp,buzzyuser_credits,buzzyuser_fbconfirm,
	    buzzyuser_googleconfirm,buzzyuser_emailstatus,buzzyuser_fullnamestatus,buzzyuser_contactsstatus,buzzyuser_visibility,buzzyuser_privacy,buzzyuser_genre,buzzyuser_onlinestatus,buzzyuser_fortumo_tnx,buzzyuser_chatlimit)
		 	  VALUES (:buzzyuser_first_name,:buzzyuser_last_name,:buzzyuser_username,:buzzyuser_image,:buzzyuser_birthdate,:buzzyuser_location,:buzzyuser_age,0,
			  :buzzyuser_lat,:buzzyuser_long,:buzzyuser_email,:buzzyuser_password,NOW(),:buzzyuser_last_login,:buzzyuser_registration_timestamp,0,:buzzyuser_status_timestamp,0,0,0,0,0,0,
			  0,0,:buzzyuser_genre,0,'eruezrufjde',0)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user);
        // bind the parameters and execute the statement
		$stmt->bindParam(':buzzyuser_first_name', $buzzyfakeuser_firstname, PDO::PARAM_STR);
		$stmt->bindParam(':buzzyuser_last_name', $buzzyfakeuser_lastname, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_username', $buzzyfakeuser_username, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_image', $buzzyfakeuser_image, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_birthdate', $buzzyfakeuser_birthdate, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_location', $buzzyfakeuser_location, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyuser_age', $buzzyfakeuser_age, PDO::PARAM_STR);						
        $stmt->bindParam(':buzzyuser_lat', $buzzyfakeuser_lat, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_long', $buzzyfakeuser_long, PDO::PARAM_STR);			
        $stmt->bindParam(':buzzyuser_email', $buzzyfakeuser_email, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_password', $enc_buzzyfakeuser_password1, PDO::PARAM_STR);			
		$stmt->bindParam(':buzzyuser_last_login', $now, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzyuser_registration_timestamp', $now, PDO::PARAM_STR);	
		$stmt->bindParam(':buzzyuser_status_timestamp', $now, PDO::PARAM_STR);			
		$stmt->bindParam(':buzzyuser_genre', $buzzyfakeuser_genre, PDO::PARAM_STR);		
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();

        $new_user_query = "SELECT * FROM buzzyusers ORDER by buzzyuser_id DESC LIMIT 1";
		foreach ($connread->query($new_user_query) as $row) { 
		$last_buzzyuser_id=$row['buzzyuser_id'];
    $register_fa_user_query="SELECT * FROM buzzyusers WHERE buzzyuser_id=$last_buzzyuser_id";
    foreach ($connread->query($register_fa_user_query) as $row) { 
    $fa_buzzyuser_username = $row['buzzyuser_username'];
	$fa_buzzyuser_image = $row['buzzyuser_image'];
	$fa_buzzyuser_email = $row['buzzyuser_email'];
	$fa_buzzyuser_status = $row['buzzyuser_status'];
	$fa_buzzyuser_hash = $row['buzzyuser_hash'];
     $register_user_to_messages = "INSERT INTO  users
       (id,username,display_name,profile_image,type_status,last_seen,session_status)
		 	  VALUES (:id,:username,:display_name,:profile_image,'stopped',:last_seen,'offline')";
        // prepare the statement
        $stmt = $connwrite->prepare($register_user_to_messages);
        // bind the parameters and execute the statement
		$stmt->bindParam(':id', $last_buzzyuser_id, PDO::PARAM_STR);
		$stmt->bindParam(':username', $fa_buzzyuser_username, PDO::PARAM_STR);		
		$stmt->bindParam(':display_name', $fa_buzzyuser_username, PDO::PARAM_STR);
		$stmt->bindParam(':profile_image', $fa_buzzyuser_image, PDO::PARAM_STR);		
		$stmt->bindParam(':last_seen', $now, PDO::PARAM_STR);		
         // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
	}
	}


		
		$update_fakeuser_query = "UPDATE buzzyfakeusersusa SET buzzyfakeuserusa_insertedstatus=1 WHERE buzzyfakeuserusa_id=$buzzyfakeuser_id";
        $stmt = $connwrite->prepare($update_fakeuser_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
}
header('Location: users.php?importusers=true');	
}	
}

if ($_SESSION["buzzyadmin_id"]==2){ 
if (isset($_POST['importfilter'])) {
header('Location: users.php?onlydemo=true');		
}
}	

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
    <link rel="stylesheet" type="text/css" href="../css/jquery.nstSlider.css"/>			
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="../js/jquery.nstSlider.js"></script>   		
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
	  <style>
.nstSlider{
background:#cccccc!important;
height:5px!important;
width:200px!important;
}
.bar{
background:none!important;
}
.leftGrip{
background:#fff!important;
margin-top:-5px!important;
height:15px!important;
width:15px!important;
border:4px solid #<?php echo $buzzycss_color_css;?>!important;
}
.rightGrip{
background:#fff!important;
margin-top:-5px!important;
height:15px!important;
width:15px!important;
border:4px solid #<?php echo $buzzycss_color_css;?>!important;
}	  
	  </style>
</head>
<body>
<div style="margin:0 auto!important;">
<h2>Updating users to your database</h2>
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:70%">
    <span class="sr-only">70% Complete</span>
  </div>
</div>
</div>
</body>
</html>