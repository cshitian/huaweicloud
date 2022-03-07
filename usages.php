<?php
include("hwctokens.php");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://bss.myhuaweicloud.com/v2/payments/free-resources/usages/query');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$a123 ='X-Auth-Token: '.$token;
$headers = array();
$headers[] = 'User-Agent: API Explorer';
$headers[] = $a123;
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$arr = json_decode($result,true);
