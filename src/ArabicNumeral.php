<?php

namespace PhpNwSykes;

use Exception;

class ArabicNumeral
{
    public $symbols = [
            'M'  => 1000,
            'CM' => 900,
            'D'  => 500,
            'CD' => 400,
            'C'  => 100,
            'XC' => 90,
            'L'  => 50,
            'XL' => 40,
            'X'  => 10,
            'IX' => 9,
            'V'  => 5,
            'IV' => 4,
            'I' => 1,
    ];

    protected int $roman_numeral;


    public function isArabicNumber($arabic)
    {
        return is_numeric($arabic);
    }

    public function __construct(string $romanNumeral)
    {
        $this->roman_numeral = $romanNumeral;
    }

    public function convertToRoman() : string
    {
        $n = $this->roman_numeral;
        $res = '';

        //array of roman numbers

        foreach ($this->symbols as $roman => $number) {
            while ($number <= $n) {
                $res .= $roman;
                $n -= $number;
            }
        }
// Same thing
//        foreach ($romanNumber_Array as $roman => $number){
//            //divide to get  matches
//            $matches = intval($n / $number);
//
//            //assign the roman char * $matches
//            $res .= str_repeat($roman, $matches);
//
//            //substract from the number
//            $n = $n % $number;
//        }
        return $res;
    }

    /**
     * @return string
     */
    public function getNumeral(): int
    {
        return $this->roman_numeral;
    }
}
