<?php

/**
 * IRI test cases
 *
 * Copyright (c) 2008-2012 Geoffrey Sneddon.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice,
 *	  this list of conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice,
 *	  this list of conditions and the following disclaimer in the documentation
 *	  and/or other materials provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors
 *	  may be used to endorse or promote products derived from this software
 *	  without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS AND CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package IRI
 * @author Geoffrey Sneddon
 * @copyright 2008-2012 Geoffrey Sneddon
 * @license https://www.opensource.org/licenses/bsd-license.php
 * @link https://hg.gsnedders.com/iri/
 *
 */

require_once dirname(__FILE__) . '/bootstrap.php';
 
class IRITest extends PHPUnit_Framework_TestCase
{
	public static function rfc3986_tests()
	{
		return array(
			// Normal
			array('g:h', 'g:h'),
			array('g', 'https://a/b/c/g'),
			array('./g', 'https://a/b/c/g'),
			array('g/', 'https://a/b/c/g/'),
			array('/g', 'https://a/g'),
			array('//g', 'https://g/'),
			array('?y', 'https://a/b/c/d;p?y'),
			array('g?y', 'https://a/b/c/g?y'),
			array('#s', 'https://a/b/c/d;p?q#s'),
			array('g#s', 'https://a/b/c/g#s'),
			array('g?y#s', 'https://a/b/c/g?y#s'),
			array(';x', 'https://a/b/c/;x'),
			array('g;x', 'https://a/b/c/g;x'),
			array('g;x?y#s', 'https://a/b/c/g;x?y#s'),
			array('', 'https://a/b/c/d;p?q'),
			array('.', 'https://a/b/c/'),
			array('./', 'https://a/b/c/'),
			array('..', 'https://a/b/'),
			array('../', 'https://a/b/'),
			array('../g', 'https://a/b/g'),
			array('../..', 'https://a/'),
			array('../../', 'https://a/'),
			array('../../g', 'https://a/g'),
			// Abnormal
			array('../../../g', 'https://a/g'),
			array('../../../../g', 'https://a/g'),
			array('/./g', 'https://a/g'),
			array('/../g', 'https://a/g'),
			array('g.', 'https://a/b/c/g.'),
			array('.g', 'https://a/b/c/.g'),
			array('g..', 'https://a/b/c/g..'),
			array('..g', 'https://a/b/c/..g'),
			array('./../g', 'https://a/b/g'),
			array('./g/.', 'https://a/b/c/g/'),
			array('g/./h', 'https://a/b/c/g/h'),
			array('g/../h', 'https://a/b/c/h'),
			array('g;x=1/./y', 'https://a/b/c/g;x=1/y'),
			array('g;x=1/../y', 'https://a/b/c/y'),
			array('g?y/./x', 'https://a/b/c/g?y/./x'),
			array('g?y/../x', 'https://a/b/c/g?y/../x'),
			array('g#s/./x', 'https://a/b/c/g#s/./x'),
			array('g#s/../x', 'https://a/b/c/g#s/../x'),
			array('http:g', 'http:g'),
		);
	}
 
	/**
	 * @dataProvider rfc3986_tests
	 */
	public function testStringRFC3986($relative, $expected)
	{
		$base = new SimplePie_IRI('https://a/b/c/d;p?q');
		$this->assertEquals($expected, SimplePie_IRI::absolutize($base, $relative)->get_iri());
	}
 
	/**
	 * @dataProvider rfc3986_tests
	 */
	public function testObjectRFC3986($relative, $expected)
	{
		$base = new SimplePie_IRI('https://a/b/c/d;p?q');
		$expected = new SimplePie_IRI($expected);
		$this->assertEquals($expected, SimplePie_IRI::absolutize($base, $relative));
	}

	/**
	 * @dataProvider rfc3986_tests
	 */
	public function testBothStringRFC3986($relative, $expected)
	{
		$base = 'https://a/b/c/d;p?q';
		$this->assertEquals($expected, SimplePie_IRI::absolutize($base, $relative)->get_iri());
		$this->assertEquals($expected, (string) SimplePie_IRI::absolutize($base, $relative));
	}
	
