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
if($session_buzzyuser_image=='profile-icon1.jpg' AND $session_buzzyuser_genre!=10 AND $session_buzzyuser_birthdate!='0000-00-00'){
header('Location:'.$link_prefix.'missing-data.php?add-main-image=true');	
}
else if($session_buzzyuser_genre==10 AND $session_buzzyuser_birthdate!='0000-00-00'){
header('Location:'.$link_prefix.'missing-data.php?add-gender=true');	
}
else if($session_buzzyuser_birthdate=='0000-00-00'){
header('Location:'.$link_prefix.'missing-data.php');	
}
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
$buddiess_countquery="SELECT COUNT(*) FROM buddies WHERE friend=$session_user_id OR user_id=$session_user_id";
foreach ($connread->query($buddiess_countquery) as $row) { 
$count_total_buddiess=$row['COUNT(*)'];	
}
echo $count_total_buddiess;
if($count_total_buddiess==0){
header('Location: '.$link_prefix.'page.php?no-friends=true');		
}	
	else if($count_total_buddies==1){
	$no_buddies_info='';	
	}	
   else{
	$no_buddies_info='';	   
   }
$friends_page=htmlspecialchars($_GET["friends"], ENT_QUOTES);
}
else if (isset($_GET["session-gallery-id"])) {
if(!is_numeric($_GET["session-gallery-id"])){
     header('Location: '.$link_prefix.'index.php');	
}
$session_gallery_id=htmlspecialchars($_GET["session-gallery-id"], ENT_QUOTES);
}
else if (isset($_GET["profile-img-id"])) {
if(!is_numeric($_GET["profile-img-id"])){
     header('Location: '.$link_prefix.'index.php');	
}	
$profile_img_id=htmlspecialchars($_GET["profile-img-id"], ENT_QUOTES);
}


