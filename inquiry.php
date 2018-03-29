<?php

  $api_address = 'https://api.airtable.com/v0/appHkoh1AS4ReBG5M/Inquiries';
  $api_key = 'keySZ84JS34GZjoNq';

  $http_headers = array(
    "Authorization: Bearer " . $api_key,
    "Content-type: application/json"
  );

  $name = $_POST["name"];
  $email = $_POST["email"];
  $property = $_POST["property"];
  $message = $_POST["message"];

  $post_data = json_encode(
    array(
      'fields' => array(
        'Name' => $name,
        'Email' => $email,
        'Property' => $property,
        'Message' => $message
      )
    )
  );

  $ch = curl_init($api_address);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $http_headers);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);


  curl_exec($ch);
  curl_close($ch);

  header('Location: thank-you');

?>
