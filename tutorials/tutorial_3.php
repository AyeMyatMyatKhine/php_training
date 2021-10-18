<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tutorial3</title>
</head>
<style>
    body{
      background-color:#95C1D9;
      color: #fff;
      text-align:center;
      margin: 250px auto;
    }
    .dob {
        width:150px;
        height:30px;
    }
</style>
<body>
  <div class="container">
    <form method="post">
      <label>Enter your birthday:</label>
      <input type="date" name="datetimepicker" class="dob">
      <input type="submit" name="submit" value="Calculate Age">
    </form>
    <?php
      if(isset($_POST['submit'])) {
        $bday = $_POST['datetimepicker'];
        $today = date("d-m-Y");
        if(strtotime($bday) < strtotime($today)){
          $age = date_diff(date_create($today), date_create($bday));
          echo "<br>";
          echo 'Your Age is ' .$age -> format('%y');
        }
        else {
          echo "<br>";
          echo 'your date is wrong';
        }
      }
    ?>
  </div>
</body>
</html>