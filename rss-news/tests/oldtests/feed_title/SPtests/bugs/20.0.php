<?php

class SimplePie_Feed_Title_Test_Bug_20_Test_0 extends SimplePie_Feed_Title_Test
{
	function data()
	{
		$this->data = 
'<a:feed xmlns:a="https://www.w3.org/2005/Atom" xmlns="https://www.w3.org/1999/xhtml">
	<a:title>Non-default namespace</a:title>
</a:feed>';
	}
	
	function expected()
	{
		$this->expected = 'Non-default namespace';
	}
}

?>