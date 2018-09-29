<?php

class SimplePie_Feed_Image_Height_Test_Atom_10_Logo_Default extends SimplePie_Feed_Image_Height_Test
{
	function data()
	{
		$this->data = 
'<feed xmlns="https://www.w3.org/2005/Atom">
	<logo>https://example.com/</logo>
</feed>';
	}
	
	function expected()
	{
		$this->expected = NULL;
	}
}

?>
