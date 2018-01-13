<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Topic</title>
</head>
<style>
	body{
		margin: 0;
		padding: 0;
	}
	.wrapper{
		width: 500px;
		margin: 0px auto;
		text-align: justify;
	}
	h1{
		font-size: 36px;
		margin-top: 20px;
		margin-bottom: 10px;
		font-weight: 500;
	}
	h2{
		font-size: 30px;
		margin-top: 20px;
		margin-bottom: 10px;
		font-weight: 500;
	}
	p{
		margin-bottom: 5px;
		margin: 0 0 10px;
	}
	.subheader{
		font-weight: bold;
	}
	.title{
		font-size: 26px;
	}
	.wrappper > div {
		margin-bottom: 15px;
	}
	.desc{
		font-size: 18px;
	}
	.date{
		font-weight: bold;
	}
	.pagination{
		display: inline-block;
		padding-left: 0;
		margin: 20px 0;
		border-radius: 4px;
	}
	.pagination li {
		display: inline;
	}
	.pagination li a{
		position: relative;
		float: left;
		padding: 6px 12px;
		text-decoration: none;
		border: 1px solid #ddd;
		color: #337ab7;
		background-color: #fff;
	}
	#active{
        z-index: 3;
        color: white;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }
	.disabled {
		color: #777;
		cursor: not-allowed;
		background-color: #fff;
		border-color: #ddd;
	}
	.info{
		color: #31708f;
		background-color: #d9edf7;
		border-color: #bce8f1;
		padding: 15px;
		margin: 15px 0;
	}
	input{
		margin: 0;
	}
	.form-control{
		display: block;
		width: 95%;
		height: 34px;
		padding: 6px 12px;
		font-size: 14px;
		color: #555;
		background-color: #fff;
		border: 1px solid #ccc;
		border-radius: 4px;
	}
	.text-form-control{
		height: 200px;
		width: 96%;
		font-size: 15px;
		padding: 5px 10px;
		text-align: justify;
	}
	.text-area-control {
		overflow: auto;
		margin: 0;
	}
	.btn{
		width: 100%;
		display: block;
		color: #fff;
		background-color: #5bc0de;
		padding: 6px 12px;
		margin-bottom: 0;
		font-size: 14px;
		font-weight: normal;
		text-align: center;
		vertical-align: center;
		border: 0px;
	}
	.btn:active {
        background-color: #4398b1;
    }
	</style>
<?php 
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db_name = 'articles';

	$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
	mysqli_query($link, "CREATE TABLE IF NOT EXISTS authors (id INT(4) NULL AUTO_INCREMENT PRIMARY KEY, header VARCHAR(100), dt DATETIME, name VARCHAR(100), msg TEXT, count_answers INT(4)") or die (mysqli_error($link));
	mysqli_query($link, "CREATE TABLE IF NOT EXISTS users (question_id INT(4), id INT(4) NULL AUTO_INCREMENT PRIMARY KEY, dt DATETIME, name VARCHAR(100), msg TEXT)") or die(mysqli_error($link));

	$page = isset($_GET['page']) && $_GET['page'] < 10 ? (int) $_GET['page'] : 1;
	$perPage = 3;
	$start = ($page > 1)? ($page * $perPage) - $perPage : 0;
	$id = isset($_GET['topic'])? (int) $_GET['topic'] : 1;
?>
<?php 
	if(isset($_GET['submit']) AND !empty($_GET['msg']) AND !empty($_GET['username'])){
		$msg = $_GET['msg'];
		$username = $_GET['username'];
		$datetime = 'NOW()';
		$flag = insertInTable($link, $username, $msg, $datetime, $id);
	}
	insert_count_answers($link, $id);
?>


