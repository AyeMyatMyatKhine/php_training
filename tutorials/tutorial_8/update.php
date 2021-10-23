<?php
  require_once "database.php";

  $country = $carbon_rate = "";
  $country_err = $carbonRate_err = "";
 
  if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];
    $input_country = trim($_POST["country"]);
    if(empty($input_country)){
      $country_err = "Please enter country name.";
    } 
    elseif(!filter_var($input_country, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      $countyr_err = "Please enter a valid name.";
    } 
    else{
        $country = $input_country;
    }
    
    $carbon_rate = trim($_POST["carbon"]);
    if(empty($carbon_rate)){
      $carbon_rate = "Please enter carbon rate.";     
    } 
    else{
      $carbon_rate = $carbon_rate;
    }
    
    if(empty($country_err) && empty($carbon_rate)){
      $sql = "UPDATE carbon_emission SET Country=?, CarbonRate=? WHERE id=?";
         
      if($stmt = mysqli_prepare($connection, $sql)){
        mysqli_stmt_bind_param($stmt, "ssi", $param_country, $param_carbon, $param_id);
        $param_country = $country;
        $param_carbon = $carbon_rate;
        $param_id = $id;
        if(mysqli_stmt_execute($stmt)) {
          header("location: index.php");
          exit();
        } 
        else{
          echo "Oops! Something went wrong. Please try again later.";
        }
      }
      mysqli_stmt_close($stmt);
    }
    mysqli_close($connection);
  } 
  else {
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
      $id =  trim($_GET["id"]);
        
      $sql = "SELECT * FROM carbon_emission WHERE id = ?";
        if($stmt = mysqli_prepare($connection, $sql)){
          mysqli_stmt_bind_param($stmt, "i", $param_id);
          $param_id = $id;
            
          if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
              $country = $row["Country"];
              $carbon_rate = $row["CarbonRate"];
            } 
            else {
              header("location: error.php");
              exit();
            }
                
          } 
          else {
            echo "Oops! Something went wrong. Please try again later.";
          }
        }
      mysqli_stmt_close($stmt);
      mysqli_close($connection);
    }  
    else {
      header("location: error.php");
      exit();
    }
  }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Data</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
  .wrapper{
    width: 600px;
    margin: 0 auto;
  }
</style>
<body>
  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h2 class="mt-5">Update Record</h2>
          <p>Please edit the input values and submit to update the record.</p>
          <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
            <div class="form-group">
              <label>Country</label>
              <input type="text" name="country" class="form-control <?php echo (!empty($country_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $country; ?>">
              <span class="invalid-feedback"><?php echo $country_err; ?></span>
            </div>
            <div class="form-group">
              <label>Carbon Rate</label>
              <input type="text" name="carbon" class="form-control <?php echo (!empty($carbonRate_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $carbon_rate; ?>">
              <span class="invalid-feedback"><?php echo $carbonRate_err; ?></span>             
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <input type="submit" class="btn btn-primary" value="Update">
            <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
          </form>
        </div>
      </div>        
    </div>
  </div>
</body>
</html>