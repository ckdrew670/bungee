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

    public function testSmoosh() {
        $this->assertEquals("Hello world", $this->str->smoosh('Hello', ' world'));
    }

    public function testGoHalves() {
        $this->assertEquals(['Hello', 'World!'], $this->str->goHalves('Hello World!', 6, true));
    }
}