<?php

namespace Bungee;

use PHPUnit\Framework\TestCase;
use Bungee\Strings;

class StringsTest extends TestCase
{
    private $str;

    public function setUp() : void
    {
        parent::setUp();
        $this->str = new Strings();
    }

    public function testConcat() {
        $this->assertEquals("Hello world", Strings::concat('Hello', ' world'));
    }
}