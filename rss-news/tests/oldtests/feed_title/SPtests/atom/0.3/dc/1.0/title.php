<?php

class SimplePie_Feed_Title_Test_Atom_03_DC_10_Title extends SimplePie_Feed_Title_Test
{
	function data()
	{
		$this->data = 
'<feed version="0.3" xmlns="https://purl.org/atom/ns#" xmlns:dc="https://purl.org/dc/elements/1.0/">
	<dc:title>Feed Title</dc:title>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'Feed Title';
	}
}

?>