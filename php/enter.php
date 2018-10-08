<div id="forma">
	<form method="post" action="input_page.php" name="forma1">
		<p>
			<label for="log">Логін:</label>
			<input type="text" id="log" name="login" required>
		</p>
		<p>
			<label for="pass">Пароль:</label>
			<input type="password" id="pass" name="password" required>
		</p>
		<p>
			<?php
				echo $error;
			?>
		</p>
		<p>
			<a class="butt" href="#" OnClick='document.forma1.submit()';>Увійти</a>
		</p>
		<p>
			<a class="butt" href="input_page.php?id=rigister">Реєстрація</a>
		</p>
			</form>
	</div>