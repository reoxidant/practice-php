<?php 
	setcookie('dt', date('d'), time()+3600*24*30, '/'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Date of user</title>
</head>
<body>
	<header><h1>Вас не было на сайте <?php echo date('d') - $_COOKIE['dt']; ?> дней.</h1></header>
</body>
</html>