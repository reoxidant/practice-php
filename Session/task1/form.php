<?php 
	session_start();
	if(isset($_GET['submit']) and !empty($_GET['usercity'] and !empty($_GET['userage']))){
		$_SESSION['usercity'] = $_GET['usercity'];
		$_SESSION['userage'] = $_GET['userage'];
	}
?>
<form action="logout.php">
	<p>Ваше имя: <br>
	<input type="text">
	</p>
	<p>Ваш возраст: <br>
	<input type="text" value="<?php echo $_SESSION['userage']; ?>">
	</p>
	<p>Ваш город: <br>
	<input type="text" value="<?php echo $_SESSION['usercity']; ?>">
	</p>
	<input type="submit" value="Разрушить сесcию">
</form>