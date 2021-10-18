<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php 
      if (isset($_POST['form_submitted'])): 
   ?> //this code is executed when the form is submitted

    <h2>Thank You <?php 
                      echo $_POST['firstname']; 
                  ?> 
    </h2>

    <p>You have been registered as
    <?php 
        echo $_POST['firstname'] . ' ' . $_POST['lastname']; 
    ?>
    </p>

<p>Go <a href="/registration_form.php">back</a> to the form</p>

<?php else: ?>

    <h2>Registration Form</h2>

    <form action="registration_form.php" method="POST">

         First name:
        <input type="text" name="firstname">
        
        <br> Last name:
        <input type="text" name="lastname">
        
    <input type="hidden" name="form_submitted" value="1" />

        <input type="submit" value="Submit">

    </form>
    <?php 
    endif; 
    ?> 
</body>
</html>

   