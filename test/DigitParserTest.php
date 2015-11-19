<?php

namespace KataBank\Test;

use KataBank\Digit;
use KataBank\DigitParser;
use KataBank\Digits;

class DigitParserTest extends BaseTest
{
    /** @test */
    public function should_return_all_digits_for_a_given_number_as_string()
    {
        $digitParser = new DigitParser();
        $digits = $digitParser->parse(
            "    _ \n" .
            "  | _|\n" .
            "  ||_ \n" .
            "      \n "
        );
        $one = new Digit(
            "   " .
            "  |" .
            "  |" .
            "   "
        );
        $two = new Digit(
            " _ " .
            " _|" .
            "|_ " .
            "   "
        );
        $digitList = [$one, $two];
        $this->assertEquals(new Digits($digitList), $digits);
    }
}