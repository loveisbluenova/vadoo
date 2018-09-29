<?php

class SimplePie_Feed_Image_Link_Test_RSS_091_Netscape_Link extends SimplePie_Feed_Image_Link_Test
{
	function data()
	{
		$this->data = 
'<!DOCTYPE rss SYSTEM "https://my.netscape.com/publish/formats/rss-0.91.dtd">
<rss version="0.91">
	<channel>
		<image>
			<link>https://example.com/</link>
		</image>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/';
	}
}

?>