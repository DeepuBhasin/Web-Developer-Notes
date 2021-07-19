<?php
/* Variable Function 

1. First Method */
function showName($n)
{
    echo "Your Full name is : $n <br/>";
}

$name = 'showName';
$name('Deepinder Singh');

/* 
2. Second Method
    This is Called Anonymous function because they don't have function name
*/
$showName = function ($n) {
    echo "Your Full name is : $n and This is Anonymous Function  <br/>";
};

$showName('Deepinder Singh');