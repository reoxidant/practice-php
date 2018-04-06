<?php 
	session_start();

	header('Content-Type: text/html; charset=UTF8');

	ob_start();

	define('KEY', true);

	include('config.php');
	include('bd/bd.php');
	include('scripts/func/main.php');

	$mode = isset($_GET['mode']) ? $_GET['mode']:false;
	$session = isset($_SESSION['auth']) ? $_SESSION['auth']:false;

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
	if($session == false){
		include ('html/index.php');
	}else{
		header('Location:'.HOST.'tasksAuthAndReg/profile/profile.php?id='.$_SESSION['id'].'');
	}
	
?>