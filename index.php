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
if (isset($_GET["visitors-page"])) {
$visitors_page=htmlspecialchars($_GET["visitors-page"], ENT_QUOTES);
}
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
        if(isset($_GET['tnx-id'])) {	
        $tnx_id=$_GET['tnx-id']; 
	    if($tnx_id==$session_buzzyuser_fortumo_tnx) {
        $session_buzzyuser_creditsplus=$session_buzzyuser_credits+100;	
        $update_usercredits_query = "UPDATE buzzyusers SET buzzyuser_credits=:buzzyuser_credits WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_usercredits_query);
        // bind the parameters and execute the statement
	    $stmt->bindParam(':buzzyuser_credits', $session_buzzyuser_creditsplus, PDO::PARAM_STR);
	    // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount(); 
		
		$length = 10;
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$update_tnx_query = "UPDATE buzzyusers SET buzzyuser_fortumo_tnx=:buzzyuser_fortumo_tnx WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_tnx_query);
        // bind the parameters and execute the statement
	    $stmt->bindParam(':buzzyuser_fortumo_tnx', $randomString, PDO::PARAM_STR);
	    // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount(); 


      $item_number='2';
	  $payment_gross=$buzzyuserglobal_creditprice;	
      $currency_code='USD';	  
	  $payment_status ='Confirmed';
	$add_payment_query = "INSERT INTO  payments(item_number,txn_id,payment_gross,currency_code,payment_status,buzzyuser_id,transaction_time,payment_kind)
	  VALUES(:item_number,:txn_id,:payment_gross,:currency_code,:payment_status,:buzzyuser_id,:transaction_time,1)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_payment_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':item_number', $item_number, PDO::PARAM_STR);
        $stmt->bindParam(':txn_id', $tnx_id, PDO::PARAM_STR);	
        $stmt->bindParam(':payment_gross', $payment_gross, PDO::PARAM_STR);			
        $stmt->bindParam(':currency_code', $currency_code, PDO::PARAM_STR);
        $stmt->bindParam(':payment_status', $payment_status, PDO::PARAM_STR);			
		$stmt->bindParam(':buzzyuser_id',   $session_user_id, PDO::PARAM_STR);
		$stmt->bindParam(':transaction_time',   $now, PDO::PARAM_STR);		
	    // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	

	    header('Location:'.$link_prefix.'page.php?user-id='.$_SESSION["buzzyuser_id"].'&buyonesuccess=true');			
		}
       }
		   
if (isset($_SESSION["buzzyuser_id"])) {
if (isset($_GET["quiz"])) {
if(isset($_POST['yestwenty'])) {	
        $update_quiztwenty_query = "UPDATE buzzyquizanswers SET buzzyquizanswertwenty=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quiztwenty_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
header('Location:'.$link_prefix.'index.php?quiz=finished');		
}
else if(isset($_POST['notwenty'])) {	
        $update_quiztwenty_query = "UPDATE buzzyquizanswers SET buzzyquizanswertwenty=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quiztwenty_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	
header('Location:'.$link_prefix.'index.php?quiz=finished');			
}
}	
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
    <?php
    include 'HTML/css-styles.html';
    ?>
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
		/* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 99999999;
	background: url(<?php echo $link_prefix;?>img/Preloader_10.gif) center no-repeat #fff;
}
    </style>
</head>
<body 
<?php
 if($mobile_device_detected==TRUE)	
 {	
?>	
style="background:#fff!important;"
<?php } ?>
>
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
        if(($mobile_device_detected==FALSE) AND 2>5)	     
 {
	 ?>
	<div class="se-pre-con"></div>
 <?php } ?>
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

<br>
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
<div id="wrapper">
    <div class="full-column"> 
        <?php
        if (isset($_GET["likes-page"])) {
        if (isset($_SESSION["buzzyuser_id"])) {		
		include 'HTML/grid-list-all-likers.html';
		}
		}
		
		else if (isset($_GET["search-page"])) {
		$search_term=$_GET["search-page"];			
		if($mobile_device_detected==FALSE)	
        {			
		include 'HTML/grid-list-all-search.html';
		}
         else if($mobile_device_detected==TRUE)	
        {			
		include 'HTML/grid-list-all-mobile-search.html';
		}				
		}
		
        else if (isset($_GET["visitors-page"])) {
        if (isset($_SESSION["buzzyuser_id"])) {
        if($mobile_device_detected==FALSE)	
        {			
		include 'HTML/grid-list-all-visitors.html';
		}
         else if($mobile_device_detected==TRUE)	
        {			
		include 'HTML/grid-list-all-mobile-visitors.html';
		}	
		}
		}
        else{
        if($mobile_device_detected==FALSE)	
        {			
		include 'HTML/grid-list-all-users.html';
		}
         else if($mobile_device_detected==TRUE)	
        {			
		include 'HTML/grid-list-all-mobile-users.html';
		}		
		}		
		?>		
        <a href="#0" class="cd-top">Top</a>
        <script  src="<?php echo $link_prefix;?>js/main.js"></script>		
    </div>
<?php
  include 'HTML/footer.html';
?>
</div>
<?php if($buzzy_theme==2){
?>
</div>
<?php } ?>
<script src="<?php echo $link_prefix;?>js/masonry.pkgd.min.js"></script>
<script src="<?php echo $link_prefix;?>js/imagesloaded.js"></script>
<script src="<?php echo $link_prefix;?>js/classie.js"></script>
<script src="<?php echo $link_prefix;?>js/AnimOnScroll.min.js"></script>
<script src="<?php echo $link_prefix;?>animation-js/<?php echo $buzzyanimationspeed; ?>-animation.js"></script>
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
			<div class="span7 offset5"><a  href="<?php echo $link_prefix;?>oauth/fb/login_with_facebook-demo.php"><img src="<?php echo $link_prefix;?>img/fb-login.png" style="margin-left:30px!important; display: block; width:365px;" alt="Sign in with Facebook" title="Sign in with Facebook"></a></div>
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