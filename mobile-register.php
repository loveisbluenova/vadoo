<?php
ob_start('ob_gzhandler');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/basic.php';
include 'PHP/'.$register_inc.'';
include 'PHP/loginuser.php';
if($mobile_device_detected==TRUE)	
{
$color_foot='color:#fff!important;';	
}
else if($mobile_device_detected==TRUE)	
{
$color_foot='';	
}

	$website_mcountusers_query = "SELECT COUNT(*) FROM  buzzyusers WHERE buzzyuser_genre=0";	
	foreach ($connread->query($website_mcountusers_query) as $row) {
	$count_mallusers=$row['COUNT(*)'];	
	}

	$website_fcountusers_query = "SELECT COUNT(*) FROM  buzzyusers WHERE buzzyuser_genre=1";	
	foreach ($connread->query($website_fcountusers_query) as $row) {
	$count_fallusers=$row['COUNT(*)'];	
	}

	$website_countusers_query = "SELECT COUNT(*) FROM  buzzyusers";	
	foreach ($connread->query($website_countusers_query) as $row) {
	$count_allusers=$row['COUNT(*)'];	
	}	

	$f_percent=$count_fallusers/$count_allusers*100;
	$m_percent=$count_mallusers/$count_allusers*100;
	
	$Numbers=array(
		'1' => "<img src='img/onenum.png' class='numimg' />",
		'2' => "<img src='img/twonum.png' class='numimg'  />",
		'3' => "<img src='img/threenum.png' class='numimg' />",
		'4' => "<img src='img/fournum.png' class='numimg'   />",
		'5' => "<img src='img/fivenum.png' class='numimg'   />",
		'6' => "<img src='img/sixnum.png' class='numimg'  />",
		'7' => "<img src='img/sevennum.png'  class='numimg'  />",
		'8' => "<img src='img/eightnum.png' class='numimg'  />",
		'9' => "<img src='img/ninenum.png' class='numimg' />",
		'0' => "<img src='img/zeronum.png' class='numimg'   />"
	);

	$form_count_allusers=str_replace(array_keys($Numbers), array_values($Numbers), $count_allusers);

$last_week_timestamp=$now-604800;	
$last_week_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_registration_timestamp=$last_week_timestamp";
foreach ($connread->query($last_week_query) as $row) {
$count_last_week=$row['COUNT(*)'];
}
$cur_online_query = "SELECT COUNT(*) FROM buzzyusers WHERE buzzyuser_onlinestatus=1";
foreach ($connread->query($cur_online_query) as $row) {
$count_online=$row['COUNT(*)'];
}

$total_online_query = "SELECT COUNT(*) FROM buzzyusers";
foreach ($connread->query($total_online_query) as $row) {
$count_all=$row['COUNT(*)'];
}


$ch = curl_init();
            $headr = array();
            $headr[] = 'Content-length: 0';
            $headr[] = 'Content-type: application/json';
            curl_setopt($ch, CURLOPT_URL, 'https://ip-api.com/json/'.$user_ipreal.'');
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
            curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; xxxxx)'); // my product name
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            $ch_data = curl_exec($ch);
            curl_close($ch);
            if(!empty($ch_data))
            {
            $json_data = json_decode($ch_data, true);
            //print_r($json_data);
            $new_user_city=$json_data['city'];
            $new_user_region=$json_data['country'];
            $new_user_lat=$json_data['lat'];	
            $new_user_lon=$json_data['lon'];			
			}
	
$countries_online_query = "SELECT COUNT(*) FROM buzzyusers WHERE (buzzyuser_location LIKE '%$new_user_region%' ) OR (buzzyuser_location LIKE '%$new_user_city%' )";
foreach ($connread->query($countries_online_query) as $row) {
$count_countries=$row['COUNT(*)'];
}
$actual_linktwo = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
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
$buzzycaptcha_sitekey=$row['buzzycaptcha_sitekey'];
$buzzycaptcha_secretkey=$row['buzzycaptcha_secretkey'];	
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
	 <link rel="stylesheet" type="text/css" href="css/register.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
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
.sweet-overlay{
z-index:999999;	
}
.sweet-alert{
z-index:999999!important;	
}
img.numimg{
width:32px!important;
margin-right:10px!important;	
opacity:0.8;
    -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
    filter: grayscale(100%);
 -ms-filter:grayscale(100%);
 -moz-filter:grayscale(100%);
-o-filter:grayscale(100%); 
}
#owl-four17.item{
  margin: 0px;
}
#owl-four17 .item img{
  display: block;
  width: 100%;
  height: auto;
}
.owl-theme .owl-controls .owl-page {
    display: inline-block;
}
html, body {
    /* give this to all tags from html to .fullscreen */
    height:100%;


}
#register-bg{		
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
		  /* Set rules to fill background */
  min-height: 100%;
	
  /* Set up proportionate scaling */
  width: 100%;
  height: auto;
	
  /* Set up positioning */
  top: 0;
  left: 0;
}

#form-wrapper {	
	margin-top: 0px;
  margin-bottom: 80px;
  margin-left:0px;
  margin-right:0px; 
}

.form-signin {
	opacity:1;
  max-width: 480px;
  padding: 10px 8px 10px;
  margin: 0 auto;
  margin-top:30px;
  position:relative;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.3);  
      /* Safari 3-4, iOS 1-3.2, Android 1.6- */
  -webkit-border-radius: 5px; 

  /* Firefox 1-3.6 */
  -moz-border-radius: 5px; 
  
  /* Opera 10.5, IE 9, Safari 5, Chrome, Firefox 4, iOS 4, Android 2.1+ */
  border-radius: 5px;

 } 
	.checkbox {
	  margin-bottom: 30px;
	  margin-left:20px!important;
	}
.form-signin-heading{
	  margin-bottom: 30px;
	  margin-left:0px!important;
	}
	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	 -webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.0)!important;
	  box-shadow:inset 0 1px 1px rgba(0,0,0,.0)!important;	  
	  position: relative;
	  font-size: 13px;
	  border:1px solid #eee!important;
	  height: auto;
	  padding: 8px!important;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}

.cd-title {
  position: relative;
  height: 160px;
  line-height: 230px;
  text-align: center;
}
.cd-title h1 {
  font-size: 2.4rem;
  font-weight: 700;
}
@media only screen and (min-width: 768px) {
  .cd-title {
    line-height: 250px;
  }
}
@media only screen and (min-width: 1170px) {
  .cd-title {
    height: 200px;
    line-height: 300px;
  }
  .cd-title h1 {
    font-size: 3rem;
  }
}

.cd-intro {
  width: 90%;
  max-width: 768px;
  text-align: center;
}

.cd-intro {
  margin: 4em auto;
}
.one-eight-column{
	width:12.5%;
 }
@media only screen and (min-width: 768px) {
  .cd-intro {
    margin: 5em auto;
  }
}

@media only screen and (max-width: 960px) {
#bigdig{
display:none;	
}
}




@media only screen and (min-width: 1170px) {
  .cd-intro {
    margin: 6em auto;
  }
}

