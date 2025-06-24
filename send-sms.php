<?php
require_once 'vendor/autoload.php'; // Twilio SDK via Composer

use Twilio\Rest\Client;

$account_sid = 'ACff0f68ff4d3ec9ded12c9a3d9f6b56ca';
$auth_token = '9025e3d99b1fb0a3b9038eb2b479e47f';
$twilio_number = '+18163387461';

$client = new Client($account_sid, $auth_token);

// Get values from form
$name = $_POST['name'];
$phone = $_POST['phone'];
$service = $_POST['service'];
$day = $_POST['preferred_day'];
$time = $_POST['preferred_time'];

$messageBody = "Hi $name 👋! This is a reminder for your '$service' appointment on $day at $time with Owethu Mbuli.";

try {
    $client->messages->create(
        $phone, // Client's phone number
        [
            'from' => $twilio_number,
            'body' => $messageBody
        ]
    );
    echo "SMS Sent!";
} catch (Exception $e) {
    echo "Error sending SMS: " . $e->getMessage();
}
?>