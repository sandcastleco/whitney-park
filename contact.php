<?php
  require_once "recaptchalib.php";

  $secret = "6LfPeAgUAAAAAIu-pP2sRdtY4d7lPB1_sKstbwmt";
  $response = null;
  $reCaptcha = new ReCaptcha($secret);

  if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
  }

  if ($response != null && $response->success) {
    $to      = 'kevin@sandcastle.co';
    $subject = '[whitneypark.com] New message';
    $message = $_POST["message"];
    $headers = 'From: ' . $_POST["email"] . "\r\n" .
               'Reply-To: ' . $_POST["email"] . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    echo "Hi " . $_POST["name"] . " (" . $_POST["email"] . "), thanks for submitting the form!";
  } else {
    echo "No bots!";
  }
?>
