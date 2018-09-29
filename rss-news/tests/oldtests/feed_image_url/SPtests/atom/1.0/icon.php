<?php

class SimplePie_Feed_Image_URL_Test_Atom_10_Icon extends SimplePie_Feed_Image_URL_Test
{
	function data()
	{
		$this->data = 
'<feed xmlns="https://www.w3.org/2005/Atom">
	<icon>https://example.com/</icon>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'https://example.com/';
	}
}

?>