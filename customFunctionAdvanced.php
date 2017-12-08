<?php 
	// example
	/*function words($word1, $word2, $word3 = '!')
	{
		echo $word1;
		echo $word2;
		echo $word3;
	}
	words('Привет, ', "Мир");

	function func()
	{
		$local = "Тест!";
		var_dump($local); //Выведет "Тест!";
	}

	var_dump($local); //Выведет null
	$test = 'Тест!';

	function func()
	{
		global $test; 
		var_dump($test); //Если нет global выводит - NULL
	}

	func();*/
	
	/*$arr = [1,2,3,4,5,6,7,8,9,0];

	last($arr);

	function last($arr){
		echo array_pop($arr);

		if(!empty($arr)){
			last($arr); // - называется рекурсией
		}
	}*/
	// example

	/*Тема: Продвинутая работа с пользовательскими функциями

	1. Сделайте функцию cut, которая первым параметром будет принимать строку, а вторым параметром - сколько первых символов оставить в этой строке. Второй параметр должен быть необязательным и по умолчанию принимать значение 10. 

	function cut($str, $valueFirstChar = 10)
	{
		return mb_substr($str, 0, $valueFirstChar);//Пришлось применить mb_substr, потому что выводится ромбы с вопросами.
	}
	echo cut("Привет мир!", 7);	

	2. Дан массив с числами. Выведите последовательно его элементы используя рекурсию и не используя цикл.

	$arr = [1,2,3,4,5,6,7,8,9,0];
	arrayNum($arr);

	function arrayNum($arr)
	{
		static $i = 0;
		echo $arr[$i];
		$i++;
		if($i < count($arr)){
			arrayNum($arr);
		}
	}
	

	3. Дано число. Сложите его цифры. Если сумма получилась более 9-ти, опять сложите его цифры. И так, пока сумма не станет однозначным числом (9 и менее).

	function sumNum($num)
	{
		return array_sum(str_split($num, 1));// Почему array_sum и str_split по отдельность не работают?
	}

	function isNine($result)
	{
		if($result > 9){
			return isNine(sumNum($result));
		} else {
			return $result;
		}
	}

	echo isNine(sumNum(865)); */

	// так работает array_sum(str_split($num, 1)), а так нет $arr = str_split($num, 1); array_sum($arr);

	function arr($num)
	{	
		$arr = [];
		$arr = str_split($num, 1);
		$num = array_sum($arr);
		return $num;
	}

	var_dump(arr(12345));
?>