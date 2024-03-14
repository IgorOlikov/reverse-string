<?php

namespace Test;

use App\ReverseString;
use PHPUnit\Framework\TestCase;

class ReverseStringTest extends TestCase
{

    public function test_string()
    {
        $expectedString = "Tac esuOh tnAhPele tac, si 'dloc' won driht-trap nac`t";
        $testString = "Cat houSe elEpHant cat, is 'cold' now third-part can`t";

        $reverseString = new ReverseString();

        $this->assertEquals($expectedString,$reverseString->reverseWords($testString));
    }
}
