<?php
session_start();
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
	  include '../PHP/timezone.php';
include 'PHP/logincode.php';
include 'PHP/basic.php';
    //include 'PHP/visits.php';
include 'PHP/editwebsitecode.php';
$current1 = '';
$current2 = '';
$current3 = '';
$current4='current';
$current5='';
$current6='';
$current7='';
$current8='';
$current9='';
$current10='';
$current11='';
$current12='';
$current13='';
$current14='';
$current15='';
$current16='';
$current17='';
$current18='';	
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buzzybuz - Admin panel for controlling website</title>
    <meta name="description" content="Loading Effects for Grid Items with CSS Animations"/>
    <meta name="keywords" content="css animation, loading effect, google plus, grid items, masonry"/>
    <meta name="author" content="Codrops"/>
    <link rel="shortcut icon" href="../favicon.ico">
    		<link rel="stylesheet" type="text/css" href="css/admin.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
    <link rel="stylesheet" type="text/css" href="css/default.css"/>
    <link rel="stylesheet" type="text/css" href="css/component.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $link_prefix;?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $link_prefix;?>css/animate.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"/>		
    <script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../dist/sweetalert.css">		
    <script src="bootstrap/js/angular.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/npm.js"></script>
    <script src="charts/Chart.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
        var bootstrapButton = $.fn.button.noConflict() // return $.fn.button to previously assigned value
        $.fn.bootstrapBtn = bootstrapButton            // give $().bootstrapBtn the Bootstrap functionality
    </script>
    <script>

        // Code that uses other library's $ can follow here.
    </script>
</head>
<body>

<!-- Admin panel Header ------ START -->
<div id="admin-header">
    <?php
    include 'HTML/admin-header.html';
    ?>
</div>
<!-- Admin panel Header ------ END -->
<br><br>

<!-- ADMIN WRAPPER ------ START -->

<!-- Side page of the Admin panel ------ START -->
<div class="one-sixth-column big-screen">
    <div id="admin-side-page">
        <?php
        include 'HTML/admin-side-page.html';
        ?>
    </div>
</div>
<!-- Side page of the Admin panel ------ END -->

