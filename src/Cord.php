<?php

namespace Bungee;

class Cord
{
    protected string $str;

    public function __toString() : string
    {
        return $this->str;
    }

    // Concatenate two strings
    public function smoosh($first, $second) : string
    {
        return $first . $second;
    }
}
