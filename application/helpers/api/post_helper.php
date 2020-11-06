<?php
function post($bearerToken, $survey, $data){
  require 'config.php';
    
  $url = $dataURL.$survey."/data";

  $headers = array(
    'Content-type: application/json',
    'Accept: application/json',
    'Authorization: '.$bearerToken['Authorization'].'',
  );

  $data = json_encode($data);
  $data = str_replace("\ufeff", "", $data);

  $data = "[".$data."]";

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  curl_close($ch);

  return $httpcode;
}