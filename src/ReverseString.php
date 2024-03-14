<?php

namespace App;
class ReverseString
{

//разделители ([-],[`])
//с сохранением пунктуации [['],[,]]

 const DASH = '-';
 const APOSTROPHE = '`';

public function reverseWords($string): string
{
    $words = explode(' ', $string);

    $words = array_map(function ($word) {
        if (str_contains($word, self::DASH)) {
            $words = explode(self::DASH, $word);
            return $this->filterWords($words, self::DASH);
        } elseif (str_contains($word, self::APOSTROPHE)) {
            $words = explode(self::APOSTROPHE, $word);
            return $this->filterWords($words, self::APOSTROPHE);
        } else {
            return $this->filterWord($word);
        }
    }, $words);

    return implode(' ', $words);
}

public function filterWords(array $words, string $separator = null): string
{
    $reversed_words = [];

    foreach ($words as $word) {

        $reversed_words[] = $this->filterWord($word);
    }
    if (!is_null($separator)) {
        return implode($separator, $reversed_words);
    }
    return implode($reversed_words);
}

public function filterWord(string $word): string
{
    $reversed_word = '';
    $upperCharPositions = [];
    $symbolsArray = [];

    for ($i = strlen($word) - 1; $i >= 0; $i--) {

        $char = $word[$i];

        if (ctype_alpha($char)) {
            if (ctype_upper($char)) {
                $char = strtolower($char);
                $upperCharPositions[] = $i;
            }
            $reversed_word .= $char;
        } else {
            $symbolsArray[$i] = $char;
        }
    }

    foreach ($upperCharPositions as $position) {
        if ((count($symbolsArray)) > 1) {
            $position -= count($symbolsArray);
        }
        $charToUpper = $reversed_word[$position];
        $reversed_word[$position] = strtoupper($charToUpper);
    }

    foreach ($symbolsArray as $key => $symbol) {
        if ($key === 0) {
            $reversed_word = $symbol . $reversed_word;
        } elseif ($key === (strlen($reversed_word) - 1)) {
            $reversed_word .= $symbol;
        } else {
            $reversed_word_array = str_split($reversed_word);
            $reversed_word_array = array_merge(array_slice($reversed_word_array, 0, $key), [$key => $symbol], array_slice($reversed_word_array, $key, (strlen($reversed_word) - 1)));

            $reversed_word = implode($reversed_word_array);
        }
    }
    return $reversed_word;
}

}