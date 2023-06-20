<?php
// $mysqle = new mysqli('localhost', 'admin_leagues', 'vnnS7a7ay7', 'admin_leagues');
$trade = $mysqli->query("SELECT * FROM trade WHERE `user1` = '" . $user_id . "' OR `user2` = '" . $user_id . "' LIMIT 1")->fetch_assoc();
if (empty($trade)) {
	echo "<script>parent._location.location='game.php?fun=m_location&map=1';</script>";
	return;
}
if ($trade['user1'] == $user_id) {
	$ind = 1;
	$indv = 2;
	$mID = $trade['user1'];
	$vID = $trade['user2'];
	$ok1 = $trade['ok1'];
	$ok2 = $trade['ok2'];
	$c1 = $trade['c1'];
	$c2 = $trade['c2'];
} else {
	$ind = 2;
	$indv = 1;
	$mID = $trade['user2'];
	$vID = $trade['user1'];
	$ok1 = $trade['ok2'];
	$ok2 = $trade['ok1'];
	$c1 = $trade['c2'];
	$c2 = $trade['c1'];
}

if (isset($_GET['back'])) {
	$back = obr_chis($_GET['back']);
	$bk = $mysqli->query('SELECT * FROM trade_log WHERE trade = ' . $trade["id"] . ' and id = ' . $back . ' and user = ' . $mID)->fetch_assoc();
	$pk = $mysqli->query('SELECT * FROM police_trade WHERE trade = ' . $trade["id"] . ' and user = ' . $mID)->fetch_assoc();
	// 	$pz = $mysqle->query('SELECT * FROM police_trade WHERE trade = '.$trade["id"].' and user = '.$mID)->fetch_assoc();
	if ($bk) {
		if ($bk['pok'] > 0) {
			$mysqli->query("UPDATE trade SET ok1 = '0', ok2 = '0' WHERE `id` = '" . $trade['id'] . "' ");
			$mysqli->query("UPDATE user_pokemons SET user_id = '$mID' WHERE `id` = '" . $bk['pok'] . "' ");
			$mysqli->query("DELETE FROM `trade_log` WHERE `id` = '" . $bk['id'] . "'");
			// ЛОГИ ДЛЯ ПОЛИЦЕЙСКИХ
			$mysqli->query("DELETE FROM `police_trade` WHERE `pok` = '{$bk['pok']}' and `trade` = '{$bk['trade']}'");
			// 	$mysqle->query("DELETE FROM `police_trade` WHERE `pok` = '{$bk['pok']}' and `trade` = '{$bk['trade']}'");
			// ЛОГИ ДЛЯ ПОЛИЦЕЙСКИЙ
			$mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '" . $vID . "'");
			echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
			return;
		} elseif ($bk['egg'] > 0) {
			$mysqli->query("UPDATE trade SET ok1 = '0', ok2 = '0' WHERE `id` = '" . $trade['id'] . "' ");
			$mysqli->query("UPDATE user_items SET user_id = '$mID' WHERE `id` = '" . $bk['egg'] . "' ");
			$mysqli->query("DELETE FROM `trade_log` WHERE `id` = '" . $bk['id'] . "'");
			// ЛОГИ ДЛЯ ПОЛИЦЕЙСКИХ
			$mysqli->query("DELETE FROM `police_trade` WHERE `egg` = '{$bk['egg']}' and `trade` = '{$bk['trade']}'");
			// 	$mysqle->query("DELETE FROM `police_trade` WHERE `egg` = '{$bk['egg']}' and `trade` = '{$bk['trade']}'");
			// ЛОГИ ДЛЯ ПОЛИЦЕЙСКИЙ
			$mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '" . $vID . "'");
			echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
			return;
		} else {
			plus_item($bk['count'], $bk['item'], $mID);
			$mysqli->query("UPDATE trade SET ok1 = '0', ok2 = '0' WHERE `id` = '" . $trade['id'] . "' ");
			$mysqli->query("DELETE FROM `trade_log` WHERE `id` = '" . $bk['id'] . "'");
			// ЛОГИ ДЛЯ ПОЛИЦЕЙСКИХ
			$mysqli->query("DELETE FROM `police_trade` WHERE `item` = '{$bk['item']}' and `trade` = '{$bk['trade']}'");
			// 	$mysqle->query("DELETE FROM `police_trade` WHERE `item` = '{$bk['item']}' and `trade` = '{$bk['trade']}'");
			// ЛОГИ ДЛЯ ПОЛИЦЕЙСКИЙ
			$mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '" . $vID . "'");
			echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
			return;
		}
	}
}

