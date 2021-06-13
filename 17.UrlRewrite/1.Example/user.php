<h1>This is user.php File for Get Method only single Parameter</h1>
<br/>
<pre>
<?php

// Enter This Line http://localhost/AAAA/17.RewriteEngine/article/1/Deepinder-Singh
echo $_GET['id'];
$url = $_SERVER['REQUEST_URI'];
$url_array = explode('/',$url);
print_r($url_array);

$endString = end($url_array);

echo "End Value : ". $endString;
?>