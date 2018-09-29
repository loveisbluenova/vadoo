$(function() {
$(".voteup").click(function() {
var ID = $(this).attr("id");
$.ajax({
		type: "POST",
        url: "thumb-up.php",
        data:"buzzynews_id="+ ID, 
         cache: false,		 
  success: function(data){
$(".vote-container").html("<span class='confirm'>&#10004; <?php echo $you_have_voted_succesfully;?></span>");
  }
 
 });
return false;
	});
$(".votedown").click(function() {
var ID = $(this).attr("id");
$.ajax({
		type: "POST",
        url: "thumb-down.php",
        data:"buzzynews_id="+ ID, 
         cache: false,		 
  success: function(data){
$(".vote-container").html("<span class='confirm'> &#10004; <?php echo you_have_voted_succesfully;?></span>");
  }
 
 });
return false;
	});	
	$(".voted").click(function() {
var ID = $(this).attr("id");
$.ajax({
         cache: false,		 
  success: function(data){
$(".vote-container").html("<span class='reject'> &#10006; <?php echo $you_have_already_voted;?></span>");
  }
 
 });
return false;
	});	
	});