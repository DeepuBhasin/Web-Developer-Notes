<?php
class abc{
	public function first(){
		echo "This is First function <br/>";
		return $this;						// return object of the current class;
	}
	public function second(){
		echo "This is second function <br/>";
		return $this;						// return object of the current class;

	}
	public function third(){
		echo "This is third function <br/>";
	}
}

 $obj=new abc();
$obj->first()->second()->third(); 
?>