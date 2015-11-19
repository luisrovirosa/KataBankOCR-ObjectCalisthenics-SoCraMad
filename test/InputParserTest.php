<?php

namespace KataBank\Test;

use KataBank\Input;
use KataBank\InputParser;
use KataBank\Number;

class InputParserTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function should_parse_input_lines()
    {
        $this->markTestIncomplete('Not yet');
        $inputParser = new InputParser();
        $input = new Input(
            "    _  _     _  _  _  _  _ \n" .
            "  | _| _||_||_ |_   ||_||_|\n" .
            "  ||_  _|  | _||_|  ||_| _|\n" .
            "                           \n "
        );

        $number = $inputParser->parse($input);

        $this->assertEquals(new Number(123456789), $number);
    }
}