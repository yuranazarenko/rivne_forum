<?php
	$error="";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name=$_POST['nam'];
		$login=$_POST['log'];
		$password=$_POST['password'];
		$email=$_POST['email'];
		$image="../images/user.png";
		// define("DB_HOST", "db4free.net");
		// define("DB_LOGIN", "nazarenko");
		// define("DB_PASSWORD", "");
		// define("DB_NAME", "rivneppua");
		define("DB_HOST", "sovabarm.mysql.tools");
		define("DB_LOGIN", "sovabarm_yura");
		define("DB_PASSWORD", "lxnyzy5m");
		define("DB_NAME", "sovabarm_yura");
		$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
		if($link) echo "Connect";
		else {
			echo "ERROR Connect<br>";
			echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
			echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
		}
		$text2 = "INSERT INTO user(name, login, password, image, email)
					VALUES('$name', '$login', '$password', '$image', '$email')";
		$res2 = mysqli_query($link, $text2);
		mysqli_close($link);
	}
?>



<div id="forma">
	<form method="post" action="input_page.php?id=rigister" name="form1">
		
		<p>
			<label for="nam" pattern="[A-Za-zА-Яа-яЁёІіЇїЄє]{2,15}">Ім'я:</label>
			<input type="text" required id="nam" name="nam">
		</p>
		<p>
			<label for="log">Логін:</label>
			<input type="text" id="log" name="log" required pattern="[A-Za-z0-9]{3,}">
		</p>
		<p>
			<label for="pass">Пароль:</label>
			<input type="password" id="pass" name="password" required>
		</p>
		<p>
			<label for="mail">Email:</label>
			<input type="email" id="mail" name="email" required>
		</p>
		<p>
			<?=$error?>
		</p>
		<p>
			<input type="submit" class="butt" id="subm" value="Зареєструватися">
			<!-- <a class="butt" href="#" OnClick='document.form1.submit();'>Зареєструватися</a> -->
		</p>
		<p>
			<a class="butt" href="input_page.php?id=enter">Вхід</a>
		</p>
	</form>
	</div>