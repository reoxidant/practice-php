<!-- <?php 
	Тема: Отработка циклов

	1. Выведите с помощью цикла столбец чисел от 1 до 100. 
	for($i = 1; $i <= 100; $i++){
		echo $i."<br>";
	}

	2. Выведите с помощью цикла столбец четных чисел от 1 до 100.
	for($i = 1; $i <= 100; $i++){
		if($i%2==0){
			echo $i."<br>";
		}
	}

	3. Найдите с помощью цикла сумму чисел от 1 до 100.
	$res = 0;
	for ($i = 1; $i <= 100 ; $i++) { 
		$res += $i;		
	}
	echo $res;

	4. Найдите с помощью цикла сумму квадратов чисел от 1 до 15. 
	$res = 0;
	for ($i=1; $i <= 15 ; $i++) { 
		$res += $i * $i;
	}
	echo $res;

	5. Найдите с помощью цикла сумму корней чисел от 1 до 15. Результат округлите до двух знаков после дробной части.
	$res = 0;
	for ($i=1; $i <= 15 ; $i++) { 
		$res += sqrt($i);
	}
	echo round($res, 2);

	6. Найдите с помощью цикла сумму тех чисел от 1 до 100, которые делятся на 7.
	$res = 0;
	for ($i=1; $i < 100; $i++) { 
		if($i%7==0){
			$res += $i;
		}
	}
	echo $res;

	7. Заполните массив 10-ю иксами с помощью цикла. 
	$arr = [];
	for ($i=1; $i <= 10; $i++) { 
		$arr[] = 'x';
	}
	var_dump($arr);

	8. Заполните массив числами от 1 до 10 с помощью цикла.
	$arr = [];
	for ($i=1; $i <= 10 ; $i++) { 
		$arr[] = $i;
	}
	var_dump($arr);

	9. Заполните массив числами от 10 до 1 с помощью цикла. 
	$arr = [];
	for ($i = 10; $i >= 1; $i--) { 
		$arr[] = $i;
	}
	var_dump($arr);

	10. Заполните массив 10-ю случайными числами от 1 до 10 с помощью цикла. 
	$arr = [];
	for ($i = 1; $i <= 10; $i++) { 
		$arr[] = mt_rand(1,10);
	}
	var_dump($arr);

	11. С помощью цикла создайте строку из 6-ти символов, состоящую из случайных чисел от 1 до 9.
	$str = '';
	for ($i = 1; $i <= 6; $i++) { 
		$str .= mt_rand(1,9);
	}
	echo $str;

	12. Дан массив с числами. С помощью цикла найдите сумму элементов этого массива. 
	$arr = [1,22,33,4,55,16,327,811,95];
	$res = 0;
	for ($i = 0; $i < count($arr); $i++) { 
		$res += $arr[$i];
	}
	echo $res;

	13. Дан массив с числами. С помощью цикла найдите сумму квадратов элементов этого массива.
	$arr = [1,5,23];
	$res = 0;
	for ($i = 0; $i < count($arr); $i++) { 
		$res += $arr[$i] * $arr[$i];
	}
	echo $res;

	14. Дан массив с числами. С помощью цикла найдите корень из суммы квадратов элементов этого массива. Результат округлите в меньшую сторону до целых. 
	$arr = [1,65,23,44,100,11];
	$res = 0;
	for ($i = 0; $i < count($arr); $i++) { 
		$res += $arr[$i] * $arr[$i];
	}
	echo floor(sqrt($res));

	15. Дан массив с числами. Найдите сумму тех элементов массива, которые больше 0 и меньше 10.
	$arr = [11,22,3,4,5];
	$res = 0;
	for ($i=0; $i < count($arr); $i++) { 
		if($arr[$i] > 0 and $arr[$i] < 10){
			$res += $arr[$i];
		}
	}
	echo $res;

	16. Дан массив с числами. Проверьте, что в нем есть 3 одинаковых числа подряд.

	$arr = [1,3,5,25,2,1,5,16,5];
	$flag = true;
	foreach ($arr as $key => $value1) {
		$j = 0;
		if($flag == true){
			foreach ($arr as $key => $value2) {
				if($value1 == $value2){
					$j++;
					if($j == 3){
					echo "Есть три одинаковые числа."."<br>";
					$flag = false;
					}
				}
			}
		}
	}

	17. С помощью цикла сформируйте строку '1223334444...' и так далее до заданного числа.

	function createNumber($num)
	{
		for ($i=1; $i <= $num; $i++) { 
			for ($j=1; $j <= $i; $j++) { 
				echo $i;
			}
		}
	}

	createNumber(9);

	18. Дан многомерный массив (см. его под задачей). С помощью цикла выведите строки в формате 'имя-зарплата'.

	$arr = [
		0=>['name'=>'Коля', 'salary'=>300],
		1=>['name'=>'Вася', 'salary'=>400],
		2=>['name'=>'Петя', 'salary'=>500],
	];

	foreach ($arr as $key => $value) {
			echo $value['name'].'-'.$value['salary']."<br>";
	}

	19. Заполните двумерный массив случайными числами от 1 до 10. В каждом подмассиве должно быть по 10 элементов. Должно быть 10 подмассивов. 

	$arr = [];
	for ($i=0; $i < 10; $i++) { 
		for ($j=0; $j < 10; $j++) { 
			$arr[$i][$j] = mt_rand(1,10)."<br>";
		}
	}
	var_dump($arr);

	Тема: Практика

	20. Напишите свой аналог функции ucfirst (аналог - значит можно использовать все, что угодно, кроме этой функции).
	function firstLetter($str)
	{
		$str = strtoupper($str);
		for($i = 1; $i <= strlen($str); $i++ ){
			$str = strtolower($str[$i]);
		}
		echo $str;
	}
	firstLetter('hello');
	

	21. Напишите свой аналог функции strrev. Решите задачу двумя способами. 

	function strReverse($str)
	{
		$arr = str_split($str,1);
		$strrev = '';
		for ($i = count($arr); $i >= 0; $i--) { 
			$strrev .= $arr[$i];
		}
		echo $strrev;
	}

	strReverse('hello');

	22. Напишите свой аналог функции strlen.

	function strLength($str)
	{
		$strlen = str_split($str,1);
		echo count($strlen);
	}

	strLength('hello');

	23. Поменяйте в строке большие буквы на маленькие и наоборот.

	$str = 'OmSk';
	$letterChar = str_split($str, 1);
	$res = '';

	foreach ($letterChar as $key => $value) {
		if(ord($value) >= 65 and ord($value) <= 90){
			$res .= strtolower($value);
		} else {
			$res .=	strtoupper($value);
		}
	}
	echo $res;

	24. Преобразуйте строку 'var_text_hello' в 'varTextHello'. Скрипт должен работать с любыми стоками такого рода.

	$str1 = 'var_text_hello';
	$arr = explode('_', $str1);
	$str2 = '';
	for ($i=0; $i < count($arr); $i++) {
		$str2 .= ucfirst($arr[$i]);
	}
	echo lcfirst($str2);

	25. С помощью только одного цикла нарисуйте следующую пирамидку: 
	
	for ($i=1; $i <= 9 ; $i++) { 
		echo str_repeat($i, $i)."<br>";
	}

	26. Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно быть не 5 рядов, а произвольное количество, оно задается так: $str = 'xxxxxxxx'; - это первый ряд пирамиды.

	$str = 'xxxxxxxxxxxxx';
	$res = '';
	for ($i=strlen($str); $i > 0; $i--) { 
		echo substr($str, 0, $i)."<br>";	
	}

	27. Дан массив с произвольными числами. Сделайте так, чтобы элемент повторился в массиве количество раз, соответствующее его числу. Пример: [1, 3, 2, 4] превратится в [1, 3, 3, 3, 2, 2, 4, 4, 4, 4].

	$arr = [1,3,2,4];
	$newArr = [];

	for ($i=0; $i < count($arr); $i++) { 
		for ($j=0; $j < $arr[$i]; $j++) { 
			$newArr[] = $arr[$i];
		}
	}

	var_dump($newArr);

	28. Дан массив с произвольными целыми числами. Сделайте так, чтобы первый элемент стал ключом второго элемента, третий элемент - ключом четвертого и так далее. Пример: [1, 2, 3, 4, 5, 6] превратится в [1=>2, 3=>4, 5=>6]. 

	$arr = [1,2,5,6,8,3];
	$newArrKey = [];
	$newArr = [];

	for ($i=0; $i < count($arr); $i+=2) { 
		$newArrKey[] = $arr[$i];
	}

	for ($j=1; $j < count($arr); $j+=2) { 
		$newArr[] = $arr[$j];
	}
	
	$arr = array_combine($newArrKey, $newArr);
	var_dump($arr);

	29. Дана строка. Удалите из этой строки четные символы. 

	$str = 'hello';

	for ($i=1; $i <= strlen($str); $i++) { 
		$str = substr_replace($str, "", $i, 1);
	}
	echo $str;

	30. Дана строка. Поменяйте ее первый символ на второй и наоборот, третий на четвертый и наоборот, пятый на шестой и наоборот и так далее. То есть из строки '12345678' нужно сделать '21436587'.

	$str = '12345678';
	$newStr = '';
	$res = '';
	for ($i= 0; $i < strlen($str); $i+=2) { 
			$newStr = substr($str, $i, 2);
			$res .= strrev($newStr);
	}	
	echo $res;

	31. Сделайте аналог функции array_unique.

	$arr = [1,1,22,3,3,5,6,5];
	$count = count($arr);
	$value = 0;
	$newArr = [];

	function inValue($value, $count, $arr, $newArr)
	{
		for ($i=0; $i < $count; $i++) { 
			$value = $arr[$i];
			if(isIntersecting($value, $newArr) == false){
				$newArr[] = $value;
			}
		}
		return $newArr;
		
	}
	
	var_dump(inValue($value, $count, $arr, $newArr));

	function isIntersecting($value, $newArr)
	{
		foreach($newArr as $elems){
			if($value == $elems){
				return true;
			}
		}
	}


	32. Сделайте функцию, противоположную функции array_unique. Ваша функция должна оставлять дубли и удалять элементы, не имеющие дублей. 

	$arr = [2,8,1,2,1,9,9,4];
	$count = count($arr);
	$value = 0;
	$newArr = [];

	function inValue($value, $count, $arr, $newArr)
	{
		for ($i=0; $i < $count; $i++) { 
			$value = $arr[$i];
			unset($arr[$i]); //Удалили только первую $i - элемента, остальные значение елементов передаются по порядку.
			if(isIntersecting($value, $arr)){
				$newArr[] = $value;
			}
			$arr[$i] = $value;
		}
		return $newArr;
		
	}
	
	function isIntersecting($value, $arr)
	{
		foreach($arr as $elems){
			if($value == $elems){
				return true;
			} 
		}
	}

	var_dump(inValue($value, $count, $arr, $newArr));
	

	33. Напишите скрипт, который проверяет, является ли данное число простым (простое число - это то, которое делится только на 1 и на само себя).

	$num = 997;
	$flag = false;

	function isNumSimple($num){
		for ($i=2; $i < $num; $i++) { 
			if($num % $i == 0 ){
				$flag = true;
				break;
			} 
		} 

		if(!$flag){
			return "Число - простое.";
		} else {
			return "Число - сложное.";
		}
	}

	echo (isNumSimple($num));

	34. Дан массив со строками. Запишите в новый массив только те строки, которые начинаются с 'http://'.

	$arr = ['http://ya.ru', 'http://google.com', 'https://online.sberbank.ru'];
	$newArr = [];

	for ($i=0; $i < count($arr); $i++) { 
		if(strpos($arr[$i], 'http://') === 0){
			$newArr[] = $arr[$i];
		}
	}

	var_dump($newArr);

?> -->