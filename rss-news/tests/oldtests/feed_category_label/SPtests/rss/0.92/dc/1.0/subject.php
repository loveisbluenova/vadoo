<?php

class SimplePie_Feed_Category_Label_Test_RSS_092_DC_10_Subject extends SimplePie_Feed_Category_Label_Test
{
	function data()
	{
		$this->data = 
'<rss version="0.92" xmlns:dc="https://purl.org/dc/elements/1.0/">
	<channel>
		<dc:subject>Feed Category</dc:subject>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = 'Feed Category';
	}
}

?>