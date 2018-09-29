<?php

class SimplePie_Feed_Title_Test_RSS_090_Title extends SimplePie_Feed_Title_Test
{
	function data()
	{
		$this->data = 
'<rdf:RDF xmlns:rdf="https://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="https://my.netscape.com/rdf/simple/0.9/">
	<channel>
		<title>Feed Title</title>
	</channel>
</rdf:RDF>';
	}
	
	function expected()
	{
		$this->expected = 'Feed Title';
	}
}

?>