<!-- 6. Сделайте функцию getUser($id = ''), которая параметром принимает id пользователя, а возвращает информацию из БД для данного пользователя. В случае вызова без параметра функция должна брать информацию из БД для текущего пользователя (определяется по сессии). -->

<?php 
	function getUser($id)
	{
		if(!empty($id)){
			$query = "SELECT*FROM users WHERE id='$id'";
			$result = mysqli_query($link, $query) or die(mysqli_error($link));
			$user = mysqli_fetch_assoc($result) or die (mysqli_error($link));
			echo "Пользователь: ".$user['name']." ".$user['surname']." email: ".$user['email'].".";
		}else{
			if(isset($_SESSION['auth'])){
				echo "Пользователь: ".$_SESSION['name']." ".$_SESSION['surname']." email: ".$_SESSION['email'].".";
			} else {
				echo "Ошибка";
			}
		}
	}
?>