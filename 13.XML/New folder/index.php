<?php
$xml = new DOMdocument;

$xml->load('data.xml');

if(@$xml->validate()){
   echo "It is valid XML Document";
}else{
   echo "Error: it's an invalid XML documnet";
}

?>