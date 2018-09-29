<?php
ob_start('ob_gzhandler');
$aip = $_SERVER['REMOTE_ADDR'];
$bip = $_SERVER['HTTP_X_FORWARDED_FOR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
session_start();
// Do this each time the user successfully logs in.
$_SESSION['ident'] = hash("sha256", $aip . $bip . $agent);

// Do this every time the client makes a request to the server, after authenticating
$ident = hash("sha256", $aip . $bip . $agent);
if ($ident != $_SESSION['ident'])
{
    end_session();
    header("Location: index.php");
    // add some fancy pants GET/POST var headers for login.php, that lets you
    // know in the login page to notify the user of why they're being challenged
    // for login again, etc.
}
$ip = $_SERVER['REMOTE_ADDR'];
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/functions.php';	
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
include 'PHP/addprofileimagecodeold.php';	
include 'PHP/addgalleryimagecodeold.php';	
include 'PHP/addverimagecodeold.php';	
if (isset($_GET["user-id"])) {
if(!is_numeric($_GET["user-id"])){
     header('Location: '.$link_prefix.'index.php');	
}	
$user_id=htmlspecialchars($_GET["user-id"], ENT_QUOTES);
include 'PHP/usercode.php';
} 
else if (isset($_GET["friends"])) {
if(!is_numeric($_GET["friends"])){
header('Location: '.$link_prefix.'index.php');		 
}	

$friends_page=htmlspecialchars($_GET["friends"], ENT_QUOTES);
}

else if (isset($_GET["profile-img-id"])) {
if(!is_numeric($_GET["profile-img-id"])){
     header('Location: '.$link_prefix.'index.php');	
}	
$profile_img_id=htmlspecialchars($_GET["profile-img-id"], ENT_QUOTES);
}

else if (isset($_GET["gallery-img-id"])) {
if(!is_numeric($_GET["gallery-img-id"])){
     header('Location: '.$link_prefix.'index.php');	
}		
$gallery_img_id=htmlspecialchars($_GET["gallery-img-id"], ENT_QUOTES);
}
else if (isset($_GET["notifications"])) {
if(!is_numeric($_GET["notifications"])){
     header('Location: '.$link_prefix.'index.php');	
}	
$notification_page=htmlspecialchars($_GET["notifications"], ENT_QUOTES);
}
else if (isset($_GET["matches"])) {
if(!is_numeric($_GET["matches"])){
     header('Location: '.$link_prefix.'index.php');	
}
		
$matches_page=htmlspecialchars($_GET["matches"], ENT_QUOTES);
}
else if (isset($_GET["custom-page"])) {		
$custom_page=htmlspecialchars($_GET["custom-page"], ENT_QUOTES);
}
else if (isset($_GET["privacy"])) {
if(!is_numeric($_GET["privacy"])){
     header('Location: '.$link_prefix.'index.php');	
}	
$privacy_page=htmlspecialchars($_GET["privacy"], ENT_QUOTES);
}
else if (isset($_GET["terms"])) {
if(!is_numeric($_GET["terms"])){
     header('Location: '.$link_prefix.'index.php');	
}	
$terms_page=htmlspecialchars($_GET["terms"], ENT_QUOTES);
}

else if (isset($_GET["my-settings"])) {
if($_GET["my-settings"]!='true'){
     header('Location: '.$link_prefix.'index.php');	
}	
$my_settings=htmlspecialchars($_GET["my-settings"], ENT_QUOTES);
}

else if (isset($_GET["favorites-page"])) {
if($_GET["favorites-page"]!='true'){
     header('Location: '.$link_prefix.'index.php');	
}
}

else if (isset($_GET["no-criteria"])) {
if($_GET["no-criteria"]!='true'){
     header('Location: '.$link_prefix.'index.php');	
}	
$no_criteria=htmlspecialchars($_GET["no-criteria"], ENT_QUOTES);
}	 

if($session_buzzyuser_image!='profile-icon1.jpg' AND $session_buzzyuser_genre!=10 AND $session_buzzyuser_age!='0'){
     header('Location: '.$link_prefix.'index.php');		
}	
 
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title><?php echo $pagetitletag; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
    <?php
    foreach ($connread->query($website_options_query) as $row) {
        $buzzytitletag = $row['buzzytitletag'];
        $buzzycolumns = $row['buzzycolumns'];
		$buzzysiteurl = $row['buzzysiteurl'];
		$buzzyanimationspeed = $row['buzzyanimationspeed'];
		$buzzymetatag = $row['buzzymetatag'];
		$buzzyfavicon = $row['buzzyfavicon'];
		$buzzyfacebookid=$row['buzzyfacebookid'];		
        ?>
    <?php } ?>
    <?php
    foreach ($connread->query($website_css_options_query) as $row) {
        $buzzycss_color_css = $row['buzzycss_color_css'];
		$buzzycss_headings_font_family = $row['buzzycss_headings_font_family'];
		$buzzycss_body_font_family = $row['buzzycss_body_font_family'];
        ?>
    <?php } ?>
	<?php
	$pagemetatag=$buzzymetatag;
	$pagetitletag=$buzzytitletag;
	?>
    <!-- CSS 3 STYLES --------- START -->
    <?php
    include 'HTML/css-styles.html';
    ?>
    <!-- CSS 3 STYLES --------- END -->	  
    <?php
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4)))
        $opacity = '1';
    else {
        $opacity = '0';
    }
    ?>
    <style>
        .grid li {
            opacity: <?php echo $opacity;?>;
        }
		
		.msg-div{
		margin-top:20px!imnportant;	
		background:#e0efff!important;
		}
    </style>
    <!-- JAVASCRIPT --------- START -->	
