<?php

class SimplePie_First_Item_Permalink_Test_Bug_640_Test_0 extends SimplePie_First_Item_Permalink_Test
{
	function data()
	{
		$this->data = 
'<feed xmlns="https://www.w3.org/2005/Atom" xml:base="https://example.com/" >
	<entry>
		<link href=""/>
	</entry>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/';
	}
}

?>