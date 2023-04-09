<?php
/*public 

They may be accessed in three possible situstions 
1. From outside the class in which it is declared 
2. From within the class in which its is declared 
3. From with in another class that implements the class in which its is declared 	

*/

/*
private 

1. private they are only accessible for the class in which they are declared 
2. private memebers are not accessible in child class while using inheritence 

*/


/*
protected 

1. A Protected property or method is accessible in the class in which it is declared, as well as in classes that extend that class
2. but for child class it becomes private memeber 


*/


/* Public Example */
// class food{

// 	public $fname;

// 	function showData(){
// 		echo "Item is : ".$this->fname;
// 	} 
// }


// $f1=new food();
// $f1->fname="PublicPizza";
// $f1->showData();



/* Private Example*/


// class food{

// 	private $fname;

// 	function getName($name){
// 		$this->fname=$name;
// 	}

// 	function showData(){
// 		echo "Item is : ".$this->fname;
// 	} 

// }


// $f1=new food();
//$f1->fname="PrivatePizza"; // gettign erro because it private 
// $f1->getName('PrivatePizza');
// $f1->showData();



// class junkFood extends food{

// 	private $junkName="Sandwitch";

	 

// 	function passValue(){
// 		// $this->fname=$this->junkName ;                       parent class variable is not 																				accessble here so value cannot be change				

// 		// $this->getName($this->junkName);
// 	}



// }
// echo "<br/>";
// $jf1=new junkFood();
// $jf1->passValue();
// $jf1->showData();





/* protected Example*/
class food{

	protected $fname;

	function getName($name){
		$this->fname=$name;
	}

	function showData(){
		echo "Item is : ".$this->fname;
	} 

}




class junkFood extends food{

	private $junkName="ProtectedSandwitch";

	 

	function passValue(){
		$this->fname=$this->junkName ;				// here parent class variable can access and can be change 	
	}

}
$jf1=new junkFood();
$jf1->passValue();
$jf1->showData();

$jfi->fname="okokokok";			// it will create error because parent variable become private in child class
?>