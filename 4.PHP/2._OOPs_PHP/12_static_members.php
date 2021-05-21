<?php
/*
1. In this concept we do not create objects (but we can if we want) , we can call properties and methods directly 
2. we use self:: insted of $this-> keyword because object are not created
3. Static keyword is used to create static memebers 
4. If Class Contain all static Members then it will automatically become Static Class
5. If we extends the parent class then we use parent:: keyword to access memebers in Child Class
6. Static properties can only access in static functions 

*/

Class staticClass{
	
	public static $name="Deepinder Singh";

	public static function showData(){
		return self::$name.'<br/>';
	}

	public static function setName($n){
		self::$name=$n;
	}

	public function setName1($n){				// this will create error beacuse the method is not static so 			self::$name=$n;								non-static methods cannot set value of static methods
		
	}

}

echo staticClass::$name;
echo "<br/>";
echo staticClass::showData();
echo staticClass::setName('Simranjeet Kaur');
echo staticClass::showData();

// echo staticClass::setName1('Inder Kaur');			// will give error
// echo staticClass::showData();


class drivedClass extends staticClass{
	public static function show(){
		return parent::$name;
	}
}


echo 'From Parent class : '.drivedClass::show();



?>