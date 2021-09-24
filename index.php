<?php

namespace PhpNwSykes;

require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";
include "./src/RomanNumeral.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$positiveTests = [
    'X' => 10,
    'IX' => 9,
    'V' => 5,
    'IV' => 4,
    'MMX' => 2010,
    'III' => 3,
    'CD' => 400,
    'N' => 0,
];

$negativeTests = [
    'Bad',
    'XI Something',
    'Something MM',
    '-X',
    ''
];

$i = new ArabicNumeral(7);

echo "<h1>The numeral " . $i->ConvertToRoman() . "</h1>";

$a = new RomanNumeral("XIV");

echo "<h1>The numeral " . $a->toInt() . "</h1>";

?>
    <h2>Valid Tests</h2>
    <?php
foreach ($positiveTests as $numerial => $expected) {
    printf(
        '<p>%s should be %s - Result %s</p>',
        $numerial,
        $expected,
        ((new RomanNumeral($numerial))->toInt() === $expected) ? 'PASS' : 'FAIL'
    );
}
?>
    <h2>Invalid Tests</h2>
    <?php
foreach ($negativeTests as $numerial) {
    $exception = false;
    try {
        (new RomanNumeral($numerial))->toInt();
    } catch (\Exception $e) {
        $exception = true;
    }
    printf(
        '<p>%s should throw exception - Result %s <u> Error: %s</u> </p>',
        $numerial,
        $exception ? 'PASS' : 'FAIL',
        $e->getMessage()
    );
}
