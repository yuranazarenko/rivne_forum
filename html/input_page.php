<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['login']){
	$lg = $_POST['login'];
	$pss = $_POST['password'];
	$error="";
	define("DB_HOST", "sovabarm.mysql.tools");
	define("DB_LOGIN", "sovabarm_yura");
	define("DB_PASSWORD", "lxnyzy5m");
	define("DB_NAME", "sovabarm_yura");
	$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
	$text = "SELECT id, name, password FROM user WHERE login='$lg'";
	$res = mysqli_query($link, $text);
	$arr =mysqli_fetch_all($res, MYSQL_ASSOC);
	mysqli_close($link);
	if(!$arr) $error="Даного логіна немає!";
		else{
			if($arr[0]['password']==$pss){
				setcookie("id",$arr[0]['id'],time()+3600,"/", "yura.sovabarmak.in.ua");
				setcookie("login",$lg,time()+3600,"/", "yura.sovabarmak.in.ua");
				header("Location: ../php/forum.php");
			}else $error="Невірний пароль!";
		}
	
	
}
?>
<html>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124877576-1"></script>
	<script>
  	window.dataLayer = window.dataLayer || [];
  	function gtag(){dataLayer.push(arguments);}
  	gtag('js', new Date());

  	gtag('config', 'UA-124877576-1');
	</script>
	<title>Rivne</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style/input_page.css">
	<link rel="stylesheet" type="text/css" href="../style/menu.css">
	<link rel="icon" type="image/x-icon" href="../images/Herb.ico">
</head>
<body>
<nav id="navigation">
	<div id="DIVmenu">
		<a onclick="OpenMenu()" id="IcoMenu" href="#"><p id="simvolMenu">&#9776;</p><p id="simvolBack">&uArr;</p></a>
		<ul class="menu">
			<li><a href="../index.html">Головна</a><span class="A1"></span><span class="A1"></span><span class="A1"></span><span class="A1"></span><span class="A1"></span>
			</li>
			<li><a href="eat_chip.html">Поїсти</a><span></span><span></span><span></span><span></span><span></span>
				<ul class="SUBmenu">
					<li class="SUBmenu1"><a href="eat_chip.html">Дешево</a></li>
					<li class="SUBmenu1"><a href="eat_exspensiv.html">Вишукано</a></li>
				</ul>
			</li>
			<li><a href="hostel.html">Заночувати</a><span></span><span></span><span></span><span></span><span></span>
				<ul class="SUBmenu">
					<li class="SUBmenu1"><a href="hostel.html">Хостел</a></li>
					<li class="SUBmenu1"><a href="hotel.html">Готель</a></li>
				</ul>
			</li>
			<li><a href="galery.html">Галерея</a><span></span><span></span><span></span><span></span><span></span>
				<ul class="SUBmenu">
					<li class="SUBmenu1"><a href="galery.html">Місто</a></li>
					<li class="SUBmenu1"><a href="galery_nature.html">Природа</a></li>
					<li class="SUBmenu1"><a href="galery_musiem.html">Музеї</a></li>
					<li class="SUBmenu1"><a href="galery_park.html">Парки</a></li>
					<li class="SUBmenu1"><a href="galery_restorans.html">Ресторани</a></li>
				</ul>
			</li>
			<li><a href="#">Форум</a><span></span><span></span><span></span><span></span><span></span>
			</li>
		</ul>
	</div>
</nav>
<main>
	<?php 
		if(!$_GET['id']) $id = 'enter';
		else $id = $_GET['id'];
		switch ($id) {
			case 'enter':
				require_once '../php/enter.php';
				break;
			case 'rigister':
				require_once "../php/rigister.php";
				break;
			default:
				require_once "../php/enter.php";
				break;
		}
	?>
	
</main>
<footer></footer>



<script type="text/javascript" src="../script/menu_script.js"></script>
</body>
</html>