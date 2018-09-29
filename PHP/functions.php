<?php
$tooltip_top='data-toggle="tooltip" data-placement="top"';
$tooltip_bottom='data-toggle="tooltip" data-placement="bottom"';		
$tooltip_left='data-toggle="tooltip" data-placement="left"';		
$tooltip_right='data-toggle="tooltip" data-placement="right"';
function modalImage($fname) {
   echo 'data-toggle="modal" data-target="#'.$fname.'"';
}
?>
<?php		
function modalFirstPart($fmodaltitle) {
        ?>
	<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" ><?php echo $fmodaltitle;?></h4>
    </div>
<?php } ?>
		
<?php		
function modalID($fmodalid) {
        ?>
<div class="modal fade" data-easein="flipBounceYIn"  id="<?php echo $fmodalid;?>" tabindex="-1" role="dialog"  aria-hidden="true">
<?php } ?>	

<?php		
$fimgupload='<div class="written-content" style="margin-left:5px!important; margin-bottom:10px!important;" >
<div class="okvir">		
<form method="post" id="dropper" enctype="multipart/form-data" action="">
<input required type="file" accept="image/x-png, image/jpeg" name="userfile" />';
?>

<?php
function modalSubmitPart($fmodalsubname, $fmodalsubtxt) {
?>
    <br>	   
       <button type="submit" name="<?php echo $fmodalsubname;?>"  class="btn btn-primary buttontr"><?php echo $fmodalsubtxt;?></button>
     </form>
	 </div>
</div>	 
    </div>
  </div>
</div> 
<?php } ?>

<?php
function inputTypeText($fplaceholder, $fname) {
?>
<input required="" type="text" class="form-control" placeholder="<?php echo $fplaceholder;?>" name="<?php echo $fname;?>">
<?php } ?>

<?php
function submitmodalLink($fmodalid, $flinkname) {
?>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $fmodalid;?>" ><?php echo $flinkname;?></a>
<?php } ?>

<?php
function classicbtnLinkprimary($fhref, $flinkname, $fclass, $fstyle, $fid) {
?>
<a href="<?php echo $fhref;?>" class="btn btn-primary <?php echo $fclass;?>" id="<?php echo $fid;?>" > <?php echo $flinkname;?></a>
<?php } ?>


<?php
function classicbtnLinksuccess($fhref, $flinkname, $fclass, $fstyle) {
?>
<a href="<?php echo $fhref;?>" class="btn btn-success <?php echo $fclass;?>"  > <?php echo $flinkname;?></a>
<?php } ?>

<?php
function classicbtnLinkwarning($fhref, $flinkname, $fclass, $fstyle) {
?>
<a href="<?php echo $fhref;?>" class="btn btn-warning <?php echo $fclass;?>"  > <?php echo $flinkname;?></a>
<?php } ?>

<?php
function classicbtnLinkinfo($fhref, $flinkname, $fclass, $fstyle) {
?>
<a href="<?php echo $fhref;?>" class="btn btn-info <?php echo $fclass;?>"  > <?php echo $flinkname;?></a>
<?php } ?>

<?php
function img($fsrc, $fclass) {
?>
<img src="<?php echo $fsrc;?>" class="<?php echo $fclass;?>" alt="" >
<?php } ?>
<?php 
$session_fullname=$session_buzzyuser_first_name . ' ' . $session_buzzyuser_last_name;
?>
<?php
function fullradius($fradius) {
?>
-webkit-border-radius:<?php echo $fradius;?>px;
-moz-border-radius: <?php echo $fradius;?>px;
border-radius: <?php echo $fradius;?>px;
<?php } ?>

<?php
function transition($fsec, $ftrans) {
?>
 -webkit-transition: all <?php echo $fsec;?>s <?php echo $ftrans;?>;
  -moz-transition: all <?php echo $fsec;?>s <?php echo $ftrans;?>;
  -o-transition: all <?php echo $fsec;?>s <?php echo $ftrans;?>;
  transition: all <?php echo $fsec;?>s <?php echo $ftrans;?>;
<?php } ?>

<?php
function showdivjquery($fclick, $folddiv, $fnewdiv) {
?>
<script>
$("#<?php echo $fclick;?>").click(function(){
    $("#<?php echo $folddiv;?>").hide();
    $("#<?php echo $fnewdiv;?>").show();	
});
</script>
<?php } ?>

<?php
function showmorejquery($fmore, $fless, $flowtext, $fhightest) {
?>
<script>
$("#<?php echo $fmore;?>").click(function(){
    $("#<?php echo $flowtext;?>").hide();
    $("#<?php echo $fhightest;?>").show();	
});
$("#<?php echo $fless;?>").click(function(){
    $("#<?php echo $flowtext;?>").show();
    $("#<?php echo $fhightest;?>").hide();	
});
</script>
<?php } ?>

