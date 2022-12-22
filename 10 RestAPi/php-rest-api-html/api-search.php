<?php
header('Content-Type:application/json');				// it means here we are accepting json data and returning json data only 
header('Access-Control-Allow-Origin:*');
header('Access-control-Allow-Method:GET');
header('Access-control-Allow-Headers:Content-Type,Access-Control-Allow-Origin,Access-control-Allow-Method,Authorization,X-Requested-With');



// $data=json_decode(file_get_contents('php://input'),true);		
$firstName=isset($_GET['search'])? $_GET['search']:die('Value Not Set');

include_once('config.php');

$sql="SELECT * FROM usertable where firstName LIKE '%$firstName%' ";

$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){
	$output=mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($output);
}else{
	echo json_encode(array('message'=>'No Serach Found.','status'=>false));
}


/*
1. open post man 
2. select GET method
3. paste address 
4. enter header (key ->Content-Type and Value -> application/json) and Params -> firstName -> d
5. Click on Send



*/




?>
