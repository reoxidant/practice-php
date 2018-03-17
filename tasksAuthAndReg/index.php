<?php 
	session_start();

	header('Content-Type: text/html; charset=UTF8');

	ob_start();

	define('KEY', true);

	include('config.php');
	include('bd/bd.php');
	include('scripts/func/main.php');
	
	ob_start();

	$mode = isset($_GET['mode']) ? $_GET['mode']:false;
	$user = isset($_SESSION['user']) ? $_SESSION['user']: false;

	switch ($mode) {
		case 'reg':
			include('scripts/reg/reg_form.php');
			break;
		
		case 'auth':
			include('scripts/auth/auth_form.php');
			break;
	}

	$content = ob_get_contents();
	ob_end_clean();

	include ('html/index.php');
?>