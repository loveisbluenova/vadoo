<?php

class SimplePie_First_Item_Category_Label_Test_RSS_090_DC_10_Subject extends SimplePie_First_Item_Category_Label_Test
{
	function data()
	{
		$this->data = 
'<rdf:RDF xmlns:rdf="https://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="https://my.netscape.com/rdf/simple/0.9/" xmlns:dc="https://purl.org/dc/elements/1.0/">
	<item>
		<dc:subject>Item Category</dc:subject>
	</item>
</rdf:RDF>';
	}
	
	function expected()
	{
		$this->expected = 'Item Category';
	}
}

?>