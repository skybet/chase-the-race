<?php
include 'classes/usermanager.php';
include 'classes/predictionmanager.php';
include 'classes/user.php';
include 'classes/prediction.php';
include 'logic/db.php';

function get_client_ip_server() {
  $ipaddress = '';
  if ($_SERVER['HTTP_CLIENT_IP'])
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if($_SERVER['HTTP_X_FORWARDED_FOR'])
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if($_SERVER['HTTP_X_FORWARDED'])
      $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if($_SERVER['HTTP_FORWARDED_FOR'])
      $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if($_SERVER['HTTP_FORWARDED'])
      $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if($_SERVER['REMOTE_ADDR'])
      $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
      $ipaddress = 'UNKNOWN';

  return $ipaddress;
}

$ipAddress = get_client_ip_server();

//print_r($_POST); //test for POST

//echo $_POST['email'];
$usermanager = new UserManager(getDB());
$usermanager->insertUser($_POST['email']);

$user = $usermanager->byEmail($_POST['email']);

$predictionmanager = new PredictionManager(getDB());
//var_dump($user->id);

$predictionmanager->save($user->id, $_POST);
// If you are using Composer (recommended)
// require 'vendor/autoload.php';

// If you are not using Composer
require 'sendgrid-php/sendgrid-php.php';

$request_body = json_decode('{
  "personalizations": [
    {
      "to": [
        {
          "email": "nathanpreen@gmail.com"
        }
      ],
      "subject": "Sending with SendGrid is Fun"
    }
  ],
  "from": {
    "email": "test@example.com"
  },
  "content": [
    {
      "type": "text/plain",
      "value": "and easy to do anywhere, even with PHP"
    }
  ]
}');

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($request_body);
echo $response->statusCode();
echo $response->body();
print_r($response->headers());


// $mail = new PHPMailer;

// $mail->isSMTP();  // Set mailer to use SMTP
// $mail->Host = 'smtp.mailgun.org';  // Specify mailgun SMTP servers
// $mail->SMTPAuth = true; // Enable SMTP authentication
// $mail->Username = 'postmaster@chase-the-race.mailgun.org'; // SMTP username from https://mailgun.com/cp/domains
// $mail->Password = 'a3daec95b1a90384c97acd336599f8b3'; // SMTP password from https://mailgun.com/cp/domains
// $mail->SMTPSecure = 'tls';   // Enable encryption, 'ssl'

// $mail->From = 'excited@chase-the-race.mailgun.org'; // The FROM field, the address sending the email
// $mail->FromName = 'Orlie'; // The NAME field which will be displayed on arrival by the email client
// $mail->addAddress($_POST['email'], 'BOB');     // Recipient's email address and optionally a name to identify him
// $mail->isHTML(true);   // Set email to be sent as HTML, if you are planning on sending plain text email just set it to false

// // The following is self explanatory
// $mail->Subject = 'Email sent with Mailgun';
// $mail->Body    = '<span style="color: red">Mailgun rocks</span>, thank you <em>phpmailer</em> for making emailing easy using this <b>tool!</b>';
// $mail->AltBody = 'Mailgun rocks, shame you can\'t see the html sent with phpmailer so you\'re seeing this instead';

// if(!$mail->send()) {
//     echo "Message hasn't been sent.";
//     echo 'Mailer Error: ' . $mail->ErrorInfo . "\n";
// } else {
//     echo "Message has been sent :) \n";

// }

header('Location: confirmation.php');
?>
