<?php 
	define("DB_HOST", "sovabarm.mysql.tools");
	define("DB_LOGIN", "sovabarm_yura");
	define("DB_PASSWORD", "lxnyzy5m");
	define("DB_NAME", "sovabarm_yura");
	$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
	$id = $_COOKIE['id'];
	$text = "SELECT name, login, password, image FROM user WHERE id='$id'";
	$res = mysqli_query($link, $text);
	$arr =mysqli_fetch_all($res, MYSQL_ASSOC);
	mysqli_close($link);
?>
<div id="user_menu">
	<a href="../index.html">Головна</a>
	<a href="forum.php?id_f=kategories">КатегоріЇ</a>
	<div id="user_date">
		<a href="forum.php?id_f=setings&par_f=<?=$_GET['id_f']?>"><img src="../images/seting.png"></a>
		<p><?=$arr[0]['name']?></p>
		<img src="<?=$arr[0]['image']?>">
	</div>
</div>