<?php

class SimplePie_First_Item_Category_Label_Test_RSS_10_Atom_10_Category_Label extends SimplePie_First_Item_Category_Label_Test
{
	function data()
	{
		$this->data = 
'<rdf:RDF xmlns:rdf="https://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="https://purl.org/rss/1.0/" xmlns:a="https://www.w3.org/2005/Atom">
	<item>
		<a:category label="Item Category"/>
	</item>
</rdf:RDF>';
	}
	
	function expected()
	{
		$this->expected = 'Item Category';
	}
}

?>