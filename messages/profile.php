<?php
	include('includes/loader.php');
	include('tpl/head.php');
	include('tpl/header.php');
	
	$users = get_users();
	
	// Note: You don't need this page on your work, its just a demo
?>
	
    <div class="container">
	  
      <div class="row">
      
      	<div class="content-wrap">
            Nothing here. This is just a demo that does not cover profile. 
        </div>
        
      </div><!-- // row -->
      
   </div><!-- // container -->
    
<?php
	include('tpl/footer.php');
?>