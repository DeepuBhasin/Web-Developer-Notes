<?php
$db_name = "mysql:host=localhost;dbname=pdoData";
$username = "root";
$password = "";

$conn = new PDO($db_name,$username,$password);

$sql = $conn->query("SELECT * FROM students");

// $sql->execute();

echo "<pre>";
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

print_r($result);
exit;

// while($row = $sql->fetch(PDO::FETCH_ASSOC)){
// 	echo "{$row['id']} - {$row['student_name']} - {$row['city']} - {$row['dob']} \n";
// } 
?>