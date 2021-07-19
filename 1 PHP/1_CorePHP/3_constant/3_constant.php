<?php
/*
    1.Syntax 
      ------
        define(name,value,case-insensitive)
    
    2. we Cannot Change Global variable Values 

*/
define('NAME', 'Deepinder Singh', true);


echo NAME . '<br/>';

echo name . '<br/>';    // beacuse case-insensitive is true

echo "To Check : " . defined('NAME') . '<br/>';

// Get error Becuase they are not same variables 
echo $name;
echo $NAME;


// Here it will show error Because we are defining constant Variable again 
define('NAME', 'Deepinder Singh', true);