<?php
	if($_GET['status'] == 'close'){
		setcookie('banner', 'disable', time()+3600*24*30, '/');		
	} 
	if(isset($_COOKIE['banner'])){
		echo "Баннер закрыт на месяц!";
	}
	if(!isset($_COOKIE['banner'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Banner</title>
</head>
<body>
	<div>
		<img src="189.jpg" alt="banner"><br>
		<a href="?status=close"><span>Закрыть баннер!</span></a>
	</div>
</body>
</html>

<?php
	}
?>