.cd-headline {
  font-size: 3rem;
  line-height: 1.2;
}
@media only screen and (min-width: 768px) {
  .cd-headline {
    font-size: 4.4rem;
    font-weight: 300;
  }
}
@media only screen and (min-width: 1170px) {
  .cd-headline {
    font-size: 6rem;
  }
}

.cd-words-wrapper {
  display: inline-block;
  position: relative;
  text-align: left;
}
.cd-words-wrapper b {
  display: inline-block;
  position: absolute;
  white-space: nowrap;
  left: 0;
  top: 0;
}
.cd-words-wrapper b.is-visible {
  position: relative;
}
.no-js .cd-words-wrapper b {
  opacity: 0;
}
.no-js .cd-words-wrapper b.is-visible {
  opacity: 1;
}

/* -------------------------------- 

xrotate-1 

-------------------------------- */
.cd-headline.rotate-1 .cd-words-wrapper {
  -webkit-perspective: 300px;
  -moz-perspective: 300px;
  perspective: 300px;
}
.cd-headline.rotate-1 b {
  opacity: 0;
  -webkit-transform-origin: 50% 100%;
  -moz-transform-origin: 50% 100%;
  -ms-transform-origin: 50% 100%;
  -o-transform-origin: 50% 100%;
  transform-origin: 50% 100%;
  -webkit-transform: rotateX(180deg);
  -moz-transform: rotateX(180deg);
  -ms-transform: rotateX(180deg);
  -o-transform: rotateX(180deg);
  transform: rotateX(180deg);
}
.cd-headline.rotate-1 b.is-visible {
  opacity: 1;
  -webkit-transform: rotateX(0deg);
  -moz-transform: rotateX(0deg);
  -ms-transform: rotateX(0deg);
  -o-transform: rotateX(0deg);
  transform: rotateX(0deg);
  -webkit-animation: cd-rotate-1-in 1.2s;
  -moz-animation: cd-rotate-1-in 1.2s;
  animation: cd-rotate-1-in 1.2s;
}
.cd-headline.rotate-1 b.is-hidden {
  -webkit-transform: rotateX(180deg);
  -moz-transform: rotateX(180deg);
  -ms-transform: rotateX(180deg);
  -o-transform: rotateX(180deg);
  transform: rotateX(180deg);
  -webkit-animation: cd-rotate-1-out 1.2s;
  -moz-animation: cd-rotate-1-out 1.2s;
  animation: cd-rotate-1-out 1.2s;
}

@-webkit-keyframes cd-rotate-1-in {
  0% {
    -webkit-transform: rotateX(180deg);
    opacity: 0;
  }
  35% {
    -webkit-transform: rotateX(120deg);
    opacity: 0;
  }
  65% {
    opacity: 0;
  }
  100% {
    -webkit-transform: rotateX(360deg);
    opacity: 1;
  }
}
@-moz-keyframes cd-rotate-1-in {
  0% {
    -moz-transform: rotateX(180deg);
    opacity: 0;
  }
  35% {
    -moz-transform: rotateX(120deg);
    opacity: 0;
  }
  65% {
    opacity: 0;
  }
  100% {
    -moz-transform: rotateX(360deg);
    opacity: 1;
  }
}
@keyframes cd-rotate-1-in {
  0% {
    -webkit-transform: rotateX(180deg);
    -moz-transform: rotateX(180deg);
    -ms-transform: rotateX(180deg);
    -o-transform: rotateX(180deg);
    transform: rotateX(180deg);
    opacity: 0;
  }
  35% {
    -webkit-transform: rotateX(120deg);
    -moz-transform: rotateX(120deg);
    -ms-transform: rotateX(120deg);
    -o-transform: rotateX(120deg);
    transform: rotateX(120deg);
    opacity: 0;
  }
  65% {
    opacity: 0;
  }
  100% {
    -webkit-transform: rotateX(360deg);
    -moz-transform: rotateX(360deg);
    -ms-transform: rotateX(360deg);
    -o-transform: rotateX(360deg);
    transform: rotateX(360deg);
    opacity: 1;
  }
}
@-webkit-keyframes cd-rotate-1-out {
  0% {
    -webkit-transform: rotateX(0deg);
    opacity: 1;
  }
  35% {
    -webkit-transform: rotateX(-40deg);
    opacity: 1;
  }
  65% {
    opacity: 0;
  }
  100% {
    -webkit-transform: rotateX(180deg);
    opacity: 0;
  }
}
@-moz-keyframes cd-rotate-1-out {
  0% {
    -moz-transform: rotateX(0deg);
    opacity: 1;
  }
  35% {
    -moz-transform: rotateX(-40deg);
    opacity: 1;
  }
  65% {
    opacity: 0;
  }
  100% {
    -moz-transform: rotateX(180deg);
    opacity: 0;
  }
}
@keyframes cd-rotate-1-out {
  0% {
    -webkit-transform: rotateX(0deg);
    -moz-transform: rotateX(0deg);
    -ms-transform: rotateX(0deg);
    -o-transform: rotateX(0deg);
    transform: rotateX(0deg);
    opacity: 1;
  }
  35% {
    -webkit-transform: rotateX(-40deg);
    -moz-transform: rotateX(-40deg);
    -ms-transform: rotateX(-40deg);
    -o-transform: rotateX(-40deg);
    transform: rotateX(-40deg);
    opacity: 1;
  }
  65% {
    opacity: 0;
  }
  100% {
    -webkit-transform: rotateX(180deg);
    -moz-transform: rotateX(180deg);
    -ms-transform: rotateX(180deg);
    -o-transform: rotateX(180deg);
    transform: rotateX(180deg);
    opacity: 0;
  }
}
/* -------------------------------- 

xtype 

-------------------------------- */
.cd-headline.type .cd-words-wrapper {
  vertical-align: top;
  overflow: hidden;
}
.cd-headline.type .cd-words-wrapper::after {
  /* vertical bar */
  content: '';
  position: absolute;
  right: 0;
  top: 50%;
  bottom: auto;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  height: 90%;
  width: 1px;
  background-color: #aebcb9;
}
.cd-headline.type .cd-words-wrapper.waiting::after {
  -webkit-animation: cd-pulse 1s infinite;
  -moz-animation: cd-pulse 1s infinite;
  animation: cd-pulse 1s infinite;
}
.cd-headline.type .cd-words-wrapper.selected {
  background-color: #aebcb9;
}
.cd-headline.type .cd-words-wrapper.selected::after {
  visibility: hidden;
}
.cd-headline.type .cd-words-wrapper.selected b {
  color: #0d0d0d;
}
.cd-headline.type b {
  visibility: hidden;
}
.cd-headline.type b.is-visible {
  visibility: visible;
}
.cd-headline.type i {
  position: absolute;
  visibility: hidden;
}
.cd-headline.type i.in {
  position: relative;
  visibility: visible;
}

