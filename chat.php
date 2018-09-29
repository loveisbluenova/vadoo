<?php
ob_start('ob_gzhandler');
// Collect this information on every request
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
	
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$ip = $_SERVER['REMOTE_ADDR'];
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
if($mobile_device_detected==TRUE)	
{
header("Location: mobile-chat.php");	
}
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
$base_url=$link_prefix;
if (isset($_GET["user-id"])) {
$user_id=htmlspecialchars($_GET["user-id"], ENT_QUOTES);
include 'PHP/usercode.php';
}
else if (isset($_GET["profile-img-id"])) {
$profile_img_id=htmlspecialchars($_GET["profile-img-id"], ENT_QUOTES);
}
else if (isset($_GET["gallery-img-id"])) {
$gallery_img_id=htmlspecialchars($_GET["gallery-img-id"], ENT_QUOTES);
}
$website_ffcountfriends_query = "SELECT COUNT(*) FROM  buddies WHERE user_id=$session_user_id OR friend=$session_user_id";
foreach ($connread->query($website_ffcountfriends_query) as $row) {
		 $count_fab=$row['COUNT(*)'];
		 if($count_fab==0){
       header("Location: index.php?messagenot=true");
		 }
		 }	
if (!isset($_SESSION["buzzyuser_id"])) {
header('Location: '.$link_prefix.'register.php');	
}


		 
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
	input.type-a-message-box{
	 border:0px solid #fffddf!important;	
	}
	input.type-a-message-box:focus{
    background:#fff;	
	 border:0px solid #fffddf!important;		
	}
	.text-muted{
    color:#<?php echo $buzzycss_color_css;?>;		
    font-weight:700;
	font-size:15px;
	}
	.triangle-obtuse {
  position:relative;
  padding:15px;
  margin:1em 0 3em;
  color:#fff;
  background:#c81e2b;
  /* css3 */
  background:-webkit-gradient(linear, 0 0, 0 100%, from(#f04349), to(#c81e2b));
  background:-moz-linear-gradient(#f04349, #c81e2b);
  background:-o-linear-gradient(#f04349, #c81e2b);
  background:linear-gradient(#f04349, #c81e2b);
  -webkit-border-radius:10px;
  -moz-border-radius:10px;
  border-radius:10px;
}

/* Variant : for top positioned triangle
------------------------------------------ */

.triangle-obtuse.top {
  background:-webkit-gradient(linear, 0 0, 0 100%, from(#c81e2b), to(#f04349));
  background:-moz-linear-gradient(#c81e2b, #f04349);
  background:-o-linear-gradient(#c81e2b, #f04349);
  background:linear-gradient(#c81e2b, #f04349);
}

/* Variant : for left positioned triangle
------------------------------------------ */

.triangle-obtuse.left {
  margin-left:50px;
  background:#c81e2b;
}

/* Variant : for right positioned triangle
------------------------------------------ */

.triangle-obtuse.right {
  margin-right:50px;
  background:#c81e2b;
}

/* THE TRIANGLE
------------------------------------------------------------------------------------------------------------------------------- */

/* creates the wider right-angled triangle */
.triangle-obtuse:before {
  content:"";
  position:absolute;
  bottom:-20px; /* value = - border-top-width - border-bottom-width */
  left:60px; /* controls horizontal position */
  border:0;
  border-right-width:30px; /* vary this value to change the angle of the vertex */
  border-bottom-width:20px; /* vary this value to change the height of the triangle. must be equal to the corresponding value in :after */
  border-style:solid;
  border-color:transparent #c81e2b;
  /* reduce the damage in FF3.0 */
  display:block;
  width:0;
}

/* creates the narrower right-angled triangle */
.triangle-obtuse:after {
  content:"";
  position:absolute;
  bottom:-20px; /* value = - border-top-width - border-bottom-width */
  left:80px; /* value = (:before's left) + (:before's border-right/left-width)  - (:after's border-right/left-width) */
  border:0;
  border-right-width:10px; /* vary this value to change the angle of the vertex */
  border-bottom-width:20px; /* vary this value to change the height of the triangle. must be equal to the corresponding value in :before */
  border-style:solid;
  border-color:transparent #fff;
  /* reduce the damage in FF3.0 */
  display:block;
  width:0;
}

/* Variant : top
------------------------------------------ */

.triangle-obtuse.top:before {
  top:-20px; /* value = - border-top-width - border-bottom-width */
  bottom:auto;
  left:auto;
  right:60px; /* controls horizontal position */
  border:0;
  border-left-width:30px; /* vary this value to change the width of the triangle */
  border-top-width:20px; /* vary this value to change the height of the triangle. must be equal to the corresponding value in :after */
  border-color:transparent #c81e2b;
}

.triangle-obtuse.top:after {
  top:-20px; /* value = - border-top-width - border-bottom-width */
  bottom:auto;
  left:auto;
  right:80px; /* value = (:before's right) + (:before's border-right/left-width)  - (:after's border-right/left-width) */
  border-width:0;
  border-left-width:10px; /* vary this value to change the width of the triangle */
  border-top-width:20px; /* vary this value to change the height of the triangle. must be equal to the corresponding value in :before */
  border-color:transparent #fff;
}

/* Variant : left
------------------------------------------ */

.triangle-obtuse.left:before {
  top:15px; /* controls vertical position */
  bottom:auto;
  left:-50px; /* value = - border-left-width - border-right-width */
  border:0;
  border-bottom-width:30px; /* vary this value to change the height of the triangle */
  border-left-width:50px; /* vary this value to change the width of the triangle. must be equal to the corresponding value in :after */
  border-color:#c81e2b transparent;
}

.triangle-obtuse.left:after {
  top:35px; /* value = (:before's top) + (:before's border-top/bottom-width)  - (:after's border-top/bottom-width) */
  bottom:auto;
  left:-50px; /* value = - border-left-width - border-right-width */
  border:0;
  border-bottom-width:10px; /* vary this value to change the height of the triangle */
  border-left-width:50px; /* vary this value to change the width of the triangle. must be equal to the corresponding value in :before */
  border-color:#fff transparent;
}

/* Variant : right
------------------------------------------ */

.triangle-obtuse.right:before {
  top:15px; /* controls vertical position */
  bottom:auto;
  left:auto;
  right:-50px; /* value = - border-left-width - border-right-width */
  border:0;
  border-bottom-width:30px; /* vary this value to change the height of the triangle */
  border-right-width:50px; /* vary this value to change the width of the triangle. must be equal to the corresponding value in :after */
  border-color:#c81e2b transparent;
}

.triangle-obtuse.right:after {
  top:35px; /* value = (:before's top) + (:before's border-top/bottom-width)  - (:after's border-top/bottom-width) */
  bottom:auto;
  right:-50px; /* value = - border-left-width - border-right-width */
  left:auto;
  border:0;
  border-bottom-width:10px; /* vary this value to change the height of the triangle */
  border-right-width:50px; /* vary this value to change the width of the triangle. must be equal to the corresponding value in :before */
  border-color:#fff transparent;
}


/* ============================================================================================================================
== BUBBLE WITH A BORDER AND TRIANGLE
** ============================================================================================================================ */

/* THE SPEECH BUBBLE
------------------------------------------------------------------------------------------------------------------------------- */

.triangle-border {
  position:relative;
  padding:15px;
  margin:1em 0 3em;
  border:5px solid #5a8f00;
  color:#333;
  background:#fff;
  /* css3 */
  -webkit-border-radius:10px;
  -moz-border-radius:10px;
  border-radius:10px;
}

/* Variant : for left positioned triangle
------------------------------------------ */

.triangle-border.left {
  margin-left:30px;
}

/* Variant : for right positioned triangle
------------------------------------------ */

.triangle-border.right {
  margin-right:30px;
}

/* THE TRIANGLE
------------------------------------------------------------------------------------------------------------------------------- */

.triangle-border:before {
  content:"";
  position:absolute;
  bottom:-20px; /* value = - border-top-width - border-bottom-width */
  left:40px; /* controls horizontal position */
  border-width:20px 20px 0;
  border-style:solid;
  border-color:#5a8f00 transparent;
  /* reduce the damage in FF3.0 */
  display:block;
  width:0;
}

/* creates the smaller  triangle */
.triangle-border:after {
  content:"";
  position:absolute;
  bottom:-13px; /* value = - border-top-width - border-bottom-width */
  left:47px; /* value = (:before left) + (:before border-left) - (:after border-left) */
  border-width:13px 13px 0;
  border-style:solid;
  border-color:#fff transparent;
  /* reduce the damage in FF3.0 */
  display:block;
  width:0;
}

/* Variant : top
------------------------------------------ */

/* creates the larger triangle */
.triangle-border.top:before {
  top:-20px; /* value = - border-top-width - border-bottom-width */
  bottom:auto;
  left:auto;
  right:40px; /* controls horizontal position */
  border-width:0 20px 20px;
}

/* creates the smaller  triangle */
.triangle-border.top:after {
  top:-13px; /* value = - border-top-width - border-bottom-width */
  bottom:auto;
  left:auto;
  right:47px; /* value = (:before right) + (:before border-right) - (:after border-right) */
  border-width:0 13px 13px;
}

/* Variant : left
------------------------------------------ */

/* creates the larger triangle */
.triangle-border.left:before {
  top:10px; /* controls vertical position */
  bottom:auto;
  left:-30px; /* value = - border-left-width - border-right-width */
  border-width:15px 30px 15px 0;
  border-color:transparent #94cdf9;

}
.triangle-isosceles:after {
  content:"";
  position:absolute;
  bottom:-15px; /* value = - border-top-width - border-bottom-width */
  left:50px; /* controls horizontal position */
  border-width:15px 15px 0; /* vary these values to change the angle of the vertex */
  border-style:solid;
  border-color:#f3961c transparent;
  /* reduce the damage in FF3.0 */
  display:block;
  width:0;
}

/* Variant : top
------------------------------------------ */

.triangle-isosceles.top:after {
  top:-15px; /* value = - border-top-width - border-bottom-width */
  right:50px; /* controls horizontal position */
  bottom:auto;
  left:auto;
  border-width:0 15px 15px; /* vary these values to change the angle of the vertex */
  border-color:#f3961c transparent;
}

/* Variant : left
------------------------------------------ */

.triangle-isosceles.left:after {
  top:16px; /* controls vertical position */
  left:-50px; /* value = - border-left-width - border-right-width */
  bottom:auto;
  border-width:10px 50px 10px 0;
  border-color:transparent #f3961c;
}

/* Variant : right
------------------------------------------ */

.triangle-isosceles.right:after {
  top:16px; /* controls vertical position */
  right:-50px; /* value = - border-left-width - border-right-width */
  bottom:auto;
  left:auto;
  border-width:10px 0 10px 50px;
  border-color:transparent #f3961c;
}


/* ============================================================================================================================
== BUBBLE WITH A RIGHT-ANGLED TRIANGLE
** ============================================================================================================================ */

/* THE SPEECH BUBBLE
------------------------------------------------------------------------------------------------------------------------------- */

.triangle-right {
  position:relative;
  padding:15px;
  margin:1em 0 3em;
  color:#fff;
  background:#075698; /* default background for browsers without gradient support */
  /* css3 */
  background:-webkit-gradient(linear, 0 0, 0 100%, from(#2e88c4), to(#075698));
  background:-moz-linear-gradient(#2e88c4, #075698);
  background:-o-linear-gradient(#2e88c4, #075698);
  background:linear-gradient(#2e88c4, #075698);
  -webkit-border-radius:10px;
  -moz-border-radius:10px;
  border-radius:10px;
}

/* Variant : for top positioned triangle
------------------------------------------ */

.triangle-right.top {
  background:-webkit-gradient(linear, 0 0, 0 100%, from(#075698), to(#2e88c4));
  background:-moz-linear-gradient(#075698, #2e88c4);
  background:-o-linear-gradient(#075698, #2e88c4);
  background:linear-gradient(#075698, #2e88c4);
}

/* Variant : for left positioned triangle
------------------------------------------ */

.triangle-right.left {
  margin-left:40px;
  background:#075698;
}

/* Variant : for right positioned triangle
------------------------------------------ */

.triangle-right.right {
  margin-right:40px;
  background:#075698;
}

/* THE TRIANGLE
------------------------------------------------------------------------------------------------------------------------------- */

.triangle-right:after {
  content:"";
  position:absolute;
  bottom:-20px; /* value = - border-top-width - border-bottom-width */
  left:50px; /* controls horizontal position */
  border-width:20px 0 0 20px; /* vary these values to change the angle of the vertex */
  border-style:solid;
  border-color:#075698 transparent;
  /* reduce the damage in FF3.0 */
  display:block;
  width:0;
}

/* Variant : top
------------------------------------------ */

.triangle-right.top:after {
  top:-20px; /* value = - border-top-width - border-bottom-width */
  right:50px; /* controls horizontal position */
  bottom:auto;
  left:auto;
  border-width:20px 20px 0 0; /* vary these values to change the angle of the vertex */
  border-color:transparent #075698;
}

/* Variant : left
------------------------------------------ */

.triangle-right.left:after {
  top:16px;
  left:-40px; /* value = - border-left-width - border-right-width */
  bottom:auto;
  border-width:15px 40px 0 0; /* vary these values to change the angle of the vertex */
  border-color:transparent #075698;
}

/* Variant : right
------------------------------------------ */

.triangle-right.right:after {
  top:16px;
  right:-40px; /* value = - border-left-width - border-right-width */
  bottom:auto;
  left:auto;
  border-width:15px 0 0 40px; /* vary these values to change the angle of the vertex */
  border-color:transparent #075698 ;
}


/* ============================================================================================================================
== BUBBLE WITH AN OBTUSE TRIANGLE
** ============================================================================================================================ */
/* creates the smaller  triangle */
.triangle-border.left:after {
  top:16px; /* value = (:before top) + (:before border-top) - (:after border-top) */
  bottom:auto;
  left:-21px; /* value = - border-left-width - border-right-width */
  border-width:9px 21px 9px 0;
  border-color:transparent #94cdf9;
}

/* Variant : right
------------------------------------------ */

/* creates the larger triangle */
.triangle-border.right:before {
  top:10px; /* controls vertical position */
  bottom:auto;
  left:auto;
  right:-30px; /* value = - border-left-width - border-right-width */
  border-width:15px 0 15px 30px;
  border-color:transparent #5a8f00;
}

/* creates the smaller  triangle */
.triangle-border.right:after {
  top:16px; /* value = (:before top) + (:before border-top) - (:after border-top) */
  bottom:auto;
  left:auto;
  right:-21px; /* value = - border-left-width - border-right-width */
  border-width:9px 0 9px 21px;
  border-color:transparent #fff;
}



/* ============================================================================================================================
== SPEECH BUBBLE ICON
** ============================================================================================================================ */

.example-commentheading {
  position:relative;
  padding:0;
  color:#b513af;
}

/* creates the rectangle */
.example-commentheading:before {
  content:"";
  position:absolute;
  top:9px;
  left:-25px;
  width:15px;
  height:10px;
  background:#b513af;
  /* css3 */
  -webkit-border-radius:3px;
  -moz-border-radius:3px;
  border-radius:3px;
}

/* creates the triangle */
.example-commentheading:after {
  content:"";
  position:absolute;
  top:15px;
  left:-19px;
  border:4px solid transparent;
  border-left-color:#b513af;
  /* reduce the damage in FF3.0 */
  display:block;
  width:0;
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
ul.tab {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
border:1px solid #f0f0f0; 
    background-color: #f1f1f1;
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
    display: inline-block;
    color: black;
    text-align: center;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
ul.tab li a:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    border-top: none;
}
.content-wrap{
	
}

.msn{
	width:calc(100%-278px)!important;
}
        .grid li {
            opacity: <?php echo $opacity;?>;
        }	
		.msg-div{
		margin-top:20px!imnportant;	
		background:#e0efff!important;
		}
		textarea{
		font-size:12px!important;	
		height:100px!important;
		}
		.msg-div{
		margin-top:10px!important;	
		margin-left:10px!important;
		margin-right:10px!important;			
		background:none!important;
		border:1px solid none!important;
		}
		.media-body{
		font-size:12px!important;	
		}
		.note-dialog{
  .modal-dialog{
    z-index: @zindex-modal;
  }
}
 .modal-backdrop { z-index: -999999!important; }
 
.emots,.loves{
background:#f8f8f8!important;	
border:1px solid #f0f0f0; 
width:96%!important;
margin-left:2%!important;
margin-right:2%!important;
 }  
 #text-chatmessages-request{
  border-left:1px solid #eee!important;	 
 }
 
 .msg-third-column{
  width:240px;	
float:left;  
 }
 .chattsmall{
display:none;	
}
.chatmessages-box .border-bottom{
border:0px solid #fff;	
}
.chatmessages-box .active-message{
background:#<?php echo $final_style_color;?>;
color:#fff!important;	
}
h4.no-margin
{
color:#fff!important;	
}
span#last-seen{
color:#fff!important;	
}
#text-chatmessages{
height:400px!important;
overflow-y:scroll;	
}
#text-chatmessages-request{
border-left:0px solid #fff!important;	
}
.content-wrap{
box-shadow:1px 1px 1px 0px #dfdfdf;	
}
.imgdd{
padding-right:10px!important;	
}
.msgyou-div{
color:#fff!important;
margin-bottom:30px;
 border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;
width:280px;
float:right;
}
.msgus-div{	
color:#fff!important;
margin-bottom:30px;
 border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;
width:280px;
float:left;
}
.chatmessages-box a.text-inverse{
color:#fff!important;	
}
  @media only screen and (max-width : 768px) 
            {
				
.imgdd{
padding-right:0px!important;	
}				
 .msg-third-column{
  width:62px;	
float:left;  
 }  		
.chatt{
display:none;	
} 
.chattsmall{
display:block;	
} 
			}
			


.cictwomsg{
position:relative;	
margin-left:50px;
margin-top:-20px;
}

.header-msg{
    height: 60px;
    position: relative;
    top: 0;
    left: 0;
	border-top:1px solid #d8d8d8;
	background:#000!important;
  }	

.send-msgbtn{
    position: relative;
    bottom: 0;
    left: 0;
border-top:1px solid #e4e4e4!important;
  }	


@keyframes dropHeader {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0);
  }
}

#greetings-msg{
  /* this section calls the dropHeader animation we defined above */
  animation-name: dropHeader;
  animation-iteration-count: 1;
  animation-timing-function: ease-out;
  animation-duration: 0.4s;
}  
 </style>
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
<script type="text/javascript">
    function play_sound() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', 'audio/msg.mp3');
        audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.load();
        audioElement.play();
    }
</script>
</head>
<body>
	<div class="full-mask"></div>
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
<div class="fixed-cont scroll">
<?php
 include 'HTML/fixed-cont.html'; 
 ?>
</div>
 <?php } ?>
 <?php } ?>
<?php include_once("analyticstracking.php"); ?>
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
<br>
<?php if($buzzy_theme==2){
?>
<div id="superwrapper">
<?php
if (isset($_SESSION["buzzyuser_id"])) {
?>	 
<div class="fixed-cont scroll">
<?php
 include 'HTML/fixed-cont.html'; 
?>
</div>
<?php } ?>
<?php } ?>
<div id="wrapper">
	<div class="mobile-fixer">
    <div class="full-column" style="z-index:;" >
<br>	
      <div class="content-wrap margin-reset" style="z-index:10000; position:absolute;  border-radius:5px 5px 5px 5px;
-moz-border-radius:5px 5px 5px 5px;
-webkit-border-radius:5px 5px 5px 5px; width:100%!important; max-width:960px!important; margin-top:0px!important; margin-bottom:0px; padding-bottom:5px!important; padding:0px;
-webkit-box-shadow: 0px 1px 5px 0px rgba(105,105,105,0.33);
-moz-box-shadow: 0px 1px 5px 0px rgba(105,105,105,0.33);
box-shadow: 0px 1px 5px 0px rgba(105,105,105,0.33);">
 <div class="modal-header">
        <form action="<?php echo $link_prefix;?>index.php" >
        <button type="submit" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </form>
		<h4 class="modal-title" style="color:#fff!important; font-weight:700; font-size:19px!important;" >All messages</h4>
      </div>
	  
<?php include 'HTML/left-message-container.html';?>
	  	  
	  <div style="float:left;  background:#fff!important;" class="message-cont" >  
      <div>	
	 <?php
	 $all_useras_msgquery = "SELECT * FROM buddies WHERE user_id=$session_user_id OR friend=$session_user_id";
	 foreach ($connread->query($all_useras_msgquery) as $row) { 
	 if($row['friend']==$session_user_id){
	 $f_buzzyusera_id=$row['user_id'];
	 }
	 else if($row['user_id']==$session_user_id){
	 $f_buzzyusera_id=$row['friend'];
	 }

 $mss_usersa_query = "SELECT buzzyuser_first_name,buzzyuser_last_name,buzzyuser_onlinestatus,buzzyuser_genre,buzzyuser_age FROM buzzyusers WHERE buzzyuser_id=$f_buzzyusera_id";
	 foreach ($connread->query($mss_usersa_query) as $row) { 	 
	$f_buzzyusera_first_name = $row['buzzyuser_first_name'];	 
	$f_buzzyusera_last_name = $row['buzzyuser_last_name'];	 	
    $f_buzzyusera_onlinestatus = $row['buzzyuser_onlinestatus'];	
	$f_buzzyusera_genre=$row['buzzyuser_genre'];
	$f_buzzyusera_age=$row['buzzyuser_age'];
	if($f_buzzyusera_onlinestatus==0){
	$onn_image='offline.png';
    $marg_right='34px';	
	}
	if($f_buzzyusera_onlinestatus==1){
	$onn_image='online.png';	
    $marg_right='10px';		
	}
	
	if($f_buzzyusera_genre==0){
	$span_gen='<i class="fa fa-mars" style="color:#54a6fa!important;" aria-hidden="true"></i>';	
	}
	if($f_buzzyusera_genre==1){
	$span_gen='<i class="fa fa-venus" style="color:#e786e8!important;"  aria-hidden="true"></i>';		
	}	
	 }	
	 ?>	 
	  <div class="header-msg" id="headmuser<?php echo $f_buzzyusera_id;?>" style="display:none; position:relative!important; background:#fff!important; border-bottom:1px solid #d8d8d8; width:100%;">
	  <div style="padding:20px;">
	  <h4 style="margin-top:0px!important; font-weight:500;"><img src="<?php echo $link_prefix;?>img/<?php echo $onn_image;?>" style="float:left;  margin-right:10px!important;"/>
	  <?php echo $f_buzzyusera_first_name;?>,  <?php echo $f_buzzyusera_age;?> <?php echo $span_gen;?>
	  <a href="<?php echo $link_prefix;?>page.php?user-id=<?php echo $f_buzzyusera_id;?>">
	  <i class="fa fa-user" style="float:right!important; border:1px #ccc solid; padding:6px; margin-top:-10px!important; padding-left:8px; padding-right:8px;  border-radius:365px 365px 365px 365px;
-moz-border-radius:365px 365px 365px 365px;
-webkit-border-radius:365px 365px 365px 365px;" aria-hidden="true"></i>
</a>
</h4>
	  </div>  
	  </div>
	   <?php } ?>	     
	  </div>	  
	  <div style="float:left;" class="message-contsmall scroll" >
	  <div id="greetings-msg">
     <?php
	 $ran_user_query = "SELECT buzzyuser_id,buzzyuser_first_name,buzzyuser_image,buzzyuser_age FROM buzzyusers ORDER BY RAND() LIMIT 1";
	 foreach ($connread->query($ran_user_query) as $row) {
    $ran_buzzyuser_id = $row['buzzyuser_id'];		 
	$ran_buzzyuser_first_name = $row['buzzyuser_first_name'];	 
		$ran_buzzyuser_image = $row['buzzyuser_image'];
		$ran_buzzyuser_age = $row['buzzyuser_age'];		
if (strpos($ran_buzzyuser_image,'facebook') !== false) {
			$ranfinala_image_prefix='';		  
		    }
			else if (strpos($ran_buzzyuser_image,'fbcdn') !== false) {
			$ranfinala_image_prefix='';		  
		    }
		    else if (strpos($ran_buzzyuser_image,'http://brankomatovic.net/safetoupload/') !== false) {
			$ranfinala_image_prefix='';		  
		    }
		    else if (strpos($ran_buzzyuser_image,'http://') !== false) {
			$ranfinala_image_prefix='';		  
		    }	
		    else if (strpos($ran_buzzyuser_image,'https://') !== false) {
			$ranfinala_image_prefix='';		  
		    }				
			else {
			$ranfinala_image_prefix=$link_prefix.'img/';					
			}	 
		
	 }

        $ranuserflikedcount_user_query="SELECT COUNT(*) FROM buzzyuserliked WHERE buzzyliked_id=$ran_buzzyuser_id";
		foreach ($connread->query($ranuserflikedcount_user_query) as $row) { 
	    $count_ranuserliked=$row['COUNT(*)'];
		}
		
		$ranuserunlikedcount_fuser_query="SELECT COUNT(*) FROM buzzyuserunliked WHERE buzzyunliked_id=$ran_buzzyuser_id";
		foreach ($connread->query($ranuserunlikedcount_fuser_query) as $row) { 
	    $count_ranuserunliked=$row['COUNT(*)'];
		}
		$total_ranuserliked=$count_ranuserliked+$count_ranuserunliked;
		if ($total_ranuserliked==0){
		$user_liked_ranpercentage=0;	
		$user_liked_ranmark=0;
		}
		else{
		$user_liked_ranpercentage=($count_ranuserliked/$total_ranuserliked)*100;
		    $user_liked_ranmark=($count_ranuserliked/$total_ranuserliked)*10;			
		}
		$formated_user_liked_ranmark=number_format((float)$user_liked_ranmark, 2, ',', ''); 
	
	 $usercount_ranimages_query="SELECT COUNT(*) FROM buzzyuserimages WHERE buzzyuser_id=$ran_buzzyuser_id";
	 foreach ($connread->query($usercount_ranimages_query) as $row) { 
    $count_ranimg=$row['COUNT(*)'];
	 }	
	 ?>
        <div class="imgcht"  style="margin:0 auto; margin-top:130px;">
       <div style="width:176px; margin:0 auto!important; float:none!important;">
	<img src="<?php echo $link_prefix;?>img/love-meet.png" style="margin-top:12px; z-index:1; width:176px;float:left;"  >
	</div>
	<div class="clearfix"></div>
	<br><br><br>
	<p style="text-align:center!important;">
	<a href="<?php echo $link_prefix;?>page.php?hotnot-id=true" style="margin:0 auto; font-size:26px!important;" class="btn btn-success"><?php echo $play_like_me;?></a>
	</p> 
		</div> 
		</div>	   
	   <?php
	 $all_users_msgquery = "SELECT * FROM buddies WHERE user_id=$session_user_id OR friend=$session_user_id";
	 foreach ($connread->query($all_users_msgquery) as $row) { 
	 if($row['friend']==$session_user_id){
	 $f_buzzyuser_id=$row['user_id'];
	 }
	 else if($row['user_id']==$session_user_id){
	 $f_buzzyuser_id=$row['friend'];
	 }

 $mss_users_query = "SELECT buzzyuser_first_name,buzzyuser_image FROM buzzyusers WHERE buzzyuser_id=$f_buzzyuser_id";
 	 
	 foreach ($connread->query($mss_users_query) as $row) { 	 
	$f_buzzyuser_first_name = $row['buzzyuser_first_name'];	 
		$fa_buzzyuser_image = $row['buzzyuser_image'];
if (strpos($fa_buzzyuser_image,'facebook') !== false) {
			$finala_image_prefix='';		  
		    }
			else if (strpos($fa_buzzyuser_image,'fbcdn') !== false) {
			$finala_image_prefix='';		  
		    }
		    else if (strpos($fa_buzzyuser_image,'http://brankomatovic.net/safetoupload/') !== false) {
			$finala_image_prefix='';		  
		    }
		    else if (strpos($fa_buzzyuser_image,'http://') !== false) {
			$finala_image_prefix='';		  
		    }	
		    else if (strpos($fa_buzzyuser_image,'https://') !== false) {
			$finala_image_prefix='';		  
		    }				
			else {
			$finala_image_prefix=$link_prefix.'img/';					
			}	 
		
	 }
	 ?>
	  <div id="muser<?php echo $f_buzzyuser_id;?>" class="msn"  style="display:none!important; position:relative;">
	   <div id="mmmmm<?php echo $f_buzzyuser_id;?>"> 
	   <?php
        $userflikedcount_user_query="SELECT COUNT(*) FROM buzzyuserliked WHERE buzzyliked_id=$f_buzzyuser_id";
		foreach ($connread->query($userflikedcount_user_query) as $row) { 
	    $count_fuserliked=$row['COUNT(*)'];
		}
		
		$userunlikedcount_fuser_query="SELECT COUNT(*) FROM buzzyuserunliked WHERE buzzyunliked_id=$f_buzzyuser_id";
		foreach ($connread->query($userunlikedcount_fuser_query) as $row) { 
	    $count_fuserunliked=$row['COUNT(*)'];
		}
		$total_fuserliked=$count_fuserliked+$count_fuserunliked;
		if ($total_fuserliked==0){
		$user_liked_fpercentage=0;	
		$user_liked_fmark=0;
		}
		else{
		$user_liked_fpercentage=($count_fuserliked/$total_fuserliked)*100;
		    $user_liked_fmark=($count_fuserliked/$total_fuserliked)*10;			
		}
				$formated_user_liked_fmark=number_format((float)$user_liked_fmark, 2, ',', ''); 

  $usercount_images_query="SELECT COUNT(*) FROM buzzyuserimages WHERE buzzyuser_id=$f_buzzyuser_id";
	 foreach ($connread->query($usercount_images_query) as $row) { 
    $count_fffimg=$row['COUNT(*)'];
	 }	   
	     $all_countmsgquery = "SELECT COUNT(*) FROM chatmessages WHERE (user_id=$session_user_id AND receiver=$f_buzzyuser_id) OR (user_id=$f_buzzyuser_id AND receiver=$session_user_id)";	
	     foreach ($connread->query($all_countmsgquery) as $row) { 
		 $count_fmsg=$row['COUNT(*)'];
		 if($count_fmsg==0){
		 ?>
		 <div class="startmessage">
        <img src="<?php echo $finala_image_prefix;?><?php echo $fa_buzzyuser_image;?>" />
		<div class="violetcircle">
		<p style="text-align:center!important;">
		<span class="bspanone" ><?php echo $count_fffimg;?></span>
		<br>
		<span class="bspantwo"><?php echo $photos;?></span>
		</p>		
		</div>												
		<div class="bluecircle">
		<p style="text-align:center!important;">
		<span class="bspanone" style=""><?php echo $formated_user_liked_fmark;?></span>
		<br>		
		<span class="bspantwo" style=""><?php echo $total_ratings;?></span>
		</p>
		</div>
		 </div>
		 
		 <?php } ?>		 
		 <?php } ?>
	  <?php
	 $all_msgquery = "SELECT * FROM chatmessages WHERE (user_id=$session_user_id AND receiver=$f_buzzyuser_id) OR (user_id=$f_buzzyuser_id AND receiver=$session_user_id)";	 
	 foreach ($connread->query($all_msgquery) as $row) { 
	 
	 if($row['user_id']==$session_user_id){
		$msg_name=$you;
	 $msg_image=$session_buzzyuser_image;
                    $chat_name = $you;
					$clm='you';
					$twwo=''; 
					$flr='left';
					$fll='right';					
	 }
	 else if($row['user_id']==$f_buzzyuser_id){
		 $msg_name=$f_buzzyuser_first_name;
	 $msg_image=$fa_buzzyuser_image;
	 			   $chat_name = $f_buzzyuser_first_name;	
					$clm='us';
					$twwo='two';
					$flr='right';
					$fll='left';						
	 }	 
if (strpos($msg_image,'facebook') !== false) {
			$final_image_prefix='';		  
		    }
			else if (strpos($msg_image,'fbcdn') !== false) {
			$final_image_prefix='';		  
		    }
		    else if (strpos($msg_image,'http://brankomatovic.net/safetoupload/') !== false) {
			$final_image_prefix='';		  
		    }
		    else if (strpos($msg_image,'http://') !== false) {
			$final_image_prefix='';		  
		    }	
		    else if (strpos($msg_image,'https://') !== false) {
			$final_image_prefix='';		  
		    }				
			else {
			$final_image_prefix=$link_prefix.'img/';					
			}

	$buzzyuser_chat_difference=time()-$row['time'];
				if ($buzzyuser_chat_difference>=2592000){
				$final_buzzyuser_chat_difference=round($buzzyuser_chat_difference/2592000);	
                $date_measure=$months;				
				}				
				else if ($buzzyuser_chat_difference<2592000 AND $buzzyuser_chat_difference>=86400){
				$final_buzzyuser_chat_difference=round($buzzyuser_chat_difference/86400);	
                $date_measure=$days;				
				}
				else if ($buzzyuser_chat_difference<86400 AND $buzzyuser_chat_difference>=3600){
				$final_buzzyuser_chat_difference=round($buzzyuser_chat_difference/3600);	
                $date_measure=$hours;				
				}	
				else if ($buzzyuser_chat_difference<3600){
				$final_buzzyuser_chat_difference=round($buzzyuser_chat_difference/60);	
                $date_measure=$minutes;				
				}				
$message=$row['message'];	 
include 'HTML/message-class.html';
$message = str_replace($patterns, $replacements, $message);
?>
	   <div id="mssm<?php echo $f_buzzyuser_id;?>" style="margin-top:20px; margin-<?php echo $fll;?>:20px; margin-bottom:30px; float:<?php echo $fll;?>!important;">               
			   <img src="<?php echo $final_image_prefix;?><?php echo $msg_image;?>" class="media-object circle" alt="" style="float:<?php echo $fll;?>; margin-<?php echo $flr;?>:10px; width:32px; height:32px;" >
								<span style="float:<?php echo $fll;?>!important; margin-bottom:-20px!important; font-size:12px!important; color:#333!important;" class="bubble<?php echo $twwo;?>">
								    <span style="font-weight:700!important; margin-bottom:10px!important;"><?php echo $msg_name;?></span>
									
									<br>
                                    <?php echo $message;?>
                                <span style="color:#888888!important; font-size:11px!important; float:right;"><?php echo $final_buzzyuser_chat_difference;?> 
			<?php echo $date_measure;?> <?php echo $ago;?></span>
								</span>
        </div>
         <div class="clearfix"></div>   	
	<?php } ?>
	<br><br>
     </div>
     </div>
	<script>	
	setInterval(function(){ 
	if($('#muser<?php echo $f_buzzyuser_id;?>').css('display') != 'none'){		
    $('#mmmmm<?php echo $f_buzzyuser_id;?>').load(document.URL +  ' #mmmmm<?php echo $f_buzzyuser_id;?>');	
	}	
	},<?php echo $chat_option_refresh;?>);
	</script>
	      <?php } ?>	  
</div>

<?php include 'HTML/message-container-new.html';?>


</div>
</div>
<div class="clearfix"></div>	 
	   <!-- // chatmessages -->
</div>
</div>
</div>
</div>
<!-- WRAPPER --------- END -->
<?php
  include 'HTML/modal-sweet-alerts.html';
?> 

<?php if($buzzy_theme==2){
?>
</div>
<?php } ?>
     <div class="wrapper" >
	 <?php
      include 'HTML/footer.html';
     ?>
	 </div>
</body>
</html>