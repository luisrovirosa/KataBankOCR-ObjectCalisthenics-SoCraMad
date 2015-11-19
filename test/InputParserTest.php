<?php

namespace KataBank\Test;

use KataBank\DigitParser;
use KataBank\Input;
use KataBank\InputParser;
use KataBank\Number;

class InputParserTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function should_parse_input_lines()
    {
        $this->markTestIncomplete('Not yet');
        $inputParser = new InputParser(new DigitParser());
        $input = new Input($this->stringNumber123456789());

        $number = $inputParser->parse($input);

        $this->assertEquals(new Number(123456789), $number);
    }

    /** @test */
    public function should_use_the_digit_parser()
    {
        $digitParserProphecy = $this->prophesize('KataBank\DigitParser');
        /** @var DigitParser $digitParser */
        $digitParser = $digitParserProphecy->reveal();
        $inputParser = new InputParser($digitParser);

        $inputParser->parse($this->stringNumber123456789());

        $digitParserProphecy->parse($this->stringNumber123456789())->shouldHaveBeenCalled();
    }

    /**
     * @return string
     */
    private function stringNumber123456789()
    {
        return
            "    _  _     _  _  _  _  _ \n" .
            "  | _| _||_||_ |_   ||_||_|\n" .
            "  ||_  _|  | _||_|  ||_| _|\n" .
            "                           \n ";
    }
}