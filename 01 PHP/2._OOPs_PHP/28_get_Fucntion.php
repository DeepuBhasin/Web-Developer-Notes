<?php
echo "<pre>";
Class myClass{
	public $firstname;
	public $lastname;
	public $age=27;
	public $job="web Developer";
	private $salary=16000; 

	function __construct(){
		$this->firstname='Deepinder';
		$this->lastname='Singh';
	}
	 function name(){
	 	echo "Class name is from inside : ".get_class($this).'<br/>'; // get class name 
	 }

	 function myfunc1(){

	 }
	 function myfunc2(){
	 	
	 }
	 function myfunc3(){
	 	
	 }
	 protected function myfunc4(){
	 	
	 }
	 private function myfunc5(){
	 	
	 }
	 public function getAllFunctionName(){
	 	print_r(get_class_methods($this));		// to print private and protected names 
	 }
	 public function getAllVariablesName(){
	 	print_r(get_class_vars(__CLASS__));
	 }
	 public function getAllVariableUsingObject(){
	 	print_r(get_object_vars($this));
	 }
}

$obj=new myClass();
$obj->name();
echo "Class name is from outside : ".get_class($obj).'<br>'; // get class name 



class childClass extends myclass{

	 function name(){
	 	echo "Parent Class name is from inside : ".get_parent_class($this).'<br/>'; // get Parent class name 
	 }
}

$nobj= new childClass();
$nobj->name();
echo "Parent Class name is from outside : ".get_parent_class($nobj).'<br/>'; // get Parent class name 
echo "Parent Class name is from outside (another method) : ".get_parent_class('childClass').'<br/>'; // get Parent class name 



/*
1.this method will return all the public methods 
2. to print private and protected functions we have to use this function with in the class
*/
$classMethods=get_class_methods($obj);			// get all method names (all public methods)
		 // or
$classMethods=get_class_methods('myClass');			// get all method names (all public methods)
print_r($classMethods);

$obj->getAllFunctionName();

/*
1.this will print all the public variables in the class with associate array 
2. to print private and protected functions we have to use this function with in the class 
3. it will not return those variables which are assigne in the cosntruct function means which we initilise in starting of the class
*/
$classVars=get_class_vars(get_class(new $obj));

print_r($classVars);	

$obj->getAllVariablesName();

/*
1.this will print all the public variables in the class with associate array 
2. to print private and protected functions we have to use this function with in the class 
3. it will return those variables which are assigne in the cosntruct function 
*/
print_r(get_object_vars($obj));

$obj->getAllVariableUsingObject();


/*
return class name from which it is call 
*/
class abc{
	public static function getName(){
		echo 'Class from where it is called : '.get_called_class().'<br/>';
	}
}

class xyz extends abc{

}

abc::getName();
xyz::getName();

/*
return all the classess on this files
*/
print_r(get_declared_classes());


/*
return all the interfaces on this files
*/
interface test{
	public function testInterface();
}
print_r(get_declared_interfaces());



/*
return all the Traits on this files
*/
trait test2{

}

print_r(get_declared_traits());


/*
making another name of class

*/
class_alias('myClass','mc');

$a=new mc();
$b=new myclass();
echo '<br>';
echo $a->age;
echo '<br>';
echo $b->age;
?>