<?php

class SimplePie_First_Item_Description_Test_RSS_091_Userland_DC_10_Description extends SimplePie_First_Item_Description_Test
{
	function data()
	{
		$this->data = 
'<rss version="0.91" xmlns:dc="https://purl.org/dc/elements/1.0/">
	<channel>
		<item>
			<dc:description>Item Description</dc:description>
		</item>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = 'Item Description';
	}
}

?>