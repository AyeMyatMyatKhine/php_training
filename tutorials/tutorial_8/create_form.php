<?php
include "insert_data.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert Form</title>
</head>
<body>
</style>
</head>
<body>
  <div class="user-detail">
    <div class="form-title">
      <h2>Create Form</h2>
    </div>
    <p style="color:red"><?php if(!empty($msg)){echo $msg; }?></p>
    <form method="post" action="">
      <label>Country</label>
      <input type="text" name="country" required>
      <label>CO<sub>2</sub> Emission Rate</label>
      <input type="text" name="emission-rate" required>
      <button type="submit" name="create">Submit</button>
    </form>
  </div>
</body>
</html>