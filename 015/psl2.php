<?php

if (!empty($_GET)) {
  if (preg_match('/^[0-9a-f]{6}/', $_GET['color'] ?? '')) {
    $color = '#' . $_GET['color'];
  } else {
    header("http://localhost/js-002/my-app/015/psl2.php");
    die;
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>

<body style="background-color: <?= $color ?? 'black'?>">
  

<a href="http://localhost/js-002/my-app/015/psl2.php?">Black</a>



</body>
</html>