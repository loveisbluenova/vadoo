<style>
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
#mapcont{
        border-radius:3px 3px 3px 3px;
        -moz-border-radius:3px 3px 3px 3px;
        -webkit-border-radius:3px 3px 3px 3px;		
		border:1px solid #ccc;
}
      #map {
        height: 160px!important;

      }

	  a {
    text-decoration: none !important;
      }

</style>
<?php
if (!isset($_SESSION["buzzyuser_id"])) {
header('Location: '.$link_prefix.'index.php');	   
}	   
 if($session_buzzyuser_status==0){
			$user_status_class='regular-user';
			$user_status=$regular;
			$status_badge='https://cdn2.iconfinder.com/data/icons/pictograms-vol-1/400/human-32.png';
			}	
            else if($session_buzzyuser_status==1){
			$user_status_class='premium-user';
			$user_status=$premium;
			$status_badge='https://cdn2.iconfinder.com/data/icons/pictograms-vol-1/400/star-32.png';			
			}	
            else if($session_buzzyuser_status==2){
			$user_status_class='gold-user';
			$user_status=$gold;
			$status_badge='https://cdn0.iconfinder.com/data/icons/customicondesign-office7-shadow-png/32/Metal-gold-blue.png';				
			}		
            else if($session_buzzyuser_status==3){
			$user_status_class='vip-user';
			$user_status=$vip;
			$status_badge='https://t3.rbxcdn.com/44c11236a40914ead32a5ea71f06ec08';						
			}			
	       if($session_buzzyuser_visibility==0){
           $visibility_image='https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/eye-32.png';
		   $vis_text=$you_are_visible;
           }
	       else if($session_buzzyuser_visibility==1){
           $visibility_image='https://cdn2.iconfinder.com/data/icons/free-color-halloween-icons/32/Ghost-32.png';
		   $vis_text=$you_are_unvisible;		   
           }		   
?>
<div id="wrapper">
    <div class="full-column">
        <div class="news-wrapper">
		<div style="margin-left:15px;margin-right:15px;">
		<div class="two-third-column">
		<h3><?php echo $session_buzzyuser_first_name;?>, <?php echo $session_age;?> <a href="#"  data-toggle="modal" data-target="#userinfo"><span style="margin-left:20px!important; font-size:24px!important;font-weight:bold;"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a></h3>
		<?php
        include 'HTML/userinfo-modal.html'; 
         ?>
		</div>
		<div class="one-third-column">
		<p style="margin-top:10px!important; ">
		
	    <span style="font-size:14px!important; margin-right:20px!important; font-weight:bold;"> 
		<a href="#"  title="<?php echo $session_buzzyuser_credits;?> <?php echo _($credits);?>" data-toggle="tooltip" data-placement="bottom">		
		<img src="https://cdn2.iconfinder.com/data/icons/flat-icons-19/128/Coin.png" style="width:32px; height:32px;" />
		</a>
		</span> 
	    
		<span style="font-size:14px!important; margin-right:20px!important; font-weight:bold;">
		<a href="#"  title="<?php echo $count_usliked;?> <?php echo _($loves);?>" data-toggle="tooltip" data-placement="bottom">
		<img src="https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/heart-32.png"  style="width:32px; height:32px;" />
		</a>
		</span> 	
				

		<span style="font-size:14px!important; margin-right:20px!important; font-weight:bold;"> 
		<a href="#"  title="<?php echo _($user_status);?>" data-toggle="tooltip" data-placement="bottom">
		<img src="<?php echo $status_badge;?>" style="width:32px; height:32px;" />
		</a>
		</span> 

		<span style="font-size:14px!important; margin-right:20px!important; font-weight:bold;"> 
		<a href="#"  title="<?php echo _($vis_text);?>" data-toggle="tooltip" data-placement="bottom">
		<img src="<?php echo $visibility_image;?>" style="width:32px; height:32px;" />
		</a>
		</span>	
		
		</p>
		</div>		
		</div>
		<div class="clearfix"></div>
  <div class="item">  
  <div style="position:relative;">  
  <img style="height:156px!important;" src="<?php echo $final_image_prefix;?><?php echo $session_buzzyuser_image;?>" alt="">
  <a href="<?php echo $link_prefix;?><?php echo $profileimg_id_url;?><?php echo $session_user_id;?>" title="<?php echo _($add_profile_image);?>"  data-toggle="tooltip" data-placement="bottom">
  <div class="imghoverblack" style="">
   <h3 style="margin-top:66.5px; margin-bottom:0px!important; padding-bottom:-10px!important;"><i class="fa fa-camera" aria-hidden="true"></i><h3>
  </div>
  </a>
  </div>
  </div>
  
