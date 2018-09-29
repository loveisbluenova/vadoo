<?php			   
   if ($_SESSION["buzzyadmin_id"]==1){   
   if (isset($_POST['update_quiz_questions'])) {
				$buzzyquiz_one=$_POST['buzzyquiz_one'];
				$buzzyquiz_two=$_POST['buzzyquiz_two'];	
                $buzzyquiz_three=$_POST['buzzyquiz_three'];				
				$buzzyquiz_four=$_POST['buzzyquiz_four'];
				$buzzyquiz_five=$_POST['buzzyquiz_five'];				
				$buzzyquiz_six=$_POST['buzzyquiz_six'];
				$buzzyquiz_seven=$_POST['buzzyquiz_seven'];
				$buzzyquiz_eight=$_POST['buzzyquiz_eight'];	
                $buzzyquiz_nine=$_POST['buzzyquiz_nine'];		
                $buzzyquiz_ten=$_POST['buzzyquiz_ten'];	
                $buzzyquiz_eleven=$_POST['buzzyquiz_eleven'];	
                $buzzyquiz_twelve=$_POST['buzzyquiz_twelve'];
                $buzzyquiz_thirteen=$_POST['buzzyquiz_thirteen'];			
                $buzzyquiz_fourteen=$_POST['buzzyquiz_fourteen'];		
                $buzzyquiz_fifteen=$_POST['buzzyquiz_fifteen'];	
                $buzzyquiz_sixteen=$_POST['buzzyquiz_sixteen'];	
	            $buzzyquiz_seventeen=$_POST['buzzyquiz_seventeen'];	
	            $buzzyquiz_eightteen=$_POST['buzzyquiz_eightteen'];		
	            $buzzyquiz_nineteen=$_POST['buzzyquiz_nineteen'];			
	            $buzzyquiz_twenty=$_POST['buzzyquiz_twenty'];	
   
        $OK = false;
        $update_match_quiz_query = "UPDATE buzzyquiz SET  buzzyquiz_one=:buzzyquiz_one,buzzyquiz_two=:buzzyquiz_two,buzzyquiz_three=:buzzyquiz_three,
        buzzyquiz_four=:buzzyquiz_four,buzzyquiz_five=:buzzyquiz_five,buzzyquiz_six=:buzzyquiz_six,buzzyquiz_seven=:buzzyquiz_seven,
		buzzyquiz_eight=:buzzyquiz_eight,buzzyquiz_nine=:buzzyquiz_nine,buzzyquiz_ten=:buzzyquiz_ten,buzzyquiz_eleven=:buzzyquiz_eleven,
		buzzyquiz_twelve=:buzzyquiz_twelve,buzzyquiz_thirteen=:buzzyquiz_thirteen,buzzyquiz_fourteen=:buzzyquiz_fourteen,buzzyquiz_fifteen=:buzzyquiz_fifteen,
		buzzyquiz_sixteen=:buzzyquiz_sixteen,buzzyquiz_seventeen=:buzzyquiz_seventeen,buzzyquiz_eightteen=:buzzyquiz_eightteen,buzzyquiz_nineteen=:buzzyquiz_nineteen,
		buzzyquiz_twenty=:buzzyquiz_twenty
		WHERE buzzyquiz_id=1";
        $stmt = $connwrite->prepare($update_match_quiz_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzyquiz_one', $buzzyquiz_one, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyquiz_two', $buzzyquiz_two, PDO::PARAM_STR);
        $stmt->bindParam(':buzzyquiz_three', $buzzyquiz_three, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyquiz_four', $buzzyquiz_four, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyquiz_five', $buzzyquiz_five, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyquiz_six', $buzzyquiz_six, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyquiz_seven', $buzzyquiz_seven, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyquiz_eight', $buzzyquiz_eight, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyquiz_nine', $buzzyquiz_nine, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyquiz_ten', $buzzyquiz_ten, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyquiz_eleven', $buzzyquiz_eleven, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyquiz_twelve', $buzzyquiz_twelve, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyquiz_thirteen', $buzzyquiz_thirteen, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyquiz_fourteen', $buzzyquiz_fourteen, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyquiz_fifteen', $buzzyquiz_fifteen, PDO::PARAM_STR);		
        $stmt->bindParam(':buzzyquiz_sixteen', $buzzyquiz_sixteen, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyquiz_seventeen', $buzzyquiz_seventeen, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyquiz_eightteen', $buzzyquiz_eightteen, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyquiz_nineteen', $buzzyquiz_nineteen, PDO::PARAM_STR);	
        $stmt->bindParam(':buzzyquiz_twenty', $buzzyquiz_twenty, PDO::PARAM_STR);			
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
	  	header('Location: matching-quiz.php?add-settings-success=true');	
		}
   }
      if ($_SESSION["buzzyadmin_id"]==2){
	if (isset($_POST['update_quiz_questions'])) {
  	header('Location: matching-quiz.php?onlydemo=true');
     }      
	  }