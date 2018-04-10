<?php 
	$id = isset($_REQUEST['id'])? $_REQUEST['id'] : '';
	$result = mysqli_query($link, "SELECT * FROM users WHERE id='$id'") or die(mysqli_error($link));
	$user = mysqli_fetch_assoc($result);
?>