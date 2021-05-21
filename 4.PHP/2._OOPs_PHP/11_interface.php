<?php
/*
1. Interface like Abstract Classes hence cannot create object so all need drived class to access properties and method
2. We can inherit Mutliple Classes in Single Class just like trait  
3. Access modifiers are not allowed in interfaces classes hence cannot create variables 
4. All functions in each interface must be explained in derived classe otherwise it will create error


*/

interface parent1{
	function calc($a,$b);
}
interface parent2{
 	
 	function sub($a,$b);
}


Class B implements parent1,parent2{
	public function calc($a,$b){
		return $a + $b;
	}
	public function sub($a,$b){
		return $a - $b;
	}
}

$bObj=new B();


echo $bObj->calc(2,34);


?>