jQuery(document).ready(function($){
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