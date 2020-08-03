<?php

require_once '../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest','guest');
$channel = $connection->channel();

$channel->exchange_declare('logs', 'fanout', false, false, true, false);

list($queue_name,,) = $channel->queue_declare("", false, false, true, false);

$binding_key = 'black';
$channel->queue_bind($queue_name, 'logs', $binding_key);

echo "[*] Waiting for logs. To exit press CTRC+C", "\n";

$callback = function($msg){
    echo "[x]", $msg->body, "\n";
};

$channel->basic_consume($queue_name,'', false, true, false, false, $callback);

while(count($channel->callbacks)){
    $channel->wait();
}

$channel->close();
$connection->close();
