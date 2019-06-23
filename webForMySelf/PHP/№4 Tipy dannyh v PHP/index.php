<?php

error_reporting(-1);

//Уже используется в php, вызовет ошибку.
//$this = "123";

//php - слаботипизированный язык программирования

$var = 'pencil';
$is_auth = false;

/* Типы данных:
 * boolean true | false - регистроне зависимые
 * integer
 * float
 * string
 */
//При true выводится 1, при false = "выводится ничего"
$var = false;
//echo $var;
//var_dump($var); //Откладка кода
//gettype($var); // Какого Типа переменная, применяется редко.

//$int = 123; //Integer
//$int = '123'+100; //String
//var_dump($int);


//php преобразовывет тип данных, поэтому строка и число будут как число + число.
/*
$fl = 1.2; //float
//$fl = 1,2; //Запятая в числе выведет ошибку.
var_dump($fl);
*/
$var = 10;
//В одинарный ковычках переменная не обрабатывается.
//$str = 'This is \'string\'. $var';
// - \' - обратным слешем экранируется строка.
//В двойных обрабатывается
//$str2 = "This is string. {$var}s";
//Ограниченим фигурными скобками переменую.

//$str2 = "This is string. \$var";
//$str2 = "This \"is\" \"string\". $var";

//HEREDOC для двойных кавычек
$str3 = <<<HERE
This "is" 'string' $var
HERE;


//NOWDOC для одинарных кавычек


$str3 = <<<'HERE'
This "is" 'string' $var
HERE;

var_dump($str3);
?>