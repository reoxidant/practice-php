<?php
/*6. Сделайте счетчик посещения сайта посетителем. Каждый раз, заходя на сайт, он должен видеть надпись:
'Вы посетили наш сайт % раз!'.*/
$counter = (isset($_COOKIE['counter'])) ? $_COOKIE['counter'] : 0;
$counter++;
setcookie('counter', $counter);
echo "Вы посетили наш сайт " . $counter . " раз!";
?>