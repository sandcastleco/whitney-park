<?php

  $api_address = 'https://api.airtable.com/v0/appHkoh1AS4ReBG5M/Contacts';
  $api_key = 'keySZ84JS34GZjoNq';

  $http_headers = [
    "Authorization: Bearer " . $api_key,
    "Content-type: application/json"
  ];

  $email = $_POST["email"];

  $post_data = json_encode(
    [
      'fields' => [
        'Email' => $email
      ]
    ]
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
