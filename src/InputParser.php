<?php

namespace KataBank;

class InputParser
{
    /**
     * @var DigitParser
     */
    private $digitParser;

    /**
     * InputParser constructor.
     * @param DigitParser $parser
     */
    public function __construct(DigitParser $parser)
    {
        $this->digitParser = $parser;
    }

    /**
     * @param $input
     * @return Number
     */
    public function parse($input)
    {
        $this->digitParser->parse($input);
    }
}