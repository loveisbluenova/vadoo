<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
$msie = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
$firefox = strpos($_SERVER["HTTP_USER_AGENT"], 'Firefox') ? true : false;
$safari = strpos($_SERVER["HTTP_USER_AGENT"], 'Safari') ? true : false;
$chrome = strpos($_SERVER["HTTP_USER_AGENT"], 'Chrome') ? true : false;
// Get HTTP/HTTPS (the possible values for this vary from server to server)
$myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
// Get domain portion
$myUrl .= '://'.$_SERVER['HTTP_HOST'];
// Get path to script
$myUrl .= $_SERVER['REQUEST_URI'];
// Add path info, if any
if (!empty($_SERVER['PATH_INFO'])) $myUrl .= $_SERVER['PATH_INFO'];
// Add query string, if any (some servers include a ?, some don't)
if (!empty($_SERVER['QUERY_STRING'])) $myUrl .= '?'.ltrim($_SERVER['REQUEST_URI'],'?');
if (strpos($myUrl,'http://') !== false) {
$htttp='http://';	
}
else if (strpos($myUrl,'https://') !== false) {
$htttp='https://';		
}
if (isset ($_SESSION["buzzyadmin_id"])){

}
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
$user_ipreal = getUserIP();

$now = time();
$formated_day_from_now =  date('d', $now);
$formated_month_from_now =  date('m', $now);
$currdaymonth=$formated_day_from_now . $formated_month_from_now;
function cm2feet($cm)
{
     $inches = $cm/2.54;
     $feet = intval($inches/12);
     $inches = $inches%12;
     return sprintf('%d ft %d ins', $feet, $inches);
}

function kgToLb ($val) {
  return number_format((float)$val, 2, '.', '') * 2.20;
}

$link_suff = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1);;
$actual_link2 = "http://$_SERVER[HTTP_HOST]$link_suff";
date_default_timezone_set('Etc/UTC');
$website_chat_query = "SELECT * FROM chat_options WHERE chat_option_id=1";
foreach ($connread->query($website_chat_query) as $row) {
$chat_option_coloone=$row['chat_option_coloone'];
$chat_option_colotwo=$row['chat_option_colotwo'];
$chat_option_colothree=$row['chat_option_colothree'];
$chat_option_refresh=$row['chat_option_refresh'];
$chat_option_radius=$row['chat_option_radius'];
$chat_option_limit=$row['chat_option_limit'];
}	
$website_allcurrencies_query = "SELECT * FROM buzzycurrencylist WHERE buzzycurrencylist_id=1";
$website_userglobals_query = "SELECT * FROM  buzzyuserglobals WHERE buzzyuserglobal_id=1";
foreach ($connread->query($website_userglobals_query) as $row) {
$buzzy_stripekey=$row['buzzy_stripekey'];
$buzzy_stripeprice=$row['buzzy_stripeprice'];
$buzzy_stripefullprice=100*$buzzy_stripeprice;
$buzzyuserglobal_credits=$row['buzzyuserglobal_credits'];
$buzzyuserglobal_creditprice=$row['buzzyuserglobal_creditprice'];
$twobuzzyuserglobal_credits=2*$buzzyuserglobal_credits;
$twobuzzyuserglobal_creditprice=2*$buzzyuserglobal_creditprice;
$fourbuzzyuserglobal_credits=4*$buzzyuserglobal_credits;
$fourbuzzyuserglobal_creditprice=4*$buzzyuserglobal_creditprice;
$eightbuzzyuserglobal_credits=8*$buzzyuserglobal_credits;
$eightbuzzyuserglobal_creditprice=8*$buzzyuserglobal_creditprice;

$buzzyuserpaypal_currency=$row['buzzyuserpaypal_currency'];
$buzzypaypal_email=$row['buzzypaypal_email'];
$buzzyuserskrill_currency=$row['buzzyuserskrill_currency'];
$buzzyskrill_email=$row['buzzyskrill_email'];
$paypal_url=$row['paypal_url'];
}
	$website_premium_query = "SELECT * FROM  buzzypaidservices WHERE buzzypaidservice_id=3";	
	foreach ($connread->query($website_premium_query) as $row) {
	$premiumbuzzypaidservice_title=$row['buzzypaidservice_title'];	
	$premiumbuzzypaidservice_price=$row['buzzypaidservice_price'];	
    }

	$website_gold_query = "SELECT * FROM  buzzypaidservices WHERE buzzypaidservice_id=4";	
	foreach ($connread->query($website_gold_query) as $row) {
	$goldbuzzypaidservice_title=$row['buzzypaidservice_title'];	
	$goldbuzzypaidservice_price=$row['buzzypaidservice_price'];	
    }

	$website_vip_query = "SELECT * FROM  buzzypaidservices WHERE buzzypaidservice_id=5";	
	foreach ($connread->query($website_vip_query) as $row) {
	$vipbuzzypaidservice_title=$row['buzzypaidservice_title'];	
	$vipbuzzypaidservice_price=$row['buzzypaidservice_price'];	
    }
	$website_reg_query = "SELECT * FROM  buzzypaidservices WHERE buzzypaidservice_id=7";	
	foreach ($connread->query($website_reg_query) as $row) {
	$regbuzzypaidservice_title=$row['buzzypaidservice_title'];	
	$regbuzzypaidservice_price=$row['buzzypaidservice_price'];	
    }
	
