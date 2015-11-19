<?php

namespace KataBank;

class Digits
{
    /** @var  Digit[] */
    private $digits;

    /**
     * Digits constructor.
     * @param Digit[] $digits
     */
    public function __construct(array $digits)
    {
        $this->digits = $digits;
    }

}