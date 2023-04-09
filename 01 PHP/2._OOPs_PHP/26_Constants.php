<?php
namespace Mynamespace;
echo 'Line Number is : '.__LINE__.'<BR/>';
echo 'Line Number is : '.__LINE__.'<BR/>';
echo 'Line Number is : '.__LINE__.'<BR/>';

echo 'Absolute File Path : '.__FILE__.'<BR/>';
echo 'Absolute Directory Path : '.__DIR__.'<BR/>';

function abc(){
	return 'Function Name : '.__FUNCTION__.'<br/>';
}
echo abc();


class myClass{
	public function getClassName()
	{
		return 'Class Name : '.__CLASS__.'<br/>';
	}
	public function getMethodName()
	{
		return 'Class Method Name : '.__METHOD__.'<br/>';
	}
	public function getNamespace(){
		return 'Namespace name is : '.__NAMESPACE__.'<br/>';
	}
}
$obj=new myClass();
echo $obj->getClassName();
echo $obj->getMethodName();
echo $obj->getNamespace();

trait myTrait{
	public function getTraitName(){
		return 'Trait Name is : '.__TRAIT__.'<br/>';
	}
}
class newClass{
use myTrait;
}

$obj=new newClass();
echo $obj->getTraitName();

?>