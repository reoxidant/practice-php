<?php 
	session_start();
	if(!empty($_SESSION['usercountry'])){	
		$country = $_SESSION['usercountry'];
	} else {
		$country = '';
	}
?>

<h1>	
	Ваша страна: <?php echo $country;?>
</h1>