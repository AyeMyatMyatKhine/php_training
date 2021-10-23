<?php
  $conn = mysqli_connect("localhost"  ,"root" , "781217515$" , "php-training");
  if(!$conn){
   die('Could not Connect My Sql:' .mysql_connect_error());
  } 
  if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (Username , Email , Password) VALUES ('$username' , '$email' , '$password')";
    if (mysqli_query($conn, $sql)) {
    }
    else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row justify-content-sm-center mt-5">
      <div class="col-sm-6">
        <h3 class="text-center">Log In</h3>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group mt-4">
            <input type="text" name="username" class="form-control" placeholder="Your name" required>
          </div>
          <div class="form-group mt-4">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="form-group mt-4">
            <input type="password" name="password" class="form-control" placeholder="password" required>
          </div>
          <div class="form-group mt-4 text-center">
            <input type="submit" name="submit" class="btn btn-info" value="Log In" required>
          </div>
        </form>
      </div>
    </div>  
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>