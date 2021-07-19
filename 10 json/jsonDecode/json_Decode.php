<?php
$json_string='data.json';

$jsonData=file_get_contents($json_string);

$arr=json_decode($jsonData,true);

echo "<pre>";
print_r($arr);


?>