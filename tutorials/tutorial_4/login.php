<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<style>
    .container {
      width:600px;
      margin:180px auto;
      padding:8px 0;
      background-color:#28C8F8;
      color : #333;
      font-weight: bold;
    }
    h2 {
      text-align:center;
    }
    .form {
      display:block;
      margin: 10px auto;
      width:300px;
      height:30px;
      border:none;
      outline:none;
      border-bottom:1px solid #000000;
      background-color:transparent;
    }
    .login-btn {
      display:block;
      margin: 25px auto;
      width:100px;
      height:30px;
      outline:none;
    }
    .login-btn:hover{
      background-color:#F5F5F5;
      outline:none;
      border:none;
    }
</style>
<body>
    <div class="container">
      <h2>Log In</h2>
      <form action="login_process.php" method="post">
         <input type="text" name="name"  class="form" placeholder="Username" autocomplete="off" required>
         <input type="password" name="pwd" class="form" placeholder="Password" autocomplete="off" required>
         <button class="login-btn" type="submit">Log In</button>
      </form>
    </div>
</body>
</html>