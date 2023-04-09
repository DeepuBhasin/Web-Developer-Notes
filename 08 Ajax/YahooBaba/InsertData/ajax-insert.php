<?php
$con = @mysqli_connect('localhost', 'root', '', 'phpajax') or die('Database Not Connected. Error : ' . mysqli_connect_error());

try {

	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];

    $sql = "SELECT * FROM usertable where firstName='$firstName' and lastName='$lastName'";

    $result = @mysqli_query($con, $sql);

    if ($result) {
    	
        if (mysqli_num_rows($result) == 0) {

                $sql1 = "INSERT into usertable values(null,'$firstName','$lastName')";
                $result1 = @mysqli_query($con, $sql1); 

                if($result1){
                    echo "Data Inserted Successfully";
                }else{
                    throw new Exception("Data Not Inserted. Error : ".mysqli_error($con));
                }

         } else {
            echo "Data Already Added";
        }
    } else {
        throw new Exception("Query Failed. Error : ".mysqli_error($con));
    }
} catch (Exception $e) {
    echo "Error : " . $e->getMessage();
}