if (isset($_GET['p_id'])) {
	$pid = obr_chis($_GET['p_id']);
	$gtr = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = ' . $mID . ' and active = 1 and starts = 0 and trade = 0 and id = ' . $pid)->fetch_assoc();
	if ($gtr) {
		if ($gtr['master'] == $mID or $gtr['master'] == $vID) {
			if ($c1 < 2) {
				echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
				return;
			}
			if ($c2 >= 6) {
				echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
				return;
			}
			if (isset($_GET['master']) or $gtr['master'] == $vID) {
				$mst = 1;
			} else {
				$mst = 0;
			}
			$mysqli->query("UPDATE user_pokemons SET user_id = '2' WHERE `id` = '" . $gtr['id'] . "' ");
			$mysqli->query("UPDATE trade SET ok1 = '0', ok2 = '0' WHERE `id` = '" . $trade['id'] . "' ");
			$mysqli->query("INSERT INTO trade_log (trade, type, user, user_to, pok) VALUES ('" . $trade['id'] . "','" . $mst . "','" . $mID . "','" . $vID . "','" . $gtr['id'] . "') ");
			// ЛОГИ ДЛЯ ПОЛИЦЕЙСКИХ
			//$police = $mysqli->query("SELECT * FROM user_pokemons WHERE id = '{$gtr['id']}'")->fetch_assoc();
			$mysqli->query("INSERT INTO police_trade (date, time, trade, type, user, user_to, pok) VALUES ('" . date('Y-m-d') . "','" . date('H:i:s') . "','" . $trade['id'] . "','" . $mst . "','" . $mID . "','" . $vID . "','" . $gtr['id'] . "') ");
			// 	$mysqle->query("INSERT INTO police_trade (date, time, trade, type, user, user_to, pok) VALUES ('".date('Y-m-d')."','".date('H:i:s')."','".$trade['id']."','".$mst."','".$mID."','".$vID."','".$gtr['id']."') ");
			// ЛОГИ ДЛЯ ПОЛИЦЕЙСКИЙ
			$mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '" . $vID . "'");
			echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
			return;
		} else {
			echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
			return;
		}
	} else {
		echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
		return;
	}
}

