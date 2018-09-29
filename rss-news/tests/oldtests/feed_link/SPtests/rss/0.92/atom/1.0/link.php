<?php

class SimplePie_Feed_Link_Test_RSS_092_Atom_10_Link extends SimplePie_Feed_Link_Test
{
	function data()
	{
		$this->data = 
'<rss version="0.92" xmlns:a="https://www.w3.org/2005/Atom">
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