</head>
<body>
	   <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["hotnot-id"])) {				
	?>	
	<div class="se-pre-con"></div>
	<?php } ?>
	<?php } ?>		
	<script>
FB.api(
  'me/objects/article',
  'post',
  {
    og:url: http://samples.ogp.me/434264856596891,
    og:title: Sample Article,
    og:type: article,
    og:image: https://s-static.ak.fbcdn.net/images/devsite/attachment_blank.png,
    og:description: ,
    fb:app_id: <?php echo $buzzyfacebookid;?>
  },
  function(response) {
    // handle the response
  }
);
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=<?php echo $buzzyfacebookid;?>&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="fb-root"></div>
 <?php 
  if($buzzy_theme!=2){
 if (isset($_SESSION["buzzyuser_id"])) {
 ?>	 
<div class="fixed-cont">
<?php
 include 'HTML/fixed-cont.html'; 
 ?>
</div>
 <?php } ?>
 <?php } ?>
<?php include_once("analyticstracking.php"); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=<?php echo $buzzyfacebookid;?>&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div id="header-missing">
<p style="text-align:center!important; font-family:'Comfortaa'; font-size:36px!important; padding-top:8px!important; color:#fff; "><?php echo $buzzysitename;?> 
	</p>
</div>
<br>
<style>
.form-control{
font-size:14px!important;		
}
</style>
<?php
if(!isset($_GET["add-gender"]) AND !isset($_GET["add-so"]) AND !isset($_GET["add-main-image"]) AND !isset($_GET["full_name"])){
?>
<div style="margin:0 auto; width:128px!important;">
<img  src="<?php echo $link_prefix;?>img/calendar.png"  />
</div>
<h1 style="text-align:center;">You must add your birthday to proceed further</h1>
<br>
<div style="width:300px; margin:0 auto;">
<?php
if (isset($_POST['update-date'])) {	
$month=$_POST['month'];
	$day=$_POST['day'];	
	$year=$_POST['year'];
    $post_buzzyuser_birthdate=$year.'-'.$month.'-'.$day;	
$userbirthdate = date('Y-m-d', strtotime($post_buzzyuser_birthdate));
//get age from date or birthdate
$afrom = new DateTime($userbirthdate);
$ato   = new DateTime('today');
$postage =  $afrom->diff($ato)->y;	


$OK = false;
        $update_userbd_query = "UPDATE buzzyusers SET buzzyuser_birthdate=:buzzyuser_birthdate,buzzyuser_age=:buzzyuser_age WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_userbd_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_birthdate', $userbirthdate, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyuser_age', $postage, PDO::PARAM_STR);	
        // execute and get number of affected rows
        $stmt->execute();		
        $OK = $stmt->rowCount();	
	    header('Location: '.$link_prefix.'missing-data.php?add-gender=true');			
}
?>
<form action="" method="POST">
<select size="1" name="month"  class="form-control smallinput" style="width:80px!important; float:left!important; margin-right:15px!important;">
<option selected value="1">Jan</option>
<option value="2">Feb</option>
<option value="3">Mar</option>
<option value="4">Apr</option>
<option value="5">May</option>
<option value="6">Jun</option>
<option value="7">Jul</option>
<option value="8">Aug</option>
<option value="9">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select>
 <?php
    // build days menu
    echo '<select name="day" class="form-control smallinput" style="width:90px!important; float:left!important; margin-right:15px!important;">' . PHP_EOL;
    for ($d=1; $d<=31; $d++) {
        echo '  <option value="' . $d . '">' . $d . '</option>' . PHP_EOL;
    }
    echo '</select>' . PHP_EOL;
    $cutoff = 1917;

    // current year
    $now = date('Y');	
	    // build years menu
    echo '<select name="year" class="form-control smallinput" style="width:99px!important; margin-right:0px!important; float:left!important;">' . PHP_EOL;
    for ($y=1999; $y>=$cutoff; $y--) {
        echo '  <option value="' . $y . '">' . $y . '</option>' . PHP_EOL;
    }
    echo '</select>' . PHP_EOL;
?>
<div class="clearfix"></div>
<br>
<p style="text-align:center!important;">
<button type="submit" name="update-date" class="btn btn-primary btn-lg"><?php echo $submit_birthday;?></button>
</p>
</form>
<?php } ?>



