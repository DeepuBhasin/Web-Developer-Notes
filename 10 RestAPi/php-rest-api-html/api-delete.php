<?php
header('Content-Type:application/json');				// it means here we are accepting json data and returning json data only 
header('Access-Control-Allow-Origin:*');
header('Access-control-Allow-Method:DELETE');
header('Access-control-Allow-Headers:Content-Type,Access-Control-Allow-Origin,Access-control-Allow-Method,Authorization,X-Requested-With');



$data=json_decode(file_get_contents('php://input'),true);		
$id=$data['sid'];

include_once('config.php');

$sql="DELETE FROM usertable where id=$id";

$result=mysqli_query($con,$sql);

if($result){
	echo json_encode(array('message'=>'Student record Deleted.','status'=>true));
}else{
	echo json_encode(array('message'=>'Student record not Deleted.','status'=>false));
}


/*
1. open post man 
2. select DELETE method
3. paste address 
4. enter header (key ->Content-Type and Value -> application/json)
5. body -> raw ->enter below data
	
 {
    "sid": "2"
 }
6. Click on Send



*/




?>
