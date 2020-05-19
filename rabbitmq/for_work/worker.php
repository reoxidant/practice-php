<?php

require_once "../vendor/autoload.php";

use PhpAmqpLib\Connection\AMQPStreamConnection;

    /* create connection to rabbit */
    $conn = new AMQPStreamConnection(
        'localhost',    //server
        5672,           //port
        'guest',     //user
        'guest'     //pass
    );
    /* create channel */
    $chan = $conn->channel();
    /* create queue */
    $chan->queue_declare(
        'masha',
        false,
        true,
        false,
        false
    );

    echo '[x] waiting for message',"\n";

    /* send message to smtp relay */
    $callback = function($msg){
        echo '[x] message received ', $msg->body, "\n";
        echo '[x] message sent',"\n";
        //send acknowledge to rabbit (tell rabbit that delivery arrived successfully)
        $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
    };
    //check if message was processed (something like loadbalance between exchanges)
    $chan->basic_qos(null,1,null);
    //get message from queue and do something
    $chan->basic_consume('masha','',false,true,false,false, $callback);

    $timeout = 5;
    while (count($chan->callbacks)) {
        try{
            $chan->wait(null, false , $timeout);
        }catch(\PhpAmqpLib\Exception\AMQPTimeoutException $e){
            $chan->close();
            $conn->close();
            exit;
        }
    }
?>