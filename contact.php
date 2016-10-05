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
    echo "Hi " . $_POST["name"] . " (" . $_POST["email"] . "), thanks for submitting the form!";
  } else {
    echo "No bots!";
  }
?>