@-webkit-keyframes cd-pulse {
  0% {
    -webkit-transform: translateY(-50%) scale(1);
    opacity: 1;
  }
  40% {
    -webkit-transform: translateY(-50%) scale(0.9);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateY(-50%) scale(0);
    opacity: 0;
  }
}
@-moz-keyframes cd-pulse {
  0% {
    -moz-transform: translateY(-50%) scale(1);
    opacity: 1;
  }
  40% {
    -moz-transform: translateY(-50%) scale(0.9);
    opacity: 0;
  }
  100% {
    -moz-transform: translateY(-50%) scale(0);
    opacity: 0;
  }
}
@keyframes cd-pulse {
  0% {
    -webkit-transform: translateY(-50%) scale(1);
    -moz-transform: translateY(-50%) scale(1);
    -ms-transform: translateY(-50%) scale(1);
    -o-transform: translateY(-50%) scale(1);
    transform: translateY(-50%) scale(1);
    opacity: 1;
  }
  40% {
    -webkit-transform: translateY(-50%) scale(0.9);
    -moz-transform: translateY(-50%) scale(0.9);
    -ms-transform: translateY(-50%) scale(0.9);
    -o-transform: translateY(-50%) scale(0.9);
    transform: translateY(-50%) scale(0.9);
    opacity: 0;
  }
  100% {
    -webkit-transform: translateY(-50%) scale(0);
    -moz-transform: translateY(-50%) scale(0);
    -ms-transform: translateY(-50%) scale(0);
    -o-transform: translateY(-50%) scale(0);
    transform: translateY(-50%) scale(0);
    opacity: 0;
  }
}
/* -------------------------------- 

xrotate-2 

-------------------------------- */
.cd-headline.rotate-2 .cd-words-wrapper {
  -webkit-perspective: 300px;
  -moz-perspective: 300px;
  perspective: 300px;
}
.cd-headline.rotate-2 i, .cd-headline.rotate-2 em {
  display: inline-block;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}
.cd-headline.rotate-2 b {
  opacity: 0;
}
.cd-headline.rotate-2 i {
  -webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  -ms-transform-style: preserve-3d;
  -o-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-transform: translateZ(-20px) rotateX(90deg);
  -moz-transform: translateZ(-20px) rotateX(90deg);
  -ms-transform: translateZ(-20px) rotateX(90deg);
  -o-transform: translateZ(-20px) rotateX(90deg);
  transform: translateZ(-20px) rotateX(90deg);
  opacity: 0;
}
.is-visible .cd-headline.rotate-2 i {
  opacity: 1;
}
.cd-headline.rotate-2 i.in {
  -webkit-animation: cd-rotate-2-in 0.4s forwards;
  -moz-animation: cd-rotate-2-in 0.4s forwards;
  animation: cd-rotate-2-in 0.4s forwards;
}
.cd-headline.rotate-2 i.out {
  -webkit-animation: cd-rotate-2-out 0.4s forwards;
  -moz-animation: cd-rotate-2-out 0.4s forwards;
  animation: cd-rotate-2-out 0.4s forwards;
}
.cd-headline.rotate-2 em {
  -webkit-transform: translateZ(20px);
  -moz-transform: translateZ(20px);
  -ms-transform: translateZ(20px);
  -o-transform: translateZ(20px);
  transform: translateZ(20px);
}

.no-csstransitions .cd-headline.rotate-2 i {
  -webkit-transform: rotateX(0deg);
  -moz-transform: rotateX(0deg);
  -ms-transform: rotateX(0deg);
  -o-transform: rotateX(0deg);
  transform: rotateX(0deg);
  opacity: 0;
}
.no-csstransitions .cd-headline.rotate-2 i em {
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}

.no-csstransitions .cd-headline.rotate-2 .is-visible i {
  opacity: 1;
}

@-webkit-keyframes cd-rotate-2-in {
  0% {
    opacity: 0;
    -webkit-transform: translateZ(-20px) rotateX(90deg);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateZ(-20px) rotateX(-10deg);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateZ(-20px) rotateX(0deg);
  }
}
@-moz-keyframes cd-rotate-2-in {
  0% {
    opacity: 0;
    -moz-transform: translateZ(-20px) rotateX(90deg);
  }
  60% {
    opacity: 1;
    -moz-transform: translateZ(-20px) rotateX(-10deg);
  }
  100% {
    opacity: 1;
    -moz-transform: translateZ(-20px) rotateX(0deg);
  }
}
@keyframes cd-rotate-2-in {
  0% {
    opacity: 0;
    -webkit-transform: translateZ(-20px) rotateX(90deg);
    -moz-transform: translateZ(-20px) rotateX(90deg);
    -ms-transform: translateZ(-20px) rotateX(90deg);
    -o-transform: translateZ(-20px) rotateX(90deg);
    transform: translateZ(-20px) rotateX(90deg);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateZ(-20px) rotateX(-10deg);
    -moz-transform: translateZ(-20px) rotateX(-10deg);
    -ms-transform: translateZ(-20px) rotateX(-10deg);
    -o-transform: translateZ(-20px) rotateX(-10deg);
    transform: translateZ(-20px) rotateX(-10deg);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateZ(-20px) rotateX(0deg);
    -moz-transform: translateZ(-20px) rotateX(0deg);
    -ms-transform: translateZ(-20px) rotateX(0deg);
    -o-transform: translateZ(-20px) rotateX(0deg);
    transform: translateZ(-20px) rotateX(0deg);
  }
}
@-webkit-keyframes cd-rotate-2-out {
  0% {
    opacity: 1;
    -webkit-transform: translateZ(-20px) rotateX(0);
  }
  60% {
    opacity: 0;
    -webkit-transform: translateZ(-20px) rotateX(-100deg);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateZ(-20px) rotateX(-90deg);
  }
}
@-moz-keyframes cd-rotate-2-out {
  0% {
    opacity: 1;
    -moz-transform: translateZ(-20px) rotateX(0);
  }
  60% {
    opacity: 0;
    -moz-transform: translateZ(-20px) rotateX(-100deg);
  }
  100% {
    opacity: 0;
    -moz-transform: translateZ(-20px) rotateX(-90deg);
  }
}
@keyframes cd-rotate-2-out {
  0% {
    opacity: 1;
    -webkit-transform: translateZ(-20px) rotateX(0);
    -moz-transform: translateZ(-20px) rotateX(0);
    -ms-transform: translateZ(-20px) rotateX(0);
    -o-transform: translateZ(-20px) rotateX(0);
    transform: translateZ(-20px) rotateX(0);
  }
  60% {
    opacity: 0;
    -webkit-transform: translateZ(-20px) rotateX(-100deg);
    -moz-transform: translateZ(-20px) rotateX(-100deg);
    -ms-transform: translateZ(-20px) rotateX(-100deg);
    -o-transform: translateZ(-20px) rotateX(-100deg);
    transform: translateZ(-20px) rotateX(-100deg);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateZ(-20px) rotateX(-90deg);
    -moz-transform: translateZ(-20px) rotateX(-90deg);
    -ms-transform: translateZ(-20px) rotateX(-90deg);
    -o-transform: translateZ(-20px) rotateX(-90deg);
    transform: translateZ(-20px) rotateX(-90deg);
  }
}
/* -------------------------------- 

xloading-bar 

-------------------------------- */
.cd-headline.loading-bar span {
  display: inline-block;
  padding: .2em 0;
}
.cd-headline.loading-bar .cd-words-wrapper {
  overflow: hidden;
  vertical-align: top;
}
.cd-headline.loading-bar .cd-words-wrapper::after {
  /* loading bar */
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 0;
  background: #0096a7;
  z-index: 2;
  -webkit-transition: width 0.3s -0.1s;
  -moz-transition: width 0.3s -0.1s;
  transition: width 0.3s -0.1s;
}
.cd-headline.loading-bar .cd-words-wrapper.is-loading::after {
  width: 100%;
  -webkit-transition: width 3s;
  -moz-transition: width 3s;
  transition: width 3s;
}
.cd-headline.loading-bar b {
  top: .2em;
  opacity: 0;
  -webkit-transition: opacity 0.3s;
  -moz-transition: opacity 0.3s;
  transition: opacity 0.3s;
}
.cd-headline.loading-bar b.is-visible {
  opacity: 1;
  top: 0;
}

