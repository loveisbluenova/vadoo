<?php

class SimplePie_First_Item_Author_Name_Test_RSS_10_DC_11_Creator extends SimplePie_First_Item_Author_Name_Test
{
	function data()
	{
		$this->data = 
'<rdf:RDF xmlns:rdf="https://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="https://purl.org/rss/1.0/" xmlns:dc="https://purl.org/dc/elements/1.1/">
	<item>
		<dc:creator>Item Author</dc:creator>
	</item>
</rdf:RDF>';
	}
	
	function expected()
	{
		$this->expected = 'Item Author';
	}
}

?>