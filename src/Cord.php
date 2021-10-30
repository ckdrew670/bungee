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
    * JOIN UP 
    * Concatenate two strings
    **/

    public function joinUp($first, $second) : string
    {
        return $first . $second;
    }

    /* 
    * SPLIT IN TWO
    * Split a string into two array items at a given character, option to remove the character where the strings are split
    **/

    public function splitInTwo($string, $splitter, $removeSplitter = false) : array
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

    /* 
    * SHOUT
    * Make string uppercase
    **/

    public function shout($string) : string
    {
        return strtoupper($string);
    }

    /* 
    * WHISPER
    * Make string lowercase
    **/

    public function whisper($string) : string
    {
        return strtolower($string);
    }

     /* 
    * GET OUTTA HERE
    * Remove all instances of a given string or character, or remove a character/word based on placement in string
    **/

    public function getOuttaHere($string, $removeMe, $upper = false) : string
    {
        return is_string($removeMe) ? str_replace($removeMe, '', $string) : ($upper ? substr($string, 0, $removeMe - 1) . substr($string, $upper, strlen($string) - $removeMe) : substr($string, 0, $removeMe - 1) . substr($string, $removeMe, strlen($string) - $removeMe));
    }
}
