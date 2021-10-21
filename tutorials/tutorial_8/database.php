<?php

$connection = mysqli_connect("localhost", "root", "781217515$", "php-training");
if (!$connection) {
  die("Unable to Connect database: " . mysqli_connect_error());
}
 mysqli_close($connection);
?>