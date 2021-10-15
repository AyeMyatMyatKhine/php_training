<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
 $n=6;
  for($x=0; $x<$n; $x++){
      for($y=$x; $y<$n; $y++){
          echo "&nbsp &nbsp";
      }
      for($y=0; $y<$x-1; $y++){
          echo "* ";
      }
      for($y=0; $y<$x; $y++){
        echo "* ";
      }
      echo "<br>";
  }

  for($x=0; $x<$n; $x++){
    for($y=0; $y<$x; $y++){
        echo "&nbsp &nbsp";
    }
    for($y=$x; $y<$n; $y++){
        echo "* ";
    }
    for($y=$x; $y<$n-1; $y++){
        echo "* ";
    }
    echo "<br>";
  }
  
 ?>
</body>
</html>