	public static function sp_tests()
	{
		return array(
			array('https://a/b/c/d', 'f%0o', 'https://a/b/c/f%250o'),
			array('https://a/b/', 'c', 'https://a/b/c'),
			array('https://a/', 'b', 'https://a/b'),
			array('https://a/', '/b', 'https://a/b'),
			array('https://a/b', 'c', 'https://a/c'),
			array('https://a/b/', "c\x0Ad", 'https://a/b/c%0Ad'),
			array('https://a/b/', "c\x0A\x0B", 'https://a/b/c%0A%0B'),
			array('https://a/b/c', '//0', 'https://0/'),
			array('https://a/b/c', '0', 'https://a/b/0'),
			array('https://a/b/c', '?0', 'https://a/b/c?0'),
			array('https://a/b/c', '#0', 'https://a/b/c#0'),
			array('https://0/b/c', 'd', 'https://0/b/d'),
			array('https://a/b/c?0', 'd', 'https://a/b/d'),
			array('https://a/b/c#0', 'd', 'https://a/b/d'),
			array('https://example.com', '//example.net', 'https://example.net/'),
			array('http:g', 'a', 'http:a'),
		);
	}
 
	/**
	 * @dataProvider sp_tests
	 */
	public function testStringSP($base, $relative, $expected)
	{
		$base = new SimplePie_IRI($base);
		$this->assertEquals($expected, SimplePie_IRI::absolutize($base, $relative)->get_iri());
	}
 
	/**
	 * @dataProvider sp_tests
	 */
	public function testObjectSP($base, $relative, $expected)
	{
		$base = new SimplePie_IRI($base);
		$expected = new SimplePie_IRI($expected);
		$this->assertEquals($expected, SimplePie_IRI::absolutize($base, $relative));
	}

	public static function query_tests()
	{
		return array(
			array('a=b&c=d', 'https://example.com/?a=b&c=d'),
			array('a=b%26c=d', 'https://example.com/?a=b%26c=d'),
			array('url=http%3A%2F%2Fexample.com%3Fa%3Db', 'https://example.com/?url=http%3A%2F%2Fexample.com%3Fa%3Db'),
			array('url=http%3A%2F%2Fexample.com%3Fa%3Db%26c%3Dd', 'https://example.com/?url=http%3A%2F%2Fexample.com%3Fa%3Db%26c%3Dd'),
		);
	}

	/**
	 * @dataProvider query_tests
	 */
	public function testStringQuery($query, $expected)
	{
		$base = new SimplePie_IRI('https://example.com/');
		$base->set_query($query);
		$this->assertEquals($expected, $base->get_iri());
	}
 
	/**
	 * @dataProvider query_tests
	 */
	public function testObjectQuery($query, $expected)
	{
		$base = new SimplePie_IRI('https://example.com/');
		$base->set_query($query);
		$expected = new SimplePie_IRI($expected);
		$this->assertEquals($expected, $base);
	}

	public static function absolutize_tests()
	{
		return array(
			array('https://example.com/', 'foo/111:bar', 'https://example.com/foo/111:bar'),
			array('https://example.com/#foo', '', 'https://example.com/'),
		);
	}
 
	/**
	 * @dataProvider absolutize_tests
	 */
	public function testAbsolutizeString($base, $relative, $expected)
	{
		$base = new SimplePie_IRI($base);
		$this->assertEquals($expected, SimplePie_IRI::absolutize($base, $relative)->get_iri());
	}
 
	/**
	 * @dataProvider absolutize_tests
	 */
	public function testAbsolutizeObject($base, $relative, $expected)
	{
		$base = new SimplePie_IRI($base);
		$expected = new SimplePie_IRI($expected);
		$this->assertEquals($expected, SimplePie_IRI::absolutize($base, $relative));
	}
	
