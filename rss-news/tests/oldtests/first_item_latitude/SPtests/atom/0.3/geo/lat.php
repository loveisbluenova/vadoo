<?php

class SimplePie_First_Item_Latitude_Test_Atom_03_Geo_Lat extends SimplePie_First_Item_Latitude_Test
{
	function data()
	{
		$this->data = 
'<feed version="0.3" xmlns="https://purl.org/atom/ns#" xmlns:geo="https://www.w3.org/2003/01/geo/wgs84_pos#">
	<entry>
		<geo:lat>55.701</geo:lat>
		<geo:long>12.552</geo:long>
	</entry>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 55.701;
	}
}

?>