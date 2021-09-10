<?php
	session_start();

	if(!empty($_GET['username'])){
		// echo $_GET['username'];
		echo $_SESSION['username'];
	}
?>

 <?php
session_start();

if(!empty($_SESSION['userphone'])){
	$phone = $_SESSION['userphone'];
} else {
	$phone = '';
}
?>

<form action="#" method="GET">
	<p>
		Ваше имя:<br>
		<input type="text" name="name"> 
	</p>
	<p>
		Ваша фамилия:<br>
		<input type="text" name="surname"> 
	</p>
	<p>
		Ваш номер телефона:<br>
		<input type="text" name="userphone" value="<?php echo $phone; ?>"> 
	</p>
	<input type="submit">
</form>