$lat_news_query = "SELECT * FROM buzzynews WHERE buzzynews_approval_status=1 AND buzzynews_gstatus=0 ORDER by buzzynews_id DESC LIMIT 5";

$website_chosenthemes_query = "SELECT * FROM  buzzychosenthemes WHERE buzzychosentheme_id=1";
foreach ($connread->query($website_chosenthemes_query) as $row) {
$buzzytheme_id=$row['buzzytheme_id'];
}
$all_gifts_query = "SELECT * FROM buzzynewgifts  ORDER by buzzygift_id ASC";
$rand_rss_query = "SELECT * FROM buzzynews WHERE buzzynews_approval_status=1 AND buzzynews_gstatus=3 ORDER by RAND()LIMIT 5";
if (isset ($_GET['theme'])){
$buzzyfinaltheme_id=$_GET['theme'];	
}
else if (!isset ($_GET['theme'])){
$buzzyfinaltheme_id=$buzzytheme_id;	
}
$website_options_query = "SELECT * FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1";
foreach ($connread->query($website_options_query) as $row) {
$buzzysite_safeupload=$row['buzzysite_safeupload'];
}	
$website_emots_query = "SELECT * FROM  buzzyemots ORDER by buzzyemot_id ASC";
$website_css_options_query = "SELECT * FROM  buzzycss WHERE buzzycss_id=$buzzyfinaltheme_id";
foreach ($connread->query($website_options_query) as $row) {
$buzzysitename=$row['buzzysitename'];	
$buzzysiteurl=$row['buzzysiteurl'];	
$buzzysitelogo=$row['buzzysitelogo'];
$buzzyregimage=$row['buzzyregimage'];
$buzzyemail=$row['buzzyemail'];
$buzzyemailpass=$row['buzzyemailpass'];
$buzzyoptimizedstatus=$row['buzzyoptimizedstatus'];
$buzzynewslimit=$row['buzzynewslimit'];
$buzzyyoutubeapi=$row['buzzyyoutubeapi'];
$buzzyfortumoid=$row['buzzyfortumoid'];
$buzzyfacebookaccess=$row['buzzyfacebookaccess'];
$buzzyfortumosecret=$row['buzzyfortumosecret'];
$buzzydistance_mesaure=$row['buzzydistance_mesaure'];
$buzzywebsite_status=$row['buzzywebsite_status'];
$buzzyreg_status=$row['buzzyreg_status'];

if($buzzywebsite_status==0){
$buzzyuser_demostatus=0;
$fb_suff='';	
}
else if($buzzywebsite_status==1){
$buzzyuser_demostatus=1;
$fb_suff='-demo';	
}

$buzzyversion=$row['buzzyversion'];
$buzzyupdatestatus=$row['buzzyupdatestatus'];
$buzzytimezone=$row['buzzytimezone'];
$buzzysitemeasure=$row['buzzysitemeasure'];
$buzzyuserimage_status=$row['buzzyuserimage_status'];
$buzzylanguage_status=$row['buzzylanguage_status'];
$buzzy_gzip=$row['buzzy_gzip'];
$unformat_buzzy_theme=$row['buzzy_theme'];
$unbuzzygrideffect=$row['buzzygrideffect'];
$buzzy_access=$row['buzzy_access'];
$buzzy_accesstime=$row['buzzy_accesstime'];
$buzzy_accesstimestamp=$buzzy_accesstime*86400;
$buzzy_frontpage=$row['buzzy_frontpage'];		
			$buzzyprivacy = $row['buzzyprivacy'];
			$buzzyterms = $row['buzzyterms'];
                $buzzy_forbid=$row['buzzy_forbid'];	
$buzzy_ajaxcount=$row['buzzy_ajaxcount'];

				if ($buzzy_ajaxcount==0){
                $cicfour='';			
                }	
			    else if ($buzzy_ajaxcount==1){
                $cicfour='cicfour';							
                }
				
require 'PHPMailerAutoload.php';
   $mail = new PHPMailer;
  //$mail->IsSMTP(); // telling the class to use SMTP
   $mail->Host       = "smtp.gmail.com"; // SMTP server
   $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)                                       // 1 = errors and message                                      // 2 = messages only
   $mail->SMTPAuth   = true;                  // enable SMTP authentication
   $mail->Host       = "smtp.gmail.com"; // sets the SMTP server
   $mail->Port       = 465;                    // set the SMTP port for the GMAIL server
   $mail->Username   = $buzzyemail; // SMTP account username
   $mail->Password   = $buzzyemailpass;        // SMTP account password
   $mail->SMTPSecure = 'ssl';
   $mail->From = $buzzyemail;


	
