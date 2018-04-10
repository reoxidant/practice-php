<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Регистрация пользователей PHP MySQL с активацией письмом</title>
</head>

<body>
    <ul>
        <li>
            <a href="<?php echo HOST; ?>tasksAuthAndReg/index.php?mode=auth">Войти</a>
        </li>
        <li>
            <a href="<?php echo HOST; ?>tasksAuthAndReg/index.php?mode=reg">Регистрация</a>
        </li>
    </ul>
    <?php 
        echo $content;
        if(isset($_REQUEST['del'])){
            echo "Ваш аккаунт успешно удален";
        }
    ?>
</body>
</html>