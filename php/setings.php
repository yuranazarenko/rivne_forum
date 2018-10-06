<?php
	$masse="";
	if ($_POST['control']==true&&$_POST['pass']==on) {
		$masse="Зміну виконано";
		$old=trim($_POST['old']);
		$new=trim($_POST['new']);
		$new2=trim($_POST['new2']);
		if($new!==$new2) $masse="Новий пароль та повторення не співпадають!";
		if(mb_strlen($new)<3) $masse="Пароль повинен бути довшим 3 символів!";
		if($old != $arr[0]['password']) $masse="Невірно введено старий пароль!";
		if($masse=="Зміну виконано"){
			$text = "UPDATE user SET password = '$new' WHERE user.id = $id;";
		$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
		$res = mysqli_query($link, $text);
		mysqli_close($link);
		}
	}
?>


<div id="setings">
	<div id="foto">
		<p>Фотографія:</p>
		<a href="#"><img src="../images/user.png"><p id="foto_add">+</p></a>
	</div><br>
	<div id="pass">
		<form action="forum.php?id_f=setings&par_f=<?=$_GET['par_f']?>" method="POST" name="forma1">
			<input type="hidden" name="control" value="true">
			<input type="checkbox" name="pass" id="chek">
			<label for="chek"><span>Змінити пароль</span></label><br>
			<div id="vis_pass">
				<input type="password" name="old" id="old"><label  for="old"><span>Старий пароль</span></label><br>
				<input type="password" name="new" id="new"><label  for="new"><span>Новий пароль</span></label><br>
				<input type="password" name="new2" id="new2"><label  for="new2"><span>Повторити новий пароль</span></label><br>
			</div>
			<div id="massege"><p><?=$masse?></p></div>
		</form>
	</div>
	<a class="bot_ok" href="#" OnClick='document.forma1.submit();'><img class="im_ok_no" src="../images/ok.png"></a>
	<a class="bot_no"href="forum.php?id_f=<?=$_GET['par_f']?>" OnClick='document.forma1.submit();'><img class="im_ok_no" src="../images/no.png"></a>
</div>