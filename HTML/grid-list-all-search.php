		<?php
          foreach ($connread->query($website_options_query) as $row) {
		     $useragent=$_SERVER['HTTP_USER_AGENT'];
       if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
        $buzzygrideffect='0';
		else{
		  $buzzygrideffect=$row['buzzygrideffect'];
		   }
		?>
        <ul class="grid effect-<?php echo $buzzygrideffect; ?>" id="grid">		
		<?php } ?>

  <?php

$basic_count_users_query = "SELECT COUNT(*) FROM buzzyusers";
foreach ($connread->query($basic_count_users_query) as $row) {
$get_total_rows=$row['COUNT(*)'];
$item_per_page=$buzzynewslimit;
}
$unformated_total_pages = ceil($get_total_rows/$item_per_page); 

if ($unformated_total_pages<$buzzymax_pages){
$total_pages=$unformated_total_pages;
}
else if($unformated_total_pages>=$buzzymax_pages){
$total_pages=$buzzymax_pages;	
}

if (isset ($_GET['page'])){
$page=$_GET['page'];
}
else {
$page=1;	
}
	if($page==$total_pages){
    $next_page_enbl='disabled';
	$page_stat_next='#';
    $next_page='';	
	$final_quest=$quest;
	$final_basic_quest=$basicquest;
    }
	else if($page!=$total_pages){
    $next_page_enbl='';
    $next_page=$page+1;
	$page_stat_next='page=';
	$final_quest=$quest;
	$final_basic_quest=$basicquest;
    }
	if($page==1){
    $prev_page_enbl='disabled';
	$page_stat_prev='#';
    $prev_page='';	
	$final_quest=$quest;
	$final_basic_quest=$basicquest;
    }
	else if($page!=1){
    $prev_page_enbl='';
	$page_stat_prev='page=';
    $prev_page=$page-1;
	$final_quest=$quest;
	$final_basic_quest=$basicquest;	
    }
	
$format_page=$page-1;

$page_start=0+$item_per_page*$format_page;
$unformated_page_end=$item_per_page+$item_per_page*$format_page;

