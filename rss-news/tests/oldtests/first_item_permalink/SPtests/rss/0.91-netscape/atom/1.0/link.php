<?php

class SimplePie_First_Item_Permalink_Test_RSS_091_Netscape_Atom_10_Link extends SimplePie_First_Item_Permalink_Test
{
	function data()
	{
		$this->data = 
'<!DOCTYPE rss SYSTEM "https://my.netscape.com/publish/formats/rss-0.91.dtd">
<rss version="0.91" xmlns:a="https://www.w3.org/2005/Atom">
	<channel>
		<item>
			<a:link href="https://example.com/"/>
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