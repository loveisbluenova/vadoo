<?php

class SimplePie_First_Item_Author_Name_Test_RSS_090_Atom_03_Name extends SimplePie_First_Item_Author_Name_Test
{
	function data()
	{
		$this->data = 
'<rdf:RDF xmlns:rdf="https://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="https://my.netscape.com/rdf/simple/0.9/" xmlns:a="https://purl.org/atom/ns#">
	<item>
		<a:author>
			<a:name>Item Author</a:name>
		</a:author>
	</item>
</rdf:RDF>';
	}
	
	function expected()
	{
		$this->expected = 'Item Author';
	}
}

?>