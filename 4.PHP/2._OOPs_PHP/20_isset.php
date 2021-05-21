<?php
/*
1. is to check that variable set or not 
2. isset is not worm in private variable we only get true or false in case of public case 
3. 

*/
class abc{
	public $name="Deepinder Singh";
	private $course='PHP';

	public function  __isset($property){
		echo isset($this->property);
	}
}

$obj=new abc();

// print_r($obj);

// echo isset($obj->name);
echo isset($obj->course);

?>