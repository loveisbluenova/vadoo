<?php

class SimplePie_First_Item_Description_Test_RSS_10_Atom_03_Summary extends SimplePie_First_Item_Description_Test
{
	function data()
	{
		$this->data = 
'<rdf:RDF xmlns:rdf="https://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="https://purl.org/rss/1.0/" xmlns:a="https://purl.org/atom/ns#">
	<item>
		<a:summary>Item Description</a:summary>
	</item>
</rdf:RDF>';
	}
	
	function expected()
	{
		$this->expected = 'Item Description';
	}
}

?>