<?php

namespace DivineOmega\LaravelOffensiveValidationRule\Tests\Unit;

use DivineOmega\IsOffensive\OffensiveChecker;
use DivineOmega\LaravelOffensiveValidationRule\Offensive;
use DivineOmega\LaravelOffensiveValidationRule\Tests\TestCase;
use Validator;

class RuleTest extends TestCase
{
    private function getValidator($value)
    {
        return Validator::make(['value' => $value], ['value' => new Offensive()]);
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
            'Ultim8Cun7',
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
            'scunthorpe',
        ];

        foreach ($values as $value) {
            $this->assertTrue($this->getValidator($value)->passes(), 'Failed asserting that \''.$value.'\' is not offensive.');
        }
    }

    private function getCustomBlacklistAndWhitelistValidator($value)
    {
        $blacklist = ['moist', 'stinky', 'poo'];
        $whitelist = ['poop'];

        return Validator::make(['value' => $value], ['value' => new Offensive(new OffensiveChecker($blacklist, $whitelist))]);
    }

    public function testCustomBlacklistAndWhitelist()
    {
        $passingValues = ['cheese', 'poop', 'poops'];
        $failingValues = ['moist', 'moistness', 'stinky', 'poo', 'poos'];

        foreach ($passingValues as $value) {
            $this->assertTrue($this->getCustomBlacklistAndWhitelistValidator($value)->passes());
        }

        foreach ($failingValues as $value) {
            $this->assertFalse($this->getCustomBlacklistAndWhitelistValidator($value)->passes());
        }
    }
}
