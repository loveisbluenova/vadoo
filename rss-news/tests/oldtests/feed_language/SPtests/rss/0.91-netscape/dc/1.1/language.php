<?php

class SimplePie_Feed_Language_Test_RSS_091_Netscape_DC_11_Language extends SimplePie_Feed_Language_Test
{
	function data()
	{
		$this->data = 
'<!DOCTYPE rss SYSTEM "https://my.netscape.com/publish/formats/rss-0.91.dtd">
<rss version="0.91" xmlns:dc="https://purl.org/dc/elements/1.1/">
	<channel>
		<dc:language>en-GB</dc:language>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = 'en-GB';
	}
}

?>