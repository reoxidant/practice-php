<?php
//Тема: Функция include и GET запрос

/*Задача 3: Даны файлы 1.php, 2.php, 3.php. Сделайте так, чтобы на странице index.php с помощью GET-запроса подключался один из файлов. GET-параметром передавайте имя подключаемого файла вместе с расширением.*/
/*    $page = $_GET['page'];
    c*/

/*Задача 4: Модифицируйте предыдущую задачу так, чтобы в GET-параметр передавался только цифра из имени файла, без расширения.*/

/*$page = $_GET['page'];
if(is_numeric($page)):
    include("pages/$page.php");
else:
    include("pages/$page");
endif;*/

/*Задача 5: Модифицируйте предыдущую задачу так, чтобы подключаемые файлы хранились в папке dir.*/
if(!is_dir('dir')){
    mkdir('dir');
}

$page = $_GET['page'];
if(is_numeric($page)):
    $path = "pages/$page.php";
    include("$path");
    $content = file_get_contents("$path");
    file_put_contents('dir/'.$page.'.php', "$content");
else:
    $path = "pages/$page";
    include("$path");
    $content = file_get_contents("$path");
    file_put_contents('dir/'.$page, "$content");
endif;

?>