/* -------------------------------- 

xslide 

-------------------------------- */
.cd-headline.slide span {
  display: inline-block;
  padding: .2em 0;
}
.cd-headline.slide .cd-words-wrapper {
  overflow: hidden;
  vertical-align: top;
}
.cd-headline.slide b {
  opacity: 0;
  top: .2em;
}
.cd-headline.slide b.is-visible {
  top: 0;
  opacity: 1;
  -webkit-animation: slide-in 0.6s;
  -moz-animation: slide-in 0.6s;
  animation: slide-in 0.6s;
}
.cd-headline.slide b.is-hidden {
  -webkit-animation: slide-out 0.6s;
  -moz-animation: slide-out 0.6s;
  animation: slide-out 0.6s;
}

@-webkit-keyframes slide-in {
  0% {
    opacity: 0;
    -webkit-transform: translateY(-100%);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateY(20%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
  }
}
@-moz-keyframes slide-in {
  0% {
    opacity: 0;
    -moz-transform: translateY(-100%);
  }
  60% {
    opacity: 1;
    -moz-transform: translateY(20%);
  }
  100% {
    opacity: 1;
    -moz-transform: translateY(0);
  }
}
@keyframes slide-in {
  0% {
    opacity: 0;
    -webkit-transform: translateY(-100%);
    -moz-transform: translateY(-100%);
    -ms-transform: translateY(-100%);
    -o-transform: translateY(-100%);
    transform: translateY(-100%);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateY(20%);
    -moz-transform: translateY(20%);
    -ms-transform: translateY(20%);
    -o-transform: translateY(20%);
    transform: translateY(20%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -ms-transform: translateY(0);
    -o-transform: translateY(0);
    transform: translateY(0);
  }
}
@-webkit-keyframes slide-out {
  0% {
    opacity: 1;
    -webkit-transform: translateY(0);
  }
  60% {
    opacity: 0;
    -webkit-transform: translateY(120%);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateY(100%);
  }
}
@-moz-keyframes slide-out {
  0% {
    opacity: 1;
    -moz-transform: translateY(0);
  }
  60% {
    opacity: 0;
    -moz-transform: translateY(120%);
  }
  100% {
    opacity: 0;
    -moz-transform: translateY(100%);
  }
}
@keyframes slide-out {
  0% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -ms-transform: translateY(0);
    -o-transform: translateY(0);
    transform: translateY(0);
  }
  60% {
    opacity: 0;
    -webkit-transform: translateY(120%);
    -moz-transform: translateY(120%);
    -ms-transform: translateY(120%);
    -o-transform: translateY(120%);
    transform: translateY(120%);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateY(100%);
    -moz-transform: translateY(100%);
    -ms-transform: translateY(100%);
    -o-transform: translateY(100%);
    transform: translateY(100%);
  }
}
/* -------------------------------- 

xclip 

-------------------------------- */
.cd-headline.clip span {
  display: inline-block;
  padding: .2em 0;
}
.cd-headline.clip .cd-words-wrapper {
  overflow: hidden;
  vertical-align: top;
}
.cd-headline.clip .cd-words-wrapper::after {
  /* line */
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  width: 2px;
  height: 100%;
  background-color: #aebcb9;
}
.cd-headline.clip b {
  opacity: 0;
}
.cd-headline.clip b.is-visible {
  opacity: 1;
}

/* -------------------------------- 

xzoom 

-------------------------------- */
.cd-headline.zoom .cd-words-wrapper {
  -webkit-perspective: 300px;
  -moz-perspective: 300px;
  perspective: 300px;
}
.cd-headline.zoom b {
  opacity: 0;
}
.cd-headline.zoom b.is-visible {
  opacity: 1;
  -webkit-animation: zoom-in 0.8s;
  -moz-animation: zoom-in 0.8s;
  animation: zoom-in 0.8s;
}
.cd-headline.zoom b.is-hidden {
  -webkit-animation: zoom-out 0.8s;
  -moz-animation: zoom-out 0.8s;
  animation: zoom-out 0.8s;
}

@-webkit-keyframes zoom-in {
  0% {
    opacity: 0;
    -webkit-transform: translateZ(100px);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateZ(0);
  }
}
@-moz-keyframes zoom-in {
  0% {
    opacity: 0;
    -moz-transform: translateZ(100px);
  }
  100% {
    opacity: 1;
    -moz-transform: translateZ(0);
  }
}
@keyframes zoom-in {
  0% {
    opacity: 0;
    -webkit-transform: translateZ(100px);
    -moz-transform: translateZ(100px);
    -ms-transform: translateZ(100px);
    -o-transform: translateZ(100px);
    transform: translateZ(100px);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateZ(0);
    -moz-transform: translateZ(0);
    -ms-transform: translateZ(0);
    -o-transform: translateZ(0);
    transform: translateZ(0);
  }
}
@-webkit-keyframes zoom-out {
  0% {
    opacity: 1;
    -webkit-transform: translateZ(0);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateZ(-100px);
  }
}
@-moz-keyframes zoom-out {
  0% {
    opacity: 1;
    -moz-transform: translateZ(0);
  }
  100% {
    opacity: 0;
    -moz-transform: translateZ(-100px);
  }
}
@keyframes zoom-out {
  0% {
    opacity: 1;
    -webkit-transform: translateZ(0);
    -moz-transform: translateZ(0);
    -ms-transform: translateZ(0);
    -o-transform: translateZ(0);
    transform: translateZ(0);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateZ(-100px);
    -moz-transform: translateZ(-100px);
    -ms-transform: translateZ(-100px);
    -o-transform: translateZ(-100px);
    transform: translateZ(-100px);
  }
}
/* -------------------------------- 

xrotate-3 

-------------------------------- */
.cd-headline.rotate-3 .cd-words-wrapper {
  -webkit-perspective: 300px;
  -moz-perspective: 300px;
  perspective: 300px;
}
.cd-headline.rotate-3 b {
  opacity: 0;
}
.cd-headline.rotate-3 i {
  display: inline-block;
  -webkit-transform: rotateY(180deg);
  -moz-transform: rotateY(180deg);
  -ms-transform: rotateY(180deg);
  -o-transform: rotateY(180deg);
  transform: rotateY(180deg);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}
.is-visible .cd-headline.rotate-3 i {
  -webkit-transform: rotateY(0deg);
  -moz-transform: rotateY(0deg);
  -ms-transform: rotateY(0deg);
  -o-transform: rotateY(0deg);
  transform: rotateY(0deg);
}
.cd-headline.rotate-3 i.in {
  -webkit-animation: cd-rotate-3-in 0.6s forwards;
  -moz-animation: cd-rotate-3-in 0.6s forwards;
  animation: cd-rotate-3-in 0.6s forwards;
}
.cd-headline.rotate-3 i.out {
  -webkit-animation: cd-rotate-3-out 0.6s forwards;
  -moz-animation: cd-rotate-3-out 0.6s forwards;
  animation: cd-rotate-3-out 0.6s forwards;
}

.no-csstransitions .cd-headline.rotate-3 i {
  -webkit-transform: rotateY(0deg);
  -moz-transform: rotateY(0deg);
  -ms-transform: rotateY(0deg);
  -o-transform: rotateY(0deg);
  transform: rotateY(0deg);
  opacity: 0;
}

.no-csstransitions .cd-headline.rotate-3 .is-visible i {
  opacity: 1;
}

@-webkit-keyframes cd-rotate-3-in {
  0% {
    -webkit-transform: rotateY(180deg);
  }
  100% {
    -webkit-transform: rotateY(0deg);
  }
}
@-moz-keyframes cd-rotate-3-in {
  0% {
    -moz-transform: rotateY(180deg);
  }
  100% {
    -moz-transform: rotateY(0deg);
  }
}
@keyframes cd-rotate-3-in {
  0% {
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -ms-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
    transform: rotateY(180deg);
  }
  100% {
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    -o-transform: rotateY(0deg);
    transform: rotateY(0deg);
  }
}
@-webkit-keyframes cd-rotate-3-out {
  0% {
    -webkit-transform: rotateY(0);
  }
  100% {
    -webkit-transform: rotateY(-180deg);
  }
}
@-moz-keyframes cd-rotate-3-out {
  0% {
    -moz-transform: rotateY(0);
  }
  100% {
    -moz-transform: rotateY(-180deg);
  }
}
@keyframes cd-rotate-3-out {
  0% {
    -webkit-transform: rotateY(0);
    -moz-transform: rotateY(0);
    -ms-transform: rotateY(0);
    -o-transform: rotateY(0);
    transform: rotateY(0);
  }
  100% {
    -webkit-transform: rotateY(-180deg);
    -moz-transform: rotateY(-180deg);
    -ms-transform: rotateY(-180deg);
    -o-transform: rotateY(-180deg);
    transform: rotateY(-180deg);
  }
}
/* -------------------------------- 

xscale 

-------------------------------- */
.cd-headline.scale b {
  opacity: 0;
}
.cd-headline.scale i {
  display: inline-block;
  opacity: 0;
  -webkit-transform: scale(0);
  -moz-transform: scale(0);
  -ms-transform: scale(0);
  -o-transform: scale(0);
  transform: scale(0);
}
.is-visible .cd-headline.scale i {
  opacity: 1;
}
.cd-headline.scale i.in {
  -webkit-animation: scale-up 0.6s forwards;
  -moz-animation: scale-up 0.6s forwards;
  animation: scale-up 0.6s forwards;
}
.cd-headline.scale i.out {
  -webkit-animation: scale-down 0.6s forwards;
  -moz-animation: scale-down 0.6s forwards;
  animation: scale-down 0.6s forwards;
}

.no-csstransitions .cd-headline.scale i {
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  opacity: 0;
}

.no-csstransitions .cd-headline.scale .is-visible i {
  opacity: 1;
}

@-webkit-keyframes scale-up {
  0% {
    -webkit-transform: scale(0);
    opacity: 0;
  }
  60% {
    -webkit-transform: scale(1.2);
    opacity: 1;
  }
  100% {
    -webkit-transform: scale(1);
    opacity: 1;
  }
}
@-moz-keyframes scale-up {
  0% {
    -moz-transform: scale(0);
    opacity: 0;
  }
  60% {
    -moz-transform: scale(1.2);
    opacity: 1;
  }
  100% {
    -moz-transform: scale(1);
    opacity: 1;
  }
}
@keyframes scale-up {
  0% {
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -ms-transform: scale(0);
    -o-transform: scale(0);
    transform: scale(0);
    opacity: 0;
  }
  60% {
    -webkit-transform: scale(1.2);
    -moz-transform: scale(1.2);
    -ms-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
    opacity: 1;
  }
  100% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
    opacity: 1;
  }
}
@-webkit-keyframes scale-down {
  0% {
    -webkit-transform: scale(1);
    opacity: 1;
  }
  60% {
    -webkit-transform: scale(0);
    opacity: 0;
  }
}
@-moz-keyframes scale-down {
  0% {
    -moz-transform: scale(1);
    opacity: 1;
  }
  60% {
    -moz-transform: scale(0);
    opacity: 0;
  }
}
@keyframes scale-down {
  0% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
    opacity: 1;
  }
  60% {
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -ms-transform: scale(0);
    -o-transform: scale(0);
    transform: scale(0);
    opacity: 0;
  }
}
/* -------------------------------- 

xpush 

-------------------------------- */
.cd-headline.push b {
  opacity: 0;
}
.cd-headline.push b.is-visible {
  opacity: 1;
  -webkit-animation: push-in 0.6s;
  -moz-animation: push-in 0.6s;
  animation: push-in 0.6s;
}
.cd-headline.push b.is-hidden {
  -webkit-animation: push-out 0.6s;
  -moz-animation: push-out 0.6s;
  animation: push-out 0.6s;
}

