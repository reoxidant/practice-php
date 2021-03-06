<?php 
// Тема: Задачи на регулярные выражения PHP. Часть 2
// Тема: Задачи на {}

// 1. Дана строка 'aa aba abba abbba abbbba abbbbba'. Напишите регулярку, которая найдет строки abba, abbba, abbbba и только их. 

// echo preg_replace("#ab{2,4}a#", '!', 'aa aba abba abbba abbbba abbbbba');

// 2. Дана строка 'aa aba abba abbba abbbba abbbbba'. Напишите регулярку, которая найдет строки вида aba, в которых 'b' встречается менее 3-х раз (включительно).

// echo preg_replace('#ab{0,3}a#', '!', 'aa aba abba abbba abbbba abbbbba');

// 3. Дана строка 'aa aba abba abbba abbbba abbbbba'. Напишите регулярку, которая найдет строки вида aba, в которых 'b' встречается более 4-х раз (включительно). 

// echo preg_replace('#ab{4,}a#', '!', 'aa aba abba abbba abbbba abbbbba');

// Тема: Задачи на \s, \S, \w, \W, \d, \D

// 4. Дана строка 'a1a a2a a3a a4a a5a aba aca'. Напишите регулярку, которая найдет строки, в которых по краям стоят буквы 'a', а между ними одна цифра.

// echo preg_replace('#a\da#', '!', 'a1a a2a a3a a4a a5a aba aca');

// 5. Дана строка 'a1a a22a a333a a4444a a55555a aba aca'. Напишите регулярку, которая найдет строки, в которых по краям стоят буквы 'a', а между ними любое количество цифр. 

// echo preg_replace('#a\d+a#', '!', 'a1a a22a a333a a4444a a55555a aba aca');

// 6. Дана строка 'aa a1a a22a a333a a4444a a55555a aba aca'. Напишите регулярку, которая найдет строки, в которых по краям стоят буквы 'a', а между ними любое количество цифр (в том числе и ноль цифр, то есть строка 'aa'). 

// echo preg_replace('#a\d*a#', '!', 'aa a1a a22a a333a a4444a a55555a aba aca');

// 7. Дана строка 'avb a1b a2b a3b a4b a5b abb acb'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы 'a' и 'b', а между ними - не число.

// echo preg_replace('#a\Db#', '!', 'avb a1b a2b a3b a4b a5b abb acb');

// 8. Дана строка 'ave a#b a2b a$b a4b a5b a-b acb'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы 'a' и 'b', а между ними - не буква и не цифра.

// echo preg_replace('#a\Wb#', '!', 'ave a#b a2b a$b a4b a5b a-b acb');

// 9. Дана строка 'ave a#a a2a a$a a4a a5a a-a aca'. Напишите регулярку, которая заменит все пробелы на '!'.

// echo preg_replace('#\s#','!','ave a#a a2a a$a a4a a5a a-a aca');

// Тема: Задачи на [], '^', - не, [a-zA-z], кириллицу

// 10.  Дана строка 'aba aea aca aza axa'. Напишите регулярку, которая найдет строки aba, aea, axa, не затронув остальных.

// echo preg_replace('#a[bex]a#', '!', 'aba aea aca aza axa');

// 11. Дана строка 'aba aea aca aza axa a.a a+a a*a'. Напишите регулярку, которая найдет строки aba, a.a, a+a, a*a, не затронув остальных.

// echo preg_replace('#a[b.+*]a#', "!", 'aba aea aca aza axa a.a a+a a*a');

// 12. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы 'a', а между ними - цифра от 3-х до 7-ми.

// echo preg_replace('#a[3-7]a#', '!', "a2a a6a a1a aa a7a a3a");

// 13. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы 'a', а между ними - буква от a до g.

// echo preg_replace('#a[a-g]a#', '!', 'asa ada ava');

// 14. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы 'a', а между ними - буква от a до f и от j до z.

// echo preg_replace('#a[a-fj-z]a#', '!', 'afa asa awa aqa aza');

// 15. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы 'a', а между ними - буква от a до f и от A до Z.

// echo preg_replace('#a[a-fA-Z]a#', '!', 'aba avva aAa');

// 16. Дана строка 'aba aea aca aza axa a-a a#a'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы 'a', а между ними - не 'e' и не 'x'.

