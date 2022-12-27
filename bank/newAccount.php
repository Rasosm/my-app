<?php
session_start();
if (!file_exists(__DIR__ .'/cliens')) {
    $arr = [];
} else {
    $arr = unserialize(file_get_contents(__DIR__ .'/cliens'));
    
}

$account_number = 'LT73'.' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $id = rand(1000000, 10000000);
     
     $name = $_POST['name'];
     $name = ucfirst($name);
     if(strlen($name) <= 3){
            header('Location: http://localhost/js-002/my-app/bank/newAccount.php?errorName');
    die;
        }
     $surname = $_POST['surname'];
     $surname = ucfirst($surname);
        if(strlen($surname) <= 3){
            header('Location: http://localhost/js-002/my-app/bank/newAccount.php?errorSurname');
    die;
        }

    
     $personal_id = (int) $_POST['personal_id'];


     if (preg_match('/^[1-6]\d{2}(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])\d{4}$/', $_POST['personal_id'])) {

      foreach ($arr as $li) {
        if ($li['personal_id'] == $_POST['personal_id']) {
            header('Location: http://localhost/js-002/my-app/bank/newAccount.php?errorPersonalIdExists');
                die;
            }
        }
$personal_id = (int) $_POST['personal_id'];

     } else {
    header('Location: http://localhost/js-002/my-app/bank/newAccount.php?errorPersonalId');
    die;
        }
        
     
  

    //  $balance = $_POST['balance']?? 0;
     $balance = 0;

    $arr[] = ['id'=>$id, 'name'=>$name, 'surname' => $surname, "account_number"=> $account_number, "personal_id"=>$personal_id, 'balance'=>$balance];

// print_r($_POST);
    file_put_contents(__DIR__ .'/cliens', serialize($arr));
    header('Location: http://localhost/js-002/my-app/bank/newAccount.php?successNew');
    die;
}

if (isset($_GET['successNew'])) {
    $successNew = 'Sveikinu! Sėkmingai sukūrėte naują sąskaitą';
}

if (isset($_GET['errorName'])) {
    $errorName = 'Prašau įrašyti teisingą vardą';
}
if (isset($_GET['errorSurname'])) {
    $errorSurname = 'Prašau įrašyti teisingą pavardę';
}

if (isset($_GET['errorPersonalIdExists'])) {
    $errorPersonalIdExists = 'Toks asmens kodas jau egzistuoja';
}

if (isset($_GET['errorPersonalId'])) {
    $errorPersonalId = 'Prašau įvesti teisingą asmens kodą';
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
    <title>Sukurti naują sąskaitą</title>
</head>

<body>
    <header class="container header">
    
  <img src="./src/TSB_logo_2013.png" alt="logo"></a>
  <div class="virsus">
    <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="http://localhost/js-002/my-app/bank/accountList.php">Sąskaitų sąrašas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/js-002/my-app/bank/addAssets.php">Pridėti lėšas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/js-002/my-app/bank/deductAssets.php">Nuskaičiuoti lėšas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="http://localhost/js-002/my-app/bank/newAccount.php">Sukurti naują sąskaitą</a>
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
            <?php if(isset($successNew)) : ?>
            <div class="col-6">
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    
                <?= $successNew ?>
                </div>
            </div>
            <?php endif ?>
            <?php if(isset($errorName)) : ?>
            <div class="col-6">
                <div class="alert alert-danger m-4" role="alert">
                    <?= $errorName ?>
                </div>
            </div>
            <?php endif ?>
            <?php if(isset($errorSurname)) : ?>
            <div class="col-6">
                <div class="alert alert-danger m-4" role="alert">
                    <?= $errorSurname ?>
                </div>
            </div>
            <?php endif ?>
            <?php if(isset($errorPersonalIdExists)) : ?>
            <div class="col-6">
                <div class="alert alert-danger m-4" role="alert">
                    <?= $errorPersonalIdExists ?>
                </div>
            </div>
            <?php endif ?>
            <?php if(isset($errorPersonalId)) : ?>
            <div class="col-6">
                <div class="alert alert-danger m-4" role="alert">
                    <?= $errorPersonalId ?>
                </div>
            </div>
            <?php endif ?>
            <div class="col-7">
                <div class="card m-4">
                    <div class="card-header">
                        Sukurti naują sąskaitą
                    </div>
                    <div class="card-body">
                        <form action="http://localhost/js-002/my-app/bank/newAccount.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Vardas</label>
                                <input type="text" name="name" class="form-control" placeholder="vardas">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pavardė</label>
                                <input type="text" name="surname" class="form-control" placeholder="pavardė">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sąskaitos numeris</label>
                                <input type="text" name="account_number" class="form-control" placeholder="account number" value="<?= $account_number ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Asmens kodas</label>
                                <input type="text" name="personal_id" class="form-control" placeholder="asmens kodas">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-outline-info mt-4">Patvirtinti</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>