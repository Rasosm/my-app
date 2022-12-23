<?php
if (!file_exists(__DIR__ .'/cliens')) {
    $arr = [];
} else {
    $arr = unserialize(file_get_contents(__DIR__ .'/cliens'));
    
}


// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $d = rand(5, 10);
//     $arr[] = $d;
//     file_put_contents(__DIR__ .'/data', serialize($arr));
//     header('Location: http://localhost/js-002/my-app/015/test.php');
//     die;
// }
if (isset($_GET['error'])) {
    $error = 'You can not delete account if balance is more than 0 eur.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./src/style.scss">
    <title>Account List</title>
</head>
<body>
  <header class="container header">
    
    <img src="./src/TSB_logo_2013.png" alt="logo"></a>
    <div class="virsus">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/js-002/my-app/bank/accountList.php">Account list</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/js-002/my-app/bank/addAssets.php">Add funds</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/js-002/my-app/bank/deductAssets.php">Transfer funds</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/js-002/my-app/bank/newAccount.php">Create new account</a>
        </li>
        <li class="nav-item">
          <form class="logout" action="http://localhost/js-002/my-app/bank/login.php?logout" method="post">  
            <button type="button logout" class="btn btn-danger">Log out</button>
          </form>
        </li>
      </ul>
    </div>
  </header>



<div class="container">
        <div class="row justify-content-center">
<?php foreach($arr as $li) : ?>
  <div class="card">
    <div class="card-header">
      <h5 class="card-title"><?=  $li['name'] ?> <?= $li['surname'] ?></h5>
    </div>
  <div class="card-body">
    <p class="card-text"><?= $li['account_number'] ?><h5> Balance: <?= $li['balance']. ' eur'?></h5></p>
    <?php if(isset($error) && $li['id'] == $_GET['id']) : ?>
            <div class="col-6">
                <div class="alert alert-danger m-4" role="alert">
                    <?= $error ?>
                </div>
            </div>
            <?php endif ?>
    <div>
    <form action="http://localhost/js-002/my-app/bank/delete.php?id=<?= $li['id'] ?>" method="post">
        <button  style="float: right; color: red;" type="submit" class="btn btn-outline-info mt-4">Delete</button>
        </form>
        <button type="submit" class="btn btn-outline-info mt-4"><a href="http://localhost/js-002/my-app/bank/addAssets.php?id=<?= $li['id'] ?>">Add assets</a></button>
        <button type="submit" class="btn btn-outline-info mt-4"><a href="http://localhost/js-002/my-app/bank/deductAssets.php?id=<?= $li['id'] ?>">Deduct assets</a></button>
    </div>
    </div>
    </div>
    
  
<?php endforeach ?>

</div>
        </div>

</body>
</html>