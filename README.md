# Bungee

A Composer package for string manipulation. This is a project built for personal use to learn about creating composer packages and as a reminder of OOP.

# How to install

Coming soon ...

# Wiki

Bungee uses a `Cord` class with the following methods for manipulating strings:

## joinUp() - concatenate two strings

Concatenates two strings

```
joinUp($str1, $str2);

// Example:

joinUp('Hello', ' World'); // --> Hello World
```
---

## splitInTwo() - split a string into two array items at a given character position

Split a string into two array items at a given character position, option to remove the character where the strings are split.
Separator should be an integer value, $removeCharacterOption should be a boolean (default = false).

```
splitInTwo($string, $separator, $removeCharacterOption)

splitInTwo('Hello World!', 6, true); // --> ['Hello', 'World']
```
---
