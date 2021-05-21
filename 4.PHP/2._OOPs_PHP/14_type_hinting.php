<?php
/*
set php version to  PHP 7.0 or greater than to use this concept;

it is process to send data to any method with acceptable datatype for example

function sum(int $v){
	echo $v+1;
}
sum('Hello');

in this case we will get error because function needs integer value and we are sending string value 

*/

function sum(int $v){
	echo $v+1;

}
sum(10);
echo '<br/>';



function fruits(array $n){
	foreach($n as $name){
		echo "$name <br/>";
	}
}
$na=['mango','banana','popaya','grapes'];
fruits($na);



class hello{
	public function sayHello(){
		echo "Hello every one <br/>";
	}
}
class Bye{
	public function sayBye(){
		echo "Bye Everyone <br/>";
	}
}

/*
function wow(hello $c)
{				
	
	$c->sayHello();			gives error becasue we are sending object but the method does not exist in hello class so it will make error
							Exception works on this concept
}


$objBye=new Bye();

wow($objBye);

*/

function wow(hello $c){
	$c->sayHello();
}

$objhello=new hello();

wow($objhello);



class school{
	public function getName(student $names){	// receiving object
		echo '<ul>';
		foreach($names->names() as $name){		// accessing function from object 
			echo '<li>'.$name.'</li>';
		}
		echo '</ul>';
	}
}
class student{
	public function names(){
		return ['Ram','Krishan','Gopal'];
	}
}

class library{

}
$lib=new library();
$stu=new student();
$sch=new school();


$sch->getName($stu);		// sending object 
?>