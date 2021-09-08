<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * ${PLUGINNAME} file description here.
 *
 * @package    ${PLUGINNAME}
 * @copyright  2021 SysBind Ltd. <service@sysbind.co.il>
 * @auther     vshapovalov
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

error_reporting(-1);

//TODO �������� ������� � ������
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

//TODO ����������� �����
//echo count($goods, 1);

//echo count($goods);

/*$array1 = array ("a" => "green", "red", "blue", "red");
$array2 = array ("b" => "green", "yellow", "red");*/
//TODO ��������� ��������� ��������
//$result = array_diff ($array1, $array2);
//TODO ��������� ����������� ��������
//$result = array_intersect ($array1, $array2);

//TODO ���������, ������������ �� � ������� ��������� ���� ��� ������
/*$search_array = array("first" => 1, "second" => 4);
if (array_key_exists("first", $search_array)) {
    echo "OK";
}else{
    echo "NO";
}*/

//TODO ����� ����� ����� �� �������
//$result = array_keys($goods);

//TODO ����� ����� ������ �������� �������
//$result = array_values($goods);

//TODO ����������� ��������
/*$array1 = array ("color" => "red", 2, 4);
$array2 = array ("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$result = array_merge ($array1, $array2);*/

//TODO �������� + ����� ��� �������� � ����� ������� ������� � ��������� ��� ������ ����� � �������� ������� ������� ���� �� ������
//$result = $array1 + $array2;

//TODO ������� ��������� ���� �������, ������ �������� ����������� ������
//$result = array_rand($arr, 2);

//TODO �������������� ������, ������ �������� � ����� ��� ������ ��������� false, �����, ���� true - ������ ����� ������� �� 0,1,2, � 2,1,0;
//$result = array_reverse($arr);

//TODO ���������� ���������� � ������.
/*$city  = "San Francisco";
$state = "CA";
$event = "SIGGRAPH";
$location_vars = array("city", "state");
$result = compact($state, $city, $event, $location_vars);*/

//TODO ��������� �� ������� �����, �������� �� ������ ����������.
//TODO extract -- ������������� ���������� �� ������� � ������� ���������� �������.

/*$var_array = array("color" => "blue",
    "size"  => "medium",
    "shape" => "sphere");
extract($var_array);
echo "$color, $size, $shape"*/


//������� ���������� ������ �� ��������, �� �� ������!
/*arsort
asort
sort
rsort*/

//TODO arsort -- ������������� ������ �� �������� � �������� �������, �������� �����

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

//TODO asort -- ������������� ������ �� ��������, �������� �����

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

//TODO sort -- ������������� ������, ����� �� �����������

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

//TODO rsort -- ������������� ������ � �������� �������, ����� �� �����������

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

//TODO krsort -- ������������� ������ �� ������ � �������� �������

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

//�������� �������. �������� ��� �������.

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

//TODO array_combine -- ������� ����� ������, ��������� ���� ������ � �������� ������, � ������ � �������� ��������������� ��������

/*$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');
$c = array_combine($a, $b);
*/

/*�������:
Array
(
    [green]  => avocado,
    [red]    => apple,
    [yellow] => banana
)*/

//TODO array_search -- ������������ ����� ������� �������� � ������� � ���������� ��������������� ���� � ������ �����

/*$array = array(0 => 'blue', 1 => 'red', 2 => 0x000000, 3 => 'green', 4 => 'red');
$key = array_search('red', $array);         // $key = 1;
$key = array_search('green', $array);       // $key = 2; (0x000000 == 0 == 'green')
$key = array_search('green', $array, true); // $key = 3;*/

//TODO array_shift -- ������� ������ ������� �������

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

//TODO array_unique -- ������ ������������� �������� �� �������

/*$input = array("a" => "green", "red", "b" => "green", "blue", "red");
$result = array_unique($input);*/

/*Array
(
    [a] => green
    [0] => red
    [1] => blue
)*/

//TODO array_flip -- �������� ������� �������� �������

/*$trans = array ("a" => 1, "b" => 1, "c" => 2);
$trans = array_flip ($trans);*/

/*Array
(
    [1] => b
    [2] => c
)*/

//TODO array_pop -- ������� ��������� ������� �������

/*$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_pop($stack);*/

/*Array
(
    [0] => orange
    [1] => banana
    [2] => apple
)*/

//TODO array_push -- �������� ���� ��� ��������� �������� � ����� �������

/*$stack = array("orange", "banana");
array_push($stack, "apple", "raspberry");*/

/*Array
(
    [0] => orange
    [1] => banana
    [2] => apple
    [3] => raspberry
)*/

//TODO in_array -- ���������, ������������ �� � ������� ��������

/*$os = array("Mac", "NT", "Irix", "Linux");
if (in_array("Irix", $os)) {
    echo "Got Irix";
}
if (in_array("mac", $os)) {
    echo "Got mac";
}*/

//��������� -- Got Irix

//TODO list -- ��������� ���������� �� ������ �������� ������� �������

/*$info = array('coffee', 'brown', 'caffeine');
// ��������� ������ ���� ����������
list($drink, $color, $power) = $info;
echo "$drink is $color and $power makes it special.
";
// ��������� ������ ������ ��������� �� ���
list($drink, , $power) = $info;
echo "$drink has $power.
";
// ��� ������ ������
list( , , $power) = $info;
echo "I need $power!
";
*/

echo '<pre>';
print_r($result);
echo '</pre>';