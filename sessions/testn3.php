<?php 
	if(isset($_GET['userbr'])){
		session_start();
		$_SESSION['userbr'] = $_GET['userbr'];
	}
?>
<form action="finish.php" method="GET">
	<p>
		<b>Какой курс вы прошли?</b>
	</p>
	<p>
		<input type="checkbox" name="curse[]" value="HTML" id="ch1"><label for="ch1">HTML</label> 
		<input type="checkbox" name="curse[]" value="CSS" id="ch2"><label for="ch2">CSS</label> 
		<input type="checkbox" name="curse[]" value="JS" id="ch3"><label for="ch3">JS</label> 
		<input type="checkbox" name="curse[]" value="PHP" id="ch4"><label for="ch4">PHP</label> 
	</p>
	<input type="submit" value="Завершить">
</form>