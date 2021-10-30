<?php

namespace Bungee;

class Cord
{
    protected string $str;

    public function __toString() : string
    {
        return $this->str;
    }

    /* 
    * SMOOSH 
    * Concatenate two strings
    **/

    public function smoosh($first, $second) : string
    {
        return $first . $second;
    }

    /* 
    * GO HALVES
    * Split a string into two array items at a given character, option to remove the character where the strings are split
    **/

    public function goHalves($string, $splitter, $removeSplitter = false) : array
    {
        $strOne = $removeSplitter ? substr((substr($string, 0, $splitter)), 0, -1) : substr($string, 0, $splitter);
        $strTwo = substr($string, $splitter);
        return array($strOne, $strTwo);
    }

    /* 
    * STICK TO FRONT
    * Prepend a string to another string
    **/

    public function stickToFront($string, $front) : string
    {
        return $front . $string;
    }

    /* 
    * STICK TO END
    * Append a string to another string
    **/

    public function stickToEnd($string, $end) : string
    {
        return $string . $end;
    }
}
