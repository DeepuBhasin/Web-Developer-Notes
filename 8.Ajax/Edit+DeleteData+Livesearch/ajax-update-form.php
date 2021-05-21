<?php

$con = @mysqli_connect('localhost', 'root', '', 'phpajax') or die('Database Not Connected. Error : ' . mysqli_connect_error());



try {

    $id=$_POST['id'];
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];


    $sql = "UPDATE usertable set firstName='$firstName',lastName='$lastName' where id=$id";

    $result = @mysqli_query($con, $sql);

    if ($result) {
       echo true;
    } else {
        throw new Exception(mysqli_error($con));
    }
} catch (Exception $e) {
    echo "Error : " . $e->getMessage();
}finally {
    mysqli_close($con);
}