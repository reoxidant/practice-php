<?php
if (!defined('KEY')) {
    header("HTTP/1.1 404 Not Found");
    exit(file_get_contents('../404.html'));
}

const DB_SERVER = 'localhost';

const DB_USER = 'root';

const DB_PASSWORD = '';

const DATABASE = 'social';

const DB_PREFIX = 'social';

// Errors

const ERROR_CONNECT = 'Не могу соединиться с БД.';

const NO_DB_SELECT = 'Данная БД отсутствует на сервере';

define("HOST", 'https://' . $_SERVER['HTTP_HOST']);

const MAIL_AUTHOR = 'Регистрация на https://social-net.ru <no-reply@social-net.ru>\r\n Content-type: text/html; charset=windows-1251 \r\n';


