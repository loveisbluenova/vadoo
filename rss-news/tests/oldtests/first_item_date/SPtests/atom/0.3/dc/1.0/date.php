<?php

class SimplePie_First_Item_Date_Test_Atom_03_DC_10_Date extends SimplePie_First_Item_Date_Test
{
	function data()
	{
		$this->data = 
'<feed version="0.3" xmlns="https://purl.org/atom/ns#" xmlns:dc="https://purl.org/dc/elements/1.0/">
	<entry>
		<dc:date>2007-01-11T16:00:00Z</dc:date>
	</entry>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 1168531200;
	}
}

?>