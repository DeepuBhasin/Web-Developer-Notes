<?php
/*
it will help to call function using $object() this concept instead of $object->sum(1,2);

*/
class Calculation{
	public $a,$b;
	public function __construct($a,$b){
		$this->a=$a;
		$this->b=$b;
	}
	// public function sum($a,$b){
	// 	return $a+$b;
	// }
	public function __invoke(){
		return $this->a+$this->b;
	}
}

$obj=new Calculation(1,3);
echo $obj();
?>