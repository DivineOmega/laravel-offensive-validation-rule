<?php

namespace DivineOmega\LaravelOffensiveValidationRule\Tests\Unit;

use DivineOmega\LaravelOffensiveValidationRule\Offensive;
use DivineOmega\LaravelOffensiveValidationRule\Tests\TestCase;
use Validator;

class RuleTest extends TestCase
{
    private function getValidator($value)
    {
        return Validator::make(['value' => $value], ['value' => new Offensive]);
    }

    public function testOffensiveValues()
    {
        $values = [
            'xxxSexyxxx',
            'Big-s-e-x-y',
            'D*I*C*K*s',
            'shitcrapper500',
            'c-u-n-t-asaurus'
        ];

        foreach ($values as $value) {
            $this->assertFalse($this->getValidator($value)->passes());
        }
    }

    public function testUnoffensiveValues()
    {
        $values = [
            'test',
            'user',
            'Frank',
            'Francis',
            'apple',
            'orange',
            'bananas',
            'middlesex',
            'scunthorpe'
        ];

        foreach ($values as $value) {
            $this->assertTrue($this->getValidator($value)->passes());
        }
    }
}
