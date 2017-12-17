<?php 
	// Тема: Практика по написанию простых скриптов 

	// 1. По заходу на страницу выведите сколько дней осталось до нового года.

	/*$currentYear = date('Y');
	$newYear = mktime(0,0,0,1,1,$currentYear + 1);
	$currentTime = time();

	function dayToNewYear($newYear, $currentTime)
	{
		return floor(($newYear - $currentTime)/3600/24);
	}

	echo dayToNewYear($newYear, $currentTime);*/
?>

<!-- 2. Дан инпут и кнопка. В этот инпут вводится год. По нажатию на кнопку выведите на экран, високосный он или нет. -->

<!-- <form action="" method="GET">
	<p>
		Введите год: <br>
		<input type="text" name="year">
	</p>
	<input type="submit" name="submit">
</form>
<?php 
	if(isset($_REQUEST['submit']) and !empty($_REQUEST['year'])){
		$year = $_REQUEST['year'];
		if(($year % 400 == 0) and ($year % 4 == 0)){
			echo 'Этот год високосный.';
		} else {
			echo 'Этот год не високосный.';
		}
	}
?> -->

<!-- 3. Дан инпут и кнопка. В этот инпут вводится дата в формате '01.12.1990'. По нажатию на кнопку выведите на экран день недели, соответствующий этой дате, например, 'воскресенье'. -->

<!-- <form action="" method="GET">
	<p>
		Введите дату в формате 01.12.1990. <br>
		<input type="text" name="date">
	</p>
	<input type="submit" name="submit"> 
</form>

<?php 
	if(isset($_REQUEST['submit']) and !empty($_REQUEST['date'])){
		$date = $_REQUEST['date'];
		$arr = explode(".", $date);
		$week = date("w", mktime(0,0,0,$arr[1],$arr[0],$arr[2]));
		$arrWeek = [1=> 'пн',"вт","ср","чт","пт","сб","вск"];
		echo $arrWeek[$week];
	}
?>
 -->

 <!-- 4. По заходу на страницу выведите текущую дату в формате '12 мая 2015 года, воскресенье'. -->

 <!-- <?php 
 	$arrM = [1=> 'января', "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"];
 	$month = $arrM[date('m')];
 	$arrW = [1=> 'понедельник', "вторник", "среда", "четверг", "пятница", "суббота", "воскресенье"];
 	$week = $arrW[date('w')];
 	echo date("d ".$month." Y "."года, ".$week);
 ?> -->

 <!-- 5. Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '01.12.1990'. По нажатию на кнопку выведите на экран сколько дней осталось до дня рождения пользователя. -->

 <!-- <form action="" method="GET">
 	<p>
 		Введите дату рождения в формате 01.12.1990 <br>
 		<input type="text" name="date">
 	</p>
 	<input type="submit" name="submit">
 </form>
 
 <?php 
 	if(isset($_REQUEST['submit']) and !empty($_REQUEST['date'])){
 		$date = $_REQUEST['date'];
 		$arrDate = explode('.', $date);
 		$currentTime = time();
 		$currentYear = date('Y');
 		$happyBirthday = mktime(0,0,0,$arrDate[1],$arrDate[0],$currentYear);
 		$timeToHb = floor(($happyBirthday - $currentTime)/3600/24);
 		if($timeToHb < 0){
 			$happyBirthday = mktime(0,0,0,$arrDate[1],$arrDate[0],$currentYear + 1);
 			echo floor(($happyBirthday - $currentTime)/3600/24);
 		} else {
 			echo $timeToHb;
 		}		
 	}
 ?> -->

<!-- 6. По заходу на страницу выведите сколько дней осталось до ближайшей масленницы (последнее воскресенье весны). -->

<!-- <?php 
	$currentTime = time();
	$date = mktime(0,0,0,4,8,2018);
	echo floor(($date - $currentTime)/3600/24);
?> -->

<!-- 7. Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '31.12'. По нажатию на кнопку выведите знак зодиака пользователя. -->

