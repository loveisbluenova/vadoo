<?php

class SimplePie_Feed_Image_URL_Test_RSS_20_Atom_10_Logo extends SimplePie_Feed_Image_URL_Test
{
	function data()
	{
		$this->data = 
'<rss version="2.0" xmlns:a="https://www.w3.org/2005/Atom">
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