<?php
$x = 0;
abc:

$x++;

echo $x;
echo "<br/>";
if ($x == 6) {
    goto bb;
}
goto abc;


bb:
echo "ok";