<?php

class SimplePie_First_Item_Permalink_Test_Atom_03_Enclosure extends SimplePie_First_Item_Permalink_Test
{
	function data()
	{
		$this->data = 
'<feed version="0.3" xmlns="https://purl.org/atom/ns#">
	<entry>
		<link href="https://example.com/" rel="enclosure"/>
	</entry>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/';
	}
}

?>