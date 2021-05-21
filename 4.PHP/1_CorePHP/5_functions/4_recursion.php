<?php

//
function display($number)
{
    if ($number <= 5) {
        echo "Number is $number <br/>";
        display($number + 1);
    }
}

display(1);

echo "<br/><br/><br/>";

/*Full explanation in the yahoo baba video */

function factorial($number)
{
    if ($number == 0) {
        return 1;
    }
    return ($number * factorial($number - 1));
}
echo factorial(5);