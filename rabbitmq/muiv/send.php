<?php
    require_once "../vendor/autoload.php";

    use PhpAmqpLib\Connection\AMQPStreamConnection;
    use PhpAmqpLib\Message\AMQPMessage;

    /* create connection to rabbit */
    $conn = new AMQPStreamConnection(
        'localhost',          //server address
        5672,                 //server port
        'guest',           //username
        'guest'           //password
    );
    /* create new channel */
    $chan = $conn->channel();
    /* create new queue */
    $chan->queue_declare(
        'queue',       //queue name
        false,                  //check existing exchange
        true,                  //check queue on server crash
        false,                  //check if queue used only by one connection
        false                   //delete queue if last subscriber unsibscribed
    );
    /* get data from html form */
    $data = json_encode($_GET['data']);
    /* prepare amqp message */
    $msg = new AMQPMessage($data,array('delivery_mode' => 2)); //persistent message mode
    /* send message to rabbit */
    $chan->basic_publish(
        $msg,                   //message
        '',                     //exchange
        'queue'        //routing key
    );
    /* close connection and channel */
    $chan->close();
    $conn->close();