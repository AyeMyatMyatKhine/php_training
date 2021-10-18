<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login process</title>
</head>
<style>
    .container {
        width:500px;
        height:130px;
        margin:50px auto;
        background-color:#C5D0F0;
        color:#fff;
        text-align:center;
    }
    p {
        display:inline-flex;
        margin-top:30px;
    }
    a {
        color:#fff;
    }
</style>
<body>
  <?php
    $name=$_POST['name'];
    $pwd=$_POST['pwd'];
    $_SESSION['name'] = $name;
    $_SESSION['pwd'] = $pwd;
  ?>
  <div class="container">
    <p>Login Success!</p> <br>
    <a href="logout.php">Log out</a>
  </div>
</body>
</html>

