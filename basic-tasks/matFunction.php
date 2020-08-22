<?php
	/*<----------------Примеры------------------> 
	// Функция abs вычисляет модуль числа (то есть из отрицательного делает положительное).
	echo abs(-15) //15

	// Функция sqrt находит квадратный корень числа.
	echo sqrt(16); //4
	echo sqrt(5);

	// Функция max находит самое большое число из переданных ей параметрами или самое большое число среди элементов массива.
	echo max(1,2,3); //3
	echo max([1,2,3]); //3

	// Функция pow возводит число в заданную степень.
	echo pow(2,3); //8

	// Функция round округляет число по правилам математического округления.
	echo round(3.4);//3
	echo round(3.5);//4
	echo round(3.6);//4

	// Функция ceil округляет дробь в большую сторону до целого.
	echo ceil(5.1);//6

	// Функция floor округляет дробь в меньшую сторону.
	echo floor(4.9);//4

	// Функция min находит самое маленькое число из переданных ей параметрами или самое маленькое число среди элементов массива.
	echo min(1,2,3);//1
	echo min([1,2,3]);//1

	// Функция mt_rand генерирует случайное целое число в заданном промежутке.
	echo mt_rand(5,15);//random
	<----------------Примеры------------------> */

	/*Тема: Работа с %;
	1. Даны переменные $a=10 и $b=3. Найдите остаток от деление $a на $b.
	$a = 10;
	$b = 3;
	echo $a%$b;

	2. Даны переменные $a и $b. Проверьте, что $a делится без остатка на $b. Если это так - выведите 'Делится' и результат деления, иначе выведите 'Делится с остатком' и остаток от деления.
	$a = 9;
	$b = 3;
	$result = $a%$b;
	if($result == 0){
		echo "Делится, результат:"." - ".($a/$b);
	} else {
		echo "Делится с остатком"." - ".$result;
	}*/

	/*Тема: Работа со степенью и корнем.
	3. Возведите 2 в 10 степень. Результат запишите в переменную $st.
	$st = pow(2,10);
	echo $st;

	4. Найдите квадратный корень из 245.
	$square = sqrt(245);
	echo $square;

	5. Дан массив с элементами 4, 2, 5, 19, 13, 0, 10. Найдите корень из суммы квадратов его элементов. Для решения воспользуйтесь циклом foreach.
	$arr = [4,2,5,19,13,0,10];
	$sum = 0;
	foreach($arr as $value){
		$sum += $value * $value;
	}
	$result = sqrt($sum);
	echo $result;

	Тема: Работа с функциями округления.
	6. Найдите квадратный корень из 379. Результат округлите до целых, до десятых, до сотых.
	$sqrt = sqrt(379);
	echo round($sqrt)."<br>";
	echo round($sqrt, 1)."<br>";
	echo round($sqrt, 2);

	7. Найдите квадратный корень из 587. Округлите результат в большую и меньшую сторону, запишите результаты округления в ассоциативный массив с ключами 'floor' и 'ceil'.

	$sqrt = sqrt(587);
	$result = ["ceil" => ceil($sqrt), "floor" => floor($sqrt)];
	var_dump($result['floor']);*/

	/*Тема: Работа с min и max.

	8. Даны числа 4, -2, 5, 19, -130, 0, 10. Найдите минимальное и максимальное число.

	$arr = [4,-2,5,19,-130, 0, 10];
	$min = min($arr);
	$max = max($arr);
	echo "Минимальное = ".$min." Максимальное = ".$max;

	9. Выведите на экран случайное число от 1 до 100.

	echo mt_rand(1, 100);

	10. Заполните массив 10-ю случайными числами. Подсказка: нужно воспользоваться циклами for или while.
	$i = 1;
	$arr = [];
	while($i <= 10){
		$arr[] = mt_rand(1,10);
		$i++;
	}
	var_dump($arr);
	
	11. Даны переменные $a и $b. Найдите найдите модуль разности $a и $b. Проверьте работу скрипта самостоятельно для различных $a и $b.
	$a = 2;
	$b = 10;
	$abs = abs($a - $b);
	echo $abs;

	12. Дан массив в числами, к примеру [1, 2, -1, -2, 3, -3]. Создайте из него новый массив так, чтобы отрицательные числа стали положительными, то есть у нас должен получиться такой массив: [1, 2, 1, 2, 3, 3].
	$arr = [1,2,-1,-2,3,-3];
	$result = [];
	foreach ($arr as $key => $value) {
		$result[] = abs($value);
	}
	var_dump($result);*/

	/*Тема: Задачи

	13.  Дано число, например 30. У этого числа есть делители - числа, на которое оно делится без остатка. Делители числа 30 - это 1, 2, 3, 5, 6, 10, 15, 30. Задача: сделайте массив делителей нашего числа. Число может быть любым, не обязательно, 30.

	$num = 28;
	$arr = [];
	for($i = 1; $i <= $num; $i++){
		if($num%$i==0){
			$arr[] = $i;
		}
	}
	var_dump($arr);

	14. Дан массив [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]. Узнайте, сколько первых элементов массива нужно сложить, чтобы сумма получилась больше 10. 

	$arr = [1,2,3,4,5,6,7,8,9,10];
	$result = 0;
	$num = 0;
	for($i = 1; $i < $arr; $i++){
		$result += $arr[$i];
		$num++;
		if($result > 10){
			break;
		}
	}
	echo "Нужно сложить: ".$num." элементов.";
	

	15. Даны ящики. Длина каждого ящика 1.5 метра. Узнайте, сколько ящиков может поместиться вдоль стены длиной 20 метров. Ответом должно быть целое число.

	$cell = 1.5;
	$length = 20;
	$result = floor($length/$cell);
	echo $result;*/
?>