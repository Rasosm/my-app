<?php

// 1.

$vardas = 'Saulė';
$pavardė = 'Pauliukaitė';
$gimimoMetai ='2008';
$dabartiniaiMetai = '2021';
$metai = $dabartiniaiMetai - $gimimoMetai;



echo "Aš esu $vardas $pavardė. Man yra $metai metai(ų).";

// 2.
echo '<br>';

$kintamasis1 = rand(0, 4);
$kintamasis2 = rand(0, 4);
if (!($kintamasis1 * $kintamasis2)) {
    echo 'Dalyba negalima nes 0';
} elseif ($kintamasis1 > $kintamasis2) {
    echo round($kintamasis1 / $kintamasis2, 2);
} else {
    echo round($kintamasis2 / $kintamasis1, 2);
}

// 3.
echo '<br>';

$skaicius1 = rand(0, 25);
$skaicius2 = rand(0, 25);
$skaicius3 = rand(0, 25);
$vidurkis = ($skaicius1 + $skaicius2 + $skaicius3) / 3;

echo $vidurkis;

// 4.
echo '<br>';

$krastineA = rand(1, 10);
$krastineB = rand(1, 10);
$krastineC = rand(1, 10);

echo $krastineA;
echo $krastineB;
echo $krastineC;

echo '<br>';

if (($krastineA + $krastineB) > $krastineC && ($krastineA + $krastineC) > $krastineB && ($krastineB + $krastineC) > $krastineA){
    echo 'trikampis galimas';
}else{
    echo 'trikampis negalimas';
}

// $ilgiausiaKrastine = max($krastineA, $krastineB, $krastineC);

// echo $ilgiausiaKrastine;

// if (($krastineA + $krastineB) > $ilgiausiaKrastine || ($krastineA + $krastineC) > $ilgiausiaKrastine || ($krastineB + $krastineC) > $ilgiausiaKrastine){
//     echo 'trikampis galimas';
// }else{
//     'trikampis negalimas';
// }

// 5.
echo '<br>';

$skaicius1 = rand(0, 2);
$skaicius2 = rand(0, 2);
$skaicius3 = rand(0, 2);
$skaicius4 = rand(0, 2);

echo "$skaicius1, $skaicius2, $skaicius3, $skaicius4";

echo '<br>';

echo substr_count("$skaicius1, $skaicius2, $skaicius3, $skaicius4","0");
echo '<br>';

echo substr_count("$skaicius1, $skaicius2, $skaicius3, $skaicius4","1");
echo '<br>';

echo substr_count("$skaicius1, $skaicius2, $skaicius3, $skaicius4","2");

echo '<br>';
echo substr_count($skaicius1, '0');

// 6.

echo '<br>';

$skaiciusH3 = rand(1, 6);

echo "<h3>$skaiciusH3</h3>";

// 7.
echo '<br>';

$skaicius1 = rand(-10, 10);
$skaicius2 = rand(-10, 10);
$skaicius3 = rand(-10, 10);

if($skaicius1 < 0 ){
    echo "<h3 style='color: green'>$skaicius1</h3>";
}elseif($skaicius1 > 0 ){
    echo "<h3 style='color: blue'>$skaicius1</h3>";
}else{
    echo "<h3 style='color: red'>$skaicius1</h3>";
}

if($skaicius2 < 0 ){
    echo "<h3 style='color: green'>$skaicius2</h3>";
}elseif($skaicius2 > 0 ){
    echo "<h3 style='color: blue'>$skaicius2</h3>";
}else{
    echo "<h3 style='color: red'>$skaicius2</h3>";
}

if($skaicius3 < 0 ){
    echo "<h3 style='color: green'>$skaicius3</h3>";
}elseif($skaicius3 > 0 ){
    echo "<h3 style='color: blue'>$skaicius3</h3>";
}else{
    echo "<h3 style='color: red'>$skaicius3</h3>";
}

// 8.

$zvakesKaina = 1;
$zvakiuKiekis = rand(5, 3000);
$suma = $zvakesKaina * $zvakiuKiekis;

echo $zvakesKaina;
echo '<br>';
echo $zvakiuKiekis;
echo '<br>';
echo $suma;
echo '<br>';

if($suma > 1000 && $suma <= 2000){
   echo "Parduota $zvakiuKiekis žvakių už ".round($suma * 0.97). " kainą."; 
}
if($suma > 2000 ){
   echo "Parduota $zvakiuKiekis žvakių už ".round($suma * 0.96). " kainą."; 
}
if($suma <= 1000 ){
     echo "Parduota $zvakiuKiekis žvakių už ".round($suma). " kainą.";
}

// 9.
echo '<br>';
echo '<br>';
$skaicius4 = rand(0, 100);
$skaicius5 = rand(0, 100);
$skaicius6 = rand(0, 100);
$vidurkis1 = ($skaicius4 + $skaicius5 + $skaicius6) / 3;

echo $skaicius4;
echo '<br>';
echo $skaicius5;
echo '<br>';
echo $skaicius6;
echo '<br>';
echo round($vidurkis1);

echo '<br>';
echo '<br>';

// if ($skaicius4 && $skaicius5 && $skaicius6 > 10 && $skaicius4 && $skaicius5 && $skaicius6 < 90){
//     echo $skaicius4, $skaicius5, $skaicius6;
// }

if( $skaicius4 > 90 || $skaicius4 < 10 && ($skaicius5 < 90 || $skaicius5 > 10 )&&( $skaicius6 < 90 ||$skaicius6 > 10)) {

        echo round(($skaicius5 + $skaicius6) / 2);
}
if( $skaicius5 > 90 || $skaicius5 < 10 && ($skaicius4 < 90 || $skaicius4 > 10 )&&( $skaicius6 < 90 ||$skaicius6 > 10)) {

        echo round(($skaicius4 + $skaicius6) / 2);
}
if( $skaicius6 > 90 || $skaicius6 < 10 && ($skaicius4 < 90 || $skaicius4 > 10 )&&( $skaicius5 < 90 ||$skaicius5 > 10)) {

        echo round(($skaicius4 + $skaicius5) / 2);
}


if( $skaicius4 > 90 || $skaicius4 < 10 && ($skaicius5 > 90 || $skaicius5 < 10 )&&( $skaicius6 < 90 ||$skaicius6 > 10)) {

        echo $skaicius6;
}
if( $skaicius5 > 90 || $skaicius5 < 10 && ($skaicius6 > 90 || $skaicius6 < 10 )&&( $skaicius4 < 90 ||$skaicius4 > 10)) {

         echo $skaicius4;
}
if( $skaicius6 > 90 || $skaicius6 < 10 && ($skaicius4 > 90 || $skaicius4 < 10 )&&( $skaicius5 < 90 ||$skaicius5 > 10)) {

         echo $skaicius5;
}

// 10.
echo '<br>';

$valandos = rand(0, 23);
$minutes = rand(0, 59);
$sekundes = rand(0, 59);
$prideti = rand(0, 300);

$laikrodis = $valandos.":".$minutes.":".$sekundes;

echo $laikrodis;
echo '<br>';
echo $prideti;
