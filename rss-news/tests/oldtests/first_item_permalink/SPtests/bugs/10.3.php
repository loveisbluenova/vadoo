<?php

class SimplePie_First_Item_Permalink_Test_Bug_10_Test_3 extends SimplePie_First_Item_Permalink_Test
{
	function data()
	{
		$this->data = 
'<rss version="2.0">
	<channel>
		<item>
			<guid isPermaLink="false">https://example.com/</guid>
		</item>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = NULL;
	}
}

?>