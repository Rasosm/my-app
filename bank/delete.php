<?php

$clients = unserialize(file_get_contents(__DIR__ . '/cliens'));

$id = (int) $_GET['id'];
    // print_r($id);

foreach($clients as $index => $li) {
    print_r($li);
    if ($li['id'] == $id) {
        unset($clients[$index]);
        break;
    }
}

file_put_contents(__DIR__ . '/cliens', serialize($clients));

header('Location: http://localhost/js-002/my-app/bank/accountList.php');