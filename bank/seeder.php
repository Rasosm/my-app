<?php

$clients = [
    ['id' => rand(1000000, 10000000),'name' => 'Paulius', 'surname' => 'Paulenis', 'account_number' => 'LT82'.' '. '7300'.' '.'0'.rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9), 'personal_id' => '60912150033', 'balance' => '34,00'],
    ['id' => rand(1000000, 10000000),'name' => 'Liepa', 'surname' => 'Liepaitė', 'account_number' => 'LT82'.' '. '7300'.' '.'0'.rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9), 'personal_id' => '48606230069', 'balance' => '204,00'],
    ['id' => rand(1000000, 10000000),'name' => 'Gabrielė', 'surname' => 'Gabrelytė', 'account_number' => 'LT82'.' '. '7300'.' '.'0'.rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9), 'personal_id' => '49201070069', 'balance' => '80,00']
];

file_put_contents(__DIR__ . '/cliens', serialize($clients));



$users = [
    ['name' => 'Bebras', 'psw' => md5('321'), 'color' => 'crimson'],
    ['name' => 'Rasa', 'psw' => md5('321'), 'color' => 'skyblue'],
    ['name' => 'Paršas', 'psw' => md5('321'), 'color' => 'pink']
];

file_put_contents(__DIR__ . '/users', serialize($users));