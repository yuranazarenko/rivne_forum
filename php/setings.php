<?php
	//phpinfo(); 
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
	if($_FILES['userfile']['tmp_name']){
		$uploaddir = '../images/foto_users/';
		move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir . $_FILES['userfile']['name']);
		$name_file = $uploaddir . $_FILES['userfile']['name'];
		$text7 = "UPDATE user SET image = '$name_file' WHERE id = '$id';";
		$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
		$res7 = mysqli_query($link, $text7);
		mysqli_close($link);
   	 }			

?>


<div id="setings">
	<div id="foto">
		<p>Фотографія:</p>
		<a href="#"><img src="<?=$_GET['im']?>"><p id="foto_add">+</p></a>
		<form enctype="multipart/form-data" action="forum.php?id_f=setings&par_f=<?=$_GET['par_f']?>" method="POST">
    
    	<input type="hidden" name="MAX_FILE_SIZE" value="300000000" />
   
    	<input name="userfile" type="file" />
    	<input type="submit" value="Отправить файл" />
</form>
	</div><br>
	<div id="pass">
		<form action="forum.php?id_f=setings&par_f=<?=$_GET['par_f']?>" method="POST" name="forma1">
			<input type="hidden" name="control" value="true">
			<input type="checkbox" name="pass" id="chek">
			<label for="chek"><span>Змінити пароль</span></label><br>
			<div id="vis_pass">
				<input type="password" name="old"><label  for="old"><span>Старий пароль</span></label><br>
				<input type="password" name="new"><label  for="new"><span>Новий пароль</span></label><br>
				<input type="password" name="new2"><label  for="new2"><span>Повторити новий пароль</span></label><br>
			</div>
			<div id="massege"><p><?=$masse?></p></div>
		</form>
	</div>
	<a class="bot_ok" href="#" OnClick='document.forma1.submit();'><img class="im_ok_no" src="../images/ok.png"></a>
	<a class="bot_no"href="forum.php?id_f=<?=$_GET['par_f']?>" OnClick='document.forma1.submit();'><img class="im_ok_no" src="../images/no.png"></a>
</div>