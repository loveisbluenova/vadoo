<?php

class SimplePie_First_Item_Permalink_Test_RSS_091_Userland_Atom_10_Link_Enclosure extends SimplePie_First_Item_Permalink_Test
{
	function data()
	{
		$this->data = 
'<rss version="0.91" xmlns:a="https://www.w3.org/2005/Atom">
	<channel>
		<item>
			<a:link href="https://example.com/" rel="enclosure"/>
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