@-webkit-keyframes push-in {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-100%);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateX(10%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateX(0);
  }
}
@-moz-keyframes push-in {
  0% {
    opacity: 0;
    -moz-transform: translateX(-100%);
  }
  60% {
    opacity: 1;
    -moz-transform: translateX(10%);
  }
  100% {
    opacity: 1;
    -moz-transform: translateX(0);
  }
}
@keyframes push-in {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-100%);
    -moz-transform: translateX(-100%);
    -ms-transform: translateX(-100%);
    -o-transform: translateX(-100%);
    transform: translateX(-100%);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateX(10%);
    -moz-transform: translateX(10%);
    -ms-transform: translateX(10%);
    -o-transform: translateX(10%);
    transform: translateX(10%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateX(0);
    -moz-transform: translateX(0);
    -ms-transform: translateX(0);
    -o-transform: translateX(0);
    transform: translateX(0);
  }
}
@-webkit-keyframes push-out {
  0% {
    opacity: 1;
    -webkit-transform: translateX(0);
  }
  60% {
    opacity: 0;
    -webkit-transform: translateX(110%);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateX(100%);
  }
}
@-moz-keyframes push-out {
  0% {
    opacity: 1;
    -moz-transform: translateX(0);
  }
  60% {
    opacity: 0;
    -moz-transform: translateX(110%);
  }
  100% {
    opacity: 0;
    -moz-transform: translateX(100%);
  }
}
@keyframes push-out {
  0% {
    opacity: 1;
    -webkit-transform: translateX(0);
    -moz-transform: translateX(0);
    -ms-transform: translateX(0);
    -o-transform: translateX(0);
    transform: translateX(0);
  }
  60% {
    opacity: 0;
    -webkit-transform: translateX(110%);
    -moz-transform: translateX(110%);
    -ms-transform: translateX(110%);
    -o-transform: translateX(110%);
    transform: translateX(110%);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateX(100%);
    -moz-transform: translateX(100%);
    -ms-transform: translateX(100%);
    -o-transform: translateX(100%);
    transform: translateX(100%);
  }
}
body{
background:#<?php echo $buzzycss_color_css2;?>!important; 
}	
#register-bg{
background:#<?php echo $buzzycss_color_css2;?>; /* W3C */
}
#reg-modal{
background:#fff!important;
width:960px!important;
margin:0 auto!important;
margin-top:148px!important;
 border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;	
