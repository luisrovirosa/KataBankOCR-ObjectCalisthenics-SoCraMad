<?php

namespace KataBank\Test;

abstract class BaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return string
     */
    protected function stringNumber123456789()
    {
        return
            "    _  _     _  _  _  _  _ \n" .
            "  | _| _||_||_ |_   ||_||_|\n" .
            "  ||_  _|  | _||_|  ||_| _|\n" .
            "                           \n ";
    }
}