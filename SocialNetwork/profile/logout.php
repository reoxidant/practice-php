<?php
const KEY = true;
include('../config.php');
include('../bd/bd.php');

session_start();

$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$login = isset($_SESSION['login']) ? $_SESSION['login'] : $_COOKIE['login'];

$result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") || die (mysqli_error($link));

$user = mysqli_fetch_assoc($result);

if (isset($_COOKIE['login']) || isset($_SESSION['id'])) {
    session_destroy();
    setcookie('login', '', time() - 3600, '/');
    setcookie('key', '', time() - 3600, '/');
}

if (isset($_REQUEST['del'])) {
    header('Location:' . HOST . 'tasksAuthAndReg/index.php?del');
} else {
    header('Location:' . HOST . 'tasksAuthAndReg/index.php');
}

?>