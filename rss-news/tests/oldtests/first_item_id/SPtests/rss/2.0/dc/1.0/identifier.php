<?php

class SimplePie_First_Item_ID_Test_RSS_20_DC_10_Identifier extends SimplePie_First_Item_ID_Test
{
	function data()
	{
		$this->data = 
'<rss version="2.0" xmlns:dc="https://purl.org/dc/elements/1.0/">
	<channel>
		<item>
			<dc:identifier>https://example.com/</dc:identifier>
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