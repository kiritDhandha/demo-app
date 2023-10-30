<?php
if (function_exists('curl_version')) {
    // echo 'cURL is enabled<br>';
} else {
    // echo 'cURL is not enabled<br>';
}

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.google.com');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
// $result = curl_getinfo($ch);
$string = 'hello from aspl';
$result = curl_escape($ch , $string);
// print_r($result);
if ($response === false) {
    echo 'cURL Error: ' . curl_error($ch);
    echo curl_errno($ch);
} else {
    echo $response;
}