else if (isset($_GET["photo-review-id"])) {
if(!is_numeric($_GET["photo-review-id"])){
     header('Location: '.$link_prefix.'index.php');	
}	
$photo_review_id=htmlspecialchars($_GET["photo-review-id"], ENT_QUOTES);
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
 if (isset($_SESSION["buzzyuser_id"])) {	 
if($session_buzzyuser_image=='profile-icon1.jpg' AND $session_buzzyuser_location!='' AND $session_buzzyuser_genre!=10 AND $session_buzzyuser_birthdate!='0000-00-00' AND ($session_buzzyuser_first_name!='' OR $session_buzzyuser_last_name!='')){
header('Location:'.$link_prefix.'missing-data.php?add-main-image=true');	
}
else if($session_buzzyuser_image!='profile-icon1.jpg' AND $session_buzzyuser_location=='' AND $session_buzzyuser_genre!=10 AND $session_buzzyuser_birthdate!='0000-00-00' AND ($session_buzzyuser_first_name!='' OR $session_buzzyuser_last_name!='')){
header('Location:'.$link_prefix.'missing-data.php?location=true');	
}
else if($session_buzzyuser_genre==10 AND $session_buzzyuser_location!='' AND $session_buzzyuser_birthdate!='0000-00-00' AND ($session_buzzyuser_first_name!='' OR $session_buzzyuser_last_name!='')){
header('Location:'.$link_prefix.'missing-data.php?add-gender=true');	
}
else if($session_buzzyuser_birthdate=='0000-00-00' AND $session_buzzyuser_location!='' AND ($session_buzzyuser_first_name!='' OR $session_buzzyuser_last_name!='')){
header('Location:'.$link_prefix.'missing-data.php');	
}  
else if($session_buzzyuser_first_name=='' OR $session_buzzyuser_last_name==''){
header('Location:'.$link_prefix.'missing-data.php?full_name=true');	
}  
else if($session_buzzyuser_location==', '){
header('Location:'.$link_prefix.'missing-data.php?location=true');	
}  
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
if (isset ($_SESSION["buzzyadmin_id"])){
?>
<div id="header-admin" style="margin-bottom:-10px;">
<?php include 'HTML/header-admin.html';?>
</div>
<br><br>
<?php } ?>
<?php
if (isset ($_SESSION["buzzyadmin_id"])){
?>
<?php include 'HTML/css-fixed-options.html';?>
<?php include 'HTML/seo-fixed-options.html';?>
<?php include 'HTML/theme-fixed-options.html';?>
<?php } ?>
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

<!-- HEADER --------- START -->
<div id="superhead">
<?php if($buzzy_theme!=2 AND $buzzy_theme!=4){
?>
<div id="header">
<?php } ?>
<?php if($buzzy_theme==2){
?>
<div id="header" style="background:#fff!important;
border-bottom:1px solid #ccc!important; height:50px!important;">
<?php } ?>
<?php if($buzzy_theme==4){
?>
<div id="header" style="background:#fff!important;
border-bottom:1px solid #ccc!important; height:50px!important;">
<?php } ?>
	<?php 
	include 'HTML/mobile-nav.html';
	?>	
<div class="wrapper">
    <?php
    include 'HTML/header.html';
    ?>
</div>
</div>
</div>

<!-- HEADER --------- END -->
<br>
<!-- WRAPPER --------- START -->
<?php if($buzzy_theme==2){
?>
<div id="superwrapper">
<?php
if (!isset($_SESSION["buzzyuser_id"])) {
?>	 
<div class="fixed-cont">
<?php
 include 'HTML/fixed-reg.html'; 
?>
</div>
<?php } ?>

<?php
if (isset($_SESSION["buzzyuser_id"])) {
?>	 
<div class="fixed-cont">
<?php
 include 'HTML/fixed-cont.html'; 
?>
</div>
<?php } ?>
<?php } ?>


<?php
if (isset ($_GET['add-image-success'])){ 
$final_image_ppp=$final_image_prefix . $session_buzzyuser_image;
$final_image_ppp_t='thumb-'.$final_image_ppp;
echo resize_and_crop($final_image_ppp, $final_image_ppp_t, '200', '200', $quality=75);  
?>
<?php } ?>

<div id="wrapper">
    <div class="full-column"  
    style="min-height:100vh; background:#fbfdff!important; margin-top:-40px!important;	-webkit-box-shadow: 0px 1px 1px 1px rgba(190,190,190,0.5);
-moz-box-shadow: 0px 1px 1px 1px rgba(190,190,190,0.5);
box-shadow: 0px 1px 1px 1px rgba(190,190,190,0.5);"
>
	<?php if($buzzy_theme==0){?>
	<br><br>
	<?php } ?> 
	
	<?php if($buzzy_theme==2){?>
	<div class="badoofixer">
	<br><br>
	</div>
	<?php } ?> 		
<div class="mobile-fixer">
	   <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["user-id"])){		   
	   if ($user_id==$session_user_id){		   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/session-page.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>
	   <?php } ?>	   
	   <?php } ?>

	   
		<?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["user-id-new"])){		   
	   if ($user_id==$session_user_id){		   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/session-page-new.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>
	   <?php } ?>	   
	   <?php } ?>   
	   
	   <?php 
       if (!isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["user-id"])) {	
	   if ($buzzyuser_privacy==0){
  if($mobile_device_detected==FALSE)	
        {			
		include 'HTML/user-page.html';
		}
         else if($mobile_device_detected==TRUE)	
        {			
		include 'HTML/user-mobile-page.html';
		}		   
	   }
	   else if ($buzzyuser_privacy==1){
       include 'HTML/private-page.html';
	   }	   
       ?>	     
	   <?php } ?>	 
	   <?php } ?>

       <!-- REGULAR USER PAGE --------- START -->	
	   <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["user-id"])) {		   
	   if ($user_id!=$session_user_id){
 
     if($mobile_device_detected==FALSE)	
        {			
		include 'HTML/user-page.html';
		}
         else if($mobile_device_detected==TRUE)	
        {			
		include 'HTML/user-mobile-page.html';
		}	

	   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>
	   <?php } ?>	 
	   <?php } ?>	

        <!-- REGULAR USER PAGE --------- END -->
	

       <!-- REGULAR USER PAGE --------- START -->	
	   <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["friends"])) {		   
	   if ($friends_page==$session_user_id){		   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/allfriends-page.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>
	   <?php } ?>	 
	   <?php } ?>	
        <!-- REGULAR USER PAGE --------- END -->	

       <!-- MISING AGE PAGE --------- START -->	
	   <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["missing-age"])) {	
		header('Location:'.$link_prefix.'missing-data.php');	   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>	 
	   <?php } ?>	
        <!-- MISING AGE PAGE --------- END -->			
		
		
       <!-- PHOTO REVIEW PAGE --------- START -->	
	   <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["photo-review-id"])) {		   		   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/photo-review.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>	 
	   <?php } ?>	

        <!-- PHOTO REVIEW PAGE --------- END -->





	
	   <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["my-settings"])) {		   		   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/settings-page.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>
	   <?php } ?>	
	
	   <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["session-gallery-id"])) {		   
	   if ($session_gallery_id==$session_user_id){		   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/session-gallery-page.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>
	   <?php } ?>	 
	   <?php } ?>	

       <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["notifications"])) {		   
	   if ($notification_page==$session_user_id){		   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/notification-page.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>
	   <?php } ?>	 
	   <?php } ?>		

	   
       <?php 
       if (isset($_GET["no-criteria"])) {		   	   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/no-criteria.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>	
	   
	   <?php 
       if (isset($_GET["no-matches"])) {		   	   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/no-matches.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>	   

	   <?php 
       if (isset($_GET["no-friends"])) {		   	   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/no-friends.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>	

	   <?php 
       if (isset($_GET["your-status"])) {		   	   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/your-status.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>	
	   
	
       <?php 
       if (isset($_GET["custom-page"])) {		   	   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/custom-page.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>

       <?php 
       if (isset($_GET["no-visitors"])) {		   	   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/no-visitors.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>	   

       <?php 
       if (isset($_GET["no-likers"])) {		   	   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/no-likers.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>	
	   
       <?php 
       if (isset($_GET["privacy"])) {		   		   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/privacy-page.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>
	   
       <?php 
       if (isset($_GET["terms"])) {		   		   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/terms-page.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>


       <?php 
       if (isset($_GET["visitors-page"])) {		   		   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/visitors-page.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>	   

	   
       <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["matches"])) {		   
	   if ($matches_page==$session_user_id){		   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/my-matches.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>
	   <?php } ?>	 
	   <?php } ?>		   

       <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["favorites-page"])) {		   		   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/favorites-page.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>	 
	   <?php } ?>	
	   
	   <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["session-gallery-id"])) {		   
	   if ($session_gallery_id!=$session_user_id){		   
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php 
		header('Location: '.$link_prefix.'index.php'); 
		?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>
	   <?php } ?>	 
	   <?php } ?>		
	
	   <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["hotnot-id"])) {	
	   if ($_GET["hotnot-id"]=='true'){		   
       ?>
       <div id="hotnotpage">	   
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/hotnot-page.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   </div>
	   <?php } ?>	   
       <?php if ($_GET["hotnot-id"]!='true'){	
       header('Location: '.$link_prefix.'index.php');			   
       ?>	 
	   <?php } ?>		      
	   <?php } ?>	   
	   <?php } ?>	 
			
	   	   
	   <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["profile-img-id"])) {		   
	   if ($profile_img_id==$session_user_id){		   
       ?>	 
        <!-- MY PROFILE IMAGE PAGE --------- START -->
        <?php include 'HTML/profile-img-pageold.html'; ?>
        <!-- MY PROFILE IMAGE PAGE --------- END -->
	   <?php } ?>
       <?php if ($profile_img_id!=$session_user_id){	
       header('Location: '.$link_prefix.'index.php');			   
       ?>	 
	   <?php } ?>	   
	   <?php } ?>
	   <?php } ?>

	   <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["gallery-img-id"])) {		   
	   if ($gallery_img_id==$session_user_id){		   
       ?>	 
        <!-- MY PROFILE IMAGE PAGE --------- START -->
        <?php include 'HTML/gallery-img-pageold.html'; ?>
        <!-- MY PROFILE IMAGE PAGE --------- END -->
	   <?php } ?>   
       <?php if ($gallery_img_id!=$session_user_id){	
       header('Location: '.$link_prefix.'index.php');			   
       ?>	 
	   <?php } ?>		      
	   <?php } ?>
	   <?php } ?>	 	   
        <a href="#0" class="cd-top">Top</a>
        <script  async src="<?php echo $link_prefix;?>js/main.js"></script>		
        <!-- Gem jQuery -->
     <div style="bottom:0px!important;">
	 <?php
      include 'HTML/footer.html';
     ?>
	 </div>
    </div>
	  <script src='https://assets.fortumo.com/fmp/fortumopay.js' type='text/javascript'></script>	  
