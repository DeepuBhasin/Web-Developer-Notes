<pre>
<?php
$xml=simplexml_load_file('starting.xml');
print_r($xml);
echo $xml->webdeveloper->name[0];
?>