<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
 $now = time();
 $yesterday = $now-86400;
 $last_week= $now-7*86400;
 $last_month= $now-30*86400;
 $website_chosenthemes_query = "SELECT * FROM  buzzychosenthemes WHERE buzzychosentheme_id=1";
 foreach ($connread->query($website_chosenthemes_query) as $row) {
$chosen_buzzytheme_id=$row['buzzytheme_id'];
}
 $count_yesterday_visits_query = "SELECT COUNT(*) as count_yesterday_visits FROM visitcount WHERE visitcount_timestamp>$yesterday";
 $count_week_visits_query = "SELECT COUNT(*) as count_week_visits FROM visitcount WHERE visitcount_timestamp>$last_week";
 $count_month_visits_query = "SELECT COUNT(*) as count_month_visits FROM visitcount WHERE visitcount_timestamp>$last_month";
 $basic_themes_query = "SELECT  * FROM  buzzythemes";
 $basic_customlanguage_query = "SELECT * FROM  buzzycustomlanguage WHERE buzzycustomlanguage_id=1";
 $basic_count_themes_query = "SELECT COUNT(*) FROM  buzzythemes";
 foreach ($connread->query($basic_count_themes_query) as $row) {
 $count_themes=$row['COUNT(*)'];	
 }
$basic_limits_query = "SELECT * FROM buzzylimits WHERE buzzylimit_id=1";
foreach ($connread->query($basic_limits_query) as $row) {
$buzzylimit_chatone=$row['buzzylimit_chatone'];
$buzzylimit_chattwo=$row['buzzylimit_chattwo'];	
$buzzylimit_chatthree=$row['buzzylimit_chatthree'];	
}
   $basic_custompages_query = "SELECT COUNT(*)  as count_pages FROM buzzycustompages";
  $basic_countpaids_query = "SELECT COUNT(*)  as count_paids FROM  buzzypaidservices";
 
  $basic_countusimg_query = "SELECT COUNT(*)  as count_usimg FROM buzzyuserimages WHERE  buzzyuserimage_approval=1";
 
 $website_allcurrencies_query = "SELECT * FROM buzzycurrencylist ORDER by buzzycurrencylist_title ASC";
 $basic_count_siderss_query = "SELECT COUNT(*)  as count_siderss FROM  buzzysiderss";
 
 $count_categories_query = "SELECT COUNT(*) as count_categories FROM  buzzynewscategories";
 $count_users_query = "SELECT COUNT(*) as count_users FROM  buzzyusers";
 $count_gifts_query = "SELECT COUNT(*) as count_gifts FROM  buzzynewgifts";
 $count_onusers_query = "SELECT COUNT(*) as count_onusers FROM  buzzyusers WHERE buzzyuser_onlinestatus=1";
 $count_allimages_query = "SELECT COUNT(*) as count_allimages FROM  buzzyuserimages";
 $count_allmails_query = "SELECT COUNT(*) as count_allmails FROM  buzzymailing_list";
 $website_chat_query = "SELECT * FROM chat_options WHERE chat_option_id=1";
