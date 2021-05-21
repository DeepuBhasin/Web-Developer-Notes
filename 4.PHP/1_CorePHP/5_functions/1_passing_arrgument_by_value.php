<?php
/*
here $fullname is different variable and $n is different variable, here we are sending copy of value from $fullname to $n 
*/

function showName($n = null)
{
    $n = 'Deepu Bhasin';
}

$fullname = 'Deepinder Singh';

showName($fullname);

echo $fullname;