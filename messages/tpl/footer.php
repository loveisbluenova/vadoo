<!-- modal -->
<div id="generalModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo $close;?></span></button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $close;?></button>
          </div>
    </div>
  </div>
</div>

<?php $timestamp = time(); ?>
<input type="hidden" id="upload-tm" value="<?php echo $timestamp; ?>" />
<input type="hidden" id="upload-token" value="<?php echo md5('S4lt' . $timestamp); ?>" />


<script src="js/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="js/jquery.uploadify.min.js" type="text/javascript"></script>
<script src="js/lightbox.min.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
/* jquery chat V 1.5 by Paulo Regina (www.pauloreg.com) */

	$.base_url = '';
	
	$.ajaxError = '<?php echo $failed_proccess; ?>';
	$.sendButton = '<?php echo $send; ?>';
	$.emptyBox = '<?php echo $please_write; ?>';
	$.noMessages = '<?php echo $failed_proccess; ?>';
	$.noContacts = '<?php echo $no_users; ?>';
	$.unreadMessages = '<?php echo $unread; ?>';
	$.userTypes = '<?php echo $typing; ?>';
	
	$.pageTitle = '<?php echo $messagges; ?>';
	
	$.uploadLimit = '20MB';
	
	$.enterIsSend = false;
			
	// Scroll
	$("ul#messages-stack-list, #text-messages-request, #text-messages").niceScroll({
		cursorcolor: "#2f2e2e",
		cursoropacitymax: 0.6,
		boxzoom: false,
		touchbehavior: true
	});
	
	// Tab Switching
	$('#tabs-control').on("click", "#tab-contacts", function(e) {
		contacts_tab();
		e.preventDefault();
	})
	
	$('#tabs-control').on("click", "#tab-chats", function(e) {
		chat_tab();
		e.preventDefault();
	})
	
	// Contacts load more
	$('#messages-stack-list').off('click').on("click", ".load-more-contacts", function() {
		var ID = $(this).attr("id");
		var UID = $(this).attr("rel");
		var URL = $.base_url + 'ajax/contacts_more_ajax.php';
		var R_URL = $.base_url + 'ajax/refresh_unreadMessages_ajax.php';
		var dataString = "lastid=" + encodeURIComponent(ID) + "&uid="+ encodeURIComponent(UID) + "&tab="+ encodeURIComponent($.tab);
		if (ID) {
			$.ajax({
				type: "POST",
				url: URL,
				data: {lastid: ID, uid: UID, tab: $.tab},
				cache: false,
				beforeSend: function() {
					$("#more-contacts" + ID).html('<img src="img/ajaxloader.gif" />');
				},
				error: function() { $('#loadingDiv').hide(); $('#errorDiv').html('<p>'+$.ajaxError+'</p>'); },
				success: function(html) {
					$('#loadingDiv').hide();
					$("div#more-contacts"+ID+".more-contacts-parent").remove();
					$("#messages-stack-list").append(html);
					update_unMsg_counter(R_URL, dataString, UID, '');
					title_unread_counter();
				}
			});
		} else {
			$("#more-contacts").html($.noContacts); // no results
		}
		return false;
	});

	// Messages System
	$('#messages-stack-list').on("click", "li.prepare-message", function() {
		var ID = $(this).attr("id");
		var URL = $.base_url + 'ajax/request_chat_ajax.php';
		var R_URL = $.base_url + 'ajax/refresh_unreadMessages_ajax.php';
		
		var dataString = 'id='+encodeURIComponent(ID);
		
		$.ajax({
            type: "POST",
            url: URL,
            data: {id: ID},
            cache: false,
			beforeSend: function() { $('#loadingDiv').show(); },
			error: function() { $('#loadingDiv').hide(); $('#errorDiv').html('<p>'+$.ajaxError+'</p>'); },
            success: function(html) {
				$('#loadingDiv').hide();
				$('#contacts-search-input').val("");
				$(".active-message").removeClass("active-message");
				$("li#"+ID+".prepare-message").focus().addClass("active-message");
				$("#text-messages-request").html(html);
				$("#text-messages").attr("rel", ID);
																
				if($.tab == 'contacts')
				{
					cloned_item = $("li#"+ID+".prepare-message").html();
				
					$.when(chat_tab()).done(function() {
						next_tab = 'chats';
						tab_id = ID;
					});
				}
				
				update_unMsg_counter(R_URL, dataString, ID, '');
				title_unread_counter();
            }
        });
		return false;
	});
	
	// Messages System - type message, send (modified since 1.1)
	$("#text-messages-request").on("focus", "textarea.type-a-message-box", function() { 
		var ID = $(this).attr("id");
		var URL = $.base_url + 'ajax/add_chat_ajax.php'; 
		
		$('div.message-btn-target').html('<a href="#" id="'+ID+'" class="btn btn-default btn-sm send-message"><i class="glyphicon glyphicon-send"></i> '+$.sendButton+'</a>');
		$('#type-a-message').remove();	
		
		user_is_typing(this, ID);
		
		$(this).on('blur', function() {
			stop_type_status();	
		});
		
		// Input Handler
		if($.enterIsSend == true)
		{
			$(this).keypress(function(e)
			{
				if(e.which == 13)
				{
					send_message(ID, URL);
				}
			});
			
			$("a.send-message").on("click", function() {
				send_message(ID, URL);	
			});
			
		} else {
			$("a.send-message").on("click", function() {
				send_message(ID, URL);	
			});
		}
		return false;		
	});
	
	function send_message(ID, URL)
	{
		var textarea = $('textarea.type-a-message-box').val();
		if ($.trim(textarea).length == 0) 
		{
			alert($.emptyBox);
		} else {
			$.ajax({
				type: "POST",
				url: URL,
				data: {id: ID, message: textarea},
				cache: false,
				beforeSend: function() { $('#loadingDiv').show(); },
				error: function() { $('#loadingDiv').hide(); $('#errorDiv').html('<p>'+$.ajaxError+'</p>'); },
				success: function(html) {
					$('#loadingDiv').hide();
					$("p.no-messages").remove();
					$("#text-messages-request").html(html);
					$("#text-messages").attr("rel", ID);
					stop_type_status();
				}
			});
		}
	}
		
	// Messages System - load more messages
	$('body').off('click').on("click", ".load-more-messages", function() {
		var ID = $(this).attr("id");
		var UID = $(this).attr("rel");
		var URL = $.base_url + 'ajax/chat_more_ajax.php';
		var R_URL = $.base_url + 'ajax/refresh_unreadMessages_ajax.php';
		var dataString = "lastid=" + encodeURIComponent(ID) + "&uid="+ encodeURIComponent(UID);
		if (ID) {
			$.ajax({
				type: "POST",
				url: URL,
				data: {lastid: ID, uid: UID},
				cache: false,
				beforeSend: function() {
					$("#more" + ID).html('<img src="img/ajaxloader.gif" />');
				},
				error: function() { $('#loadingDiv').hide(); $('#errorDiv').html('<p>'+$.ajaxError+'</p>'); },
				success: function(html) {
					$('#loadingDiv').hide();
					$("div#more"+ID+".more-messages-parent").remove();
					$("#text-messages").append(html);
					update_unMsg_counter(R_URL, dataString, UID, '');
					title_unread_counter();
				}
			});
		} else {
			$("#more").html($.noMessages); // no results
		}
		return false;
	});
	
	// Messages System - filter
	$('#contacts-search').on("click", "#contacts-search-input", function() {
		var oldhtml = $("ul#messages-stack-list").html();
		$('#tab-chats').removeClass('active-tab');
		$('#tab-contacts').removeClass('active-tab');
		
		$(this).keyup(function() {
			var filterbox = $(this).val();
			var URL = $.base_url + 'ajax/chat_filter_ajax.php';
			if ($.trim(filterbox).length > 0) {
				$.ajax({
					type: "POST",
					url: URL,
					data: {filterword: filterbox},
					cache: false,
					beforeSend: function() { $('#loadingDiv').show(); },
					error: function() { $('#loadingDiv').hide(); $('#errorDiv').html('<p>'+$.ajaxError+'</p>'); },
					success: function(html) {
						$('#loadingDiv').hide();
						$("ul#messages-stack-list").html(html).show();
					}
				});
			}
			return false;
		});
		$("ul#messages-stack-list").mouseup(function() {
			return false
		});
		$(document).mouseup(function() {
			$('#contacts-search-input').val("");
			$.tab = 'chats';
			$('#tab-chats').addClass('active-tab');
			$('#tab-contacts').removeClass('active-tab');
		});
	});
	
	// Messages System - remove
	$('#text-messages-request').off("click").on("click", ".remove-message", function() {
		var ID = $(this).attr("id");
		var UID = $(this).data("user");
		var URL = $.base_url + 'ajax/chat_remove_ajax.php';
		$.ajax({
				type: "POST",
				url: URL,
				data: {id: ID, uid: UID},
				cache: false,
				beforeSend: function() { $('#loadingDiv').show(); },
				error: function() { $('#loadingDiv').hide(); $('#errorDiv').html('<p>'+$.ajaxError+'</p>'); },
				success: function(html) {
					$('#loadingDiv').hide();
					$("#u_msg"+ID).remove();
					var value = parseInt($('span#count-old-messages').text());
					$('span#count-old-messages').html(value-1);
					if(value == 1)
					{
						$(".more-messages-parent").fadeOut(100).remove();
					}
				}
			});
		title_unread_counter();
		return false;
	})
	
	// Messages Sytem - live unread message to the title (since 1.5)
	function title_unread_counter() {
		var URL = $.base_url + 'ajax/ajax_total_unread.php';
		var title = $.pageTitle;
		$.ajax({
				type: "POST",
				url: URL,
				data: {total_unread: 'true'},
				cache: false,
				success: function(res) {
					var sus = res+title;
					$('title').html(sus);
				}
			});
		return false;
	}
	
	function clean_modal()
	{
		$('.modal-header h4.modal-title').html('');
		$('.modal-body').html('');
	}	
	
	// Emoticons
	$('body').on('click', '#emoticons', function() {
		$('.modal-header h4.modal-title').html('<?php echo $emoticons;?>');
		$('.modal-body').html(
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/smile.png" id="sad" data-value=":)">' +
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/sad.png" id="smile" data-value=":(">' +
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/bla.png" id="bla" data-value=":P">'	 +	
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/conf.png" id="conf" data-value=":O">' +
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/love.png" id="love" data-value=":love:">' +
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/smilebig.png" id="smilebig" data-value=":D">'	+	
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/sleep.png" id="santa" data-value=":sleep:">'	 +		
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/shy.png" id="santa" data-value=":shy:">'	 +				
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/coffee.png" id="smilebig" data-value=":coffee:">' +
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/burger.png" id="smilebig" data-value=":burger:">'	+	
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/cake.png" id="smilebig" data-value=":cake:">'	 +
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/santa1.png" id="santa" data-value=":santa:">'	 +	
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/apple.png" id="santa" data-value=":apple:">'	 +	
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/banana.png" id="santa" data-value=":banana:">'	 +	
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/lemon.png" id="santa" data-value=":lemon:">'	 +	
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/melon.png" id="santa" data-value=":melon:">'	 +		
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/grape.png" id="santa" data-value=":grape:">'	 +				
			'<img class="emoticons" style="margin-right:20px!important; margin-bottom:20px!important;" src="img/emots/char.png" id="santa" data-value=":char:">'				
		);
		$('#generalModal').modal('show');
		$(".emoticons").on('click', function()
		{
			var id = $(this).attr('id');
			var image_url = $(this).data('value');
			var current_value = $("textarea.type-a-message-box").val();
			
			$("textarea.type-a-message-box").val(current_value+image_url);
			$('#generalModal').modal('hide');
			
			// clean stuff to avoid duplication
			clean_modal();
		})	
	})
	
		$('body').on('click', '#animals', function() {
		$('.modal-header h4.modal-title').html('Funny animals');
		$('.modal-body').html(
			'<img class="emoticons" style="margin-right:10px!important; width:56px!important; height:56px!important; margin-bottom:20px!important;" src="https://www.allsmileys.com/files/smiley-central-animals/5132.gif" id="an1" data-value=":an1:">' +
			'<img class="emoticons" style="margin-right:10px!important; width:56px!important; height:56px!important;  margin-bottom:20px!important;" src="https://www.allsmileys.com/files/smiley-central-animals/5123.gif" id="an2" data-value=":an2:">' +
			'<img class="emoticons" style="margin-right:10px!important; width:56px!important; height:56px!important;  margin-bottom:20px!important;" src="https://www.allsmileys.com/files/smiley-central-animals/5131.gif" id="an3" data-value=":an3:">' +
			'<img class="emoticons" style="margin-right:10px!important; width:56px!important; height:56px!important;  margin-bottom:20px!important;" src="https://www.allsmileys.com/files/smiley-central-animals/5128.gif" id="an4" data-value=":an4:">'	 +	
			'<img class="emoticons" style="margin-right:10px!important; width:56px!important; height:56px!important;  margin-bottom:20px!important;" src="https://www.allsmileys.com/files/smiley-central-animals/5136.gif" id="an5" data-value=":an5:">'	+	
			'<img class="emoticons" style="margin-right:10px!important; width:56px!important; height:56px!important;   margin-bottom:20px!important;" src="https://www.allsmileys.com/files/smiley-central-animals/5122.gif" id="an6" data-value=":an6:">'	+		
			'<img class="emoticons" style="margin-right:10px!important; width:56px!important; height:56px!important;  margin-bottom:20px!important;" src="https://www.allsmileys.com/files/smiley-central-animals/5133.gif" id="an7" data-value=":an7:">'	+		
			'<img class="emoticons" style="margin-right:10px!important; width:56px!important; height:56px!important;    margin-bottom:20px!important;" src="https://www.allsmileys.com/files/smiley-central-animals/5127.gif" id="an8" data-value=":an8:">'	+	
			'<img class="emoticons" style="margin-right:10px!important; width:56px!important; height:56px!important;    margin-bottom:20px!important;" src="https://www.allsmileys.com/files/smiley-central-animals/5121.gif" id="an9" data-value=":an9:">'	+	
			'<img class="emoticons" style="margin-right:10px!important; width:56px!important; height:56px!important;  margin-bottom:20px!important;" src="https://www.allsmileys.com/files/smiley-central-animals/5124.gif" id="an10" data-value=":an10:">'	 +
		'<img class="emoticons" style="margin-right:10px!important; width:56px!important; height:56px!important;  margin-bottom:20px!important;" src="https://www.allsmileys.com/files/smiley-central-animals/5126.gif" id="an10" data-value=":an11:">'	+						
		'<img class="emoticons" style="margin-right:10px!important; width:56px!important; height:56px!important;  margin-bottom:20px!important;" src="https://www.allsmileys.com/files/smiley-central-animals/5120.gif" id="an10" data-value=":an12:">'
		);
		$('#generalModal').modal('show');
		$(".emoticons").on('click', function()
		{
			var id = $(this).attr('id');
			var image_url = $(this).data('value');
			var current_value = $("textarea.type-a-message-box").val();
			
			$("textarea.type-a-message-box").val(current_value+image_url);
			$('#generalModal').modal('hide');
			
			// clean stuff to avoid duplication
			clean_modal();
		})	
	})
	
	$('body').on('click', '#love', function() {
		$('.modal-header h4.modal-title').html('Love smileys');
		$('.modal-body').html(
			'<div class="clearfix"></div><div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/love/couples/couples.gif" id="an1" data-value=":love1:"></div>' +
            '<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/love/couples/on-the-cheek.gif" id="an1" data-value=":love2:"></div>' +
            '<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/love/kisses/kisses.gif" id="an1" data-value=":love3:"></div>' +
			'<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/love/kisses/valentine-butterfly-kiss.gif" id="an1" data-value=":love4:"></div>' + 
			'<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/love/kisses/blow-kiss.gif" id="an1" data-value=":love5:"></div>' +
			'<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/love/hearts-2/dating.gif" id="an1" data-value=":love6:"></div>' +
			'<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/love/hearts-2/i-love-you.gif" id="an1" data-value=":love7:"></div>' +			
			'<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style="width:48px!important;" src="https://www.myemoticons.com/images/love/hearts-2/cupid.gif" id="an1" data-value=":love8:"></div>' +
			'<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/love/hearts-3/i-love-you.gif" id="an1" data-value=":love9:"></div>' +			
			'<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/love/hearts-3/call-me.gif" id="an1" data-value=":love10:"></div>' +
			'<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style="width:48px!important;" src="https://www.myemoticons.com/images/love/hearts-3/burning-heart.gif" id="an1" data-value=":love11:"></div>' +
			'<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style="width:48px!important;" src="https://www.myemoticons.com/images/love/other/hi-there-sweetheart.gif" id="an1" data-value=":love12:"></div>' +
			'<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style="width:48px!important;" src="https://www.myemoticons.com/images/love/other/love-sick.gif" id="an1" data-value=":love13:"></div>' +
			'<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style="width:48px!important;" src="https://www.myemoticons.com/images/love/hearts-1/blings.gif" id="an1" data-value=":love14:"></div>' +
			'<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style="width:48px!important;" src="https://www.myemoticons.com/images/love/hearts-1/yowza.gif" id="an1" data-value=":love15:"></div>' +
			'<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/love/hearts-1/valentine-heart-bottle.gif" id="an1" data-value=":love16:"></div><div class="clearfix"></div>'
			);
		$('#generalModal').modal('show');
		$(".emoticons").on('click', function()
		{
			var id = $(this).attr('id');
			var image_url = $(this).data('value');
			var current_value = $("textarea.type-a-message-box").val();
			
			$("textarea.type-a-message-box").val(current_value+image_url);
			$('#generalModal').modal('hide');
			
			// clean stuff to avoid duplication
			clean_modal();
		})	
	})	

	$('body').on('click', '#sports', function() {
		$('.modal-header h4.modal-title').html('Sport smileys');
		$('.modal-body').html(
			'<div class="clearfix"></div><div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/sports/basketball/basketball.gif" id="an1" data-value=":sport1:"></div>' +
            '<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/sports/basketball/basketball-1.gif" id="an1" data-value=":sport2:"></div>' +
            '<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/sports/olympics/soccer.gif" id="an1" data-value=":sport3:"></div>' +
            '<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/sports/olympics/torch.gif" id="an1" data-value=":sport4:"></div>' +
            '<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/sports/olympics/slugger-1.gif" id="an1" data-value=":sport5:"></div>' +				
            '<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/sports/tennis/tennis.gif" id="an1" data-value=":sport6:"></div>' +	
            '<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/sports/water/scuba-diver.gif" id="an1" data-value=":sport7:"></div>' +				
			'<div style="margin-right:10px!important; float:left!important; width:56px!important; height:56px!important;"><img class="emoticons" style=" width:48px!important;" src="https://www.myemoticons.com/images/sports/golf/golfer.gif" id="an1" data-value=":sport8:"></div><div class="clearfix"></div>'
			);
		$('#generalModal').modal('show');
		$(".emoticons").on('click', function()
		{
			var id = $(this).attr('id');
			var image_url = $(this).data('value');
			var current_value = $("textarea.type-a-message-box").val();
			
			$("textarea.type-a-message-box").val(current_value+image_url);
			$('#generalModal').modal('hide');
			
			// clean stuff to avoid duplication
			clean_modal();
		})	
	})		
	
	function uploadify_init(extension, attachext, upType)
	{
		var current_value = $("textarea.type-a-message-box").val();
		var tm = $('input#upload-tm').val();
		$(function() {
			$('#file_upload').uploadify({
				'fileSizeLimit' : $.uploadLimit,
				'fileTypeExts' : extension,
				'formData'     : {
					'timestamp' : tm,
					'token'     : $('input#upload-token').val(),
					'upType'    : upType
				},
				'swf'      : 'includes/upload/uploadify.swf',
				'uploader' : 'includes/upload/uploadify.php',
				'onUploadSuccess' : function(file, data, response) 
				{
					$("textarea.type-a-message-box").val(current_value+'['+attachext+'-'+tm+file.name+']');
					send_message($('textarea.type-a-message-box').attr('id'), $.base_url + 'ajax/add_chat_ajax.php');
				},
				'onUploadError' : function(file, errorCode, errorMsg, errorString) {
            		alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
        		} 
			});
		});	
	}
	
	// Send Photo
	$('body').on('click', '#send-photo', function() {
		$('.modal-header h4.modal-title').html('<?php echo $attach_photos;?>');
		$('.modal-body').html('<input type="file" name="file_upload" id="file_upload" /><br /><br /><p>Note: <?php echo $attach_files;?> .gif, .png, .jpg <?php echo $limited_to;?> '+$.uploadLimit+'<p/>');
		uploadify_init('*.gif; *.jpg; *.png', 'photoAttachment', 'images');
		$('#generalModal').modal('show');
		$('.modal-footer').html('');
	});
	
	// Send File
	$('body').on('click', '#send-file', function() {
		$('.modal-header h4.modal-title').html('<?php echo $attach_files;?>');
		$('.modal-body').html('<input type="file" name="file_upload" id="file_upload" /><br /><br /><p>Note: <?php echo $allowed_files;?> .zip, .pdf, .doc, .ptt, .txt, .xls, .docx, .xlsx, .pptx <?php echo $limited_to;?> '+$.uploadLimit+'<p/>');
		uploadify_init('*.zip; *.pdf; *.doc; *.ppt; *.xls; *.txt; *.docx; *.xlsx; *.pptx', 'fileAttachment', 'files');
		$('#generalModal').modal('show');
		$('.modal-footer').html('');
	});
	
	// Send Location
	$('body').on('click', '#send-location', function() {
		$('.modal-header h4.modal-title').html('Google Maps Location');
		$('.modal-body').html(
			'<p><?php echo $insert_coordinate;?>:</p>' +
			'<div class="form-group">' +
			'<div class="input-group">' +
				'<div class="input-group-addon">Latitude</div>' +
				'<input type="text" class="form-control input-sm" id="maps_latitude">' + 
			'</div>' +
			'</div>' +
			'<div class="form-group">' +
			'<div class="input-group">' +
				'<div class="input-group-addon">Longitude</div>' +
				'<input type="text" class="form-control input-sm" id="maps_longitude">' +
			'</div>' +
			'</div>'
		);
		
		$('.modal-footer').html('<input type="buttun" id="send-location-btn" class="btn btn-primary" value="<?php echo $send;?>" />');
				
		$('#generalModal').modal('show');
		
		$('#send-location-btn').on('click', function() {
			
			var this_position = '[Location='+$('#maps_latitude').val() + ', ' + $('#maps_longitude').val() +']';

			$("textarea.type-a-message-box").val(this_position);
			send_message($('textarea.type-a-message-box').attr('id'), $.base_url + 'ajax/add_chat_ajax.php');
		})

	});
		
