<?php
include "read.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Carbon Dioxide Emission Rate</title>
<style>
     table, td, th {  
      border: 1px solid #ddd;
      text-align: left;
    }
    
    table {
      border-collapse: collapse;
      max-width: 100%;
     width:90%;

    }
    .table-data{
      
      width:65%;
      float: right;
    }
    th, td {
      padding: 15px;
    }
body{
    overflow-x: hidden;
}

* {
  box-sizing: border-box;}
</style>
</head>
<body>
  <div class="table-data">
    <div class="list-title">
      <h2>Carbon Dioxide Emission Lists</h2>
    </div>
    <table border="1">
      <tr>
        <th>ID</th>
        <th>Country</th>
        <th>Emission Rate</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <?php
      if(count($fetchData) > 0) {
        $s=1;
        foreach($fetchData as $data){
      ?> 
      <tr>
        <td><?php echo $s; ?></td>
        <td><?php echo $data['country']; ?></td>
        <td><?php echo $data['emission-rate']; ?></td>
        <td><a href="crud-form.php ? edit= <?php echo $data['id']; ?>">Edit</a></td>
        <td><a href="crud-form.php ? delete= <?php echo $data['id']; ?>">Delete</a></td>
      </tr> 
      <?php
        $sn++;
        }

      }
      else{
      ?>
        <tr>
          <td colspan="7">No Data Found</td>
        </tr>
      <?php } ?>
 
    </table>
  </div>
</body>
</html>