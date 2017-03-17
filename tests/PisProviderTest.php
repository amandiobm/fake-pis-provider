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
    public function pisTrue()
    {
        $this->assertTrue(PisProvider::pis(true));
    }

    /**
     * @test
     * @use ::pis
     */
    public function pisFalse()
    {
        $this->assertFalse(PisProvider::pis(false));
    }

}
