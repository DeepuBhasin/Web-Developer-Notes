<?php

function showName(&$n)
{
    $n = 'Deepu Bhasin';
}


$name = 'Deepinder Singh';

showName($name);

echo $name;