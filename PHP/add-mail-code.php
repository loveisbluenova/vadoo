<?php
require("PHPmailer/PHPMailerAutoload.php");
/**
 * PHP CODE FOR EDIT  MAIL  ---- START
 */

 	    foreach ($connread->query($website_options_query) as $row) {
		$buzzyemail=$row['buzzyemail'];
		$buzzyemailpassword=$row['buzzyemailpassword'];
		$buzzystpmserver=$row['buzzystpmserver'];
		   if($buzzystpmserver=='smtp.gmail.com'){
		   $serverport=465;
		   }
		   else if ($buzzystpmserver=='pop3.live.com' OR $buzzystpmserver=='outlook.office365.com' OR $buzzystpmserver=='pop.mail.yahoo.com' OR $buzzystpmserver=='plus.pop.mail.yahoo.com' OR 
		   $buzzystpmserver=='pop.att.yahoo.com' OR $buzzystpmserver=='incoming.verizon.net'){
		   $serverport=995;		  
		  }
		  else {
		  $serverport=110;			  
		  }
		}
		 if (isset($_POST['send_mail'])) {
$mail = new PHPMailer();
$mail->IsSMTP();  // telling the class to use SMTP
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = $buzzystpmserver;      // sets your  SMTP server
$mail->Port       = $serverport;        // set the SMTP port for the GMAIL server
$mail->Username = $buzzyemail;  // SMTP username 
$mail->Password = $buzzyemailpassword; // SMTP password                
$mail->IsHTML(true);  

	    foreach ($connread->query($this_user_query) as $row) {
		$buzzyuser_email=$row['buzzyuser_email'];
		}
		$message= $_POST['mail-user'];
$mail->SetFrom($buzzyemail);
$mail->Subject = "You have new message from Superadmin";
$mail->Body = $message;
$mail->AddAddress($buzzyuser_email);
 if(!$mail->Send())
    {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
    }

}
/**
 * PHP CODE FOR EDIT MAIL  ---- END
 */