	public static function normalization_tests()
	{
		return array(
			array('example://a/b/c/%7Bfoo%7D', 'example://a/b/c/%7Bfoo%7D'),
			array('eXAMPLE://a/./b/../b/%63/%7bfoo%7d', 'example://a/b/c/%7Bfoo%7D'),
			array('example://%61/', 'example://a/'),
			array('example://%41/', 'example://a/'),
			array('example://A/', 'example://a/'),
			array('example://a/', 'example://a/'),
			array('example://%25A/', 'example://%25a/'),
			array('https://EXAMPLE.com/', 'https://example.com/'),
			array('https://example.com/', 'https://example.com/'),
			array('https://example.com:', 'https://example.com/'),
			array('https://example.com:80', 'https://example.com/'),
			array('https://@example.com', 'https://@example.com/'),
			array('https://', 'https://'),
			array('https://example.com?', 'https://example.com/?'),
			array('https://example.com#', 'https://example.com/#'),
			array('https://example.com/', 'https://example.com/'),
			array('https://example.com:', 'https://example.com/'),
			array('https://@example.com', 'https://@example.com/'),
			array('https://example.com?', 'https://example.com/?'),
			array('https://example.com#', 'https://example.com/#'),
			array('file://localhost/foobar', 'file:/foobar'),
			array('https://[0:0:0:0:0:0:0:1]', 'https://[::1]/'),
			array('https://[2001:db8:85a3:0000:0000:8a2e:370:7334]', 'https://[2001:db8:85a3::8a2e:370:7334]/'),
			array('https://[0:0:0:0:0:ffff:c0a8:a01]', 'https://[::ffff:c0a8:a01]/'),
			array('https://[ffff:0:0:0:0:0:0:0]', 'https://[ffff::]/'),
			array('https://[::ffff:192.0.2.128]', 'https://[::ffff:192.0.2.128]/'),
			array('https://[invalid]', 'http:'),
			array('https://[0:0:0:0:0:0:0:1]:', 'https://[::1]/'),
			array('https://[0:0:0:0:0:0:0:1]:80', 'https://[::1]/'),
			array('https://[0:0:0:0:0:0:0:1]:1234', 'https://[::1]:1234/'),
			// Punycode decoding helps with normalisation of IRIs, but is not
			// needed for URIs, so we don't really care about it here
			//array('https://xn--tdali-d8a8w.lv', 'https://tūdaliņ.lv'),
			//array('https://t%C5%ABdali%C5%86.lv', 'https://tūdaliņ.lv'),
			array('https://Aa@example.com', 'https://Aa@example.com/'),
			array('https://example.com?Aa', 'https://example.com/?Aa'),
			array('https://example.com/Aa', 'https://example.com/Aa'),
			array('https://example.com#Aa', 'https://example.com/#Aa'),
			array('https://[0:0:0:0:0:0:0:0]', 'https://[::]/'),
			array('http:.', 'http:'),
			array('http:..', 'http:'),
			array('http:./', 'http:'),
			array('http:../', 'http:'),
			array('https://example.com/%3A', 'https://example.com/%3A'),
			array('https://example.com/:', 'https://example.com/:'),
			array('https://example.com/%C2', 'https://example.com/%C2'),
			array('https://example.com/%C2a', 'https://example.com/%C2a'),
			array('https://example.com/%C2%00', 'https://example.com/%C2%00'),
			array('https://example.com/%C3%A9', 'https://example.com/é'),
			array('https://example.com/%C3%A9%00', 'https://example.com/é%00'),
			array('https://example.com/%C3%A9cole', 'https://example.com/école'),
			array('https://example.com/%FF', 'https://example.com/%FF'),
			array("https://example.com/\xF3\xB0\x80\x80", 'https://example.com/%F3%B0%80%80'),
			array("https://example.com/\xF3\xB0\x80\x80%00", 'https://example.com/%F3%B0%80%80%00'),
			array("https://example.com/\xF3\xB0\x80\x80a", 'https://example.com/%F3%B0%80%80a'),
			array("https://example.com?\xF3\xB0\x80\x80", "https://example.com/?\xF3\xB0\x80\x80"),
			array("https://example.com?\xF3\xB0\x80\x80%00", "https://example.com/?\xF3\xB0\x80\x80%00"),
			array("https://example.com?\xF3\xB0\x80\x80a", "https://example.com/?\xF3\xB0\x80\x80a"),
			array("https://example.com/\xEE\x80\x80", 'https://example.com/%EE%80%80'),
			array("https://example.com/\xEE\x80\x80%00", 'https://example.com/%EE%80%80%00'),
			array("https://example.com/\xEE\x80\x80a", 'https://example.com/%EE%80%80a'),
			array("https://example.com?\xEE\x80\x80", "https://example.com/?\xEE\x80\x80"),
			array("https://example.com?\xEE\x80\x80%00", "https://example.com/?\xEE\x80\x80%00"),
			array("https://example.com?\xEE\x80\x80a", "https://example.com/?\xEE\x80\x80a"),
			array("https://example.com/\xC2", 'https://example.com/%C2'),
			array("https://example.com/\xC2a", 'https://example.com/%C2a'),
			array("https://example.com/\xC2\x00", 'https://example.com/%C2%00'),
			array("https://example.com/\xC3\xA9", 'https://example.com/é'),
			array("https://example.com/\xC3\xA9\x00", 'https://example.com/é%00'),
			array("https://example.com/\xC3\xA9cole", 'https://example.com/école'),
			array("https://example.com/\xFF", 'https://example.com/%FF'),
			array("https://example.com/\xFF%00", 'https://example.com/%FF%00'),
			array("https://example.com/\xFFa", 'https://example.com/%FFa'),
			array('https://example.com/%61', 'https://example.com/a'),
			array('https://example.com?%26', 'https://example.com/?%26'),
			array('https://example.com?%61', 'https://example.com/?a'),
			array('///', '///'),
		);
	}
 
