<?php 
// class overLoading{								//overloading not possible in php 
// 	public $area;

// 	public function area($length=null){
// 		$this->area=$length*$length;
// 		return $this->area;
// 	}
// 	public function area($length=null,$breadth=null){
// 		$this->area=$length*$breadth;
// 		return $this->area;
// 	}
// }

// $areaObject=new overLoading();

// echo $areaObjecte->area(4);;
?>

<?php 														//overridding possible in php 
class classA{
	
	public function get(){
		echo "Hello world </br>";
	}
}

class classB extends classA{

	public function get(){
		echo "Hello Boo BOO </br>";
	}

	public function parentGet(){
		parent::get();
	}
}

$classBobject=new classB();

$classBobject->get();				// getting over ridding

$classBobject->parentGet();

echo "<br/><br/><br/><br/><br/>";



/*how we can prevent overriding */

class car {
	public function startCar(){
		echo "Car started From parent class <br/>";
	}
	public function invokeParentStart(){
		// return $this->startCar();			// here this return will again call the child class function 													not parent class function 
		self::startCar();
	}
}

class sportsCar extends car{
	public function startCar(){
		echo "Car Started From Child Class <br/>";
	}
	public function invokeParent(){
		// return $this->invokeParentStart();		// this will call parent class fucntion
		parent::invokeParentStart();


				//OR


		parent::startCar();						// this will call parent class fucntion
	}
}


$ob=new sportsCar();
$ob->startCar();
$ob->invokeParent();





?>