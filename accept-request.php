<?php 
session_start();
$request_id=$_GET['request-id'];	
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
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
     default:
         $fin_lng=$lng;
}

$final_lang=$fin_lng;
}

		  include 'languages/'.$final_lang.'.php';
		  }
if (!isset($_SESSION["buzzyuser_id"])) {
header('Location:'.$link_prefix.'index.php');		   
}		   
$accfriend_request_query="SELECT COUNT(*) FROM buddies WHERE user_id=$request_id AND friend=$session_user_id  AND friend_status=0";
foreach ($connread->query($accfriend_request_query) as $row) {
$count_req=$row['COUNT(*)'];	
}	
if ($buzzywebsite_status==0 AND $count_req!=0){
$OK = false;
$update_friend_query = "UPDATE buddies SET friend_status=1 WHERE user_id=$request_id AND friend=$session_user_id  AND friend_status=0";
$stmt = $connwrite->prepare($update_friend_query);
$stmt->execute();
$OK = $stmt->rowCount();		
$add_msgan_query = "INSERT INTO messages(message,time,user_id,receiver,storage_a,storage_b,status,start)
VALUES(:message,:time,:user_id,:receiver,:storage_a,:storage_b,'unread',1)";
// prepare the statement
$stmt = $connwrite->prepare($add_msgan_query);
// bind the parameters and execute the statement
$stmt->bindParam(':message', $answer_to_mess, PDO::PARAM_STR);
$stmt->bindParam(':time', $now, PDO::PARAM_STR);
$stmt->bindParam(':user_id', $session_user_id, PDO::PARAM_STR);		
$stmt->bindParam(':receiver', $request_id, PDO::PARAM_STR);
$stmt->bindParam(':storage_a', $session_user_id, PDO::PARAM_STR);		
$stmt->bindParam(':storage_b', $request_id, PDO::PARAM_STR);		
// execute and get number of affected rows
$stmt->execute();
$OK = $stmt->rowCount();				
header('Location:'.$link_prefix.'page.php?friends='.$session_user_id.'');		
}
else if ($buzzywebsite_status==0 AND $count_req==0){
header('Location:'.$link_prefix.'page.php?friends='.$session_user_id.'&onlydemo=true');	
}    
else if ($buzzywebsite_status==1){
header('Location:'.$link_prefix.'page.php?friends='.$session_user_id.'&onlydemo=true');	
}
?>
