<?php
include "database.php";

if(isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $editData = edit_data($connection, $id);
}

if(isset($_POST['update']) && isset($_GET['edit'])) {
  $id = $_GET['edit'];
  update_data($connection,$id);   
} 

function edit_data($connection, $id) {
  $query = "SELECT * FROM carbon-emission WHERE id= $id";
  $exec = mysqli_query($connection, $query);
  $row = mysqli_fecth_assoc($exec);
  return $row;
}

function update_data($connection, $id){
  $country = legal_input($_POST['country']);
  $emission_rate = legal_input($_POST['emission-rate']);

  $query="UPDATE carbon-emission 
          SET Country ='$country',
              Carbon Rate = '$emission_rate' WHERE id=$id";

  $exec= mysqli_query($connection,$query);
  
  if($exec){
    header('location:crud-form.php');
  }
  else{
    $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
    echo $msg;  
  }
}

function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>