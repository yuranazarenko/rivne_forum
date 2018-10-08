<?php
$id =$_GET['id'];
$id_p =$_GET['id_p'];
$id_f =$_GET['id_f'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$sended="Відправлено!";
	define("DB_HOST", "sovabarm.mysql.tools");
	define("DB_LOGIN", "sovabarm_yura");
	define("DB_PASSWORD", "lxnyzy5m");
	define("DB_NAME", "sovabarm_yura");
	$link4 = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
	$id_kategor = $_GET['id_f'];
	$id_parents = $_GET['id_p'];
	$id_user = $_GET['id'];
	$n_child = 0;
	$n_like = 0;
	if($id_parents == 0) $n_level =0;
	else{
		$text5 = "SELECT n_level, n_child FROM content WHERE id = '$id_parents'";
		$res5 = mysqli_query($link4, $text5);
		$arr5 = mysqli_fetch_all($res5, MYSQL_ASSOC);
		$add_child = $arr5[0]['n_child'] +1;
		$text8 = "UPDATE content SET n_child = '$add_child' WHERE id = '$id_parents';";
		$res8 = mysqli_query($link4, $text8);
		//echo "text = $text8";
		$n_level = $arr5[0]['n_level'] +1;
	}
	$text_f = $_POST['text_mas'];
	$text4 = "INSERT INTO content (id_kategor, id_parents, id_user, n_child, n_like, n_level, text_f)
					VALUES('$id_kategor', '$id_parents', '$id_user', '$n_child', '$n_like', '$n_level', '$text_f')";
	$res4 = mysqli_query($link4, $text4);
	mysqli_close($link4);
	//echo "<script>window.location.content.php</script>";
	echo "<script>window.close();</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Enter text</title>
</head>
<body>
	<form method="post" action="massege.php?id=<?=$_GET['id']?>&id_p=<?=$_GET['id_p']?>&id_f=<?=$_GET['id_f']?>" name="forma2">
		<textarea name="text_mas"></textarea>
		<input type="submit" value="Відправити">
		<p><?=$sended?></p>
	</form>
</body>
</html>