<?php
  $session_images_query="SELECT * FROM buzzyuserimages WHERE buzzyuser_id=$session_user_id";
  foreach ($connread->query($session_images_query) as $row) { 
  $buzzyuserimage=$row['buzzyuserimage'];
?>  
  <div class="item"> 
  <div style="position:relative;">  
  <img style="height:156px!important;" src="<?php echo $link_prefix;?>img/<?php echo $buzzyuserimage;?>" alt="">
   <a href="<?php echo $link_prefix;?><?php echo $galleryimg_id_url;?><?php echo $session_user_id;?>" title="<?php echo _($add_gallery_image);?>">
  <div class="imghoverblack" style="background:#0754ad!important;">
   <h3 style="margin-top:66.5px; margin-bottom:0px!important; padding-bottom:-10px!important;"><i class="fa fa-picture-o" aria-hidden="true"></i><h3>
  </div>
  </a>
  </div>
  </div>
  <?php } ?>
  
  


<div class="clearfix"></div>
<div style="margin-left:15px;margin-right:15px;">
<div class="two-third-column">
<?php
if ($fortumo_status!=2){
?>	
	<h4 style="margin-bottom:20px!important;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
    <?php echo _($buy_credits);?></h4>
	
	<a id="fmp-button" style="background:#e53f2f!important; margin-right:20px!important; margin-bottom:20px!important; float:left!important;" class="buttontr btn btn-primary btn-sm"  href="#" rel="<?php echo $buzzyfortumoid;?>/<?php echo $session_buzzyuser_fortumo_tnx;?><?php echo $fok;?>">
	<i class="fa fa-mobile" style="font-size:20px!important;" aria-hidden="true"></i> <?php echo  $buy_100_credits;?></a>
	
<?php } ?>
<?php
foreach ($connread->query($website_userglobals_query) as $row) {
$buzzyuserglobal_credits=$row['buzzyuserglobal_credits'];
$buzzyuserglobal_creditprice=$row['buzzyuserglobal_creditprice'];
$buzzyuserpaypal_currency=$row['buzzyuserpaypal_currency'];
$buzzypaypal_email=$row['buzzypaypal_email'];
$buzzyuserskrill_currency=$row['buzzyuserskrill_currency'];
$buzzyskrill_email=$row['buzzyskrill_email'];
$paypal_url=$row['paypal_url'];
}
?>
  <form action="<?php echo $paypal_url; ?>" style="float:left!important;"  method="post" name="frmPayPal1">
    <input type="hidden" name="business" value="<?php echo $buzzypaypal_email;?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="<?php echo $buy_credits_now;?>">
    <input type="hidden" name="item_number" value="<?php echo $buzzyuserglobal_credits;?>">
    <input type="hidden" name="amount" value="<?php echo $buzzyuserglobal_creditprice;?>">
    <input type="hidden" name="currency_code" value="<?php echo $buzzyuserpaypal_currency;?>">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="<?php echo $link_prefix;?>payment_with_paypal/cancel.php">
    <input type="hidden" name="return" value="<?php echo $link_prefix;?>payment_with_paypal/success.php">
    <a href="javascript:void(0)" name="submitpp" style="margin-bottom:20px!important;" class="paypall-button buttontr btn btn-primary btn-sm"><i style="font-size:20px!important;" class="fa fa-paypal" aria-hidden="true"></i> <?php echo $buy_with_paypal;?></a>
    </form>
	<script>
	$(document).ready(function(){
   $(document).on("click",".paypall-button",function(){
     var form = $(this).closest("form");
     //console.log(form);
     form.submit();
   });
});
	</script>
  <div class="clearfix"></div>
