<?php

class SimplePie_Feed_Image_Width_Test_RSS_092_Atom_10_Icon extends SimplePie_Feed_Image_Width_Test
{
	function data()
	{
		$this->data = 
'<rss version="0.92" xmlns:a="https://www.w3.org/2005/Atom">
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