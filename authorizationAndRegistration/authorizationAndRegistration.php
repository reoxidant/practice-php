<!-- 1. Сделайте регистрацию пользователя, которая запрашивает от него следующие поля: имя, фамилия, возраст, email, город, язык. Все задачи ниже относятся к данной регистрации, если не сказано иное.

2. Реализуйте проверку логина на незанятость.

3. Пусть при регистрации скрипт сохраняет дату регистрации (пользователь не вводит эти данные, дата определяется сама скриптом PHP).

4. Сделайте скрипт-генератор паролей. Пароль должен быть минимум 6 символов. Интегрируйте этот скрипт в нашу регистрацию - пусть пользователю будет предложено сгенерировать пароль.

5. Сделайте так, чтобы пользователь не сам вводил язык, а мог выбрать его из выпадающего списка. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>reg1</title>
</head>

<body>
    <div style="display: block; width: 640px; height: 670px;">
        <form action="" method="POST" style="width: 220px; display:inline-block;  float:left;">
            <fieldset>
                <legend>Основные данные:</legend>
                <p>
                    *Логин*:
                    <br>
                    <input type="text" name="login" value="<?php echo isset($_POST['login'])? $_POST['login']:''; ?>">
                </p>
                <p>
                    *Пароль*:
                    <br>
                    <input type="password" name="password" value="<?php echo isset($_POST['password'])? $_POST['password']:''; ?>">
                </p>
                <p>
                    *Подтвердите пароль*:
                    <br>
                    <input type="password" name="password_confirm" value="<?php echo isset($_POST['password_confirm'])? $_POST['password_confirm']:''; ?>">
                </p>
            </fieldset>
            <br>
            <fieldset>
                <legend>Дополнительные данные:</legend>
                <p>
                    *Имя*:
                    <br>
                    <input type="text" name="name" value="<?php echo isset($_POST['name'])? $_POST['name']:''; ?>">
                </p>
                <p>
                    Фамилия:
                    <br>
                    <input type="text" name="surname" value="<?php echo isset($_POST['surname'])? $_POST['surname']:''; ?>">
                </p>
                <p>
                    *Возраст*:
                    <br>
                    <input type="text" name="age" value="<?php echo isset($_POST['age'])? $_POST['age']:''; ?>">
                </p>
                <p>
                    *Email*:
                    <br>
                    <input type="email" name="email" value="<?php echo isset($_POST['email'])? $_POST['email']:''; ?>">
                </p>
                <p>
                    Город:
                    <br>
                    <input type="text" name="city" value="<?php echo isset($_POST['city'])? $_POST['city']:''; ?>">
                </p>
                <p>
                    *Ваш родной язык*:
                    <br>
                    <select name="lang" id="">
                        <option value="ru">Russian</option>
                        <option value="eng">English</option>
                        <option value="ua">Ukraine</option>
                    </select>
                </p>
                <p>
                    <input type="submit" value="Отправить" name="submit">
                </p>
            </fieldset>
        </form>
        <div style="display: inline-block; padding-left: 10px;">
            <form action="" method="POST">
                <header>Сгенерировать пароль?</header>
                <p>
                    Длина пароля:
                    <select name="length_pass" id="" style="width: 50px;">>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </p>
                <input type="submit" name="submit2" value="Сгенерировать">
                <p>Ваш пароль:
                    <br>
                    <input type="text" value="<?php 
		if(isset($_REQUEST['length_pass'])){
			echo getPass($_REQUEST['length_pass']);
		}else{
			echo '';
		} 
	?>">
                </p>
            </form>
        </div>
        <div style="display: inline-block; padding-left: 7px;">
        	<fieldset>
        		<legend>Авторизация</legend>
        		<form action="" method="POST">
		        	<p>
		        		Логин:<br>
		        		<input type="text" name="a_login" value="<?php echo isset($_POST['a_login'])? $_POST['a_login']:''; ?>">
		        	</p>
		        	<p>
		        		Пароль:<br>
		        		<input type="text" name="a_password" value="<?php echo isset($_POST['a_password'])? $_POST['a_password']:''; ?>">
		        	</p>
		        	<input type="submit" name="submit3">
        		</form>
        	</fieldset>
        	<?php 
        		if(!empty($_REQUEST['a_login']) and !empty($_REQUEST['a_password']) and isset($_REQUEST['submit3'])){
        			$login = $_REQUEST['a_login'];
        			$password = $_REQUEST['a_password'];

        			$result = mysqli_query($link, "SELECT * FROM users WHERE login='".$login."'") or die (mysqli_error($link));

        			$user = mysqli_fetch_assoc($result);

        			if(!empty($user)){
        				$salt = $user['salt'];
        				$saltedPassword = md5(md5($saltedPassword).md5($salt));

        				if($user['password'] == $saltedPassword){
        					$_SESSION['auth'] = true;
        					$_SESSION['id'] = $user['id'];
        					$_SESSION['login'] = $user['login'];

        					if($_SESSION['auth'] == true){
        						echo "Вы успешно зарегистрировались!";
        					}
        				}else{
        					echo "Неправильный логин или пароль!";
        				}
        			}else{
        				echo "Неправильный логин или пароль!";
        			} 
        		}else if(isset($_REQUEST['submit3'])){
        			echo "Вы не ввели все поля!";
        		}
        	?>
        </div>
    </div>

    <?php
		function getPass($length_pass)
		{
			$password = '';
			$words = array(
				'a', 'b', 'c', 'd', 'e', 'f',
		      	'g', 'h', 'i', 'j', 'k', 'l',
			    'm', 'n', 'o', 'p', 'q', 'r',
			    's', 't', 'u', 'v', 'w', 'x',
			    'y', 'z', 'A', 'B', 'C', 'D',
			    'E', 'F', 'G', 'H', 'I', 'J',
			    'K', 'L', 'M', 'N', 'O', 'P',
			    'Q', 'R', 'S', 'T', 'U', 'V',
			    'W', 'X', 'Y', 'Z', '1', '2',
			    '3', '4', '5', '6', '7', '8',
			    '9', '0', '#', '!', "?", "&"
			);

			for($i = 0; $i < $length_pass; $i++){
				$password .= $words[mt_rand(0, count($words) - 1)];
			}
			return $password;
		}
	?>
        <?php 
		if(isset($_REQUEST['submit']) and !empty($_REQUEST['login']) and !empty($_REQUEST['password']) and !empty($_REQUEST['password_confirm']) and !empty($_REQUEST['name']) and !empty($_REQUEST['age']) and !empty($_REQUEST['email']) and !empty($_REQUEST['lang'])){
			$host = 'localhost';
			$name = 'root';
			$password = '';
			$db_name = 'reg';

			$link = mysqli_connect($host,$name, $password) or die (mysqli_error($link));
			mysqli_query($link, "CREATE DATABASE IF NOT EXISTS ".$db_name."") or die(mysqli_error($link));
			mysqli_select_db($link, $db_name) or die (mysqli_error($link));
			mysqli_query($link, "CREATE TABLE IF NOT EXISTS users(
				id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				login VARCHAR(100) NOT NULL,
				password VARCHAR(100) NOT NULL,
				name VARCHAR(100) NOT NULL,
				surname VARCHAR(100) NOT NULL,
				age INT(10) NOT NULL,
				email VARCHAR(100) NOT NULL,
				city VARCHAR(100) NOT NULL,
				lang VARCHAR(100) NOT NULL,
				dt VARCHAR(100) NOT NULL,
				UNIQUE us (login, email)
				)") or die (mysqli_error($link));
			mysqli_query($link, "SET NAMES 'utf8'") or die (mysqli_error($link));

			$login = $_REQUEST['login'];
			$password = $_REQUEST['password'];
			$password_confirm = $_REQUEST['password_confirm'];

			$name = $_REQUEST['name'];
			$surname = $_REQUEST['surname'];
			$age = $_REQUEST['age'];
			$email = $_REQUEST['email'];
			$city = $_REQUEST['city'];
			$lang = $_REQUEST['lang'];
			$dt = date('Y-m-d H:i:s');

			if($password == $password_confirm){
				$is_login_free = mysqli_query($link, "SELECT * FROM users WHERE login='".$login."'") or die (mysqli_error($link));
				if(mysqli_num_rows($is_login_free) == 0){
					mysqli_query($link, "INSERT INTO users SET login='".$login."', password='".$password."', name='".$name."', surname='".$surname."', age='".$age."', email='".$email."', city='".$city."', lang='".$lang."', dt='".$dt."'");
					echo "Вы успешно зарегистрировались!";
				}else{
					echo "Этот логин уже занят кем-то!";
				}
			}else{
				echo "Ваши пароли не совпадают!";
			}
		} else if(isset($_REQUEST['submit'])){
			echo "Обязательные и дополнительные поля не заполнены.(Заголовки помещены между звездочками - *Заголовок*)";
		}
	?>
</body>
</html>