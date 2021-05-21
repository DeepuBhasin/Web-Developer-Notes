<?php
/* The clone keyword is used to create a copy of an object.

If any of the properties was a reference to another variable or object, then only the reference is copied. Objects are always passed by reference, so if the original object has another object in its properties, the copy will point to the same object. This behavior can be changed by creating a __clone() method in the class.
*/

$a=5;
$b=$a;	// this is called copy by value , here variable got different address to store the value and variable b also get the different value to store the value 





$x=90;
$y=& $x; // this is called copy by reference, here variable x send his address to y , now y has address of x and we 				chnage the value of y the value of x will automatically change
$y=20;

echo $x; 
echo "<br/><br/><br/>";

class student {
	public $name;
	public $course;
	public function __construct($n){
		$this->name=$n;
	}
}

$student1=new student('Deepinder Singh');


/*here in classess the call by refrence concept is exist by default it meaning is $student2=& $student1  

	$student2=$student1;

	$student2->name='Ram Kumar';

	echo $student1->name;

	here we get becasue we are sending address 

	Ram Kumar

*/

// here we sending value using clone keyword
$student2=clone $student1;

$student2->name='Ram Kumar';

	echo $student1->name;
	echo "<br/>";
	echo $student2->name;










?>