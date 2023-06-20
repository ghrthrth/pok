<?php
	if($_SESSION['clan_order'] !== true){
		echo "<SCRIPT>location.href='..';</SCRIPT>"; return;
	}elseif(isset($_POST['clanName'])){
		$name = obTxt($_POST['clanName']);
		$sel = $mysqli->query("SELECT * FROM base_clans WHERE name = '".$name."'");
		if($sel->num_rows > 1){
				echo "<script>alert('Клан с данным названием уже существует!');</script>";
				echo "<SCRIPT>location.href='game.php?fun=clans';</SCRIPT>"; return;
				plus_item(1,257);
		}else{
			$clan = $mysqli->query("INSERT INTO base_clans (name, admin_id) VALUES ('".$name."',".$_SESSION['user_id'].") ");
			$clan_id = $clan->insert_id
			$mysqli->query("INSERT INTO users (clan_id, clan_admin) VALUES ('".$clan_id."',".$_SESSION['user_id'].") WHERE id = '".$_SESSION['id']."'");
			$_SESSION['clan_order'] = true;
			echo "<script>alert('Клан успешно создан!');</script>";
			echo "<SCRIPT>location.href='game.php?fun=clans';</SCRIPT>"; return;
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<title><?=$title;?></title>
	<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
		<center>
			<h3>Создание клана</h3>
				<form method="POST">
					<input type="text" name="clanName" placeholder=" Введите название клана" required />
					<input type="submit" name="submit" placeholder="Создать клан" required />
				</form>
		</center>
	</body>
</html>