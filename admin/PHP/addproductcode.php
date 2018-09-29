<?php
/**
 * PHP CODE FOR CREATE NEWS  ---- START
 */
$now = time();
if ($_SESSION["buzzyadmin_id"]==1){ 
if (isset($_POST['add_product'])) {	
$amazon = new amazon_api;
$public_key='AKIAI3Q5ECPI73JKNLYA';
$private_key = 'o2HJPdzYG1nVSuTZFVcWF8PW9+YD9c8hco3g88r+';
$amazon_id = 'creatta1983-20';
$ext = 'com';
$amazon->setKey($public_key,$private_key ,$amazon_id,$ext);
$asin = $_POST['asin'];
$url = $amazon->url_request($asin);
$content = $amazon->grab_content($url);
if ($content <> 'false')
{
        $detailpage = $amazon->get_detail_page_url($content); // string
        $smallimage = $amazon->get_smallimage($content); // string
        $mediumimage = $amazon->get_mediumimage($content); // string
    $largeimage = $amazon->get_largeimage($content); // string	
    $imagesets_swatch = $amazon->get_imagesets_swatchimage($content); // string with commas delimited
    $imagesets_small = $amazon->get_imagesets_smallimage($content); // string with commas delimited
    $imagesets_thumbnail = $amazon->get_imagesets_thumbnailimage($content); // string with commas delimited
    $imagesets_tiny = $amazon->get_imagesets_tinyimage($content); // string with commas delimited
    $imagesets_medium = $amazon->get_imagesets_mediumimage($content); // string with commas delimited
    $imagesets_large = $amazon->get_imagesets_largeimage($content);   // string with commas delimited
    $binding = $amazon->get_binding($content); // string
    $brand = $amazon->get_brand($content); // string
    $color = $amazon->get_color($content); // string
    $feature = $amazon->get_feature($content); // string
    $label = $amazon->get_label($content); // string
    $listprice = $amazon->get_listprice($content); // string
    $manufacture = $amazon->get_manufacture($content); // string
    $model = $amazon->get_model($content); // string
    $title = $amazon->get_title($content); // string
    $moreoffersurl = $amazon->get_moreoffersurl($content); // string
    $price = $amazon->get_price($content); // string
    $amountsaved = $amazon->get_amountsaved($content); // string
    $percentagesaved = $amazon->get_percentagesaved($content); // string
    $customerreviews = $amazon->get_customerreviews($content); // string , frame url
    $editorialreviews = $amazon->get_editorialreviews($content); // string
    $dimensi = $amazon->get_itemdimentions($content); // string
    $addwishlist = $amazon->get_addwishlist($content); // string
    $technicaldetails = $amazon->get_technicaldetails($content); // string
    $allcustreview = $amazon->get_allcustreview($content); // string
    $alloffer = $amazon->get_alloffer($content); // string
}
else {
	header('Location: greska.php');
}	
	
	
	
        if($_POST['buzzynewscategory_id']==''){
		$buzzynewscategory_id=1;
		}
		else if($_POST['buzzynewscategory_id']!=''){
		$buzzynewscategory_id=$_POST['buzzynewscategory_id'];
		}		
		$buzzynews_title=$title;	
 
    //Convert whitespaces and underscore to dash
        $buzzynews_url =$detailpage;		
        $buzzynews_image =  $largeimage;		
        $buzzynews_timage =  $mediumimage;	
        $buzzynews_text = $feature;
		
						
        $OK = false;
        // create database connection
        // initialize prepared statement
        // create SQL
		$buzzynews_text=$_POST['buzzynews_text'];
        $add_news_query = "INSERT INTO  buzzynews(buzzynews_title,buzzynews_text,buzzynewscategory_id,buzzynews_url,buzzynews_image,buzzynews_timage,buzzynews_title_tag,buzzynews_metatag,buzzynews_source_name,buzzynews_source_url,
		buzzynews_datetime,buzzynews_timestamp,buzzynews_approval_status,buzzynews_gstatus)
		 	  VALUES(:buzzynews_title,:buzzynews_text,:buzzynewscategory_id,:buzzynews_url,:buzzynews_image,:buzzynews_timage,:buzzynews_title_tag,:buzzynews_metatag,:buzzynews_source_name,:buzzynews_source_url,NOW(),:buzzynews_timestamp,1,200)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_news_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzynews_title', $buzzynews_title, PDO::PARAM_STR);
        $stmt->bindParam(':buzzynews_text', $buzzynews_text, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynewscategory_id', $buzzynewscategory_id, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_image', $buzzynews_image, PDO::PARAM_STR);
		$stmt->bindParam(':buzzynews_timage', $buzzynews_timage, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzynews_url', $buzzynews_url, PDO::PARAM_STR);		
		$stmt->bindParam(':buzzynews_timestamp', $now, PDO::PARAM_STR);		
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        if ($OK != 0) {
	    header('Location: amazon-products.php');
        } 
		else if ($OK == 0) {
        header('Location: add-product.php?error=errorupload');
        }
    }
}

if ($_SESSION["buzzyadmin_id"]==2){ 
    if (isset($_POST['add_news'])) {
	    header('Location: products.php?onlydemo=true');
        }
		}

/**
 * PHP CODE FOR CREATE NEWS CATEGORY  ---- END
 */