<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pattern example</title>
</head>
<body>
<?php
echo "<h1>hello</h1>";

    for ($i = 0; $i < 6; $i++)
    {
        for($j = 0; $j <= $i; $j++ )
        {
            echo "* ";
        }
        echo "<br>";
    }

?>
</body>
</html>
