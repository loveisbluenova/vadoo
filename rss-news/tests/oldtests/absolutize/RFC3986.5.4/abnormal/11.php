<?php

class SimplePie_Absolutize_Test_RFC3986_Abnormal_11 extends SimplePie_Absolutize_Test_RFC3986
{
	function data()
	{
		$this->data['relative'] = 'g/./h';
	}
	
	function expected()
	{
		$this->expected = 'https://a/b/c/g/h';
	}
}

?>