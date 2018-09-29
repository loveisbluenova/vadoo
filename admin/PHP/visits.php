<?php
function strtotimefix($val,$timestamp=0){
	if ($timestamp==0){ $timestamp = time(); }
	if (date('m') == date('m',strtotime('-1 month'))){
		$timestamp = strtotime('-3 days',$timestamp);
	}else{
		if($timestamp==0){$timestamp = time();}
	}
	$strtotime = strtotime($val,$timestamp);
	return $strtotime;
}
/* Select daily, weekly, monthly and total visits --------------- START */
      $visitors_query = "SELECT  COUNT(*) as countvisits,COUNT(DISTINCT buzzyvisitors_ip) as countuniquevisits FROM buzzyvisitors";
	  $monthly_visitors_query = "SELECT COUNT(*) as monthlycountvisits,COUNT(DISTINCT buzzyvisitors_ip) as monthlycountuniquevisits FROM buzzyvisitors WHERE buzzyvisitors_visitdate > DATE_SUB(NOW(), INTERVAL 1 MONTH)";	
	  $weekly_visitors_query = "SELECT COUNT(*) as weeklycountvisits, COUNT(DISTINCT buzzyvisitors_ip) as weeklycountuniquevisits FROM buzzyvisitors  WHERE buzzyvisitors_visitdate > DATE_SUB(NOW(), INTERVAL 1 WEEK)";	
	  $daily_visitors_query = "SELECT COUNT(*) as dailycountvisits, COUNT(DISTINCT buzzyvisitors_ip) as dailycountuniquevisits FROM buzzyvisitors WHERE buzzyvisitors_visitdate > DATE_SUB(NOW(), INTERVAL 1 DAY)";
      $visitors_country_count_query = "SELECT COUNT(*) as countcountries FROM   buzzyvisitorcountries";
	  $visitors_city_count_query = "SELECT COUNT(*) as countcities FROM   buzzyvisitorcountries";
      foreach ($connread->query($visitors_query) as $row) {  
      $countvisits =$row['countvisits'];
      $countuniquevisits =$row['countuniquevisits'];
      }
	  foreach ($connread->query($monthly_visitors_query) as $row) {  
      $monthlycountvisits =$row['monthlycountvisits'];
      $monthlycountuniquevisits =$row['monthlycountuniquevisits'];
      }
	  foreach ($connread->query($weekly_visitors_query) as $row) {  
      $weeklycountvisits =$row['weeklycountvisits'];
      $weeklycountuniquevisits =$row['weeklycountuniquevisits'];
      }
	  
	  foreach ($connread->query($daily_visitors_query) as $row) {  
      $dailycountvisits =$row['dailycountvisits'];
      $dailycountuniquevisits =$row['dailycountuniquevisits'];
      }
  /* Select daily, weekly, monthly and total visits --------------- END */  
   
  /* Select  total visits by countries --------------- START */	  
	  
	  /* Country with most website visitors --------------- START */
      $first_visitors_country_query = "SELECT * FROM   buzzyvisitorcountries ORDER by buzzyvisitorcountrycount DESC LIMIT 0,1";
      foreach ($connread->query($first_visitors_country_query) as $row) { 
	  $first_buzzyvisitors_country=$row['buzzyvisitors_country'];
	  $first_buzzyvisitorcountrycount=$row['buzzyvisitorcountrycount'];
	  $first_buzzyvisitorcountrypercent=($first_buzzyvisitorcountrycount/$countvisits)*100;
	  }
	   /* Country with most website visitors - --------------- END */
	  
	  /* Country with second most website visitors --------------- START */
      $second_visitors_country_query = "SELECT * FROM   buzzyvisitorcountries ORDER by buzzyvisitorcountrycount DESC LIMIT 1,1";
      foreach ($connread->query($second_visitors_country_query) as $row) { 
	  $second_buzzyvisitors_country=$row['buzzyvisitors_country'];
	  $second_buzzyvisitorcountrycount=$row['buzzyvisitorcountrycount'];
	  $second_buzzyvisitorcountrypercent=($second_buzzyvisitorcountrycount/$countvisits)*100;
	  }
	  /* Country with second most website visitors - --------------- END */
	  
	  /* Country with third most website visitors --------------- START */
	  $third_visitors_country_query = "SELECT * FROM   buzzyvisitorcountries ORDER by buzzyvisitorcountrycount DESC LIMIT 2,1";
      foreach ($connread->query($third_visitors_country_query) as $row) { 
	  $third_buzzyvisitors_country=$row['buzzyvisitors_country'];
	  $third_buzzyvisitorcountrycount=$row['buzzyvisitorcountrycount'];
	  $third_buzzyvisitorcountrypercent=($third_buzzyvisitorcountrycount/$countvisits)*100;
	  }
	  /* Country with third most website visitors --------------- END */
	  
	  /* Country with fourth most website visitors --------------- START */
	  $fourth_visitors_country_query = "SELECT * FROM   buzzyvisitorcountries ORDER by buzzyvisitorcountrycount DESC LIMIT 3,1";
      foreach ($connread->query($fourth_visitors_country_query) as $row) { 
	  $fourth_buzzyvisitors_country=$row['buzzyvisitors_country'];
	  $fourth_buzzyvisitorcountrycount=$row['buzzyvisitorcountrycount'];
	  $fourth_buzzyvisitorcountrypercent=($fourth_buzzyvisitorcountrycount/$countvisits)*100;
	  }
	  /* Country with fourth most website visitors --------------- END */
	  
	  /* Country with fifth most website visitors --------------- START */
	  $fifth_visitors_country_query = "SELECT * FROM   buzzyvisitorcountries ORDER by buzzyvisitorcountrycount DESC LIMIT 4,1";
      foreach ($connread->query($fifth_visitors_country_query) as $row) { 
	  $fifth_buzzyvisitors_country=$row['buzzyvisitors_country'];
	  $fifth_buzzyvisitorcountrycount=$row['buzzyvisitorcountrycount'];
	  $fifth_buzzyvisitorcountrypercent=($fifth_buzzyvisitorcountrycount/$countvisits)*100;
	  }	
	  /* Country with fifth most website visitors --------------- END*/
	  
   /* Select  total visits by countries --------------- END*/

   
   
   
   
   
   
   
   
   
     /* Select  total visits by cities --------------- START */	  
	  
	  /* City with most website visitors --------------- START */
      $first_visitors_city_query = "SELECT * FROM  buzzyvisitorcities ORDER by buzzyvisitorcitycount DESC LIMIT 0,1";
      foreach ($connread->query($first_visitors_city_query) as $row) { 
	  $first_buzzyvisitors_city=$row['buzzyvisitors_city'];
	  $first_buzzyvisitors_countrycode=$row['buzzyvisitors_countrycode'];
	  $first_buzzyvisitorcitycount=$row['buzzyvisitorcitycount'];
	  $first_buzzyvisitorcitypercent=($first_buzzyvisitorcitycount/$countvisits)*100;
	  }
	   /* City with most website visitors - --------------- END */
	  
	   /* City with second most website visitors --------------- START */
      $second_visitors_city_query = "SELECT * FROM  buzzyvisitorcities ORDER by buzzyvisitorcitycount DESC LIMIT 1,1";
      foreach ($connread->query($second_visitors_city_query) as $row) { 
	  $second_buzzyvisitors_city=$row['buzzyvisitors_city'];
	  $second_buzzyvisitors_countrycode=$row['buzzyvisitors_countrycode'];
	  $second_buzzyvisitorcitycount=$row['buzzyvisitorcitycount'];
	  $second_buzzyvisitorcitypercent=($second_buzzyvisitorcitycount/$countvisits)*100;
	  }
	   /* City with second most website visitors - --------------- END */
	 
	   /* City with third most website visitors --------------- START */
      $third_visitors_city_query = "SELECT * FROM  buzzyvisitorcities ORDER by buzzyvisitorcitycount DESC LIMIT 2,1";
      foreach ($connread->query($third_visitors_city_query) as $row) { 
	  $third_buzzyvisitors_city=$row['buzzyvisitors_city'];
	  $third_buzzyvisitors_countrycode=$row['buzzyvisitors_countrycode'];
	  $third_buzzyvisitorcitycount=$row['buzzyvisitorcitycount'];
	  $third_buzzyvisitorcitypercent=($third_buzzyvisitorcitycount/$countvisits)*100;
	  }
	   /* City with third most website visitors - --------------- END */
	  
	  /* City with fourth most website visitors --------------- START */
      $fourth_visitors_city_query = "SELECT * FROM  buzzyvisitorcities ORDER by buzzyvisitorcitycount DESC LIMIT 3,1";
      foreach ($connread->query($fourth_visitors_city_query) as $row) { 
	  $fourth_buzzyvisitors_city=$row['buzzyvisitors_city'];
	  $fourth_buzzyvisitors_countrycode=$row['buzzyvisitors_countrycode'];
	  $fourth_buzzyvisitorcitycount=$row['buzzyvisitorcitycount'];
	  $fourth_buzzyvisitorcitypercent=($fourth_buzzyvisitorcitycount/$countvisits)*100;
	  }
	   /* City with fourth most website visitors - --------------- END */
	   
	    /* City with fifth most website visitors --------------- START */
      $fifth_visitors_city_query = "SELECT * FROM  buzzyvisitorcities ORDER by buzzyvisitorcitycount DESC LIMIT 4,1";
      foreach ($connread->query($fifth_visitors_city_query) as $row) { 
	  $fifth_buzzyvisitors_city=$row['buzzyvisitors_city'];
	  $fifth_buzzyvisitors_countrycode=$row['buzzyvisitors_countrycode'];
	  $fifth_buzzyvisitorcitycount=$row['buzzyvisitorcitycount'];
	  $fifth_buzzyvisitorcitypercent=($fifth_buzzyvisitorcitycount/$countvisits)*100;
	  }
	   /* City with fifth most website visitors - --------------- END */
   /* Select  total visits by cities --------------- END*/
 
	  
	  $base = strtotime(date('Y-m',time()) . '-01 00:00:01');
	  /* Month and year 0 months ago from now --------------- START */
	  $month0monthago = date("m", strtotime("0 month", $base));	
      $year0monthago = date("Y", strtotime("0 month", $base));	
	   /* Month and year 0 months ago from now --------------- END */
	  
	  /* Month and year 1months ago from now --------------- START */
	  $month1monthago = date("m", strtotime("-1 month", $base));	
      $year1monthago = date("Y", strtotime("-1 month", $base));	
      /* Month and year 1 months ago from now --------------- END */
	  
	  /* Month and year 2 months ago from now --------------- START */
	  $month2monthago = date("m", strtotime("-2 month", $base));	
      $year2monthago = date("Y", strtotime("-2 month", $base));	
      /* Month and year 2 months ago from now --------------- END */
	   
	  /* Month and year 3 months ago from now --------------- START */
	  $month3monthago = date("m", strtotime("-3 month", $base));	
      $year3monthago = date("Y", strtotime("-3 month", $base));	
      /* Month and year 3 months ago from now --------------- END */
	  
	  /* Month and year 4 months ago from now --------------- START */
	  $month4monthago = date("m", strtotime("-4 month", $base));	
      $year4monthago = date("Y", strtotime("-4 month", $base));	
      /* Month and year 4 months ago from now --------------- END */
	  
	  /* Month and year 5 months ago from now --------------- START */
	  $month5monthago = date("m", strtotime("-5 month", $base));	
      $year5monthago = date("Y", strtotime("-5 month", $base));	
      /* Month and year 5 months ago from now --------------- END */
	  
	  /* Count visitors and visits this month --------------- START */
	  $thismonthago_visitors_query = "SELECT  COUNT(*) as count0monthago,COUNT(DISTINCT buzzyvisitors_ip) as countunique0monthago FROM 
	  buzzyvisitors WHERE YEAR(buzzyvisitors_visitdate)=$year0monthago AND MONTH(buzzyvisitors_visitdate)=$month0monthago";
	  foreach ($connread->query( $thismonthago_visitors_query) as $row) {
     $count0monthago=$row['count0monthago'];
	 $countunique0monthago=$row['countunique0monthago'];
      }	  
	  /* Count visitors and visits this month --------------- END*/
	  
	  /* Count visitors from 1 month ago --------------- START */
	  $onemonthago_visitors_query = "SELECT  COUNT(*) as count1monthago,COUNT(DISTINCT buzzyvisitors_ip) as countunique1monthago FROM 
	  buzzyvisitors WHERE YEAR(buzzyvisitors_visitdate)=$year1monthago AND MONTH(buzzyvisitors_visitdate)=$month1monthago";
	  foreach ($connread->query( $onemonthago_visitors_query) as $row) {
     $count1monthago=$row['count1monthago'];
	 $countunique1monthago=$row['countunique1monthago'];
      }
      /* Count visitors from 1 month ago --------------- END */	

	  /* Count visitors from 2 month ago --------------- START */
	  $twomonthago_visitors_query = "SELECT  COUNT(*) as count2monthago,COUNT(DISTINCT buzzyvisitors_ip) as countunique2monthago FROM 
	  buzzyvisitors WHERE YEAR(buzzyvisitors_visitdate)=$year2monthago AND MONTH(buzzyvisitors_visitdate)=$month2monthago";
	  foreach ($connread->query( $twomonthago_visitors_query) as $row) {
     $count2monthago=$row['count2monthago'];
	 $countunique2monthago=$row['countunique2monthago'];
      }	 
	  /* Count visitors from 2 month ago --------------- END */
	  
	  /* Count visitors from 3 month ago --------------- START */
	 $threemonthago_visitors_query = "SELECT  COUNT(*) as count3monthago,COUNT(DISTINCT buzzyvisitors_ip) as countunique3monthago FROM 
	 buzzyvisitors WHERE YEAR(buzzyvisitors_visitdate)=$year3monthago AND MONTH(buzzyvisitors_visitdate)=$month3monthago";
	  foreach ($connread->query( $threemonthago_visitors_query) as $row) {
     $count3monthago=$row['count3monthago'];
	 $countunique3monthago=$row['countunique3monthago'];
      }
	  /* Count visitors from 3 month ago --------------- START */
	  
	  /* Count visitors from 4 month ago --------------- START */
	 $fourmonthago_visitors_query = "SELECT  COUNT(*) as count4monthago,COUNT(DISTINCT buzzyvisitors_ip) as countunique4monthago FROM 
	 buzzyvisitors WHERE YEAR(buzzyvisitors_visitdate)=$year4monthago AND MONTH(buzzyvisitors_visitdate)=$month4monthago";
	 foreach ($connread->query( $fourmonthago_visitors_query) as $row) {
     $count4monthago=$row['count4monthago'];
	 $countunique4monthago=$row['countunique4monthago'];
      }
	  /* Count visitors from 4 month ago --------------- START */
	  
	 /* Count visitors from 5 month ago --------------- START */
	 $fivemonthago_visitors_query = "SELECT  COUNT(*) as count5monthago,COUNT(DISTINCT buzzyvisitors_ip) as countunique5monthago FROM 
	 buzzyvisitors WHERE YEAR(buzzyvisitors_visitdate)=$year5monthago AND MONTH(buzzyvisitors_visitdate)=$month5monthago";
	 foreach ($connread->query( $fivemonthago_visitors_query) as $row) {
     $count5monthago=$row['count5monthago'];
	 $countunique5monthago=$row['countunique5monthago'];
      }
	  /* Count visitors from 5 month ago --------------- START */
	  
	  
	  $baseday = strtotime(date('Y-m-d',time()) . '-01 00:00:01');
	  /* Day and month 0 days ago from now --------------- START */
	  $day0daysago = date("d", strtotime("0 day",$baseday ));	
	  $months0daysago = date("m", strtotime("0 day",$baseday ));	
	   /* Day and month 0 days ago from now --------------- END */
	  
	  /* Day and month 1 days ago from now --------------- START */
	  $day1daysago = date("d", strtotime("-1 day",$baseday ));	
	  $months1daysago = date("m", strtotime("-1 day",$baseday ));	
	   /* Day and month 1 days ago from now --------------- END */
	   
	  /* Day and month 2 days ago from now --------------- START */
	  $day2daysago = date("d", strtotime("-2 day",$baseday ));	
	  $months2daysago = date("m", strtotime("-2 day",$baseday ));	
	   /* Day and month 2 days ago from now --------------- END */
	   
	  /* Day and month 3 days ago from now --------------- START */
	  $day3daysago = date("d", strtotime("-3 day",$baseday ));	
	  $months3daysago = date("m", strtotime("-3 day",$baseday ));	
	  /* Day and month 3 days ago from now --------------- END */
	  
	  /* Day and month 4 days ago from now --------------- START */
	  $day4daysago = date("d", strtotime("-4 day",$baseday ));	
	  $months4daysago = date("m", strtotime("-4 day",$baseday ));	
	   /* Day and month 4 days ago from now --------------- END */
	   
	   /* Day and month 5 days ago from now --------------- START */
	  $day5daysago = date("d", strtotime("-5 day",$baseday ));	
	  $months5daysago = date("m", strtotime("-5 day",$baseday ));	
	   /* Day and month 5 days ago from now --------------- END */
	   
	   /* Day and month 6 days ago from now --------------- START */
	  $day6daysago = date("d", strtotime("-6 day",$baseday ));	
	  $months6daysago = date("m", strtotime("-6 day",$baseday ));	
	   /* Day and month 6 days ago from now --------------- END */
	   
	  /* Day and month 7 days ago from now --------------- START */
	  $day7daysago = date("d", strtotime("-7 day",$baseday ));	
	  $months7daysago = date("m", strtotime("-7 day",$baseday ));	
	   /* Day and month 7 days ago from now --------------- END */
	   
	   
	  /* Count visitors from today --------------- START */
	  $today_visitors_query = "SELECT  COUNT(*) as counttoday,COUNT(DISTINCT buzzyvisitors_ip) as countuniquetoday FROM 
	  buzzyvisitors WHERE MONTH(buzzyvisitors_visitdate)=$months0daysago AND DAY(buzzyvisitors_visitdate)=$day0daysago";
	  foreach ($connread->query( $today_visitors_query) as $row) {
     $counttoday=$row['counttoday'];
	 $countuniquetoday=$row['countuniquetoday'];
      }
      /* Count visitors from today --------------- END */	
	  
	  /* Count visitors from 1 day ago --------------- START */
	  $onedaysago_visitors_query = "SELECT  COUNT(*) as count1daysago,COUNT(DISTINCT buzzyvisitors_ip) as countunique1daysago FROM 
	  buzzyvisitors WHERE MONTH(buzzyvisitors_visitdate)=$months1daysago AND DAY(buzzyvisitors_visitdate)=$day1daysago";
	  foreach ($connread->query($onedaysago_visitors_query) as $row) {
     $count1daysago=$row['count1daysago'];
	 $countunique1daysago=$row['countunique1daysago'];
      }
      /* Count visitors from 1 day ago --------------- END */	
	  
	   /* Count visitors from 2 day ago --------------- START */
	  $twodaysago_visitors_query = "SELECT  COUNT(*) as count2daysago,COUNT(DISTINCT buzzyvisitors_ip) as countunique2daysago FROM 
	  buzzyvisitors WHERE MONTH(buzzyvisitors_visitdate)=$months2daysago AND DAY(buzzyvisitors_visitdate)=$day2daysago ";
	  foreach ($connread->query($twodaysago_visitors_query) as $row) {
     $count2daysago=$row['count2daysago'];
	 $countunique2daysago=$row['countunique2daysago'];
      }
      /* Count visitors from 2 day ago --------------- END */	
	  
	  /* Count visitors from 3 day ago --------------- START */
	  $threedaysago_visitors_query = "SELECT  COUNT(*) as count3daysago,COUNT(DISTINCT buzzyvisitors_ip) as countunique3daysago FROM 
	  buzzyvisitors WHERE MONTH(buzzyvisitors_visitdate)=$months3daysago AND DAY(buzzyvisitors_visitdate)=$day3daysago ";
	  foreach ($connread->query($threedaysago_visitors_query) as $row) {
     $count3daysago=$row['count3daysago'];
	 $countunique3daysago=$row['countunique3daysago'];
      }
      /* Count visitors from 3 day ago --------------- END */	
	  
	   /* Count visitors from 4 day ago --------------- START */
	  $fourdaysago_visitors_query = "SELECT  COUNT(*) as count4daysago,COUNT(DISTINCT buzzyvisitors_ip) as countunique4daysago FROM 
	  buzzyvisitors WHERE MONTH(buzzyvisitors_visitdate)=$months4daysago AND DAY(buzzyvisitors_visitdate)=$day4daysago ";
	  foreach ($connread->query($fourdaysago_visitors_query) as $row) {
     $count4daysago=$row['count4daysago'];
	 $countunique4daysago=$row['countunique4daysago'];
      }
      /* Count visitors from 4 day ago --------------- END */ 
	  
	   /* Count visitors from 5 day ago --------------- START */
	  $fivedaysago_visitors_query = "SELECT  COUNT(*) as count5daysago,COUNT(DISTINCT buzzyvisitors_ip) as countunique5daysago FROM 
	  buzzyvisitors WHERE MONTH(buzzyvisitors_visitdate)=$months5daysago AND DAY(buzzyvisitors_visitdate)=$day5daysago ";
	  foreach ($connread->query($fivedaysago_visitors_query) as $row) {
     $count5daysago=$row['count5daysago'];
	 $countunique5daysago=$row['countunique5daysago'];
      }
      /* Count visitors from 5 day ago --------------- END */ 
	  
	   /* Count visitors from 6 day ago --------------- START */
	  $sixdaysago_visitors_query = "SELECT  COUNT(*) as count6daysago,COUNT(DISTINCT buzzyvisitors_ip) as countunique6daysago FROM 
	  buzzyvisitors WHERE MONTH(buzzyvisitors_visitdate)=$months6daysago AND DAY(buzzyvisitors_visitdate)=$day6daysago ";
	  foreach ($connread->query($sixdaysago_visitors_query) as $row) {
     $count6daysago=$row['count6daysago'];
	 $countunique6daysago=$row['countunique6daysago'];
      }
      /* Count visitors from 6 day ago --------------- END */ 
	  
	   /* Count visitors from 7 day ago --------------- START */
	  $sevendaysago_visitors_query = "SELECT  COUNT(*) as count7daysago,COUNT(DISTINCT buzzyvisitors_ip) as countunique7daysago FROM 
	  buzzyvisitors WHERE MONTH(buzzyvisitors_visitdate)=$months7daysago AND DAY(buzzyvisitors_visitdate)=$day7daysago ";
	  foreach ($connread->query($sevendaysago_visitors_query) as $row) {
     $count7daysago=$row['count7daysago'];
	 $countunique7daysago=$row['countunique7daysago'];
      }
      /* Count visitors from  7  day ago --------------- END */ 