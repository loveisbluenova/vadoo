<?php
$now = time();
//converting one date format into another
$website_mail_query = "SELECT buzzysiteurl,buzzyemail FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1";
foreach ($connread->query($website_mail_query) as $row) { 
$buzzysiteurl=$row['buzzysiteurl'];
$buzzyemail=$row['buzzyemail'];
}
if (isset($_POST['register_user'])){   
		header('Location:'.$link_prefix.'index.php?no-reg=true');
	    }



	