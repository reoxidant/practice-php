<?php 
	if(!defined('KEY')){
		header("HTTP/1.1 404 Not Found");
		exit(file_get_contents('404.html'));
	}

	define('DB_SERVER', 'localhost');

	define('DB_USER', 'root');

	define('DB_PASSWORD', '');

	define('DATABASE','social');

	define('DB_PREFIX', 'social');

	// Errors

	define('ERROR_CONNECT', 'Не могу соединиться с БД.');

	define('NO_DB_SELECT', 'Данная БД отсутствует на сервере');

	define('HOST', 'http://'.$_SERVER['HTTP_HOST'].'/');

	define('MAIL_AUTOR', 'Регистрация на http://social-net.ru <no-reply@social-net.ru>\r\n Content-type: text/html; charset=windows-1251 \r\n');

?>
