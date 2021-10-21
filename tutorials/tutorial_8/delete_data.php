<?php
include "database.php";

if(isset($_GET['delete'])){
  $id= $_GET['delete'];
  delete_data($connection, $id);
}

function delete_data($connection, $id){
  $query="DELETE from carbon-emission WHERE id=$id";
  $exec= mysqli_query($connection,$query);

  if($exec){
    header('location:crud-form.php');
  }
  else{
    $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
    echo $msg;
  }
}
?>