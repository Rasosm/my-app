<?php

// 1. 
// print_r(range(0,29));



echo '<br>';

foreach (range(0,29) as $masyvas){
$masyvasRand[$masyvas] = rand(5,25);
}

print_r ($masyvasRand);

// 2. a
echo '<br>2 a---------------';

$didesni10 = 0;
foreach ($masyvasRand as $numbers){
if ($numbers > 10){
    $didesni10++;
}
}

print_r($didesni10);

// b.
echo '<br>2 b--------------------';
foreach ($masyvasRand as $index => $number){
 $maxNumber = max($masyvasRand);
 if($number === $maxNumber){
    echo ('[' . $index . ']' .  $number);
 }
}
echo '<br>';
// echo $maxNumber;

echo '<br>';
// $key = array_search($maxNumber, $masyvasRand);
// echo $key;
// c.

echo '<br>2 c-----------------';
$countEvenValue = 0;
foreach ($masyvasRand as $index => $number){
 if($index % 2 === 0){
    $countEvenValue += $number;
 }
// echo $countEvenValue;
}

echo $countEvenValue;

echo '<br>2 d--------------------';
echo '<br>';

foreach (range(0,29) as $key => $masyvas1){
$naujasMasyvas[$masyvas1] = rand(5,25);
$patobulintasMasyvas[$key] = $naujasMasyvas[$masyvas1] - $key;

}
// sitas budas paprastesnis ir geras
// foreach ($masyvas as $index => $value){
//     $naujasMasyvas[] = ($value - $index);
// }


echo '<br>---naujas';
 print_r ($naujasMasyvas);
 echo '<br>---patobulintas';
 print_r ($patobulintasMasyvas);

echo '<br>2 e--------------------';
echo '<br>';
foreach(range(1,10) as $_){
    $patobulintasMasyvas[] = rand(5,25);
}
echo '<br>';
 print_r($patobulintasMasyvas);

echo '<br>';
echo '<br>2 f--------------------';
echo '<br>';
echo '<pre 2>';
// foreach($patobulintasMasyvas as $index => $val) {
//     $rez['PorNePor'][$index % 2][] = $val;
// }
// print_r($rez);

foreach ($patobulintasMasyvas as $index => $value) {
  if ($index % 2 === 0) {
    $array_even[] = $value;
  } else {
    $array_odd[] = $value;
  }
}
print_r($array_even);
echo '<br>';
print_r($array_odd);
echo '<br>masyvas is dvieju';
$arrayEvenOdd[] = $array_even;
$arrayEvenOdd[] = $array_odd;

print_r ($arrayEvenOdd);

echo '<br>';
echo '<br>3--------------------';
echo '<br>';

$raides = ["A", "B", "C", "D"];
foreach (range(1,200) as $value){
$raidesRand[$value] = $raides[array_rand($raides)];
}
print_r($raidesRand);
echo '<br>suskaiciuoti kiek raidziu';
print_r(array_count_values($raidesRand));

echo '<br>';
echo '<br>4--------------------';
echo '<br>';


// }

sort($raidesRand);
foreach ($raidesRand as $key => $val) {
    // echo "[" . $key . "] = " . $val . "\n";
}
print_r($raidesRand);

echo '<br>';
echo '<br>5--------------------';
echo '<br>';

$raides = ["A", "B", "C", "D"];
foreach (range(1,20) as $value1){
$raidesRand1[$value1] = $raides[array_rand($raides)];
}
print_r($raidesRand1);
echo '<br>';

$raides = ["A", "B", "C", "D"];
foreach (range(1,20) as $value2){
$raidesRand2[$value2] = $raides[array_rand($raides)];
}
print_r($raidesRand2);
echo '<br>';

$raides = ["A", "B", "C", "D"];
foreach (range(1,20) as $value3){
$raidesRand3[$value3] = $raides[array_rand($raides)];
}
print_r($raidesRand3);

echo '<br> masyvas is triju';

foreach ($raidesRand1 as $index => $value) {
    $raidesRand1[$index] = $raidesRand1[$index].$raidesRand2[$index].$raidesRand3[$index];
}
print_r($raidesRand1);
echo '<br>unikalus masyvas';
$unikalusMasyvas = array_unique($raidesRand1);

print_r($unikalusMasyvas);
echo '<br kiek kombinaciju>';
$kiekUnikaliuKombinaciju = count($unikalusMasyvas);

echo $kiekUnikaliuKombinaciju;

echo '<br>';
echo '<br>6--------------------';
echo '<br>';
$array1 = [];
while (count($array1) < 11) {
  $randNumber = rand(1,50);
  $isUnique = true;
foreach ($array1 as $value1) {
  if ($randNumber === $value1){
    $isUnique = false;
  }  
}
if($isUnique){
  $array1[]=$randNumber;
}
}
echo '<br>pirmas masyvas';
 print_r($array1);
echo '<br>';
echo '<br>';

echo '<br>';

$array2 = [];
while (count($array2) < 11) {
  $randNumber = rand(1,50);
  $isUnique = true;
foreach ($array2 as $value1) {
  if ($randNumber === $value1){
    $isUnique = false;
  }  
}
if($isUnique){
  $array2[]=$randNumber;
}
}
echo '<br>antras masyvas';
 print_r($array2);

echo '<br>';
echo '<br>7--------------------';
echo '<br>';

$result = array_diff($array1, $array2);
print_r($result); 

echo '<br>';
echo '<br>8--------------------';
echo '<br>';

$result1 = array_intersect($array1, $array2);
print_r($result1); 

echo '<br>';
echo '<br>9--------------------';
echo '<br>';



$result2 = array_combine($array1, $array2);
print_r($result2); 