if($unformated_page_end<12){
$page_end=$unformated_page_end;
}
else if($unformated_page_end>=12){
$page_end=12;	
}  
   $all_users_query = "SELECT buzzyuser_id,buzzyuser_first_name,buzzyuser_last_name,buzzyuser_status,buzzyuser_username,buzzyuser_image,buzzyuser_location,
   buzzyuser_cover,buzzyuser_email,buzzyuser_birthdate,buzzyuser_password,DATE_FORMAT(buzzyuser_registration_date, '%d/%m/%Y, %H:%i')as formated_registration_date,
   buzzyuser_aboutme,buzzyuser_onlinestatus,buzzyuser_last_login FROM buzzyusers WHERE buzzyuser_first_name LIKE '%$search_term%' OR buzzyuser_last_name LIKE '%$search_term%'
   OR buzzyuser_username LIKE '%$search_term%' OR buzzyuser_email LIKE '%$search_term%'  ORDER by buzzyuser_id DESC LIMIT $page_start,$item_per_page"; 

  foreach ($connread->query($all_users_query ) as $row) {
		if ($row['buzzyuser_cover']==''){
			$buzzyuser_cover='profilebg.jpg';
			}
			else if ($row['buzzyuser_cover']!=''){
			$buzzyuser_cover=$row['buzzyuser_cover'];
			}
			if ($row['buzzyuser_image']==''){
			$buzzyuser_image='profile-icon1.jpg';
			}
			else if ($row['buzzyuser_image']!=''){
			$buzzyuser_image=$row['buzzyuser_image'];
			}
			if ($row['buzzyuser_birthdate']=='00/00/0000'){
			$buzzyuser_birthdate='';
			}
			else if ($row['buzzyuser_birthdate']!='0000-00-00'){
			$buzzyuser_birthdate=$row['buzzyuser_birthdate'];
			}
			
if($page==$total_pages){
    $next_page_enbl='disabled';
	$next_page=$total_pages;
	$next_page_suffix='#';
	$next_link_class="pointer-events:none";	
    }
	else if($page!=$total_pages){
    $next_page_enbl='#';
	$next_page=$page+1;
	$next_link_class="";		
	$next_page_suffix='';
    }
	if($page==1){
    $prev_page_enbl='disabled';
	$prev_link_class="pointer-events:none";
	$prev_page=1;
	$prev_page_suffix='#';
    }
	else if($page!=1){
    $prev_page_enbl='#';
	$prev_page=$page-1;
	$next_link_class="";	
	$prev_page_suffix='';	
    }			
			
  //get age from date or birthdate
$from = new DateTime($buzzyuser_birthdate);
$to   = new DateTime('today');
$age =  $from->diff($to)->y;

			if (strpos($buzzyuser_image,'http') !== false) {
			$final_image_prefix='';		  
		    }
			else{
			$final_image_prefix=$link_prefix.'img/';					
			}
			$final_buzzyuser_image=$final_image_prefix . $buzzyuser_image;

			if ($row['buzzyuser_aboutme']==''){
			$buzzyuser_aboutme='';
			}
			else if ($row['buzzyuser_aboutme']!=''){
			$buzzyuser_aboutme=$row['buzzyuser_aboutme'];
			}
			$buzzyuser_id=$row['buzzyuser_id'];			
            $buzzyuser_first_name=$row['buzzyuser_first_name'];	
            $buzzyuser_last_name=$row['buzzyuser_last_name'];				
			$buzzyuser_username=$row['buzzyuser_username'];
			$buzzyuser_email=$row['buzzyuser_email'];
			$buzzyuser_password=$row['buzzyuser_password'];			
			$buzzyuser_location=$row['buzzyuser_location'];	
            $buzzyuser_status=$row['buzzyuser_status'];
			$buzzyuser_onlinestatus=$row['buzzyuser_onlinestatus'];
            $buzzyuser_last_login=$row['buzzyuser_last_login'];

			
$buzzyuserlast_login_difference=$now-$buzzyuser_last_login;
if($buzzyuserlast_login_difference>300){
if($buzzyuser_onlinestatus==1){
        $update_userlogin_query = "UPDATE buzzyusers SET buzzyuser_last_login=:buzzyuser_last_login,buzzyuser_onlinestatus=0 WHERE buzzyuser_id=$buzzyuser_id";
        $stmt = $connwrite->prepare($update_userlogin_query);
        // bind the parameters and execute the statement
	    $stmt->bindParam(':buzzyuser_last_login', $now, PDO::PARAM_STR);	
        // execute and get number of affected rows
        $stmt->execute();		
        $OK = $stmt->rowCount();		   
}
}
			
			if($buzzyuser_onlinestatus==0){
			$onofline_img='offline.png';
			}
			else if ($buzzyuser_onlinestatus==1){
			$onofline_img='online.png';			
			}
			
			$glink=$link_prefix.$user_id_url.$buzzyuser_id;
            if($buzzyuser_status==0){
			$user_status_class='regular-user';
			$user_status=$regular;
			}	
            else if($buzzyuser_status==1){
			$user_status_class='premium-user';
			$user_status=$premium;
			}	
            else if($buzzyuser_status==2){
			$user_status_class='gold-user';
			$user_status=$gold;
			}		
            else if($buzzyuser_status==3){
			$user_status_class='vip-user';
			$user_status=$vip;
			}

	if (isset ($_SESSION['buzzyuser_id'])) {
				$user_liked_query = "SELECT COUNT(*) FROM  buzzyuserliked WHERE buzzyliked_id=$buzzyuser_id AND buzzyuser_id=$session_user_id";
				}
				else {
				$user_liked_query = "SELECT COUNT(*) FROM  buzzyuserliked WHERE buzzyliked_id=$buzzyuser_id";
				}
				foreach ($connread->query($user_liked_query) as $row) {
				    $count=$row['COUNT(*)'];			
	                 if ($count!=0){
	                 $btnclass='btn btn-loved btn-pin';
					 $btnvalue='<i class="fa fa-heart" aria-hidden="true"></i> ' . $loved;
					 $btnname='';
	                 }
	                 else {
	                 $btnclass='btn btn-love btn-pin';
					 $btnvalue='<i class="fa fa-heart-o" aria-hidden="true"></i> ' . $send_love;
					 $btnname='love-button';
	                  }			
  ?>

                    <li class="thumbnail news-box">
                         <a href="<?php echo $glink;?>" title=""><img src="<?php echo $final_buzzyuser_image; ?>" style="width:100%;" alt="" class="bicubic nearest" /></a>				    
                       <br/>   
					   <h4 style="float:left!important; font-size:16px!important; margin-bottom:2px!important;"><?php echo  $buzzyuser_first_name; ?>, <?php echo $age;?> <span style="float:right!important; margin-left:5px!important;"><img alt="" style="width:16px!important; height:16px!important;" src="<?php echo $link_prefix;?>img/<?php echo $onofline_img;?>" /></span> </h4>
					   <div class="clearfix"></div>
                       <span style="font-size:13px!important;  color:#acacac!important;"><?php echo _($buzzyuser_location);?></span>
					   <div class="clearfix"></div>						   
					   <!-- Button trigger modal -->
					   	<div style="margin-top:10px!important;"> 
                        <span style="font-size:13px!important;" class="<?php echo $user_status_class;?>"><?php echo _($user_status);?></span> 
                        </div>						
					   <div class="clearfix"></div>								
					    <div style="margin-top:10px!important;"> 
                        <form style="float:left; margin-top:0px!important;"  action="<?php echo $glink;?>" method="POST">
                        <button type="submit"  class="btn btn-primary view buttontr">
                         <i class="fa fa-eye" aria-hidden="true"></i> <?php echo _($view); ?>
                        </button>
						</form>
						<?php 
						if (isset ($_SESSION['buzzyuser_id'])){
						include 'HTML/pinbtn-with-session.html';
						}
						else if (!isset ($_SESSION['buzzyuser_id'])){
						include 'HTML/pinbtn-without-session.html';
						}
						?> 				
                       </div>						
					</li>
					 <?php } ?>
					 <?php } ?>
        </ul>
	
<?php
include 'HTML/pagination.html';
?>
