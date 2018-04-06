<?php 
	define('KEY', true);
	include('../config.php');
	include('../bd/bd.php');

	session_start();

	$id = isset($_SESSION['id'])? $_SESSION['id'] : '';
	$login = isset($_SESSION['login'])? $_SESSION['login'] : $_COOKIE['login'];

	$result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") or die (mysqli_error($link));

	$user = mysqli_fetch_assoc($result);   

	if(isset($_COOKIE['login']) or empty($user)) {
		session_destroy();
	  	setcookie('login', '', time()-3600, '/');
		setcookie('key', '', time()-3600, '/'); 
	} 

	header('Location:'.HOST.'tasksAuthAndReg/index.php');
?>