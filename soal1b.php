<?php
$object1 = ['Satu', 'Dua', 'Tiga', 'Lima'];
$object2 = ['Tiga', 'Empat', 'Lima', 'Enam'];

$objectBaru = array_intersect($object1, $object2);

sort($objectBaru);

print_r($objectBaru);

foreach ($objectBaru as $nilai) {
    echo $nilai . ' ';
}
