<?php

require_once "../vendor/autoload.php";

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('php query', false, false, false, false);

$msq = new AMQPMessage('Hello World!');
$channel->basic_publish($msq, '', 'php query');

echo "[x] Sent 'Hello World!'\n";

$channel->close();
$connection->close();