<?php
echo '<h1>Slice array Function</h1>';
echo '<pre>';

$color = ['red', 'green', 'pink', 'yellow', 'grey', 'white', 'black'];

print_r($color);
/*Starting For First index*/
$newarray = array_slice($color, 3, 6);
print_r($newarray);


/*         -7      -6      -5       -4       -3       -2       -1*/
$color = ['red', 'green', 'pink', 'yellow', 'grey', 'white', 'black'];
/*Starting For Last index and new index will formed */
$newarray = array_slice($color, -5, 3);
print_r($newarray);

/*want original index value from the older array*/
$newarray = array_slice($color, 2, 3, true);
print_r($newarray);