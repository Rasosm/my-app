        <?php
       
//    1.

$vardas = 'Jonas';
$pavarde = 'Jonaitis';

if(strlen($vardas) > strlen($pavarde)){
echo $pavarde;
}else{
echo $vardas;
}

    //    2.

    echo '<br>';

$vardas = 'Jonas';
$pavarde = 'Jonaitis';

echo strtoupper($vardas).' '.strtolower($pavarde);

// 3.
 echo '<br>';

$vardas = 'Jonas';
$pavarde = 'Jonaitis';
$pirmosraides = $vardas[0].$pavarde[0];

echo $pirmosraides;

// 4.

echo '<br>';

$vardas = 'Jonas';
$pavarde = 'Jonaitis';
$paskutinesTrys = substr("$vardas", 2, 4).substr("$pavarde", 5, 7);
echo $paskutinesTrys;

// 5.

echo '<br>';

$stringas =  'An American in Paris';
// $letters = 'a, A';

// echo str_replace("a", "*", "$stringas");
echo str_ireplace("a", "*", "$stringas");

// 6.
echo '<br>';

$stringas =  'An American in Paris';
echo substr_count($stringas, 'a') + substr_count($stringas, 'A');

// 7.
echo '<br>';
$stringas =  'An American in Paris';
$vowels = array("a", "e", "i", "o", "y", "u", "A", "E", "I", "O", "U", "Y");
$onlyconsonants = str_replace($vowels, "", "$stringas");

echo $onlyconsonants;
echo '<br>';
echo str_replace($vowels, "", "Breakfast at Tiffany's");
echo '<br>';
echo str_replace($vowels, "", "2001: A Space Odyssey");
echo '<br>';
echo str_replace($vowels, "", "It's a Wonderful Life");

$movie3 = 'An American in Paris';
echo preg_replace('/[aeiou]/i', '', $movie3);

// 8.
echo '<br>';

$kodas = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';

preg_match('/\d/', $kodas, $m);

print_r($m[0]);


echo '<br>';
echo $kodas;

// 9.
echo '<br>';

$tekstas = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";

$masyvas = (str_word_count($tekstas, 1));
$ats = 0;

foreach ($masyvas as $val){
    strlen($val) <= 5 ? $ats++ : $ats = $ats; 
}

echo $ats;

echo '<br>';

$tekstas1 = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
// print_r (str_word_count($tekstas, 1));
$masyvas1 = (str_word_count($tekstas1, 1));

$atsShort = 0;
foreach ($masyvas1 as $short){
    if(mb_strlen($short) <= 5){
        $atsShort++;
    }
}
echo $atsShort;

//  10.

echo '<br>';

$raides = 'abcdefghiyjklmnopqrstuvwxz';

echo $raides[rand(0, 25)].$raides[rand(0, 25)].$raides[rand(0, 25)];