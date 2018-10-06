<?php
	if(!$_COOKIE['id']) header("Location: ../html/input_page.php");
?>
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
	<title>Rivne</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style/forum.css">
	<link rel="icon" type="image/x-icon" href="../images/Herb.ico">
</head>
<body>

<main>
	<?php 
		require_once 'user.php';
		if(!$_GET['id_f']) $id_f = 'kategories';
		else $id_f = $_GET['id_f'];
		switch ($id_f) {
			case 'sport':
			case 'games':
			case 'art':
			case 'cook':
			case 'science':
				require_once 'content.php';
				break;
			case 'setings':
				require_once 'setings.php';
				break;
			case 'kategories':
				require_once "kategories.php";
				break;
			default:
				require_once "kategories.php";
				break;
		}
	?>
</main>
<footer></footer>

</body>
</html>