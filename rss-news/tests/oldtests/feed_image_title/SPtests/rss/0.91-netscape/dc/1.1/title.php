<?php

class SimplePie_Feed_Image_Title_Test_RSS_091_Netscape_DC_11_Title extends SimplePie_Feed_Image_Title_Test
{
	function data()
	{
		$this->data = 
'<!DOCTYPE rss SYSTEM "https://my.netscape.com/publish/formats/rss-0.91.dtd">
<rss version="0.91" xmlns:dc="https://purl.org/dc/elements/1.1/">
	<channel>
		<image>
			<dc:title>Image Title</dc:title>
		</image>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = 'Image Title';
	}
}

?>