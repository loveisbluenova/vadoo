<?php
header("access-control-allow-origin: *");
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$ip = $_SERVER['REMOTE_ADDR'];
include '../security/xss-security.php';
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../PHP/timezone.php';
include '../PHP/basic.php';
include '../PHP/registeruser.php';
include '../PHP/loginuser.php';
if (isset($_GET["user-id"])) {
$user_id=htmlspecialchars($_GET["user-id"], ENT_QUOTES);
include '../PHP/usercode.php';
}
else if (isset($_GET["session-gallery-id"])) {
$session_gallery_id=htmlspecialchars($_GET["session-gallery-id"], ENT_QUOTES);
}
else if (isset($_GET["profile-img-id"])) {
$profile_img_id=htmlspecialchars($_GET["profile-img-id"], ENT_QUOTES);
}
else if (isset($_GET["gallery-img-id"])) {
$gallery_img_id=htmlspecialchars($_GET["gallery-img-id"], ENT_QUOTES);
}
else if (isset($_GET["notifications"])) {
$notification_page=htmlspecialchars($_GET["notifications"], ENT_QUOTES);
}
?>
		<?php
if (!isset($_SESSION["buzzyuser_id"])) {
header('Location: '.$link_prefix.'index.php');	   
}
 $sf = 3.14159 / 180;	   
