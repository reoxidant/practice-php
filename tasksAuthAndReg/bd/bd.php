<?php 
	if(!defined('KEY')){
		header("HTTP/1.1 404 Not Found");
		exit(file_get_contents('../404.html'));
	}

	$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(ERROR_CONNECT);

	mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".DATABASE."") or die(mysqli_error($link));

	mysqli_select_db($link, DATABASE) or die (NO_DB_SELECT);

	mysqli_query($link, "CREATE TABLE IF NOT EXISTS users (
		id INT(4) NULL AUTO_INCREMENT PRIMARY KEY,
		login VARCHAR(32) NOT NULL,
		password VARCHAR(32) NOT NULL,
		email VARCHAR(32) NOT NULL,
		name VARCHAR(32) NOT NULL,
		surname VARCHAR(32) NOT NULL,
		age VARCHAR(32) NOT NULL,
		city VARCHAR(32) NOT NULL,
		lang VARCHAR(32) NOT NULL,
		dt VARCHAR(32) NOT NULL, 
		salt VARCHAR(32) NOT NULL,
		cookie VARCHAR(32) NOT NULL,
		verification INT(1) NOT NULL,
		verification_code VARCHAR(32) NOT NULL,
		status INT(4) NOT NULL,	
		UNIQUE us (login, email)
		) 
		ENGINE = INNODB DEFAULT CHARSET = utf8")
		or die (mysqli_error($link));

	
	mysqli_query($link, 'SET NAMES utf8') or die(mysqli_error($link));
	

	mysqli_query($link, "CREATE TABLE IF NOT EXISTS msg (
	id INT(4) NULL AUTO_INCREMENT PRIMARY KEY,
	recipient_id INT(4) NOT NULL,
	sender_id INT(4) NOT NULL,
	message VARCHAR(150) NOT NULL,
	readed_msg INT(4) NOT NULL
	) 
	ENGINE = INNODB DEFAULT CHARSET = utf8")
	or die (mysqli_error($link));

?>