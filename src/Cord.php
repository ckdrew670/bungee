<?php

namespace Bungee;
use Illuminate\Support\Str;

class Cord
{
    protected string $str;

    public function __toString() : string
    {
        return $this->str;
    }

    /* 
    * JOIN
    * Concatenate two strings
    **/

    public function join($first, $second) : string
    {
        return $first . $second;
    }

    /* 
    * SPLIT
    * Split a string into two array items at a given character, option to remove the character where the strings are split. Without options, string will be split in two exactly
    **/

    public function split($string, $splitter = false, $removeSplitter = false) : array
    {
        $strOne = $splitter ? ($removeSplitter ? substr((substr($string, 0, $splitter)), 0, -1) : substr($string, 0, $splitter)) : substr($string, 0, strlen($string)/2);
        $strTwo = $splitter ? substr($string, $splitter) : substr($string, strlen($string)/2);
        return array($strOne, $strTwo);
    }

    /* 
    * PREPEND
    * Prepend a string to another string
    **/

    public function prepend($string, $front) : string
    {
        return $front . $string;
    }

    /* 
    * APPEND
    * Append a string to another string
    **/

    public function append($string, $end) : string
    {
        return $string . $end;
    }

    /* 
    * UPPER
    * Make string uppercase
    **/

    public function upper($string) : string
    {
        return strtoupper($string);
    }

    /* 
    * LOWER
    * Make string lowercase
    **/

    public function lower($string) : string
    {
        return strtolower($string);
    }

    /*
    * REMOVE
    * Remove all instances of a given string or character, or remove a character/word based on placement in string
    **/

    public function remove($string, $removeMe, $upper = false) : string
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
    * CAMEL
    * Make a string camel case
    **/

    public function camel($string) : string
    {
        $camelised = Str::camel($string);
        return $camelised;
    }

    /*
    * CONTAINS
    * Check if a string contains a substring
    **/

    public function contains($string, $substrings, $all = false) : string
    {   
        if($all) {
            return Str::containsAll($string, $substrings);
        }
        return Str::contains($string, $substrings);
    }
}