// Last Seen
function last_seen()
{
	$(window).bind("beforeunload", function(){
		$.post($.base_url + 'ajax/ajax_last_seen.php', 'offline=true', function(response){}); 	
	}); 
	
	$(window).focus(function() {
		$.post($.base_url + 'ajax/ajax_last_seen.php', 'offline=false', function(response){}); 
	});
}
	
// Update message counter
function update_unMsg_counter(R_URL, dataString, ID, type)
{
	$.post(R_URL, dataString, function(response) 
	{
		$("#unreader-count-"+ID).html(response);
		var counter = $("#unreader-count-"+ID).text();
		if(counter.length == 0) 
		{
			if(type == 'realtime')
			{
				if(counter !== response)
				{
					$("#unreader-counter"+ID).html($.unreadMessages+' <span class="label label-warning" id="unreader-count-'+ID+'">1</span>');	
				}
			} else {
				$("#unreader-counter"+ID).fadeOut(100).text('');			
			}
		}
	});		
}

function stop_type_status()
{
	var URL = $.base_url + 'ajax/chat_type_ajax.php';
	$.post(URL, 'status=stopped', function(res) {});	
}

// User is typing (since 1.1)
function user_is_typing(type, id)
{
	var URL = $.base_url + 'ajax/chat_type_ajax.php';
	var timer, timeout = 350;
        
    $(type).keyup(function()
    {
        if (typeof timer != undefined)
            clearTimeout(timer);

         $.post(URL, 'status=typing_'+id, function(res) {});
		
         timer = setTimeout(function()
         {
			$.post(URL, 'status=stopped', function(res) {});
         }, timeout);
    });	
}

