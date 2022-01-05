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

    public function prepend($string, $front, $check = false) : string
    {
        if($check) {
            return Str::start($string, $front);
        }
        return $front . $string;
    }

    /* 
    * APPEND
    * Append a string to another string
    **/

    public function append($string, $end, $check = false) : string
    {
        if($check) {
            return Str::finish($string, $end);
        }
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

    public function contains($string, $substrings, $all = false) : bool
    {   
        if($all) {
            return Str::containsAll($string, $substrings);
        }
        return Str::contains($string, $substrings);
    }

    /*
    * KEBAB
    * Change a string to kebab case
    **/

    public function kebab($string) : string
    {   
        if(Str::contains($string, '_')) {
            $hyphenated = preg_replace('/\_/', '-', $string);
            return Str::kebab($hyphenated);
        } else {
            return Str::kebab($string);
        }
    }

    /*
    * LENGTH
    * Returns the length of a string
    **/

    public function length($string) : int
    {   
        return strlen($string);
    }

    /*
    * EXCERPT
    * Truncates a string to a given number of characters with option to add a custom appended string (default ...)
    **/

    public function excerpt($string, $limit, $after = ' ...') : string
    {   
        return Str::limit($string, $limit, $after);
    }

     /*
    * PLURAL
    * Pluralises a string
    **/

    public function plural($string) : string
    {   
        return Str::plural($string);
    }

     /*
    * SINGULAR
    * Singularises a string
    **/

    public function singular($string) : string
    {   
        return Str::singular($string);
    }

    /*
    * WORDLIMIT
    * Truncates a string to a given number of words with option to add a custom appended string (default ...)
    **/

    public function wordLimit($string, $limit, $after = ' ...') : string
    {   
        $strArray = explode(' ', $string);
        $clipped = array_slice($strArray, 0, $limit, true);
        $excerpt = implode(' ', $clipped) . $after;
        return $excerpt;
    }

    /*
    * WORDCOUNT
    * Returns the number of words in a string
    **/

    public function wordCount($string) : string
    {   
        return str_word_count($string);
    }

    /*
    * REPLACE
    * Replaces a substring with another substring
    **/

    public function replace($string, $original, $replacement) : string
    {   
        if(is_array($replacement)) {
            return Str::replaceArray($original, $replacement, $string);
        }
        return Str::replace($original, $replacement, $string);
    }

     /*
    * SLUG
    * Change a string to a slug friendly string
    **/

    public function slug($string) : string
    {   
        return Str::slug($string);
    }

     /*
    * SNAKE
    * Make string snake case
    **/

    public function snake($string) : string
    {   
        if(Str::contains($string, '-')) {
            $hyphenated = preg_replace('/\-/', '_', $string);
            return Str::snake($hyphenated);
        } else {
            return Str::snake($string);
        }
    }

     /*
    * URLENCODE
    * Encode special characters for URL
    **/

    public function urlEncode($string) : string
    {   
        return urlencode($string);
    }

      /*
    * URLDECODE
    * Dencode special characters for URL
    **/

    public function urlDecode($string) : string
    {   
        return urldecode($string);
    }
}
