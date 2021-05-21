<?php
/*
1. it handle private static and non existing Methods (function) only  in class
2. _callStatic Magic mathod help to show perfessional error instead of php fatel error;
3. get automatically call when error is generated 
4. syntax 
	public static function __call($methodName,$args){
	{
		statement;
	}

5. __class__ get the current name of the class	

*/
class abc{
	public static function hello(){
		echo "this is hello method";
	}

	public static function __callStatic($method,$args){
		if(method_exists(__class__,$method)){
			call_user_func_array([__class__,$method],$args);
		}else{
			echo "You are trying to access Non Existing or Static Method($method) and parameters : <br/>";
			print_r($args);
			echo "<br/>";
		}
	}
}

abc::ok('1','2');


?>