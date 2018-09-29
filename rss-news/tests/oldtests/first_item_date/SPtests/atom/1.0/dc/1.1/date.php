<?php

class SimplePie_First_Item_Date_Test_Atom_10_DC_11_Date extends SimplePie_First_Item_Date_Test
{
	function data()
	{
		$this->data = 
'<feed xmlns="https://www.w3.org/2005/Atom" xmlns:dc="https://purl.org/dc/elements/1.1/">
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