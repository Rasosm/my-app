<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?= $pageTitle ?? 'Untitled Page' ?></title>
    <script src="<?= URL . 'app.js' ?>"></script>
    <link rel="stylesheet" href="<?= URL . 'app.css' ?>">
    <link rel="stylesheet" href="font-awesome.min.css">
</head>
<body>
    <header class="container header">
    
    <img src="/TSB_logo_2013.png" alt="logo"></a>
    <?php if($pageTitle !=='Registracija') : ?>
  <div class="virsus">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= URL . 'saskaitos/' ?>"">Sąskaitų sąrašas</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="http://localhost/js-002/my-app/bank/addAssets.php">Pridėti lėšas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/js-002/my-app/bank/deductAssets.php">Nuskaičiuoti lėšas</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="<?= URL . 'saskaitos/create/' ?>">Sukurti naują sąskaitą</a>
        </li>
        <li class="nav-item">
          <form class="logout" action="<?= URL . 'saskaitos/logout/' ?>"" method="post">  
            <button type="button logout" class="btn btn-danger">Atsijungti</button>
          </form>
        </li>
      </ul>
    </div>
 <?php endif ?>
  
  </header>

    
