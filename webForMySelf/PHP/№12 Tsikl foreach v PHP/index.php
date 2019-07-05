<?php

error_reporting(-1);

/*$arr = ['Ivanov', 'Petrov', 'Sidorov'];
$arr[5] = 'Pupkin';
$arr[] = 'Doe';
//print_r($arr);

$names = [
    'Ivan' => 'Ivanov',
    'Petr' => 'Petrov',
    'Sidor' => 'Sidorov'
];*/

/*echo '<pre>';
print_r($names);
echo '</pre>';*/

//Цикл Foreache только для массивов.

/*foreach($names as $name){
    $name . "<br>";
}*/

/*foreach($names as $name => $surname){
    echo "Name: $name Surname: $surname"."<br>";
}*/

/*foreach($names as $k => $v){
    echo "Key: $k Name: $v"."<br>";
}*/

/*$a = 5;
if($a == 3){
    echo 'Ok';
}else{
    echo 'No';
}
if($a == 3 && $a < 7){
    echo 'Ok';
}else{
    echo 'No';
}
if($a == 3 || $a < 7){
    echo 'Ok';
}else{
    echo 'No';
}*/

/*for($i == 0; $i <= 30; $i++){
//    if($i == 10 || $i == 20) continue;
//    if($i >= 10 && $i <= 20) continue;
    if($i >= 10 || $i <= 20) continue;
    echo $i.'<br>';
/*
    if($i == 5){
        echo '<h1>Found!!!</h1>';
        break;
    }
}*/

//TODO Домашнее задание. Вывести все элементы имен, кроме Сидорова или Петрова, Поработайте с массивом $arr, выведите всех кроме Пупкина и Дое

$arr = ['Ivanov', 'Petrov', 'Sidorov'];
$arr[5] = 'Pupkin';
$arr[] = 'Doe';


$names = [
    'Ivan' => 'Ivanov',
    'Petr' => 'Petrov',
    'Sidor' => 'Sidorov'
];

/*foreach ($names as $k => $v){
    if($v == 'Sidorov' || $v == 'Petrov') continue;
    echo 'Name:'.$k.', Surname:'.$v;
}*/
/*foreach($arr as $k => $v){
    if($v == 'Pupkin' || $v == 'Doe') continue;
    echo 'Key:'.$k.', Value:'.$v;
    echo '<br>';
}*/

/*foreach ($arr as $name) {
    if($name == 'Pupkin')break;
    echo $name . '<br>';
}
*/

/*foreach ($names as $name) {
    if($name == 'Petrov')break;
    echo $name . '<br>';
}*/