foreach ($connread->query($website_chat_query) as $row) {
$chat_option_coloone=$row['chat_option_coloone'];
$chat_option_colotwo=$row['chat_option_colotwo'];
$chat_option_colothree=$row['chat_option_colothree'];
$chat_option_refresh=$row['chat_option_refresh'];
$chat_option_radius=$row['chat_option_radius'];
$chat_option_limit=$row['chat_option_limit'];
}	
 $count_today_users_query = "SELECT COUNT(*) as count_today_users FROM  buzzyusers WHERE buzzyuser_registration_timestamp>$yesterday"; 
 $all_categories_query = "SELECT buzzynewscategory_id,buzzynewscategory,buzzynewscategory_url,buzzynewscategory_metatag,
 DATE_FORMAT(buzzynewscategory_datecreated,'%d. %m. %Y') as buzzynewscategory_datecreated FROM  buzzynewscategories ORDER by buzzynewscategory ASC";
 $all_news_query = "SELECT buzzynews_id,buzzynews_title,buzzynews_image,buzzynews_timage,buzzynews_text,
 DATE_FORMAT(buzzynews_datetime,'%d. %m. %Y') as buzzynews_datetime,buzzynewscategory_id,buzzynews_likes,buzzynews_unlikes,buzzynews_views,buzzynews_comments,buzzynews_visitors,
 buzzynews_source_name,buzzynews_source_url,buzzynews_approval_status,buzzynews_feature_status FROM  buzzynews WHERE buzzynews_gstatus=0";
 
  $all_products_query = "SELECT buzzynews_id,buzzynews_title,buzzynews_image,buzzynews_timage,buzzynews_text,
 DATE_FORMAT(buzzynews_datetime,'%d. %m. %Y') as buzzynews_datetime,buzzynewscategory_id,buzzynews_likes,buzzynews_unlikes,buzzynews_views,buzzynews_comments,buzzynews_visitors,
 buzzynews_source_name,buzzynews_source_url,buzzynews_approval_status,buzzynews_feature_status FROM  buzzynews WHERE buzzynews_gstatus=200";
 
   $all_fb_query = "SELECT buzzynews_id,buzzynews_title,buzzynews_image,buzzynews_timage,buzzynews_text,
 DATE_FORMAT(buzzynews_datetime,'%d. %m. %Y') as buzzynews_datetime,buzzynewscategory_id,buzzynews_likes,buzzynews_unlikes,buzzynews_views,buzzynews_comments,buzzynews_visitors,
 buzzynews_source_name,buzzynews_source_url,buzzynews_approval_status,buzzynews_feature_status FROM  buzzynews WHERE buzzynews_gstatus=50";
 
 
    $all_dribbble_query = "SELECT buzzynews_id,buzzynews_title,buzzynews_image,buzzynews_timage,buzzynews_text,
 DATE_FORMAT(buzzynews_datetime,'%d. %m. %Y') as buzzynews_datetime,buzzynewscategory_id,buzzynews_likes,buzzynews_unlikes,buzzynews_views,buzzynews_comments,buzzynews_visitors,
 buzzynews_source_name,buzzynews_source_url,buzzynews_approval_status,buzzynews_feature_status FROM  buzzynews WHERE buzzynews_gstatus=51";
 
 $all_links_query = "SELECT buzzynews_id,buzzynews_title,buzzynews_image,buzzynews_text,
 DATE_FORMAT(buzzynews_datetime,'%d. %m. %Y') as buzzynews_datetime,buzzynewscategory_id,buzzynews_likes,buzzynews_unlikes,buzzynews_views,buzzynews_comments,buzzynews_visitors,
 buzzynews_source_name,buzzynews_source_url,buzzynews_approval_status,buzzynews_feature_status FROM  buzzynews WHERE buzzynews_gstatus=3";
 
 
 $all_videos_query = "SELECT buzzynews_id,buzzynews_title,buzzynews_image,buzzynews_text,
 DATE_FORMAT(buzzynews_datetime,'%d. %m. %Y') as buzzynews_datetime,buzzynewscategory_id,buzzynews_likes,buzzynews_unlikes,buzzynews_views,buzzynews_comments,buzzynews_visitors,
 buzzynews_source_name,buzzynews_source_url,buzzynews_approval_status,buzzynews_feature_status FROM  buzzynews WHERE buzzynews_gstatus=1";


 $all_quiz_query = "SELECT  * FROM  buzzyquiz  WHERE buzzyquiz_id=1"; 
 $recently_news_query = "SELECT  * FROM  buzzynews  ORDER by buzzynews_id DESC LIMIT 5";
 $commented_news_query = "SELECT  * FROM  buzzynews  ORDER by buzzynews_comments DESC LIMIT 5";
 $top_news_query = "SELECT  * FROM  buzzynews  ORDER by buzzynews_likes DESC LIMIT 5";
 $all_bgs_query = "SELECT  * FROM  buzzybgs";
 $all_users_query = 'SELECT buzzyuser_id,buzzyuser_first_name,buzzyuser_last_name,buzzyuser_username,buzzyuser_image,buzzyuser_location,
  buzzyuser_cover,buzzyuser_email,DATE_FORMAT(buzzyuser_birthdate, "%d/%m/%Y") as formated_buzzyuser_birthdate,buzzyuser_password,DATE_FORMAT(buzzyuser_registration_date, "%d/%m/%Y, %H:%i")as formated_registration_date,
 buzzyuser_aboutme,buzzyuser_moderator FROM buzzyusers';
$recently_users_query = 'SELECT * FROM buzzyusers ORDER by buzzyuser_registration_timestamp DESC LIMIT 5';
$recently_login_users_query = 'SELECT * FROM buzzyusers ORDER by buzzyuser_last_login DESC LIMIT 5';
$website_options_query = 'SELECT * FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1';
$google_analytics_query = 'SELECT * FROM  buzzybuzzga WHERE buzzybuzzga_id=1';
$website_css_options_query = "SELECT * FROM  buzzycss WHERE buzzycss_id=1";
foreach ($connread->query($website_css_options_query) as $row) {
$buzzycss_color_css=$row['buzzycss_color_css'];
$buzzycss_color_css1=$row['buzzycss_color_css1'];
$buzzycss_color_css2=$row['buzzycss_color_css2'];
$buzzycss_color_css3=$row['buzzycss_color_css3'];
$buzzycss_color_css4=$row['buzzycss_color_css4'];
$buzzycss_color_css5=$row['buzzycss_color_css5'];
$buzzycss_bg=$row['buzzycss_bg'];
$buzzycss_style=$row['buzzycss_style'];
$buzzycss_headings_font_family=$row['buzzycss_headings_font_family'];
$buzzycss_headings_font_family_link=preg_replace("/ /","+",$buzzycss_headings_font_family);
$buzzycss_headings_font_family=$row['buzzycss_headings_font_family'];
$buzzycss_body_font_family=$row['buzzycss_body_font_family'];
$buzzycss_body_font_family_link=preg_replace("/ /","+",$buzzycss_body_font_family);
}
if (isset($_POST['update_version'])) {
$update_website_doptions_query = "UPDATE buzzysiteoptions SET  buzzyupdatestatus=1 WHERE buzzysiteoptions_id=1";
$stmt = $connwrite->prepare($update_website_doptions_query);
// bind the parameters and execute the statement			
// execute and get number of affected rows
$stmt->execute();
$OK = $stmt->rowCount();  
header('Location:updateversion.php');		
}