<!-- <form action="" method="GET">
	<p>
		Введите дату рождения в формате 31.12 <br>
		<input type="text" name="date">
	</p>
	<input type="submit" name="submit">
</form>

<?php 
	if(isset($_REQUEST['submit']) and !empty($_REQUEST['date'])){
		$date = explode(".", $_REQUEST['date']);
		switch ($date[1]) {
			case 1:
				if($date[0] >= 21){
				echo "Водолей.";
				} else {
				echo "Козерог.";
				}
				break;
			case 2:
				if($date[0] >= 21){
				echo "Рыбы.";
				} else {
				echo "Водолей.";
				}
				break;
			case 3:
				if($date[0] >= 21){
				echo "Овен.";
				} else {
				echo "Рыбы.";
				}
				break;
			case 4:
				if($date[0] >= 21){
				echo "Телец.";
				} else {
				echo "Овен.";
				}
				break;
			case 5:
				if($date[0] >= 21){
				echo "Близнецы.";
				} else {
				echo "Телец.";
				}
				break;
			case 6:
				if($date[0] >= 22){
				echo "Рак.";
				} else {
				echo "Близнецы.";
				}
				break;
			case 7:
				if($date[0] >= 23){
				echo "Лев.";
				} else {
				echo "Рак.";
				}
				break;
			case 8:
				if($date[0] >= 24){
				echo "Дева.";
				} else {
				echo "Лев.";
				}
				break;
			case 9:
				if($date[0] >= 24){
				echo "Весы.";
				} else {
				echo "Дева.";
				}
				break;
			case 10:
				if($date[0] >= 24){
				echo "Скорпион.";
				} else {
				echo "Весы.";
				}
				break;
			case 11:
				if($date[0] >= 23){
				echo "Стрелец.";
				} else {
				echo "Скорпион.";
				}
				break;
			case 12:
				if($date[0] >= 22){
				echo "Козерог.";
				} else {
				echo "Стрелец.";
				}
				break;
			
			default:
				echo "неверный ввод!";
				break;
		}	
	}
?> -->

<!-- 8. Дан массив праздников. По заходу на страницу, если сегодня праздник, то поздравьте пользователя с этим праздником. -->
<!-- <?php 
	$arr = [1=>[1=>1, 2, 3, 4, 5, 6, 7, 8], 2=>[23=>23], 3=>[8=>8], 5=>[9=>9], 6=>[12=>12], 11=>[4=>4], 12=>[12=>12]];
	$month = date('m');
	$day = date('d');

	if(isset($arr[$month][$day])){
		echo "С праздником!";
	} else {
		echo "В этот день нет празников!";
	}
?> -->

<!-- 9. Сделайте скрипт-гороскоп. Внутри него хранится массив гороскопов на несколько дней вперед для каждого знака зодиака. По заходу на страницу спросите у пользователя дату рождения, определите его знак зодиака и выведите предсказание для этого знака зодиака на текущий день. -->
<!-- <form action="" method="GET">
	<p>
		Введите свой день рождение форматом 12.12.1990. <br>
		<input type="text" name="date" value="<?php echo (isset($_REQUEST['submit']))?$_REQUEST['date']:'';?>">
	</p>
	<p>
		Выберите на какой день вы желаете узнать ваш гороскоп. <br>
		<select name="day" id="">
			<option value="1">Сегодня</option>
			<option value="2">Завтра</option>
			<option value="3">Послезавтра</option>
		</select>
	</p>
	<input type="submit" name="submit">
