<?php

class SimplePie_First_Item_Date_Test_RSS_20_Atom_10_Published extends SimplePie_First_Item_Date_Test
{
	function data()
	{
		$this->data = 
'<rss version="2.0" xmlns:a="https://www.w3.org/2005/Atom">
	<channel>
		<item>
			<a:published>2007-01-11T16:00:00Z</a:published>
		</item>
	</channel>
</rss>';
	}
	
	function expected()
	{
		$this->expected = 1168531200;
	}
}

?>