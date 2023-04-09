<h1>This is article.php File for Get Method Multiple Parameter</h1>
<br/>
<pre>
<?php

// Enter This Line : http://localhost/AAAA/17.RewriteEngine/article/1/Deepinder-Singh


$url = $_SERVER['REQUEST_URI'];
$url_array = explode('/',$url);
print_r($url_array);
?>