</form>
<?php 
	if(isset($_REQUEST['submit']) and !empty($_REQUEST['date'])){
		$date = explode(".", $_REQUEST['date']);
		$numberOfZodiac = 0;
		switch ($date[1]) {
			case 1:
				if($date[0] >= 21){
				echo "Водолей."."<br>";
				$numberOfZodiac = 1;
				} else {
				echo "Козерог."."<br>";
				$numberOfZodiac = 12;
				}
				break;
			case 2:
				if($date[0] >= 21){
				echo "Рыбы."."<br>";
				$numberOfZodiac = 2;
				} else {
				echo "Водолей."."<br>";
				$numberOfZodiac = 1;
				}
				break;
			case 3:
				if($date[0] >= 21){
				echo "Овен."."<br>";
				$numberOfZodiac = 3;
				} else {
				echo "Рыбы."."<br>";
				$numberOfZodiac = 2;
				}
				break;
			case 4:
				if($date[0] >= 21){
				echo "Телец."."<br>";
				$numberOfZodiac = 4;
				} else {
				echo "Овен."."<br>";
				$numberOfZodiac = 3;
				}
				break;
			case 5:
				if($date[0] >= 21){
				echo "Близнецы."."<br>";
				$numberOfZodiac = 5;
				} else {
				echo "Телец."."<br>";
				$numberOfZodiac = 4;
				}
				break;
			case 6:
				if($date[0] >= 22){
				echo "Рак."."<br>";
				$numberOfZodiac = 6;
				} else {
				echo "Близнецы."."<br>";
				$numberOfZodiac = 5;
				}
				break;
			case 7:
				if($date[0] >= 23){
				echo "Лев."."<br>";
				$numberOfZodiac = 7;
				} else {
				echo "Рак."."<br>";
				$numberOfZodiac = 6;
				}
				break;
			case 8:
				if($date[0] >= 24){
				echo "Дева."."<br>";
				$numberOfZodiac = 8;
				} else {
				echo "Лев."."<br>";
				$numberOfZodiac = 7;
				}
				break;
			case 9:
				if($date[0] >= 24){
				echo "Весы."."<br>";
				$numberOfZodiac = 9;
				} else {
				echo "Дева."."<br>";
				$numberOfZodiac = 8;
				}
				break;
			case 10:
				if($date[0] >= 24){
				echo "Скорпион."."<br>";
				$numberOfZodiac = 10;
				} else {
				echo "Весы."."<br>";
				$numberOfZodiac = 9;
				}
				break;
			case 11:
				if($date[0] >= 23){
				echo "Стрелец."."<br>";
				$numberOfZodiac = 11;
				} else {
				echo "Скорпион."."<br>";
				$numberOfZodiac = 10;
				}
				break;
			case 12:
				if($date[0] >= 22){
				echo "Козерог."."<br>";
				$numberOfZodiac = 12;
				} else {
				echo "Стрелец."."<br>";
				$numberOfZodiac = 11;
				}
				break;
			
			default:
				echo "неверный ввод!";
				break;
		}	
	}

	$arr = 
		[
		1=>[1=>"Сегодня Шанс сделать что-то полезное может резко изменить планы Водолеев. День удачен для начинаний, связанных с лечением болезней, ремонтом, охраной, управлением, закрытыми мероприятиями, секретными материалами.", 2=>"Завтра Возможно разочарование в любви или в поставленной ранее цели. Если вы не готовы смириться с положением дел, звезды советуют вам не оставлять попыток до самого вечера.", 3=>"Если ранее, ставя перед собой цели, вы руководствовались только личными соображениями, то сейчас рекомендуется прислушаться к мнению тех, кому вы доверяете, чтобы заручиться их поддержкой и скорректировать дальнейшие шаги с учетом общих интересов."],
		2=>[1>='Сегодня Прекрасный момент для старта нового проекта. Не упустите шанс плавно перейти от слов к делу.', 2=>"Завтра События дня способствуют реализации ваших желаний, но все же не дают твердой гарантии их исполнения. Чтобы дела и отношения развивались по наилучшему сценарию, придётся приложить к этому собственные дополнительные усилия.", 3=>"Послезавтра Именно на этой неделе может произойти давно обещанное продвижение по служебной лестнице. Впрочем, есть вероятность и понижения в должности - все зависит от расположения звезд в вашей натальной карте."], 
		3=>[1>= "Сегодня Девиз этого дня для Овнов: через тернии к звездам. События могут принять критический оборот. Возможен конфликт с начальством, родителями, представителями официальных структур и государственных учреждений.", 2=> "Завтра Не самый подходящий момент для полного расслабления. Утром вам не помешает активный образ жизни: прогулка, решение неотложной задачи. Можно вложить избыток энергии в устранение каких-либо технических неполадок. ", 3=>"Послезавтра Приготовьтесь к тому, что в отношениях с партнерами, коллегами и начальством возможно напряжение - станет сложнее проводить инициативы. Не раздражайтесь - то, что не удастся сделать сейчас, вы с куда большим успехом реализуете позже."],
		4=>[1=>"Сегодня Смело идите вперёд и не сомневайтесь в собственных силах. То, что для других знаков может оказаться роковым препятствием, солнечным Тельцам сегодня только на руку.", 2=>"Завтра День будет гармоничным для Тельцов. Его можно использовать для стабилизации нервной системы и поднятия тонуса.", 3=>"Послезавтра Ваше отношение к деньгам в декабре должно быть пересмотрено. Вы станете более внимательно отслеживать доходы и расходы и поймете, куда же уходят деньги."],
		5=>[1=>"Сегодня Времени на колебания у Близнецов сегодня немного. Свою правоту вам будет необходимо доказать не словами, а поступками. В решении проблем будьте смелее, жестче и предприимчивее, бейте точно в цель.", 2=>"Завтра Не вдавайтесь в объяснения, не выясняйте отношений. Коммуникабельность, свойственная Близнецам, сегодня ничего не решает и может создать помехи для развития событий в нужном направлении. ", 3=>"Послезавтра В это время заключенные ранее договоренности придется пересмотреть, вероятно, перезаключить подписанные договоры на иных условиях (здесь будьте предельно внимательны, есть риск не заметить какие-то детали!)."],
		6=>[1=>"Сегодня Не претендуйте на абсолютную самостоятельность. Сегодня вам нужен сильный и жесткий партнёр. Скорее всего, он у вас уже есть. Ведите себя правильно, и тогда этот человек будет вашей лучшей защитой.", 2=>"Завтра Луна предупреждает о необходимости быть более внимательными и осторожными. Могут активизироваться тайные враги.", 3=>"Послезавтра Луна предупреждает о необходимости быть более внимательными и осторожными. Могут активизироваться тайные враги."],
		7=>[1=>"Настал день упорной работы. Вашим поведением может управлять чувство семейного долга или профессиональной ответственности, а также мотив обеспечения безопасности.", 2=>"Завтра Львам не стоит зацикливаться на личных проблемах. Даже если дела идут не лучшим образом, рядом наверняка есть люди, которым нужна ваша поддержка.", 3=>"С 13 по 16 декабря вероятно, появится необходимость вернуться к прежним идеям, чтобы доработать их и претворить в жизнь."],
		8=>[1=>"Сегодня Благодаря своему неизменному практицизму многие Девы сегодня не упустят случая сделать своё хобби полноценной профессией, а в личной жизни станут организаторами событий и инициаторами перемен.", 2=>"День благоприятен для технического творчества и занятий спортом. Он прибавляет вам физических сил и душевной энергии. Особого внимания требует любовная и сексуальная жизнь.", 3=>"Послезавтра В первую половину недели не давайте советов начальству. Оно станет преследовать свои, никому не известные цели, а потому любое вмешательство будет воспринимать в штыки."],
		9=>[1=>"Сегодня Главной задачей Весов сегодня становится выбор верного направления. Вам также понадобится умение напряжённо работать, не боясь трудностей и кризисных моментов.", 2=>"Сохранить внутреннюю и внешнюю гармонию сегодня непросто. Благие намерения могут быть мгновенно забыты, если вас что-то задело и разозлило.", 3=>"Отличное время для реализации инициатив. Дружеские планеты добавят энергии, простимулируют амбиции, увеличат способность сопротивляться неблагоприятным обстоятельствам - в первой половине недели у вас есть все, чтобы занять лидирующую роль среди коллег или партнеров."],
		10=>[1=>"Сегодня Судьба делает Скорпионам подарок в виде благоприятных условий для личной активности. Если вы искали применение своей энергии, не теряйте времени даром. Считая нужным проявить инициативу, делайте это не раздумывая.", 2=>"Для Скорпионов это позитивный день, их чувства и способ действий находятся в гармонии. Вплоть до вечера вероятны интенсивные контакты и совместные дела с близким окружением (родственниками, соседями).", 3=>"Послезавтра Посмотрите на то, во что собираетесь вкладывать средства и силы, и честно ответьте себе, действительно ли оно того стоит."],
		11=>[1=>"Роль философа и оригинала вам сегодня не слишком подходит. Обстоятельства требуют, чтобы вы проявили себя в качестве сильного организатора.", 2=>"Завтра Секрет правильного поведения Стрельцов сегодня заключается в практичности. Если вы знаете, для чего стараетесь, отдача от ваших усилий будет выше. Знайте себе цену и не завышайте ее.", 3=>"Послезавтра Это хороший период для выступления с инициативами и установления связей. Люди сейчас к вам будут прямо-таки тянуться!"],
		12=>[1=>"Сегодня Сила Козерога сегодня заключается в реалистичном взгляде на жизнь, а также в разумной предприимчивости и развитом чувстве ответственности.", 2=>"Завтра День обостренных желаний и неуправляемых действий. Энергии у вас достаточно, чтобы добиться невозможного, но старайтесь, чтобы ваши поступки не были разрушительными.", 3=>"Послезавтра Приготовьтесь к торможению в делах и повремените с инициативами и начинаниями. Используйте это время для систематизации документов, архивов, знаний, для встреч, которые должны остаться в тайне (например, для прохождения собеседований, если вы не хотите, чтобы начальник узнал о том, что вы ищете новую работу)."]
		];
		
		echo $arr[$numberOfZodiac][$_REQUEST['day']];
