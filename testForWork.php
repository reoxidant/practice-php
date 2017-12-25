<!-- 4. PHP
Создать страницу и вывести на ней форму поиска и текст по которому будет
производиться поиск. При вводе слова в форму поиска необходимо найти и
подсветить все упоминания этого слова в тексте. В случае если указывается
несколько слов, каждое должно искаться индивидуально. Если словосочетание
указывается в двойных кавычках, то оно ищется как единое вхождение.
Пример работы такого поиска можно увидеть на приложенном макете. В качестве
возможного варианта функции для поиска и замены текста можно использовать
preg_replace. -->
<form action="" method="GET">
	<h1>Найдите строку в тексте</h1>
	<p>
		Ключевая строка:
		<input type="text" name="userText">
	</p>
	<input type="submit" value="поиск" name="submit">
	<hr>
	<p><?php $text= "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur distinctio tenetur perspiciatis harum corporis eaque obcaecati neque ex animi, praesentium maxime rerum, modi unde consequatur dolorum placeat omnis fugit amet.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus commodi beatae in placeat rerum quis tenetur, inventore doloremque voluptatum. Perferendis exercitationem illum quae quisquam, officia, necessitatibus veritatis modi nemo quia!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores voluptas molestiae magni voluptatibus architecto non qui nostrum eligendi eaque asperiores quis praesentium dolores, ipsam perspiciatis rem cumque, accusamus reiciendis ipsa.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores ullam consequatur, modi explicabo nulla incidunt commodi minus, magni. Minima quas, eum sapiente. Tempore sed qui nisi nulla possimus dolorem reiciendis.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque voluptates suscipit voluptatibus dolores eos, cupiditate doloremque accusamus nulla voluptas labore corrupti ducimus. Similique assumenda deleniti blanditiis molestias, omnis aspernatur suscipit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum fuga, molestias minima, ipsam quasi obcaecati delectus ipsa enim illum, sint, voluptatem error harum! Tempora aperiam quae, non id consectetur aliquam!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste distinctio vitae soluta, ex et aliquam corporis quasi, a. Fugit deleniti quos, mollitia aspernatur voluptas tempora cumque consectetur vitae aliquam aperiam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dolorem harum ut odit soluta quae? Quisquam asperiores officiis, ducimus. Odit minima facilis earum ad perspiciatis error, aperiam quisquam odio soluta.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste doloremque earum tempora quos et nisi quo dicta soluta expedita vel sequi nulla, inventore temporibus architecto saepe minima voluptatem cum accusamus";
	echo $text;?>
		
	</p>
</form>
<?php
	if(isset($_REQUEST['submit']) and !empty($_REQUEST['userText'])){
		$str_find = $_REQUEST['userText'];
		echo preg_replace('/{$str_find}/im',"ХУЙ", $text);
	}
?>
