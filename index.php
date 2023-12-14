<?php
$mathspix = 'https://i.stack.imgur.com/bRXmz.jpg';
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.mathpix.com/v3/text',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"src": "'.$mathspix.'", "math_inline_delimiters": ["", ""], "rm_spaces": true}',
  CURLOPT_HTTPHEADER => array(
    'app_id: your_api_id',
    'app_key: your_api_key',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
$data=json_decode($response,true);
$mathpixtext= $data['text'];
echo $mathpixtext;
?>
