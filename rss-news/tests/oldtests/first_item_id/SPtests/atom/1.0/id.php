<?php

class SimplePie_First_Item_ID_Test_Atom_10_ID extends SimplePie_First_Item_ID_Test
{
	function data()
	{
		$this->data = 
'<feed xmlns="https://www.w3.org/2005/Atom">
	<entry>
		<id>https://example.com/</id>
	</entry>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/';
	}
}

?>