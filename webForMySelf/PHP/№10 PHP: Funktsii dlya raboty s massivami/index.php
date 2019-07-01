<?php

error_reporting(-1);

//TODO add 1 element to array
/*$arr = array('Ivanov', 'Petrov', 'Sidorov');

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

$arr[] = 'Pupkin';*/

//TODO рекурсивный вывод
//echo count($goods, 1);

//echo count($goods);

/*$array1 = array ("a" => "green", "red", "blue", "red");
$array2 = array ("b" => "green", "yellow", "red");*/
//TODO Вычисляет схождение массивов
//$result = array_diff ($array1, $array2);
//TODO Вычисляет расхождение массивов
//$result = array_intersect ($array1, $array2);

//TODO Проверить, присутствует ли в массиве указанный ключ или индекс
/*$search_array = array("first" => 1, "second" => 4);
if (array_key_exists("first", $search_array)) {
    echo "OK";
}else{
    echo "NO";
}*/

//TODO Будут взять ключи из массива
//$result = array_keys($goods);

//TODO Будут взяты только значения массива
//$result = array_values($goods);

//TODO Обьеденение массивов
/*$array1 = array ("color" => "red", 2, 4);
$array2 = array ("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$result = array_merge ($array1, $array2);*/

//TODO оператор + берет все значение и ключи первого массива и добавляет без замены ключи и значения второго массива если их больше
//$result = $array1 + $array2;

//TODO Выведет случайный ключ массива, второй параметр колличество ключей
//$result = array_rand($arr, 2);

//TODO Переворачивает массив, меняет значение в ключи при втором параметре false, иначе, если true - меняет ключи местами не 0,1,2, а 2,1,0;
//$result = array_reverse($arr);

//TODO Записывает переменные в массив.
/*$city  = "San Francisco";
$state = "CA";
$event = "SIGGRAPH";

$location_vars = array("city", "state");

$result = compact($state, $city, $event, $location_vars);*/

//TODO Извлекает из массива ключи, создавая из ключей переменные.
//TODO extract --  Импортировать переменные из массива в текущую символьную таблицу.

/*$var_array = array("color" => "blue",
    "size"  => "medium",
    "shape" => "sphere");
extract($var_array);

echo "$color, $size, $shape"*/


//Функции сортировки ключей по значению, не по ключам!
/*arsort
asort
sort
rsort*/

//TODO arsort --  Отсортировать массив по значению в обратном порядке, сохраняя ключи

/*$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
arsort($fruits);
reset($fruits);
while (list($key, $val) = each($fruits)) {
    echo "$key = $val\n";
}*/

/*a = orange
d = lemon
b = banana
c = apple*/

//TODO asort -- Отсортировать массив по значению, сохраняя ключи

/*$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
asort($fruits);
reset($fruits);
while (list($key, $val) = each($fruits)) {
    echo "$key = $val\n";
}*/

/*c = apple
b = banana
d = lemon
a = orange*/

//TODO sort -- Отсортировать массив, ключи не сохраняются

/*$fruits = array("lemon", "orange", "banana", "apple");
sort($fruits);
reset($fruits);
while (list($key, $val) = each($fruits)) {
    echo "fruits[" . $key . "] = " . $val . "\n";
}*/

/*fruits[0] = apple
fruits[1] = banana
fruits[2] = lemon
fruits[3] = orange*/

//TODO rsort -- Отсортировать массив в обратном порядке, ключи не сохраняются

/*$fruits = array("lemon", "orange", "banana", "apple");
rsort($fruits);
reset($fruits);
while (list($key, $val) = each($fruits)) {
    echo "$key = $val
";
}*/

/*0 = orange
1 = lemon
2 = banana
3 = apple*/

//TODO krsort -- Отсортировать массив по ключам в обратном порядке

/*$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
krsort($fruits);
reset($fruits);
while (list($key, $val) = each($fruits)) {
    echo "$key = $val
";
}*/

/*
d = lemon
c = apple
b = banana
a = orange
*/

/*
 * count
 * array_diff
 * array_intersect
 * array_key_exists
 * array_keys
 * array_values
 * array_merge
 * array_rand
 * array_reverse
 * compact
 * extract
 * arsort
 * asort
 * sort
 * rsort
 */

//Домашнее задание. Выписать все функции.

/*
* array_combine
* array_search
* array_shift
* array_unique
* array_flip
* array_pop
* array_push
* in_array
* list
*/

//TODO array_combine --  Создать новый массив, используя один массив в качестве ключей, а другой в качестве соответствующих значений

/*$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');
$c = array_combine($a, $b);
*/

/*Выводит:

Array
(
    [green]  => avocado,
    [red]    => apple,
    [yellow] => banana

)*/

//TODO array_search --  Осуществляет поиск данного значения в массиве и возвращает соответствующий ключ в случае удачи

/*$array = array(0 => 'blue', 1 => 'red', 2 => 0x000000, 3 => 'green', 4 => 'red');

$key = array_search('red', $array);         // $key = 1;
$key = array_search('green', $array);       // $key = 2; (0x000000 == 0 == 'green')
$key = array_search('green', $array, true); // $key = 3;*/

//TODO array_shift --  Извлечь первый элемент массива

/*
$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_shift($stack);
*/

/*Array
(
    [0] => banana
    [1] => apple
    [2] => raspberry
)*/

//TODO array_unique -- Убрать повторяющиеся значения из массива

/*$input = array("a" => "green", "red", "b" => "green", "blue", "red");
$result = array_unique($input);*/

/*Array
(
    [a] => green
    [0] => red
    [1] => blue
)*/

//TODO array_flip -- Поменять местами значения массива

/*$trans = array ("a" => 1, "b" => 1, "c" => 2);
$trans = array_flip ($trans);*/

/*Array
(
    [1] => b
    [2] => c
)*/

//TODO array_pop -- Извлечь последний элемент массива

/*$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_pop($stack);*/

/*Array
(
    [0] => orange
    [1] => banana
    [2] => apple
)*/

//TODO array_push -- Добавить один или несколько элеметов в конец массива

/*$stack = array("orange", "banana");
array_push($stack, "apple", "raspberry");*/

/*Array
(
    [0] => orange
    [1] => banana
    [2] => apple
    [3] => raspberry
)*/

//TODO in_array -- Проверить, присутствует ли в массиве значение

/*$os = array("Mac", "NT", "Irix", "Linux");
if (in_array("Irix", $os)) {
    echo "Got Irix";
}
if (in_array("mac", $os)) {
    echo "Got mac";
}*/

//Выведется -- Got Irix

//TODO list -- Присвоить переменным из списка значения подобно массиву

/*$info = array('coffee', 'brown', 'caffeine');

// Составить список всех переменных
list($drink, $color, $power) = $info;
echo "$drink is $color and $power makes it special.
";

// Составить список только некоторых из них
list($drink, , $power) = $info;
echo "$drink has $power.
";

// Или только третья
list( , , $power) = $info;
echo "I need $power!
";
*/


echo '<pre>';
print_r($result);
echo '</pre>';
