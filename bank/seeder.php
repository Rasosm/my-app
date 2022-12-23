<?php

$clients = [
    ['id' => rand(1000000, 10000000),'name' => 'Bebras', 'surname' => 'Bebrienis', 'account_number' => 'LT73'.' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9), 'personal_id' => '48101950039', 'balance' => '34,00 eur'],
    ['id' => rand(1000000, 10000000),'name' => 'Briedis', 'surname' => 'Briedienis', 'account_number' => 'LT73'.' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9), 'personal_id' => '48601950069', 'balance' => '204,00 eur'],
    ['id' => rand(1000000, 10000000),'name' => 'Paršas', 'surname' => 'Parsienis', 'account_number' => 'LT73'.' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9), 'personal_id' => '60901950033', 'balance' => '80,00 eur']
];

file_put_contents(__DIR__ . '/cliens', serialize($clients));



$users = [
    ['name' => 'Bebras', 'psw' => md5('123'), 'color' => 'crimson'],
    ['name' => 'Briedis', 'psw' => md5('123'), 'color' => 'skyblue'],
    ['name' => 'Paršas', 'psw' => md5('123'), 'color' => 'pink']
];

file_put_contents(__DIR__ . '/users', serialize($users));