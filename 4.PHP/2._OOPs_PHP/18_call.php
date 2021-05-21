<?php
/*
1. it handle private and non existing Methods (function) only  in class
2. _get Magic mathod help to show perfessional error instead of php fatel error;
3. get automatically call when error is generated 
4. syntax 
	public function __call($methodName,$args){
	{
		statement;
	}

*/
class abc{
	private $firstName="Deepinder";
	private $lastName="Singh";
	
	private function setName($firstName){
		$this->firstName=$firstName;
	}

	public function __get($variableName){
		echo "You are trying to access Non Existing or private property($variableName)<br/>";
	}

	public function __call($methodName,$args){
					   //object method name 
		if(method_exists($this,$methodName)){				// use to check method in current class 

							    //object method name  args
			call_user_func_array([$this,$methodName],$args);		// use to set value using call method with in the class 														we can also use public function to set private values 

		}else{
			echo "You are trying to access Non Existing or private Method($methodName) and parameters : <br/>";
			print_r($args);
			echo "<br/>";
		}
	}
	public function getPrivate(){
		return 'First Name : '.$this->firstName.' Last Name : '.$this->lastName;
	}
}

echo "<pre>";
$obj=new abc();


$obj->getName('x','x');

$obj->setName('Deep','Singh');

echo $obj->getPrivate();
echo "<br/>";
print_r($obj); // define the object properties 


?>