<h4 style="margin-bottom:0px!important;"><i class="fa fa-map-marker" aria-hidden="true"></i> 
<?php echo _($location);?></h4>
<span style="color:#b2b2b2!important; font-size:13px!important;"><?php echo $session_buzzyuser_location;?></span>
<div class=""></div>
<br>
<div id="mapcont">
 <div id="map"></div>
</div>    
	<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo $session_buzzyuser_lat;?>, lng: <?php echo $session_buzzyuser_long;?>},
          zoom: 14
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $buzzyyoutubeapi;?>&callback=initMap"
    async defer></script>
	
	<div class="clearfix"></div>
    <hr>
<h4 style="margin-bottom:0px!important;"><i class="fa fa-user" aria-hidden="true"></i>
<?php echo _($personal_data);?> <a href="#" id="toogleint"><span style="margin-left:20px!important; font-size:24px!important;font-weight:bold;"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a></h4>	
<br/>
<?php
  $session_countdata_query="SELECT COUNT(*) FROM buzzyuser_data WHERE buzzyuser_id=$session_user_id";
  foreach ($connread->query($session_countdata_query) as $row) { 
  $buzzyusercountdata=$row['COUNT(*)'];
  if($buzzyusercountdata==0){
?>
<script>
$("#toogleint").click(function() { 
    // assumes element with id='button'
    $("#data").toggle();	
    $("#datainput").toggle();
});
</script>
<div id="data">
<p><span><?php echo _($no_data);?></span></p>
</div>
<div id="datainput" style="display:none;">
<?php
 include 'HTML/add-data.html'; 
 ?>	
</div>
<?php } ?>	

<?php
  $session_countdata_query="SELECT COUNT(*) FROM buzzyuser_data WHERE buzzyuser_id=$session_user_id";
  foreach ($connread->query($session_countdata_query) as $row) { 
  $buzzyusercountdata=$row['COUNT(*)'];
  if($buzzyusercountdata!=0){
?>
<script>
$("#toogleint").click(function() { 
    // assumes element with id='button'
    $("#data").toggle();	
    $("#datainput").toggle();
});
</script>

<?php
  $session_data_query="SELECT * FROM buzzyuser_data WHERE buzzyuser_id=$session_user_id";
  foreach ($connread->query($session_data_query) as $row) { 
  $session_buzzyuser_aboutme=$row['buzzyuser_aboutme'];
  $session_buzzyuser_data_height=$row['buzzyuser_data_height'];
  $session_buzzyuser_data_weight=$row['buzzyuser_data_weight']; 
 
  $session_buzzyuser_data_sexual_orientation=$row['buzzyuser_data_sexual_orientation'];   
  if($session_buzzyuser_data_sexual_orientation==0){
  $sexual_text=$heterosexual;
  $selected_sex1='selected';
  $selected_sex2=''; 
  $selected_sex3='';
  }
  else if($session_buzzyuser_data_sexual_orientation==1){
  $sexual_text=$homosexual;
  $selected_sex1='';
  $selected_sex2='selected'; 
  $selected_sex3='';  
  }
  else if($session_buzzyuser_data_sexual_orientation==2){
  $sexual_text=$bisexual;
  $selected_sex1='';
  $selected_sex2=''; 
  $selected_sex3='selected';   
  }
  
  $session_buzzyuser_data_rel_status=$row['buzzyuser_data_rel_status']; 
  if($session_buzzyuser_data_rel_status==0){
  $rel_text=$single;
  $selected_rel1='selected';
  $selected_rel2=''; 
  $selected_rel3='';
  }
  else if($session_buzzyuser_data_rel_status==1){
  $rel_text=$in_a_relationship;
  $selected_rel1='';
  $selected_rel2='selected'; 
  $selected_rel3='';  
  }
  else if($session_buzzyuser_data_rel_status==2){
  $rel_text=$in_a_open_relationship;
  $selected_rel1='';
  $selected_rel2=''; 
  $selected_rel3='selected';   
  }
   
  
  
  $session_buzzyuser_data_body=$row['buzzyuser_data_body']; 
  if($session_buzzyuser_data_body==0){
  $bod_text=$average;
  $selected_bod1='selected';
  $selected_bod2=''; 
  $selected_bod3='';
  $selected_bod4='';   
  $selected_bod5='';   
  }
  else if($session_buzzyuser_data_body==1){
  $bod_text=$athletic;
  $selected_bod1='';
  $selected_bod2='selected'; 
  $selected_bod3='';
  $selected_bod4='';   
  $selected_bod5='';  
  }
  else if($session_buzzyuser_data_body==2){
  $bod_text=$muscle;
  $selected_bod1='';
  $selected_bod2=''; 
  $selected_bod3='selected';
  $selected_bod4='';   
  $selected_bod5='';   
  }  
  else if($session_buzzyuser_data_body==3){
  $bod_text=$thick;
  $selected_bod1='';
  $selected_bod2=''; 
  $selected_bod3='';
  $selected_bod4='selected';   
  $selected_bod5='';    
  }  
  else if($session_buzzyuser_data_body==4){
  $bod_text=$thin;
  $selected_bod1='';
  $selected_bod2=''; 
  $selected_bod3='';
  $selected_bod4='';   
  $selected_bod5='selected';   
  }    
  
  $session_buzzyuser_hair_color=$row['buzzyuser_hair_color']; 
  if($session_buzzyuser_hair_color==0){
  $hair_text=$black;
  $selected_hair1='selected';
  $selected_hair2=''; 
  $selected_hair3='';
  $selected_hair4='';   
  $selected_hair5='';   
  $selected_hair6='';  
 }
  else if($session_buzzyuser_hair_color==1){
  $hair_text=$brown;
  $selected_hair1='';
  $selected_hair2='selected'; 
  $selected_hair3='';
  $selected_hair4='';   
  $selected_hair5='';     
  $selected_hair6='';  
  }
  else if($session_buzzyuser_hair_color==2){
  $hair_text=$red;
  $selected_hair1='';
  $selected_hair2=''; 
  $selected_hair3='selected';
  $selected_hair4='';   
  $selected_hair5=''; 
  $selected_hair6='';   
  }  
  else if($session_buzzyuser_hair_color==3){
  $hair_text=$blue;
  $selected_hair1='';
  $selected_hair2=''; 
  $selected_hair3='';
  $selected_hair4='selected';   
  $selected_hair5='';  
  $selected_hair6='';  
  }  
  else if($session_buzzyuser_hair_color==4){
  $hair_text=$grey;
  $selected_hair1='';
  $selected_hair2=''; 
  $selected_hair3='';
  $selected_hair4='';   
  $selected_hair5='selected';
  $selected_hair6='';   
  }  
  else if($session_buzzyuser_hair_color==5){
  $hair_text=$bold;
  $selected_hair1='';
  $selected_hair2=''; 
  $selected_hair3='';
  $selected_hair4='';   
  $selected_hair5=''; 
  $selected_hair6='selected'; 
  }  
 
  $session_buzzyuser_eye_color=$row['buzzyuser_eye_color']; 
  if($session_buzzyuser_eye_color==0){
  $eye_text=$brown;
  $selected_eye1='selected';
  $selected_eye2=''; 
  $selected_eye3='';
  $selected_eye4='';   
  }
  else if($session_buzzyuser_eye_color==1){
  $eye_text=$green;
  $selected_eye1='';
  $selected_eye2='selected'; 
  $selected_eye3='';
  $selected_eye4='';    
  }
  else if($session_buzzyuser_eye_color==2){
  $eye_text=$blue;
  $selected_eye1='';
  $selected_eye2=''; 
  $selected_eye3='selected';
  $selected_eye4='';  
  }  
  else if($session_buzzyuser_eye_color==3){
  $eye_text=$other;
  $selected_eye1='';
  $selected_eye2=''; 
  $selected_eye3='';
  $selected_eye4='selected';    
  }    
  
  $session_buzzyuser_no_kids=$row['buzzyuser_no_kids']; 
  
  $session_buzzyuser_smoker=$row['buzzyuser_smoker'];
  if($session_buzzyuser_smoker==0){
  $smok_text=$yes;
  $selected_smok1='selected';
  $selected_smok2='';   
  }
  else if($session_buzzyuser_smoker==1){
  $smok_text=$no;
  $selected_smok1='';
  $selected_smok2='selected';   
  } 
    
  $session_buzzyuser_drinker=$row['buzzyuser_drinker']; 
  if($session_buzzyuser_drinker==0){
  $drink_text=$yes;
  $selected_drink1='selected';
  $selected_drink2='';   
  }
  else if($session_buzzyuser_drinker==1){
  $drink_text=$no;
  $selected_drink1='';
  $selected_drink2='selected';   
  } 
?>
<div id="data">
<?php
 include 'HTML/added-data.html'; 
 ?>	
</div>
<?php } ?>

<div id="datainput" style="display:none;">
<?php
 include 'HTML/update-data.html'; 
 ?>	
</div>
<?php } ?>	
<?php } ?>	
<div class="clearfix"></div>
<hr>
<h4 style="margin-bottom:0px!important;"><i class="fa fa-link" aria-hidden="true"></i>
<?php echo _($interests);?> <a href="#"  data-toggle="modal" data-target="#userinterests"><span style="margin-left:20px!important; font-size:24px!important;font-weight:bold;"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a></h4>
<?php
 include 'HTML/interest-modal.html'; 
 ?>	
<br/>
<?php
  $session_countint_query="SELECT COUNT(*) FROM buzzyuser_interests WHERE buzzyuser_id=$session_user_id";
  foreach ($connread->query($session_countint_query) as $row) { 
  $buzzyusercountint=$row['COUNT(*)'];
  if($buzzyusercountint==0){
?>
<p><span><?php echo _($no_data);?></span></p>
<?php } ?>	
<ul style="list-style-type:none!important;">
<?php
  if($buzzyusercountint!=0){
  $session_int_query="SELECT * FROM buzzyuser_interests WHERE buzzyuser_id=$session_user_id";
  foreach ($connread->query($session_int_query) as $row) { 
  $buzzyuser_interest=$row['buzzyuser_interest'];
  $buzzyuser_interest_category_id=$row['buzzyuser_interest_category_id']; 
  $session_catint_query="SELECT * FROM buzzyuser_interest_categories WHERE buzzyuser_interest_category_id=$buzzyuser_interest_category_id"; 
  foreach ($connread->query($session_catint_query) as $row) { 
  $buzzyuser_interest_category_icon=$row['buzzyuser_interest_category_icon']; 
?>
<li style="margin-bottom:30px!important; float:left!important; margin-right:0px!important; margin-left:0px!important;">
<span class="roundaround"><i class="fa <?php echo $buzzyuser_interest_category_icon;?>" aria-hidden="true"></i> <?php echo $buzzyuser_interest;?></span>
</li>
<?php } ?>	
<?php } ?>	
<?php } ?>	
<?php } ?>	
</ul>
<?php } ?>
<div class="clearfix"></div>	
<br>	
</div>
<div class="one-third-column">	
<div class="sidepagega">	
             <h4 style="margin-bottom:0px!important;"><i class="fa fa-star" aria-hidden="true"></i> <?php echo _($ratings);?></h4>
			 <span style="color:#b2b2b2!important; font-size:13px!important;"><?php echo _($you_are_liked)?> <?php echo _($by)?> <?php echo _($count_usliked)?> <?php echo _($of)?>
			  <?php echo _($total_usliked)?> <?php echo _($people)?></span>
			  <div class="clearfix"></div>
			  <br>
             <div style="cursor:pointer!important;" class="c100 p<?php echo round ($session_liked_percentage);?> center">
                    <span><?php echo round ($session_liked_percentage);?>%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
             <hr>
             <h4><i class="fa fa-gift" aria-hidden="true"></i> <?php echo _($gifts);?></h4>	

            <hr>
            <h4><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo _($confirmations);?></h4>
			<img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/facebook_circle_color-32.png" alt=""/> <span style="font-size:13px!important;"><?php echo $fb_con_txt;?></span>			
	</div>			
</div>		
</div>		
</div>	
		</div>
		</div>