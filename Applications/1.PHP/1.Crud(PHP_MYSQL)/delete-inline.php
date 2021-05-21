<?php

$stu_id = $_GET['id'];

$conn = mysqli_connect('localhost', 'root', '', 'crud_php_mysql') or die('Connection Failed' . mysqli_connect_error());

$sql = "DELETE FROM student where sid=$stu_id";

$result = mysqli_query($conn, $sql) or die('Query Unsuccessful. ' . mysqli_error($conn));

header('location:index.php');

mysqli_close($conn);