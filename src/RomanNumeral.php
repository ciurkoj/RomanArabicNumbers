<?php

namespace PhpNwSykes;

use Exception;

class RomanNumeral
{
    public static $symbols = array(
        'M' => 1000,
        'D' => 500,
        'C' => 100,
        'L' => 50,
        'X' => 10,
        'V' => 5,
        'I' => 1,
    );

    protected $numeral;
    public static $roman_zero = array('N', 'nulla');
    public static $roman_regex = '/^M{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/';

    public static function isRomanNumber($roman)
    {
        return preg_match(self::$roman_regex, $roman) > 0;
    }

    public function __construct(string $romanNumeral)
    {
        $this->numeral = $romanNumeral;
    }

    /**
     * Converts a roman numeral such as 'X' to a number, 10
     *
     * @throws InvalidNumeral on failure (when a numeral is invalid)
     */
    public function toInt(): int
    {
        //checking for zero values
        if (in_array($this->numeral, self::$roman_zero)) {
            return 0;
        }
        //validating string
        if ($this->numeral === '') {
            throw new Exception("Empty input.");
        } elseif (!self::isRomanNumber($this->numeral)) {
            throw new Exception("Incorrect input: \"$this->numeral\"");
        }

        $values = self::$symbols;
        $result = 0;
        //iterating through characters LTR
        for ($i = 0, $length = strlen($this->numeral); $i < $length; $i++) {
            //getting value of current char
            $value = $values[$this->numeral[$i]];
            //getting value of next char - null if there is no next char
            $nextvalue = !isset($this->numeral[$i + 1]) ? null : $values[$this->numeral[$i + 1]];
            //adding/subtracting value from result based on $nextvalue
            $result += (!is_null($nextvalue) && $nextvalue > $value) ? -$value : $value;
        }
        return $result;
    }

    /**
     * @return string
     */
    public function getNumeral(): string
    {
        return $this->numeral;
    }
}
