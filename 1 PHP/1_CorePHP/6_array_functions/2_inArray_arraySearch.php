<?php

$food = ['orange', 'banana', 'apple', 'grapes', 'banana', '55'];

echo '<pre>';
print_r($food);
echo 'In food array \'orange\' is found : ' . in_array('orange', $food, true) . ' (True)';
echo '<br/>';
echo 'In food array (int) 55 is not found because strict mode is on  : ' . in_array(55, $food, true) . ' (false)';

echo "<br><br><br>";
$a = array(array('p', 'h'), array('p', 'r'), 'o');
if (in_array(array('p', 'h'), $a, true)) {
    echo "Find Successfully Whole array in array {in_array(array('p', 'h')}";
} else {
    echo "Cannot Find Whole Array in array";
}

echo "<br/><br/><br/>";

echo "Key of 'apple' in Food array is : " . array_search('apple', $food);