$random_user_query = "SELECT buzzyuser_id,buzzyuser_first_name,buzzyuser_last_name,buzzyuser_status,buzzyuser_username,buzzyuser_image,buzzyuser_location,buzzyuser_lat,buzzyuser_long,
   buzzyuser_cover,buzzyuser_email,buzzyuser_birthdate,buzzyuser_password,DATE_FORMAT(buzzyuser_registration_date, '%d/%m/%Y, %H:%i')as formated_registration_date,
   buzzyuser_aboutme,buzzyuser_onlinestatus,buzzyuser_last_login FROM buzzyusers WHERE buzzyuser_id!=$session_user_id ORDER BY RAND() LIMIT 1"; 	   
   foreach ($connread->query($random_user_query) as $row) {
   		$randombuzzyuser_id=$row['buzzyuser_id'];
            $buzzyuser_first_name=$row['buzzyuser_first_name'];	
            $buzzyuser_last_name=$row['buzzyuser_last_name'];				
			$buzzyuser_username=$row['buzzyuser_username'];
			$buzzyuser_onlinestatus=$row['buzzyuser_onlinestatus'];
            $buzzyuser_last_login=$row['buzzyuser_last_login'];
		
			if ($row['buzzyuser_image']==''){
			$buzzyuser_image='profile-icon1.jpg';
			}
			else if ($row['buzzyuser_image']!=''){
			$buzzyuser_image=$row['buzzyuser_image'];
			}
			
			if (strpos($buzzyuser_image,'facebook') !== false) {
			$finala_image_prefix='';		  
		    }
			else if (strpos($buzzyuser_image,'facebook') === false) {
			$finala_image_prefix=$link_prefix.'img/';					
			}
  //get age from date or birthdate
$from = new DateTime($buzzyuser_birthdate);
$to   = new DateTime('today');
$age =  $from->diff($to)->y;
		
			if($buzzyuser_onlinestatus==0){
			$onofline_img='offline.png';
			}
			else if ($buzzyuser_onlinestatus==1){
			$onofline_img='online.png';			
			}
   ?>
		<div style="margin-left:15px;margin-right:15px;">
		<br>
		 <span class="spantitle" style=""><img src="<?php echo $link_prefix;?>img/<?php echo $onofline_img;?>"> <?php echo $buzzyuser_first_name;?>, <?php echo $age;?></span>		
		<br><br>
		<div class="half-column">
		
		<?php 
        $count_liked_query="SELECT COUNT(*) FROM buzzyuserliked WHERE buzzyuser_id=$session_user_id AND buzzyliked_id=$randombuzzyuser_id";
        $count_unliked_query="SELECT COUNT(*) FROM buzzyuserunliked WHERE buzzyuser_id=$session_user_id AND buzzyunliked_id=$randombuzzyuser_id";		
        foreach ($connread->query($count_liked_query) as $row) {
        $count_liked=$row['COUNT(*)'];
		}
        foreach ($connread->query($count_unliked_query) as $row) {
        $count_unliked=$row['COUNT(*)'];
		}		
		?>
		<?php
        if($count_liked==0 AND $count_unliked==0){ 		
		?>
		<form action="<?php echo $link_prefix;?>likedunliked.php" method="POST">
		<input type="hidden" name="likedid" value="<?php echo $randombuzzyuser_id;?>" >
		 <button type="submit" name="submit-like" class="btn btn-love buttontr"  autocomplete="off">
        <i class="fa fa-heart-o"  aria-hidden="true"></i>  <?php echo _($love_you);?>
          </button>  	
 		 <button type="submit" name="submit-unlike" class="btn btn-primary buttontr"  autocomplete="off">
       <i class="fa fa-times" aria-hidden="true"></i>  <?php echo _($dont_like_you);?>
        </button>          
        </form>
        <?php } ?>
		
		<?php
        if($count_liked!=0 AND $count_unliked==0){ 		
		?>
		<form action="<?php echo $link_prefix;?>page.php?hotnot-id=true" method="POST">
		<span class="likedspan"><i class="fa fa-heart" aria-hidden="true"></i> <?php echo $you_liked_user;?></span>
 		 <button type="submit" name="" class="btn btn-primary buttontr"  autocomplete="off">
         <?php echo _($next_user);?>
        </button>          
        </form>
        <?php } ?>
		
		<?php
        if($count_liked==0 AND $count_unliked!=0){ 		
		?>
		<form action="<?php echo $link_prefix;?>page.php?hotnot-id=true" method="POST">
		<span class="unlikedspan"><i class="fa fa-times" aria-hidden="true"></i> <?php echo $you_unliked_user;?></span>
 		 <button type="submit" name="" class="btn btn-primary buttontr"  autocomplete="off">
         <?php echo _($next_user);?>
        </button>          
        </form>
        <?php } ?>
				
		
	
		</div>
		<div class="clearfix"></div>
		<br/>
<?php
  $random_images_query="SELECT * FROM buzzyuserimages WHERE buzzyuser_id=$randombuzzyuser_id LIMIT 20";
  foreach ($connread->query($random_images_query) as $row) { 
  $buzzyuserimage_id=$row['buzzyuserimage_id'];  
  $buzzyuserimage=$row['buzzyuserimage'];
  }
?> 
  <div id="galleria">
  <?php
  foreach ($connread->query($random_images_query) as $row) { 
  $buzzyuserimage_id=$row['buzzyuserimage_id'];  
  $buzzyuserimage=$row['buzzyuserimage'];
?> 			
            <a href="<?php echo $link_prefix;?>img/<?php echo $buzzyuserimage;?>">
                <img 
                    src="<?php echo $link_prefix;?>img/<?php echo $buzzyuserimage;?>",
                    data-big="http://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Biandintz_eta_zaldiak_-_modified2.jpg/1280px-Biandintz_eta_zaldiak_-_modified2.jpg"
                    data-title="Biandintz eta zaldiak"
                    data-description="Horses on Bianditz mountain, in Navarre, Spain."
                >
            </a>
<?php } ?>	
  
            <a href="<?php echo $finala_image_prefix;?><?php echo $buzzyuser_image;?>">
                <img 
                    src="<?php echo $finala_image_prefix;?><?php echo $buzzyuser_image;?>",
                    data-big="http://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Biandintz_eta_zaldiak_-_modified2.jpg/1280px-Biandintz_eta_zaldiak_-_modified2.jpg"
                    data-title="Biandintz eta zaldiak"
                    data-description="Horses on Bianditz mountain, in Navarre, Spain."
                >
            </a>  
			
		
        </div> 

    <script>
    $(function() {
        // Load the classic theme
        // Initialize Galleria
        Galleria.run('#galleria');
    });
    </script>	
<br>	
		</div>