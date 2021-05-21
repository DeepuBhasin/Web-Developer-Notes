<?php

$con = @mysqli_connect('localhost', 'root', '', 'phpajax') or die('Database Not Connected. Error : ' . mysqli_connect_error());

$sql = "SELECT * FROM usertable ORDER BY Id ASC";

$result = @mysqli_query($con, $sql);

$row = mysqli_fetch_all($result,MYSQLI_ASSOC);


echo json_encode($row);



?>

