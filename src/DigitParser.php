<?php

namespace KataBank;

class DigitParser
{
    const LENGTH_OF_DIGIT = 3;

    /**
     * @param $numberAsString
     * @return Digits
     */
    public function parse($numberAsString)
    {
        $digits = array();
        $lines = explode("\n", $numberAsString);
        $numberOfDigits = strlen($lines[0]) / self::LENGTH_OF_DIGIT;
        for ($i = 0; $i < $numberOfDigits; $i++) {
            $digits[] = new Digit($this->parseDigit($lines, $i));
        }

        return new Digits($digits);
    }

    /**
     * @param $lines
     * @param $positionOfDigit
     * @return string
     */
    private function parseDigit($lines, $positionOfDigit)
    {
        $rawDigit = '';
        for ($i = 0; $i < 4; $i++) {
            $rawDigit .= $this->parseDigitLine($lines, $positionOfDigit, $i);
        }

        return $rawDigit;
    }

    /**
     * @param $lines
     * @param $positionOfDigit
     * @param $numberOfLine
     * @return string
     */
    private function parseDigitLine($lines, $positionOfDigit, $numberOfLine)
    {
        return substr(
            $lines[$numberOfLine],
            $positionOfDigit * self::LENGTH_OF_DIGIT,
            self::LENGTH_OF_DIGIT
        );
    }
}