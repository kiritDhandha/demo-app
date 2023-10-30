<?php

$ch = curl_init();
$ch1 = curl_init();
$ch2 = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.google.com');
curl_setopt($ch1, CURLOPT_URL, 'https://www.facebook.com');
curl_setopt($ch2, CURLOPT_URL, 'https://www.youtube.com');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch1, CURLOPT_HEADER, 0);
curl_setopt($ch2, CURLOPT_HEADER, 0);

$multiReq = curl_multi_init();

curl_multi_add_handle($multiReq, $ch);
curl_multi_add_handle($multiReq, $ch1);
curl_multi_add_handle($multiReq, $ch2);

do {
    $status = curl_multi_exec($multiReq, $active);
    if ($active) {
        $data = curl_multi_select($multiReq);
        print_r($data);
    }
} while ($active && $status == CURLM_OK);

//close all the handles
curl_multi_remove_handle($multiReq, $ch);
curl_multi_remove_handle($multiReq, $ch1);
curl_multi_remove_handle($multiReq, $ch2);

curl_multi_close($multiReq);
