<?php

use PhpNwSykes\ArabicNumeral;
use PHPUnit\Framework\TestCase;

class ArabicTest extends TestCase
{

    public function testConstructor()
    {
        $numeral = (new ArabicNumeral(1))->getNumeral();

        $this->assertNotEmpty($numeral);
    }

    public function testIsArabicNumber(){
        $subject = 132;
        $this->assertTrue(ArabicNumeral::isArabicNumber($subject)==1);
    }

    public function testConvertsRomanToArabic(){
        //arrange
        $numeral = new ArabicNumeral(1);

        //act
        $type = $numeral->convertToRoman();

        //assert
        $this->assertIsString($type);
    }

    public function testConvertToRoman(){
        $new_converter = new ArabicNumeral(12);
        $this->assertSame("XII", $new_converter->ConvertToRoman());
    }
    public function testGetNumeral(){
        $this->assertSame(12,(new ArabicNumeral(12))->getNumeral());
    }
}




