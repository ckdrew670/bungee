<?php

namespace Bungee;

class Strings 
{
    protected string $str;

    public function __toString() : string
    {
        return $this->str;
    }

    public static function concat($first, $second) : string
    {
        $instance = new static();
        $instance->str = $first . $second;
        return $instance;
    }
}