if($buzzy_gzip==0){
$gzz='';
}
else if($buzzy_gzip==1){
$gzz='.gz';
}

if ($buzzysitemeasure==0){
$height_array='<input type="number" min="130" max="230" name="buzzyuser_data_height"  required class="form-control" id="recipient-name">';	
$weight_array='<input type="number" min="35" max="300"  name="buzzyuser_data_weight" required class="form-control" id="recipient-name">';
$hes='kg';
$mes='cm';
$mess='cm';
}	
else if ($buzzysitemeasure==1){
$hes='lbs';
$weight_array='<input type="number" min="70" max="600" " name="buzzyuser_data_lbweight" required class="form-control" id="recipient-name">';
$height_array='<select class="form-control" name="buzzyuser_data_height" required>
<option value="134.62">
4&#x27; 5&#x22;
</option>
<option value="137.16">
4&#x27; 6&#x22;
</option>
<option value="139.7">
4&#x27; 7&#x22;
</option>
<option value="142.24">
4&#x27; 8&#x22;
</option>
<option value="144.78">
4&#x27; 9&#x22;
</option>
<option value="147.32">
4&#x27; 10&#x22;
</option>
<option value="149.86">
4&#x27; 11&#x22;
</option>
<option value="152.4">
5&#x27; 0&#x22;
</option>
<option value="154.94">
5&#x27; 1&#x22;
</option>
<option value="157.48">
5&#x27; 2&#x22;
</option>
<option value="160.02">
5&#x27; 3&#x22;
</option>
<option value="162.56">
5&#x27; 4&#x22;
</option>
<option value="165.1">
5&#x27; 5&#x22;
</option>
<option value="167.64">
5&#x27; 6&#x22;
</option>
<option value="170.18">
5&#x27; 7&#x22;
</option>
<option value="172.72">
5&#x27; 8&#x22;
</option>
<option value="175.26">
5&#x27; 9&#x22;
</option>
<option value="177.8">
5&#x27; 10&#x22;
</option>
<option value="180.34">
5&#x27; 11&#x22;
</option>
<option value="182.88">
6&#x27; 0&#x22;
</option>
<option value="185.42">
6&#x27; 1&#x22;
</option>
<option value="187.96">
6&#x27; 2&#x22;
</option>
<option value="190.5">
6&#x27; 3&#x22;
</option>
<option value="193.04">
6&#x27; 4&#x22;
</option>
<option value="195.58">
6&#x27; 5&#x22;
</option>
<option value="198.12">
6&#x27; 6&#x22;
</option>
<option value="200.66">
6&#x27; 7&#x22;
</option>
<option value="203.2">
6&#x27; 8&#x22;
</option>
<option value="205.74">
6&#x27; 9&#x22;
</option>
<option value="208.28">
6&#x27; 10&#x22;
</option>
<option value="210.82">
6&#x27; 11&#x22;
</option>
</select>
';	
$mes='Feet and inches';	
$mess='';
}