-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.4);
-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.4);
box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.4);
}
.malebtn{
border:3px solid #255cd8; padding:8px!important; 
color:#255cd8;
cursor:pointer;
transition: all 0.25s ease-out;
    -o-transition: all 0.25s ease-out;
    -moz-transition: all 0.25s ease-out;
    -webkit-transition: all 0.25s ease-out;
}  
.malebtn:hover{
border:3px solid #4076ee; padding:8px!important; 
color:#4076ee;
} 

.femalebtn{
border:3px solid #cf3fdc; padding:8px!important; 
color:#cf3fdc;
cursor:pointer;
transition: all 0.25s ease-out;
    -o-transition: all 0.25s ease-out;
    -moz-transition: all 0.25s ease-out;
    -webkit-transition: all 0.25s ease-out;
}  
.femalebtn:hover{
border:3px solid #e050ed; padding:8px!important; 
color:#e050ed;
} 

.heterobtn{
border:3px solid #1a94e9; padding:8px!important; 
color:#1a94e9;
cursor:pointer;
transition: all 0.25s ease-out;
    -o-transition: all 0.25s ease-out;
    -moz-transition: all 0.25s ease-out;
    -webkit-transition: all 0.25s ease-out;
}  
.heterobtn:hover{
border:3px solid #5dbcfe; padding:8px!important; 
color:#5dbcfe;
} 

.homobtn{
border:3px solid #33c44e; padding:8px!important; 
color:#33c44e;
cursor:pointer;
transition: all 0.25s ease-out;
    -o-transition: all 0.25s ease-out;
    -moz-transition: all 0.25s ease-out;
    -webkit-transition: all 0.25s ease-out;
}  
.homobtn:hover{
border:3px solid #71da85; padding:8px!important; 
color:#71da85;
} 

.bibtn{
border:3px solid #9a46d4; padding:8px!important; 
color:#9a46d4;
cursor:pointer;
transition: all 0.25s ease-out;
    -o-transition: all 0.25s ease-out;
    -moz-transition: all 0.25s ease-out;
    -webkit-transition: all 0.25s ease-out;
}  
.bibtn:hover{
border:3px solid #c182ed; padding:8px!important; 
color:#c182ed;
} 
.smallinput{
margin-bottom:15px!important;	
}
.form-control{
border:1px solid #4e4e4e!important; 
padding:8px!important;
 background:#<?php echo $buzzycss_color_css3;?>!important;
}

	</style>
    <!-- JAVASCRIPT --------- START -->
	<script src="googleanalytics/ga-code.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script>
	jQuery(document).ready(function($){
	//set animation timing
	var animationDelay = 2500,
		//loading bar effect
		barAnimationDelay = 3600,
		barWaiting = barAnimationDelay - 3000, //3000 is the duration of the transition on the loading bar - set in the scss/css file
		//letters effect
		lettersDelay = 100,
		//type effect
		typeLettersDelay = 300,
		selectionDuration = 1000,
		typeAnimationDelay = selectionDuration + 3200,
		//clip effect 
		revealDuration = 1200,
		revealAnimationDelay = 1500;
	
	initHeadline();
	

	function initHeadline() {
		//insert <i> element for each letter of a changing word
		singleLetters($('.cd-headline.letters').find('b'));
		//initialise headline animation
		animateHeadline($('.cd-headline'));
	}

	function singleLetters($words) {
		$words.each(function(){
			var word = $(this),
				letters = word.text().split(''),
				selected = word.hasClass('is-visible');
			for (i in letters) {
				if(word.parents('.rotate-2').length > 0) letters[i] = '<em>' + letters[i] + '</em>';
				letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>': '<i>' + letters[i] + '</i>';
			}
		    var newLetters = letters.join('');
		    word.html(newLetters).css('opacity', 1);
		});
	}

	function animateHeadline($headlines) {
		var duration = animationDelay;
		$headlines.each(function(){
			var headline = $(this);
			
			if(headline.hasClass('loading-bar')) {
				duration = barAnimationDelay;
				setTimeout(function(){ headline.find('.cd-words-wrapper').addClass('is-loading') }, barWaiting);
			} else if (headline.hasClass('clip')){
				var spanWrapper = headline.find('.cd-words-wrapper'),
					newWidth = spanWrapper.width() + 10
				spanWrapper.css('width', newWidth);
			} else if (!headline.hasClass('type') ) {
				//assign to .cd-words-wrapper the width of its longest word
				var words = headline.find('.cd-words-wrapper b'),
					width = 0;
				words.each(function(){
					var wordWidth = $(this).width();
				    if (wordWidth > width) width = wordWidth;
				});
				headline.find('.cd-words-wrapper').css('width', width);
			};

			//trigger animation
			setTimeout(function(){ hideWord( headline.find('.is-visible').eq(0) ) }, duration);
		});
	}

	function hideWord($word) {
		var nextWord = takeNext($word);
		
		if($word.parents('.cd-headline').hasClass('type')) {
			var parentSpan = $word.parent('.cd-words-wrapper');
			parentSpan.addClass('selected').removeClass('waiting');	
			setTimeout(function(){ 
				parentSpan.removeClass('selected'); 
				$word.removeClass('is-visible').addClass('is-hidden').children('i').removeClass('in').addClass('out');
			}, selectionDuration);
			setTimeout(function(){ showWord(nextWord, typeLettersDelay) }, typeAnimationDelay);
		
		} else if($word.parents('.cd-headline').hasClass('letters')) {
			var bool = ($word.children('i').length >= nextWord.children('i').length) ? true : false;
			hideLetter($word.find('i').eq(0), $word, bool, lettersDelay);
			showLetter(nextWord.find('i').eq(0), nextWord, bool, lettersDelay);

		}  else if($word.parents('.cd-headline').hasClass('clip')) {
			$word.parents('.cd-words-wrapper').animate({ width : '2px' }, revealDuration, function(){
				switchWord($word, nextWord);
				showWord(nextWord);
			});

		} else if ($word.parents('.cd-headline').hasClass('loading-bar')){
			$word.parents('.cd-words-wrapper').removeClass('is-loading');
			switchWord($word, nextWord);
			setTimeout(function(){ hideWord(nextWord) }, barAnimationDelay);
			setTimeout(function(){ $word.parents('.cd-words-wrapper').addClass('is-loading') }, barWaiting);

		} else {
			switchWord($word, nextWord);
			setTimeout(function(){ hideWord(nextWord) }, animationDelay);
		}
	}

	function showWord($word, $duration) {
		if($word.parents('.cd-headline').hasClass('type')) {
			showLetter($word.find('i').eq(0), $word, false, $duration);
			$word.addClass('is-visible').removeClass('is-hidden');

		}  else if($word.parents('.cd-headline').hasClass('clip')) {
			$word.parents('.cd-words-wrapper').animate({ 'width' : $word.width() + 10 }, revealDuration, function(){ 
				setTimeout(function(){ hideWord($word) }, revealAnimationDelay); 
			});
		}
	}

	function hideLetter($letter, $word, $bool, $duration) {
		$letter.removeClass('in').addClass('out');
		
		if(!$letter.is(':last-child')) {
		 	setTimeout(function(){ hideLetter($letter.next(), $word, $bool, $duration); }, $duration);  
		} else if($bool) { 
		 	setTimeout(function(){ hideWord(takeNext($word)) }, animationDelay);
		}

		if($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
			var nextWord = takeNext($word);
			switchWord($word, nextWord);
		} 
	}

	function showLetter($letter, $word, $bool, $duration) {
		$letter.addClass('in').removeClass('out');
		
		if(!$letter.is(':last-child')) { 
			setTimeout(function(){ showLetter($letter.next(), $word, $bool, $duration); }, $duration); 
		} else { 
			if($word.parents('.cd-headline').hasClass('type')) { setTimeout(function(){ $word.parents('.cd-words-wrapper').addClass('waiting'); }, 200);}
			if(!$bool) { setTimeout(function(){ hideWord($word) }, animationDelay) }
		}
	}

	function takeNext($word) {
		return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
	}

	function takePrev($word) {
		return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
	}

	function switchWord($oldWord, $newWord) {
		$oldWord.removeClass('is-visible').addClass('is-hidden');
		$newWord.removeClass('is-hidden').addClass('is-visible');
	}
});
	</script>
