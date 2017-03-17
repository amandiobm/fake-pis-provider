<?php

namespace AmandioMagalhaes\Faker;

use Faker\Provider\Base as Base_Provider;

/**
 * PIS provider for Faker.
 *
 * @author Amandio Magalhaes <amandio.magalhaes@gmail.com>
 *
 */
class PisProvider extends Base_Provider
{
    /**
     * @param bool $formatted
     *
     * @return bool
     */
    public static function pis($formatted = false)
    {
        return $formatted;
    }
}
