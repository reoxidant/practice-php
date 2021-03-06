<?php

require_once "../vendor/autoload.php";

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', '5672', 'guest', 'guest');

$channel = $connection->channel();

$channel->queue_declare('rpc_queue', false, false , false, false);

function fib($number){
    if($number == 0){
        return 0;
    }
    if($number == 1){
        return 1;
    }
    return fib($number - 1) + fib( $number - 2);
}

echo " [x] Waiting Queries \n";

$callback = function($req){

    $n = intval($req->body);
    echo "[.] fib(", $n, ") \n";

    $msg = new AMQPMessage(
        (string) fib($n),
        array('correlation_id' => $req->get('correlation_id'))
    );

    $req->delivery_info['channel']->basic_publish(
        $msg,
        '',
        $req->get('reply_to')
    );

    $req->delivery_info['channel']->basic_ack(
        $req->delivery_info['delivery_tag']
    );

};
//normal load between servers
$channel->basic_qos(null, 1, null);
$channel->basic_consume("rpc_queue", '', false, false, false, false, $callback);

while($channel->is_consuming()){
    $channel->wait();
}

$channel->close();
$connection->close();