<?php

class SimplePie_First_Item_Title_Test_RSS_091_Netscape_DC_10_Title extends SimplePie_First_Item_Title_Test
{
	function data()
	{
		$this->data = 
'<!DOCTYPE rss SYSTEM "https://my.netscape.com/publish/formats/rss-0.91.dtd">
<rss version="0.91" xmlns:dc="https://purl.org/dc/elements/1.0/">
	<channel>
		<item>
			<dc:title>Item Title</dc:title>
		</item>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = 'Item Title';
	}
}

?>