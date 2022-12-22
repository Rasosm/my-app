<?php

$id = (int) $_GET['id'];
foreach (unserialize(file_get_contents(__DIR__ . '/cliens')) as $li) {
    if ($li['id'] == $id) {
    break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Account List</title>
</head>
<body>
    <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="http://localhost/js-002/my-app/bank/accountList.php">Account list</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/js-002/my-app/bank/addAssets.php">Add assets</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="http://localhost/js-002/my-app/bank/deductAssets.php">Deduct assets</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/js-002/my-app/bank/newAccount.php">Create new account</a>
  </li>
</ul>
<ul style="background: gray;">

        <li>
            <span><?= $id ===0 ? '' : $li['name'] ?> Balance: <?= $li['balance'] ?></span>
            <form action="http://localhost/js-002/my-app/bank/transfers.php?id=<?= $li['id'] ?>" method="post">
                <input type="text" name="balance">
                <button type="submit">ADD</button>
            </form>
        </li>

    </ul>
</body>
</html>