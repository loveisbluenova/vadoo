<?php

class SimplePie_First_Item_Title_Test_Atom_10_Title extends SimplePie_First_Item_Title_Test
{
	function data()
	{
		$this->data = 
'<feed xmlns="https://www.w3.org/2005/Atom">
	<entry>
		<title>Item Title</title>
	</entry>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'Item Title';
	}
}

?>