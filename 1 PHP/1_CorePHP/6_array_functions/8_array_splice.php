<?php
echo '<h1>Splice array Function</h1>';
echo '<pre>';
$color = ['red', 'green', 'pink', 'yellow', 'grey', 'white', 'black'];
print_r($color);

array_splice($color, 2);
print_r($color);



$color = ['red', 'green', 'pink', 'yellow', 'grey', 'white', 'black'];
/*here i am re*/
array_splice($color, 2, 2);
print_r($color);