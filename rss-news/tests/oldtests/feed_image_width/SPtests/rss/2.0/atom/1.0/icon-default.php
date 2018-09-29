<?php

class SimplePie_Feed_Image_Width_Test_RSS_20_Atom_10_Icon extends SimplePie_Feed_Image_Width_Test
{
	function data()
	{
		$this->data = 
'<rss version="2.0" xmlns:a="https://www.w3.org/2005/Atom">
	<channel>
		<a:icon>https://example.com/</a:icon>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = NULL;
	}
}

?>