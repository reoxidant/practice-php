<?php 
    if(!defined('KEY')){
        header("HTTP/1.1 404 Not Found");
        exit(file_get_contents('../../404.html'));
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<style>
    .red{
        border: 2px solid red;
    }
</style>
<body>
    <div style="display: table; margin: 0 auto;">
        <div style="display: table-row;">
            <div style="display: table-cell;">
                <header style="margin: 0 auto; width: 190px;">
                    <h1>Регистрация</h1>
                </header>
                <form action="" method="POST">
                    <fieldset>
                        <legend>Основные данные:</legend>
                        <p>
                            Логин*
                            <br>
                            <?php
                               if(isset($_REQUEST['login']) and empty($_REQUEST['login']) || checkLenght($_REQUEST['login'], 4, 12) == false){
                                echo "<span style='color:blue;'>Ошибка</span><br>";
                            ?>
                               <input type="text" class="red" name="login" value="<?php echo isset($_REQUEST['login'])? $_REQUEST['login']:''; ?>"> 
                               
                            <?php 
                                    echo "<br>логин должен быть<br> от 4 до 12 символов";
                                } else {
                            ?>
                                <input type="text" class="" name="login" value="<?php echo isset($_REQUEST['login'])? $_REQUEST['login']:''; ?>">
                            <?php
                                }
                            ?>
                        </p>
                        <p>
                            Пароль*
                            <br>
                            <?php
                               if(isset($_REQUEST['password']) and empty($_REQUEST['password']) || checkLenght($_REQUEST['password'], 6, 10) == false){
                                echo "<span style='color:blue;'>Ошибка</span><br>";
                            ?>
                               <input type="password" class="red" name="password" value="<?php echo isset($_REQUEST['password'])? $_REQUEST['password']:''; ?>"> 
                               
                            <?php 
                                    echo "<br>логин должен быть<br> от 6 до 10 символов";
                                } else {
                            ?>
                                <input type="password" class="" name="password" value="<?php echo isset($_REQUEST['password'])? $_REQUEST['password']:''; ?>">
                            <?php
                                }
                            ?>
                        </p>
                        <p>
                            Подтвердите пароль*
                            <br>
                            <?php
                               if(isset($_REQUEST['password_confirm']) and empty($_REQUEST['password_confirm']) || checkLenght($_REQUEST['password_confirm'], 6, 10) == false){
                                echo "<span style='color:blue;'>Ошибка</span><br>";
                            ?>
                               <input type="password" class="red" name="password_confirm" value="<?php echo isset($_REQUEST['password_confirm'])? $_REQUEST['password_confirm']:''; ?>"> 
                               
                            <?php 
                                    echo "<br>логин должен быть<br> от 6 до 10 символов";
                                } else {
                            ?>
                                <input type="password" class="" name="password_confirm" value="<?php echo isset($_REQUEST['password_confirm'])? $_REQUEST['password_confirm']:''; ?>">
                            <?php
                                }
                            ?>
                        </p>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend>Дополнительные данные:</legend>
                        <p>
                            Имя*
                            <br>
                            <input type="text" name="name" value="<?php echo isset($_REQUEST['name'])? $_REQUEST['name']:''; ?>">
                        </p>
                        <p>
                            Фамилия
                            <br>
                            <input type="text" name="surname" value="<?php echo isset($_REQUEST['surname'])? $_REQUEST['surname']:''; ?>">
                        </p>
                        <p>
                            Возраст*
                            <br>
                            <input type="text" name="age" value="<?php echo isset($_REQUEST['age'])? $_REQUEST['age']:''; ?>">
                        </p>
                        <p>
                            e-mail*
                            <br>
                            <input type="text" name="email" value="<?php
                                echo isset($_REQUEST['email'])? $_REQUEST['email']:''; ?>">
                        </p>
                        <p>
                            Город
                            <br>
                            <input type="text" name="city" value="<?php
                            echo isset($_REQUEST['city'])? $_REQUEST['city']:''; ?>">
                        </p>
                        <p>
                            Ваш родной язык*
                            <br>
                            <select name="lang" id="" style="width: 172px;">
                                <option value="ru" <?php echo $_REQUEST['lang'] == 'ru' ? 'selected="select"' : ''; ?>>Russian</option>
                                <option value="eng" <?php echo $_REQUEST['lang'] == 'eng' ? 'selected="select"': ''; ?>>English</option>
                                <option value="uk" <?php echo $_REQUEST['lang'] == 'uk' ? 'selected="select"': ''; ?>>Ukraine</option>
                            </select>
                        </p>
                        <p>
                            <input type="submit" value="Зарегистрироваться" name="submit">
                        </p>
                    </fieldset>
                </form>
                <?php include('scripts/reg/reg_engine.php'); ?>
            </div>
            <div style="display: table-cell; vertical-align: top; padding-left: 15px;">
                    <header>
                        <h2>Генератор пароля</h2>
                    </header>
                <form action="" method="POST">
                    <p>
                        Длина пароля:
                        <?php 
                            echo "<select name='length_pass' id='' style='width:50px';>";
                            for ($i=6; $i < 10; $i++) { 
                                if($i == $_REQUEST['length_pass']){
                                    echo "<option value='$i' selected='select'>$i</option>";
                                }else{
                                    echo "<option value='$i'>$i</option>";
                                }
                            }
                            echo "</select>";
                        ?>
                    </p>
                    <input type="submit" name="submit" value="Сгенерировать">
                    <p>
                        Ваш пароль:
                        <br>
                        <input type="text" value="<?php

                                if(isset($_REQUEST['length_pass'])){
                                    echo getPass($_REQUEST['length_pass']);
                                }else{
                                    echo '';
                                }
                            ?>
                        ">
                    </p>
                </form>
            </div>
        </div>
    </div>   
</body>
</html>