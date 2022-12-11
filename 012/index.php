<?php

// 1. 
print_r(range(0,29));

echo '<br>';

foreach (range(0,29) as $masyvas){
$masyvasRand[$masyvas] = rand(5,25);
}

print_r ($masyvasRand);

// 2. a
echo '<br>';

$didesni10 = 0;
foreach ($masyvasRand as $numbers){
if ($numbers > 10){
    $didesni10++;
}
}

print_r($didesni10);

// b.
echo '<br>';
foreach ($masyvasRand as $index => $number){
 $maxNumber = max($masyvasRand);
}
echo $maxNumber;

echo '<br>';
$key = array_search(max($masyvasRand), $masyvasRand);

echo $key;
// c.

echo '<br>-----------------c';
$countEvenValue = 0;
foreach ($masyvasRand as $index => $number){
 if($index % 2 === 0){
    $countEvenValue =+ $number;
 }
}
echo '<br>';
echo $countEvenValue;

echo '<br>';
echo $index;