<?php
echo "<h1>Merga Array Function </h1>";
echo '<pre>';

$food = ['orange', 'banana', 'grapes'];
print_r($food);
$color = ['a' => 'red', 'b' => 'blue'];
print_r($color);

$veggie = ['carrot', 'pea'];
print_r($veggie);
$new_array = array_merge($food, $veggie, $color);
print_r($new_array);



/*When ever new value is inserted with commen key then new array will replace the older array
    here $new_array has 'a' => 'red', 'b' => 'blue' and 'a' => 'pink', 'b' => 'yello' has this array
    now new array value will replace by older one 
    */
$color_new = ['a' => 'pink', 'b' => 'yello'];

$new_array1 = array_merge($new_array, $color_new);
print_r($new_array1);

/* This is also Same thing means merge function*/
$new_array2 = $color + $color_new;

print_r($new_array2);
echo "<h1>Merga Recursive Array Function </h1>";

/* this function will not replace the older array with new array , it will will create new index where common key found */
$new_array3 = array_merge_recursive($new_array, $color_new);
print_r($new_array3);


echo "<h1>Combine Array Function </h1>";

$name = ['ram', 'mohan', 'Salman'];
$age = [35, 46, 78];

$newarray = array_combine($name, $age);
print_r($newarray);