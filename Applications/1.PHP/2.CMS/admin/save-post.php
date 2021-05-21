<?php
include 'config.php';
if(isset($_FILES['fileToUpload'])){
	$errors=array();
	$file_name=$_FILES['fileToUpload']['name'];
	$file_size=$_FILES['fileToUpload']['size'];					// upload in kb always 
	$file_temp=$_FILES['fileToUpload']['tmp_name'];
	$file_type=$_FILES['fileToUpload']['type'];
	$explode=explode('.',$file_name);
	$file_ext=strtolower(end($explode));			// getting last value from the string 

	$extentions=array('jpeg','jpg','png');

	if(in_array($file_ext,$extentions)===false){
		$errors[]="This extension file not allowed, Please choose a JPG or PNG file .";
	}
	if($file_size>5,242,880)				// checking for 2 MB
	{	
		/*
		1 KB = 1024 bytes;
		1 MB = 1024 MB;   and (1024 x 1024 = 10,48,576 bytes )
		2 MB = 10,48,576 x 2 = 20,97,152	bytes

		*/
		$errors[]="File size must be 2MB or Lower.";	
	}
	if(empty($errors)==true){
		move_uploaded_file($file_temp,'upload/'.$file_name);	
	}else{
		print_r($errors);
		die();
	}	
}
	$title=mysqli_real_escape_string($con,$_POST['post_title']);
	$description=mysqli_real_escape_string($con,$_POST['postdesc']);
	$category=mysqli_real_escape_string($con,$_POST['category']);
	$title=mysqli_real_escape_string($con,$_POST['post_title']);

	$date=date("d M, Y");
	session_start();
	$auther= $_SESSION['user_id'];

	 $sql = "INSERT INTO post values(null,'$title','$description','$category','$date','$auther','$file_name');";
	 $sql.="UPDATE category SET post=post+1 where category_id=$category";
	 $result = mysqli_multi_query($con, $sql) or die('Query Failed. ' . mysqli_error($con));
	 if($result){
	 	header('location:post.php');
	 }else{
	 	
	 }

?>