</div>
</div>
<?php if($buzzy_theme==2){
?>
</div>
<?php } ?>

<!-- WRAPPER --------- END -->

<?php
  include 'HTML/modal-sweet-alerts.html';
  ?> 
  <?php
if (isset($_SESSION["buzzyuser_id"])) {
if($session_buzzyuser_email==''){
?>
<script>
	swal({ 
	title:'<i></i>', 
	html:'<h3>Your email is empty. Edit your profile and enter your email there.</h3>',
	type: "info"
	});
</script>
<?php } ?>
<?php } ?>
<div class="modal fade" data-easein="flipBounceYIn"  id="exampleModal238" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" ><?php echo $sign_in;?></h4>
      </div>
		<!-- Start of For Social login Buttons -->
		<br>
		<?php 
		if ($buzzywebsite_status==0){
		?>
		<div class="row">
			<div class="span7 offset5"><a  href="<?php echo $link_prefix;?>oauth/fb/login_with_facebook.php"><img src="<?php echo $link_prefix;?>img/fb-login.png" style="margin-left:30px!important; display: block; width:365px;" alt="Sign in with Facebook" title="Sign in with Facebook"></a></div>
		</div>
		<?php } ?>

		<?php 
		if ($buzzywebsite_status==1){
		?>
		<div class="row">
			<div class="span7 offset5"><a  href="<?php echo $link_prefix;?>oauth/fb/login_with_facebook.php"><img src="<?php echo $link_prefix;?>img/fb-login.png" style="margin-left:30px!important; display: block; width:365px;" alt="Sign in with Facebook" title="Sign in with Facebook"></a></div>
		</div>
		<?php } ?>		
		<!-- End of For Social login Buttons -->
	     <form action="#" method="POST">
      <div class="modal-body">
		  <div class="form-group">
            <label class="control-label"><?php echo $email;?>:</label>
            <input type="email" name="buzzyuser_email" value="<?php echo $log_user;?>" required class="form-control" >
          </div>
		  <div class="form-group">
            <label class="control-label"><?php echo $password;?>:</label>
            <input type="password" name="buzzyuser_password" value="<?php echo $log_pwd;?>" required class="form-control" >
          </div>
      <div id="status">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="buttontr btn btn-info" data-dismiss="modal"><?php echo $close;?></button>
        <button type="submit" name="login" data-target="#error" class="buttontr  btn btn-primary login"><?php echo $login;?></button>
      </div>
	  </form>
    </div>
  </div>
</div>
<?php include 'slickpopups/login.html';?>  
<?php include 'slickpopups/register.html';?>  	
<?php include 'HTML/allslickmodalsjs.html';?>  

</body>
</html>