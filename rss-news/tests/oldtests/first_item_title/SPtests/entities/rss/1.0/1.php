<?php

class SimplePie_First_Item_Title_Test_RSS_10_Title_1 extends SimplePie_First_Item_Title_Test
{
	function data()
	{
		$this->data = 
'<rdf:RDF xmlns:rdf="https://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="https://purl.org/rss/1.0/">
	<item>
		<title>This &amp;amp; this</title>
	</item>
</rdf:RDF>';
	}
	
	function expected()
	{
		$this->expected = 'This &amp;amp; this';
	}
}

?>