date_default_timezone_set($buzzytimezone);
if ($buzzywebsite_status==0){
$register_inc='registeruser.php';
$fb_loginurl='oauth/fb/login_with_facebook.php';
$log_user='';
$log_pwd='';
}
else if($buzzywebsite_status==1){
$register_inc='registeruser.php';
$fb_loginurl='oauth/fb/login_with_facebook.php';	
$log_user='jonhydoebmt@gmail.com';
$log_pwd='123123';
}


if ($buzzydistance_mesaure==0){
$kmm='km';
}
else if ($buzzydistance_mesaure==1){
$kmm='miles';	
}

$fortumo_status=$row['fortumo_status'];
$buzzyfb_images=$row['buzzyfb_images'];
$buzzymax_pages=$row['buzzymax_pages'];
if ($fortumo_status==0){
$fok='?test=ok';	
}
else if ($fortumo_status==1){
$fok='';	
}
}
$actual_link = $htttp . $buzzysiteurl;
   if (strpos($actual_link, "localhost") == false) {
   $final_actual_link=$actual_link.'/';
    }
	else if (strpos($actual_link, "localhost")!= false) {
   $final_actual_link='';
    }
if($buzzyoptimizedstatus==0){
$index_prefix='index.php?category=';
$index_sufix='';
$news_prefix='news.php?news-url=';
$user_id_url='page.php?user-id=';
$profileimg_id_url='page.php?profile-img-id=';
$galleryimg_id_url='page.php?gallery-img-id=';
$my_gallery_id_url='page.php?session-gallery-id=';
$notifications_url='page.php?notifications=';
$privacy_url='page.php?privacy=1';
$terms_url='page.php?terms=1';
$matches_url='page.php?matches=';
$news_sufix='';
$link_prefix='';
$allcategories='allcategories.php';
$featured_url='featured.php';
$message_prefix='../';
}

//THIS IS PART FOR OPTIMIZED WEBSITE LINKS. HERE YOU CAN CHANGE YOUR LINK NAMES, BUT YOU MUST CHANGE IT IN HTTACCESS ALSO ---- START
else if($buzzyoptimizedstatus==1){
$index_prefix='category/';
$index_sufix='';
$news_prefix='news/';
$user_id_url='user/';
$profileimg_id_url='profile-img-id/';
$galleryimg_id_url='gallery-img-id/';
$my_gallery_id_url='my-gallery/';
$notifications_url='notifications/';
$privacy_url='privacy/';
$terms_url='terms/';
$matches_url='matches/';
$news_sufix='/';
$link_prefix=$actual_link.'/';
$allcategories='All-categories';
$featured_url='featured';
$message_prefix='';
}
//THIS IS PART FOR OPTIMIZED WEBSITE LINKS. HERE YOU CAN CHANGE YOUR LINK NAMES, BUT YOU MUST CHANGE IT IN HTTACCESS ALSO ---- END

$basicquest="?";
$quest="";	
$this_year=date("Y");

$website_language_query = "SELECT * FROM buzzylanguages WHERE buzzylanguage_id=1";
  if (isset($_POST['search'])) {
	 $q=$_POST['q'];
	 header('Location:'.$link_prefix.'index.php?search-page='.$q.'');
  }
 foreach ($connread->query($website_css_options_query) as $row) {
$buzzycss_color_css=$row['buzzycss_color_css'];
$buzzycss_color_css1=$row['buzzycss_color_css1'];
$buzzycss_color_css2=$row['buzzycss_color_css2'];
$buzzycss_color_css3=$row['buzzycss_color_css3'];
$buzzycss_color_css4=$row['buzzycss_color_css4'];
$buzzycss_color_css5=$row['buzzycss_color_css5'];
$buzzycss_width=$row['buzzycss_width'];
$buzzycss_btnradius=$row['buzzycss_btnradius'];
$buzzycss_widththree=$buzzycss_width/3;
$buzzycss_width_owl_img=($buzzycss_width-12)/6;
$buzzycss_fixwidth=$buzzycss_width+40;
$buzzycss_superwidth=$buzzycss_width+400;
$buzzycss_superwidthtwo=$buzzycss_superwidth+50;
$buzzycss_headings_font_family=$row['buzzycss_headings_font_family'];
$buzzycss_headings_font_family_link=preg_replace("/ /","+",$buzzycss_headings_font_family);
$buzzycss_body_font_family=$row['buzzycss_body_font_family'];
$buzzycss_body_font_family_link=preg_replace("/ /","+",$buzzycss_body_font_family);
$buzzycss_style=$row['buzzycss_style'];
$buzzycss_loader=$row['buzzycss_loader'];
$buzzycss_bg=$row['buzzycss_bg'];
$buzzycssland_bg=$row['buzzycssland_bg'];
$img_cont_width=($buzzycss_width-10)/6;
$img_cont_width2=100/6;
$img_cont_width3=100/5;
$img_cont_width4=100/4;
$img_cont_width5=100/3;
$img_cont_width6=100/2;
}


