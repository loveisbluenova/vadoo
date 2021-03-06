<?php
ob_start('ob_gzhandler');
$aip = $_SERVER['REMOTE_ADDR'];
$bip = $_SERVER['HTTP_X_FORWARDED_FOR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$rr_buzzyuser_id=$_GET['user-id'];
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

$website_options_query = "SELECT * FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1";	
foreach ($connread->query($website_options_query) as $row) {
$buzzyoptimizedstatus=$row['buzzyoptimizedstatus'];
$buzzysiteurl=$row['buzzysiteurl'];
}

$website_css_options_query = "SELECT * FROM  buzzycss WHERE buzzycss_id=1";
foreach ($connread->query($website_css_options_query) as $row) {
$buzzycss_color_css=$row['buzzycss_color_css'];
$buzzycss_color_css1=$row['buzzycss_color_css1'];
$buzzycss_color_css2=$row['buzzycss_color_css2'];
$buzzycss_color_css3=$row['buzzycss_color_css3'];
$buzzycss_width=$row['buzzycss_width'];
$buzzycss_headings_font_family=$row['buzzycss_headings_font_family'];
$buzzycss_headings_font_family_link=preg_replace("/ /","+",$buzzycss_headings_font_family);
$buzzycss_body_font_family=$row['buzzycss_body_font_family'];
$buzzycss_body_font_family_link=preg_replace("/ /","+",$buzzycss_body_font_family);
}
if (strpos($myUrl,'https://') !== false) {
$htttp='https://';	
}
else if (strpos($myUrl,'https://') !== false) {
$htttp='https://';		
}
$actual_link = $htttp . $buzzysiteurl;
   if (strpos($actual_link, "localhost") == false) {
   $final_actual_link=$actual_link.'/';
    }
	else if (strpos($actual_link, "localhost")!= false) {
   $final_actual_link='';
    }
if($buzzyoptimizedstatus==0){
$link_prefix='';
}
//THIS IS PART FOR OPTIMIZED WEBSITE LINKS. HERE YOU CAN CHANGE YOUR LINK NAMES, BUT YOU MUST CHANGE IT IN HTTACCESS ALSO ---- START
else if($buzzyoptimizedstatus==1){
$link_prefix=$actual_link.'/';
}
include 'PHP/loginuser.php';	 
$website_language_query = "SELECT * FROM buzzylanguages WHERE buzzylanguage_id=1";
		  foreach ($connread->query($website_language_query) as $row) {
		  $lng=$row['buzzylanguage'];
if ($buzzylanguage_status==0){
$final_lang=$lng;
}
else if ($buzzylanguage_status==1){

function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("https://www.geoplugin.net/json.gp?ip=" . $user_ipreal));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}

$vis_country=ip_info("Visitor", "Country"); 
switch ($vis_country) {
	case 'China':
       $fin_lng='ch';
        break;	
	case 'Germany':
       $fin_lng='de';
        break;	
	case 'France':
       $fin_lng='fr';
        break;	
	case 'Italy':
       $fin_lng='it';
        break;
	case 'Portugal':
       $fin_lng='pt';
        break;	
	case 'Brazil':
       $fin_lng='pt';
        break;	
	case 'Turkey':
       $fin_lng='tr';
        break;	
	case 'Spain':
       $fin_lng='es';
        break;	
	case 'Mexico':
       $fin_lng='es';
        break;
	case 'Colombia':
       $fin_lng='es';
        break;
	case 'Argentina':
       $fin_lng='es';
        break;	
	case 'Peru':
       $fin_lng='es';
        break;
	case 'Chile':
       $fin_lng='es';
        break;
	case 'Guatemala':
       $fin_lng='es';
        break;
	case 'Cuba':
       $fin_lng='es';
        break;
	case 'Bolivia':
       $fin_lng='es';
        break;	
	case 'Dominican Republic':
       $fin_lng='es';
        break;
	case 'Honduras':
       $fin_lng='es';
        break;			
	case 'Paraguay':
       $fin_lng='es';
        break;
    case 'El Salvador':
       $fin_lng='es';
        break;	
    case 'United States':
       $fin_lng='en';
        break;	
    case 'United Kingdom':
       $fin_lng='en';
        break;	
    case 'Netherlands':
       $fin_lng='nl';
        break;		
     default:
         $fin_lng=$lng;
}

$final_lang=$fin_lng;
}
	$final_style_color=$buzzycss_color_css;
	$final_style_color1=$buzzycss_color_css1;
	$final_style_color2=$buzzycss_color_css2;	
		  include 'languages/'.$final_lang.'.php';
		  }
$now = time();	
	   $update_unmsg_query = "UPDATE chatmessages SET  status='read' WHERE user_id=$rr_buzzyuser_id 
	   AND receiver=$session_user_id AND status='0'";
        $stmt = $connwrite->prepare($update_unmsg_query);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();			