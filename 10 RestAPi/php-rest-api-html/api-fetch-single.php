<?php
header('Content-Type:application/json');				// it means here we are accepting json data and returning json data only 
header('Access-Control-Allow-Origin:*');

$data=json_decode(file_get_contents('php://input'),true);		
// means we are passing jason data , we get data using file_get_content cz its a files, 'php://input' is defining that we did not know about what method we are using like get,post,put  and we are receiving data from php file 

// using abve method we cannot enter data directly from browser we need to use curl or postman 



$id=$data['sid'];

include_once('config.php');

$sql="SELECT * FROM usertable where id=$id";

$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){
	$output=mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($output);
}else{
	echo json_encode(array('message'=>'No record found.','status'=>false));
}


/*
1. open post man 
2. select POST method
3. paste address 
4. enter header (key ->Content-Type and Value -> application/json)
5. body -> raw ->enter below data
	
 {
    "sid": "2"
 }
6. Click on Send



*/




?>
