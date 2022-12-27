<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['logout'])) {
        unset($_SESSION['user']);
        header('Location: http://localhost/js-002/my-app/bank/login.php');
        die;
    }

    $users = unserialize(file_get_contents(__DIR__ . '/users'));
 
    foreach($users as $user) {
        if ($user['name'] == $_POST['name']) {
             if ($user['psw'] == md5($_POST['psw'])) {
                 $_SESSION['user'] = $user;
               
                header('Location: http://localhost/js-002/my-app/bank/accountList.php');
                die;
            }
        }
    }
          header('Location: http://localhost/js-002/my-app/bank/login.php?error');
    die;
}

if (isset($_GET['error'])) {
    $error = 'Neteisingas vartotojo vardas arba slaptažodis';
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
    <title>Prisijungti</title>
</head>

<body>

<header class="container header">
    <div class="welcome">
<img src="./src/TSB_logo_2013.png" alt="logo"></a>
  <!-- <h3>Welcome!</h3> -->
    </div>
  
</header>
    <div class="container">
        <div class="row justify-content-center">
            <?php if(isset($error)) : ?>
            <div class="col-6" style="justify-content: center; display: flex">
                <div class="alert alert-danger m-4" role="alert">
                    <?= $error ?>
                </div>
            </div>
            <?php endif ?>
            <div class="col-7">
                <div class="card m-4">
                    <div class="card-header" style="text-align: center; color: #006394; font-weight: bold; letter-spacing: 1px; font-size: 18px">
                        Registracija
                    </div>
                    <div class="card-body">
                        <form action="http://localhost/js-002/my-app/bank/login.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Vardas</label>
                                <input type="text" name="name" class="form-control" placeholder="vardas">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Slaptažodis</label>
                                <input type="password" name="psw" class="form-control" placeholder="slaptažodis">
                                <div style="justify-content: center; display: flex">
                                <button type="submit" class="btn btn-outline-info mt-4" style="text-align: center; justify-content: center">Prisijungti</button>
                        </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>