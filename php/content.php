<?php
	$level=0;
?>
<div id="content">
	<p>Створити нове обговорення:</p>
	<a id="new" href="#" target="_blank" onClick="window.open('massege.php?id=<?=$id?>&id_p=0&id_f=<?=$id_f?>', 'abc','top=320, left=325,width=350,height=220, status=no,scrollbars=yes');">Написати текст!</a>
	<br>
	<hr>
</div>
<?php
	//if($link) echo "Conected!<br>";
	//else echo "NO conected<br>";
	global $n;
	$n =0;
	show();
		function show(){
		$id_kategor = $_GET['id_f'];
		$n_lev = $GLOBALS["n"];
		$text6 = "SELECT * FROM content WHERE id_kategor = '$id_kategor' AND n_level = '$n_lev'";
		$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
		//$text6 = "SELECT * FROM content";  
		//echo "$text6<br>";
		$res6 = mysqli_query($link, $text6);
		//if($res6) echo "RES= $res6 <br>";
		$masseges = mysqli_fetch_all($res6, MYSQL_ASSOC);
		//print_r($masseges);
		$count = mysqli_num_rows($res6);
		//mysqli_close($link);
		//echo "count = $count";
		for($i = 0; $i<$count; $i++){
			//echo "massage &i <br>";
			$a = $masseges[$i]['id_user'];
			$text2 = "SELECT * FROM user WHERE id = '$a'";
			$res2 = mysqli_query($link, $text2);
			//echo "text2 = $text2 <br>";
			$user1 =mysqli_fetch_all($res2, MYSQL_ASSOC);
				echo "<div class='all_massage' style='margin-left: ". $masseges[$i]['n_level']*20 ."px'>";
					echo "<div class='div_user'>";
						echo "<img src='".$user1[0]['image']."'>";
						echo "<p>".$user1[0]['name']."</p>";
					echo "</div>";
					echo "<div class='div_text' style='width: calc(100% - 100px);'>".$masseges[$i]['text_f']."</div>";
					echo "<div class='div_control'>";
						echo "<a href='#'><img src='../images/like.png'> : ".$masseges[$i]['n_like'] . "</a>";
						echo "<a href='#'>Коментарі : ". $masseges[$i]['n_child'] . "</a>";
						echo "<a href='#' target='_blank' onClick=\"window.open('massege.php?id=".$_COOKIE['id']."&id_p=".$masseges[$i]['id']."&id_f=".$masseges[$i]['id_kategor']."','abc','top=320,left=325,width=350,height=220,status=no,scrollbars=yes');\">Прокоментувати!</a>";
						$id_cookie = $_COOKIE['id'];
						if($masseges[$i]['id_user']==$id_cookie){
							echo "<a href=\"\" onClick=\"window.open('delete.php?id=".$_COOKIE['id']."&id_d=".$masseges[$i]['id']."&id_par=".$masseges[$i]['id_parents']."','abc','top=320,left=325,width=350,height=220,status=no,scrollbars=yes');\">Видалити </a>";
							echo "<a href=\"\" onClick=\"window.open('edit.php?id=".$_COOKIE['id']."&id_e=".$masseges[$i]['id']."','abc','top=320,left=325,width=350,height=220,status=no,scrollbars=yes');\">Редагувати </a>";
						}
					echo "</div>";
				echo "</div>";
			if($masseges[$i]["n_child"]>0){
				$GLOBALS["n"]++;
				show();
			}
		}
	}

?>


