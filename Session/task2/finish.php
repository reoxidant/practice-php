<?php 
	if(isset($_GET['curse'])){
		session_start();
		$_SESSION['curse'] = implode(',', $_GET['curse']);
	} 	
?>
<p><b>О вас:</b></p>
<p>Ваше имя: <br><input type="text" value="<?php echo $_SESSION['username']; ?>"></p>
<p>Ваш возраст: <br><input type="text" value="<?php echo $_SESSION['userage'];?>"></p>
<p>Ваш браузер: <br><input type="text" value="<?php echo $_SESSION['userbr'];?>"></p>
<p>Имеются навыки в: <br><input type="text" value="<?php echo $_SESSION['curse'];?>"></p>
<a href="testn1.php"><button>Завершить</button></a>