<body>
	<div class="wrapper">
		<?php 
			$id = isset($_GET['topic'])? (int) $_GET['topic'] : 1;
			selectAndShow($id, $link);
		?>
		<h2>Ответы</h2>
		<?php getAnswers($link, $perPage, $start, $id);?>
		<div>
			<nav>
				<ul class="pagination">
					<?php 
						$sql = mysqli_query($link, "SELECT FOUND_ROWS() as total") or die (mysqli_error($link));
						$total = mysqli_fetch_assoc($sql)['total'];
						$pages = ceil($total/$perPage);
						createPagination($page, $pages, $id); 
					?>
				</ul>
			</nav>
		</div>
		<?php 
			isAlert($flag);
		?>
		<div id="form">
			<form action="" method="GET">
				<p><input name='username' type="text" class="form-control" placeholder="Ваше имя"></p>
				<p><textarea name="msg" id="" cols="30" rows="10" class="text-form-control" placeholder="Ваше сообщение"></textarea></p>
				<p><input type="submit" class="btn" name="submit" value="Сохранить"></p>
			</form>
		</div>
	</div>
</body>
<?php 
	function insert_count_answers($link, $id){
		$sql = mysqli_query($link, "SELECT count(question_id) as total FROM users WHERE question_id = '$id'") or die(mysqli_error($link));
		$result = mysqli_fetch_assoc($sql);
		$total = $result['total'];
		mysqli_query($link, "UPDATE authors SET count_answers='$total' WHERE id='$id'") or die(mysqli_error($link));
	}
?>
<?php 
	function isAlert($flag){
		if($flag == true){
?>
		<div class="info">
			Запись успешно сохранена!
		</div>
<?php
		}
	}
?>
<?php 
	function selectAndShow($id, $link)
	{
		
		$sql = mysqli_query($link, "SELECT * FROM authors WHERE id = '$id'") or die(mysqli_error($link));
		while($result = mysqli_fetch_assoc($sql)){
?>
		<h1>Тема №<?php echo $result['id']; ?></h1>
		<p>
			<span class="subheader">Создана:</span> <?php echo $result['dt'];?>.
			<span class="subheader">Автор:</span> <?php echo $result['name']; ?>.
			<br>
			<span class="subheader">Колличество ответов:</span> <?php echo $result['count_answers']; ?>.
			<a href="main.php">Перейти на список тем.</a>
		</p>
		<p class="title"><?php echo $result['header']; ?></p>
		<div class="desc">
			<p><?php echo $result['msg']; ?></p>
		</div>
	<?php
		}
	}
	?>

<?php
	function getAnswers($link, $perPage, $start, $id)
	{
		$sql = mysqli_query($link, "SELECT SQL_CALC_FOUND_ROWS * FROM users WHERE question_id = '$id' LIMIT {$start}, {$perPage}") or die (mysqli_error($link));

		while($result = mysqli_fetch_assoc($sql)){
?>
	<div class="note">
		<p>
			<span class="date"><?php echo $result['dt']; ?></span>
			<span class="name"><?php echo $result['name']; ?></span>
		</p>
		<p>
			<?php echo $result['msg']; ?>
		</p>
	</div>
<?php
		}
	}
?>
<?php 
	function insertInTable($link, $username, $msg, $datetime, $id)
	{
		$result = mysqli_query($link, "INSERT INTO users SET question_id = '$id', dt = $datetime, name='$username', msg='$msg'");
		if($result){
			return true;
		}
		
	}
?>
<?php 
	function createPagination($page, $pages, $id)
	{
?>
		<li>
			<a href="?topic=<?php echo $id;?>&page=1"<?php if($page==1){echo "class='disabled'";} ?>>
				<span>«</span>
			</a>
		</li>
<?php 
		for($i = 1; $i <= $pages; $i++){
?>
		<li><a href="?topic=<?php echo $id; ?>&page=<?php echo $i; ?>" <?php if($page == $i){ echo "id='active'";}?>><?php echo $i; ?></a></li>
<?php 
		}
?>
		<li>
			<a href="?topic=<?php echo $id; ?>&page=<?php echo $pages; ?>" <?php if($page==$pages){echo "class='disabled'";} ?>>
				<span>»</span>
			</a>
		</li>
<?php			
	}
?>
</html>

