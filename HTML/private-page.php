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
</style>
<?php
if (!isset($_SESSION["buzzyuser_id"])) {
header('Location: '.$link_prefix.'index.php');	   
}	   
 if($session_buzzyuser_status==0){
			$user_status_class='regular-user';
			$user_status=$regular;
			$status_badge='https://cdn2.iconfinder.com/data/icons/pictograms-vol-1/400/human-24.png';
			}	
            else if($session_buzzyuser_status==1){
			$user_status_class='premium-user';
			$user_status=$premium;
			$status_badge='https://cdn2.iconfinder.com/data/icons/pictograms-vol-1/400/star-24.png';			
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
           $visibility_image='https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/eye-24.png';
		   $vis_text=$you_are_visible;
           }
	       else if($session_buzzyuser_visibility==1){
           $visibility_image='https://cdn2.iconfinder.com/data/icons/free-color-halloween-icons/24/Ghost-24.png';
		   $vis_text=$you_are_unvisible;		   
           }		   
?>
<div id="wrapper">
    <div class="full-column">
        <div class="news-wrapper">
	    TEST
        </div>	
		</div>
		</div>