<?php 
	// example
	/*$arr = [];
	for($i =0; $i < 10; $i++){
		$arr[] = 'x';
	}
	var_dump($arr);*/

	/*$arr = [];
	for($i = 1; $i <= 10; $i++){
		$arr[] += $i;
	}
	var_dump($arr);*/

	/*$arr = ['a'=>'1', "b"=>'2', "c"=>'3', "d"=>'4', "e"=>'5'];
	$result = [];
	foreach ($arr as $key => $value) {
		$result[$value] = $key;
	}
	var_dump($result);*/

	/*$arr = ['a', 'b', 'c', 'a', 'a', 'b'];
	$count = ['a'=>0, 'b'=>0, 'c'=>0];
	foreach ($arr as $key => $value) {
			$count[$value]++;
	}
	var_dump($count);*/

	/*$arr = ['a', 'b', 'c', 'a', 'a', 'b'];
	$count = [];

	foreach ($arr as $key => $value) {
		if(!isset($count[$value])){
			$count[$value] = 1;
		} else {
			$count[$value]++;
		}
	}
	var_dump($count);*/

	/*$arr = ['a', 'b', 'c', 'd', 'e'];
	$count = [];
	
	for($i = count($arr)-1; $i >= 0; $i--){
		$count[] .= $arr[$i];
	}
	var_dump($count);*/

	/*$arr = [[1,2,3,4,5],[6,7,8],[9,10]];
	foreach ($arr as $key => $value) {
		foreach ($value as $key => $elem) {
			echo $elem;
		}
	}*/
	// example

	/*Тема: Задачи на приемы работы с массивами

	1. Заполните массив следующим образом: в первый элемент запишите 'x', во второй 'xx', в третий 'xxx' и так далее.
		
	$arr = [];
	$str = 'x';
	for($i = 0; $i < 10; $i++){
		$arr[] = $str;
		$str.='x';
		
	}
	var_dump($arr);

	2. С помощью двух вложенных циклов заполните массив следующим образом: в первый элемент запишите '1', во второй '22', в третий '333' и так далее.

	$arr = [];
	for($i = 1; $i <= 9; $i++){
		$str = '';
		for($j = 0; $j <= $i; $j++){
			$str.=$i;
		}
		$arr[] = $str;
	}
	var_dump($arr);

	3. Сделайте функцию arrayFill, которая будет заполнять массив заданными значениями. Первым параметром функция принимает значение, которым заполнять массив, а вторым - сколько элементов должно быть в массиве. Пример: arrayFill('x', 5) сделает массив ['x', 'x', 'x', 'x', 'x'].
	function arrayFill($value, $count)
	{
		$arr = [];
		$str = $value;
		for($i = 0; $i < $count; $i++){
			$arr[] = $str;
		}
		return $arr;
	}

	var_dump(arrayFill("b", 5));

	4. Дан массив с числами. Узнайте сколько элементов с начала массива надо сложить, чтобы в сумме получилось больше 10-ти. Считайте, что в массиве есть нужное количество элементов.

	// С помошью for.
	$arr = [1,2,3,4,5,6,7,8,9];
	$j = 0;
	$result = 0;

	for($i = 0; $i < count($arr); $i++){
		$result += $arr[$i];
		$j++;
		if($result > 10){
			break;
		}
	}
	echo $j;

	// С помощью foreache
	$arr = [1,2,3,4,5,6,7,8,9];
	$count = 0;
	$result = 0;

	foreach ($arr as $key => $value) {
		$count += $value;
		if($count > 10){
			$result = $key + 1;
			break;
		}
	}
	echo $result;
*/
	/*Тема: Многомерные массивы

	5. Дан двухмерный массив с числами, например [[1, 2, 3], [4, 5], [6]]. Найдите сумму элементов этого массива. Массив, конечно же, может быть произвольным.

	$arr = [[1,2,3], [4,5], [6]];
	$sum = 0;

	foreach ($arr as $key => $value) {
		foreach ($value as $key => $elem) {
			$sum += $elem;
		}
	}

	echo $sum;

	6. Дан трехмерный массив с числами, например [[[1, 2], [3, 4]], [[5, 6], [7, 8]]]. Найдите сумму элементов этого массива. Массив, конечно же, может быть произвольным.

	$arr = [[[1,2], [3,4]], [[5,6], [7,8]]];
	$sum = 0;
	foreach ($arr as $key => $mvalue) {
		foreach ($mvalue as $key => $subvalue) {
			foreach ($subvalue as $key => $elem) {
				$sum += $elem;
			}
		}
	}

	echo $sum;

	7. С помощью двух циклов создайте массив [[1, 2, 3], [4, 5, 6], [7, 8, 9]].
	$num = 1;
	$arr = [];
	for($i = 0; $i < 3; $i++){
		for($j = 1; $j <= 3; $j++){
			$arr[$i][$j] = $num;
			$num++;
		}
	}
	var_dump($arr);*/
	
?>