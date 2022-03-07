<?php

$data_string = '{ "auth": { "identity": { "methods": [ "password" ], "password": { "user": { "name": "华为云的信息", "password": "华为云的信息!", "domain": { "name": "华为云的信息" } } } }, "scope": { "project": { "name": "华为云的信息" } } } }';
$Url = "https://iam.myhuaweicloud.com/v3/auth/tokens";//接口地址
$header=array(
'Content-Type: application/json',
);//Header参数
$ch = curl_init();//初始化
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");//post方式
curl_setopt($ch, CURLOPT_URL, $Url);//接口地址
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);//输入参数
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//是否有返回值
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);//头部参数
curl_setopt($ch, CURLOPT_HEADER, true);

$data = curl_exec($ch);//返回参数
if (strpos($data, "X-Subject-Token:")) {
    $headArr = explode("\r\n", $data);
    foreach ($headArr as $loop) {
        if (strpos($loop, "X-Subject-Token:") !== false) {
            $token = trim(substr($loop,17));
        }
    }
}
