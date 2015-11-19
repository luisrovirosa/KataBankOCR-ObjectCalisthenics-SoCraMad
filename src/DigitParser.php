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
     * @param $i
     * @param $numberOfLine
     * @return string
     */
    private function parseDigitLine($lines, $i, $numberOfLine)
    {
        return substr($lines[$numberOfLine], $i * 3, 3);
    }
}