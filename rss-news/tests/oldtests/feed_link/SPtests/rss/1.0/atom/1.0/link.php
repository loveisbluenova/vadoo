<?php

class SimplePie_Feed_Link_Test_RSS_10_Atom_10_Link extends SimplePie_Feed_Link_Test
{
	function data()
	{
		$this->data = 
'<rdf:RDF xmlns:rdf="https://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="https://purl.org/rss/1.0/" xmlns:a="https://www.w3.org/2005/Atom">
	<channel>
		<a:link href="https://example.com/"/>
	</channel>
</rdf:RDF>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/';
	}
}

?>