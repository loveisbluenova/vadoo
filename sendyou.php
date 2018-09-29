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
$buzzyyoutubeapi=$row['buzzyyoutubeapi'];
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
if (strpos($myUrl,'http://') !== false) {
$htttp='http://';	
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
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $user_ipreal));
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
if (strpos($_POST['message'],'script') !== false) {
 $message='';	
 $xss_attack=TRUE;
 }
 else if (strpos($_POST['message'],'document(') !== false) {
 $message='';	
 $xss_attack=TRUE;
 }
  else if (strpos($_POST['message'],'body onload') !== false) {
 $message='';	
 $xss_attack=TRUE;
 }
 else if (strpos($_POST['message'],'alert') !== false) {
 $message='';	
 $xss_attack=TRUE;
 }
 else if (strpos($_POST['message'],'onerror=alert') !== false) {
 $message='';	
 $xss_attack=TRUE;
 }
 else if (strpos($_POST['message'],'META HTTP') !== false) {
 $message='';	
 $xss_attack=TRUE;
 }
  else if (strpos($_POST['message'],'<%') !== false) {
 $message='';	
 $xss_attack=TRUE;
 }
 else if (strpos($_POST['message'],'urldecode') !== false) {
 $message='';	
 $xss_attack=TRUE;
 }
 else{
 $message=htmlspecialchars($_POST['message'], ENT_QUOTES);
 }
 $image_url = parse_url($message);	  
      if (strpos($message,'youtube') !== false) {
      if (strpos($message,'list') === false) {	
      if((preg_match('/https:\/\/(www\.)*youtube\.com\/.*/',$message)) OR (preg_match('/http:\/\/(www\.)*youtube\.com\/.*/',$message))){	  
      $array = explode("&", $image_url['query']);
      $videolink=substr($array[0], 2);	
			$ch = curl_init();
            $headr = array();
            $headr[] = 'Content-length: 0';
            $headr[] = 'Content-type: application/json';
            curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/videos?id='.$videolink.'&key='.$buzzyyoutubeapi.'&part=snippet,contentDetails,statistics,status');
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

            $videolink_title=$json_data['items'][0]["snippet"]["title"];		
			$videolink_image=$json_data['items'][0]["snippet"]["thumbnails"]["medium"]["url"]; 

      }
	  }
	  }
	  }

$youtube_message='<a href="'.$message.'" ><img src="'.$videolink_image.'" alt="" target="_blank" />
<br>
<span>'.$videolink_title.'</span>
</a>';
$receiver=$_POST['receiver'];
        $add_msg_query = "INSERT INTO  chatmessages(message,time,user_id,receiver,storage_a,storage_b,status)
		 	  VALUES(:message,:time,:user_id,:receiver,:storage_a,:storage_b,0)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_msg_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':message', $youtube_message, PDO::PARAM_STR);
		$stmt->bindParam(':time', $now, PDO::PARAM_STR);
		$stmt->bindParam(':user_id', $session_user_id, PDO::PARAM_STR);	
		$stmt->bindParam(':receiver', $receiver, PDO::PARAM_STR);		
		$stmt->bindParam(':storage_a', $session_user_id, PDO::PARAM_STR);	
		$stmt->bindParam(':storage_b', $receiver, PDO::PARAM_STR);
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();