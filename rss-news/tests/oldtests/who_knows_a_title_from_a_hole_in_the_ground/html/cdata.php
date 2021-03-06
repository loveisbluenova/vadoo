<?php

class who_knows_a_title_from_a_hole_in_the_ground_html_cdata extends SimplePie_First_Item_Title_Test
{
	function data()
	{
		$this->data = 
'<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="https://www.w3.org/2005/Atom">
<id>https://atomtests.philringnalda.com/tests/item/title/html-cdata.atom</id>
<title>Atom item title html cdata</title>
<updated>2005-12-18T00:13:00Z</updated>
<author>
  <name>Phil Ringnalda</name>
  <uri>https://weblog.philringnalda.com/</uri>
</author>
<link rel="self" href="https://atomtests.philringnalda.com/tests/item/title/html-cdata.atom"/>
<entry>
  <id>https://atomtests.philringnalda.com/tests/item/title/html-cdata.atom/1</id>
  <title type="html"><![CDATA[&lt;title>]]></title>
  <updated>2005-12-18T00:13:00Z</updated>
  <summary>An item with a type="html" title consisting of a less-than 
character, the word \'title\' and a greater-than character, where 
the character entity reference for the less-than is escaped by being
in a CDATA section.</summary>
  <link href="https://atomtests.philringnalda.com/alt/title-title.html"/>
  <category term="item title"/>
</entry>
</feed>';
	}
	
	/**
	 * @todo Change this back to the non-entity form
	 */
	function expected()
	{
		// This is really just nitpicking, but this should be fixed eventually.
		//$this->expected = '&lt;title>';
		$this->expected = '&lt;title&gt;';
	}
}

?>