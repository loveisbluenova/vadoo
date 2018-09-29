jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
	
	// For adding the news item from the RSS feeder
	$(".add-rss-news").on('click', function(){
		console.log("I am clicked");
		buzzynews_title = $(this).parent('.chunk').find('h4 a').text(); console.log(buzzynews_title);
		buzzynews_url = $(this).parent('.chunk').find('h4 a').prop('href'); console.log(getDomain(buzzynews_url));
		buzzynews_text = $(this).parent('.chunk').find('.rss-news-content').text();console.log(buzzynews_text);
		//buzzynews_text = $(this).parent('.chunk').find('.rss-news-content').text();// console.log(buzzynews_image_url);
		window.open("add-rss-news.php?buzzynews_source_name="+getDomain(buzzynews_url)+"&buzzynews_text="+encodeURI(buzzynews_text)+"&buzzynews_title="+buzzynews_title+"&buzzynews_url="+buzzynews_url, "_blank");
		//console.log(formData);
		
	});

});


// abstract functions

function getDomain(url) {
    var hostName = getHostName(url);
    var domain = hostName;
    
    if (hostName != null) {
        var parts = hostName.split('.').reverse();
        
    if (parts != null && parts.length > 1) {
        domain = parts[1] + '.' + parts[0];
            
        if (hostName.toLowerCase().indexOf('.co.uk') != -1 && parts.length > 2) {
          domain = parts[2] + '.' + domain;
        }
    }
    }
    
    return domain;
}

function getHostName(url) {
    var match = url.match(/:\/\/(www[0-9]?\.)?(.[^/:]+)/i);
    if (match != null && match.length > 2 &&
        typeof match[2] === 'string' && match[2].length > 0) {
    return match[2];
    }
    else {
        return null;
    }
}