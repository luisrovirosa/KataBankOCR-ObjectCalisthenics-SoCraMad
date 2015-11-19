<?php

namespace KataBank\Test;

use KataBank\DigitParser;
use KataBank\Digits;
use KataBank\Input;
use KataBank\InputParser;
use KataBank\Number;
use KataBank\NumberFactory;
use Prophecy\Argument;

class InputParserTest extends BaseTest
{
    // TODO: Setup
    /** @test */
    public function should_parse_input_lines()
    {
        $this->markTestIncomplete('Not yet');
        $inputParser = new InputParser(new DigitParser(), new NumberFactory());
        $input = new Input($this->stringNumber123456789());

        $number = $inputParser->parse($input);

        $this->assertEquals(new Number(123456789), $number);
    }

    /** @test */
    public function should_use_the_digit_parser()
    {
        $digitParserProphecy = $this->prophesize('KataBank\DigitParser');
        $digits = new Digits([]);
        $digitParserProphecy->parse(Argument::any())->willReturn($digits);

        /** @var DigitParser $digitParser */
        $digitParser = $digitParserProphecy->reveal();
        $numberFactoryProphecy = $this->prophesize('KataBank\NumberFactory');
        /** @var NumberFactory $numberFactory */
        $numberFactory = $numberFactoryProphecy->reveal();
        $inputParser = new InputParser($digitParser, $numberFactory);

        $inputParser->parse($this->stringNumber123456789());
        $digitParserProphecy->parse($this->stringNumber123456789())->shouldHaveBeenCalled();
    }

    /** @test */
    public function should_use_the_number_factory()
    {
        $digitParserProphecy = $this->prophesize('KataBank\DigitParser');
        $digits = new Digits([]);
        $digitParserProphecy->parse(Argument::any())->willReturn($digits);
        /** @var DigitParser $digitParser */
        $digitParser = $digitParserProphecy->reveal();

        $numberFactoryProphecy = $this->prophesize('KataBank\NumberFactory');
        /** @var NumberFactory $numberFactory */
        $numberFactory = $numberFactoryProphecy->reveal();
        $inputParser = new InputParser($digitParser, $numberFactory);

        $inputParser->parse($this->stringNumber123456789());

        $numberFactoryProphecy->buildFrom($digits)->shouldHaveBeenCalled();
    }

}