<?php
header('Content-Type:application/json');
header('Access-Control-Allow-Origin:https://threadologybar.com/bulk/testing/getData.php');


include_once('config.php');

$sql="SELECT * FROM usertable order by id ASC";

$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){
	$output=mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($output);
}else{
	echo json_encode(array('message'=>'No record found.','status'=>false));
}

?>
