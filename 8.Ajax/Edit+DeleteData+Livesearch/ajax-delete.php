<?php

$con = @mysqli_connect('localhost', 'root', '', 'phpajax') or die('Database Not Connected. Error : ' . mysqli_connect_error());



try {

    $id=$_POST['id'];


    $sql = "DELETE FROM usertable where id=$id";

    $result = @mysqli_query($con, $sql);

    if ($result) {
       echo true;
    } else {
        throw new Exception(mysqli_error($con));
    }
} catch (Exception $e) {
    echo "Error : " . $e->getMessage();
}