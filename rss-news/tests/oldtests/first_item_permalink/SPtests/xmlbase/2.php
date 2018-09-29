<?php

class SimplePie_First_Item_Permalink_Test_Atom_10_xmlbase_2 extends SimplePie_First_Item_Permalink_Test
{
	function data()
	{
		$this->data = 
'<feed xmlns="https://www.w3.org/2005/Atom">
	<entry xml:base="https://example.com/">
		<link rel="alternate" href="/alternate"/>
	</entry>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/alternate';
	}
}

?>