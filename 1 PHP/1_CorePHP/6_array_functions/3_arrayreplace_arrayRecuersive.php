<?php
echo "<pre>";
echo "<h2>Array Replace Function </h2>";
$food = ['orange', 'Mango', 'grapes', 'banana'];

print_r($food);

$vegge = ['carrot', 'patato'];

print_r($vegge);
/* This function not replace the existing array, it create new array by replacing from starting index
    and work for single dimension array
*/

$new_array = array_replace($food, $vegge);

echo "<h3>New Array</h3>";
print_r($new_array);

echo "<br/><br/><br/>";

echo "<h2>Array Replace Recursive Function </h2>";
$array1 = [
    'a' => ['red'],
    'b' => ['green', 'pink']
];

print_r($array1);

$array2 = [
    'a' => ['yellow'],
    'b' => ['black']
];
print_r($array2);
$new_array = array_replace_recursive($array1, $array2);

print_r($new_array);