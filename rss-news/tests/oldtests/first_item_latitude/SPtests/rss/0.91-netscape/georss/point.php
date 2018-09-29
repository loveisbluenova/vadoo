<?php

class SimplePie_First_Item_Latitude_Test_RSS_091_Netscape_Georss_Point extends SimplePie_First_Item_Latitude_Test
{
	function data()
	{
		$this->data = 
'<!DOCTYPE rss SYSTEM "https://my.netscape.com/publish/formats/rss-0.91.dtd">
<rss version="0.91" xmlns:georss="https://www.georss.org/georss">
	<channel>
		<item>
			<georss:point>55.701 12.552</georss:point>
		</item>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = 55.701;
	}
}

?>