	/**
	 * @dataProvider normalization_tests
	 */
	public function testStringNormalization($input, $output)
	{
		$input = new SimplePie_IRI($input);
		$this->assertEquals($output, $input->get_iri());
	}
 
	/**
	 * @dataProvider normalization_tests
	 */
	public function testObjectNormalization($input, $output)
	{
		$input = new SimplePie_IRI($input);
		$output = new SimplePie_IRI($output);
		$this->assertEquals($output, $input);
	}

	public static function uri_tests() {
		return array(
			array('https://example.com/%C3%A9cole', 'https://example.com/%C3%A9cole'),
			array('https://example.com/école', 'https://example.com/%C3%A9cole'),
			array("https://example.com/\xC3\xA9cole", 'https://example.com/%C3%A9cole'),
		);
	}

	/**
	 * @dataProvider uri_tests
	 */
	public function testURIConversion($input, $output)
	{
		$input = new SimplePie_IRI($input);
		$this->assertEquals($output, $input->get_uri());
	}
	
	public static function equivalence_tests()
	{
		return array(
			array('https://É.com', 'https://%C3%89.com'),
		);
	}
 
	/**
	 * @dataProvider equivalence_tests
	 */
	public function testObjectEquivalence($input, $output)
	{
		$input = new SimplePie_IRI($input);
		$output = new SimplePie_IRI($output);
		$this->assertEquals($output, $input);
	}
	
	public static function not_equivalence_tests()
	{
		return array(
			array('https://example.com/foo/bar', 'https://example.com/foo%2Fbar'),
		);
	}
 
	/**
	 * @dataProvider not_equivalence_tests
	 */
	public function testObjectNotEquivalence($input, $output)
	{
		$input = new SimplePie_IRI($input);
		$output = new SimplePie_IRI($output);
		$this->assertNotEquals($output, $input);
	}

	public function testInvalidAbsolutizeBase()
	{
		$this->assertFalse(SimplePie_IRI::absolutize('://not a URL', '../'));
	}

	public function testInvalidAbsolutizeRelative()
	{
		$this->assertFalse(SimplePie_IRI::absolutize('https://example.com/', 'https://example.com//not a URL'));
	}

	public function testFullGamut()
	{
		$iri = new SimplePie_IRI();
		$iri->scheme = 'http';
		$iri->userinfo = 'user:password';
		$iri->host = 'example.com';
		$iri->path = '/test/';
		$iri->fragment = 'test';

		$this->assertEquals('http', $iri->scheme);
		$this->assertEquals('user:password', $iri->userinfo);
		$this->assertEquals('example.com', $iri->host);
		$this->assertEquals(80, $iri->port);
		$this->assertEquals('/test/', $iri->path);
		$this->assertEquals('test', $iri->fragment);
	}

	public function testReadAliased()
	{
		$iri = new SimplePie_IRI();
		$iri->scheme = 'http';
		$iri->userinfo = 'user:password';
		$iri->host = 'example.com';
		$iri->path = '/test/';
		$iri->fragment = 'test';

		$this->assertEquals('http', $iri->ischeme);
		$this->assertEquals('user:password', $iri->iuserinfo);
		$this->assertEquals('example.com', $iri->ihost);
		$this->assertEquals(80, $iri->iport);
		$this->assertEquals('/test/', $iri->ipath);
		$this->assertEquals('test', $iri->ifragment);
	}

	public function testWriteAliased()
	{
		$iri = new SimplePie_IRI();
		$iri->scheme = 'http';
		$iri->iuserinfo = 'user:password';
		$iri->ihost = 'example.com';
		$iri->ipath = '/test/';
		$iri->ifragment = 'test';

		$this->assertEquals('http', $iri->scheme);
		$this->assertEquals('user:password', $iri->userinfo);
		$this->assertEquals('example.com', $iri->host);
		$this->assertEquals(80, $iri->port);
		$this->assertEquals('/test/', $iri->path);
		$this->assertEquals('test', $iri->fragment);
	}

	/**
	 * @expectedException PHPUnit_Framework_Error_Notice
	 */
	public function testNonexistantProperty()
	{
		$iri = new SimplePie_IRI();
		$this->assertFalse(isset($iri->nonexistant_prop));
		$should_fail = $iri->nonexistant_prop;
	}

	public function testBlankHost()
	{
		$iri = new SimplePie_IRI('https://example.com/a/?b=c#d');
		$iri->host = null;

		$this->assertEquals(null, $iri->host);
		$this->assertEquals('http:/a/?b=c#d', (string) $iri);
	}

	public function testBadPort()
	{
		$iri = new SimplePie_IRI();
		$iri->port = 'example';

		$this->assertEquals(null, $iri->port);
	}
}


?>