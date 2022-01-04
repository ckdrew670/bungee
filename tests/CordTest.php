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

    public function testCamelise() {
        $this->assertEquals('helloWorld', $this->str->camelise('Hello World'));
    }

    public function testCameliseNotCapitals() {
        $this->assertEquals('helloThereWorld', $this->str->camelise('Hello there world'));
    }

    public function testCameliseWithSnakes() {
        $this->assertEquals('helloWorld', $this->str->camelise('helloWorld'));
    }
}