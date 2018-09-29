<?php

class SimplePie_First_Item_Permalink_Test_RSS_091_Netscape_Link extends SimplePie_First_Item_Permalink_Test
{
	function data()
	{
		$this->data = 
'<!DOCTYPE rss SYSTEM "https://my.netscape.com/publish/formats/rss-0.91.dtd">
<rss version="0.91">
	<channel>
		<item>
			<link>https://example.com/</link>
		</item>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/';
	}
}

?>