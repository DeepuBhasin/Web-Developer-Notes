<?php
// print_r($_POST);
// exit;
$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_class = $_POST['class'];
$stu_phone = $_POST['sphone'];

$conn = mysqli_connect('localhost', 'root', '', 'crud_php_mysql') or die('Connection Failed' . mysqli_connect_error());

$sql = "INSERT INTO student values(null,'$stu_name','$stu_address','$stu_class','$stu_phone')";

$result = mysqli_query($conn, $sql) or die('Query Unsuccessful. ' . mysqli_error($conn));

header('location:index.php');

mysqli_close($conn);