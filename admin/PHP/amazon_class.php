<?php
/*
 *---------------------------------------------------------------
 * AMAZON API CLASS BY SEEGATESITE.COM
 *---------------------------------------------------------------
 * Author : sigit prasetya nugroho
 * Website : https://seegatesite.com
 *
 */
class amazon_api{
	function setKey($public_key,$private_key,$tag_id,$ext)
	{
		$this->public_key = $public_key;
		$this->private_key = $private_key;
		$this->tag_id = $tag_id;
		$this->ext = $ext;
	}
	function url_request($asin) // pencarian Data
	{ 	
		$params=array(
			'Operation'       =>'ItemLookup'             ,
			'ItemId'      	  =>$asin,
			'AssociateTag'    =>$this->tag_id, 
			'ResponseGroup'   =>'Large'                ,  
		);
		$ext=$this->ext;  
		ksort($params);
		$method = "GET";
		$host = "ecs.amazonaws.".$ext;
		$uri = "/onca/xml";
		$params["Service"] = "AWSECommerceService";
		$params["AWSAccessKeyId"] = $this->public_key;
		$params["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z",time());  
	  	$params["Version"] = "2011-01-08";
	  	ksort($params);
	  	$canonicalized_query = array();
	  	foreach ($params as $param=>$value)
	  	{	
	  		$param = str_replace("%7E", "~", rawurlencode($param));
	  		$value = str_replace("%7E", "~", rawurlencode($value));
	  		$canonicalized_query[] = $param."=".$value;
	  	}
	  	$canonicalized_query = implode("&", $canonicalized_query);
	  	$string_to_sign = $method."\n".$host."\n".$uri."\n".$canonicalized_query;		
	  	$signature = base64_encode(hash_hmac("sha256", $string_to_sign, $this->private_key, True));
	  	$signature = rawurlencode($signature);
	  	$request = "https://".$host.$uri."?".$canonicalized_query."&Signature=".$signature;
	  	return $request;
	}
	function grab_content($url)
	{

		$content =  @file_get_contents($url);
		if($content) 
		{ 
			require_once('simple_html_dom.php');
			$xml = new simple_html_dom();
			$xml->load($content);
			$hasil = @$xml->find('error');
			if (count($hasil)>0)
			{
				$hasil = 'false';
			}else
			{
				$hasil = $content;
			}
		} 
		else 
		{ 
			$hasil ='false'; 
		}
		return $hasil; 
	}
	function get_detail_page_url($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('DetailPageURL',0)->innertext;
		return $hasil;
	}
	function get_addwishlist($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('ItemLinks ItemLink url',3)->innertext;
		return $hasil;
	}
	function get_technicaldetails($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('ItemLinks ItemLink',0)->innertext;
		return $hasil;
	}
	function get_allcustreview($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('ItemLinks ItemLink',5)->innertext;
		return $hasil;
	}
	function get_alloffer($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('ItemLinks ItemLink',6)->innertext;
		return $hasil;
	}	
	function get_smallimage($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('smallimage url',0)->innertext;
		return $hasil;
	}
	function get_mediumimage($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('mediumimage url',0)->innertext;
		return $hasil;
	}
	function get_largeimage($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('imagesets imageset largeimage url',0)->innertext;
		return $hasil;
	}
	function get_imagesets_swatchimage($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('imagesets imageset swatchimage url');
		$image ='';
		for($i=0;$i<count($hasil);$i++)
		{
			$image .=$hasil[$i]->innertext.',';
		}
		return $image;
	}
	function get_imagesets_smallimage($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('imagesets imageset smallimage url');
		$image ='';
		for($i=0;$i<count($hasil);$i++)
		{
			$image .=$hasil[$i]->innertext.',';
		}
		return $image;
	}
	function get_imagesets_thumbnailimage($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('imagesets imageset thumbnailimage url');
		$image ='';
		for($i=0;$i<count($hasil);$i++)
		{
			$image .=$hasil[$i]->innertext.',';
		}
		return $image;
	}
	function get_imagesets_tinyimage($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('imagesets imageset tinyimage url');
		$image ='';
		for($i=0;$i<count($hasil);$i++)
		{
			$image .=$hasil[$i]->innertext.',';
		}
		return $image;
	}
	function get_imagesets_mediumimage($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('imagesets imageset mediumimage url');
		$image ='';
		for($i=0;$i<count($hasil);$i++)
		{
			$image .=$hasil[$i]->innertext.',';
		}
		return $image;
	}
	function get_imagesets_largeimage($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('imagesets imageset largeimage url');
		$image ='';
		for($i=0;$i<count($hasil);$i++)
		{
			$image .=$hasil[$i]->innertext.',';
		}
		return $image;
	}
	function get_binding($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('binding',0)->innertext;
		return $hasil;
	}
	function get_brand($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil = @$xml->find('brand',0)->innertext;
		return $hasil;
	}
	function get_color($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil='';
		$hasil = @$xml->find('color',0)->innertext;
		return $hasil;
	}
	function get_feature($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$feature ='';
		$feature_set = @$xml->find('feature');
		for($i=1;$i<count($feature_set);$i++)
		{
			$feature .=  '<p>- '.$feature_set[$i]->innertext.'</p>';
		}
		return $feature;
	}
	function get_itemdimentions($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$dimensi ='';
		$dimensi_height = @$xml->find('ItemDimensions height',0)->innertext;
		$dimensi_length = @$xml->find('ItemDimensions length',0)->innertext;
		$dimensi_weight = @$xml->find('ItemDimensions weight',0)->innertext;
		$dimensi_width = @$xml->find('ItemDimensions width',0)->innertext;
		if ($dimensi_height == '' )
		{
			$dimensi_height = 0;
		}
		if ($dimensi_length == '' )
		{
			$dimensi_length = 0;
		}
		if ($dimensi_width == '' )
		{
			$dimensi_width = 0;
		}
		if ($dimensi_weight == '' )
		{
			$dimensi_weight = 0;
		}
		$total= $dimensi_weight + $dimensi_height + $dimensi_length + $dimensi_width;
		if ($total > 0)
		{
			$dimensi .= 'Size (LWH) : '.number_format($dimensi_length/100,2).' inches, '.number_format($dimensi_width/100,2).' inches, '.number_format($dimensi_height/100,2).' inches</br>';
			$dimensi .= 'Weight : '.$dimensi_weight.' pounds ';
		}

		return $dimensi;
	}
	function get_label($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil='';
		$hasil = @$xml->find('label',0)->innertext;
		return $hasil;
	}
	function get_listprice($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil='';
		$hasil = @$xml->find('listprice formattedprice',0)->innertext;
		return $hasil;
	}
	function get_manufacture($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil='';
		$hasil = @$xml->find('manufacturer',0)->innertext;
		return $hasil;
	}
	function get_model($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil='';
		$hasil = @$xml->find('model',0)->innertext;
		return $hasil;
	}
	function get_title($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil='';
		$hasil = @$xml->find('title',0)->innertext;
		return $hasil;
	}
	function get_moreoffersurl($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil='';
		$hasil = @$xml->find('offers moreoffersurl',0)->innertext;
		return $hasil;
	}
	function get_price($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil='';
		$hasil = @$xml->find('offers offer price formattedprice',0)->innertext;
		return $hasil;
	}
	function get_amountsaved($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil='';
		$hasil = @$xml->find('offers offer amountsaved formattedprice',0)->innertext;
		return $hasil;
	}
	function get_percentagesaved($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil='';
		$hasil = @$xml->find('offers offer percentagesaved',0)->innertext;
		return $hasil;
	}
	function get_customerreviews($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil='';
		$hasil = @$xml->find('customerreviews iframeurl',0)->innertext;
		return $hasil;
	}
	function get_editorialreviews($content)
	{
		require_once('simple_html_dom.php');
		$xml = new simple_html_dom();
		$xml->load($content);
		$hasil='';
		$hasil = html_entity_decode(@$xml->find('editorialreviews editorialreview content',0)->innertext,ENT_NOQUOTES,"UTF-8");
		return $hasil;
	}

}
?>