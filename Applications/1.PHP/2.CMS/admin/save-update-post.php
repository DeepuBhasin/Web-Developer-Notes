<?php
include 'config.php';
if(empty($_FILES['new-image']['name'])){
	$file_name=$_POST['old-image'];
}else{
		if(isset($_FILES['new-image'])){
		$errors=array();
		$file_name=$_FILES['new-image']['name'];
		$file_size=$_FILES['new-image']['size'];					// upload in kb always 
		$file_temp=$_FILES['new-image']['tmp_name'];
		$file_type=$_FILES['new-image']['type'];
		$file_ext=strtolower(end(explode('.',$file_name)));			// getting last value from the string 

		$extentions=array('jpeg','jpg','png');

		if(in_array($file_ext,$extentions)===false){
			$errors[]="This extension file not allowed, Please choose a JPG or PNG file .";
		}
		if($file_size>2097152)				// checking for 2 MB
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
}


	$post_id=mysqli_real_escape_string($con,$_POST['post_id']);
	$title=mysqli_real_escape_string($con,$_POST['post_title']);
	$description=mysqli_real_escape_string($con,$_POST['postdesc']);
	$category=mysqli_real_escape_string($con,$_POST['category']);
	$title=mysqli_real_escape_string($con,$_POST['post_title']);

	$date=date("d M, Y");
	session_start();
	$auther= $_SESSION['user_id'];

	 $sql = "UPDATE post SET title='$title',description='$description',category='$category',post_date='$date',author='$auther',post_img='$file_name' where post_id=$post_id";
	 $result = mysqli_multi_query($con, $sql) or die('Query Failed. ' . mysqli_error($con));
	 if($result){
	 	header('location:post.php');
	 }else{
	 	echo 'Query Failed '.mysqli_error($con);	
	 }

?>