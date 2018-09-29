<?php

class SimplePie_First_Item_Permalink_Test_RSS_092_Atom_03_Link extends SimplePie_First_Item_Permalink_Test
{
	function data()
	{
		$this->data = 
'<rss version="0.92" xmlns:a="https://purl.org/atom/ns#">
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