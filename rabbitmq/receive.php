<?php

require_once "../vendor/autoload.php";

use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('php query', false, false, false, false);

echo "[*] Waiting for messages. To exit press CTRL+C\n";

$callback = function($msg){
    echo "[x] Received ", $msg->body, "\n";
};

$channel->basic_consume("php query", '', false, true, false, false, $callback);

while($channel->is_consuming()){
    $channel->wait();
}

$channel->close();
$connection->close();

?>