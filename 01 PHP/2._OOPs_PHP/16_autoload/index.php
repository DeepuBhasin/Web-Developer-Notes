<?php
/*
if we want to include two files in this file then we use : 
require '16_.autoload_file_1.php';
require '16_.autoload_file_2.php';

but i we want to include 100+ files then this is not a good practise 

so we use 

function __autoload($class){
	require "$class.php";				// path 
}

this function will check automatically which class object is create by user after that it will pass object to class varaible and then it will call class acccording to that particular file 

your file name and class name should be same otherwise it will not work



*/
function __autoload($class){
	require "$class.php";
}

// require '16_.autoload_file_1.php';
// require '16_.autoload_file_2.php';

$objfirst=new first();
$objsecond=new second();

?>