</head>
    <!-- JAVASCRIPT --------- END -->

</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=<?php echo $buzzyfacebookid;?>&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="register-bg" style="z-index:1; position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    position:absolute;">
	<div style="max-width:640px!important; margin:0 auto;">
	<div style="margin-left:20px; margin-right:20px;">
<!-- cd-intro -->
	<p style="text-align:center!important; font-family:'Comfortaa'; font-size:36px!important; margin-top:20px!important; color:#fff; "><?php echo $buzzysitename;?></p>	
	
<div id="firstid" style="margin:0 auto; width:320px!important;" >
<p class="btn btn-primary btn-lg" id="rgid" style="width:320px!important;" ><?php echo $register;?></p>
<br><br>
<p class="btn btn-success btn-lg" id="lgid"  style="width:320px!important; text-align:center!important;" ><?php echo $login;?></p>
</div>	


<div id="logloglog" style="display:none;">
<p style="text-align:center!important;">
<a class="btn btn-default"  style="color:#3b5998; width:320px; font-size:18px!important; font-weight:400;"  href="<?php echo $link_prefix;?>oauth/fb/login_with_facebook.php">
<i class="fa fa-facebook" aria-hidden="true"></i> <?php echo $reg_with_facebook;?>
</a>
</p>
<br>
<p style="text-align:center!important;">
<a href=""  data-toggle="modal" data-target="#exampleModal234" style="color:#3b5998; width:320px; font-size:18px!important; font-weight:400;" class="btn btn-default"><i class="fa fa-sign-in" aria-hidden="true"></i> <?php echo $login;?></a>
</p>
<div class="modal fade" style="z-index:9999;" data-easein="flipBounceYIn"  id="exampleModal234" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"  style="z-index:999999;">
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
            <input type="email" style="background:#fff!important; border:1px solid #ccc!important;" name="buzzyuser_email" value="<?php echo $log_user;?>" required class="form-control" >
          </div>
		  <div class="form-group">
            <label class="control-label"><?php echo $password;?>:</label>
            <input type="password"  style="background:#fff!important; border:1px solid #ccc!important;" name="buzzyuser_password" value="<?php echo $log_pwd;?>" required class="form-control" >
          </div>
      <div id="status">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="buttontr btn btn-info" data-dismiss="modal"><?php echo $close;?></button>
        <button type="submit" name="login" data-target="#error" class="buttontr  btn btn-primary login"><?php echo $login;?></button>
      </div>
	  </form>
	  <br>
	  <div style="margin-left:20px!important; margin-right:20px!important;"><a href="<?php echo $link_prefix;?>password-reminder.php"><u><?php echo $forgot_password_rem;?></u></a>
    </div>
	<br>
	</div>
  </div>
</div>
</div>

	
<div id="genderid" style="display:none!important;" >
<br>
<p style="color:#fff!important; font-size:20px; text-align:center!important; margin-top:20px!important;"><?php echo $introdice_yourself;?></p>
<p style="color:#fff!important; font-size:26px; text-align:center!important; margin-top:20px!important;"><?php echo $you_are;?>:</p>
<p class="malebtn" id="malebtn" style="border:0px solid #000!important; background:#b9ddff!important; color:#333!important; font-size:20px; margin-left:20px; margin-right:20px;  text-align:center!important; margin-top:20px!important; border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;"><i class="fa fa-mars" aria-hidden="true"></i> <?php echo $male;?></p>
<p class="femalebtn" id="femalebtn" style="border:0px solid #000!important; background:#f7c1ff!important; color:#333!important;  font-size:20px; margin-left:20px; margin-right:20px;  text-align:center!important; margin-top:20px!important; border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;"><i class="fa fa-venus" aria-hidden="true"></i> <?php echo $female;?></p>
</div>
<div id="gendermale" style="display:none;">
<p style="font-size:26px; text-align:center!important; color:#fff!important; margin-top:20px!important;"><?php echo $you_are;?>:</p>
<p class="heterobtn" id="hetone" style="border:0px solid #000!important; background:#95befc!important; color:#333!important;  font-size:20px; margin-left:20px; margin-right:20px;  text-align:center!important; margin-top:20px!important; border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;"><a style="color:#333!important;" href="#case1"><?php echo $heterosexual;?></a></p>

<p class="homobtn" id="homone" id="" style="border:0px solid #000!important; background:#b4fed0!important; color:#333!important; font-size:20px; margin-left:20px; margin-right:20px;  text-align:center!important; margin-top:20px!important; border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;"><a style="color:#333!important;" href="#case2"><?php echo $homosexual;?></a></p>

<p class="bibtn" id="bione" style="border:0px solid #000!important; background:#e7b4fe!important; color:#333!important;  font-size:20px; margin-left:20px; margin-right:20px;  text-align:center!important; margin-top:20px!important; border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;"><?php echo $bisexual;?></p>
</div>

<div id="genderfemale" style="display:none;">
<p style="font-size:26px; text-align:center!important;color:#fff!important; margin-top:20px!important;"><?php echo $you_are;?>:</p>
<p class="heterobtn" id="hettwo" style="border:0px solid #000!important; background:#95befc!important; color:#333!important; font-size:20px; margin-left:20px; margin-right:20px;  text-align:center!important; margin-top:20px!important; border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;"><?php echo $heterosexual;?></p>

