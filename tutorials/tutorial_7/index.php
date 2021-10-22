<?php
include 'phpqrcode/qrlib.php';

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
  $file_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR;
  $code_path = 'images/';

  if(!file_exists($file_path)){
    mkdir($file_path);
  }

  $filename = $file_path.time().'.png';

  if (isset($_REQUEST['level']) && $_REQUEST['level']!='')
    $errorCorrectionLevel = $_REQUEST['level'];

  if (isset($_REQUEST['size']) && $_REQUEST['size']!='')
    $matrixPointSize = $_REQUEST['size'];

  $frm_link = $_REQUEST['frm_qr'];
  $framePointSize = 2;
  QRcode::png($frm_link, $filename, $errorCorrectionLevel, $matrixPointSize, $framePointSize);
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generate QR code</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row justify-content-md-center mt-5">
      <div class="ml-2 col-sm-6">
        <?php if(isset($frm_link) and $frm_link!=""){?>
          <div class="alert alert-success"> QR created for <strong>[<?php echo $frm_link;?>]</strong></div>
          <div class="text-center"> <img src="<?php echo $code_path.basename($filename); ?>" /></div>
        <?php } ?>
        <form method="post">
          <div class="form-group">
            <label>Enter QR Name</label>
            <input type="text" name="frm_qr" id="frm_qr" class="form-control" required>
          </div>
          <div class="form-group">
            <label>QR Code Level</label>
            <select name="level" class="form-control">
              <option value="L">L</option>
              <option value="M" selected>M</option>
              <option value="Q">Q</option>
              <option value="H">H</option>
            </select>
          </div>
          <div class="form-group">
            <label>QR Code Size</label>
            <select name="size" class="form-control">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4" selected>4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Generate" class="btn btn-danger">
          </div>
        </form>
      </div>
   </div>
  </div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>
</body>
</html>