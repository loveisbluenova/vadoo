<?php

class SimplePie_Feed_Image_Height_Test_RSS_090_URL_Default extends SimplePie_Feed_Image_Height_Test
{
	function data()
	{
		$this->data = 
'<rdf:RDF xmlns:rdf="https://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="https://my.netscape.com/rdf/simple/0.9/">
	<image>
		<url>https://example.com/</url>
	</image>
</rdf:RDF>';
	}
	
	function expected()
	{
		$this->expected = NULL;
	}
}

?>
