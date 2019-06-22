<?php

//Notice ошибки
error_reporting(-1);

$title = 'hello world';
$title = 'page title';
$fruit = 'apple';
//$винни_пух = 'Hello, I\'m Winnie';
//$winnie_pooh = 'Hello, I\'m Winnie';
//CamelCase
//$winnieThePooh = 'Hello, I\'m Winnie';

$winnie_pooh = 'Hello, I\'m Winnie I have 2 '.$fruit.'s';

//Переменые и константы зависят от регистра
$var = '123';
$Var = '456';


//Конcтанты.
define("PAGE", "new page");

//Нельзя переопределить.
//define("PAGE", "new page_2");

//Работает с версии 5.4
const PAGE2 = 'new const';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
</head>
<body>
    <h1><?php echo PAGE;?></h1>
<!--    <p>--><?php //echo $винни_пух;?><!--</p>-->
    <p><?php echo $winnie_pooh;?></p>
    <p><?php echo $var;?></p>
    <p><?php echo PAGE2;?></p>
</body>
</html>