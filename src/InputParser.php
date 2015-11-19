<?php

namespace KataBank;

class InputParser
{
    /**
     * @var DigitParser
     */
    private $digitParser;
    /**
     * @var NumberFactory
     */
    private $numberFactory;

    /**
     * InputParser constructor.
     * @param DigitParser $parser
     */
    public function __construct(DigitParser $parser, NumberFactory $numberFactory)
    {
        $this->digitParser = $parser;
        $this->numberFactory = $numberFactory;
    }

    /**
     * @param $input
     * @return Number
     */
    public function parse($input)
    {
        $digits = $this->digitParser->parse($input);
        $this->numberFactory->buildFrom($digits);
    }
}