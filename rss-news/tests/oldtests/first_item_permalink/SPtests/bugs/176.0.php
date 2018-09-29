<?php

class SimplePie_First_Item_Permalink_Test_Bug_176_Test_0 extends SimplePie_First_Item_Permalink_Test
{
	function data()
	{
		$this->data = 
'<feed xmlns="https://www.w3.org/2005/Atom">
	<entry>
		<link rel="related" href="https://example.com/related"/>
		<link rel="via" href="https://example.com/via"/>
		<link rel="alternate" href="https://example.com/alternate"/>
	</entry>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/alternate';
	}
}

?>