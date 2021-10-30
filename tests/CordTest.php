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

    public function testJoinWords() {
        $this->assertEquals("Hello world", $this->str->joinWords('Hello', ' world'));
    }

    public function testGoHalves() {
        $this->assertEquals(['Hello', 'World!'], $this->str->goHalves('Hello World!', 6, true));
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

    public function testIDontWantThis() {
        $this->assertEquals('the quick brown fo', $this->str->iDontWantThis('The quick brown fox', 'x'));
    }  
}