<?php
header('Content-Type:application/json');				// it means here we are accepting json data and returning json data only 
header('Access-Control-Allow-Origin:*');
header('Access-control-Allow-Method:PUT');
header('Access-control-Allow-Headers:Content-Type,Access-Control-Allow-Origin,Access-control-Allow-Method,Authorization,X-Requested-With');


$data=json_decode(file_get_contents('php://input'),true);		

$id=$data['sid'];
$firstName=$data['sname'];
$lastName=$data['lastName'];
$city=$data['scity'];
$age=$data['sage'];

include_once('config.php');

$sql="UPDATE usertable set firstName='$firstName',lastName='$lastName',city='$city',age=$age where id=$id";

$result=mysqli_query($con,$sql);

if($result){
	echo json_encode(array('message'=>'Student Record Updated.','status'=>true));
}else{
	echo json_encode(array('message'=>'Student Record not Updated.','status'=>false));
}


/*
1. open post man 
2. select PUT method
3. paste address 
4. enter header (key ->Content-Type and Value -> application/json)
5. body -> raw ->enter below data
	
	{
        "firstName":"Data",
        "lastName":"mainData",
        "city":"Patiala",
        "age":2
    }
   
6. Click on Send



*/




?>
