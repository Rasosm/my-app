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
// if (isset($_GET['error'])) {
//     $error = 'Sąskaitoje nekakanka lėšų';
// }
// if (isset($_GET['successTransfer'])) {
//     $successTransfer = 'Lėšos sėkmingai pervestos';
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./src/style.scss">
    <title>Nuskaičiuoti lėšas</title>
</head>
<body>
  <header class="container header">
    
  <img src="./src/TSB_logo_2013.png" alt="logo"></a>
  <div class="virsus">
    <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="http://localhost/js-002/my-app/bank/accountList.php">Sąskaitų sąrašas</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" href="http://localhost/js-002/my-app/bank/addAssets.php">Pridėti lėšas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="http://localhost/js-002/my-app/bank/deductAssets.php">Nuskaičiuoti lėšas</a>
  </li> -->
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/js-002/my-app/bank/newAccount.php">Sukurti naują sąskaitą</a>
  </li>
  <li class="nav-item">
  <form class="logout" action="http://localhost/js-002/my-app/bank/login.php?logout" method="post">  
  <button type="button logout" class="btn btn-danger">Atsijungti</button>
  </form>
  </li>
</ul>
</div>
</header>
<div class="container">
  <div class="row justify-content-center">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title"><?=  $li['name'] ?> <?= $li['surname'] ?></h5>
      </div>
      <div class="card-body">
        <p class="card-text"><?= $li['account_number'] ?><h5><?= $li['balance']. ' eur' ?></h5></p>
       
           

    <form action="http://localhost/js-002/my-app/bank/transfers.php?id=<?= $li['id'] ?>" method="post">
      <!-- <div class="input-group"> -->
      <!-- <input type="text"  name="balance" class="form-control" aria-label="Dollar amount (with dot and two decimal places)"> -->
      <!-- <span class="input-group-text"><?= $li['balance'] ?></span>
      <span class="input-group-text">$</span> -->
      <input type="int" name="balance" class="form-control" placeholder="0.00">
      <button style="margin-bottom: 10px" type="submit" class="btn btn-outline-info mt-4">Nuskaičiuoti</button>
      <!-- </div> -->
    </form>
    </div> 

  </div>
</div>  
</body>
</html>