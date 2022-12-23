<?php

$clients = unserialize(file_get_contents(__DIR__ . '/cliens'));

$id = (int) $_GET['id'];
    // print_r($id);

foreach($clients as $index => $li) {
    print_r($li);
    if ($li['id'] == $id) {
        if($li['balance'] <= 0 ){
            unset($clients[$index]);
            break;
        }else{
            
        header('Location: http://localhost/js-002/my-app/bank/accountList.php?error=error&id='. $id);
    die;
}


    }
}



file_put_contents(__DIR__ . '/cliens', serialize($clients));

header('Location: http://localhost/js-002/my-app/bank/accountList.php');