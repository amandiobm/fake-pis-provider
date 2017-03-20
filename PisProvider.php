<?php

namespace AmandioMagalhaes\Faker;

use Faker\Provider\Base as Base_Provider;

/**
 * PIS provider for Faker.
 *
 * Essa função gera um número de Pispasep válido.
 *
 * Regra de Formação:
 *
 * PIS/PASEP
 *
 * O dígito verificador do PIS/PASEP é calculado através da seguinte regra:
 * O número é composto por dez dígitos mais um dígito verificador.
 * Multiplique os números, da esquerda para a direita, respectivamente por 3 2 9 8 7 6 5 4 3 2.
 * Some os resultados das multiplicações.
 * Calcule o resto da divisão da soma por 11.
 * e subtraia o resultado de 11.
 *
 * Se o resto for menor que 2 o dígito é zero, caso contrário o dígito é o próprio resultado.
 *
 * Por exemplo, para o número 1701209041-1, o cálculo seria:
 * 1x3 + 7x2 + 0x9 + 1x8 + 2x7 + 0x6 + 9x5 + 0x4 + 4x3 + 1x2 = 98.
 * O resto da divisão de 98 por 11 é 10. Como 11 - 10 = 1, o dígito é 1.
 *
 * Ex: 5936677542-1
 *
 * @author Amandio Magalhaes <amandio.magalhaes@gmail.com>
 *
 * @link http://www.clubedainformatica.com.br/site/2007/11/11/algoritmo-do-pis-programas-de-integracao-social/
 *
 */
class PisProvider extends Base_Provider
{
    const UNFORMATTED_PATTERN_PIS = '/(\d{3})(\d{5})(\d{2})(\d{1})/';
    const FORMATTED_PATTERN_PIS = '/(\d{3}).(\d{5}).(\d{2})-(\d{1})/';
    const REPLACEMENT_PIS = '$1.$2.$3-$4';

    /**
     * @param bool $formatted
     *
     * @return bool
     */
    public static function pis($formatted = false)
    {
        // Get 9 random numbers
        $randomNumberAsArray = self::getRandomNumbers();

        // Calculate DV
        $result = self::calculateVerifierDigit($randomNumberAsArray);

        // Add the verifier digit to the pis number
        $randomNumberAsArray[] = $result['remainder'] < 2
            ? 0
            : $result['subtraction'];

        //Pul all numbers together
        $pis = implode('', $randomNumberAsArray);

        if ($formatted) {
            return preg_replace(self::UNFORMATTED_PATTERN_PIS, self::REPLACEMENT_PIS, $pis);
        }

        return $pis;
    }

    /**
     * Generate 10 random numbers
     * @return array
     */
    private static function getRandomNumbers()
    {
        $randomNumberAsArray = [];

        for ($i = 0; $i < 10; $i++) {
            $randomNumberAsArray[] = self::randomDigit();
        }

        return $randomNumberAsArray;
    }

    /**
     * Please read the class description this explanation is over there
     *
     * @param $randomNumberAsArray
     *
     * @return mixed
     */
    public static function calculateVerifierDigit($randomNumberAsArray)
    {
        $digits = [3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $sum = array_sum(
            array_map(function ($randomNumber, $digit) {
                return $randomNumber * $digit;
            }, $randomNumberAsArray, $digits)
        );

        $remainder = $sum % 11;
        $subtraction = 11 - $remainder;

        return [
            'remainder'   => $remainder,
            'subtraction' => $subtraction,
        ];
    }
}