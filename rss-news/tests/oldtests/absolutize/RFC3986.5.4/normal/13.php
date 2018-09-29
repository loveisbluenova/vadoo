<?php

class SimplePie_Absolutize_Test_RFC3986_Normal_13 extends SimplePie_Absolutize_Test_RFC3986
{
	function data()
	{
		$this->data['relative'] = 'g;x';
	}
	
	function expected()
	{
		$this->expected = 'https://a/b/c/g;x';
	}
}

?>