<p class="homobtn" id="homtwo" style="border:0px solid #000!important; background:#b4fed0!important; color:#333!important;  font-size:20px; margin-left:20px; margin-right:20px;  text-align:center!important; margin-top:20px!important; border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;"><?php echo $homosexual;?></p>

<p class="bibtn" id="bitwo" style="border:0px solid #000!important; background:#e7b4fe!important; color:#333!important;   font-size:20px; margin-left:20px; margin-right:20px;  text-align:center!important; margin-top:20px!important; border-radius:3px 3px 3px 3px;
-moz-border-radius:3px 3px 3px 3px;
-webkit-border-radius:3px 3px 3px 3px;"><?php echo $bisexual;?></p>
</div>

<div id="finishregone" style="display:none; margin:10px!important;">
<form action="" method="POST">
<input type="hidden"  name="buzzyuser_genre" value="0" >
<input type="hidden"  name="buzzyuser_data_sexual_orientation" value="0" >
<input type="text" name="buzzyuser_first_name" placeholder="<?php echo $first_name;?>" required class="form-control smallinput"
                               id="recipient-name">
		<input type="text" name="buzzyuser_last_name" placeholder="<?php echo $last_name;?>" required class="form-control smallinput" id="recipient-name">
 <input type="text" name="buzzyuser_username" placeholder="<?php echo $username;?>" required class="form-control smallinput" id="recipient-name">		
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
    echo '<select name="day" class="form-control smallinput" style="width:80px!important; float:left!important; margin-right:15px!important;">' . PHP_EOL;
    for ($d=1; $d<=31; $d++) {
        echo '  <option value="' . $d . '">' . $d . '</option>' . PHP_EOL;
    }
    echo '</select>' . PHP_EOL;
    $cutoff = 1917;

    // current year
    $now = date('Y');	
	    // build years menu
    echo '<select name="year" class="form-control smallinput" style="width:90px!important; margin-right:0px!important; float:left!important;">' . PHP_EOL;
    for ($y=1999; $y>=$cutoff; $y--) {
        echo '  <option value="' . $y . '">' . $y . '</option>' . PHP_EOL;
    }
    echo '</select>' . PHP_EOL;
?>
<div class="clearfix"></div>
 <input type="email" placeholder="<?php echo $email;?>" style="margin-top:0px!important;" name="buzzyuser_email" required class="form-control smallinput" id="recipient-name">
  <input type="password" placeholder="<?php echo $password;?>" name="buzzyuser_password" required class="form-control smallinput"
                               id="recipient-name">
	 <input type="text" onFocus="geolocate()" id="autocomplete"  name="buzzyuser_location" placeholder="<?php echo $location;?>" required class="form-control smallinput" >		
<div class="g-recaptcha" style="margin-left:0px!important;" data-sitekey="<?php echo $buzzycaptcha_sitekey;?>"></div>
   <br>
   <div id="caseone" style="display:none!important;">
   <button type="submit" name="register_userone" class="buttontr btn btn-primary"><?php echo $register;?></button>	 
   </div>
    <div id="casetwo" style="display:none!important;">
   <button type="submit" name="register_usertwo" class="buttontr btn btn-primary"><?php echo $register;?></button>	 
   </div>  
   <div id="casethree" style="display:none!important;">
   <button type="submit" name="register_userthree" class="buttontr btn btn-primary"><?php echo $register;?></button>	 
   </div>  
   
    <div id="casefour" style="display:none!important;">
   <button type="submit" name="register_userfour" class="buttontr btn btn-primary"><?php echo $register;?></button>	 
   </div>   
   <div id="casefive" style="display:none!important;">
   <button type="submit" name="register_userfive" class="buttontr btn btn-primary"><?php echo $register;?></button>	 
   </div> 
   <div id="casesix" style="display:none!important;">
   <button type="submit" name="register_usersix" class="buttontr btn btn-primary"><?php echo $register;?></button>	 
   </div> 
 </form>
 </div>
<div class="clearfix"></div>
<script type="text/javascript">   
$( "#rgid" ).click(function() {
  $( "#genderid" ).show();
   $( "#firstid" ).hide(); 
});
</script>
<script type="text/javascript">   
$( "#lgid" ).click(function() {
  $( "#logloglog" ).show();
   $( "#firstid" ).hide(); 
});
</script>


<script type="text/javascript">   
$( "#hetone" ).click(function() {
  $( "#finishregone" ).show();
   $( "#caseone" ).show();
   $( "#gendermale" ).hide(); 
});
</script>
<script type="text/javascript">   
$( "#homone" ).click(function() {
  $( "#finishregone" ).show();
    $( "#casetwo" ).show(); 
   $( "#gendermale" ).hide(); 
});
</script>
<script type="text/javascript">   
$( "#bione" ).click(function() {
  $( "#finishregone" ).show();
    $( "#casethree" ).show(); 
   $( "#gendermale" ).hide(); 
});
</script>


<script type="text/javascript">   
$( "#hettwo" ).click(function() {
  $( "#finishregone" ).show();
   $( "#casefour" ).show();
   $( "#genderfemale" ).hide(); 
});
</script>
<script type="text/javascript">   
$( "#homtwo" ).click(function() {
  $( "#finishregone" ).show();
    $( "#casefive" ).show(); 
   $( "#genderfemale" ).hide(); 
});
</script>
<script type="text/javascript">   
$( "#bitwo" ).click(function() {
  $( "#finishregone" ).show();
    $( "#casesix" ).show(); 
   $( "#genderfemale" ).hide(); 
});
</script>


<script type="text/javascript">   
$( "#malebtn" ).click(function() {
  $( "#gendermale" ).show();
   $( "#genderid" ).hide(); 
});
</script>

<script type="text/javascript">   
$( "#femalebtn" ).click(function() {
  $( "#genderfemale" ).show();
   $( "#genderid" ).hide(); 
});
</script>
<div class="clearfix"></div>
   <div style="bottom:0px!important; width:100%!important; margin:0 auto!important;">
	 <?php
      include 'HTML/footer.html';
     ?>
	 </div>
	 </div>
	 </div>
</div>
<div class="clearfix"></div>

<!-- GRID ANIMATION JS --------- START -->
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/imagesloaded.js"></script>
<script src="js/classie.js"></script>
<script src="js/AnimOnScroll.js"></script>
<script src="animation-js/<?php echo $buzzyanimationspeed; ?>-animation.js"></script>
		<script>
$.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
							<script>
					jQuery(document).ready(function(){
                    jQuery('#hideshow').live('click', function(event) {        
                     jQuery('#content').toggle('show');
                      });
                     });
					</script>
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
$('img[data-toggle="tooltip"]').tooltip({
   container: 'body'
});
</script>
<!-- GRID ANIMATION JS --------- END -->
<?php
  include 'HTML/modal-sweet-alerts.html';
?> 
<br />
<div class="clearfix"></div>	
  <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $buzzyyoutubeapi;?>&libraries=places&callback=initAutocomplete"
        async defer></script>
</body>
</html>