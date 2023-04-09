<?php

class Employee{
	// properties of our Class
	public $name;
	public $salary;

// function __construct(){							// without arguments 
	// 	echo "This is my construct for Employee";
	// }

	

	function __construct($name,$salary){				// with arguments 
		$this->name=$name;
		$this->salary=$salary;
	}	

	function getData(){
		return $this->name.' : '.$this->salary;
	}
	function getMore(){
		return $this->salary+300;
	}

	function __destruct(){								// it never received any arguments
		echo "</br> this is destruct $this->name : $this->salary";
	}
}	

$deep=new Employee('Deepinder','3000');

echo $deep->getData();

echo "<br/>";

echo $deep->getMore();
?>