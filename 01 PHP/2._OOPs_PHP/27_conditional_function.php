<?php
// this condition function return true or false 

class myClass{
	
	public $test;
	public function getMethodName()
	{
		echo "hello";
	}
	
}
trait myTrait{
	
}

interface myInterface{

}

// for class condition check
if(class_exists('myClass')){
	echo "Class Exist<br/>";
}
else{
	echo "Class Not Exist<br/>";
}


//for interface condition check;
if(interface_exists('myInterface')){
	echo "Interface Exist<br/>";
}
else{
	echo "Interface Not Exist<br/>";
}


$obj= new myclass();
/*
1. for methed condition check;
2. use where we implements(keyword also for interface) the interface in class
*/ 
if(method_exists($obj,'getMethodName')){
	echo "Method Exist<br/>";
}
else{
	echo "Method Not Exist<br/>";
}

//for trait condition check;
//2. use where we use(keyword also for trait) the trait in class
if(trait_exists('myTrait')){
	echo "Trait Exist<br/>";
}
else{
	echo "Trait Not Exist<br/>";
}


//for property condition check;
if(property_exists('myClass', 'test')){
	echo "Property Exist<br/>";
}
else{
	echo "Property Not Exist<br/>";
}


//for check, object is belong to that class condition check;
if(is_a($obj,'myclass')){
	echo "This object is class of myClass<br/>";
}
else{
	echo "This object is not class of myClass<br/>";
}


// for check the sub-Object of parent Class
class parentClass{

}
class childClass extends parentClass{

}

$obj=new childClass();

if(is_subclass_of($obj,'parentClass')){
	echo "This \$obj is a object of subClass of parentClass";
}else{
	echo "This \$obj is not of Class MyClass";
}







?>