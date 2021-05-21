<?php
include 'config.php';
$post_id = $_GET['id'];
$cat_id = $_GET['catid'];

$sql = "DELETE FROM post WHERE post_id=$post_id;";
$sql .= "UPDATE category set post=post-1 where category_id=$cat_id;";

$result = mysqli_multi_query($con, $sql) or die('Insert Query Failed');
if($result){
	header('location:post.php');	
}else{
	echo "Query Failed";
}


mysqli_close($con);