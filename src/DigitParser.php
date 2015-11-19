<?php

namespace KataBank;

class DigitParser
{
    /**
     * @param $numberAsString
     * @return Digits
     */
    public function parse($numberAsString)
    {
        $digits = array();
        $lines = explode("\n", $numberAsString);
        $numberOfDigits = strlen($lines[0]) / 3;
        for ($i = 0; $i < $numberOfDigits; $i++) {
            $rawDigit = substr($lines[0], $i * 3, 3);
            $rawDigit .= substr($lines[1], $i * 3, 3);
            $rawDigit .= substr($lines[2], $i * 3, 3);
            $rawDigit .= substr($lines[3], $i * 3, 3);
            $digit = new Digit($rawDigit);
            $digits[] = $digit;
        }

        return new Digits($digits);
    }
}