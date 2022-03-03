<?php
include 'database.php';

$obj = new database();

// Insert Function 
// $obj->insert('studentghfhfhfhs',['student_name'=>'abcs','age'=>22,'city'=>'okokook']);
// echo "Insert Id : ";
// print_r($obj->getResult());



// Update Function 
// $obj->update('students',['student_name'=>'Noni Bhasin','age'=>21,'city'=>'Patiala'],'id="3"');
// $obj->update('students',['city'=>'punjab'],'city="patiala"');
// echo "Update result is : ";
// print_r($obj->getResult());




//Delete Function 
// $obj->delete('students','age="20"');
// echo "Delete result is : ";
// print_r($obj->getResult());



//select Function (simple select query)
// $obj->sql("SELECT * FROM students");
// echo "<pre>";
// echo "SQL Result is :";
// print_r($obj->getResult());


//select Function
// $obj->select('students','*',null,null,null,3);
// $obj->select('students','*',null,'age=21','city DESC',3);
// echo "<pre>";
// echo "Select Result is :\n";
// print_r($obj->getResult());


//select Function with pagination 
// $limit=3;
// $obj->select('students','*',null,null,null,$limit);

// echo "<pre>";
// echo "Select Result  with pagination is :\n";
// print_r($obj->getResult());
// echo $obj->pagination('students',null,null,$limit);


//select function with join
// $limit=3;
// $select= "students.*,c.*" ;
// $table= "students";
// $join= "cityTable as c ON c.cityName=students.city";
// $where= "c.cityName='punjab'";
// $obj->select($table,$select,$join,$where,null,$limit);
// echo "<pre>";
// echo "Select Result is :\n";
// print_r($obj->getResult());
?>