$basic_limits_query = "SELECT * FROM buzzylimits WHERE buzzylimit_id=1";
foreach ($connread->query($basic_limits_query) as $row) {
$buzzylimit_chatone=$row['buzzylimit_chatone'];
$buzzylimit_chattwo=$row['buzzylimit_chattwo'];	
$buzzylimit_chatthree=$row['buzzylimit_chatthree'];	
}

$website_conn_query = "SELECT * FROM  buzzyconnection WHERE buzzyconnection_id=1";
foreach ($connread->query($website_conn_query) as $row) {
$buzzyconnection_value=$row['buzzyconnection_value'];

if($buzzyconnection_value==0){
$added_val=1;	
$connsufix='';	
}
else if($buzzyconnection_value==1){
$added_val=0;
$connsufix='two';	
}

$buzzyconnection_timestamp=$row['buzzyconnection_timestamp'];
$buzzyconnection_difference=$now-$buzzyconnection_timestamp;	
}	

$mailing_query = "SELECT * FROM buzzymailing_list";
if(2>5){
foreach ($connread->query($mailing_query) as $row) {
$buzzymailing_list_email=$row['buzzymailing_list_email'];		
$buzzymailing_list_timestamp=$row['buzzymailing_list_timestamp'];
$from=$buzzyemail;
$to = $buzzymailing_list_email;
$subject = 'Website Change Request';
$message = '<html>
<head>
<title>HTML email</title>
<style>

</style>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // Create email headers
        $headers .= 'From: '.$buzzyemail."\r\n".
        'Reply-To: '.$buzzyemail."\r\n" .
        'X-Mailer: PHP/' . phpversion();
mail($from, $to, $subject, $message, $headers);
}
}


$useragent=$_SERVER['HTTP_USER_AGENT'];
if(!preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
$mobile_device_detected=FALSE;	
}
else if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
$mobile_device_detected=TRUE;	
}
$online_diff=$now-300;	

	 $update_alluserlogina_query = "UPDATE buzzyusers SET buzzyuser_onlinestatus=0 WHERE buzzyuser_onlinestatus=1 AND buzzyuser_last_login<$online_diff";
        $stmt = $connwrite->prepare($update_alluserlogina_query);
        // bind the parameters and execute the statement	
        // execute and get number of affected rows
        $stmt->execute();		
        $OK = $stmt->rowCount();	
if (!isset ($_SESSION['buzzyuser_id'])){
$allab_users_query = "SELECT *FROM buzzyusers"; 
    foreach ($connread->query($allab_users_query) as $row) { 
	$ab_buzzyuser_registration_timestamp=$row['buzzyuser_registration_timestamp'];
    $ab_buzzyuser_demostatus=$row['buzzyuser_demostatus'];	
	$userrr_diff=$now-$ab_buzzyuser_registration_timestamp;	
	if($ab_buzzyuser_demostatus==1){
	if($userrr_diff>=16400){
$delete_allus_query = "DELETE FROM buzzyusers WHERE buzzyuser_registration_timestamp=$ab_buzzyuser_registration_timestamp";
$stmt = $connwrite->prepare($delete_allus_query);
$stmt->execute();
$OK = $stmt->rowCount();		
	}	
	}	
	}
    }	
		