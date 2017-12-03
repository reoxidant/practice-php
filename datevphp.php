<!-- --------Примеры-------- -->
<!-- <?php 
	/*Вернет timestamp для 31 января 2017 года,
	12 часов, 43 минуты, 59 секунд:*/
	echo mktime(12,43,59,1,31,2017)."<br>";
	/*Функция вернет timestamp для 31 января текущего года,
	12 часов, 43 минуты, 59 секунд:
	*/
	echo mktime(12,43,59,1,31)."<br>";
	/*Функция вернет timestamp для 2 (это номер текущего дня)
	яеваря текущего года, 12 часов, 43 мрнтуы, 59 сеунд:*/
	echo mktime(12, 43, 59, 1)."<br>";
	/*Функция вернет timestamp текущего дня, текущего месяца, текущего года,
	12 часов, 43 минуты, 59 секунд:*/
	echo mktime(12, 43, 59)."<br>";
	/*Функция time() вернет текущей момент времени в формате timestamp,
	a mktime - за заданную дату.

	Отнимем результаты друг от друга и получим разницу в секундах:*/
	echo time() - mktime(12, 0, 0, 2, 1, 2000);
?> -->

<!-- <?php 
	echo date('Y')."<br>";//вернет "2017"
	echo date('y')."<br>";//вернет "17"
	echo date('m')."<br>";//вернет "12"
	echo date('d')."<br>";//вернет "02"
	echo date('j')."<br>";//вернет "2"
	echo date('w')."<br>";//вернет "6" - суббота
	echo date('H')."<br>";//вернет "16" -часы
	echo date('i')."<br>";//вернет "20" - минуты
	echo date('s')."<br>";//вернет "36" - секунды
	// echo date('d-m-Y')."<br";//вернет "02-12-2017"
	echo date('d.m.Y')."<br>";//вернет "02.12.2017"
	echo date('H:i:s d.m.Y' );//вернет "16:23:53 02.12.2017"
?> -->

<!-- Тема: Второй параметр функции date -->
<!-- <?php
	//Узнаем день недели в 29-12-2013
	echo date("w", mktime(0,0,0,12,29,13)); //вернет "0" - воскресенье
?> -->

<!-- Тема: Функция strtotime -->
<!-- <?php
	echo strtotime('now')."<br>";
	echo strtotime("10 september 2000")."<br>";
	echo strtotime('+ 1 day')."<br>";
	echo strtotime('+1 week')."<br>";
    echo strtotime('+1 week 2 days 4 hours 2 seconds')."<br>";
    echo strtotime("next Thursday")."<br>";
    echo strtotime("last Monday")."<br>";

    echo date('d-m-Y', strtotime('last Monday'));
?> -->

<!-- Тема: Как добавить или отнять дату -->
<!-- <?php
	// Пример 1
	/*$date = date_create('2025-12-31');
	date_modify($date, '1 day');
	echo date_format($date, 'd.m.Y');*/

	// Пример 2
	/*$date = date_create('2025-12-31');
	date_modify($date, '3 days);
	echo date_format($date, 'd.m.Y');*/

	// Пример 3
	/*$date = date_create('2025-12-31');
	date_modify($date, '3 days 1 month');
	echo date_format($date, 'd.m.Y');*/

	// Пример 4
	/*$date = date_create('2025-01-01');
	date_modify($date, '-1 day');
	echo date_format($date, 'd.m.Y');*/
?> -->
<!-- <?php
	// 1. Выведите 23 сентября 2031 года, 12:58:59 в формате timestamp.
	/*echo mktime(12,58,59, 9, 23, 2031);
	echo strtotime('2031-09-23 12:58:59');*/
	// 2. Найдите разницу между 1 сентября 2010 года, 7:25:59 и текущим моментом времени в секундах.
	/*echo time() - mktime(7, 25, 59, 9, 1, 2010);*/
	// 3. Выведите текущую дату-время в формате '2025.12.31 12:59:59'.
	/*echo date('Y.m.d H:i:s');*/
	// 4. Выведите 1-го сентября текущего года в формате '2017.09.01'.
	/*echo date('Y.m.d', mktime(0,0,0,9,1));*/
	// 5. Узнайте, какой день недели (словом) был 1 сентября 2010 года.
	/*$week = ['вс',"пн","вт","ср","чт","пт","сб"];
	echo $week[date('w', mktime(0,0,0,9,1,2010))];*/
	// 6. Дана дата в формате '31-12-2025'. С помощью функций mktime и explode переведите эту дату в формат timestamp.
	// $str = '31-12-2025';
	// $arr = explode('-', $str);
	// echo mktime(0,0,0,$arr[1], $arr[0], $arr[2]);
