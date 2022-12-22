<?php

$arr = unserialize(file_get_contents(__DIR__ . '/cliens'));

$id = (int) $_GET['id'];


foreach($arr as $index => $li) {
    if ($li['id'] == $id) {
        $arr[$index]['balance'] += (int) $_POST['balance'];
        break;
    }
}

file_put_contents(__DIR__ . '/cliens', serialize($arr));

header('Location: http://localhost/js-002/my-app/bank/accountList.php');
