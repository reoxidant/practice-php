<?php

error_reporting(-1);

//выражение приводится к булевому типу
/*if(expression){

    instructions;
}*/

/*
$var = false; s
var_dump((bool) 0);
var_dump((bool) '');
*/

//$light = 'green'; //выполняется
//$light = 'red'; //не выполняется

/*if($light == 'green'){
    echo 'We may go';
}*/

//var_dump(5<3);

//<=, >=, <, >, !=
/*if(5 > 3){
    echo 'OK';
}*/
/*if(5 != 5)
    echo 'Ok';
    //без фигурных скобок выполняется только первая строка после ифа
    echo '<p>2</p>';
if(5 != 5){
    //выполнится все чтов фигурных скобках
    echo 'Ok';
    echo '<p>2</p>';
}*/

//else без if не существует.
//$light = 'green';
//$light = 'red';
//$light = 'yellow';

//elseif - писать нужно слитно, потому что в некоторых вариантах это вырежение не работает.
/*$light = 'red';
if($light == 'green'){
    //под условия. Можем вкладывать одна условие в другое.
    if(5>3){
        echo '<p>5 > 3</p>';
    }
    echo 'We may go';
}elseif($light='yellow'){
    echo 'We may ready';
}else{
    echo 'We must stop';
}*/



