/* jquery chat V 1.5 by Paulo Regina (www.pauloreg.com) */

	$.base_url = '';
	
	$.ajaxError = 'Failed to proccess request';
	$.sendButton = <?php echo $send; ?>;
	$.emptyBox = 'Please write something to send';
	$.noMessages = 'No Messages';
	$.noContacts = 'No Users';
	$.unreadMessages = 'Unread';
	$.userTypes = 'Typing ...';
	
	$.pageTitle = 'Ajax Chat System';
	
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
						$(".more-messages-parent").fadeOut(300).remove();
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
	$('body').on('click', '#emoticonsa', function() {
		$('.modal-header h4.modal-title').html('Emoticons');
		$('.modal-body').html(
			'<img class="emoticons" src="img/emoticons/Angry.png" id="angry" data-value=":@">' +
			'<img class="emoticons" src="img/emoticons/Balloon.png" id="balloon" data-value="[balloon]">' +
			'<img class="emoticons" src="img/emoticons/Big-Grin.png" id="big-grin" data-value="[big-grin]">' +
			'<img class="emoticons" src="img/emoticons/Bomb.png" id="bomb" data-value="[bomb]">' +
			'<img class="emoticons" src="img/emoticons/Broken-Heart.png" id="broken-heart" data-value="[broken-heart]">' +
			'<img class="emoticons" src="img/emoticons/Cake.png" id="cake" data-value="[cake]">' +
			'<img class="emoticons" src="img/emoticons/Cat.png" id="cat" data-value="[cat]">' +
			'<img class="emoticons" src="img/emoticons/Clock.png" id="clock" data-value="[clock]">' +
			'<img class="emoticons" src="img/emoticons/Clown.png" id="clown" data-value="[clown]">' +
			'<img class="emoticons" src="img/emoticons/Cold.png" id="cold" data-value="[cold]">' +
			'<img class="emoticons" src="img/emoticons/Confused.png" id="confused" data-value="[confused]">' +
			'<img class="emoticons" src="img/emoticons/Cool.png" id="cool" data-value="[cool]">' +
			'<img class="emoticons" src="img/emoticons/Crying.png" id="crying" data-value="[crying]">' +
			'<img class="emoticons" src="img/emoticons/Crying2.png" id="crying2" data-value="[crying2]">' +
			'<img class="emoticons" src="img/emoticons/Dead.png" id="dead" data-value="[dead]">' +
			'<img class="emoticons" src="img/emoticons/Devil.png" id="devil" data-value="[devil]">' +
			'<img class="emoticons" src="img/emoticons/Dizzy.png" id="dizzy" data-value="[dizzy]">' +
			'<img class="emoticons" src="img/emoticons/Dog.png" id="dog" data-value="[dog]">' +
			'<img class="emoticons" src="img/emoticons/Don\'t-tell-Anyone.png" id="dont-tell-anyone" data-value="[dont-tell-anyone]">' +
			'<img class="emoticons" src="img/emoticons/Drinks.png" id="drinks" data-value="[drinks]">' +
			'<img class="emoticons" src="img/emoticons/Drooling.png" id="drooling" data-value="[drooling]">' +
			'<img class="emoticons" src="img/emoticons/Flower.png" id="flower" data-value="[flower]">' +
			'<img class="emoticons" src="img/emoticons/Ghost.png" id="ghost" data-value="[ghost]">' +
			'<img class="emoticons" src="img/emoticons/Gift.png" id="gift" data-value="[gift]">' +
			'<img class="emoticons" src="img/emoticons/Girl.png" id="girl" data-value="[girl]">' +
			'<img class="emoticons" src="img/emoticons/Goodbye.png" id="goodbye" data-value="[goodbye]">' +
			'<img class="emoticons" src="img/emoticons/Heart.png" id="heart" data-value="[heart]">' +
			'<img class="emoticons" src="img/emoticons/Hug.png" id="hug" data-value="[hug]">' +
			'<img class="emoticons" src="img/emoticons/Kiss.png" id="kiss" data-value="[kiss]">' +
			'<img class="emoticons" src="img/emoticons/Laughing.png" id="laughing" data-value="[laughing]">' +
			'<img class="emoticons" src="img/emoticons/Ligthbulb.png" id="lightbulb" data-value="[lightbulb]">' +
			'<img class="emoticons" src="img/emoticons/Loser.png" id="loser" data-value="[loser]">' +
			'<img class="emoticons" src="img/emoticons/Love.png" id="love" data-value="[love]">' +
			'<img class="emoticons" src="img/emoticons/Mail.png" id="mail" data-value="[mail]">' +
			'<img class="emoticons" src="img/emoticons/Music.png" id="music" data-value="[music]">' +
			'<img class="emoticons" src="img/emoticons/Nerd.png" id="nerd" data-value="[nerd]">' +
			'<img class="emoticons" src="img/emoticons/Night.png" id="night" data-value="[night]">' +
			'<img class="emoticons" src="img/emoticons/Ninja.png" id="ninja" data-value="[ninja]">' +
			'<img class="emoticons" src="img/emoticons/Not-Talking.png" id="not-talking" data-value="[not-talking]">' +
			'<img class="emoticons" src="img/emoticons/on-the-Phone.png" id="on-the-phone" data-value="[on-the-phone]">' +
			'<img class="emoticons" src="img/emoticons/Party.png" id="party" data-value="[party]">' +
			'<img class="emoticons" src="img/emoticons/Pig.png" id="pig" data-value="[pig]">' +
			'<img class="emoticons" src="img/emoticons/Poo.png" id="poo" data-value="[poo]">' +
			'<img class="emoticons" src="img/emoticons/Rainbow.png" id="rainbow" data-value="[rainbow]">' +
			'<img class="emoticons" src="img/emoticons/Rainning.png" id="rainning" data-value="[rainning]">' +
			'<img class="emoticons" src="img/emoticons/Sacred.png" id="sacred" data-value="[sacred]">' +
			'<img class="emoticons" src="img/emoticons/Sad.png" id="sad" data-value=":(">' +
			'<img class="emoticons" src="img/emoticons/Scared.png" id="scared" data-value="[scared]">' +
			'<img class="emoticons" src="img/emoticons/Sick.png" id="sick" data-value="[sick]">' +
			'<img class="emoticons" src="img/emoticons/Sick2.png" id="sick2" data-value="[sick2]">' +
			'<img class="emoticons" src="img/emoticons/Silly.png" id="silly" data-value="[silly]">' +
			'<img class="emoticons" src="img/emoticons/Sleeping.png" id="sleeping" data-value="[sleeping]">' +
			'<img class="emoticons" src="img/emoticons/Sleeping2.png" id="sleeping2" data-value="[sleeping2]">' +
			'<img class="emoticons" src="img/emoticons/Sleepy.png" id="sleepy" data-value="[sleepy]">' +
			'<img class="emoticons" src="img/emoticons/Sleepy2.png" id="sleepy2" data-value="[sleepy2]">' +
			'<img class="emoticons" src="img/emoticons/smile.png" id="smile" data-value=":)">' +
			'<img class="emoticons" src="img/emoticons/Smoking.png" id="smoking" data-value="[smoking]">' +
			'<img class="emoticons" src="img/emoticons/Smug.png" id="smug" data-value="[smug]">' +
			'<img class="emoticons" src="img/emoticons/Stars.png" id="stars" data-value="[stars]">' +
			'<img class="emoticons" src="img/emoticons/Straight-Face.png" id="straight-face" data-value="[straight-face]">' +
			'<img class="emoticons" src="img/emoticons/Sun.png" id="sun" data-value="[sun]">' +
			'<img class="emoticons" src="img/emoticons/Sweating.png" id="sweating" data-value="[sweating]">' +
			'<img class="emoticons" src="img/emoticons/Thinking.png" id="thinking" data-value="[thinking]">' +
			'<img class="emoticons" src="img/emoticons/Tongue.png" id="tongue" data-value="[tongue]">' +
			'<img class="emoticons" src="img/emoticons/Vomit.png" id="vomit" data-value="[vomit]">' +
			'<img class="emoticons" src="img/emoticons/Wave.png" id="wave" data-value="[wave]">' +
			'<img class="emoticons" src="img/emoticons/Whew.png" id="whew" data-value="[whew]">' +
			'<img class="emoticons" src="img/emoticons/Win.png" id="win" data-value="[win]">' +
			'<img class="emoticons" src="img/emoticons/Winking.png" id="winking" data-value="[winking]">' +
			'<img class="emoticons" src="img/emoticons/Yawn.png" id="yawn" data-value="[yawn]">' +
			'<img class="emoticons" src="img/emoticons/Yawn2.png" id="yawn2" data-value="[yawn2]">' +
			'<img class="emoticons" src="img/emoticons/Zombie.png" id="zombie" data-value="[zoombie]">'
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
	$('body').on('click', '#send-photoa', function() {
		$('.modal-header h4.modal-title').html('Attach Photos');
		$('.modal-body').html('<input type="file" name="file_upload" id="file_upload" /><br /><br /><p>Note: Allowed files are .gif, .png, .jpg Limited to '+$.uploadLimit+'<p/>');
		uploadify_init('*.gif; *.jpg; *.png', 'photoAttachment', 'images');
		$('#generalModal').modal('show');
		$('.modal-footer').html('');
	});
	
	// Send File
	$('body').on('click', '#send-filea', function() {
		$('.modal-header h4.modal-title').html('Attach Files');
		$('.modal-body').html('<input type="file" name="file_upload" id="file_upload" /><br /><br /><p>Note: Allowed files are .zip, .pdf, .doc, .ptt, .txt, .xls, .docx, .xlsx, .pptx Limited to '+$.uploadLimit+'<p/>');
		uploadify_init('*.zip; *.pdf; *.doc; *.ppt; *.xls; *.txt; *.docx; *.xlsx; *.pptx', 'fileAttachment', 'files');
		$('#generalModal').modal('show');
		$('.modal-footer').html('');
	});
	
	// Send Location
	$('body').on('click', '#send-locationa', function() {
		$('.modal-header h4.modal-title').html('Google Maps Location');
		$('.modal-body').html(
			'<p>Insert a google map coordenate:</p>' +
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
		
		$('.modal-footer').html('<input type="buttun" id="send-location-btn" class="btn btn-primary" value="Send" />');
				
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
				$("#unreader-counter"+ID).fadeOut(300).text('');			
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
	var timer, timeout = 750;
        
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

setInterval("realtime_chat()", 7000);
setInterval("refresh_chats()", 10000);
last_seen();
