<?php



/*

this will give error here because we did not use abstract key word in the front of the class becuase it contain absratct methed  


class school{

	abstract public function getData();

	public function showData(){
		return "hello world";
	} 
}

$obj=new school();

echo $obj->showData();
*/ 




// How we can abstract class

abstract class school{

	abstract public function getData();

	public function showData(){
		return "hello world <br/>";
	} 
}

class teacher extends school{
	
	public function getData(){
		echo "Hello Teacher <br/>";
	}

	public function getName(){
		echo "Deep <br/>";
	}
}

$obj=new teacher();

echo $obj->getName();
echo $obj->showData();
?>