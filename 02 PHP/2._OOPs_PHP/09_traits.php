 <?php
/*
1. Traits are used to declare methods that can be used in multiple classes.


*/
class mainCourse{
	private $lunch;
	private $breakFats;
	private $dinner;

	public function setLunch($slunch){
		$this->lunch=$slunch;
	}
	public function getLunch(){
		return $this->lunch.'<br/>';
	}

	public function setDinner($sDinner){
		$this->dinner=$sDinner;
	}
	public function getDinner(){
		return $this->dinner.'<br/>';
	}

	public function setBreakFast($sBreakFast){
		$this->breakFats=$sBreakFast;
	}
	public function getBreakFast(){
		return $this->breakFats.'<br/>';
	}


}

trait sweet{
	private $setSweet;

	public function setSweet($sSweet){
			$this->setSweet=$sSweet;
	}
	public function getSweet(){
		return $this->setSweet.'<br/>';
	}
}
trait offer{
	private $offer;

	public function setOffer($offer){
			$this->offer=$offer;
	}
	public function getOffer(){
		return $this->offer.'<br/>';
	}
}

Class Delux extends mainCourse{

use sweet;							// or use sweet,offer;
use offer;
	

}



$deluxObj=new delux();
$deluxObj->setBreakFast('Bread Juice Eggs Milk');
echo $deluxObj->getBreakFast();


$deluxObj->setDinner('Dall Roti Achhar Salad');
echo $deluxObj->getDinner();


$deluxObj->setSweet('Gullab jamun Cham Cham Rasgula');
echo $deluxObj->getSweet();

$deluxObj->setOffer('One dellux thali free with other');
echo $deluxObj->getOffer();





?>