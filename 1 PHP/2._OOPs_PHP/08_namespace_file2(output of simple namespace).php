<?php
require '08_namespace_file1.php';

/*
accessing college folder (namespace) then accesing class in that folder 

$obj=new college\teacherProfile(); // this is a way to create a object of teacherProfile Class


*/


$obj=new college\teacherProfile();

$obj->setName('Deepinder Singh','Web Developer');

echo $obj->getName();

?>