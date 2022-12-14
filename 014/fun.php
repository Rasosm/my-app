<?php

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

echo giveMeStr2($str, 4);

echo '<br>';
echo '<br>2---------------';
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

echo pirminis(12);
