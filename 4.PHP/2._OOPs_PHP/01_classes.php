<?php

class Player{
	public $name;					// properties 
	public $speed=5;				// properties 

	function set_name($name)		// method 
	{
		$this->name=$name;
	}

	function get_name()				// method
	{
		return $this->name;
	}
	function run(){
		$this->runnig;
	}
	function getSpeed(){
		return $this->speed;
	}
}
	
$player1= new Player();								// creating object 
$player1->set_name('Deepinder Singh');				// calling function and sending parameter
echo $player1->get_name();
echo "<br>";

$player1->speed=20;
echo $player1->speed;
echo "<br>";
echo $player1->getSpeed();


$player2= new Player();
echo "<br>";
echo $player2->speed;

?>