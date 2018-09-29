<?php

class SimplePie_Feed_Image_URL_Test_RSS_091_Userland_Atom_10_Logo extends SimplePie_Feed_Image_URL_Test
{
	function data()
	{
		$this->data = 
'<rss version="0.91" xmlns:a="https://www.w3.org/2005/Atom">
	<channel>
		<a:logo>https://example.com/</a:logo>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/';
	}
}

?>