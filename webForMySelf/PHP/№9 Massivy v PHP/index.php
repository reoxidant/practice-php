<?php

error_reporting(-1);

$arr = array('Ivanov', 'Petrov', 'Sidorov');
//var_dump($arr);

//echo $arr;
/*echo "<pre>";
print_r($arr);
echo "</pre>";*/

//Обрвщение по ключу в квадратных скобочках либо в фигурных
/*echo $arr[1];
echo $arr{1};*/

//При обращении к строке
/*$var = 'Ivanov';
$var = 2;
echo $var;*/

//Массив с разными данными. Если массив вложен в другой массив - это многомерный массив.
$arr2 = [
    1,
    2,
    [
        'banana',
        'orange',
        'apple'
    ],
    4,
    5,
    'cat',
    6,
    7,
    8,
    'dog'
];

/*echo "<pre>";
print_r($arr2);
echo "</pre>";*/

//Обращение к элементу в многомерном массиве по ключу.
//echo $arr2[3][1];

//$arr3 = [2 =>'Ivanov', 3 => 'Petrov', 4 => 'Sidorov'];
//php сам проставит нумерацию.
/*$arr3 = [
     2 =>'Ivanov',
    'Petrov',
    'Sidorov'
];*/
$arr3 = [
     2 =>'Ivanov',
     4 =>'Petrov',
     10=>'Sidorov',
    'Pupkin'  //11 ключ пхп проставляет сам
];
/*echo '<pre>';
print_r($arr3);
echo '</pre>';
echo $arr3[4];*/


//Ассоциативный массив, ключ не число, а строка.

$goods = [
    [
        'title' => 'nokia',
        'price' => 100,
        'description' => 'Description'
    ],
    [

        'title' => 'iPad',
        'price' => 200,
        'description' => 'Description'
    ]
];

/*echo '<pre>';
print_r($goods);
echo '</pre>';

echo $goods[0]['title'].' - '.$goods[0]['price'];
echo '<br>';
echo $goods[1]['title'].' - '.$goods[1]['price'];*/


//Домашнее задание - вывести в цикле товары массива goods
/*$i = 0;
while($i < count($goods)){
    echo $goods[$i]['title'] - $goods[$i]['price'] - $goods[$i]['description'];
    echo '<br>';
    $i++;
}*/




