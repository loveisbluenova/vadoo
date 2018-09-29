<?php

class SimplePie_First_Item_ID_Test_RSS_20_Atom_03_ID extends SimplePie_First_Item_ID_Test
{
	function data()
	{
		$this->data = 
'<rss version="2.0" xmlns:a="https://purl.org/atom/ns#">
	<channel>
		<item>
			<a:id>https://example.com/</a:id>
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