<?php

class SimplePie_First_Item_Title_Test_RSS_090_Title_2 extends SimplePie_First_Item_Title_Test
{
	function data()
	{
		$this->data = 
'<rdf:RDF xmlns:rdf="https://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="https://my.netscape.com/rdf/simple/0.9/">
	<item>
		<title><![CDATA[This &amp;amp; this]]></title>
	</item>
</rdf:RDF>';
	}
	
	function expected()
	{
		$this->expected = 'This &amp;amp;amp; this';
	}
}

?>