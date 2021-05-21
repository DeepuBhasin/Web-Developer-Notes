<?php
if($_SESSION['user_role']=='0'){

    header('location:post.php');
} 
include 'config.php';
$user_id = $_GET['id'];
$sql = "DELETE FROM user WHERE user_id=$user_id";
$result = mysqli_query($con, $sql) or die('Insert Query Failed');
header('location:users.php');

mysqli_close($con);