<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://144.91.104.117/api/api.php?api=user&key=2221C103A9A0B2ABC8F158AF731F316A&cmd=USER_GET_OBJECTS%2C*',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Cookie: gs_language=spanish'
  ),
  CURLOPT_SSL_VERIFYHOST => false,
  CURLOPT_SSL_VERIFYPEER => false
));

$response = curl_exec($curl);

curl_close($curl);
header('Content-Type: application/json');
echo $response;
?>
