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
    * GO HALVES
    * Split a string into two array items at a given character, option to remove the character where the strings are split. Without options, string will be split in two exactly
    **/

    public function goHalves($string, $splitter = false, $removeSplitter = false) : array
    {
        $strOne = $splitter ? ($removeSplitter ? substr((substr($string, 0, $splitter)), 0, -1) : substr($string, 0, $splitter)) : substr($string, 0, strlen($string)/2);
        $strTwo = $splitter ? substr($string, $splitter) : substr($string, strlen($string)/2);
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

    /*
    * CAPITALISE
    * Capitalise first letter of a string. Second option passed true or false allows you to capitalise all words in the string
    **/

    public function capitalise($string, $all = false) : string
    {
        return $all ? ucwords($string) : ucfirst($string);
    }

    /*
    * CAMELISE
    * Make a string camel case
    **/

    public function camelise($string) : string
    {
        $camelised = str_replace(" ", "", lcfirst(ucwords(($string))));
        return $camelised;
    }
}
