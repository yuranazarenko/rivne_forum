<?php
define("DB_HOST", "sovabarm.mysql.tools");
define("DB_LOGIN", "sovabarm_yura");
define("DB_PASSWORD", "lxnyzy5m");
define("DB_NAME", "sovabarm_yura");
$link7 = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
global $id_d;
$id_d = $_GET['id_d'];
if($_GET['id_par']>0){
	$id_par = $_GET['id_par'];
	$text0 = "SELECT n_child, id FROM content WHERE id='$id_par'";
	$res0 = mysqli_query($link7, $text0);
	$arr0 = mysqli_fetch_all($res0, MYSQL_ASSOC);
	$new = $arr0[0]['n_child']-1;
	$text0 = "UPDATE content SET n_child = '$new' WHERE id = '$id_par';";
	$res01 = mysqli_query($link7, $text0);
}
$text7 = "DELETE FROM content WHERE id = '$id_d'";
//echo "$text7<br>";
del_child($id_d);
$res7 = mysqli_query($link7, $text7);
mysqli_close($link);
mysqli_close($link7);
function del_child($delete_child){
	$link8 = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
	$text8 = "SELECT n_child FROM content WHERE id='$delete_child'";
	$res8 = mysqli_query($link8, $text8);
	$del_mas = mysqli_fetch_all($res8, MYSQL_ASSOC);
	$a = $del_mas[0]['n_child'];
	if ($del_mas[0]['n_child']>0){
		$text9 = "SELECT id FROM content WHERE id_parents='$delete_child'";
		$res9 = mysqli_query($link8, $text9);
		$del_child = mysqli_fetch_all($res9, MYSQL_ASSOC);
		for($i=0; $i<$a; $i++){
			$d = $del_child[$i]['id'];
			$text10 = "DELETE FROM content WHERE id  = '$d'";
			//echo "$text10<br>";
			del_child($del_child[$i]['id']);
			$res7 = mysqli_query($link8, $text10);
		}
	}
	mysqli_close($link8);
}
echo "<script>window.close();</script>";