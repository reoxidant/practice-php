<?php
    error_reporting(E_ALL);

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbName = 'test';

    $link = mysqli_connect($host, $user, $password, $dbName) or die('Link to BD return a Error');
    mysqli_query($link, "SET NAMES 'utf8'") or die('query charset utf-8 return a error'.mysqli_error($link));