<?php
function slidedowndiv($fid, $fdiv, $fspeed) {
?>
<script>
$("#<?php echo $fid;?>").click(function(){
    $("#<?php echo $fdiv;?>").slideToggle( "<?php echo $fspeed;?>" );	
});
</script>
<?php } ?>

<?php
function short300($ftext) {
?>
	<?php echo substr($ftext, 0, 300);?>
<?php } ?>
<?php
function short155($ftext) {
?>
	<?php echo substr($ftext, 0, 155);?>
<?php } ?>
<?php
function sidenavlink($fid,$ftext) {
?>
<p class="boldhover"><a style="color:#333!important; margin-left:30px;" id="<?php echo $fid;?>" href="#ads"><i  class="fa fa-dot-circle-o colored-text" aria-hidden="true"></i> <?php echo $ftext;?></a></p>
<?php } ?>
<?php
function alertinfothin($ftext) {
?>
<div class="alert alert-info">
  <?php echo $ftext;?>
</div>
<?php } ?>
<?php
function alertinfostrong($ftext) {
?>
<div class="alert alert-info">
  <strong><?php echo $ftext;?></strong>
</div>
<?php } ?>
<?php
function ajaxsubmitnohtmlrequest($fform,$fbutton) {
?>
<script type="text/javascript">
$('#<?php echo $fform;?>').submit(function(){
	return false;
});
$('#<?php echo $fbutton;?>').click(function(){
 $.post( 
 $('#<?php echo $fform;?>').attr('action'),
 $('#<?php echo $fform;?> :input').serializeArray(),
 function(result){
 document.getElementById("<?php echo $fform;?>").reset();
 }
 );
});
 </script>	
<?php } ?>
<?php
function toastmessagesuccess($fclick,$ftext) {
?>
 <script>
$("#<?php echo $fclick;?>").click(function(){
            $().toastmessage('showToast', {
                text     : '<?php echo $ftext;?>',
                type     : 'success',
                position : 'middle-right'			
            });
});
</script>
<?php } ?>


<?php
function resize_and_crop($original_image_url, $thumb_image_url, $thumb_w, $thumb_h, $quality=75)
{
    // ACQUIRE THE ORIGINAL IMAGE: http://php.net/manual/en/function.imagecreatefromjpeg.php
    $original = imagecreatefromjpeg($original_image_url);
    if (!$original) return FALSE;

    // GET ORIGINAL IMAGE DIMENSIONS
    list($original_w, $original_h) = getimagesize($original_image_url);

    // RESIZE IMAGE AND PRESERVE PROPORTIONS
    $thumb_w_resize = $thumb_w;
    $thumb_h_resize = $thumb_h;
    if ($original_w > $original_h)
    {
        $thumb_h_ratio  = $thumb_h / $original_h;
        $thumb_w_resize = (int)round($original_w * $thumb_h_ratio);
    }
    else
    {
        $thumb_w_ratio  = $thumb_w / $original_w;
        $thumb_h_resize = (int)round($original_h * $thumb_w_ratio);
    }
    if ($thumb_w_resize < $thumb_w)
    {
        $thumb_h_ratio  = $thumb_w / $thumb_w_resize;
        $thumb_h_resize = (int)round($thumb_h * $thumb_h_ratio);
        $thumb_w_resize = $thumb_w;
    }

    // CREATE THE PROPORTIONAL IMAGE RESOURCE
    $thumb = imagecreatetruecolor($thumb_w_resize, $thumb_h_resize);
    if (!imagecopyresampled($thumb, $original, 0,0,0,0, $thumb_w_resize, $thumb_h_resize, $original_w, $original_h)) return FALSE;

    // ACTIVATE THIS TO STORE THE INTERMEDIATE IMAGE
    // imagejpeg($thumb, 'RAY_temp_' . $thumb_w_resize . 'x' . $thumb_h_resize . '.jpg', 100);

    // CREATE THE CENTERED CROPPED IMAGE TO THE SPECIFIED DIMENSIONS
    $final = imagecreatetruecolor($thumb_w, $thumb_h);

    $thumb_w_offset = 0;
    $thumb_h_offset = 0;
    if ($thumb_w < $thumb_w_resize)
    {
        $thumb_w_offset = (int)round(($thumb_w_resize - $thumb_w) / 2);
    }
    else
    {
        $thumb_h_offset = (int)round(($thumb_h_resize - $thumb_h) / 2);
    }

    if (!imagecopy($final, $thumb, 0,0, $thumb_w_offset, $thumb_h_offset, $thumb_w_resize, $thumb_h_resize)) return FALSE;

    // STORE THE FINAL IMAGE - WILL OVERWRITE $thumb_image_url
    if (!imagejpeg($final, $thumb_image_url, $quality)) return FALSE;
    return TRUE;
}
?>
