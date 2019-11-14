<?php
require_once __DIR__ . '../../vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPConnection;
 
$connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();
 
$channel->queue_declare('email_queue', false, false, false, false);
 
echo ' * Waiting for messages. To exit press CTRL+C', "\n";
 
$callback = function($msg){
 
    echo " * Message received", "\n";
    $data = json_decode($msg->body, true);
 
    $from = "From";
    $from_email = "sushil08@gmail.com";
    $to_email = $data['Email'];
    $subject = $data['Subject'];
    $message = $data['Body'];
 
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('sushilmishra07120712@gmail.com')
    ->setPassword('sushil0712');

$mailer = new Swift_Mailer($transport);

$message =(new Swift_Message($transport))
->setSubject($subject)
->setFrom([$from_email => 'Bridgelabz'])
->setTo([$to_email => 'Recipient'])
->setBody($message, 'text/html');
 
    $mailer->send($message);
 
    echo " * Message was sent", "\n";
    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};
 
$channel->basic_qos(null, 1, null);
$channel->basic_consume('email_queue', '', false, false, false, false, $callback);
 
while(count($channel->callbacks)) {
    $channel->wait();
}