?> -->
<!-- 10. Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку выведите количество слов в тексте, количество символов в тексте, количество символов за вычетом пробелов.  -->
<!-- <form action="">
	<textarea name="text" id="" cols="30" rows="10"></textarea>
	<br>
	<input type="submit" name="submit">
</form>

<?php 
	if(isset($_REQUEST['submit']) and !empty($_REQUEST['text'])){
		$words = count(explode(" ",$_REQUEST['text']));
		echo "Колличество слов = ".$words."<br>";
		$symbols = strlen($_REQUEST['text']);
		echo "Колличество символов = ".$symbols."<br>";
		$symOut = strlen(implode('',explode(" ",$_REQUEST['text'])));
		echo "Колличество символов за вычетом пробелов = ".$symOut."<br>";
	}
?> -->

<!-- 11. Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку нужно посчитать процентное содержание каждого символа в тексте. -->
<!-- <form action="" method="GET">
	<textarea name="text" id="" cols="30" rows="10"></textarea>
	<br>
	<input type="submit" name="submit">
</form>

<?php 
	if(isset($_REQUEST['text'])){
		$symbols = strlen(implode('', explode(' ',$_REQUEST['text'])));
		echo "Один символ = ".(1*100)/$symbols."% текста.";
	}
 ?> -->

 <!-- 12.  Дан массив слов, инпут и кнопка. В инпут вводится набор букв. По нажатию на кнопку выведите на экран те слова, которые содержат в себе все введенные буквы. -->
