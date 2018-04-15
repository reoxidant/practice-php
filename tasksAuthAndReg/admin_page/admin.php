<?php
	define('KEY', true);
	include('../config.php');
	include('../bd/bd.php');
    include('../user.php');
    include('../scripts/func/main.php'); 
	session_start();

	if(isset($_REQUEST['back'])){
		header('Location:' .HOST. 'tasksAuthAndReg/profile/profile.php?id='.$_SESSION['id'].'');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Админка</title>
	<style>
		table, td{
			border: 1px solid black;
			width: 50px;
			padding: 5px 15px;
			border-collapse: collapse; 
			border-spacing: 0; 
		}
		.head{
			font-weight: bolder;
			background-color: #dcdde0;
		}
	</style>
</head>
<body>
	<?php 
		if(isAdmin() == true){
	?>
	<div style="width: 100%;">
		<fieldset style="width: 600px; margin: 0 auto;">
			<legend>
				Пользователи социальной сети
			</legend>
			<table>
				<tr class="head">
					<td>id</td>
					<td>логин</td>
					<td>email</td>
					<td>статус</td>
					<td>удалить</td>
					<td>забанить</td>
					<td>редактировать</td>
					<td>изменить статус</td>
				</tr>
				<?php 
					$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		            $perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;
		            $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
		
		            $query = "SELECT SQL_CALC_FOUND_ROWS id, login, email, status FROM users ORDER BY id LIMIT {$start}, {$perPage}";
		            $sql = mysqli_query($link, $query) or die (mysqli_error($link));
		
		            //Pages
		            $sql2 = mysqli_query($link, "SELECT FOUND_ROWS() as total");
		            $total = mysqli_fetch_assoc($sql2)['total'];
		            $pages = ceil($total / $perPage);
				?>
				<?php 
		            while($row = mysqli_fetch_assoc($sql)){
		                //Чтобы не выводить свой логин в список пользователей
		                if($_SESSION['id'] !== $row['id']){
		        ?>
		            <tr style="height: 40px;">
		                <td><?= $row['id']; ?></td>
		                <td><?= $row['login']; ?></td>
		                <td><?= $row['email']; ?></td>
		                <td><?php if($row['status'] == 10){ echo "Админ";}else if($row['status'] == 2){ echo "Модератор";}else{ echo "Пользователь"; } ?></td>
		                <td><a href="delete.php?user_id=<?= $row['id']; ?>">удалить</a></td>
		                <?php
		                	if($row['banned'] >= date("Y-m-d H:i:s")){
		                ?>
		                	<td><a href="unban.php?user_id=<?= $row['id']; ?>">разбанить</a></td>
		                <?php		
		                	}else{
		               	?>
		               		<td><a href="ban.php?user_id=<?= $row['id']; ?>">забанить</a></td>
		                <?php		
		                	} 
		                ?>
		                <td><a href="edit.php?user_id=<?= $row['id']; ?>">редактировать</a></td>
		                <td><a href="change_status.php?user_id=<?= $row['id']; ?>">измненить</a></td>
		            </tr>
		        <?php
		                }else{
		
		                }
		            }
		        ?>
			</table>
			<div style="margin-left: 25px">
				<br>
		        <?php for($x = 1; $x <= $pages; $x++): ?>
		            <a href="?id=<?php echo $id; ?>&page=<?php echo $x; ?>&per-page=<?php echo $perPage;?>"<?php if($page === $x){ echo ' class="select"';}; ?>><?php echo $x; ?></a>
		        <?php endfor; ?>
	    	</div>

		</fieldset>
	    	<form style="width: 800px; margin: 10px auto;" action="post" method="POST"><input type="submit" name="back" value="Обратно к профилю"></form>
	    	<div style="width: 800px; margin: 10px auto;">
	    		<?php $all_users = mysqli_query($link, "SELECT id FROM users"); 
	    			$i = 0;
	    			while($row1 = mysqli_fetch_assoc($all_users)){
	    				$i++;
	    			}
	    		?>

	    		<?php $banned_users = mysqli_query($link, "SELECT id FROM users WHERE banned >= NOW()"); 
	    			$y = 0;
	    			while($row1 = mysqli_fetch_assoc($banned_users)){
	    				$y++;
	    			}
	    		?>

	    		<p>Колличество пользователей -- <?php echo $i; ?></p>
	    		<?php 
					$array = array();
					$result = mysqli_query($link, "SELECT status FROM users");
					if(mysqli_num_rows($result) > 0) {
					    while($row = mysqli_fetch_array($result)){
					    	$array[]= $row['status'];
					    }
					   $res = array_count_values($array);
					}
					else {
					    echo 'Файлов нет!';
					}
	    		?>
	    		<p>администраторов -- <?php echo ($res[10] == 0)? 0 : $res[10]; ?></p>
	    		<p>модераторов -- <?php echo ($res[2] == 0)? 0 : $res[2]; ?></p>
	    		<p>пользователей -- <?php echo ($res[1] == 0)? 0 : $res[1]; ?></p>
	    		<p>забаненных -- <?php echo $y; ?></p>
	    	</div>
	</div>
	<?php 
		}else{
			echo "Доступно только администратору!";	
		}
	?>
</body>
</html>