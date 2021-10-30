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

    public function testJoinUp() {
        $this->assertEquals("Hello world", $this->str->joinUp('Hello', ' world'));
    }

    public function testSplitInTwo() {
        $this->assertEquals(['Hello', 'World!'], $this->str->splitInTwo('Hello World!', 6, true));
    }

    public function testStickToFront() {
        $this->assertEquals('Hello, Hello world', $this->str->stickToFront('Hello world', 'Hello, '));
    }

    public function testStickToEnd() {
        $this->assertEquals('Hello worldy', $this->str->stickToEnd('Hello world', 'y'));
    }

    public function testShout() {
        $this->assertEquals('HELLO WORLD', $this->str->shout('Hello world'));
    }

    public function testWhisper() {
        $this->assertEquals('hello world', $this->str->whisper('Hello woRld'));
    }

    public function testgetOuttaHere() {
        $this->assertEquals('The quick brown fo', $this->str->getOuttaHere('The quick brown fox', 'x'));
    }  

    public function testgetOuttaHereWithLongerString() {
        $this->assertEquals('The quick brown fox', $this->str->getOuttaHere('The quick brown fox jumps', ' jumps'));
    } 

    public function testgetOuttaHereWithNumber() {
        $this->assertEquals('The uick brown fox', $this->str->getOuttaHere('The quick brown fox', 5));
    } 

    public function testgetOuttaHereWithNumberRange() {
        $this->assertEquals('The brown fox', $this->str->getOuttaHere('The quick brown fox', 5, 10));
    } 

    public function testgetOuttaHereRemovesAllInstances() {
        $this->assertEquals('The quick brwn fx', $this->str->getOuttaHere('The quick brown fox', 'o'));
    }
}