<!-- <?php 
	$arr = ["abc", "def"];
?>

<form action="" method="GET">
	<p>	Введите любой текст: <br>
		<input type="text" name="text">
	</p>
	<input type="submit" name="submit">
</form>

<?php 
	if(isset($_REQUEST['submit']) and !empty($_REQUEST['text'])){
		$InputText = $_REQUEST['text'];
		$str = implode('', $arr);
		$res = '';
		for($i = 0; $i < strlen($str); $i++){
			for ($j=0; $j < strlen($InputText); $j++) { 
				if($str[$i] == $InputText[$j]){
					$res .= $str[$i];
				}
			}
		}

		echo $res;
	}
?> -->

<!-- 13. Дан текстареа и кнопка. В текстареа через пробел вводятся слова. По нажатию на кнопку выведите слова в таком виде: сначала заголовок 'слова на букву а' и под ним все слова, которые начинаются на 'а', потом заголовок 'слова на букву б' и все слова на 'б' и так далее. Буквы должны идти в алфавитном порядке. Брать следует только те буквы, на которые начинаются наши слова. То есть: если нет слов, к примеру, на букву 'в' - такого заголовка тоже не будет. -->
<!-- <form action="" method="GET">
	<textarea name="text" id="" cols="30" rows="10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum cupiditate, iure quos! Ducimus id corporis tempore consectetur blanditiis repellendus soluta adipisci, quam iste voluptatum, minus et hic, itaque cumque aut.</textarea> <br>
	<input type="submit" name="submit">
