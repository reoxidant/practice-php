<?php 
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db_name = 'auth';

	$link = mysqli_connect($host, $user, $password) or die (mysqli_error($link)."1");
	mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".$db_name."") or die(mysqli_error($link)."2");
	mysqli_select_db($link, $db_name) or die (mysqli_error($link)."3");
	mysqli_query($link, "CREATE TABLE IF NOT EXISTS users(
		id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		login VARCHAR(100) NOT NULL, 
		password VARCHAR(100) NOT NULL, 
		name VARCHAR(100) NOT NULL, 
		surname VARCHAR(100) NOT NULL, 
		email VARCHAR(100) NOT NULL,
		UNIQUE KEY us (login, email)
		)") or die (mysqli_error($link)."4");
	mysqli_query($link, "SET NAMES 'utf8'") or die(mysqli_error($link)."5");

	$user_login = 'user';
	$user_pass = '12345';
	$user_name = 'pavel';
	$user_surname = 'durov';
	$user_email = 'durov@gmail.com';

	$admin_login = 'admin';
	$admin_pass = '54321';
	$admin_name = 'steve';
	$admin_surname = 'jobs';
	$admin_email = 'jobs@gmail.com';

	$queryUser = "INSERT INTO users (login, password, name, surname, email) VALUES ($user_login, $user_pass, $user_name, $user_surname, $user_email) ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id)";
	$id = mysqli_insert_id($link);
	mysqli_query($link, $queryUser) or die(mysqli_error($link));

	$queryAdmin = "INSERT IGNORE INTO users (login, password, name, surname, email) VALUES ($admin_login, $admin_pass, $admin_name, $admin_surname, $admin_email) ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id)";
	$id = mysqli_insert_id($link);
	mysqli_query($link, $queryAdmin) or die(mysqli_error($link));
?>