<?
/*if($_GET['sp_id'] < 1 OR $_GET['sp_id'] > 649){
	 echo "<script>window.location.href='pokedex.php?sp_id=1';</script>";
 }
 */
require_once('ando/bsqldate/dbconsql.php');
require_once('ando/functions/game.functions.php');
require_once('ando/functions/tip.functions.php');
header('Content-Type: text/html; charset=utf-8');

if (isset($_GET['s'])) {
	if (is_numeric($_GET['s'])) {
		$search = obTxt(obr_chis($_GET['s']));
		numbPok($search);
		die("<script>location.href='pokedex.php?sp_id=" . $search . "';</script>");
	} elseif (is_string($_GET['s'])) {
		$search = obTxt($_GET['s']);
		$sql = "SELECT * FROM base_pokemon WHERE name LIKE '%" . $search . "%' LIMIT 100";
		$pok = $mysqli->query($sql);
		if ($pok->num_rows < 1) { ?>
			<LINK REL="Stylesheet" HREF="style.css" TYPE="text/css">
			<STYLE>
				#searchfield {
					width: 100%;
					font-size: 12px;
					border: 1px solid #99bfe7;
					padding: 3px 3px 3 24px;
					color: #99bfe7;
					background: #AFD0F1 url(http://claimbe.ru/img/search-icon.gif) 0 -23px no-repeat;
					margin: 0;
				}

				#searchfield:hover,
				#searchfield:hover,
				#searchfield:focus,
				#searchfield:focus {
					background: #B8D5F1 url(http://claimbe.ru/img/search-icon.gif) 0 -88px no-repeat;
					color: #1E3955;
				}
			</STYLE>

			<form action="pokedex.php" method="GET" style="margin:0">
				<input type="text" name="s" id="searchfield" value="" placeholder="Введите номер или имя покемона для поиска...">
			</form>
			<center>
				<h2>Покемон по вашему запросу не найден.</h2>
			</center>
		<?php
			return;
		} elseif ($pok->num_rows == 1) {
			$pok = $mysqli->query("SELECT * FROM base_pokemon WHERE name LIKE '%" . $search . "%'")->fetch_assoc();
			die("<script>location.href='pokedex.php?sp_id=" . $pok['id'] . "';</script>");
		} else { ?>
			<LINK REL="Stylesheet" HREF="style.css" TYPE="text/css">
			<STYLE>
				#searchfield {
					width: 100%;
					font-size: 12px;
					border: 1px solid #99bfe7;
					padding: 3px 3px 3 24px;
					color: #99bfe7;
					background: #AFD0F1 url(http://claimbe.ru/img/search-icon.gif) 0 -23px no-repeat;
					margin: 0;
				}

				#searchfield:hover,
				#searchfield:hover,
				#searchfield:focus,
				#searchfield:focus {
					background: #B8D5F1 url(http://claimbe.ru/img/search-icon.gif) 0 -88px no-repeat;
					color: #1E3955;
				}
			</STYLE>

			<form action="pokedex.php" method="GET" style="margin:0">
				<input type="text" name="s" id="searchfield" value="" placeholder="Введите номер или имя покемона для поиска...">
			</form>
			<!-- <p id=txt><b>&nbsp;&nbsp;Найдены следующие покемоны:</b><br> -->
			<table>
				<!-- <center>
					<h2>Введите номер покемона.</h2>
				</center> -->
	<?
			while($p = $pok->fetch_assoc()){ 
			echo "<tr><td><img src='img/pkmna/".numbPok($p['id']).".gif' border=0></td><td align=center><a href='pokedex.php?sp_id=".$p['id']."'>#".numbPok($p['id'])." ".$p['name']."</a></td></tr>";
			} 
			echo "</table>";
			exit();
		}

		//die("<script>location.href='pokedex.php?sp_id=".$search."';</script>"); 
	} else {
		Header("Location: pokedex.php");
	}
}

$id = obr_chis($_GET['sp_id']);
$pok = $mysqli->query("SELECT * FROM base_pokemon WHERE id = '" . $id . "'")->fetch_assoc();
$de = $mysqli->query("SELECT * FROM dex_exp WHERE nom = '" . $id . "'")->fetch_assoc();


