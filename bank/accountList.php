<?php
if (!file_exists(__DIR__ .'/cliens')) {
    $arr = [];
} else {
    $arr = unserialize(file_get_contents(__DIR__ .'/cliens'));
    usort($arr, fn($a, $b) => $a['surname'] <=> $b['surname']);
    
}


// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $d = rand(5, 10);
//     $arr[] = $d;
//     file_put_contents(__DIR__ .'/data', serialize($arr));
//     header('Location: http://localhost/js-002/my-app/015/test.php');
//     die;
// }
if (isset($_GET['error0'])) {
    $error0 = 'Negalima ištrinti sąskaitos jei likutis didesnis už 0 eur.';
}
if (isset($_GET['successAdd'])) {
    $successAdd = 'Lėšos sėkmingai pridėtos'. ' '.'į'. ' ' .'sąskaitą';
   
}
if (isset($_GET['error'])) {
    $error = 'Sąskaitoje nekakanka lėšų';
}
if (isset($_GET['successTransfer'])) {
    $successTransfer = 'Lėšos sėkmingai pervestos';
}
if (isset($_GET['successDelete'])) {
    $successDelete = 'Sąskaita sėkmingai ištrinta';
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
    <title>Sąskaitų sąrašas</title>
</head>
<body>
  <header class="container header">
    
    <img src="./src/TSB_logo_2013.png" alt="logo"></a>
    <div class="virsus">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/js-002/my-app/bank/accountList.php">Sąskaitų sąrašas</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="http://localhost/js-002/my-app/bank/addAssets.php">Pridėti lėšas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/js-002/my-app/bank/deductAssets.php">Nuskaičiuoti lėšas</a>
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

        <?php if(isset($successAdd)) : ?>
            <div class="col-4" style="justify-content: center; display: flex">
                <div class="alert alert-success d-flex align-items-center" style="text-align: center" role="alert">
                    
                <?= $successAdd ?>
                </div>
            </div>
            <?php endif ?>

            <?php if(isset($successDelete)) : ?>
            <div class="col-4" style="justify-content: center; display: flex">
                <div class="alert alert-success d-flex align-items-center" style="text-align: center" role="alert">
                    
                <?= $successDelete ?>
                </div>
            </div>
            <?php endif ?>



<?php if(isset($successTransfer)) : ?>
            <div class="col-4" style="justify-content: center; display: flex">
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    
                <?= $successTransfer ?>
                </div>
            </div>
            <?php endif ?>
      </div>
     
    <?php if(isset($error)) : ?>
            <div class="col-6" style="justify-content: center; display: flex">
                <div class="alert alert-danger m-4 align-items-center" role="alert">
                    <?= $error ?>
                </div>
            </div>
            <?php endif ?>








<?php foreach($arr as $li) : ?>
  <div class="card" style="margin-bottom: 5px">
    <div class="card-header">
      <h5 class="card-title"><?=  $li['name'] ?> <?= $li['surname'] ?></h5>
    </div>
  <div class="card-body">
    <p class="card-text"><?= $li['account_number'] ?><h5> Likutis: <?= (float)$li['balance']. ' eur'?></h5></p>
    <?php if(isset($error0) && $li['id'] == $_GET['id']) : ?>
            <div class="col-6">
                <div class="alert alert-danger m-4" role="alert">
                  
                    <?= $error0 ?>
                </div>
            </div>
            <?php endif ?>

            
    <div>
    <form action="http://localhost/js-002/my-app/bank/delete.php?id=<?= $li['id'] ?>" method="post">
        <button  style="float: right; color: red;" type="submit" class="btn btn-outline-info mt-4">Ištrinti</button>
        </form>
        <button type="submit" class="btn btn-outline-info mt-4"style="margin-right: 5px"><a style="text-decoration: none" href="http://localhost/js-002/my-app/bank/addAssets.php?id=<?= $li['id'] ?>">Pridėti lėšas</a></button>
        <button type="submit" class="btn btn-outline-info mt-4"><a style="text-decoration: none" href="http://localhost/js-002/my-app/bank/deductAssets.php?id=<?= $li['id'] ?>">Nuskaičiuoti lėšas</a></button>
    </div>
    </div>
    </div>
    
  
<?php endforeach ?>

</div>
        </div>

</body>
</html>