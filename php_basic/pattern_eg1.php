<?php
echo "<h1>hello</h1>";
$n=5;

function pypart($n)
{
    for ($i = 0; $i < $n; $i++)
    {
        for($j = 0; $j <= $i; $j++ )
        {
            echo "* ";
        }
        echo "\n";
    }
}

?>