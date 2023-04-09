<?php

class Circle{

	const PI=3.14;

	private $area;
	
	public function area($radius){
		$this->area = self::PI * $radius * $radius;
		return $this->area;
	}
}

$circleObject= new Circle();

echo $circleObject::PI;

echo "<br/>";

echo Circle::PI;

echo "<br/>";

echo $circleObject->area(10);


?>