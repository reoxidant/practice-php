<?php
//Тема: Задачи на cookie(куки) в PHP
//Тема: Работа со cookie

//2. Удалите куку с именем country.
setcookie('country', '', time(), "/");

/*3. Установите куку с именем age. Запишите туда случайное число от 10 до 70 (с помощью mt_rand).
Сделайте так, чтобы эта кука установилась на 1 час, на 3 часа, на 1 день, на год, на 10 лет,
до конца текущего дня, до конца текущего года.*/
setcookie('age', mt_rand(10, 70), time() + 3600, "/");
setcookie('age', mt_rand(10, 70), time() + 3600 * 3, "/");
setcookie('age', mt_rand(10, 70), time() + 3600 * 24, "/");
setcookie('age', mt_rand(10, 70), time() + 3600 * 24 * 365, "/");
setcookie('age', mt_rand(10, 70), time() + 3600 * 24 * 365 * 10, "/");
setcookie('age', mt_rand(10, 70), strtotime('now 24:00:00') - time(), "/");
setcookie('age', mt_rand(10, 70), strtotime(date('Y-12-31')) - time(), "/");
?>

<!-- 4. Напишите оболочку над cookie. Оболочка должна представлять собой набор функций: сохранение куки,
удаление куки, редактирование куки. -->

<?php
function editCookie($str, $getValue, $time)
{
    if (!empty($_COOKIE[$str])) {
        setcookie($str, $getValue, $time, "/");
    } else {
        echo 'error';
    }
}

function delCookie($str)
{
    setcookie('$str', '', time(), "/");
}

function saveCookie($str, $getValue)
{
    setcookie($str, $getValue, "/");
}

?>

<!-- 1. Сделайте две страницы: index.php и test.php.
При заходе на index.php спросите с помощью формы страну пользователя, запишите ее в куки с именем country.
При заходе на test.php выведите страну пользователя. -->

<form action="test.php" method="GET">
    <p>Напишите вашу страну<br>
        <label>
            <input type="text" name="country">
        </label>
    </p>
    <input type="submit" name="submit">
</form>

