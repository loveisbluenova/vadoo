<?php

class SimplePie_First_Item_Content_Test_Atom_03_Summary extends SimplePie_First_Item_Content_Test
{
	function data()
	{
		$this->data = 
'<feed version="0.3" xmlns="https://purl.org/atom/ns#">
	<entry>
		<summary>Item Description</summary>
	</entry>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'Item Description';
	}
}

?>