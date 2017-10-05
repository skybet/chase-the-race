<?php
include 'classes/usermanager.php';
include 'classes/predictionmanager.php';
include 'classes/user.php';
include 'classes/prediction.php';
include 'logic/db.php';
include 'logic/sessions.php';

if ($_SESSION['login'])
{
$user = unserialize (serialize ($_SESSION['user']));

$predictionmanager = new PredictionManager(getDB());

$predictionmanager->save($user->id, $_POST);

$user = unserialize (serialize ($_SESSION['user']));

require 'vendor/autoload.php';

$from = new SendGrid\Email("ChaseTheRace", "entries@chasetherace.com");
$subject = "Your entry has been recorded!";
$to = new SendGrid\Email($user->email, $user->email);
$content = new SendGrid\Content("text/html", " ");
$mail = new SendGrid\Mail($from, $subject, $to, $content);
$mail->setTemplateId("a80512c6-9215-4cf4-9378-7e3ddd2f9e02");
$mail->personalization[0]->addSubstitution("[%email%]", $user->email);
$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
print_r($response->headers());
echo $response->body();

header('Location: confirmation.php');
}
?>
