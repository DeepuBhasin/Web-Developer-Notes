<?php
echo "<pre>";
echo "<h2>Array Pop Function </h2>";
$food = ['orange', 'Mango', 'grapes', 'banana'];
print_r($food);
/*function is used to Remove the last value from the array*/
array_pop($food);
print_r($food);

echo "<h2>Array Push Function </h2>";
$food = ['orange', 'Mango', 'grapes', 'banana'];
print_r($food);
/*function is used to insert the value in last in the array*/
array_push($food, 'waterlemon');
array_push($food, ['papaya', 'Apple', 'guavya', 'lemon']);
print_r($food);