<?php
echo '<pre>';
// 1. 
$mas = [];
$rez =[];
foreach (range(1,10) as $_){
    $small = [];
    foreach (range(1,5) as $_){
        $small[] = rand(5,25);
    }
    $mas[] = $small;
}

print_r($mas);


// 2. 
echo '<br>';
echo '<br>2a---------------';
echo '<br>';
$didesniUz10 = 0;
foreach ($mas as $small){
    foreach($small as $value1){
          if($value1 > 10){
            $didesniUz10++;
        }
            }
}
echo '<br>';
        echo $didesniUz10;
// $mas = [];
// $rez = [];
//         $rez['a'] = 0;

// foreach($mas as $small) {
//     foreach($small as $val) {
//         $rez['a'] += $val > 10 ? 1 : 0;
//     }
// }

// print_r($mas);
// print_r($rez);
echo '<br>';
echo '<br>2b---------------';
echo '<br>';
$maxVal = 0;

foreach ($mas as $small){
    //   echo $small;
        $maxNumber = max($small);
        if($maxVal < $maxNumber){
            $maxVal = $maxNumber;
        }
        echo '<br>';
         echo $maxNumber;
}
echo '<br>';
echo '<br>';
 echo $maxVal;


// $rez['b'] = $mas[0][0];

// foreach($mas as $small) {
//     foreach($small as $val) {
//         $rez['b'] = max($rez['b'], $val);
//     }
// }


echo '<br>';
echo '<br>2c---------------';
echo '<br>';


// $rez['c'] = [];

// foreach($mas as $small) {
//     foreach($small as $index => $val) {
//         $rez['c'][$index] = ($rez['c'][$index] ?? 0) + $val;
//     }
// }
echo '<br>';
echo '<br>2d---------------';
echo '<br>';

foreach($mas as &$small) {
    foreach(range(1, 2) as $_) {
        $small[] = rand(5, 25);
    }
}

print_r($mas);

echo '<br>';
echo '<br>2e---------------';
echo '<br>';

$sum = array_map(fn($v) => array_sum($v), $mas);

print_r($sum);

echo '<br>';
echo '<br>3---------------';
echo '<br>';

$mas3 = [];

foreach (range(0,9) as $val1){
    $small3 = [];
    foreach (range (2, (rand(2,20))) as $val2){
        $small3[$val1][$val2] = chr(rand(65, 90));
    }
    $mas3[] = $small3;
}

print_r($mas3);
echo '<br>';
echo '<br> sort-----------';

foreach ($mas3 as &$small3) {
    sort($small3);
}
print_r($mas3);

echo '<br>';
echo '<br>4---------------';
echo '<br>';
function sortByK($a, $b)
{
  if (in_array('K', $a) && in_array('K', $b)) {
    return 0;
  } else if (in_array('K', $a)) {
    return -1;
  } else if (in_array('K', $b)) {
    return 1;
  } else {
    return 0;
  }
}

sort($mas3);
usort($mas3, "sortByK");

print_r($mas3);
echo '<br>';
echo '<br>5---------------';
echo '<br>';

$arr30 = range(1, 30);

foreach ($arr30 as &$value) {
  $rand_id = rand(1, 1000000);
  $rand_place = rand(0, 100);
  $value = ['user_id' => $rand_id, 'place_in_row' => $rand_place];
}

print_r($arr30);

echo '<br>';
echo '<br>6---------------';
echo '<br>';

function didejanti ($a, $b) {
    return $a['user_id'] > $b['user_id'];
}

usort($arr30, 'didejanti');
print_r ($arr30);

echo '<br>';

function mazejanti ($a, $b) {
    return $a['place_in_row'] < $b['place_in_row'];
}
usort($arr30, 'mazejanti');
print_r ($arr30);

echo '<br>';