<?php
if(isset($_GET["full_name"])){
?>
<h1 style="text-align:center;">Your full name</h1>
<br>
<div style="width:300px; margin:0 auto;">
<form action="" method="POST">
<h3><?php echo $first_name;?></h3>
 <input type="text" name="buzzyuser_first_name" placeholder="<?php echo $first_name;?>" required class="form-control"
                               id="recipient-name">
<h3><?php echo $last_name;?></h3>
 <input type="text" name="buzzyuser_last_name" placeholder="<?php echo $last_name;?>" required class="form-control"
                               id="recipient-name">
<button type="submit" name="update_fname" class="buttontr btn btn-primary">Update Full name</button>							   
</form>
</div>
<?php } ?>


<?php
if(isset($_GET["add-gender"]) AND !isset($_GET["add-so"])){
?>
<h1 style="text-align:center;">Choose your gender now.</h1>
<br>
<div style="width:300px; margin:0 auto;">
<a href="<?php echo $link_prefix;?>add-mgender.php" style="margin-right:40px;"><img data-toggle="tooltip" data-placement="bottom" title="Male"  src="<?php echo $link_prefix;?>img/maleicon.png" /></a>
<a href="<?php echo $link_prefix;?>add-fgender.php" ><img data-toggle="tooltip" data-placement="bottom" title="Female"  src="<?php echo $link_prefix;?>img/femaleicon.png" /></a>
</div>
<?php } ?>


<?php
if(isset($_GET["add-so"])){
if($session_buzzyuser_genre==0){
$het_text=$female;	
$hom_text=$male;	
$both_text=$both;	
}
else if($session_buzzyuser_genre==1){
$het_text=$male;	
$hom_text=$female;	
$both_text=$both;	
}	
else if($session_buzzyuser_genre==10){
	    header('Location: '.$link_prefix.'missing-data.php?add-gender=true');
}


if (isset($_POST['update_so'])) {	
$buzzyuser_data_sexual_orientation=$_POST['buzzyuser_data_sexual_orientation'];

$OK = false;
        $update_userbdaa_query = "UPDATE buzzyusers SET buzzyuser_data_sexual_orientation=:buzzyuser_data_sexual_orientation WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_userbdaa_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_data_sexual_orientation', $buzzyuser_data_sexual_orientation, PDO::PARAM_STR);	
        // execute and get number of affected rows
        $stmt->execute();		
        $OK = $stmt->rowCount();	
	    header('Location: '.$link_prefix.'missing-data.php?add-main-image=true');			
}
?>
<h1 style="text-align:center;">I want to meet</h1>
<br>
<div style="width:300px; margin:0 auto;">
<form action="" method="POST">
                 <select class="form-control" name="buzzyuser_data_sexual_orientation" required>
                    <option value="0">
                    <?php echo $het_text;?>
                    </option>
                    <option value="1">
                    <?php echo $hom_text;?>
                    </option>
                    <option value="2">
                    <?php echo $both_text;?>
                   </option>
                   </select>
				   <br>
				  <button type="submit" style="width:100%;" name="update_so" class="buttontr btn btn-primary btn-lg"><?php echo $submit;?></button>
</form>
				  </div>
<?php } ?>


<?php
if(isset($_GET["add-main-image"])){
?>
<h1 style="text-align:center;">Add profile image</h1>
<br>
<div style="max-width:480px; width:100%; margin:0 auto;">
    <div class="okvir">	
 <form method="post" id="dropper" enctype="multipart/form-data" action="">
       <input required type="file" accept='image/x-png, image/jpeg' name="userfile" />	
        <br>	   
       <button type="submit" name="add_profileimg"  class="btn btn-primary buttontr"><?php echo $add_profile_image;?></button>
     </form>
	 </div>
 </div>
<?php } ?>
</div>
<div class="clearfix"></div>
<!-- WRAPPER --------- END -->
<?php
  include 'HTML/modal-sweet-alerts.html';
  ?> 
<?php include 'slickpopups/login.html';?>  
<?php include 'slickpopups/register.html';?>  	
<?php include 'HTML/allslickmodalsjs.html';?>  
  <script>
   $(function () {
        $("[rel='tooltip']").tooltip();
    });
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
   container: 'body'
}); 
});
$('a[data-toggle="tooltip"]').tooltip({
   container: 'body'
});
$('i[data-toggle="tooltip"]').tooltip({
   container: 'body'
});
$('img[data-toggle="tooltip"]').tooltip({
   container: 'body'
});
$('div[data-toggle="tooltip"]').tooltip({
   container: 'body'
});
</script>
</body>
</html>