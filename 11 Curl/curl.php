<?php
$ch=curl_init();										// use for initilize
curl_setopt($ch,CURLOPT_URL,"https://www.google.com/");		// use for send data 
$xx=curl_exec($ch);											// use for execute
curl_close($ch);											// use for close	
?>