<?php

class SimplePie_First_Item_Title_Test_Atom_10_DC_11_Title extends SimplePie_First_Item_Title_Test
{
	function data()
	{
		$this->data = 
'<feed xmlns="https://www.w3.org/2005/Atom" xmlns:dc="https://purl.org/dc/elements/1.1/">
	<entry>
		<dc:title>Item Title</dc:title>
	</entry>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'Item Title';
	}
}

?>