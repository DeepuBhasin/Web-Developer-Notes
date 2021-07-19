<?php
/*
Difference between Echo and Print 
1. Cannot print Multiple arrguments in PHP for example print 'hello','world','India' this will not work
2. echo is faster then print 

*/
echo "Hello <br/>";
echo ('Hello <br/>');
echo 'Hello ', 'World', '<br/>';
echo 'Hello ' . 'World' . '<br/>';

print "Hello <br/>";
print('Hello <br/>');
print 'Hello ' . 'World' . '<br/>';