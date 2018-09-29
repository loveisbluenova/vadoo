<?php

class SimplePie_First_Item_Permalink_Test_RSS_091_Userland_Atom_03_Link_Enclosure extends SimplePie_First_Item_Permalink_Test
{
	function data()
	{
		$this->data = 
'<rss version="0.91" xmlns:a="https://purl.org/atom/ns#">
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