// User typing status (looks who is typing) (since 1.1)
function type_status(id)
{
	var URL = $.base_url + 'ajax/chat_type_ajax.php';
	
	$.post(URL, 'id='+id, function(res) 
	{ 
		if(res == id)
		{ 
			$('#type-status-'+id).html($.userTypes).css("color", "#009900");
		}
		
		if(res == 'stopped')
		{
			$('#type-status-'+id).html("");
		}
	});
}

// Chat tab function (since 1.1)
function chat_tab()
{
	$.tab = 'chats';
	
	$('#tab-chats').addClass('active-tab');
	$('#tab-contacts').removeClass('active-tab');
	
	var URL = $.base_url + 'ajax/chat_contacts_ajax.php';
	
	$.ajax({
		type: "POST",
		url: URL,
		data: {post_tabs: 'chats'},
		cache: false,
		beforeSend: function() { $('#loadingDiv-chats').show(); },
		error: function() { $('#loadingDiv-chats').hide(); $('#errorDiv').html('<p>'+$.ajaxError+'</p>'); },
		success: function(html) {
			$('#loadingDiv-chats').hide();
			$("#messages-stack-list").html(html);
			
			if(typeof next_tab !== "undefined")
			{
				$("li#"+tab_id+".prepare-message").addClass("active-message");
				if($("li#"+tab_id+".prepare-message").hasClass("active-message") == false)
				{
					$("#no_chat_users_found").remove();
					$.newChat = '<li class="prepare-message border-bottom" id="'+tab_id+'">'+cloned_item+'</li>';
					$("ul#messages-stack-list").append($.newChat);
					$("li#"+tab_id+".prepare-message").addClass("active-message");
				} 
			}
		}
	});	
}

