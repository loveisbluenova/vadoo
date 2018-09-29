<?php
ob_start('ob_gzhandler');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$ip = $_SERVER['REMOTE_ADDR'];
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
include 'PHP/addprofileimagecodeold.php';	
include 'PHP/addgalleryimagecodeold.php';	
if (isset($_GET["user-id"])) {
$user_id=htmlspecialchars($_GET["user-id"], ENT_QUOTES);
include 'PHP/usercode.php';
} 
else if (isset($_GET["session-gallery-id"])) {
$session_gallery_id=htmlspecialchars($_GET["session-gallery-id"], ENT_QUOTES);
}
else if (isset($_GET["profile-img-id"])) {
$profile_img_id=htmlspecialchars($_GET["profile-img-id"], ENT_QUOTES);
}
else if (isset($_GET["gallery-img-id"])) {
$gallery_img_id=htmlspecialchars($_GET["gallery-img-id"], ENT_QUOTES);
}
else if (isset($_GET["notifications"])) {
$notification_page=htmlspecialchars($_GET["notifications"], ENT_QUOTES);
}
else if (isset($_GET["matches"])) {
$matches_page=htmlspecialchars($_GET["matches"], ENT_QUOTES);
}
else if (isset($_GET["privacy"])) {
$privacy_page=htmlspecialchars($_GET["privacy"], ENT_QUOTES);
}
else if (isset($_GET["terms"])) {
$terms_page=htmlspecialchars($_GET["terms"], ENT_QUOTES);
}
else if (isset($_GET["my-settings"])) {
$my_settings=htmlspecialchars($_GET["my-settings"], ENT_QUOTES);
}
else if (isset($_GET["no-criteria"])) {
$no_criteria=htmlspecialchars($_GET["no-criteria"], ENT_QUOTES);
}

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
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
	   <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["hotnot-id"])) {				
	?>	
	<script>
	$(document).ready(function() {
	
	setTimeout(function(){
		$('body').addClass('loaded');
	}, 100);
	
    });
	</script>	
	<?php } ?>
	<?php } ?>	
</head>
<body>
	   <?php 
       if (isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["hotnot-id"])) {		   	   
       ?>		
		<div id="loader-wrapper">
			<div id="loader"></div>

			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
		</div>
	<?php } ?>
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
<div id="header">
	<?php 
	include 'HTML/mobile-nav.html';
	?>	
<div class="wrapper">
    <?php
    include 'HTML/header.html';
    ?>
</div>
</div>
<!-- HEADER --------- END -->
<br>
<!-- WRAPPER --------- START -->
<div id="wrapper">
    <div class="full-column"> 
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
       if (!isset($_SESSION["buzzyuser_id"])) {
       if (isset($_GET["user-id"])) {	
	   if ($buzzyuser_privacy==0){
       include 'HTML/user-page.html';
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
       ?>	 
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/user-page.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
	   <?php } ?>
	   <?php } ?>	 
	   <?php } ?>	

        <!-- REGULAR USER PAGE --------- END -->
	   
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
       ?>	  
        <!-- MY SESSION PAGE --------- START -->
        <?php include 'HTML/hotnot-page.html'; ?>
        <!-- MY SESSION PAGE --------- END -->
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
	   <?php } ?>
	   <?php } ?>	 	   
        <a href="#0" class="cd-top">Top</a>
        <script  async src="<?php echo $link_prefix;?>js/main.js"></script>		
        <!-- Gem jQuery -->
    </div>
	  <script src='https://assets.fortumo.com/fmp/fortumopay.js' type='text/javascript'></script>
<?php
  include 'HTML/footer.html';
?>
</div>
</div>

<!-- WRAPPER --------- END -->

<?php
  include 'HTML/modal-sweet-alerts.html';
?>

</body>
</html>