if (isset($_GET['shine']) && empty($_GET['shine'])) {
	$img = 'shine';
} elseif (!empty($_GET['shine'])) {
	Header("Location: ../");
} else {
	$img = 'normal';
}
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
	<HTML>

	<HEAD>
		<TITLE>Покедекс</TITLE>
		<META HTTP-EQUIV="Content-Type" CONTENT="text/html; Charset=Windows-1251">
		<LINK REL="Stylesheet" HREF="style.css" TYPE="text/css">
		<STYLE>
			#searchfield {
				width: 100%;
				font-size: 12px;
				border: 1px solid #99bfe7;
				padding: 3px 3px 3 24px;
				color: #99bfe7;
				background: #AFD0F1 url(http://claimbe.ru/img/search-icon.gif) 0 -23px no-repeat;
				margin: 0;
			}

			#searchfield:hover,
			#searchfield:hover,
			#searchfield:focus,
			#searchfield:focus {
				background: #B8D5F1 url(http://claimbe.ru/img/search-icon.gif) 0 -88px no-repeat;
				color: #1E3955;
			}
		</STYLE>
	</HEAD>

	<BODY>
		<form action="pokedex.php" method="GET" style="margin:0">
			<input type="text" name="s" id="searchfield" value="" onblur="if (this.value=='') this.value=search_txt;" onfocus="if (this.value==search_txt) this.value='';">
		</form>
		<script>
			search_txt = "Введите номер или имя покемона для поиска...";
			document.getElementById("searchfield").value = search_txt;
		</script>

		<table width='100%'>
			<tr>
				<td colspan='2' class="title">
					<table width='100%'>
						<tr>
							<td width=50><a href="pokedex.php?sp_id=<? print $id - 1; ?>">
								<<	<!-- << < /a> -->
							</td>
							<td align="center">
								<h2>#<? print numbPok($id) . ' ' . $pok['name']; ?></h2>
							<td width=50 align='right'><a href='pokedex.php?sp_id=<? print $id + 1; ?>'> >> </a></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td valign='top' align='center' width='255'>
					<img src='http://claimbe.ru/img/pkmn/<?= $img; ?>/<?= numbPok($id); ?>.jpg' width=250 height=190 border=1>
					<br>
					<? if (!isset($_GET['shine'])) { ?>
						<b>обычный</b> -
						<a href='pokedex.php?sp_id=<?= numbPok($id); ?>&shine'>шайни</a>
					<? } else { ?>
						<a href='pokedex.php?sp_id=<?= numbPok($id); ?>'>обычный</a> -
						<b>шайни</b>
					<? } ?>
					<div title='Категория силы: <?= $pok['power_category']; ?>' style='width:255; height:18; text-align:left; margin-top:-210'>&nbsp;&nbsp;<? for ($a = 0; $a < $pok['power_category']; $a++) { ?><img src="http://claimbe.ru/img/star.png" border='0'><? } ?></div>
					<div style='width:255; height:30; text-align:right; margin-top:160'>
						<? if (empty($pok['type']) || $pok['type'] == 'not') {
						} else { ?>
							<img src='http://claimbe.ru/img/types/<?= $pok['type']; ?>.gif' title='Тип - <?= atktip($pok['type']); ?>'>
						<? } ?>
						<? if (empty($pok['type_two']) || $pok['type_two'] == 'not') {
						} else { ?>
							<img src='http://claimbe.ru/img/types/<?= $pok['type_two']; ?>.gif' title='Тип - <?= atktip($pok['type_two']); ?>'>&nbsp;&nbsp;
						<? } ?>
					</div>
				</td>
				<td valign='top'>
					<!-- <b>Форма:</b> <?//= $pok['evol_type'] - 1; ?><br> -->
					<b>Группа опыта:</b> <?= $pok['exp_group']; ?><br>
					<b>Рост/длина:</b> <?= $pok['height']; ?> м<br>
					<b>Базовый опыт:</b> <?= $de['effort']; ?><br>
					<b>Вес:</b> <?= $pok['weight']; ?> кг<br>
					<b><img src='http://claimbe.ru/img/sex_0.gif'> / <img src='http://claimbe.ru/img/sex_1.gif'> :</b> <?= $pok['sex_m']; ?>/<?= $pok['sex_f']; ?><br>
					<b>Редкость:</b> 1<br>

					<?
					$pok_count = $mysqli->query("SELECT COUNT(id) as counts FROM user_pokemons WHERE basenum= '" . $id . "' and hide= '0'")->fetch_assoc();
					$shine_pok_count = $mysqli->query("SELECT COUNT(id) as counts FROM user_pokemons WHERE type<>'normal' AND basenum= '" . $id . "' and hide= '0'")->fetch_assoc();
					?>
					<!-- <b>Всего в игре: <?= $pok_count['counts']; ?>/<?= $shine_pok_count['counts']; ?></b> -->

					<p><b>Базовые статы:</b><br>
					<table>
						<tr>
							<td>&nbsp;&nbsp;НР:</td>
							<td><?= $pok['hp']; ?></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;Атака:</td>
							<td><?= $pok['atk']; ?></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;Защита:</td>
							<td><?= $pok['def']; ?></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;Скорость:</td>
							<td><?= $pok['spd']; ?></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;Спец.Атака:</td>
							<td><?= $pok['satk']; ?></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;Спец.Защита:</td>
							<td><?= $pok['sdef']; ?></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan='2'>
					<?= $pok['about']; ?><p>
						<b>Эволюции:</b><br>
						<?php
						$evol = htmlspecialchars_decode($pok['evolve']);
						// $nevol = str_replace("&#039;", '"', $evol);
						echo $evol;
						?>
						<?php
						$pkl = $mysqli->query("SELECT * FROM pok_town WHERE pok = '" . $pok['id'] . "'");
						$shd = $mysqli->query("SELECT COUNT(id) as counts FROM pok_town WHERE pok = '" . $pok['id'] . "'")->fetch_assoc();
						if ($shd['counts'] != 0) {
							echo "<br><br><b>Нападает на локациях:</b><br><br>";
							while ($pok_l = $pkl->fetch_assoc()) {
								$lc = $mysqli->query("SELECT * FROM base_location WHERE id = '" . $pok_l['town'] . "'")->fetch_assoc();
								if ($lc['region'] == 1) {
									$r = 'Джотто';
								} elseif ($lc['region'] == 2) {
									$r = 'Канто';
								} elseif ($lc['region'] == 3) {
									$r = 'Хоенн';
								}
								echo $r . " ⇢ " . $lc['name'] . "<br>";
							}
						}
						?>

				</td>
			</tr>
			<tr>
				<?
				$pok_attacks = $mysqli->query("SELECT * FROM attack_learn WHERE poke_base_id = '" . $id . "' ORDER BY `atc_lvl` ASC ");
				?>
				<td colspan='2'>
					<table width=100%>
						<td width=33% valign=top>
							<table>
								<tr class='title'>
									<td width='45'>&nbsp;</td>
									<td>Атаки:</td>
								</tr>
								<?
								while ($pok_attack = $pok_attacks->fetch_assoc()) {
									$name = $mysqli->query("SELECT * FROM base_attacks WHERE atac_id = " . $pok_attack['atac_id'])->fetch_assoc();
								?>
									<tr>
										<td><?= $pok_attack['atc_lvl']; ?> ур.</td>
										<td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?= $pok_attack['atac_id']; ?>','at','width=500,height=230');><img src="http://claimbe.ru/img/question.gif" alt='Инфо' border='0'></a> <?= $name['attac_name_eng']; ?></td>
									</tr>
								<? } ?>
							</table>
						</td>
						<td width=33% valign=top>
							<table>
								<tr class='title'>
									<td width='45'>&nbsp;</td>
									<td>ТМ Атаки:</td>
								</tr>
								<?php
								$tm = $mysqli->query("SELECT * FROM tm_pk WHERE pok = " . $id);
								while ($tms = $tm->fetch_assoc()) {
									$nameN = $mysqli->query("SELECT * FROM base_attacks WHERE atac_id = " . $tms['attack'])->fetch_assoc();
								?>
									<tr>
										<td>TM <?= $nameN['tmid']; ?></td>
										<td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?= $tms["attack"]; ?>','at','width=500,height=230');>
												<img src=http://claimbe.ru/img/question.gif alt=Инфо border=0></a> <?= $nameN['attac_name_eng']; ?></td>
									</tr>
								<?php } ?>

							</table>
						</td>
						<td width=33% valign=top>
							<table>
								<tr class='title'>
									<td width='1'>&nbsp;</td>
									<td>Яйцевые Атаки:</td>
								</tr>
								<?php
								$egg = $mysqli->query("SELECT * FROM base_egg_attack WHERE pokemon_base_id = " . $id);
								while ($egga = $egg->fetch_assoc()) {
									$nameEGG = $mysqli->query("SELECT * FROM base_attacks WHERE atac_id = " . $egga['attack_id'])->fetch_assoc();
								?>
									<tr>
										<td></td>
										<td><a HREF=javascript: onClick=win1=window.open('at_view.php?AttackID=<?= $egga["attack_id"]; ?>','at','width=500,height=230');>
												<img src=http://claimbe.ru/img/question.gif alt=Инфо border=0></a> <?= $nameEGG['attac_name_eng']; ?></td>
									</tr>
								<?php } ?>

							</table>
						</td>
					</table>
				</td>
			</tr>
		</table>