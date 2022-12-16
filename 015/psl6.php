<?php

$get = $_GET['get'] ?? ''; 
$post = $_POST['post'] ?? ''; 

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

<body style="background: <?= $_SERVER['REQUEST_METHOD'] === 'GET' ? 'green' : 'yellow' ?>">
  <form action="http://localhost/js-002/my-app/015/psl6.php?get=1" method="get">
        <button type="submit" name= "get">get</button>
    </form>
    <form action="http://localhost/js-002/my-app/015/psl6.php" method="post">
        <button type="submit">post</button>
    </form>


</body>
</html>