</form>

<?php
	if(isset($_REQUEST['submit']) and !empty($_REQUEST['text'])){

		$arr = explode(" ",$_REQUEST['text']);
		$words = ['a'=>[], 'b'=>[], 'c'=>[], 'd'=>[], 'e'=>[], 'f'=>[], "g"=>[], "h"=>[], "i"=>[], "j"=>[], "k"=>[], 'l'=>[], 'm'=>[], 'n'=>[], "o"=>[], "p"=>[], "q"=>[], "r"=>[], "s"=>[], "t"=>[], "u"=>[], "v"=>[], "w"=>[], "y"=>[], "x"=>[], "z"=>[]];
		$newArr = [];
		$i = 0;
		foreach ($words as $key => $elems) {
			for ($i=0; $i < count($arr); $i++) { 
				if($arr[$i][0] == $key){
					$words[$key][] = $arr[$i];
				}
			}
		}

		foreach($words as $key => $val){
			if(!empty($words[$key])){
				echo "Слова на букву ".$key."<br>";
				for ($i=0; $i < count($words[$key]) ; $i++) { 
					echo $words[$key][$i]."<br>";
				}
			}
		}
	}
?> -->

<!-- 14. Дан инпут и кнопка. В этот инпут вводится строка на русском языке. По нажатию на кнопку выведите на экран транслит этой строки. -->
<!-- <form action="" method="GET">
	<p>
		Введите строку на русском языке: <br>
		<input type="text" name="text"> 
	</p>
	<input type="submit" name="submit">
</form>

