<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://ohiomtb.com/api/trail-list.json');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10); 
$result = curl_exec($ch); 
curl_close($ch);

$result = $_GET["jsoncallback"] . $result;
echo($result);
?>
