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
        $this->assertRegExp(PisProvider::UNFORMATTED_PATTERN_PIS, $pis);
    }

    /**
     * @test
     * @use ::pis
     */
    public function shouldReturnAValidPis()
    {
        $pis = PisProvider::pis();
        $numberAsArray = str_split($pis);

        $expected = PisProvider::calculateVerifierDigit($numberAsArray);

        $this->assertEquals($expected[10], $numberAsArray[10]);
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

    /**
     * @test
     * @use ::pis
     */
    public function shouldReturnAValidPisUsingSubtractionAsVerifierDigit()
    {
        $pis = 56981723247;
        $numberAsArray = str_split($pis);

        $expected = PisProvider::calculateVerifierDigit($numberAsArray);

        $this->assertEquals(7, $expected[10]);
    }

    /**
     * @test
     * @use ::pis
     */
    public function shouldReturnAValidPisUsingZeroAsVerifierDigit()
    {
        $pis = 42260133170;
        $numberAsArray = str_split($pis);

        $expected = PisProvider::calculateVerifierDigit($numberAsArray);

        $this->assertEquals(0, $expected[10]);
    }

}
