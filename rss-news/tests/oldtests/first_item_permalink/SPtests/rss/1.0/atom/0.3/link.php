<?php

class SimplePie_First_Item_Permalink_Test_RSS_10_Atom_03_Link extends SimplePie_First_Item_Permalink_Test
{
	function data()
	{
		$this->data = 
'<rdf:RDF xmlns:rdf="https://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="https://purl.org/rss/1.0/" xmlns:a="https://purl.org/atom/ns#">
	<item>
		<a:link href="https://example.com/"/>
	</item>
</rdf:RDF>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/';
	}
}

?>