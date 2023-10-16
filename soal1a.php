<?php
$array1 = ['Satu', 'Dua', 'Tiga', 'Lima'];
$array2 = ['Tiga', 'Empat', 'Lima', 'Enam'];

$arrayBaru = array_intersect($array1, $array2);

sort($arrayBaru);

print_r($arrayBaru);

foreach ($arrayBaru as $nilai) {
    echo $nilai . ' ';
}
