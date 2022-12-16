<?php

if (!empty($_GET)) {
  if ($_GET['redirect'] == 1){
    header('Location: http://localhost/js-002/my-app/015/005/blue.php');
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

<body style="background-color: red">
  

<a href="http://localhost/js-002/my-app/015/005/red.php?redirect=1">Red</a>



</body>
</html>