<?php 
	if(isset($_REQUEST['submit']) and !empty($_REQUEST['text'])){
		translit($_REQUEST['text']);
	}
	
	function translit($str){
		$str = (string) $str;
		$str = strtr($str, $arr= ['а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>'']);
		echo $str;
	}
?> -->

<!-- 15. Дан инпут, 2 радиокнопочки и кнопка. В инпут вводится строка, а с помощью радиокнопочек выбирается - нужно преобразовать эту строку в транслит или из транслита обратно. -->
<!-- <form action="" method="GET">
	<p>
		Введите текст на русском языке: <br>
		<input type="text" name="text" value="<?php echo (isset($_REQUEST['submit']))?$_REQUEST['text']:'';?>"> </p>
	<p>
		<input id="ru" type="radio" name="lang" value="1" checked><label for="ru">Текст в транслит</label><br>
		<input id="en" type="radio" name="lang" value="2"><label for="en">Из траслита в текст</label><br>
	</p>
	<input type="submit" name="submit">
</form>

<?php 
	if(isset($_REQUEST['submit']) and !empty($_REQUEST['text'])){
		if($_REQUEST['lang'] == 1){
			translite($_REQUEST['text']);
		} else if($_REQUEST['lang'] == 2){
			echo $_REQUEST['text'];
		}
	}

	function translite($str){
		$str = (string) $str;
		$str = mb_strtolower($str);
		$str = strtr($str, $arr= ['а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>'']);
		echo $str;
	}
?> -->

<!-- 16.  Дан массив с вопросами и правильными ответами. Реализуйте тест: выведите на экран все вопросы, под каждым инпут. Пользователь читает вопрос, пишет свой ответ в инпут. Когда вопросы заканчиваются - он жмет на кнопку, страница обновляется и вместо инпутов под вопросами появляется сообщение вида: 'ваш ответ: ... верно!' или 'ваш ответ: ... неверно! Правильный ответ: ...'. Правильно отвеченные вопросы должны гореть зеленым цветом, а неправильно - красным. -->
<!-- <?php
	$arr = ["Какой перевод слова 'wardrobe' на русском языке?"=>'шкаф', "Какой перевод слова 'carpet' на русском языке?"=>"ковер", "Какой перевод слова 'lavatory' на русском языке?"=>"туалет"];
	$i = 0;
?>

<form action="" method="GET">
	<p>
		<?php
			if(empty($_REQUEST['text1'])){
				echo array_keys($arr)[0]."<br>";
				echo "<input type='text' name='text1'>";
			} else {
				check(array_values($arr)[0], $_REQUEST['text1'], array_keys($arr)[0]);
			}
		?> 
	</p>
	<p>
		<?php 
			if(empty($_REQUEST['text2'])){
				echo array_keys($arr)[1]."<br>";
				echo "<input type='text' name='text2'>";
			} else {
				check(array_values($arr)[1], $_REQUEST['text2'],  array_keys($arr)[1]);
			}
		?>
	</p>
	<p>
		<?php 
			
			if(empty($_REQUEST['text3'])){
				echo array_keys($arr)[2]."<br>";
				echo "<input type='text' name='text3'>";
			} else {
				check(array_values($arr)[2], $_REQUEST['text3'], array_keys($arr)[2]);
			}
		?>
	</p>
	<input type="submit">
</form>

<?php 
	function check($arr, $name, $keys)
	{	
		if($name == $arr){
			echo "<span style='background-color:green'>".$keys."</span><br>";
			echo "Ваш ответ - ".$name." верный!";
			
		} else {
			echo "<span style='background-color:red'>".$keys."</span><br>";
			echo "Ваш ответ - ".$name." неверный!"." Правильный ответ - ".$arr;
		}
		
	}
?>
 -->

<!--  17. Модифицируем предыдущую задачу: пусть теперь тест показывает варианты ответов и радиокнопочки. Пользователь должен выбрать один и вариантов -->

<!-- <?php
	$arr = ["Какой перевод слова 'wardrobe' на русском языке?"=>'шкаф', "Какой перевод слова 'carpet' на русском языке?"=>"ковер", "Какой перевод слова 'lavatory' на русском языке?"=>"туалет"];
	$i = 0;
?>

<form action="" method="GET">
	<p>
		<?php
			if(empty($_REQUEST['option1'])){
				echo array_keys($arr)[0]."<br>";
				$option1 = "стул";
				$option2 = "шкаф";
				echo 
				"<label for='1'><input type='radio' id='1' value='".$option1."' name='option1'>".$option1."</label>"."<br>", 
				"<label for='2'><input type='radio' id='2' value='".$option2."' name='option1'>".$option2."</label>";
			} else {
				checkFunc(array_values($arr)[0], $_REQUEST['option1'], array_keys($arr)[0]);
			}
		?> 
	</p>
	<p>
		<?php 
			if(empty($_REQUEST['option2'])){
				echo array_keys($arr)[1]."<br>";
				$option3 = "ковер";
				$option4 = "самолет";
				echo 
				"<label for='3'><input type='radio' id='3' value='".$option3."' name='option2'>".$option3."</label>"."<br>", 
				"<label for='4'><input type='radio' id='4' value='".$option4."' name='option2'>".$option4."</label>";
			} else {
				checkFunc(array_values($arr)[1], $_REQUEST['option2'],  array_keys($arr)[1]);
			}
		?>
	</p>
	<p>
		<?php 
			
			if(empty($_REQUEST['option3'])){
				echo array_keys($arr)[2]."<br>";
				$option5 = "ванна";
				$option6 = "туалет";
				echo 
				"<label for='5'><input type='radio' id='5' value='".$option5."' name='option3'>".$option5."</label>"."<br>",
				"<label for='6'><input type='radio' id='6' value='".$option6."' name='option3'>".$option6."</label>";
			} else {
				checkFunc(array_values($arr)[2], $_REQUEST['option3'], array_keys($arr)[2]);
			}
		?>
	</p>
	<input type="submit">
</form>

<?php 
	function checkFunc($arr, $name, $keys)
	{	
		if($name == $arr){
			echo "<span style='background-color:green'>".$keys."</span><br>";
			echo "Ваш ответ - ".$name." верный!";
			
		} else {
			echo "<span style='background-color:red'>".$keys."</span><br>";
			echo "Ваш ответ - ".$name." неверный!"." Правильный ответ - ".$arr;
		}
		
	}
?> -->

<!-- 18. Модифицируем предыдущую задачу: пусть теперь на один вопрос может быть несколько правильных ответов. Пользователь должен отметить один или несколько чекбоксов. -->

<!-- <?php
	$arr = ["Какой перевод слова 'wardrobe' на русском языке?"=>'шкаф', "Какой перевод слова 'carpet' на русском языке?"=>"ковер", "Какой перевод слова 'lavatory' на русском языке?"=>"туалет"];
	$arr2 = ['гардероб', "дорожка", "уборная"];

	$option1 = "стул";
	$option2 = "шкаф";
	$option3 = "гардероб";
	$option4 = "ковер";
	$option5 = "самолет";
	$option6 = "дорожка";
	$option7 = "ванна";
	$option8 = "туалет";
	$option9 = "уборная";

?>

<form action="" method="GET">
	<p>
		<?php
			if(empty($_REQUEST['formOptions1'])){
				echo array_keys($arr)[0]."<br>";
				echo 
				"<label><input type='checkbox' value='".$option1."' name='formOptions1[]'>".$option1."</label>",
				"<label><input type='checkbox' value='".$option2."' name='formOptions1[]'>".$option2."</label>",
				"<label><input type='checkbox' value='".$option3."' name='formOptions1[]'>".$option3."</label>";
			} else {
				checkCheckbox(array_values($arr)[0], array_values($arr2)[0], $_REQUEST['formOptions1'], array_keys($arr)[0]);
			}
		?> 
	</p>
	<p>
		<?php 
			if(empty($_REQUEST['formOptions2'])){
				echo array_keys($arr)[1]."<br>";
				echo 
				"<label><input type='checkbox' value='".$option4."' name='formOptions2[]'>".$option4."</label>",
				"<label><input type='checkbox' value='".$option5."' name='formOptions2[]'>".$option5."</label>",
				"<label><input type='checkbox' value='".$option6."' name='formOptions2[]'>".$option6."</label>";
			} else {
				checkCheckbox(array_values($arr)[1], array_values($arr2)[1], $_REQUEST['formOptions2'], array_keys($arr)[1]);
			}
		?>
	</p>
	<p>
		<?php 
			if(empty($_REQUEST['formOptions3'])){
				echo array_keys($arr)[2]."<br>";
				echo 
				"<label><input type='checkbox' value='".$option7."' name='formOptions3[]'>".$option7."</label>",
				"<label><input type='checkbox' value='".$option8."' name='formOptions3[]'>".$option8."</label>",
				"<label><input type='checkbox' value='".$option9."' name='formOptions3[]'>".$option9."</label>";
			} else {
				checkCheckbox(array_values($arr)[2], array_values($arr2)[2], $_REQUEST['formOptions3'], array_keys($arr)[2]);
			}
		?>
	</p>
	<input type="submit">
</form>

<?php 
	function checkCheckbox($arr,$arr2, $name, $keys)
	{	
		$result = implode(', ', $name);
		for ($i=0; $i < count($name); $i++) { 
			if($arr == $name[$i] || $arr2 == $name[$i]){
				echo "<span style='background-color:green'>".$keys."</span><br>";
				echo "Ваш ответ - ".$result." верный!";
				break;
			} else {
				echo "<span style='background-color:red'>".$keys."</span><br>";
				echo "Ваш ответ - ".$result." неверный!"." Правильный ответ - ".$arr." или ".$arr2;
				break;
			}
		}
	}
?> -->






