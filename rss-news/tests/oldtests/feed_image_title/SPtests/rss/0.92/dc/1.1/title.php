<?php

class SimplePie_Feed_Image_Title_Test_RSS_092_DC_11_Title extends SimplePie_Feed_Image_Title_Test
{
	function data()
	{
		$this->data = 
'<rss version="0.92" xmlns:dc="https://purl.org/dc/elements/1.1/">
	<channel>
		<image>
			<dc:title>Image Title</dc:title>
		</image>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = 'Image Title';
	}
}

?>