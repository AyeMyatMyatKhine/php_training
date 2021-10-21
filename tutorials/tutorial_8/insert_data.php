<?php
include "database.php";

if(isset($_POST['create'])) {
   $msg = insert_data($connection);      
}

function insert_data($connection){
  $country = legal_input($_POST['country']);
  $emission_rate = legal_input($_POST['emission_rate']);

  $query ="INSERT INTO carbon_emission (Country,Carbon Rate) VALUES (' $country','$emission_rate')";
  $exec = mysqli_query($connection,$query);
  if($exec){
    $msg = "Data was created sucessfully";
    return $msg;
  }
  else{
    $msg = "Error: " . $query . "<br>" . mysqli_error($connection);
  }
}

function legal_input($value) {
   $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
 }
?>