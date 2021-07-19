<?php
/*
	echo self::$name; in the parent class we set $name='Deepinder Singh' then calling function show() which contains self:: keyword after that we extend the parent class and declare $name again but when we call show function in child class then it will print parent class $name variable in that case we use 

	echo self::$name -> static::$name;


*/

Class personal{
	protected static $name='Deepinder Singh';
	static public function show(){
		echo 'Using Self : '.self::$name.'<br/>';						// not best method not get correct answer
		echo 'Using Static : '.static::$name;						// best method get correct answer
	}
}
class accounts extends personal{
	protected static $name='Simranjeet Kaur';


}
accounts::show();


?>