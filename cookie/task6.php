<?php

	$counter = (isset($_COOKIE['counter'])) ? $_COOKIE['counter'] : 0;
	$counter++;
	setcookie('counter', $counter);
	echo "Вы посетили наш сайт ".$counter." раз!";

?>