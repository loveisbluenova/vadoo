<?php

class SimplePie_First_Item_Author_Name_Test_RSS_091_Netscape_Atom_10_Name extends SimplePie_First_Item_Author_Name_Test
{
	function data()
	{
		$this->data = 
'<!DOCTYPE rss SYSTEM "https://my.netscape.com/publish/formats/rss-0.91.dtd">
<rss version="0.91" xmlns:a="https://www.w3.org/2005/Atom">
	<channel>
		<item>
			<a:author>
				<a:name>Item Author</a:name>
			</a:author>
		</item>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = 'Item Author';
	}
}

?>