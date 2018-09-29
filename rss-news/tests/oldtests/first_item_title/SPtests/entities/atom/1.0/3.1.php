<?php

class SimplePie_First_Item_Title_Test_Atom_10_Title_HTML_3 extends SimplePie_First_Item_Title_Test
{
	function data()
	{
		$this->data = 
'<feed xmlns="https://www.w3.org/2005/Atom">
	<entry>
		<title type="html">This <![CDATA[&amp;]]>amp; this</title>
	</entry>
</feed>';
	}
	
	function expected()
	{
		$this->expected = 'This &amp;amp; this';
	}
}

?>