// Contacts Tab (since 1.1)
function contacts_tab()
{
	$.tab = 'contacts';
	
	$('#tab-contacts').addClass('active-tab');
	$('#tab-chats').removeClass('active-tab');
	
	var URL = $.base_url + 'ajax/chat_contacts_ajax.php';

	$.ajax({
		type: "POST",
		url: URL,
		data: {post_tabs: 'contacts'},
		cache: false,
		beforeSend: function() { $('#loadingDiv-contacts').show(); },
		error: function() { $('#loadingDiv-contacts').hide(); $('#errorDiv').html('<p>'+$.ajaxError+'</p>'); },
		success: function(html) {
			$('#loadingDiv-contacts').hide();
			$("#messages-stack-list").html(html);					
		}
	});	
}

// Refresh Chats (since 1.1)
function refresh_chats()
{
	if($('#tab-'+$.tab).hasClass('active-tab'))
	{
		$('#tab-'+$.tab).addClass('active-tab');	
	} else {
		$('#tab-'+$.tab).removeClass('active-tab')		
	}
	
	var URL = $.base_url + 'ajax/chat_contacts_ajax.php';

	$.ajax({
		type: "POST",
		url: URL,
		data: {post_tabs: 'chats'},
		cache: false,
		error: function() { $('#errorDiv').html('<p>'+$.ajaxError+'</p>'); },
		success: function(html) {
			if($('#tab-chats').hasClass('active-tab'))
			{ 
				$("#messages-stack-list").html(html);
				if($.newChat !== undefined)
				{
					$("#no_chat_users_found").remove();
					$("#messages-stack-list").append($.newChat);
					$.newChat = '';
				}
			}					
		}
	});	
}
	
