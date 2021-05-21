<?php
header('Content-Type:application/json');				// it means here we are accepting json data and returning json data only 
header('Access-Control-Allow-Origin:*');
header('Access-control-Allow-Method:POST');
header('Access-control-Allow-Headers:Content-Type,Access-Control-Allow-Origin,Access-control-Allow-Method,Authorization,X-Requested-With');


$data=json_decode(file_get_contents('php://input'),true);		

$firstName=$data['fname'];
$lastName=$data['lname'];
$city=$data['scity'];
$age=$data['sage'];

include_once('config.php');

$sql="INSERT into usertable value(null,'$firstName','$lastName','$city',$age)";

$result=mysqli_query($con,$sql);

// echo json_encode(array(mysqli_error($con)))


if($result){
	echo json_encode(array('message'=>'Student Record Inserted.','status'=>true));
}else{
	echo json_encode(array('message'=>'Student Record not Inserted.'.mysqli_error($con),'status'=>false));
}


/*
1. open post man 
2. select POST method
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
