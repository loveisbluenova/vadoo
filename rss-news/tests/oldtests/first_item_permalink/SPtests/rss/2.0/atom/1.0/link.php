<?php

class SimplePie_First_Item_Permalink_Test_RSS_20_Atom_10_Link extends SimplePie_First_Item_Permalink_Test
{
	function data()
	{
		$this->data = 
'<rss version="2.0" xmlns:a="https://www.w3.org/2005/Atom">
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