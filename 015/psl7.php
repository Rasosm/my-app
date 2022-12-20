<?php

if (!empty($_GET)) {
    $color = $_GET['color'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Location: http://localhost/js-002/my-app/015/psl7.php?color=yellow');
    die;
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

<body style="background-color: <?= $color ?>">
  <form action="http://localhost/js-002/my-app/015/psl7.php" method="get">
        <button type="submit" name="color" value="green">get</button>
    </form>
    <form action="http://localhost/js-002/my-app/015/psl7.php" method="post">
        <button type="submit">post</button>
    </form>


</body>
</html>