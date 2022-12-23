<?php
if (!file_exists(__DIR__ .'/cliens')) {
    $arr = [];
} else {
    $arr = unserialize(file_get_contents(__DIR__ .'/cliens'));
    
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $id = rand(1000000, 10000000);
     $name = $_POST['name'];
     if(strlen($name) <= 3){
            header('Location: http://localhost/js-002/my-app/bank/newAccount.php?errorName');
    die;
        }
     $surname = $_POST['surname'];
        if(strlen($surname) <= 3){
            header('Location: http://localhost/js-002/my-app/bank/newAccount.php?errorSurname');
    die;
        }

     $account_number = 'LT73'.' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9);
     $personal_id = $_POST['personal_id'];
    //  $balance = $_POST['balance']?? 0;
     $balance = 0;

    $arr[] = ['id'=>$id, 'name'=>$name, 'surname' => $surname, "account_number"=> $account_number, "personal_id"=>$personal_id, 'balance'=>$balance];

// print_r($_POST);
    file_put_contents(__DIR__ .'/cliens', serialize($arr));
    header('Location: http://localhost/js-002/my-app/bank/newAccount.php?successNew');
    die;
}

if (isset($_GET['successNew'])) {
    $successNew = 'Congradulations! You create new account';
}

if (isset($_GET['errorName'])) {
    $errorName = 'Please enter correct name';
}
if (isset($_GET['errorSurname'])) {
    $errorSurname = 'Please enter correct surname';
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
    <title>Login</title>
</head>

<body>
    <header class="container header">
    
  <img src="./src/TSB_logo_2013.png" alt="logo"></a>
  <div class="virsus">
    <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="http://localhost/js-002/my-app/bank/accountList.php">Account list</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/js-002/my-app/bank/addAssets.php">Add funds</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/js-002/my-app/bank/deductAssets.php">Transfer funds</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="http://localhost/js-002/my-app/bank/newAccount.php">Create new account</a>
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
            <div class="col-7">
                <div class="card m-4">
                    <div class="card-header">
                        Create new account
                    </div>
                    <div class="card-body">
                        <form action="http://localhost/js-002/my-app/bank/newAccount.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Surname</label>
                                <input type="text" name="surname" class="form-control" placeholder="surname">
                            </div>
                            <!-- <div class="mb-3">
                                <label class="form-label">Account number</label>
                                <input type="text" name="account_number" class="form-control" placeholder="account number">
                            </div> -->
                            <div class="mb-3">
                                <label class="form-label">Personal ID</label>
                                <input type="text" name="personal_id" class="form-control" placeholder="personal ID">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-outline-info mt-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>