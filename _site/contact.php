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
    $to      = 'gb@gb-re.com';
    $subject = '[whitneypark.com] New message';
    $message = $_POST["message"];
    $headers = 'From: ' . $_POST["email"] . "\r\n" .
               'Reply-To: ' . $_POST["email"] . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    header('Location: thank-you');
  } else {
    header('Location: error');
  }
?>
