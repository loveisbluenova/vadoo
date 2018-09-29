<?php

class SimplePie_First_Item_Permalink_Test_Atom_10_xmlbase_1 extends SimplePie_First_Item_Permalink_Test
{
	function data()
	{
		$this->data = 
'<feed xmlns="https://www.w3.org/2005/Atom" xml:base="https://example.com/">
	<entry>
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