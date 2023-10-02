<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.envioclickpro.com/api/v1/quotation",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n    \"origin_address\": \"Fray Sebastián de Aparicio\",\r\n    \"origin_number\": \"23\",\r\n    \"origin_zip_code\": \"58228\",\r\n    \"destination_address\": \"Puente del Marquez\",\r\n    \"destination_number\": \"738\",\r\n    \"destination_zip_code\": \"58150\",\r\n    \"package\": {\r\n        \"description\": \"Productos\",\r\n        \"contentValue\": 2000,\r\n        \"weight\": 2.00,\r\n        \"length\": 20.00,\r\n        \"height\": 20.00,\r\n        \"width\": 20.00\r\n    }\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json; charset=utf-8",
    "Authorization: f2292d33-411f-4dfc-8f12-4cbcc468a160",
    "content-Type: application/json"
  )
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;