// echo preg_replace('#a[^ex]a#', '!', 'aba aea aca aza axa a-a a#a', 1);

// 17. Дана строка 'wйw wяw wёw wqw'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы 'w', а между ними - буква кириллицы.

// echo preg_replace('#w[а-яА-ЯёЁ]w#u', '!', 'wйw wяw wёw wqw');

// Тема: Задачи на [a-zA-Z] и квантификаторы

// 18. Дана строка 'aAXa aeffa aGha aza ax23a a3sSa'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы 'a', а между ними - маленькие латинские буквы, не затронув остальных.

// echo preg_replace('#a[a-z]+a#', '!', 'aAXa aeffa aGha aza ax23a a3sSa');

// 19.  Дана строка 'aAXa aeffa aGha aza ax23a a3sSa'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы 'a', а между ними - маленькие и большие латинские буквы, не затронув остальных.

// echo preg_replace('#a[a-zA-Z]+a#', '!', 'aAXa aeffa aGha aza ax23a a3sSa');

// 20. Дана строка 'aAXa aeffa aGha aza ax23a a3sSa'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы 'a', а между ними - маленькие латинские буквы и цифры, не затронув остальных.

// echo preg_replace('#a[a-z\d]+a#', '!', 'aAXa aeffa aGha aza ax23a a3sSa');

// 21. Дана строка 'ааа ббб ёёё ззз ййй ААА БББ ЁЁЁ ЗЗЗ ЙЙЙ'. Напишите регулярку, которая найдет все слова по шаблону: любая кириллическая буква любое количество раз. 

// echo preg_replace('#[а-яА-ЯЁё+]#', '!', 'ааа ббб ёёё ззз ййй ААА БББ ЁЁЁ ЗЗЗ ЙЙЙ');

// Тема: Задачи на '^', '$'

// 22. Дана строка 'aaa aaa aaa'. Напишите регулярку, которая заменит первое 'aaa' на '!'.

// echo preg_replace('#^aaa#', '!', 'aaa aaa aaa');

// 23. Дана строка 'aaa aaa aaa'. Напишите регулярку, которая заменит последнее 'aaa' на '!'.

// echo preg_replace('#aaa$#', '!', 'aaa aaa aaa');

// Тема: Задачи на "|"

// 24. Дана строка 'aeeea aeea aea axa axxa axxxa'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы 'a', а между ними - или буква 'e' любое количество раз или по краям стоят буквы 'a', а между ними - буква 'x' любое количество раз.

// echo preg_replace('#a(e+|x+)a#', '!', 'aeeea aeea aea axa axxa axxxa');

// 25.  Дана строка 'aeeea aeea aea axa axxa axxxa'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы 'a', а между ними - или буква 'e' два раза или буква 'x' любое количество раз.

// echo preg_replace('#a(ee|x+)a#', '!', 'aeeea aeea aea axa axxa axxxa');

// Тема: Задачи на \b, \B

// 26. Дана строка 'xbx aca aea abba adca abea'. Напишите регулярку, которая вокруг каждого слова вставит '!' (получится '!xbx! !aca! !aea! !abba! !adca! !abea!').

// echo preg_replace('#\b#', '!', 'xbx aca aea abba adca abea');

// Тема: Задачи на обратный слещ \

// 27. Дана строка 'a\a abc'. Напишите регулярку, которая заменит строку 'a\a' на '!'.

// echo preg_replace('#a\\\\a#', '!', 'a\a abc');

// 28. Дана строка 'a\a a\\a a\\\a'. Напишите регулярку, которая заменит строку 'a\\\a' на '!'.

// echo preg_replace('#a\\\\{3}a#', '!', 'a\a a\\\\a a\\\\\\a');

// Тема: Задачи на экранировку посложнее

// 29. Дана строка 'bbb /aaa\ bbb /ccc\'. Напишите регулярку, которая найдет содержимое всех конструкций /...\ и заменит их на '!'.

// echo preg_replace('#/[a-z]+\\\\#', '!', 'bbb /aaa\ bbb /ccc\\');

// 30. Дана строка	'bbb <b> hello </b>, <b> world </b> eee'. Напишите регулярку, которая найдет содержимое тегов <b> и заменит их на '!'.

// echo preg_replace('#<b>(.+?)</b>#', '!', 'bbb <b> hello </b>, <b> world </b> eee');
?>