// Realtime chat (since 1.1)
function realtime_chat()
{	
	last_msg_id = $(".msg-div").first().attr("id");
	
	var ID = $("#text-messages").attr("rel");
	
	var R_URL = $.base_url + 'ajax/refresh_unreadMessages_ajax.php';
	var URL = $.base_url + 'ajax/chat_realtime_ajax.php';
	var I_URL = $.base_url + 'ajax/chat_last_id.php';
		
	var dataString = 'id='+encodeURIComponent(ID);
			
	$.post(URL, dataString, function(html) {
		var html_response = $(html);
		var new_msg_id = html_response.attr("id");
		
		if(new_msg_id !== last_msg_id)
		{
			$("#text-messages").prepend(html);
		}
	})
	
	// deal with update counter	and typing status
	$('ul#messages-stack-list li').each(function() {
		cID = $(this).attr('id');
		cString = 'id='+cID;
		type_status(cID);
		update_unMsg_counter(R_URL, cString, cID, 'realtime');
	});
	
	title_unread_counter();
				
	return false;
} 

function google_maps(element, lat, long)
{	
	var position = [lat, long]
	
	function showGoogleMaps() 
	{ 	
		var latLng = new google.maps.LatLng(position[0], position[1]);
	
		var mapOptions = {
			zoom: 16, 
			streetViewControl: false,
			scaleControl: true, 
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			center: latLng
		};
	 
		map = new google.maps.Map(element, mapOptions);
	 
		marker = new google.maps.Marker({
			position: latLng,
			map: map,
			draggable: false,
			animation: google.maps.Animation.DROP
		});
	}
	
	showGoogleMaps();
}

setInterval("realtime_chat()", 1000);
setInterval("refresh_chats()", 2000);
last_seen();

</script>

</body>
</html>