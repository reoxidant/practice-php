<?php 
	if(!empty($_GET['username']) and !empty($_GET['userage'])){
		session_start();
		$_SESSION['username'] = $_GET['username'];
		$_SESSION['userage'] = $_GET['userage'];
	}
?>
<form action="testn3.php" method="GET">
	<p>
		<b>Каким браузером в основном пользуетесь?</b><br>
	</p>
	<p>
		<input type="radio" name="userbr" value="IE" id="ch1" checked><label for="ch1">Internet Explorer</label><br>
		<input type="radio" name="userbr" value="Firefox" id="ch2"><label for="ch2">Opera</label><br>
		<input type="radio" name="userbr" value="Opera" id="ch3"><label for="ch3">Firefox</label><br>
		<input type="radio" name="userbr" value="Chrome" id="ch4"><label for="ch4">Chrome</label><br>
	</p>
	<input type="submit" value="Далee">
</form>