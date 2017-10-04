<?php
include 'classes/usermanager.php';
include 'classes/predictionmanager.php';
include 'classes/user.php';
include 'classes/prediction.php';
include 'logic/db.php';

//print_r($_POST); //test for POST

//echo $_POST['email'];
$usermanager = new UserManager(getDB());
$usermanager->insertUser($_POST['email']);

$user = $usermanager->byEmail($_POST['email']);

$predictionmanager = new PredictionManager(getDB());
//var_dump($user->id);

$predictionmanager->save($user->id, $_POST);

//Composer's autoload file loads all necessary files
require '/vendor/autoload.php';

$mail = new PHPMailer;

$mail->isSMTP();  // Set mailer to use SMTP
$mail->Host = 'smtp.mailgun.org';  // Specify mailgun SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'postmaster@sandboxa448d8005aa5408f87c69638963d0423.mailgun.org'; // SMTP username from https://mailgun.com/cp/domains
$mail->Password = 'a3daec95b1a90384c97acd336599f8b3'; // SMTP password from https://mailgun.com/cp/domains
$mail->SMTPSecure = 'tls';   // Enable encryption, 'ssl'

$mail->From = 'excited@sandboxa448d8005aa5408f87c69638963d0423.mailgun.org'; // The FROM field, the address sending the email
$mail->FromName = 'Orlie'; // The NAME field which will be displayed on arrival by the email client
$mail->addAddress($_POST['email'], 'BOB');     // Recipient's email address and optionally a name to identify him
$mail->isHTML(true);   // Set email to be sent as HTML, if you are planning on sending plain text email just set it to false

// The following is self explanatory
$mail->Subject = 'Email sent with Mailgun';
$mail->Body    = '<span style="color: red">Mailgun rocks</span>, thank you <em>phpmailer</em> for making emailing easy using this <b>tool!</b>';
$mail->AltBody = 'Mailgun rocks, shame you can\'t see the html sent with phpmailer so you\'re seeing this instead';

if(!$mail->send()) {
    echo "Message hasn't been sent.";
    echo 'Mailer Error: ' . $mail->ErrorInfo . "\n";
} else {
    echo "Message has been sent :) \n";

}

header('Location: confirmation.php');
?>
