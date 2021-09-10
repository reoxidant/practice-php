<?php
session_start();

if (!empty($_SESSION['auth']) && $_SESSION['auth'] === true) {
    echo "<a href='cabinet.php'>Личный кабинет</a><br>";
    echo "<a href='logout.php'>Выйти</a>";
} else {
    echo "<a href='auth.php'>Авторизация</a>";
}
?>