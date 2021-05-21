<?php
/*
clone keywords does not work in subOjects  


*/
class student{
	public $name;
	public $course;

	public function __construct($n){
		$this->name=$n;
	} 
	public function setCourse(course $c){				// sending object from the course class 
		$this->course=$c;
	}



	//un comment to check result right now cname in both subobjects is php after uncommenting it will become punjabi and it is call automatically when clone key word is used

	// public function __clone(){
	// 	$this->course= clone $this->course;
	// }




}
class course{
	public $cname;
	public function __construct($cn){
		$this->cname=$cn; 
	}
}


$student1= new student('Deepinder Singh');
$course= new course('PHP');

$student1->setCourse($course);		// creating subobject by sending object to the student class 

$student2= clone $student1;		// copy by value concept 

$student2->name='Parminder Singh';

echo "<pre>";
print_r($student1);
print_r($student2);



//here Clone will not work , here it will change value in both the Subobject example php to punjbai so its a problem 
$student2->course->cname='Punjbai';						// student2 is object course is variable(its containg object) cname is variable 


print_r($student1);
print_r($student2);


?>