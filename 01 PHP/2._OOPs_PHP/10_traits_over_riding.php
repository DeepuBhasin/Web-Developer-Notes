<?php
trait helloTrait{
	public function sayHello(){
		echo "Hello From helloTrait";
	}

	private function privateHello(){
		echo "privateHello From helloTrait";
	}

	private function oldHello(){
		echo "oldHello From helloTrait";
	}
}
trait hiTrait{
	public function sayHello(){
		echo "Hello From hiTrait";
	}
}

/*
this below code gives erro 

Fatal error: Trait method sayHello has not been applied, because there are collisions with other trait methods on base
*/
// class base{
// 	use hello,hi;
// } 


class base{
	use helloTrait,hiTrait{
		helloTrait::sayHello insteadof hiTrait;			// in helloTrait use sayHello Method instead of hiTrait 														sayHello method

		hiTrait::sayHello as newhello;  				// renaming function to another name 

		helloTrait::privateHello as public;				// making private function to public function 

		helloTrait::oldHello as public newName;			// making private function to public function and renaming
	}
}



$obj=new base();

$obj->sayHello();

echo "<br/>";

$obj->newhello();

echo "<br/>";

$obj->privateHello();

echo "<br/>";

$obj->newName();
?>