<?php

class SimplePie_Feed_Link_Test_RSS_090_Link extends SimplePie_Feed_Link_Test
{
	function data()
	{
		$this->data = 
'<rdf:RDF xmlns:rdf="https://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="https://my.netscape.com/rdf/simple/0.9/">
	<channel>
		<link>https://example.com/</link>
	</channel>
</rdf:RDF>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/';
	}
}

?>