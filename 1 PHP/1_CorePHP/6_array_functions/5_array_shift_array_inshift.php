<?php
echo "<pre>";
echo "<h2>Array Shift Function </h2>";
$food = ['orange', 'Mango', 'grapes', 'banana'];
print_r($food);
/*function is used to Remove the first value from the array*/
array_shift($food);
print_r($food);

echo "<h2>Array Unshift Function </h2>";
$food = ['orange', 'Mango', 'grapes', 'banana'];
print_r($food);
/*function is used to insert the value first in the array*/
array_unshift($food, 'waterlemon');
array_unshift($food, ['papaya', 'Apple', 'guavya', 'lemon']);
print_r($food);