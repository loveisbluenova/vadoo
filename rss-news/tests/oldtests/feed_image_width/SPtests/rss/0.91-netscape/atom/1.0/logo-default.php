<?php

class SimplePie_Feed_Image_Width_Test_RSS_091_Netscape_Atom_10_Logo extends SimplePie_Feed_Image_Width_Test
{
	function data()
	{
		$this->data = 
'<!DOCTYPE rss SYSTEM "https://my.netscape.com/publish/formats/rss-0.91.dtd">
<rss version="0.91" xmlns:a="https://www.w3.org/2005/Atom">
	<channel>
		<a:logo>https://example.com/</a:logo>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = NULL;
	}
}

?>