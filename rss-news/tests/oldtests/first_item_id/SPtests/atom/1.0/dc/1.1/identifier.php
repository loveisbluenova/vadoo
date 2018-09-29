<?php

class SimplePie_First_Item_ID_Test_Atom_10_DC_11_Identifier extends SimplePie_First_Item_ID_Test
{
	function data()
	{
		$this->data = 
'<feed xmlns="https://www.w3.org/2005/Atom" xmlns:dc="https://purl.org/dc/elements/1.1/">
	<entry>
		<dc:identifier>https://example.com/</dc:identifier>
	</entry>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/';
	}
}

?>