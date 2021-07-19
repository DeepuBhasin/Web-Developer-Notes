<?php
/*
call when we print object as string 
*/
class abc{
	
	public function __toString(){
		return "Can't print the object  as a sting of class : ".get_class($this);
	}	
}	

$obj=new abc();

echo $obj;

?>