if (isset($_POST['amount'])) {
	if ($_POST['ItemID'] > 0) {
		if ($_POST['egg'] > 0) {
			$egid = obr_chis($_POST['egg']);
			$ifitm = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '" . $user_id . "' and `item_id` = '999' and `id` = '" . $egid . "'")->fetch_assoc();
			if ($ifitm) {
				$mysqli->query("UPDATE trade SET ok1 = '0', ok2 = '0' WHERE `id` = '" . $trade['id'] . "' ");
				$mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '" . $vID . "'");
				$mysqli->query("UPDATE user_items SET user_id = '2' WHERE `id` = '" . $egid . "'");
				$mysqli->query("INSERT INTO trade_log (trade , egg , user, user_to, count) VALUES ('" . $trade['id'] . "','" . $egid . "','" . $mID . "','" . $vID . "','1') ");
				// ЛОГИ ДЛЯ ПОЛИЦЕЙСКИХ
				$mysqli->query("INSERT INTO police_trade (date, time, trade , egg , user, user_to, count) VALUES ('" . date('Y-m-d') . "','" . date('H:i:s') . "','" . $trade['id'] . "','" . $egid . "','" . $mID . "','" . $vID . "','1') ");
				// $mysqle->query("INSERT INTO police_trade (date, time, trade , egg , user, user_to, count) VALUES ('".date('Y-m-d')."','".date('H:i:s')."','".$trade['id']."','".$egid."','".$mID."','".$vID."','1') ");
				// ЛОГИ ДЛЯ ПОЛИЦЕЙСКИЙ
				echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
				return;
			}
		}
		$count = round(obr_chis($_POST['amount']));
		$ii = obr_chis($_POST['ItemID']);
		if ($count > 0) {
			$ifitm = $mysqli->query("SELECT * FROM user_items WHERE `user_id` = '" . $user_id . "' and `item_id` = '" . $ii . "' and `count` >= '" . $count . "'")->fetch_assoc();
			if ($ifitm) {
				$isetBAs = $mysqli->query("SELECT * FROM base_items WHERE `id` = '" . $ii . "' and `trade` = '1' ")->fetch_assoc();
				if ($isetBAs) {
					echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
					return;
				}
				$it_log = $mysqli->query("SELECT * FROM trade_log WHERE `user` = '" . $user_id . "' and `item` = '" . $ii . "' and `count` > '0'")->fetch_assoc();
				if ($it_log) {
					$mysqli->query("UPDATE trade_log SET count = count+'" . $count . "' WHERE `id` = '" . $it_log['id'] . "' ");
					$mysqli->query("UPDATE police_trade SET count = count+'" . $count . "' WHERE `id` = '" . $it_log['id'] . "' ");
					// $mysqle->query("UPDATE police_trade SET count = count+'".$count."' WHERE `id` = '".$it_log['id']."' ");
				} else {
					$mysqli->query("INSERT INTO trade_log (trade , item , user, user_to, count) VALUES ('" . $trade['id'] . "','" . $ii . "','" . $mID . "','" . $vID . "','" . $count . "') ");
					// ЛОГИ ДЛЯ ПОЛИЦЕЙСКИЙ
					$mysqli->query("INSERT INTO police_trade (date, time, trade , item , user, user_to, count) VALUES ('" . date('Y-m-d') . "','" . date('H:i:s') . "','" . $trade['id'] . "','" . $ii . "','" . $mID . "','" . $vID . "','" . $count . "') ");
					// $mysqle->query("INSERT INTO police_trade (date, time, trade , item , user, user_to, count) VALUES ('".date('Y-m-d')."','".date('H:i:s')."','".$trade['id']."','".$ii."','".$mID."','".$vID."','".$count."') ");
					// ЛОГИ ДЛЯ ПОЛИЦЕЙСКИЙ
				}
				$mysqli->query("UPDATE trade SET ok1 = '0', ok2 = '0' WHERE `id` = '" . $trade['id'] . "' ");
				$mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '" . $vID . "'");
				minus_item($count, $ii, $mID);

				echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
				return;
			} else {
				echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
				return;
			}
		} else {
			echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
			return;
		}
	} else {
		echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
		return;
	}
}
if (isset($_GET['acc'])) {
	if ($ok1 == 1) {
		$mysqli->query("UPDATE trade SET ok$ind = '0' WHERE `id` = '" . $trade['id'] . "' ");
	} else {
		$mysqli->query("UPDATE trade SET ok$ind = '1' WHERE `id` = '" . $trade['id'] . "' ");
	}
	echo "<SCRIPT>location.href='game.php?fun=m_trade_work';</SCRIPT>";
	return;
}

if ($ok1 == 1 and $ok2 == 1) {
	$trdlg = $mysqli->query('SELECT * FROM trade_log WHERE trade = ' . $trade['id']);
	while ($lg = $trdlg->fetch_assoc()) {
		if ($lg['pok'] > 0) {
			if ($lg['type'] == 1) {
				$mysqli->query("UPDATE user_pokemons SET user_id = '" . $lg['user_to'] . "', master = '" . $lg['user_to'] . "' WHERE `id` = '" . $lg['pok'] . "' ");
			} else {
				$mysqli->query("UPDATE user_pokemons SET user_id = '" . $lg['user_to'] . "' WHERE `id` = '" . $lg['pok'] . "' ");
			}
		} elseif ($lg['egg'] > 0) {
			$mysqli->query("UPDATE user_items SET user_id = '" . $lg['user_to'] . "' WHERE `id` = '" . $lg['egg'] . "' ");
		} else {
			plus_item($lg['count'], $lg['item'], $lg['user_to']);
		}
	}
	$mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '" . $mID . "'");
	$mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '" . $vID . "'");
	$mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '" . $vID . "'");
	$mysqli->query("DELETE FROM `trade_log` WHERE `trade` = '" . $trade['id'] . "'");
	$mysqli->query("DELETE FROM `trade` WHERE `id` = '" . $trade['id'] . "'");
	echo "<SCRIPT>location.href='game.php?fun=m_location';</SCRIPT>";
	return;
}

