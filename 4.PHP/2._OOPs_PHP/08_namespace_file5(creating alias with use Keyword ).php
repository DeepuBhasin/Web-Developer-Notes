<?php
use college\employee\teacher\teacherProfile as teacherProfile;

require'08_namespace_file4(creating_alias).php';

$obj=new teacherProfile();

$obj->setName('Deepinder Singh','Web Developer');

echo $obj->getName();


?>