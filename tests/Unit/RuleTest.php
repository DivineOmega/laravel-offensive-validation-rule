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
            'DICK',
            'shitcrapper500',
            'c-u-n-t-asaurus',
            'm0therfuker',
            'firstFaggot',
            'Sh1tface',
            'Twatter9000',
            'Ultim8Cun7'
        ];

        foreach ($values as $value) {
            $this->assertFalse($this->getValidator($value)->passes(), 'Failed asserting that \''.$value.'\' is offensive.');
        }
    }

    public function testNotOffensiveValues()
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
            $this->assertTrue($this->getValidator($value)->passes(), 'Failed asserting that \''.$value.'\' is not offensive.');
        }
    }
}