if (isset($_GET['cancel'])) {
	$trdlg = $mysqli->query('SELECT * FROM trade_log WHERE trade = ' . $trade['id']);
	while ($lg = $trdlg->fetch_assoc()) {
		if ($lg['pok'] > 0) {
			$mysqli->query("UPDATE user_pokemons SET `user_id` = '" . $lg['user'] . "' WHERE `id` = '" . $lg['pok'] . "' ");
		} elseif ($lg['egg'] > 0) {
			$mysqli->query("UPDATE user_items SET `user_id` = '" . $lg['user'] . "' WHERE `id` = '" . $lg['egg'] . "' ");
		} else {
			plus_item($lg['count'], $lg['item'], $lg['user']);
		}
	}
	$mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '" . $vID . "'");
	$mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '" . $mID . "'");
	$mysqli->query("UPDATE users SET status = 'free' WHERE `id` = '" . $vID . "'");
	$mysqli->query("UPDATE users SET reload = '1' WHERE `id` = '" . $vID . "'");
	$mysqli->query("DELETE FROM `trade_log` WHERE `trade` = '" . $trade['id'] . "'");
	$mysqli->query("DELETE FROM `police_trade` WHERE `trade` = '" . $trade['id'] . "'");
	// $mysqle->query("DELETE FROM `police_trade` WHERE `trade` = '".$trade['id']."'");
	$mysqli->query("DELETE FROM `trade` WHERE `id` = '" . $trade['id'] . "'");

	echo "<SCRIPT>location.href='game.php?fun=m_location';</SCRIPT>";
	return;
}
?>
<LINK REL=Stylesheet HREF=style.css TYPE=text/css>

