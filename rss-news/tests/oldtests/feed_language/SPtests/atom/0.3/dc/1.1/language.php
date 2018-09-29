<?php

class SimplePie_Feed_Language_Test_Atom_03_DC_11_Language extends SimplePie_Feed_Language_Test
{
	function data()
	{
		$this->data = 
'<feed version="0.3" xmlns="https://purl.org/atom/ns#" xmlns:dc="https://purl.org/dc/elements/1.1/">
	<dc:language>en-GB</dc:language>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'en-GB';
	}
}

?>