<?php

class SimplePie_Feed_Image_Height_Test_RSS_10_Atom_10_Logo_Default extends SimplePie_Feed_Image_Height_Test
{
	function data()
	{
		$this->data = 
'<rdf:RDF xmlns:rdf="https://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="https://purl.org/rss/1.0/" xmlns:a="https://www.w3.org/2005/Atom">
	<channel>
		<a:logo>https://example.com/</a:logo>
	</channel>
</rdf:RDF>';
	}
	
	function expected()
	{
		$this->expected = NULL;
	}
}

?>