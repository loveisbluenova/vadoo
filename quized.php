<?php
session_start();
include 'includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
include 'PHP/timezone.php';
include 'PHP/basic.php';
//include 'PHP/visitcount.php';
include 'PHP/registeruser.php';
include 'PHP/loginuser.php';
if (isset($_SESSION["buzzyuser_id"])) {		
if (isset($_POST['yesone'])) {	
	$user_quiz_query1 = "SELECT COUNT(*) FROM  buzzyquizanswers WHERE buzzyuser_id=$session_user_id";
			foreach ($connread->query($user_quiz_query1) as $row) {
			$count_quiz_query=$row['COUNT(*)'];
		if ($count_quiz_query==0){	
        $add_quizone_query = "INSERT INTO buzzyquizanswers(buzzyquizanswerone,buzzyuser_id)
        VALUES(1,:buzzyuser_id)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_quizone_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_id', $session_user_id, PDO::PARAM_STR);	
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		}
        else if($count_quiz_query!=0){
        $update_quizone_query = "UPDATE buzzyquizanswers SET buzzyquizanswerone=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizone_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();			
		}		
}
}

else if(isset($_POST['noone'])) {	
	$user_quiz_query1 = "SELECT COUNT(*) FROM  buzzyquizanswers WHERE buzzyuser_id=$session_user_id";
			foreach ($connread->query($user_quiz_query1) as $row) {
			$count_quiz_query=$row['COUNT(*)'];
		if ($count_quiz_query==0){	
        $add_quizone_query = "INSERT INTO buzzyquizanswers(buzzyquizanswerone,buzzyuser_id)
        VALUES(0,:buzzyuser_id)";
        // prepare the statement
        $stmt = $connwrite->prepare($add_quizone_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyuser_id', $session_user_id, PDO::PARAM_STR);	
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		}
        else if($count_quiz_query!=0){
        $update_quizone_query = "UPDATE buzzyquizanswers SET buzzyquizanswerone=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizone_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();			
		}		
}
}
if(isset($_POST['yestwo'])) {	
        $update_quiztwo_query = "UPDATE buzzyquizanswers SET buzzyquizanswertwo=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quiztwo_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['notwo'])) {	
        $update_quiztwo_query = "UPDATE buzzyquizanswers SET buzzyquizanswertwo=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quiztwo_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}

if(isset($_POST['yesthree'])) {	
        $update_quizthree_query = "UPDATE buzzyquizanswers SET buzzyquizanswerthree=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizthree_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['nothree'])) {	
        $update_quizthree_query = "UPDATE buzzyquizanswers SET buzzyquizanswerthree=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizthree_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}

if(isset($_POST['yesfour'])) {	
        $update_quizfour_query = "UPDATE buzzyquizanswers SET buzzyquizanswerfour=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizfour_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['nofour'])) {	
        $update_quizfour_query = "UPDATE buzzyquizanswers SET buzzyquizanswerfour=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizfour_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}

if(isset($_POST['yesfive'])) {	
        $update_quizfive_query = "UPDATE buzzyquizanswers SET buzzyquizanswerfive=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizfive_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['nofive'])) {	
        $update_quizfive_query = "UPDATE buzzyquizanswers SET buzzyquizanswerfive=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizfive_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}

if(isset($_POST['yessix'])) {	
        $update_quizsix_query = "UPDATE buzzyquizanswers SET buzzyquizanswersix=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizsix_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['nosix'])) {	
        $update_quizsix_query = "UPDATE buzzyquizanswers SET buzzyquizanswersix=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizsix_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}

if(isset($_POST['yesseven'])) {	
        $update_quizseven_query = "UPDATE buzzyquizanswers SET buzzyquizanswerseven=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizseven_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['noseven'])) {	
        $update_quizseven_query = "UPDATE buzzyquizanswers SET buzzyquizanswerseven=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizseven_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}


if(isset($_POST['yeseight'])) {	
        $update_quizeight_query = "UPDATE buzzyquizanswers SET buzzyquizanswereight=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizeight_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['noeight'])) {	
        $update_quizeight_query = "UPDATE buzzyquizanswers SET buzzyquizanswereight=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizeight_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}


if(isset($_POST['yesnine'])) {	
        $update_quiznine_query = "UPDATE buzzyquizanswers SET buzzyquizanswernine=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quiznine_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['nonine'])) {	
        $update_quiznine_query = "UPDATE buzzyquizanswers SET buzzyquizanswernine=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quiznine_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}

if(isset($_POST['yesten'])) {	
        $update_quizten_query = "UPDATE buzzyquizanswers SET buzzyquizanswerten=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizten_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['noten'])) {	
        $update_quizten_query = "UPDATE buzzyquizanswers SET buzzyquizanswerten=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizten_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}

if(isset($_POST['yeseleven'])) {	
        $update_quizeleven_query = "UPDATE buzzyquizanswers SET buzzyquizanswereleven=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizeleven_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['noeleven'])) {	
        $update_quizeleven_query = "UPDATE buzzyquizanswers SET buzzyquizanswereleven=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizeleven_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}

if(isset($_POST['yestwelve'])) {	
        $update_quiztwelve_query = "UPDATE buzzyquizanswers SET buzzyquizanswertwelve=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quiztwelve_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['notwelve'])) {	
        $update_quiztwelve_query = "UPDATE buzzyquizanswers SET buzzyquizanswertwelve=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quiztwelve_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}


if(isset($_POST['yesthirteen'])) {	
        $update_quizthirteen_query = "UPDATE buzzyquizanswers SET buzzyquizanswerthirteen=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizthirteen_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['nothirteen'])) {	
        $update_quizthirteen_query = "UPDATE buzzyquizanswers SET buzzyquizanswerthirteen=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizthirteen_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}

if(isset($_POST['yesfourteen'])) {	
        $update_quizfourteen_query = "UPDATE buzzyquizanswers SET buzzyquizanswerfourteen=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizfourteen_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['nofourteen'])) {	
        $update_quizfourteen_query = "UPDATE buzzyquizanswers SET buzzyquizanswerfourteen=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizfourteen_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}


if(isset($_POST['yesfifteen'])) {	
        $update_quizfifteen_query = "UPDATE buzzyquizanswers SET buzzyquizanswerfifteen=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizfifteen_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['nofifteen'])) {	
        $update_quizfifteen_query = "UPDATE buzzyquizanswers SET buzzyquizanswerfifteen=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizfifteen_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}


if(isset($_POST['yessixteen'])) {	
        $update_quizsixteen_query = "UPDATE buzzyquizanswers SET buzzyquizanswersixteen=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizsixteen_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['nosixteen'])) {	
        $update_quizsixteen_query = "UPDATE buzzyquizanswers SET buzzyquizanswersixteen=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizsixteen_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}

if(isset($_POST['yesseventeen'])) {	
        $update_quizseventeen_query = "UPDATE buzzyquizanswers SET buzzyquizanswerseventeen=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizseventeen_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['noseventeen'])) {	
        $update_quizseventeen_query = "UPDATE buzzyquizanswers SET buzzyquizanswerseventeen=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizseventeen_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}


if(isset($_POST['yeseightteen'])) {	
        $update_quizeightteen_query = "UPDATE buzzyquizanswers SET buzzyquizanswereightteen=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizeightteen_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['noeightteen'])) {	
        $update_quizeightteen_query = "UPDATE buzzyquizanswers SET buzzyquizanswereightteen=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quizeightteen_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}


if(isset($_POST['yesnineteen'])) {	
        $update_quiznineteen_query = "UPDATE buzzyquizanswers SET buzzyquizanswernineteen=1
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quiznineteen_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}
else if(isset($_POST['nonineteen'])) {	
        $update_quiznineteen_query = "UPDATE buzzyquizanswers SET buzzyquizanswernineteen=0
	    WHERE buzzyuser_id=$session_user_id";
        $stmt = $connwrite->prepare($update_quiznineteen_query);
        // bind the parameters and execute the statement		
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();				
}




}

