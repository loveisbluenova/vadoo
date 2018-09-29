<?php

class SimplePie_Feed_Title_Test_Atom_10_DC_10_Title extends SimplePie_Feed_Title_Test
{
	function data()
	{
		$this->data = 
'<feed xmlns="https://www.w3.org/2005/Atom" xmlns:dc="https://purl.org/dc/elements/1.0/">
	<dc:title>Feed Title</dc:title>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'Feed Title';
	}
}

?>