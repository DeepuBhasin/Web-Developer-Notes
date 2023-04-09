<?php
/*
wakeUp method is called when unserialize 

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

	public function __wakeup(){
		echo 'This is wake up method<br/>';
	}
}	

$obj=new abc();
$obj->setName('Deepinder','Singh');

$test=serialize($obj);

echo "<pre>";

//it will convert array into object
$us=unserialize($test);
print_r($us);

?>