<!DOCTYPE html>
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
	<title>My Site</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style/index_style.css">
	<meta http-equiv="refresh" content="2; url=http://rivne.pp.ua" >
</head>
<body>
<?php
	$userData = $_POST["nam"]."|".$_POST["login"]."|".$_POST["password"]."|".$_POST["email"]."\r\n";
	$baz = fopen("../files/baza.txt", "a");
	$Wr = fwrite($baz, $userData);
?>
<p id="onlyForm">
		Реєстрація виконана успішно!
</p>
</body>
</html>