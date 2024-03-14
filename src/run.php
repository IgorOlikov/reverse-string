<?php

use App\ReverseString;

require __DIR__ . '/../vendor/autoload.php';

$string = "Cat houSe elEpHant cat, is 'cold' now third-part can`t";

$reversedString = new ReverseString();

$reversedString = $reversedString->reverseWords($string);

print $reversedString . PHP_EOL;