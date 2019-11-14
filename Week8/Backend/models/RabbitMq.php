<?php
namespace app\models;
require_once __DIR__.'../../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;
 
class RabbitMq
{
    public function addRabbit($email,$subject,$body)
    {
    $connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');
    $channel = $connection->channel();
    
    $channel->queue_declare('email_queue', false, false, false, false);

    $emaildata=array('Email'=>$email,'Subject'=>$subject,'Body'=>$body);
  
    $data = json_encode($emaildata);
    
    $msg = new AMQPMessage($data, array('delivery_mode' => 2));
    $channel->basic_publish($msg, '', 'email_queue');

    // header('Location: form.php?sent=true');
    }
}
