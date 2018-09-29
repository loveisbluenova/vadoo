<?php
ob_start( 'ob_gzhandler' );
include('includes/loader.php');
// Note: This is the page that matters to you
include '../security/xss-security.php';
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include '../PHP/basic.php';
include '../PHP/registeruser.php';
include '../PHP/loginuser.php';
$base_url='http://gagogirls.com/';
?>
<?php
include('tpl/head.php');
include('tpl/header.php');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=4">
    <?php
    foreach ($connread->query($website_options_query) as $row) {
        $buzzysiteurl = $row['buzzysiteurl'];
        $buzzyfavicon = $row['buzzyfavicon'];
        $pagemetatag = $row['buzzymetatag'];
        $buzzyfacebookid = $row['buzzyfacebookid'];
        ?>
    <?php } ?>
    <?php
    foreach ($connread->query($website_css_options_query) as $row) {
        $buzzycss_color_css = $row['buzzycss_color_css'];
        $buzzycss_headings_font_family = $row['buzzycss_headings_font_family'];
        $buzzycss_body_font_family = $row['buzzycss_body_font_family'];
        ?>
    <?php } ?>
    <?php
    $pagetitletag = 'Messages';
    ?>
    <!-- CSS 3 STYLES --------- START -->
    <?php
    include ''.$base_url.'HTML/css-styles.html';
    ?>
    <!-- CSS 3 STYLES --------- END -->
    <script src="../../googleanalytics/ga-code.js"></script>
	    <style>
		textarea{
		font-size:12px!important;	
		height:100px!important;
		}
		.msg-div{
		margin-top:10px!important;	
		margin-left:10px!important;
		margin-right:10px!important;			
		background:none!important;
		border:1px solid none!important;
		}
		.media-body{
		font-size:12px!important;	
		}
		.note-dialog{
  .modal-dialog{
    z-index: @zindex-modal;
  }
}

 .modal-backdrop { z-index: -999999!important; }
    </style>
</head>
<body>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=<?php echo $buzzyfacebookid;?>&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- HEADER --------- START -->
<div id="header">
    <?php
    include ''.$base_url.'HTML/header.html';
    ?>
</div>
<br><br><br>
<div class="">
    <div class="wrapper">
        <div class="content-wrap margin-reset">
            <!-- messages -->
            <div class="messages-box">
                <?php include('messages_load.php'); ?>
            </div>
            <!-- // messages -->
        </div>
		<br />
	
		</div>
		<br>
    </div>
    <!-- // row -->

<!-- // container -->

<?php
include('tpl/footer.php');
?>
<div class="modal fade" data-backdrop="false"  style="position:fixed!important;" id="privacy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div id="status">
</div>
  <div class="modal-dialog">
    <div class="modal-content">
	  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="exampleModalLabel"><?php echo $privacy;?></h2>
      </div>
      <div class="modal-body">
		 <?php echo $buzzyprivacy;?>
      <div id="status">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $close;?></button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" data-backdrop="false"  style="position:fixed!important;"  id="terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div id="status">
</div>
  <div class="modal-dialog">
    <div class="modal-content">
	  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="exampleModalLabel"><?php echo $terms;?></h2>
      </div>
      <div class="modal-body">
		 <?php echo $buzzyterms;?>
      <div id="status">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $close;?></button>
      </div>
    </div>
  </div>
</div>
</body>
</html>