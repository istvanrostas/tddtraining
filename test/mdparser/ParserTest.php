<?php

require_once '../../src/mdparser/Parser.php';

class ParserTest extends PHPUnit_Framework_TestCase
{


    private $parser;

    public function setUp()
    {
        $this->parser = new Parser();
    }


    public function testBoldString()
    {

        $this->assertEquals('<strong>text</strong>', $this->parser->parse('**text**'));
        $this->assertEquals('<strong>text1</strong><strong>text2</strong>', $this->parser->parse('**text1****text2**'));
        $this->assertEquals('<strong>text1*text2</strong>', $this->parser->parse('**text1*text2**'));
        $this->assertEquals(false, $this->parser->parse('*text1**'));
        $this->assertEquals('text1<strong>text2</strong>text3', $this->parser->parse('text1**text2**text3'));

    }


    public function testInlineString()
    {
        $this->assertEquals("<pre>text</pre>", $this->parser->parse('`text`'));
        $this->assertEquals("<pre>text1</pre><pre>text2</pre>", $this->parser->parse('`text1``text2`'));
    }

    public function testItalicString()
    {
        $this->assertEquals("<i>text</i>", $this->parser->parse('_text_'));
        $this->assertEquals("<i>text1</i><i>text2</i>", $this->parser->parse('_text1__text2_'));
    }

    public function testBoldWithInline()
    {
        $this->assertEquals('<strong><pre>text</pre></strong>', $this->parser->parse('**`text`**'));
        $this->assertEquals('<strong>text1</strong>text2<pre>text3</pre>', $this->parser->parse('**text1**text2`text3`'));
        $this->assertEquals(false, $this->parser->parse('**text1*text2`text3`'));
        $this->assertEquals(false, $this->parser->parse('**text`**'));
    }

    public function testItalicWithInline()
    {
        $this->assertEquals('<i><pre>text</pre></i>', $this->parser->parse('_`text`_'));
        $this->assertEquals('<strong>text1</strong>text2<i>text3</i>', $this->parser->parse('**text1**text2_text3_'));
        $this->assertEquals(false, $this->parser->parse('**text1**text2_text3'));
        $this->assertEquals(false, $this->parser->parse('*text__**'));
    }
}