?> -->
<!-- ------Примеры------ -->
<?php
	// Тема: Timestamp: time и mktime

	// 1. Выведите текущее время в формате timestamp.
	/*echo time('now');*/

	// 2. Выведите 1 марта 2025 года в формате timestamp.
	/*echo mktime(0,0,0,3,1,2025);*/

	// 3. Выведите 31 декабря текущего года в формате timestamp. Скрипт должен работать независимо от года, в котором он запущен.
	/*echo mktime(0,0,0,12,31);*/

	// 4. Найдите количество секунд, прошедших с 13:12:59 15-го марта 2000 года до настоящего момента времени.
	/*echo time('now') - mktime(13,12,59,3,15,2000); */

	// 5. Найдите количество целых часов, прошедших с 7:23:48 текущего дня до настоящего момента времени.
	/*$seconds = (time() - mktime(7,23,48));
	echo floor($seconds/(60 * 60));*/

	// Тема: Функция date

	// 6. Выведите на экран текущий год, месяц, день, час, минуту, секунду. 
	/*echo date('Y-m-d H:i:s');*/

	// 7. Выведите текущую дату-время в форматах '2025-12-31', '31.12.2025', '31.12.13', '12:59:59'.
	/*echo date('Y-m-d')."<br>";
	echo date('d.m.Y')."<br>";
	echo date('d.m.y')."<br>";
	echo date('H:i:s');*/

	// 8. С помощью функций mktime и date выведите 12 февраля 2025 года в формате '12.02.2025'.
	/*echo date('d.m.Y', mktime(0,0,0,2,12,2025));*/

	// 9. Создайте массив дней недели $week. Выведите на экран название текущего дня недели с помощью массива $week и функции date. Узнайте какой день недели был 06.06.2006, в ваш день рождения.
	/*$week = ['вс','пн','вт',"ср", "чт", "пт","сб","вск"];
	$day = date('w');
	$day2 = date('w', mktime(0,0,0,6,6,2006));
	$hb = date('w', mktime(0,0,0,12,28,1994));
	echo $week[$day]."<br>";
	echo $week[$day2]."<br>";
	echo $week[$hb];*/

	// 10. Создайте массив месяцев $month. Выведите на экран название текущего месяца с помощью массива $month и функции date.
	/*$month = [1=>'яна',"февр","март","апр","май","июнь","июль","август","сентябрь","октябрь","ноябрь","декабрь"];
	$dateMonth = date('m');
	echo $month[$dateMonth];*/

	// 11. Найдите количество дней в текущем месяце. Скрипт должен работать независимо от месяца, в котором он запущен. 
	/*echo date('t');*/



?>

<!-- 12. Сделайте поле ввода, в которое пользователь вводит год (4 цифры), а скрипт определяет високосный ли год. -->
	<!-- <form action="" method="GET">
		<p>
			Введите год:<br>
			<input type="text" name="year">
		</p>
		<input type="submit" name="submit">
	</form>
	<?php 
		if(isset($_REQUEST['year'])){
			if(strlen($_REQUEST['year']) == 4 and (int)$_REQUEST['year']){
				$date = $_REQUEST['year'];
				if(date('L', mktime(0,0,0, 1, 1, $date)) == 1){
					echo "Год высокосный!";
				} else {
					echo "Год не высокосный!";
				}
			} else {
				echo "Введено неправельное значение!";
			}	
		}
	?> -->

<!-- 13. Сделайте форму, которая спрашивает дату в формате '31.12.2025'. С помощью функций mktime и explode переведите эту дату в формат timestamp. Узнайте день недели (словом) за введенную дату. -->
<!-- <form action="" method="GET">
	<p>
		Введите дату в формате - 31.12.2000 <br>
		<input type="text" name="date">
	</p>
	<input type="submit" name="submit">
