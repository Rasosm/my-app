<?php

if (!empty($_REQUEST)) {
  $bg = $_REQUEST['bg'];
}

if (!$_REQUEST) {
  $bg = 'blue';
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $bg = 'yellow';
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>6 Uždavinys</title>
</head>

<body style="background-color: <?= $bg ?> ">

  <form action=" <?= $_SERVER['PHP_SELF'] ?>" method="get">
    <button type="submit" name="bg" value='green'>MAKE BG GREEN</button>
  </form>

  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <button type="submit" name="bg">MAKE BG YELLOW</button>
  </form>

</body>

</html>