<?php
/*
1. we cannot store object directly in file, session , database etc , we have to convert into array first so :  serialize(object) function, while converting into array it will return all properties into array but in some case we need only some values then we use sleep method 

	so when we use serialize function the sleep method automatically call and it return only that (basically clean the array ) array which we want for save , example 
		here are 3 properties course firstname lastname 
		using sleep method we only returning firstname and lastname

		then a json data will receive and we can store into any thing 
	

*/
class abc{
	
	public $course='PHP';
	private $firstname;
	private $lastname;

	public function setName($fname,$lname){
		$this->firstname=$fname;
		$this->lastname=$lname;
	}
	// public function __sleep(){
	// 	return array('firstname','lastname');			// property name 
	// }
}	

$obj=new abc();
$obj->setName('Deepinder','Singh');

//echo $obj; //Catchable fatal error: Object of class abc could not be converted to string
//so we will convert into array using serialize method 


$test=serialize($obj);

echo $test;

/*
1. when sleep function is comment 
	then $test will return this : 
		O:3:"abc":3:{s:6:"course";s:3:"PHP";s:14:"abcfirstname";s:9:"Deepinder";s:13:"abclastname";s:5:"Singh";}

o means object 
3 means class name abc 
3 means contains 3 properties firstname lastname course 
s means string 
14 means number of characters



2. when sleep function is uncomment 
	then $test will return this : 
		O:3:"abc":2:{s:14:"abcfirstname";s:9:"Deepinder";s:13:"abclastname";s:5:"Singh";}

o means object 
3 means class name abc 
2 means contains 3 properties firstname lastname 
s means string 
14 means number of characters


*/


?>