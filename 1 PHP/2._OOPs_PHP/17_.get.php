<?php
/*
1. it handle private and non existing properties (variables) only  in class
2. _get Magic mathod help to show perfessional error instead of php fatel error;
3. get automatically call when error is generated 
4. syntax 
	public function __get($variableName)
	{
		statement;
	}



	set function is used to set private variables and values which does't exist in the class

	get function is used to get private variables and values which does't exist in the class

*/
class abc{
	private $servername="localhost";
	private $username="root";
	private $password="";

	private $data=['name'=>'Deepinder Singh','course'=>'PHP','fee'=>2000];

	// for variables 

	public function __get($variableName){
		echo "You are trying to access Non Existing or private property($variableName)<br/>";
	}

	// for array

	// public function __get($key){
	// 	if(array_key_exists($key,$this->data)){
	// 		return $this->data[$key];
	// 	}
	// 	else{
	// 		return "This key($key) is not defined";
	// 	}

	// }
}

$obj=new abc();
$obj->servername;
$obj->databaseName;



// send key of data array

//echo $obj->fee;


?>