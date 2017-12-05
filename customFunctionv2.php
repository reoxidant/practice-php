<?php 
	// example
/*	$arr = [1,-2,-3,4,-5,6,-7,8,-9];
	$posNumbers = [];

	function isPositive($num)
	{
		return $num >= 0;
	}

	foreach ($arr as $key => $value) {
		if(isPositive($value)){
			$posNumbers[] = $value;
		}
	}

	var_dump($posNumbers);*/
	// example

	// Тема: Правильное использование пользовательский функций

	// 1. Сделайте функцию isNumberInRange, которая параметром принимает число и проверяет, что оно больше нуля и меньше 10. Если это так - пусть функция возвращает true, если не так - false.

	/*function isNumberInRange($num)
	{
		return $num > 0 and $num < 10;
	}
	echo isNumberInRange(2);*/

	// 2. Дан массив с числами. Запишите в новый массив только те числа, которые больше нуля и меньше 10-ти. Для этого используйте вспомогательную функцию isNumberInRange из предыдущей задачи.

	/*$arr = [1,12,13,4,55,6,74,8,49];
	$newArr = [];

	function isNumberInRange($num)
	{
		return $num > 0 and $num < 10;
	}

	foreach ($arr as $key => $value) {
		if(isNumberInRange($value)){
			$newArr[] = $value;
		}
	}

	var_dump($newArr);*/

	// 3.  Сделайте функцию getDigitsSum (digit - это цифра), которая параметром принимает целое число и возвращает сумму его цифр.

	/*function getDigitsSum($num)
	{
		return array_sum(str_split($num, 1));
	}

	echo getDigitsSum(61193);*/

	// 4. Найдите все года от 1 до 2017, сумма цифр которых равна 13. Для этого используйте вспомогательную функцию getDigitsSum из предыдущей задачи. 

	/*$year = date("Y");
	$result = [];

	function getDigitsSum($num)
	{
		return array_sum(str_split($num));
	}

	for($i = 1; $i < $year; $i++){
		if(getDigitsSum($i) == 13){
			$result[] = $i."<br>";
		}
	}

	var_dump($result);*/

	// 5. Сделайте функцию isEven() (even - это четный), которая параметром принимает целое число и проверяет: четное оно или нет. Если четное - пусть функция возвращает true, если нечетное - false.

	/*function isEven($num)
	{
		return $num%2 == 0;
	}

	var_dump(isEven(66));*/

	// 6. Дан массив с целыми числами. Создайте из него новый массив, где останутся лежать только четные из этих чисел. Для этого используйте вспомогательную функцию isEven из предыдущей задачи.

	/*$arr = [1,2,3,4,5,6,7,8,9];
	$newArr = [];

	function isEven($num){
		return $num%2 == 0;
	}

	foreach ($arr as $key => $value) {
		if(isEven($value)){
			$newArr[] = $value;
		}
	}

	var_dump($newArr);*/

	// 7. Сделайте функцию getDivisors, которая параметром принимает число и возвращает массив его делителей (чисел, на которое делится данное число).

	
	/*function getDivisors($num)
	{
		$arr = [];
		for($i = 0; $i < $num; $i++){
			if($num%$i == 0){
				$arr[] = $i;
			}
		}
		return $arr;
	}
	*/

	// 8. Сделайте функцию getCommonDivisors, которая параметром принимает 2 числа, а возвращает массив их общих делителей. Для этого используйте вспомогательную функцию getDivisors из предыдущей задачи.
	
	/*function getDivisors($num)
	{
		$arr = [];
		for($i = 1; $i <= $num; $i++){
			if($num%$i==0){
				$arr[] = $i;
			}
		}
		return $arr;
	}

	function getCommonDivisors($num1, $num2)
	{
		return array_intersect(getDivisors($num1), getDivisors($num2));
	}

	var_dump(getCommonDivisors(22, 99));*/


	?>