<?php

namespace Bungee;

use PHPUnit\Framework\TestCase;
use Bungee\Cord;

class CordTest extends TestCase
{
    private $str;

    public function setUp() : void
    {
        parent::setUp();
        $this->str = new Cord();
    }

    public function testJoin() {
        $this->assertEquals("Hello world", $this->str->join('Hello', ' world'));
    }

    public function testSplitWithoutOptions() {
        $this->assertEquals(['abcdef', 'ghijkl'], $this->str->split('abcdefghijkl'));
    }

    public function testSplit() {
        $this->assertEquals(['Hello', 'Worlds!'], $this->str->split('Hello Worlds!', 6, true));
    }

    public function testPrepend() {
        $this->assertEquals('Hello, Hello world', $this->str->prepend('Hello world', 'Hello, '));
    }

    public function testAppend() {
        $this->assertEquals('Hello worldy', $this->str->append('Hello world', 'y'));
    }

    public function testUpper() {
        $this->assertEquals('HELLO WORLD', $this->str->upper('Hello world'));
    }

    public function testLower() {
        $this->assertEquals('hello world', $this->str->lower('Hello woRld'));
    }

    public function testremove() {
        $this->assertEquals('The quick brown fo', $this->str->remove('The quick brown fox', 'x'));
    }  

    public function testremoveWithLongerString() {
        $this->assertEquals('The quick brown fox', $this->str->remove('The quick jumps brown fox jumps', ' jumps'));
    } 

    public function testremoveWithNumber() {
        $this->assertEquals('The uick brown fox', $this->str->remove('The quick brown fox', 5));
    } 

    public function testremoveWithNumberRange() {
        $this->assertEquals('The brown fox', $this->str->remove('The quick brown fox', 5, 10));
    } 

    public function testremoveRemovesAllInstances() {
        $this->assertEquals('The quick brwn fx', $this->str->remove('The quick brown fox', 'o'));
    }

    public function testCapitalise() {
        $this->assertEquals('Hello world', $this->str->capitalise('hello world'));
    }

    public function testCapitaliseAll() {
        $this->assertEquals('Hello There World', $this->str->capitalise('hello there world', true));
    }

    public function testCamel() {
        $this->assertEquals('helloWorld', $this->str->camel('Hello World'));
    }

    public function testCamelNotCapitals() {
        $this->assertEquals('helloWorld', $this->str->camel('hello_world'));
    }

    public function testCamelWithSnakes() {
        $this->assertEquals('helloWorld', $this->str->camel('hello-world'));
    }

    public function testContains() {
        $this->assertEquals(true, $this->str->contains('Hey there world', 'there'));
    }

    public function testContainsWithMultiple() {
        $this->assertEquals(true, $this->str->contains('Hey there world', ['there', 'world']));
    }

    public function testContainsWithMultipleChars() {
        $this->assertEquals(true, $this->str->contains('Hey there world', ['d', 'g']));
    }

    public function testContainsWithFail() {
        $this->assertEquals(false, $this->str->contains('Hey there world', 'donkey'));
    }

    public function testContainsAll() {
        $this->assertEquals(false, $this->str->contains('Hey there world', ['Hey', 'World'], true));
    }

    public function testKebab() {
        $this->assertEquals('hello-world', $this->str->kebab('Hello world'));
    }

    public function testKebabWithCamel() {
        $this->assertEquals('hello-world', $this->str->kebab('helloWorld'));
    }

    public function testKebabWithSnake() {
        $this->assertEquals('hello-there-world', $this->str->kebab('hello_there_world'));
    }

    public function testLength() {
        $this->assertEquals(11, $this->str->length('hello world'));
    }

    public function testExcerpt() {
        $this->assertEquals('The quick brown fox jumps over ...', $this->str->excerpt('The quick brown fox jumps over the lazy dog', 30));
    }

    public function testExcerptWithDifferentAppend() {
        $this->assertEquals('The quick brown fox jumps over.', $this->str->excerpt('The quick brown fox jumps over the lazy dog', 30, '.'));
    }

    public function testPlural() {
        $this->assertEquals('foxes', $this->str->plural('fox'));
    }

    public function testSingular() {
        $this->assertEquals('child', $this->str->singular('children'));
    }

    public function testWordLimit() {
        $this->assertEquals('The quick brown fox ...', $this->str->wordLimit('The quick brown fox jumps over the lazy dog', 4));
    }

    public function testWordLimitAfter() {
        $this->assertEquals('The quick brown fox.', $this->str->wordLimit('The quick brown fox jumps over the lazy dog', 4, '.'));
    }

    public function testWordCount() {
        $this->assertEquals(9, $this->str->wordCount('The quick brown fox jumps over the lazy dog'));
    }

    public function testReplace() {
        $this->assertEquals('Hello Miss World', $this->str->replace('Hello there World', 'there', 'Miss'));
    }

    public function testReplaceAllInstances() {
        $this->assertEquals('a quick brown fox jumped over a lazy dog', $this->str->replace('the quick brown fox jumped over the lazy dog', 'the', 'a'));
    }

    public function testReplaceMultipleConsecutive() {
        $this->assertEquals('a quick brown fox jumped over one lazy dog', $this->str->replace('the quick brown fox jumped over the lazy dog', 'the', ['a', 'one']));
    }

    public function testReplaceMultipleConsecutiveAgain() {
        $this->assertEquals('The event will begin between 8:30 and 9:30.', $this->str->replace('The event will begin between ? and ?.', '?', ['8:30', '9:30']));
    }
}