<BODY ID='tab'>
	<style>
		.itemstradelist {
			display: inline-block;
			background-color: #a6caf0;
			margin: 1px;
			width: 40px;
			height: 40px;
		}

		.itemstradelist>img {
			width: 32;
			height: 32;
			visibility: visible;
			border: 1px solid #a6caf0;
			margin: 3px;
		}
	</style>
	<script>
		function defPosition(event) { // координаты мыши
			var x = y = 0;
			if (document.attachEvent != null) {
				x = window.event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
				y = window.event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
			} else if (!document.attachEvent && document.addEventListener) {
				x = event.clientX + window.scrollX;
				y = event.clientY + window.scrollY;
			} else {
				// Do nothing
			}
			return {
				x: x,
				y: y
			};
		}

		page = 0;
		invType = 0;

		function tip(event, ID) {
			if (event) {
				document.getElementById('divTip').style.left = defPosition(event).x + 15;
				document.getElementById('divTip').style.top = defPosition(event).y + 10;
				document.getElementById('divTip').innerHTML = ID;
				document.getElementById('divTip').style.visibility = 'visible';
			} else document.getElementById('divTip').style.visibility = 'hidden';
		}

		function pic(ID, sitID, am, uw, dr, idd) {
			for (s = 0; s < document.images.length; s++)
				document.images[s].style.border = '1px solid #aecff1';
			document.getElementById("pic" + ID).style.border = '1px solid black';
			document.getElementById('formit')['itID'].value = sitID;
			document.getElementById('formit')['amount'].value = am;
			document.getElementById('formit')['but1'].style.display = (uw ? 'inline' : 'none');
			document.getElementById('formit')['but2'].style.display = (dr ? 'inline' : 'none');
			if (idd == 298) {
				document.getElementById('formit')['eggs'].style.display = (uw || dr ? 'block' : 'none');
				document.getElementById('formit')['pokes'].style.display = 'none';
			} else {
				document.getElementById('formit')['pokes'].style.display = (uw || dr ? 'block' : 'none');
			}
			eval("CURpic.src=pic" + ID + ".src");
			CURname.innerHTML = document.getElementById('divTip').innerHTML;
		}

		function formatnum(str) {
			str = str + '';
			var retstr = '';
			var now = 0;
			for (j = str.length - 1; j >= 0; j--) {
				if (now < 3) {
					now++;
					retstr = str.charAt(j) + retstr;
				} else {
					now = 1;
					retstr = str.charAt(j) + '.' + retstr;
				}
			}
			return retstr;
		}
		<?php
		$cMyItm =  $mysqli->query("SELECT * FROM `user_items` WHERE `user_id`='" . $user_id . "'");
		$ami = $cMyItm->num_rows;
		?>
		itemsamount = <?= $ami; ?>;
		i = new Array(<?= $ami; ?>);
		<?php
		$i = -1;
		$allMyIT = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id`='" . $user_id . "'");
		while ($allM = $allMyIT->fetch_assoc()) {
			$i = $i + 1;
			$base = $mysqli->query('SELECT * FROM base_items WHERE id = ' . $allM['item_id'])->fetch_assoc();
			if ($allM['egg'] == 1) {
				$egg = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '" . $allM['pok'] . "' LIMIT 1")->fetch_assoc();
				$base["name"] = $egg["name"];
				$reb = round(($allM['reborn'] - time()) / 86400);
				$reb = " [До вылупления " . $reb . " дн. Генокод: H" . $allM['hp'] . "A" . $allM['atk'] . "D" . $allM['def'] . "S" . $allM['speed'] . "SA" . $allM['satk'] . "SD" . $allM['sdef'] . "]";
				$base['about'] = $reb;
			}

			if ($allM['item_id'] == 231) {
				$oldbell = $mysqli->query("SELECT * FROM base_items WHERE `id` = '" . $allM['item_id'] . "' LIMIT 1")->fetch_assoc();
				$base["name"] = $oldbell["name"];
				$itmdl = round(($allM['timedel'] - time()) / 86400);
				$itmdl = "Находясь у вас в инвентаре колокольчик издаёт звук, который привлекает особых покемонов, таким образом шанс встретить шайни увеличивается в 3 раза. [До поломки " . $itmdl . " дн.]";
				$base['about'] = $itmdl;
			}
			if ($allM['item_id'] == 241) {
				$oldbell = $mysqli->query("SELECT * FROM base_items WHERE `id` = '" . $allM['item_id'] . "' LIMIT 1")->fetch_assoc();
				$base["name"] = $oldbell["name"];
				$itmdl = round(($allM['timedel'] - time()) / 86400);
				$itmdl = "Ваш шанс встретить очень редких покемонов увеличивается в 2 раза. [До поломки " . $itmdl . " дн.]";
				$base['about'] = $itmdl;
			}



		?>
			i[<?= $i; ?>] = new Array(<?= $allM['id']; ?>, <?= $allM['item_id']; ?>, <?= $allM['count']; ?>, 1, '<?= $base["name"]; ?>', <?= $base['dress']; ?>, 'Вес: <?= $base["weight"]; ?><br><?= $base['about']; ?>', <?= $base['use']; ?>, 0);
		<?php } ?>

		function fillupinv() {
			p = page * 40;
			content = "";
			prints = 1;
			while (prints <= 40 && i[p]) {
				if (invType == 0 || i[p][8] == invType) {
					picF = i[p][1] + '.gif';
					i[p][15] = i[p][4] + ' <b><small>x</small>' + formatnum(i[p][2]) + '</b>';
					if (i[p][6]) i[p][15] += '<br><span class=itemdescr>' + i[p][6] + '</span>';
					content += "<div class=item><img class='item' ID=\"pic" + p + "\" src=\"/img/items/" + picF + "\" onClick=\"pic(" + p + "," + i[p][0] + "," + i[p][2] + "," + i[p][3] + "," + i[p][5] + "," + i[p][1] + ")\" onMouseMove=\"tip(event," + p + ");\" onMouseOut=\"tip(0); \"></div>";
					prints++;
				}
				p++;
			}
			for (k = prints; k <= 40; k++) content += "<div class=item><img src='/img/items/blank.gif'></div>";
			document.getElementById('inv').innerHTML = content;
			if (page > 0) {
				document.getElementById('divprev').innerHTML = "<a href='javascript:' onclick='page--;fillupinv();'><<</a>";
			} else {
				document.getElementById('divprev').innerHTML = "<span style='color:#92b1dd'>&lt;&lt;</span>";
			}
			if (itemsamount > p) {
				document.getElementById('divnext').innerHTML = "<a href='javascript:' onclick='page++;fillupinv();'>>></a>";
			} else {
				document.getElementById('divnext').innerHTML = "<span style='color:#92b1dd'>&gt;&gt;</span>";
			}
		}

		function use_item(tip) {
			$('#add').val(tip);
			$('#formit').submit();
		}
	</script>
	<div id="divTip"></div>
	<span id='txt'>

		<TABLE>
			<TR>
				<TD>
					<div id='itemscontainer'>
						<DIV id='tip'></div>
						<DIV id='realitemscontainer'>
							<TABLE border=0>
								<TR style='BACKGROUND-COLOR:#aecff1; height:36;'>
									<TD>
										<div class="item">
											<?php
											$itmUser = $mysqli->query('SELECT * FROM user_items WHERE user_id = ' . $user_id);
											while ($itmUsers = $itmUser->fetch_assoc()) {
												$egg_id = 0;
												$itm = $mysqli->query("SELECT * FROM base_items WHERE  `id` = '" . $itmUsers['item_id'] . "' and `trade` = '0'")->fetch_assoc();
												if ($itmUsers['egg'] == 1) {
													$egg = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '" . $itmUsers['pok'] . "' LIMIT 1")->fetch_assoc();
													$itm['name'] = $itm['name'] . " " . $egg['name'];
													$egg_id = $itmUsers["id"];
												}
											?>
												<div class="itemstradelist">
													<img border='0' src='img/items/<?= $itmUsers['item_id']; ?>.gif' onMouseOut='tip(event,0);this.border=0;' onMouseMove='tip(event,"<?= $itm['name']; ?>&nbsp;<b><small>x</small><?= price($itmUsers['count']); ?></b>");this.border=1;' onClick="pic.src=this.src;document.getElementById('itemamount').innerHTML='<b><small>x</small><?= price($itmUsers['count']); ?></b>';document.getElementById('itemname').innerHTML='<?= $itm['name']; ?>';document.Sell.ItemID.value='<?= $itm["id"]; ?>';document.Sell.egg.value='<?= $egg_id; ?>'" style='CURSOR:POINTER' width='32' height='32' id='itemimg<?= $itmUsers["id"]; ?>'>
												</div>
											<?php } ?>
										</div>
									</TD>
								</TR>
							</TABLE>
						</div>
					</div>
				</TD>
				<TD valign=top>
					<TABLE>
						<TR>
							<TD width="200">
								<form name="Sell" id="sellform" action="game.php?fun=m_trade_work" method="post">
									<input name="ItemID" type="hidden" value="1">
									<input name="egg" type="hidden" value="0">
									<img src="/img/items/blank.gif" width="32" height="32" alt="" border=0 name="pic" ID="pic">
									<DIV id="itemname" style='display:inline;'>&nbsp;</DIV>
									&nbsp;<DIV id="itemamount" style='display:inline;'>&nbsp;</DIV><br>
									<input name="amount" type="text" value="1" style='width:70px' onClick="this.select()" maxlength="15" onkeyup="test_amount();">
									<input type="submit" value=">>" id="btnadd"><BR>
								</form>
							</TD>
						</TR>
						<TR>
							<TD>
								&nbsp;<P>
									<?php if ($ok1 == 0) { ?>
										<input type=button id='b_acc' value=ПОДТВ style="width:100;" onclick="window.location='game.php?fun=m_trade_work&acc=1';"><BR>
									<?php } else { ?>
										<input type=button id='b_deacc' value=ОТКАЗ style="width:100;" onclick="window.location='game.php?fun=m_trade_work&acc=1';">
									<?php } ?>
								<P>
									<input type="button" value="ВЫЙТИ" style="width:100" onclick="window.location='game.php?fun=m_trade_work&cancel=1';"><BR>
							</TD>
						</TR>
					</TABLE>
				</TD>
				<TD valign=top style="background: #BBD6F1; width:300px; padding: 10px; height:285px; overflow: auto;">
					<CENTER>
						<font color='<?= colorsUsers(infUsr($mID, "groups")); ?>'><b><?= infUsr($mID, "login"); ?></b></font>
					</center>
					<?php if ($ok1 == 1) { ?><DIV ID="my_ac" style="height:15; color:green; font-weight:bold;" class=a>ГОТОВ</DIV><?php } ?>
					<DIV ID="my" class=a>
						<?php
						$tlg = $mysqli->query('SELECT * FROM trade_log WHERE trade = ' . $trade['id'] . ' and user = ' . $mID);
						while ($tl = $tlg->fetch_assoc()) {
							if ($tl['pok'] > 0) {
								$infTP = $mysqli->query('SELECT * FROM user_pokemons WHERE id = ' . $tl['pok'])->fetch_assoc();
						?>
								<a href='game.php?fun=m_trade_work&back=<?= $tl['id']; ?>'><img src=img/cancel.png border=0 alt='Вернуть' title='Вернуть'></a>
								<a HREF=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?= $infTP['basenum']; ?>","dex","width=600,height=600,scrollbars=yes");><img src=img/pkmna/<?= numbPok($infTP['basenum']); ?>.gif border=0 alt=Покедекс title=Покедекс></a><a href=javascript: title=Информация onclick=window.open("game.php?fun=pokeinf&p_id=<?= $infTP['id']; ?>","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");>#<?= numbPok($infTP['basenum']) . " " . $infTP['name'] . " " . $infTP['lvl'] . "-lvl" . " " . $infTP['type']; ?> </a> <?php if ($tl['type'] == 0) {
																																																																																																																																												echo "<b><font color=red>ВРЕМЕННАЯ ПЕРЕДАЧА</font></b>";
																																																																																																																																											} ?><br>
							<?php } elseif ($tl['egg'] > 0) {
								$itmUser = $mysqli->query('SELECT * FROM user_items WHERE id = ' . $tl['egg'])->fetch_assoc();
								$negg = $mysqli->query('SELECT name FROM base_pokemon WHERE id = ' . $itmUser['pok'])->fetch_assoc();

							?>
								<a href='game.php?fun=m_trade_work&back=<?= $tl['id']; ?>'><img src=img/cancel.png border=0 alt='Вернуть' title='Вернуть'></a>
								<img border='0' src='img/items/999.gif'> Яйцо <?= $negg['name']; ?> x1<br>
							<?php
							} else {
								$infTI = $mysqli->query('SELECT * FROM base_items WHERE id = ' . $tl['item'])->fetch_assoc();
							?>
								<a href='game.php?fun=m_trade_work&back=<?= $tl['id']; ?>'><img src=img/cancel.png border=0 alt='Вернуть' title='Вернуть'></a>
								<img border='0' src='img/items/<?= $infTI['id']; ?>.gif'> <?= $infTI['name']; ?> x<?= price($tl['count']); ?><br>
						<?php
							}
						} ?>
					</DIV>
					</CENTER>
				</TD>
				</TD>
				<TD valign=top style="background: #BBD6F1; width:300px; padding: 10px; max-height:285px; overflow: auto;">
					<CENTER>
						<font color='<?= colorsUsers(infUsr($vID, "groups")); ?>'><b><?= infUsr($vID, "login"); ?></b></font>
					</center>
					<?php if ($ok2 == 1) { ?><DIV ID="his_ac" style="height:15; color:green; font-weight:bold;" class=a>ГОТОВ</DIV><?php } ?>
					<DIV ID="his" class="a">
						<?php
						$tlg2 = $mysqli->query('SELECT * FROM trade_log WHERE trade = ' . $trade['id'] . ' and user = ' . $vID);
						while ($tl2 = $tlg2->fetch_assoc()) {
							if ($tl2['pok'] > 0) {
								$infTP2 = $mysqli->query('SELECT * FROM user_pokemons WHERE id = ' . $tl2['pok'])->fetch_assoc();
						?>
								<a HREF=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?= $infTP2['basenum']; ?>","dex","width=600,height=600,scrollbars=yes");> <?php if ($tl2['type'] == 1) { ?><img src=img/trade_star.png border=0 alt='' title=''><?php } ?><img src=img/pkmna/<?= numbPok($infTP2['basenum']); ?>.gif border=0 alt=Покедекс title=Покедекс></a><a href=javascript: title=Информация onclick=window.open("game.php?fun=pokeinf&p_id=<?= $infTP2['id']; ?>","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");>#<?= numbPok($infTP2['basenum']) . " " . $infTP2['name'] . " " . $infTP2['lvl'] . "-lvl" . " " . $infTP2['type']; ?> </a> <?php if ($tl2['type'] == 0) {
																																																																																																																																																																						echo "<b><font color=red>ВРЕМЕННАЯ ПЕРЕДАЧА</font></b>";
																																																																																																																																																																					} ?><br>
							<?php } elseif ($tl2['egg'] > 0) {
								$itmUser = $mysqli->query('SELECT * FROM user_items WHERE id = ' . $tl2['egg'])->fetch_assoc();
								$negg = $mysqli->query('SELECT name FROM base_pokemon WHERE id = ' . $itmUser['pok'])->fetch_assoc();

							?>
								<img border='0' src='img/items/999.gif'> Яйцо <?= $negg['name']; ?> x1<br>
							<?php
							} else {
								$infTI2 = $mysqli->query('SELECT * FROM base_items WHERE id = ' . $tl2['item'])->fetch_assoc();
							?>
								<img border='0' src='img/items/<?= $infTI2['id']; ?>.gif'> <?= $infTI2['name']; ?> x<?= price($tl2['count']); ?><br>
						<?php
							}
						} ?>
					</DIV>
				</TD>
			</TR>
		</TABLE>

		<b ID=txt>Покемоны:</b>
		<?php
		$trdP = $mysqli->query('SELECT * FROM user_pokemons WHERE user_id = ' . $mID . ' and active = 1 and starts = 0 and trade = 0');
		while ($trp = $trdP->fetch_assoc()) {
			if ($trp['master'] == $mID or $trp['master'] == $vID) {
		?>
				<br>
				<?php if ($trp['master'] == $vID) { ?>
					<a href='game.php?fun=m_trade_work&master=1&p_id=<?= $trp['id']; ?>'><img src=img/trade_master.png border=0 alt='Передать новому Хозяину' title='Передать новому Хозяину'></a>
				<?php } else { ?>
					<a href='game.php?fun=m_trade_work&master=1&p_id=<?= $trp['id']; ?>'><img src=img/trade_master.png border=0 alt='Передать новому Хозяину' title='Передать новому Хозяину'></a>
					<a href='game.php?fun=m_trade_work&p_id=<?= $trp['id']; ?>'><img src=img/trade_temp.png border=0 title='Передать временно' alt='Передать временно'></a>
				<?php } ?>
				<a HREF=javascript: onClick=win1=window.open("pokedex.php?sp_id=<?= $trp['basenum']; ?>","dex","width=600,height=600,scrollbars=yes");><img src=img/pkmna/<?= numbPok($trp['basenum']); ?>.gif border=0 alt=Покедекс title=Покедекс></a><a href=javascript: title=Информация onclick=window.open("game.php?fun=pokeinf&p_id=<?= $trp['id']; ?>","pokeinf","fullscreen=no,scrollbars=yes,width=520,height=250");>#<?= numbPok($trp['basenum']) . " " . $trp['name'] . " " . $trp['lvl'] . "-lvl" . " " . $trp['type']; ?> </a>
		<?php }
		} ?>
</body>