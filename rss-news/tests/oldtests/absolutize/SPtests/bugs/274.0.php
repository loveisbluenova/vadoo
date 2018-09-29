<?php

class SimplePie_Absolutize_Test_Bug_274_Test_0 extends SimplePie_Absolutize_Test
{
	function data()
	{
		$this->data['base'] = 'https://a/b/';
		$this->data['relative'] = 'c';
	}
	
	function expected()
	{
		$this->expected = 'https://a/b/c';
	}
}

?>