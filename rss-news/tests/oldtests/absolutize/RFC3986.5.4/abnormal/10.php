<?php

class SimplePie_Absolutize_Test_RFC3986_Abnormal_10 extends SimplePie_Absolutize_Test_RFC3986
{
	function data()
	{
		$this->data['relative'] = './g/.';
	}
	
	function expected()
	{
		$this->expected = 'https://a/b/c/g/';
	}
}

?>