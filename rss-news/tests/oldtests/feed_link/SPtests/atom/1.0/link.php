<?php

class SimplePie_Feed_Link_Test_Atom_10_Link extends SimplePie_Feed_Link_Test
{
	function data()
	{
		$this->data = 
'<feed xmlns="https://www.w3.org/2005/Atom">
	<link href="https://example.com/"/>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/';
	}
}

?>