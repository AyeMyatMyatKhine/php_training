<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate QR code</title>
</head>
<body>
  <div class="wrapper">
    <form method="post">
      <input type="text" name="qr_text" placeholder="Enter your QR name">
      <input type="submit" name="generate_text" value="Generate">
    </form>
  </div>
  <?php 
     if(isset($_POST['generate_text'])) {
        include('phpqrcode/qrlib.php');
         $folder = "images/";
         $file_name = $folder.uniqid().".png";
         $text = $_POST['qr_text'];
         QRcode::png($text , $file_name , 'L' , 10);
         echo "<img src='".$file_name."'>";

         //QRcode::png($text);
      }
  ?>
</body>
</html> 