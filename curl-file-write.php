<?php  
$ch = curl_init("https://www.google.com/");  
$fp = fopen("demo.php", "w");  
  
curl_setopt($ch, CURLOPT_FILE, $fp);  
curl_setopt($ch, CURLOPT_HEADER, 0);  
  
curl_exec($ch);  
if(curl_error($ch)) {  
    fwrite($fp, curl_error($ch));
}  
curl_close($ch);  
fclose($fp);
