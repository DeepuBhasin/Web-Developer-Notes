<?php
$n=0;
try{
	if($n>=0){
		throw new Exception('Enter the valid Number');
	}

	$div = 2/$n;
	echo $div;

}catch(Exception $e){
	echo $e->getMessage();
}

?>