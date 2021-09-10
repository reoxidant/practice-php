<?php

//На карманы при замене

//1. Дана строка 'aaa@bbb eee7@kkk'. Напишите регулярку, которая найдет строки по шаблону: любое количество букв и цифр, символ @, любое количество букв и цифр и поменяет местами то, что стоит до @ на то, что стоит после нее. Например, aaa@bbb должно превратиться в bbb@aaa.

//echo preg_replace('#([a-z0-9]+)@([a-z0-9]+)#', '$2@$1', 'aaa@bbb eee7@kkk');

//2.Дана строка вида 'a1b2c3'. Напишите регулярку, которая найдет все цифры и удвоит их количество таким образом: 'a11b22c33' (то есть рядом с каждой цифрой напишет такую же).

//echo preg_replace('#\d#', '$0$0', 'a1b2c3');

//На карманы в самой регулярке

//3. Дана строка 'aae xxz 33a'. Найдите все места, где есть два одинаковых идущих подряд символа и замените их на '!'.

//echo preg_replace('#([a-z\d])\1#','!','aae xxz 33a');

//4. Дана строка 'aaa bcd xxx efg'. Найдите строки, состоящие из одинаковых символов (это будет aaa xxx).

//echo preg_replace('#(a|x)+#', '!', 'aaa bcd xxx efg');

//Задачи на preg_match[_all]

//Задачи ниже не всегда можно решить с помощью одной только регулярки. Может понадобится еще что-нибудь дописать на PHP (не всегда, но такое может быть).

//5. С помощью preg_match определите, что переданная строка является емэйлом. Примеры емэйлов для тестирования mymail@mail.ru, my.mail@mail.ru, my-mail@mail.ru, my_mail@mail.ru, mail@mail.com, mail@mail.by, mail@yandex.ru.

/*$res = 'mymail@mail.ru';



echo "<pre>";
print_r($res);
echo "</pre>";*/

//6. Дана строка с текстом, в котором могут быть емейлы. С помощью preg_match_all найдите все емэйлы.

/*$res = 'mymail@mail.ru, my.mail@mail.ru, my-mail@mail.ru, my_mail@mail.ru, mail@mail.com, mail@mail.by, mail@yandex.ru';

preg_match_all('#[a-z0-9._-]+@[a-z._-]+\.[a-z]{2,}#', $res, $matches);

var_dump($matches);*/

//7.  С помощью preg_match определите, что переданная строка является доменом. Примеры доменов: site.ru, site.com, my-site123.com.

/*$res = 'site.ru, site.com, my-site123.com.';

preg_match_all('#[a-z0-9._-]+\.[a-z]{2,}#', $res,$matches);

var_dump($matches);*/

//8. С помощью preg_match определите, что переданная строка является доменом 3-го уровня. Примеры доменов: hello.site.ru, hello.site.com, hello.my-site.com.

/*$res = 'hello.site.ru, hello.site.com, hello.my-site.com';

preg_match_all('#[a-z-]+\.[a-z-]+\.[a-z]{2,}#', $res,$matches);

var_dump($matches);*/

//9. С помощью preg_match определите, что переданная строка является доменом, название которого начинается с http. Примеры доменов: http://site.ru, http://site.com.

/*$res = 'http://site.ru, http://site.com';

preg_match_all('#[a-z]{4,5}\:\/\/[a-z]+\.[a-z]{2,}#', $res, $matches);

var_dump($matches);*/

//10. С помощью preg_match определите, что переданная строка является доменом вида http://site.ru. Протокол может быть как http, так и https.

/*$res = 'http://site.ru';

preg_match('#^https?://[a-z]+\.[a-z]{2,}$#', $res, $matches);

var_dump($matches);*/

//11. С помощью preg_match определите, что переданная строка является доменом. Протокол может быть как http, так и https. Домен может быть со слешем в конце: http://site.ru, http://site.ru/, https://site.ru, https://site.ru/.

/*$res = 'http://site.ru, http://site.ru/, https://site.ru, https://site.ru/';

preg_match_all('#https?\:\/\/[a-z]+\.[a-z]{2,}\/?#',$res,$matches);

var_dump($matches);*/

//12. С помощью preg_match определите, что переданная строка начинается с http или с https.

//echo preg_match('#^https?#','https');

//13. С помощью preg_match определите, что переданная строка заканчивается расширением txt, html или php.

/*$res = ".php";

echo preg_match('#\.(txt|html|php)$#',$res);*/

//14. С помощью preg_match определите, что переданная строка заканчивается расширением jpg или jpeg.

//echo preg_match('#\.(jpg|jpeg)$#', '.jpeg');

//15.С помощью preg_match узнайте является ли строка числом, длиной до 12 цифр.

//echo preg_match('#^\d{1,12}$#', '12312');

//16.Дана строка с буквами, пробелами и цифрами. Найдите сумму всех чисел из данной строки.

/*$res = 'sdfds sdfsdf 123sdf213';

preg_match_all('#\d#', $res, $matches);

for($i = 0; $i <= count($matches[0]); $i++){
    $result += $matches[0][$i];
}

echo $result;*/

//Задачи на preg_replace

//17. С помощью preg_replace преобразуйте дату в формате '31-12-2014' в '2014.12.31'.

//echo preg_replace('#(\d{2})\-(\d{2})\-(\d{4})#', '$3.$2.$1','31-12-2014');

//18.С помощью preg_replace замените в строке домены вида http://site.ru, http://site.com на <a href="http://site.ru">site.ru</a>.

/*echo preg_replace('(^https?\:\/\/[a-z]{4}\.[a-z]{2}$)','<a href="$0">site.ru</a>','http://site.ru');*/