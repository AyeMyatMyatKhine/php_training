<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Images</title>
</head>
<style>
  body {
    background-image:linear-gradient(-90deg,#24B8FE,#89C585);
  }
  h3 {
    margin-top:30px;
    color: #1040A9;
  }
  .img-file {
    width:80%;
    height:20px;
  }
</style>
<body>
    <h1>Upload Image</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="userImg"> <br> <br>
    <input type="text" name="folder" placeholder="Enter your folder name" >
    <input type="submit" value="save" name="storeImg" >
    </form>
    <?php
      if(isset($_POST["storeImg"])){
        $imgName = $_FILES["userImg"]["name"];
        $tmpName = $_FILES["userImg"]["tmp_name"];

        $folder = $_POST['folder'];
        if(!$folder) mkdir($folder);

        $target_file = "$folder/" . $imgName ;

        if(move_uploaded_file($tmpName , $target_file)) {
          move_uploaded_file($tmpName , $target_file);
          echo "Success!";
        }
        else {
          echo "fail!";
        }
      }
    ?>
</body>
</html>
