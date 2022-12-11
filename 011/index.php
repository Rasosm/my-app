<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="app.js"></script>
    <script src="fun.js"></script>

    <title>Document</title>
     <link rel="stylesheet" href="../style/main.css">
</head>

<body>
<?php

// 1.

// echo str_repeat("*", 400);


foreach(range(1, 400) as $zvaigzdutes){
    $zvaigzdutes = '*';
    echo "<div class=zvaigzdutes>$zvaigzdutes</div>";

}

foreach(range(1, 400) as $index){
    $zvaigzdutes = '*';
    
        if($index % 50 === 0){
            echo "<br>";
         
    }else{
        echo "<div class=zvaigzdutes>$zvaigzdutes</div>";
    }
}

// 2.

echo "<br>";
$skaicius150 = 0; 

foreach(range(1, 300) as $skaiciai){
    $randomSkaiciai = rand(0,300);
    if($randomSkaiciai > 150) {
    $skaicius150++;
       
    echo "<div class='randomSkaiciai'>$randomSkaiciai  </div>";
    }
    if($randomSkaiciai > 275){
        echo "<div class='randomSkaiciai' style='color: red'>$randomSkaiciai  </div>";
    }
}

echo "<br>";
echo "<br>";

echo $skaicius150;
echo "<br>";
echo "<br>";

// 3.

echo "<br>3--------------";
echo "<br>";

$number77 = [];
foreach(range(1, rand(3000, 4000)) as $randNumber){
    if($randNumber % 77 === 0){
        $number77[] = $randNumber;
    }
}

$beKablelio = implode(", ", $number77);
echo $beKablelio;

// 4.
echo "<br>4--------------";
echo "<br>";

// foreach(range(1, 100) as $kvadratas){
//     $kvadratas = '*';
//     foreach(range(1, 100) as $kv){
//         if($kv % 100 === 0){
//             echo "<br>";
//         }else{
//         echo "<div class=kvadratas>$kvadratas</div>";
//     }
// }
// }

echo "<br>";

// 5.
echo "<br>5--------------";
echo "<br>";

// 6.
echo "<br>6--------------";
echo "<br>";

$metam = rand(0, 1);
if ($metam === 0){
    echo 'H';
}else{
    echo 'S';
}
echo "<br>";
echo "<br>6a--------------";
echo "<br>";

$kiekmetimu = 0;

do {
    $metam = rand(0, 1);
    echo $metam;
    echo "<br>";
    echo "<br>";
    $kiekmetimu++;
}
while ($metam !== 0);

echo "$kiekmetimu metimai is viso;";



echo "<br>";
echo "<br>6b--------------";
echo "<br>";

$iskrito3Herbai = 0;
do {
    $metam = rand(0, 1);
    echo $metam;
    echo "<br>";
    echo "<br>";
    if($metam === 0){
        $iskrito3Herbai++;
    }
}   
while ($iskrito3Herbai !== 3);
   
echo "<br>";
echo "<br>6c--------------";
echo "<br>";

$iskrito3Herbai = 0;
do {
    $metam = rand(0, 1);
    echo $metam;
    echo "<br>";
    echo "<br>";
    if($metam === 0){
        $iskrito3Herbai++;
    }
    if($metam === 1){
        $iskrito3Herbai = 0;
    }
}   
while ($iskrito3Herbai !== 3);

echo "<br>";
echo "<br>7--------------";
echo "<br>";

$PetroTaskai = rand(10, 20);
$KazioTaskai = rand(5, 25);

if ($PetroTaskai > $KazioTaskai){
    echo "Petras surinko $PetroTaskai, Kazys surinko $KazioTaskai. Partiją laimėjo: Petras.";
}
if ($PetroTaskai < $KazioTaskai){
    echo "Petras surinko $PetroTaskai, Kazys surinko $KazioTaskai. Partiją laimėjo: Kazys.";
}
echo "<br>";
$PetroTaskuSuma = 0;
$KazioTaskusuma = 0;

do {
    echo "<br>rand taskai Petro";
    echo $PetroTaskai = rand(10, 20);
    echo "<br>suma Petro";
    echo $PetroTaskuSuma += $PetroTaskai;
    echo "<br>rand taskai Kazio";
    echo $KazioTaskai = rand(5, 25);
    echo "<br>suma Kazio";
    echo $KazioTaskusuma += $KazioTaskai;
}
while ($PetroTaskuSuma < 222 && $KazioTaskusuma < 222 );
echo "<br>";
if($PetroTaskuSuma > $KazioTaskusuma){
    echo 'Laimejo Petras';
}else{
    echo 'Laimejo Kazys';
}


echo "<br>";
echo "<br>8--------------";
echo "<br>";


echo "<pre>";


for ($i = 1; $i < 10; $i++) {
    for ($j = $i; $j < 10; $j++)
        echo "&nbsp;&nbsp;";
    for ($j = 2 * $i - 1; $j > 0; $j--)
        echo ("&nbsp;*");
    echo "<br>";
}
$n = 10;
for ($i = 10; $i > 0; $i--) {
    for ($j = $n - $i; $j > 0; $j--)
        echo "&nbsp;&nbsp;";
    for ($j = 2 * $i - 1; $j > 0; $j--)
        echo ("&nbsp;*");
    echo "<br>";
}
echo "</pre>";


echo "<br>";
echo "<br>10--------------";
echo "<br>a-----------";

$viniesIlgis = 85;
$smugiai = 0;
$kiekReikiaSmugiu = 0;
do {
   $vienasSmugis = rand(5,20); 
    echo "<br>rand smugis";
   echo $vienasSmugis;
   echo "<br>kiek";
   echo $kiekReikiaSmugiu++;
   echo "<br>suma";
   echo $smugiai += $vienasSmugis;
   echo "<br>";
}
while($smugiai <= $viniesIlgis * 5);

echo $kiekReikiaSmugiu;

echo "<br>10--------------";
echo "<br>b-----------";

$viniesIlgis = 85;
$smugiai = 0;
$kiekReikiaSmugiu = 0;
do {
   $vienasSmugis = rand(20,30); 
    echo "<br>rand smugis";
   echo $vienasSmugis;
   echo "<br>kiek";
   echo $kiekReikiaSmugiu++;
   echo "<br>suma";
   echo $smugiai += $vienasSmugis;
   echo "<br>";
}
while($smugiai <= $viniesIlgis * 5);

echo $kiekReikiaSmugiu;

echo "<br>";
echo "<br>11--------------";
echo "<br>";

// $stringas = '';

// for ($i = 0; $i < 50; $i++){
//     echo $i;
//     $randomSkaicius = rand(1, 200);
//    echo $randomSkaicius($i);
// }
// echo "<br>";
// echo $stringas;


foreach(range(1, 50) as $skaiciai){
    $randomSkaiciai = rand(1,200);
    if($randomSkaiciai !== $randomSkaiciai){
        
        $randomSkaiciai;
    }
    echo "$randomSkaiciai ";
   
}

echo "<br>pirminiai skaiciai";
echo "<br>";
    foreach(range(1, 50) as $skaiciai){
    $randomSkaiciai = rand(1,200);
    if($randomSkaiciai % 2 !== 0){
        echo "$randomSkaiciai  ";
    }
}
       


?>

</body>

</html>






