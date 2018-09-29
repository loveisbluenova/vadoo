<?php

class SimplePie_First_Item_Title_Test_Bug_666_Test_1 extends SimplePie_First_Item_Title_Test
{
	function data()
	{
		$this->data = 
'<rdf:RDF xmlns:rdf="https://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="https://my.netscape.com/rdf/simple/0.9/">
	<channel>
		<title>Feed Title</title>
	</channel>
	<item>
		<title>Item Title</title>
	</item>
</rdf:RDF>';
	}
	
	function expected()
	{
		$this->expected = 'Item Title';
	}
}

?>