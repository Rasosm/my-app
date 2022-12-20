<?php

echo'<pre>';

echo '<br>';
echo '<br>1---------------';
echo '<br>';

$str = 'ku ku';
function tekstas(string $str): string
{
  return "<h1>$str</h1>";
}

echo tekstas($str);

echo '<br>';
echo '<br>2---------------';
echo '<br>';

function giveMeStr2(string $str, int $num): string
{
  if (preg_match('/[1-6]/', $num)) {
    return "<h$num>$str</h$num>";
  } else {
    return 'Tokio skaičiaus tago nėra!';
  }
};

echo giveMeStr2($str, 2);

echo '<br>';
echo '<br>3---------------';
echo '<br>';

echo '<br>';
echo '<br>4---------------';
echo '<br>';

function pirminis(int $skaicius): int
{
  $pirminiaiSum = 0;
  for ($i = 2; $i < $skaicius; $i++) {
    if ($skaicius % $i === 0) {
      $pirminiaiSum++;
    }
  }
  return $pirminiaiSum;

}

echo pirminis(573);

echo '<br>';
echo '<br>5---------------';
echo '<br>';

foreach(range(1,10) as $_){
    $masyvas33[] = rand(33,77);
}
echo '<br>';
 print_r($masyvas33);

 $masyvasBeLiekanos = [];

 foreach ($masyvas33 as $value) {
    $masyvasBeLiekanos[] = pirminis($value);
    sort($masyvasBeLiekanos);
 }

 print_r($masyvasBeLiekanos);


 echo '<br>';
echo '<br>6---------------';
echo '<br>';

foreach(range(1,20) as $_){
    $masyvas333[] = rand(333,777);
}
echo '<br>';
 print_r($masyvas333);

 foreach ($masyvas333 as $value1) {
if(pirminis($value1) !== 0){
    $masyvasBePirminiu[] = $value1;
}
 }

 print_r($masyvasBePirminiu);