</form>

<?php 
	if(isset($_REQUEST['date'])){
		$date = strip_tags($_REQUEST['date']);
		if((int)$date and strlen($date) == 10){
			$arr = explode('.', $date);
			$week = ['вск','пн','вт',"ср","чт","пт","сб"];
			$value = date('w', mktime(0,0,0,$arr[1],$arr[0],$arr[2]));
			echo $week[$value];
		}
	}
?> -->

<!-- 14.  Сделайте форму, которая спрашивает дату в формате '2025-12-31'. С помощью функций mktime и explode переведите эту дату в формат timestamp. Узнайте месяц (словом) за введенную дату. -->
<!-- <form action="" method="GET">
	<p>
		Введите дату в формате - 2000-12-31 <br>
		<input type="text" name='date'>
	</p>
	<input type="submit">
</form>

<?php 
	if(isset($_REQUEST['date'])){
		$arr = explode('-', $_REQUEST['date']);
		$month = [1=>'январь', "февраль", "март", "апрель", "май", "июнь", "июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь"];
		echo $month[date('n', mktime(0,0,0,$arr[1], $arr[2], $arr[0]))];
	}
?> -->

<!-- Тема: Сравнение дат -->
<!-- 15. Сделайте форму, которая спрашивает две даты в формате '2025-12-31'. Первую дату запишите в переменную $date1, а вторую в $date2. Сравните, какая из введенных дат больше. Выведите ее на экран. -->
<!-- <form action="" method="GET">
	<p>
		Введите дату в формате - 2000-12-31 <br>
		<input type="text" name="date1">
	</p>
	<p>
		Введите дату в формате - 2000-12-31 <br>
		<input type="text" name="date2">
	</p>
	<input type="submit" name="submit">
</form>

<?php 
	if(isset($_REQUEST['submit'])){
		$date1 = $_REQUEST['date1'];
		$date2 = $_REQUEST['date2'];
		if($date1 > $date2){
			echo $date1;
		} else {
			echo $date2;
		}
	}
?> -->

<!-- Тема: На strtotime -->

<!-- 16. Дана дата в формате '2025-12-31'. С помощью функции strtotime и функции date преобразуйте ее в формат '31-12-2025'. -->
<!-- <?php 
	$curDate = '2025-12-31';
	echo date('d-m-Y', strtotime($curDate));
?> -->

<!-- 17. Сделайте форму, которая спрашивает дату-время в формате '2025-12-31T12:13:59'. С помощью функции strtotime и функции date преобразуйте ее в формат '12:13:59 31.12.2025'. -->
<!-- <form action="" method="GET">
	<p>
		Введите дату-время в формате - 2025-12-31T12:13:59 <br>
		<input type="text" name="date">
	</p>
	<input type="submit" name="submit">
</form>

<?php 
	if(isset($_REQUEST['submit'])){
		$date = $_REQUEST['date'];
		echo date('H:i:s d.m.Y', strtotime($date));
	}
?> -->

<!-- Тема: Прибавление и отнимание дат -->
<!-- 18. В переменной $date лежит дата в формате '2025-12-31'. Прибавьте к этой дате 2 дня, 1 месяц и 3 дня, 1 год. Отнимите от этой даты 3 дня.  -->
<!-- <?php 
	$date = date_create('2025-12-31');
	date_modify($date, "2 days");
	echo date_format($date, "Y-m-d")."<br>";

	$date = date_create('2025-12-31');
	date_modify($date, "1 month");
	echo date_format($date, "Y-m-d")."<br>";

	$date = date_create('2025-1 2-31');
	date_modify($date, "3 days");
	echo date_format($date, "Y-m-d")."<br>";

	$date = date_create('2025-12-31');
	date_modify($date, "1 year");
	echo date_format($date, "Y-m-d")."<br>";

	$date = date_create('2025-12-31');
	date_modify($date, '-3 days');
	echo date_format($date, 'Y-m-d');
?> -->

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi at et, amet, asperiores vero cupiditate alias sequi placeat consequuntur esse reprehenderit, itaque deleniti provident ipsa vel, adipisci perferendis quibusdam. Ipsum.</p>







