<?php

class SimplePie_Feed_Link_Test_RSS_091_Userland_Atom_03_Link extends SimplePie_Feed_Link_Test
{
	function data()
	{
		$this->data = 
'<rss version="0.91" xmlns:a="https://purl.org/atom/ns#">
	<channel>
		<a:link href="https://example.com/"/>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/';
	}
}

?>