<div class="fifth-sixth-column">
    <!-- Breadcrumbs for admin panel ------ START -->
    <ol class="breadcrumb">
        <li><a href="index.php"><span class="glyphicon glyphicon-home "></span>Home</a></li>
    </ol>
    <!-- Breadcrumbs for admin panel ------ END -->
    <div class="content-empty">
        <div class="clearfix"></div>
    </div>
    <div class="content">
        <div id="sample">
            <div class="content-empty">
                <h1>
                    Change website options 
                </h1>
			    <?php
                foreach ($connread->query($website_options_query) as $row) {
				$buzzysitename=$row['buzzysitename'];
				$buzzysiteurl=$row['buzzysiteurl'];
				$buzzytitletag=$row['buzzytitletag'];
				$buzzymetatag=$row['buzzymetatag'];
				$buzzyads=$row['buzzyads'];
				$buzzyemail=$row['buzzyemail'];
				$buzzyemailpass=$row['buzzyemailpass'];
                $buzzygrideffect=$row['buzzygrideffect'];
				$buzzyfacebookid=$row['buzzyfacebookid'];			
				$buzzyprivacy=$row['buzzyprivacy'];
				$buzzyterms=$row['buzzyterms'];		
                $buzzynewslimit=$row['buzzynewslimit'];		
                $buzzydistance_mesaure=$row['buzzydistance_mesaure'];				
                $buzzyoptimizedstatus=$row['buzzyoptimizedstatus'];		
                $buzzytimezone=$row['buzzytimezone'];
                $buzzycolumns=$row['buzzycolumns'];	
                $buzzyanimationspeed=$row['buzzyanimationspeed'];	
                $buzzywebsite_status=$row['buzzywebsite_status'];	
				$buzzydistance_mesaure=$row['buzzydistance_mesaure'];
				$buzzysitemeasure=$row['buzzysitemeasure'];				
				$buzzymax_pages=$row['buzzymax_pages'];
			    $buzzyuserimage_status=$row['buzzyuserimage_status'];
                $buzzylanguage_status=$row['buzzylanguage_status'];
                $buzzy_access=$row['buzzy_access'];
                $buzzy_accesstime=$row['buzzy_accesstime'];		
                $buzzy_frontpage=$row['buzzy_frontpage'];
                $buzzy_forbid=$row['buzzy_forbid'];		
                $buzzy_ajaxcount=$row['buzzy_ajaxcount'];	

				if ($buzzy_ajaxcount==0){
                $selectedabc1='selected';
                $selectedabc2='';				
                }	
			    else if ($buzzy_ajaxcount==1){
                $selectedabc1='';
                $selectedabc2='selected';							
                }

				
				if ($buzzy_forbid==0){
                $selectedeig1='selected';
                $selectedeig2='';				
                }	
			    else if ($buzzy_forbid==1){
                $selectedeig1='';
                $selectedeig2='selected';							
                }
				
				if ($buzzy_frontpage==0){
                $selectedfp1='selected';
                $selectedfp2='';	
                $selectedfp3='';				
                }	
			    else if ($buzzy_frontpage==1){
                $selectedfp1='';
                $selectedfp2='selected';	
                $selectedfp3='';						
                }				
			    else if ($buzzy_frontpage==2){
                $selectedfp1='';
                $selectedfp2='';	
                $selectedfp3='selected';					
                }	
				
				if ($buzzy_access==0){
                $selectedacc1='selected';
                $selectedacc2='';	
                $blocknone='none';				
                }	
			    else if ($buzzy_access==1){
                $selectedacc1='';
                $selectedacc2='selected';	
                $blocknone='block';					
                }
				
				if ($buzzylanguage_status==0){
                $selectedlgg1='selected';
                $selectedlgg2='';				
                }	
			    else if ($buzzylanguage_status==1){
                $selectedlgg1='';
                $selectedlgg2='selected';				
                }				
				
				if ($buzzyuserimage_status==0){
                $selectedupup1='selected';
                $selectedupup2='';				
                }	
			    else if ($buzzyuserimage_status==1){
                $selectedupup1='';
                $selectedupup2='selected';				
                }
				
				if ($buzzywebsite_status==0){
                $selectedliv1='selected';
                $selectedliv2='';				
                }	
			    else if ($buzzywebsite_status==1){
                $selectedliv1='';
                $selectedliv2='selected';				
                }
	
			    if ($buzzydistance_mesaure==0){
                $selectedmes1='selected';
                $selectedmes2='';				
                }	
			    else if ($buzzydistance_mesaure==1){
                $selectedmes1='';
                $selectedmes2='selected';					
                }
	
			    if ($buzzysitemeasure==0){
                $selectedmec1='selected';
                $selectedmec2='';				
                }	
			    else if ($buzzysitemeasure==1){
                $selectedmec1='';
                $selectedmec2='selected';					
                }	
	
	
	
	
			    if ($buzzycolumns=='three-columns'){
                $selected1='selected';
                $selected2='';				
                }	
			    else if ($buzzycolumns=='four-columns'){
                $selected1='';					
                $selected2='selected';
                }		

			    if ($buzzyanimationspeed=='slow'){
                $selected1a='selected';
				$selected2a='';
				$selected3a='';			
                }	
			    else if ($buzzyanimationspeed=='normal'){
				$selected1a='';		
                $selected2a='selected';
				$selected3a='';	
                }
			    else if ($buzzyanimationspeed=='fast'){
				$selected1a='';						
                $selected3a='selected';
                $selected2a='';	
                }				
			    if ($buzzyoptimizedstatus==0){
                $checkedseo='';
                }
				else if ($buzzyoptimizedstatus==1){
                $checkedseo='checked';
                }
				
                if ($buzzynewslimit==25){
                $checked25='active';
                }	
                else if ($buzzynewslimit!=25){
                $checked25='';
                }	
                if ($buzzynewslimit==50){
                $checked50='active';
                }	
                else if ($buzzynewslimit!=50){
                $checked50='';
                }	
                if ($buzzynewslimit==75){
                $checked75='active';
                }	
                else if ($buzzynewslimit!=75){
                $checked75='';
                }	
                if ($buzzynewslimit==100){
                $checked100='active';           
			    }	
                else if ($buzzynewslimit!=100){
                $checked100='';
                }				
		        ?>
                <form action="" method="POST"> 
               <h3>Website status</h3>
					<select class="form-control" name="buzzywebsite_status" required>
                    <option <?php echo $selectedliv1;?> value="0">
					Live 
					</option>
                    <option <?php echo $selectedliv2;?> value="1">
					Demo version
					</option>					
					</select>				
                <h3>Website name</h3>				
                <input type="text" class="form-control" name="buzzysitename" required value="<?php echo $buzzysitename;?>" data-toggle="tooltip" data-placement="right" title="You type your website name here">	
                <h3>Website url</h3>
                <input type="text" class="form-control" name="buzzysiteurl" required value="<?php echo $buzzysiteurl;?>" data-toggle="tooltip" data-placement="right" title="You type your website url here without https://.. It is important to post this because of social network connectivity and so on..">
               <h3>Website front page</h3>
					<select class="form-control" name="buzzy_frontpage" required>
                    <option <?php echo $selectedfp1;?> value="0">
					Profile page
					</option>
                    <option <?php echo $selectedfp2;?> value="1">
					Index page
					</option>
                    <option <?php echo $selectedfp3;?> value="2">
					Hot or not page
					</option>					
					</select>


            <h3>Website 18 years Pop up</h3>
					<select class="form-control" name="buzzy_forbid" required>
                    <option <?php echo $selectedeig1;?> value="0">
					Disable 18 years restriction
					</option>
                    <option <?php echo $selectedeig2;?> value="1">
					Enable 18 years restriction
					</option>                 				
					</select>
				

            <h3>Website AJAX counter</h3>
					<select class="form-control" name="buzzy_ajaxcount" required>
                    <option <?php echo $selectedabc1;?> value="0">
					Disabled AJAX counter
					</option>
                    <option <?php echo $selectedabc2;?> value="1">
					Enabled AJAX counter
					</option>                 				
					</select>				
				
					
                <h3>Website logo</h3>
				<a href="add-logoold.php" data-toggle="tooltip" data-placement="right" title="Add your website logo here!">Add website logo (200x40px)</a>
<br>	

   <h3>Website register page image</h3>
				<a href="add-regimage.php" data-toggle="tooltip" data-placement="right" title="Add your website register image here!">Add register image</a>
<br>	

					<h3>Website accesibility for men</h3>
					<select class="form-control" id="buzzy_access" name="buzzy_access" required >		
     					<option <?php echo $selectedacc1;?> value="0">
					    Men have full access to website
						</option>	
                       <option <?php echo $selectedacc2;?> value="1">
					    Men have restricted access to website
						</option>							
                    </select>	
 <script>
    $("#buzzy_access").on('change', function() {
        var sel = $("#buzzy_access").val();
        if (sel=='0') {
           $("#noneaccess").hide();
        }else if (sel=='1') {
           $("#noneaccess").show();
        }
    });     
</script>               
				<div id="noneaccess" style="display:<?php echo $blocknone;?>" >
                <h3>Days of free access for men</h3>				
                <input type="number" class="form-control" name="buzzy_accesstime"
				required value="<?php echo $buzzy_accesstime;?>" data-toggle="tooltip"
				data-placement="right" title="Days for free access for men">						
				</div>	
                    <h3>Website animation (8 total)</h3>		
                    <select class="form-control" name="buzzygrideffect" required>
                        <option disabled selected>Select frontend grid animation</option>
						<?php for ($i = 1; $i <= 8; $i++) { 
						if($buzzygrideffect==$i){
						$selected='selected';
						}
						else if($buzzygrideffect!=$i){
						$selected='';
						}						
                        if ($i==1){
                        $j='Opacity';
                        }      
                        else if ($i==2){
                        $j='Move up';
                        }     
                        else if ($i==3){
                        $j='Scale up';
                        }      
                        else if ($i==4){
                        $j='Fall perspective';
                        }   
                        else if ($i==5){
                        $j='Fly';
                        }        
                        else if ($i==6){
                        $j='Flip';
                        }        
                        else if ($i==7){
                        $j='Helix';
                        }    
                         else if ($i==8){
                        $j='Bounce up';
                        }              
                        ?>
     			<option <?php echo $selected;?> value="<?php echo $i;?>">
			<?php echo $j; ?>						
                        </option>   
                        <?php } ?>						
                    </select>	
					<h3>Website timezone</h3>
					<select class="form-control" name="buzzytimezone" required>
					<?php 
					include 'HTML/timezones.html';
             		?>
					</select>
			        <br>
					<h3>Number of grid columns</h3>
					<select class="form-control" name="buzzycolumns" required >
                        <option disabled selected>Select number of grid columns</option>		
     					<option <?php echo $selected1;?> value="three-columns">
					    Three columns
						</option>	
                       <option <?php echo $selected2;?> value="four-columns">
					    Four columns
						</option>							
                    </select>	
					<h3>Grid animation speed</h3>
						<select class="form-control" name="buzzyanimationspeed" required >
                        <option disabled selected>Select grid animation speed</option>	
						<option <?php echo $selected1a;?> value="slow">
					    Slow
						</option>	
     					<option <?php echo $selected2a;?> value="normal">
					    Normal
						</option>	
                       <option  <?php echo $selected3a;?> value="fast">
					    Fast
						</option>							
                    </select>	
			  <h3>Website title tag</h3>
				<input type="text" class="form-control" name="buzzytitletag" required value=" <?php echo $buzzytitletag; ?>" data-toggle="tooltip" data-placement="right" title="Change main page title tag">
              <h3>Website email</h3>
			  <input type="text" class="form-control" name="buzzyemail" required value="<?php echo $buzzyemail; ?>" data-toggle="tooltip" data-placement="right" title="Change website email">	
              <h3>Website email password (SMTP)</h3>
			  <input type="password" class="form-control" name="buzzyemailpass" required value="<?php echo $buzzyemailpass; ?>" data-toggle="tooltip" data-placement="right" title="Change website email password">	
			  
				<input type="text" class="form-control" name="buzzyfacebookid" required value="<?php echo $buzzyfacebookid;?>" data-toggle="tooltip" data-placement="right"
				title="You type your facebook aplication group id here.. 
				It is important to create it in facebook developer Tutorial is https://www.hyperarts.com/blog/how-to-create-facebook-application-to-get-an-app-id-for-your-website/..">				
				<div class="checkbox">
                <label>
                <input type="checkbox" name="buzzyoptimizedstatus" value="1" <?php echo $checkedseo; ?> data-toggle="tooltip" data-placement="top" title="Make your urls SEO friendly... Beware, you must check your .httacces file
				and do not check this option at your localhost"> Make urls SEO optimized
                </label>
                </div>				
				<h3>Website meta tag</h3>
				<input type="text" name="buzzymetatag"  class="form-control"  required style="width: 80%;" value="<?php echo $buzzymetatag ;?>" data-toggle="tooltip" data-placement="top"	title="You type your website meta tag here...">
				<h3>Page grid limit</h3>                
				<div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary <?php echo $checked25;?>">
                  <input type="radio" name="buzzynewslimit" id="option1" value="25"  >  25
                </label>
                <label class="btn btn-primary <?php echo $checked50;?> ">
                  <input type="radio" name="buzzynewslimit" id="option1" value="50"  >  50
                </label>
                <label class="btn btn-primary <?php echo $checked75;?>">
                 <input type="radio" name="buzzynewslimit" id="option1" value="75"   >  75
                </label>
                <label class="btn btn-primary <?php echo $checked100;?>">
                 <input type="radio" name="buzzynewslimit" id="option1" value="100"  >  100
                </label>				
                </div>
				<br>
				 <h3>Website page limits</h3>
				<input type="number" class="form-control" name="buzzymax_pages" required value="<?php echo $buzzymax_pages; ?>" data-toggle="tooltip" data-placement="right" title="Change your maximum pages">

			    <h3>Website weight and height measures</h3>
					<select class="form-control" name="buzzysitemeasure" required >	
     					<option <?php echo $selectedmec1;?> value="0">
					   Cm and kg 
						</option>	
                       <option <?php echo $selectedmec2;?> value="1">
					   Inches and Pounds
						</option>							
                    </select>					
				
			    <h3>Website distance measure</h3>
					<select class="form-control" name="buzzydistance_mesaure" required >	
     					<option <?php echo $selectedmes1;?> value="0">
					    Kilometres
						</option>	
                       <option <?php echo $selectedmes2;?> value="1">
					    Miles
						</option>							
                    </select>	

			    <h3>Website multilingual settings</h3>
					<select class="form-control" name="buzzylanguage_status" required >	
     					<option <?php echo $selectedlgg1;?> value="0">
					    Website default language for all users
						</option>	
                       <option <?php echo $selectedlgg2;?> value="1">
					    Adapt website language to user
						</option>							
                    </select>		

	
	       <h3>User images</h3>
						<select class="form-control" name="buzzyuserimage_status" required >
                        <option disabled selected>User images status</option>	
						<option <?php echo $selectedupup1;?> value="0">
					    User can upload image freely 
						</option>	
     					<option <?php echo $selectedupup2;?> value="1">
					    Every image needs to be approved
						</option>							
                    </select>						
					
					
				<h3>Website privacy policy</h3>
				<textarea name="buzzyprivacy" class="ckeditor" cols="80" id="editor1" rows="10" style="width: 480px;  padding-left:15px!important; height:180px;
                border-color: #66afe9; 
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);" >
               <?php echo $buzzyprivacy ;?>
                </textarea>
				<h3>Website terms of use</h3>
				<textarea name="buzzyterms" class="ckeditor" cols="80" id="editor1" rows="10" style="width: 480px;  padding-left:15px!important; height:180px;
                border-color: #66afe9; 
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);" >
               <?php echo $buzzyterms ;?>
                </textarea>
				<?php }	?>
				<br>
					<button type="submit" name="update_website_options" class="btn btn-primary">Submit website options</button>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/imagesloaded.js"></script>
<script src="js/classie.js"></script>
<!-- ADMIN WRAPPER ------ END -->
<?php
  include '../HTML/modal-sweet-alerts.html';
?>
</body>
</html>