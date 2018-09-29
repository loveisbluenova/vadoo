<?php

class SimplePie_Feed_Language_Test_Atom_03_xmllang extends SimplePie_Feed_Language_Test
{
	function data()
	{
		$this->data = 
'<feed version="0.3" xmlns="https://purl.org/atom/ns#" xml:lang="en-GB">
	<title>Feed Title</title>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'en-GB';
	}
}

?>