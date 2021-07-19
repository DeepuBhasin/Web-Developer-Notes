<?php

class Employee{
	// properties of our Class
	public $name;
	public $salary;


	//Method of our Class

	// constructor- It allows you to initilization objects. It is the code which is executed whenever a new object is intantiated 

	// without arguments 
	// function __construct(){
	// 	echo "This is my construct for Employee";
	// }

	// with arguments 

	function __construct($name,$salary){
		$this->name=$name;
		$this->salary=$salary;
	}	

	function getData(){
		return $this->name.' : '.$this->salary;
	}
	function getMore(){
		return $this->salary+300;
	}
}	

$deep=new Employee('Deepinder','3000');

echo $deep->getData();

echo "<br/>";

echo $deep->getMore();
?>