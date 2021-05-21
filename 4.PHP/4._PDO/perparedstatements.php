<?php
$db_name = "mysql:host=localhost;dbname=pdoData";
$username = "root";
$password = "";

$conn = new PDO($db_name,$username,$password);

$city = "patiala";

$sql = $conn->prepare("SELECT * FROM students where city = ? ");
$sql->execute([$city]);

echo "<pre>";
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

print_r($result);
exit;
