<?php

class SimplePie_First_Item_ID_Test_RSS_091_Userland_Atom_10_ID extends SimplePie_First_Item_ID_Test
{
	function data()
	{
		$this->data = 
'<rss version="0.91" xmlns:a="https://www.w3.org/2005/Atom">
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