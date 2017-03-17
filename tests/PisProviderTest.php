<?php

namespace AmandioMagalhaes\Faker;

use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass \AmandioMagalhaes\Faker\PisProvider
 */
class PisProviderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @use ::pis
     */
    public function shouldReturnA11NumberPis()
    {
        $pis = PisProvider::pis();
        $this->assertCount(11, str_split($pis));
    }

    /**
     * @test
     * @use ::pis
     */
    public function shouldReturnAValidPis()
    {
        $pis = PisProvider::pis();
        $numberAsArray = str_split($pis);

        $result = PisProvider::calculateVerifierDigit($numberAsArray);

        $this->assertEquals($result['subtraction'], $numberAsArray[10]);
    }

    /**
     * @test
     * @use ::pis
     */
    public function shouldReturnAFormattedValidPis()
    {
        $pis = PisProvider::pis(true);

        $this->assertRegExp(PisProvider::FORMATTED_PATTERN_PIS, $pis);
    }

}
