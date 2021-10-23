<?php
require_once "database.php";

$country = $carbon_rate = "";
$country_err = $carbonRate_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_country = trim($_POST["country"]);
    if(empty($input_country)) {
      $country_err = "Please enter country.";
    } 
    elseif(!filter_var($input_country, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      $country_err = "Please enter a valid country.";
    } 
    else{
      $country = $input_country;
    }
    
    $carbon_rate = trim($_POST["carbon"]);
    if(empty($carbon_rate)){
      $carbonRate_err = "Please enter carbon rate.";     
    } 
    else{
      $carbon_rate =  $carbon_rate;
    }
    
    if(empty($country_err) && empty($carbonRate_err)){
        $sql = "INSERT INTO carbon_emission (Country, CarbonRate) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($connection, $sql)){
          mysqli_stmt_bind_param($stmt, "ss", $param_country, $param_carbon);
            
          $param_country = $country;
          $param_carbon = $carbon_rate;
            
          if(mysqli_stmt_execute($stmt)){
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
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Create Page</title>
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
          <h2 class="mt-5">Create Record</h2>
          <p>Please fill this form and submit to add new record to the database.</p>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
            <input type="submit" class="btn btn-primary" value="Add">
            <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
          </form>
        </div>
      </div>        
    </div>
  </div>
</body>
</html>