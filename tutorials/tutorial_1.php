<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tutorial1</title>
</head>
<style>
    table {
        width:270px;
        border:3px solid #000000;
        border-collapse: collapse;
    }
    td {
        height:30px;
        width:30px;
    }
</style>
<body>
  <table>
    <?php
      for($row=1; $row<=8; $row++)
	  {
      echo "<tr>";
          for($col=1; $col<=8; $col++) {
             $total = $row+$col;
             if($total%2 == 0){
                echo "<td bgcolor=#FFFFFF></td>";
             }
             else{
                echo "<td bgcolor=#000000></td>";
             }
           }
          echo "</tr>";
       }
    ?>
  </table>
</body>
</html>