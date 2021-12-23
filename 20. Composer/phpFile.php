<?php


use myclass\simpleclass\Class1;
use myclass\simpleclass\Class2;
use myclass\otherclass\Class3;
use myclass\otherclass\Class4;
use myclass\otherclass\Class5;
use Country\India\Delhi;
use Country\India\haryana;
use Country\India\Punjab;
use Country\Usa\La;
use Country\Usa\lv;
use Food\Afgan\Samosa;
use Food\China\Noodles;
use Food\China\Springrole;
use Food\India\Daal;
use Food\India\Saag;

require './vendor/autoload.php';

function1();
function2();
function3();

$obj1 = new Class1();
$obj2 = new Class2();
$obj3 = new Class3();
$obj4 = new Class4();
//$obj4 = new Class5();             it will cause error beacuse this class is remove using composer.json file


$obj5 = new Delhi();
$obj6 = new haryana();
$obj7 = new Punjab();

$obj8 = new La();
$obj9 = new lv();

$obj10 = new Samosa();
$obj11 = new Noodles();
$obj12 = new Springrole();
$obj13 = new Daal();
$obj14 = new Saag();
