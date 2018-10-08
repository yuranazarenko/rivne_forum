<?php
define("DB_HOST", "sovabarm.mysql.tools");
define("DB_LOGIN", "sovabarm_yura");
define("DB_PASSWORD", "lxnyzy5m");
define("DB_NAME", "sovabarm_yura");
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$text_f = $_POST['text_ed']; 
	$id_e = $_GET['id_e'];
	$text = "UPDATE content SET text_f = '$text_f' WHERE id = '$id_e';";
	$res = mysqli_query($link, $text);
	mysqli_close($link);
	echo "<script>window.close();</script>";
}else{
	$id_e = $_GET['id_e'];
	$text = "SELECT text_f FROM content WHERE id='$id_e'";
	$res = mysqli_query($link, $text);
	$arr = mysqli_fetch_all($res, MYSQL_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Enter text</title>
</head>
<body>
	<form method="post" action="edit.php?id_e=<?=$id_e?>" name="forma2">
		<textarea name="text_ed" style="width: 250px; height: 150px;"><?=$arr[0]['text_f']?></textarea>
		<input type="submit" value="Прийняти">
	</form>
</body>
</html>