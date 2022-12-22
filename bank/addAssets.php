<?php

$id = (int) $_GET['id'];
foreach (unserialize(file_get_contents(__DIR__ . '/cliens')) as $li) {
    if ($li['id'] == $id) {
    break;
    }
}

if (empty($_GET)) {
    
    header('Location: http://localhost/js-002/my-app/bank/accountList.php');
    die;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./style.scss">
    <title>Account List</title>
</head>
<body>
    <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="http://localhost/js-002/my-app/bank/accountList.php">Account list</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="http://localhost/js-002/my-app/bank/addAssets.php">Add assets</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/js-002/my-app/bank/deductAssets.php">Deduct assets</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/js-002/my-app/bank/newAccount.php">Create new account</a>
  </li>
</ul>

<div class="container">
  <div class="row justify-content-center">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title"><?=  $li['name'] ?> <?= $li['surname'] ?></h5>
      </div>
      <div class="card-body">
        <p class="card-text"><?= $li['account_number'] ?><h3><?= $li['balance'] ?></h3></p>
      </div>
    </div>  
    

    <form action="http://localhost/js-002/my-app/bank/add.php?id=<?= $li['id'] ?>" method="post">
      <!-- <div class="input-group"> -->
      <!-- <input type="text"  name="balance" class="form-control" aria-label="Dollar amount (with dot and two decimal places)"> -->
      <!-- <span class="input-group-text"><?= $li['balance'] ?></span>
      <span class="input-group-text">$</span> -->
      <input type="text" class="form-control" placeholder="0,00">
      <button type="submit" class="btn btn-outline-info mt-4">ADD</button>
      <!-- </div> -->
    </form>

  </div>
</div>  

</body>
</html>