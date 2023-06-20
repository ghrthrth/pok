<?php
ini_set("display_errors", 0);
switch ($item['kachestvo']) {
    case 'Добротное':
      $use = Craft($_SESSION['user_id']);
    break;
}
switch ($item['categories']) {
//	case  1:
//		die("<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>");
//		break;
	case  2:
		$use = hpUp($pok_id, $item['id']);
		break; #Регенераторы
	case  4:
		$use = statusClear($pok_id, $item['id']);
		break; #Снятие статусов
	case  5:
		$use = ppUp($pok_id, $item['id']);
		break; #Поднятие pp (Эликсиры)
	case  6:
		$use = lvlUp($pok_id, $item['id']);
		break; #Конфеты для поднятия уровня
	case  7:
		$use = EvolutionPok($pok_id, $item['id']);
		break; #Камни эволюций
	case  8:
		$use = Train($pok_id, $item['id']);
		break; #Набор тренировки
	case  9:
		$use = uStat($item['id']);
		break; #Увеличители опыта, монет, дропа
	case  10:
		$use = ShinyGet($pok_id, $item['id']);
		break; #Краска
	case  11:
		$use = GoBox($_SESSION['user_id']);
		break; #Ящики
	case  12:
		$use = ClanOrder();
		break; #Клан ордер
	case  13:
		$use = sweetYag($pok_id);
		break; #Ягода
	case  16:
		$use = Vitamin($pok_id, $item['id']);
		break; #Ягода
	case  18:
		$use = TM($pok_id, $item['id']);
		break; #Ягода
	case  19:
		$use = Ticet($item['id']);
		break; #Билеты
	case  20:
		$use = Inkub($egg_id);
		break; #Инкубатор
	case  21:
		$use = unTrain($pok_id, $item['id']);
		break; #Набор ослабления
	case  22:
		$use = Bottle($item['id']);
		break; #Вода
	case  23:
		$use = BigSmiles($item['id']);
		break; #Расширеные смайлики
	case  24:
		$use = Everstone($item['id'], $pok_id);
		break; #Расширеные смайлики
	case  33:
		$use = Cardsdeck($item['id']);
		break; #Рандом карта
	case  26:
		$use = Ticet1($item['id']);
		break; #Билеты
	case  27:
		$use = Ticet2($item['id']);
		break; #Билеты
	case  28:
		$use = Event($item['id']);
		break; #Ивент рандом
	case  30:
		$use = Kekutan($item['id']);
		break; #Зелье Кекутан
	case  31:
		$use = GoEventEgg($item['id']);
		break;  #Загадочное яйцо покемона
	case  32:
		$use = GoBox2($_SESSION['user_id']);
		break; #Ящики
	case  35:
		$use = GoBox3($_SESSION['user_id']);
		break; #Ящики
	case  34:
		$use = Deck($item['id']);
		break; #Рандом карта
	case  36:
		$use = noAgro($item['id']);
		break; #Пакт о ненападении
	case  37:
		$use = testNewDeck($item['id']);
		break; #Случайные карты
	case  38:
		$use = boxwithdrugs($item['id']);
		break; #Случайные карты
	case  39:
		$use = championBox($item['id']);
		break; #НаборЧемпиона
	case  40:
		$use = conquerloc($item['id']);
		break; #Ордер захвата локации
	case  41:
		$use = xmaxPresent($item['id']);
		break; #Новогодний подарок
	case  42:
		$use = emeraldDeck($item['id']);
		break; #Изумрудка
	case  43:
		$use = sapphfireDeck($item['id']);
		break; #Сапфирка
	case  44:
		$use = culichGenUp($pok_id, $item['id']);
		break; #Пасхальный кулич
}

switch ($item['id']) {
	case 258:
		$use = ClanEblems();
		break; #Эмблемная книга
	case 288:
		$use = Aprikorn($pok_id);
		break; #Корень априкорна
	case 160:
		$use = Blank($pok_id);
		break; #Именной бланк
	case 1027:
		$use = transsex($pok_id);
		break; #Транс
	case 447:
		$use = paskhaEgg($item['id']);
		break; #Пасхальное яйцо
}


die("<body style='background: #a6caf0;'><center>" . $_SESSION['TEXT_ITEMS_USE'] . "</center></body>");

#Функция регенераторов
function hpUp($pok_id, $item_id)
{
	global $mysqli;
	$poks = $mysqli->query('SELECT * FROM user_pokemons WHERE id = ' . $pok_id)->fetch_assoc();
	switch ($item_id) {
		case 38:
			$hp = $poks['hp'] + 10;
			break;
		case 50:
			$hp = $poks['hp'] + 50;
			break;
		case 51:
			$hp = $poks['hp'] + 100;
			break;
		case 29:
			$hp = $poks['hp'] + 500;
			break;
		default:
			die('Ошибка!');
	}
	if ($hp > $poks['hp_max']) $hp = $poks['hp_max'];
	$mysqli->query('UPDATE user_pokemons SET hp = ' . $hp . ' WHERE id = ' . $pok_id . ' AND user_id = ' . $_SESSION['user_id']);
	minus_item(1, $item_id);
	$_SESSION['TEXT_ITEMS_USE'] = 'Жизненные силы восстановлены!';
}

function ppUp($pok_id, $item_id)
{
	global $mysqli;
	$poks = $mysqli->query('SELECT * FROM user_pokemons WHERE id = ' . $pok_id)->fetch_assoc();
	if ($item_id == 15 or $item_id == 16 or $item_id == 17) {
		$pp1 = $poks['pp1'] + 10;
		$pp2 = $poks['pp2'] + 10;
		$pp3 = $poks['pp3'] + 10;
		$pp4 = $poks['hp4'] + 10;
		$ai1 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $poks['atk1'] . "'")->fetch_assoc();
		$ai2 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $poks['atk2'] . "'")->fetch_assoc();
		$ai3 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $poks['atk3'] . "'")->fetch_assoc();
		$ai4 = $mysqli->query("SELECT atac_pp FROM base_attacks WHERE `atac_id` = '" . $poks['atk4'] . "'")->fetch_assoc();
	} else {
		die('Ошибка!');
	}
	if ($pp1 > $ai1['atac_pp']) {
		$pp1 = $ai1['atac_pp'];
	}
	if ($pp2 > $ai2['atac_pp']) {
		$pp2 = $ai2['atac_pp'];
	}
	if ($pp3 > $ai3['atac_pp']) {
		$pp3 = $ai3['atac_pp'];
	}
	if ($pp4 > $ai4['atac_pp']) {
		$pp4 = $ai4['atac_pp'];
	}
	$mysqli->query("UPDATE user_pokemons SET `pp1`='$pp1',`pp2`='$pp2',`pp3`='$pp3',`pp4`='$pp4' WHERE id = '.$pok_id.' AND user_id = '" . $_SESSION['user_id']);
	minus_item(0, $item_id);
	$_SESSION['TEXT_ITEMS_USE'] = 'Даный предмет можно использовать только в Бою!';
}


function Blank($pok_id)
{
	global $mysqli;
	minus_item(1, 160);
	$mysqli->query("UPDATE user_pokemons SET name_new = '', nn = 0 WHERE id = '" . $pok_id . "' AND active = 1");
	return $_SESSION['TEXT_ITEMS_USE'] = 'Вы удачно использовали Именной бланк!';
}
function culichGenUp($pok_id, $item_id)
{
	global $mysqli;
	minus_item(1, 448);
	$takeGen = $mysqli->query("SELECT * FROM user_pokemons WHERE id = ". $pok_id ." AND active = 1")->fetch_assoc();
	$mysqli->query("UPDATE user_pokemons SET hp_gen = '".$takeGen['hp_gen']."' + 3, atc_gen = '".$takeGen['atc_gen']."' + 3, def_gen = '".$takeGen['def_gen']."' + 3, speed_gen = '".$takeGen['speed_gen']."' + 3, spatc_gen = '".$takeGen['spatc_gen']."' + 3, spdef_gen = '".$takeGen['spdef_gen']."' + 3 WHERE id = '" . $pok_id . "' AND active = 1");
	return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон повысил весь свой генокод на +3!';
}
#Функция конфет
function lvlUp($pok_id, $item_id)
{
	global $mysqli;
	$pok = $mysqli->query('SELECT * FROM user_pokemons WHERE id = ' . $pok_id . ' AND active = 1')->fetch_assoc();
	if (!$pok || $pok['lvl'] >= 100) {
		$_SESSION['TEXT_ITEMS_USE'] = 'Покемон выплюнул конфету обратно.';
	} else {
		switch ($item_id) {
			case 309:
				#Ванильная конфета
				$ev_plus = 2;
				switch ($pok['item_id']) {
					case 27:
						$ev_plus = 3;
						break;
					case 42:
						$ev_plus = 3;
						break;
					case 1043:
						$ev_plus = 3;
						break;
				}
				break;
			case 269:
				#Сладкая конфета
				$ev_plus = 4;
				$mysqli->query("UPDATE user_pokemons SET `trade` = '1' WHERE id='" . $pok_id . "'");
				break;
			case 41:
				#Леденец
				$ev_plus = 1;
				break;
		}
		$ev_up = $pok['ev'] + $ev_plus;
		$lvl_up = $pok['lvl'] + 1;

		$myLvl = $lvl_up + 1;

		$exp_g = $mysqli->query('SELECT exp_group FROM base_pokemon WHERE id = ' . $pok['basenum'])->fetch_assoc();
		switch ($exp_g['exp_group']) {
			case 1:
			case 2: // Быстрый
				$nexp_m = 4 * pow($myLvl, 3) / 5;
				break;

			case 3:
			case 4: // Средний
				$nexp_m = pow($myLvl, 3);
				break;

			case 5:  // Средний медленный
				$nexp_m = 1.2 * pow($myLvl, 3) - 15 * pow($myLvl, 2) + 100 * $myLvl - 140;
				break;

			case 6:
			case 0: // Медленный
				$nexp_m = 5 * pow($myLvl, 3) / 4;
				break;
		}
		$mysqli->query('UPDATE user_pokemons SET lvl = ' . $lvl_up . ', exp = 0, exp_max = ' . $nexp_m . ', ev = ' . $ev_up . ' WHERE id = ' . $pok_id . ' AND active = 1');
		$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='" . $pok['basenum'] . "' and atc_lvl='" . $lvl_up . "'");
		while ($an = $newAtc->fetch_assoc()) {
			$mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('" . $an['atac_id'] . "','" . $pok['id'] . "') ");
		}
		$pok2 = $mysqli->query('SELECT * FROM user_pokemons WHERE id = ' . $pok_id . ' AND active = 1')->fetch_assoc();
		include('evolution.php');
		Evolution($pok2);
		minus_item(1, $item_id);
		$_SESSION['TEXT_ITEMS_USE'] = 'Уровень успешно повышен';
	}
}

#Функция эволюций покемонов
function EvolutionPok($pok_id, $item_id, $population)
{
	global $mysqli;
	$pok_info = $mysqli->query('SELECT * FROM user_pokemons WHERE id = ' . $pok_id)->fetch_assoc();
	$population1 = $mysqli->query('SELECT * FROM users WHERE population > 599 and id = ' . $_SESSION['user_id'])->fetch_assoc();
	$winpr = $mysqli->query('SELECT * FROM users WHERE (win/btl_count)*100 > 70 and id = ' . $_SESSION['user_id'])->fetch_assoc();
	$basenum = $pok_info['basenum'];
	if ($item_id == 32) {
		#Броня
		if ($basenum == 95) {
			$pok_number = 208;
		} elseif ($basenum == 123) {
			$pok_number = 212;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 25) {
		#Корона
		if ($basenum == 80) {
			$pok_number = 199;
		} elseif ($basenum == 61) {
			$pok_number = 186;
		} elseif ($basenum == 79) {
			$pok_number = 199;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 131) {
		#Огненный камень
		if ($basenum == 37) {
			#Вульпикс
			$pok_number = 38;
		} elseif ($basenum == 58) {
			#Гроули
			$pok_number = 59;
		} elseif ($basenum == 133) {
			#Иви
			$pok_number = 136;
		} elseif ($basenum == 513) {
			$pok_number = 514;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 133) {
		#Лиственный камень
		if ($basenum == 102) {
			#Экзегут
			$pok_number = 103;
		} elseif ($basenum == 44) {
			#Глум
			$pok_number = 45;
		} elseif ($basenum == 70) {
			#Випенбелл
			$pok_number = 71;
		} elseif ($basenum == 274) {
			$pok_number = 275;
		} elseif ($basenum == 511) {
			$pok_number = 512;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 135) {
		#Лунный камень
		if ($basenum == 35) {
			#Клефайри
			$pok_number = 36;
		} elseif ($basenum == 39) {
			#Джиглипаф
			$pok_number = 40;
		} elseif ($basenum == 30) {
			#Нидорина
			$pok_number = 31;
		} elseif ($basenum == 33) {
			#Нидорино
			$pok_number = 34;
		} elseif ($basenum == 300) {
			$pok_number = 301;
		} elseif ($basenum == 517) {
			$pok_number = 518;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 136) {
		#Солнечный камень
		if ($basenum == 44) {
			#Глум
			$pok_number = 182;
		} elseif ($basenum == 191) {
			#Санкерн
			$pok_number = 192;
		} elseif ($basenum == 546) {
			#Санкерн
			$pok_number = 547;
		} elseif ($basenum == 548) {
			#Санкерн
			$pok_number = 549;
		} elseif ($basenum == 694) {
			#Санкерн
			$pok_number = 695;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 134) {
		#Громовой камень
		if ($basenum == 133) {
			#Иви
			$pok_number = 135;
		} elseif ($basenum == 25) {
			#Пикачу
			$pok_number = 26;
		} elseif ($basenum == 603) {
			#Электросс
			$pok_number = 604;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 132) {
		#Водный камень
		if ($basenum == 133) {
			#Иви
			$pok_number = 134;
		} elseif ($basenum == 61) {
			#Поливирл
			$pok_number = 62;
		} elseif ($basenum == 90) {
			#Шелдер
			$pok_number = 91;
		} elseif ($basenum == 120) {
			#Старью
			$pok_number = 121;
		} elseif ($basenum == 271) {
			#Ломбре
			$pok_number = 272;
		} elseif ($basenum == 515) {
			#Папур
			$pok_number = 516;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 143 and $population1) {

		#Эвольвер счастья
		if ($basenum == 42) {
			#Голбат
			$pok_number = 169;
		} else
		if ($basenum == 113) {
			$pok_number = 242;
		} else
		if ($basenum == 133) {
			if (date("G") >= 8 and date("G") <= 22) {
				$timeday = 1;
			} else {
				$timeday = 2;
			}
			if ($timeday == 1) {
				$pok_number = 196;
			} else {
				$pok_number = 197;
			}
		} else
		if ($basenum == 172) {
			$pok_number = 25;
		} else
		if ($basenum == 173) {
			$pok_number = 35;
		} else
		if ($basenum == 174) {
			$pok_number = 39;
		} else
		if ($basenum == 175) {
			$pok_number = 176;
		} else
		if ($basenum == 298) {
			$pok_number = 183;
		} else
		if ($basenum == 406) {
			$pok_number = 315;
		} else
		if ($basenum == 349) {
			$pok_number = 350;
		} else
		if ($basenum == 427) {
			$pok_number = 428;
		} else
		if ($basenum == 433) {
			$pok_number = 358;
		} else
		if ($basenum == 446) {
			$pok_number = 143;
		} else
		if ($basenum == 447) {
			$pok_number = 448;
		} else
		if ($basenum == 527) {
			$pok_number = 528;
		} else
		if ($basenum == 541) {
			$pok_number = 542;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 295) {
		#Эвольвер знаний
		if ($basenum == 108) {
			$pok_number = 463;
		} elseif ($basenum == 114) {
			$pok_number = 465;
		} elseif ($basenum == 438) {
			$pok_number = 185;
		} elseif ($basenum == 190) {
			$pok_number = 424;
		} elseif ($basenum == 193) {
			$pok_number = 469;
		} elseif ($basenum == 221) {
			$pok_number = 473;
		} elseif ($basenum == 439) {
			$pok_number = 122;
		} elseif ($basenum == 686) {
			$pok_number = 687;
		} elseif ($basenum == 133) {
			$pok_number = 700;
		} elseif ($basenum == 854) {
			$pok_number = 855;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 1031) {
		# Эволвер Локации
		if ($basenum == 133) {
			if (date("G") >= 8 and date("G") <= 22) {
				$timeday = 1;
			} else {
				$timeday = 2;
			}
			if ($timeday == 1) {
				$pok_number = 470;
			} else {
				$pok_number = 471;
			}
		} elseif ($basenum == 82) {
			$pok_number = 462;
		} elseif ($basenum == 299) {
			$pok_number = 476;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 139) {
		# Чешуя дракона
		if ($basenum == 117) {
			$pok_number = 230;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 137) {
		# Глубоководный зуб
		if ($basenum == 366) {
			$pok_number = 367;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 138) {
		# Глубоководная чешуя
		if ($basenum == 366) {
			$pok_number = 368;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 140) {
		if ($basenum == 137) {
			$pok_number = 233;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 252) {
		if ($basenum == 233) {
			$pok_number = 474;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 251) {
		if ($basenum == 440) {
			$pok_number = 113;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 302) {
		if ($basenum == 112) {
			$pok_number = 464;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 303) {
		if ($basenum == 215) {
			$pok_number = 461;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 304) {
		if ($basenum == 125) {
			$pok_number = 466;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 305) {
		if ($basenum == 126) {
			$pok_number = 467;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 307) {
		if ($basenum == 356) {
			$pok_number = 477;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 246) {
		if ($basenum == 176) {
			$pok_number = 468;
		} else
			if ($basenum == 315) {
			$pok_number = 407;
		} else
			if ($basenum == 572) {
			$pok_number = 573;
		} else
			if ($basenum == 670) {
			$pok_number = 671;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 247) {
		if ($basenum == 198) {
			$pok_number = 430;
		} else
			if ($basenum == 200) {
			$pok_number = 429;
		} else
			if ($basenum == 608) {
			$pok_number = 609;
		} else
			if ($basenum == 680) {
			$pok_number = 681;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 253) {
		if ($basenum == 281) {
			$pok_number = 475;
		} else
			if ($basenum == 361) {
			$pok_number = 478;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} elseif ($item_id == 306) {
		if ($basenum == 207) {
			$pok_number = 472;
		} else
			if ($basenum == 215) {
			$pok_number = 461;
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
		}
	} else {
		return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка эволюции!';
	}

	$pdex = $mysqli->query("SELECT * FROM `base_pokemon` WHERE `id` = '" . $pok_number . "'")->fetch_assoc();
	$mysqli->query("UPDATE user_pokemons SET `basenum` = '" . $pok_number . "',`numbpu` = '" . $pok_number . "',`name`='" . $pdex['name'] . "' WHERE id='" . $pok_id . "'");
	$newAtc = $mysqli->query("select * from attack_learn WHERE `poke_base_id`='" . $pok_number . "' and atc_lvl='" . $pok_info['lvl'] . "'");
	while ($an = $newAtc->fetch_assoc()) {
		$mysqli->query("INSERT INTO mypok_learn (atk , pok) VALUES ('" . $an['atac_id'] . "','" . $pok_id . "') ");
	}
	minus_item(1, $item_id);
	stat_updates($pok_id);
	$_SESSION['TEXT_ITEMS_USE'] = 'Покемон успешно эволюционировал!';
}
#Функция тренировок
function Train($pok_id, $item_id)
{
	global $mysqli;
	minus_item(1, $item_id);
	$pk = $mysqli->query('SELECT * FROM user_pokemons WHERE id = ' . $pok_id)->fetch_assoc();
	if ($_SESSION['user_id'] == 37) {
		if ($pk['trn'] == 0) {
			if (rand(1, 100) <= 100) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '1',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				$_SESSION['TEXT_ITEMS_USE'] = 'Тренировка прошла успешно!';
			} else {
				$_SESSION['TEXT_ITEMS_USE'] = 'Тренировка не удалась!';
			}
		} elseif ($pk['trn'] == 1) {
			if (rand(1, 100) <= 100) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '2',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка прошла успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка не удалась!';
			}
		} elseif ($pk['trn'] == 2) {
			if ((rand(1, 100) <= 100)) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '3',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка прошла успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка не удалась!';
			}
		} elseif ($pk['trn'] == 3) {
			if (rand(1, 100) <= 100) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '4',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка прошла успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка не удалась!';
			}
		} elseif ($pk['trn'] == 4) {
			if (rand(1, 100) <= 100) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '5',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка прошла успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка не удалась!';
			}
		} elseif ($pk['trn'] == 5) {
			if (rand(1, 100) <= 100) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '6', `trade` = '1', `trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка прошла успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка не удалась!';
			}
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка не удалась!';
		}
	} else {
		if ($pk['trn'] == 0) {
			if (rand(1, 100) <= 90) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '1',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				$_SESSION['TEXT_ITEMS_USE'] = 'Тренировка прошла успешно!';
			} else {
				$_SESSION['TEXT_ITEMS_USE'] = 'Тренировка не удалась!';
			}
		} elseif ($pk['trn'] == 1) {
			if (rand(1, 100) <= 55) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '2',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка прошла успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка не удалась!';
			}
		} elseif ($pk['trn'] == 2) {
			if ((rand(1, 100) <= 20)) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '3',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка прошла успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка не удалась!';
			}
		} elseif ($pk['trn'] == 3) {
			if (rand(1, 100) <= 7) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '4',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка прошла успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка не удалась!';
			}
		} elseif ($pk['trn'] == 4) {
			if (rand(1, 100) <= 3) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '5',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка прошла успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка не удалась!';
			}
		} elseif ($pk['trn'] == 5) {
			if (rand(1, 100) <= 1) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '6', `trade` = '1', `trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка прошла успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка не удалась!';
			}
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Тренировка не удалась!';
		}
	}
}

#Функция ослабления (тест)
function unTrain($pok_id, $item_id)
{
	global $mysqli;
	minus_item(1, $item_id);
	$pk = $mysqli->query('SELECT * FROM user_pokemons WHERE id = ' . $pok_id)->fetch_assoc();
	if ($_SESSION['user_id'] == 37) {
		if ($pk['trn'] == 6) {
			if (rand(1, 100) <= 100) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '5',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				$_SESSION['TEXT_ITEMS_USE'] = 'Ослабление прошло успешно!';
			} else {
				$_SESSION['TEXT_ITEMS_USE'] = 'Ослабление не удалось!';
			}
		} elseif ($pk['trn'] == 5) {
			if (rand(1, 100) <= 100) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '4' ,`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление прошло успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление не удалось!';
			}
		} elseif ($pk['trn'] == 4) {
			if (rand(1, 100) <= 100) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '3',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление прошло успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление не удалось!';
			}
		} elseif ($pk['trn'] == 3) {
			if (rand(1, 100) <= 100) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '2',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление прошло успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление не удалось!';
			}
		} elseif ($pk['trn'] == 2) {
			if (rand(1, 100) <= 100) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '1',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление прошло успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление не удалось!';
			}
		} elseif ($pk['trn'] == 1) {
			if (rand(1, 100) <= 1) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '0',`trn_stat` = '0' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление прошло успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление не удалось!';
			}
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление не удалось!';
		}
	} else {
		if ($pk['trn'] == 6) {
			if (rand(1, 100) <= 90) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '5',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				$_SESSION['TEXT_ITEMS_USE'] = 'Ослабление прошло успешно!';
			} else {
				$_SESSION['TEXT_ITEMS_USE'] = 'Ослабление не удалось!';
			}
		} elseif ($pk['trn'] == 5) {
			if (rand(1, 100) <= 55) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '4',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление прошло успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление не удалось!';
			}
		} elseif ($pk['trn'] == 4) {
			if (rand(1, 100) <= 10) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '3',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление прошло успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление не удалось!';
			}
		} elseif ($pk['trn'] == 3) {
			if (rand(1, 100) <= 6) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '2',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление прошло успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление не удалось!';
			}
		} elseif ($pk['trn'] == 2) {
			if (rand(1, 100) <= 3) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '1',`trn_stat`='" . $stat . "' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление прошло успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление не удалось!';
			}
		} elseif ($pk['trn'] == 1) {
			if (rand(1, 100) <= 1) {
				$stat = rand(1, 5);
				$mysqli->query("UPDATE user_pokemons SET `trn` = '0', `trn_stat` = '0' WHERE id='" . $pok_id . "'");
				stat_updates($pok_id);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление прошло успешно!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление не удалось!';
			}
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Ослабление не удалось!';
		}
	}
}
#Функция увилечения рейтов
function uStat($item_id)
{
	global $mysqli;
	$check = $mysqli->query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user_id'] . "' ORDER BY id DESC")->fetch_assoc();
	if ($item_id == 185) {
		$status = 1; {
			$money = $money * 10;
		}
	}
	if ($check['time_scaner'] > time()) {
		$tmneed = $check['time_scaner'] - time();
		$min = $tmneed / 60;
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы уже использовали увеличитель! Сканер будет работать ещё ' . round($min) . ' минут.';
	} else {
		$date = time() + 7600;
		$mysqli->query("UPDATE `users` SET `time_scaner` = '$date' WHERE `id` = '" . $_SESSION['user_id'] . "'");
		minus_item(1, $item_id);
		$money = $money * 10;
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы успешно использовали предмет!';
	}
}

#Функция пакта о ненападении
function noAgro($item_id)
{
	global $mysqli;
	//$checknoagro = $mysqli->query("SELECT * FROM `users` WHERE `user_id` = '".$_SESSION['user_id']."' ORDER BY id DESC")->fetch_assoc();
	if ($item_id == 438) {
		$plustimenoagro = time() + 21600;
		$mysqli->query("UPDATE `users` SET `time_noagro` = '$plustimenoagro' WHERE `id` = '" . $_SESSION['user_id'] . "'");
		minus_item(1, $item_id);
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы успешно защищены на 3 часа!';
	}
	/*if($checknoagro['time_noagro'] > time()){
		$tmneed = $checknoagro['time_noagro'] - time();
	    $min = $tmneed/60;
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы уже использовали пакт! Он будет работать ещё '.round($min).' минут.';
	}else{
		$plustimenoagro = time() + 10800;
		$mysqli->query("UPDATE `users` SET `time_noagro` = '$plustimenoagro' WHERE `id` = '".$_SESSION['user_id']."'");
		minus_item(1,$item_id);
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы успешно защищены на 3 минуты!';
	}*/
}

#Функция Ордера захвата локации
function conquerloc($item_id)
{
	global $mysqli;
	//$checknoagro = $mysqli->query("SELECT * FROM `users` WHERE `user_id` = '".$_SESSION['user_id']."' ORDER BY id DESC")->fetch_assoc();
	if ($item_id == 441) {
		$usr = $mysqli->query("SELECT * FROM users WHERE `id` = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
		$checkloc = $mysqli->query("SELECT * FROM base_location WHERE `id` = '" . $usr['location'] . "'")->fetch_assoc();
		$clanselect = $mysqli->query("SELECT * FROM base_clans WHERE `id` = " . $usr['clan_id'])->fetch_assoc();
		$date = date("d.m");
		$type = 1;
		$plustimeconquerloc = time() + 3600;
		$checkleadersclan = $mysqli->query("SELECT * FROM users WHERE `clan_admin` = '1' and `online_time` > " . time() . "")->fetch_assoc();
		if ($checkloc['conquer'] == 0 and $clanselect['rating'] >= 20) {
			$mysqli->query("UPDATE `base_location` SET `conquer` = '" . $usr['clan_id'] . "' WHERE `id` = '" . $usr['location'] . "'");
			$mysqli->query("UPDATE `base_clans` SET `rating` = `rating`-20 WHERE `id` = " . $usr['clan_id']);
			$mysqli->query("INSERT INTO `conquerlog` (`date`,`clan_id`,`user`,`type`,`loc`) VALUES ('" . $date . "','" . $usr['clan_id'] . "','" . $usr['id'] . "','" . $type . "','" . $usr['location'] . "') ");
			return $_SESSION['TEXT_ITEMS_USE'] = 'Локация была не занята, и была успешно захвачена!';
			minus_item(1, 441);
		} else
		if ($usr['clan_admin'] == 1 and $checkloc['conquer'] > 1 and $clanselect['rating'] >= 20) {
			$mysqli->query("UPDATE `users` SET `time_conquerloc` = '$plustimeconquerloc' WHERE `id` = '" . $_SESSION['user_id'] . "'");
			$mysqli->query("INSERT INTO `conquerlog` (`date`,`clan_id`,`user`,`type`,`loc`) VALUES ('" . $date . "','" . $usr['clan_id'] . "','" . $usr['id'] . "','" . $type . "','" . $usr['location'] . "') ");
			$mysqli->query("UPDATE `base_clans` SET `rating` = `rating`-20 WHERE `id` = " . $usr['clan_id']);
			minus_item(1, 441);
			return $_SESSION['TEXT_ITEMS_USE'] = 'В течений 1-го часа вы доступны для нападения на локации. Нельзя уходить с локации или вступать в бой с диким покемоном.';
		} else {
			return $_SESSION['TEXT_ITEMS_USE'] = 'Вы не лидер клана! Или недостаточно рейтинга!';
		}
	}
}


function BigSmiles($item_id)
{
	global $mysqli;

	$check = $mysqli->query("SELECT big_smiles FROM `users` WHERE `id` = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
	if ($item_id == 242) {
		$big_smiles = 1;
	}
	if ($big_smiles = 0) {
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы уже активировали набор смайликов.';
	} else {
		$big_smiles = 1;
		$mysqli->query("UPDATE users SET big_smiles = '" . $user['big_smiles'] . "', big_smiles = '1' WHERE `id` = '" . $_SESSION['user_id'] . "'");
		minus_item(1, $item_id);
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы активировали набор смайликов.';
	}
}

function Bottle($item_id)
{
	global $mysqli;
	$check = $mysqli->query("SELECT * FROM `user_status` WHERE `user_id` = '" . $_SESSION['user_id'] . "' ORDER BY id DESC")->fetch_assoc();
	if ($item_id == 254) {
		$status1 = 2;
	}
	if ($check['date1'] > time()) {
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы уже открыли 1 бутылку! Дождитесь пока она закончится.';
	} else {
		$date1 = time(0) + 7200;
		$mysqli->query("INSERT INTO user_status (user_id, status1, date1) VALUES ('" . $_SESSION['user_id'] . "','" . $status1 . "','" . $date1 . "') ");
		minus_item(1, $item_id);
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы открыли бутылку воды!';
	}
}

function Kekutan($item_id)
{
	global $mysqli;
	if ($item_id == 317) {
		$mysqli->query("UPDATE users SET fetig = '" . $user['fetig'] . "', fetig = '1568584238' WHERE `id` = '" . $_SESSION['user_id'] . "'");
		minus_item(1, $item_id);
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы выпили элексир.';
	}
}

#Функция покраски в шайни
function ShinyGet($pok_id, $item_id)
{
	global $mysqli;
	$itemkras = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '" . $usr . "' and `item_id` = '101' ")->fetch_assoc();
	$pk = $mysqli->query('SELECT * FROM user_pokemons WHERE id = ' . $pok_id)->fetch_assoc();
	if ($pk['type'] == "normal") {
		if (rand(1, 100) <= 40) {
			$mysqli->query("UPDATE user_pokemons SET `type` = 'coloring' WHERE id='" . $pok_id . "'");
			minus_item(1, 101);
			return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон успешно окрасился!';
		} else {
			minus_item(1, 101);
			return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон не смог окраситься.';
		}
	} else {
		return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон не может окраситься.';
	}
}



#Функция крафта
function Craft($usr)
{
    global $mysqli;
    $iitm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '" . $usr . "' and `item_id` = '27' ")->fetch_assoc();

    if ($iitm) {
        if (mt_rand(1, 100) <= 50) {
            $rn = mt_rand(1,100);
            if($rn >= 1 and $rn <= 8){
                $rnd = rand(1,2);
                switch($rnd){
                    case 1: $it = 27; $kachestvo = 'Легендарное'; break;
                    case 2: $it = 27; $kachestvo = 'Идеально Эпическое'; break;
                }
            }elseif($rn > 9 and $rn <= 25){
                $rnd = rand(1,3);
                switch($rnd){
                    case 1: $it = 27; $kachestvo = 'Эпическое'; break;
                    case 2: $it = 27; $kachestvo = 'Идеально Жестокое'; break;
                    case 3: $it = 27; $kachestvo = 'Жестокое'; break;
                }
            }else{
                $rnd = rand(1,6);
                switch($rnd){
                    case 1: $it = 27; $kachestvo = 'Идеально яростное'; break;
                    case 2: $it = 27; $kachestvo = 'Яростное'; break;
                    case 3: $it = 27; $kachestvo = 'Идеальное крепкое'; break;
                    case 4: $it = 27; $kachestvo = 'Крепкое'; break;
                    case 5: $it = 27; $kachestvo = 'Идеально добротное'; break;
                    case 6: $it = 27; $kachestvo = 'Добротное'; break;
                }
            }
            //minus_item(1, 27);
            //minus_item(1, 384, $user_id);
            //upt_item($kachestvo, $it, $user_id);
            $itm = $mysqli->query("SELECT name FROM base_items WHERE `id` = '" . $it . "' ")->fetch_assoc();
           $user = $mysqli->query('SELECT * FROM users WHERE id = ' . $_SESSION['user_id'])->fetch_assoc();
            $today = date("F j, Y, g:i a");
            $its = $mysqli->query('SELECT item FROM user_box WHERE user_id = '. $_SESSION['user_id'])->fetch_assoc();
      $z = $its['item'];
      if($z == 27){
         $mysqli->query('UPDATE user_box SET kachestvo = "' . $kachestvo . '" WHERE item = ' . $it . ' AND user_id = ' . $_SESSION['user_id']); 
      } else {
            $mysqli->query("INSERT INTO `user_box` (`user_id`,`kachestvo`,`data`, `item`) VALUES ('" . $_SESSION['user_id'] . "','" . $kachestvo . "','" . $today . "', '" . $it . "') ");
      }
            return $_SESSION['TEXT_ITEMS_USE'] = "Вы скрафтили - " . $itm['name'] . " x $kachestvo";
            //return $_SESSION['TEXT_ITEMS_USE'] = "error";
        }
    } else {

        return $_SESSION['TEXT_ITEMS_USE'] = "error";
    }

}




#Функция открытия ящиков
function GoBox($usr)
{
	global $mysqli;
	$iitm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '" . $usr . "' and `item_id` = '384' ")->fetch_assoc();
	if ($iitm) {
		if (mt_rand(1, 100) <= 50) {
			$rn = mt_rand(1, 1000);
			if ($rn >= 1 and $rn <= 5) { //1-3
				$rnd = rand(1, 2);
				switch($rnd){
					case 1: $pok = 716; break;
					case 2: $pok = 789; break;
				}
			} elseif ($rn > 6 and $rn <= 50) { //5-30
				$rnd = rand(1, 5);
				switch($rnd){
					case 1: $pok = 885; break;
					case 2: $pok = 772; break;
					case 3: $pok = 782; break;
					case 4: $pok = 808; break;
					case 5: $pok = 898; break;
				}
			} elseif ($rn > 51 and $rn <= 140) {
				$rnd = rand(1, 6);
				switch($rnd){
					case 1: $pok = 1; break;
					case 2: $pok = 4; break;
					case 3: $pok = 7; break;
					case 4: $pok = 152; break;
					case 5: $pok = 158; break;
					case 6: $pok = 155; break;
				}
			} elseif ($rn > 141 and $rn <= 170) {
				$rnd = rand(1, 3);
				switch($rnd){
					case 1: $pok = 636; break;
					case 2: $pok = 801; break;
					case 3: $pok = 802; break;

				}
			}else{
				$rnd = rand(1,5);
				switch($rnd){
					case 1: $pok = 803; break;
					case 2: $pok = 884; break;
					case 3: $pok = 767; break;
					case 4: $pok = 872; break;
					case 5: $pok = 747; break;
				}
			}
			newPokemonBox($pok, $usr);
			minus_item(1, 383);
			minus_item(1, 384, $user_id);
			$pok_base = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '" . $pok . "' ")->fetch_assoc();
			$user = $mysqli->query('SELECT * FROM users WHERE id = ' . $_SESSION['user_id'])->fetch_assoc();
			$today = date("F j, Y, g:i a");
			$mysqli->query("INSERT INTO `user_box` (`user`,`pok`,`data`) VALUES ('" . $user['login'] . "','" . $pok_base['name'] . "','" . $today . "') ");
			return $_SESSION['TEXT_ITEMS_USE'] = 'В ящике вы обнаружили #' . numbPok($pok) . ' ' . $pok_base["name"] . '';
		} else {
			$rn = mt_rand(1,100);
		if($rn >= 1 and $rn <= 8){
			$rnd = rand(1,2);
			switch($rnd){
				case 1: $it = 27; $count = 1; break;
				case 2: $it = 1110; $count = 1; break;
			}
		}elseif($rn > 9 and $rn <= 25){
			$rnd = rand(1,3);
			switch($rnd){
				case 1: $it = 1118; $count = 1; break;
				case 2: $it = 1120; $count = 1; break;
				case 3: $it = 1109; $count = 1; break;
			}
		}else{
		  $rnd = rand(1,6);
		  switch($rnd){
		 case 1: $it = 330; $count = rand(10,20); break;
		 case 2: $it = 1053; $count = rand(5,10); break;
		 case 3: $it = 185; $count = rand(3,7); break;
		 case 4: $it = 1; $count = rand(600000,1100000); break;
		 case 5: $it = 1055; $count = rand(3,7); break;
		 case 6: $it = 42; $count = 1; break;
		  }
		}
			minus_item(1, 383);
			minus_item(1, 384, $user_id);
			plus_item($count, $it, $user_id);
			$itm = $mysqli->query("SELECT name FROM base_items WHERE `id` = '" . $it . "' ")->fetch_assoc();
			$user = $mysqli->query('SELECT * FROM users WHERE id = ' . $_SESSION['user_id'])->fetch_assoc();
			$today = date("F j, Y, g:i a");
			$mysqli->query("INSERT INTO `user_box` (`user`,`item`,`data`) VALUES ('" . $user['login'] . "','" . $itm['name'] . "','" . $today . "') ");
			return $_SESSION['TEXT_ITEMS_USE'] = "В ящике вы обнаружили " . $itm['name'] . " x" . price($count);
		}
	} else {
		return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка!';
	}
	//return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка!';
}
// #Функция открытия ящиков
 function GoBox2($usr) {
 global $mysqli;
 $iitm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$usr."' and `item_id` = '428' ")->fetch_assoc();
 if($iitm){
 	if(mt_rand(1,100) <= 50) {
 		$rn = mt_rand(1,1000);
 		if($rn >= 1 and $rn <= 50){//1-3
         $rnd = rand(1,1);
 		  if($rnd == 1){ $pok = 644; }
		}elseif($rn > 51 and $rn <= 400){//5-30
          $rnd = rand(1,3);
 		  if($rnd == 1){ $pok = 566; }
 		  if($rnd == 2){ $pok = 570; }
 		  if($rnd == 3){ $pok = 649; }
 		}else{
 			$rnd = rand(1,1);
 			if($rnd == 1){ $pok = 592; }
 		}
 		newPokemonBox($pok,$usr);
 		minus_item(1,428);
 		minus_item(1,384,$user_id);
 		$pok_base = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '".$pok."' ")->fetch_assoc();
 		$user = $mysqli->query('SELECT * FROM users WHERE id = '.$_SESSION['user_id'])->fetch_assoc();
 		$today = date("F j, Y, g:i a");
 		$mysqli->query("INSERT INTO `user_box` (`user`,`pok`,`data`) VALUES ('".$user['login']."','".$pok_base['name']."','".$today."') ");
		return $_SESSION['TEXT_ITEMS_USE'] = 'В ящике вы обнаружили #'.numbPok($pok).' '.$pok_base["name"].'';
 	}else{
 		$rn = mt_rand(1,100);
 		if($rn >= 1 and $rn <= 8){
 			$rnd = rand(1,1);
          if($rnd == 1){ $it = 27; $count = 1;   }

 		}elseif($rn > 6 and $rn <= 20){
 			$rnd = rand(1,2);

          if($rnd == 1){ $it = 1011; $count = 1; }
          if($rnd == 2){ $it = 1012; $count = 1; }
 		}else{
 		  $rnd = rand(1,6);
 		 if($rnd == 1){ $it = 330; $count = rand(10,20); }
 		 if($rnd == 2){ $it = 1053; $count = rand(5,10); }
 		 if($rnd == 3){ $it = 185; $count = rand(3,7); }
 		 if($rnd == 4){ $it = 1; $count = rand(1000000,1500000); }
 		 if($rnd == 5){ $it = 1055; $count = rand(3,7); }
 		 if($rnd == 6){ $it = 42; $count = 1; }
 		}
 		minus_item(1,428);
 		minus_item(1,384,$user_id);
 		plus_item($count,$it,$user_id);
 		$itm = $mysqli->query("SELECT name FROM base_items WHERE `id` = '".$it."' ")->fetch_assoc();
 		$user = $mysqli->query('SELECT * FROM users WHERE id = '.$_SESSION['user_id'])->fetch_assoc();
 		$today = date("F j, Y, g:i a");
 		$mysqli->query("INSERT INTO `user_box` (`user`,`item`,`data`) VALUES ('".$user['login']."','".$itm['name']."','".$today."') ");
 		return $_SESSION['TEXT_ITEMS_USE'] = "В ящике вы обнаружили ".$itm['name']." x".price($count);
 	}
 }else{
 	return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка!';
 }
 }
// #Функция открытия ящиков
 function GoBox3($usr) {
 global $mysqli;
 $iitm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$usr."' and `item_id` = '433' ")->fetch_assoc();
 if($iitm){
 	if(mt_rand(1,100) <= 50) {
 		$rn = mt_rand(1,1000);
 		if($rn >= 1 and $rn <= 50){//1-3
 			$rnd = rand(1,1);
 			 if($rnd == 1){ $pok = 720; }
 		   }elseif($rn > 51 and $rn <= 400){//5-30
 			$rnd = rand(1,3);
 			 if($rnd == 1){ $pok = 374; }
 			 if($rnd == 2){ $pok = 679; }
 			 if($rnd == 3){ $pok = 718; }
 		   }else{
 			   $rnd = rand(1,1);
 			   if($rnd == 1){ $pok = 688; }
 		   }
 		newPokemonBox($pok,$usr);
 		minus_item(1,433);
 		minus_item(1,384,$user_id);
 		$pok_base = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '".$pok."' ")->fetch_assoc();
 		$user = $mysqli->query('SELECT * FROM users WHERE id = '.$_SESSION['user_id'])->fetch_assoc();
 		$today = date("F j, Y, g:i a");
 		$mysqli->query("INSERT INTO `user_box` (`user`,`pok`,`data`) VALUES ('".$user['login']."','".$pok_base['name']."','".$today."') ");
 		return $_SESSION['TEXT_ITEMS_USE'] = 'В ящике вы обнаружили #'.numbPok($pok).' '.$pok_base["name"].'';
 	}else{
 		$rn = mt_rand(1,100);
 		if($rn >= 1 and $rn <= 8){
 			$rnd = rand(1,1);
          if($rnd == 1){ $it = 27; $count = 1;   }

 		}elseif($rn > 6 and $rn <= 20){
 			$rnd = rand(1,2);

          if($rnd == 1){ $it = 1011; $count = 1; }
          if($rnd == 2){ $it = 1012; $count = 1; }
		}else{
 		  $rnd = rand(1,6);
 		 if($rnd == 1){ $it = 330; $count = rand(10,20); }
 		 if($rnd == 2){ $it = 1053; $count = rand(5,10); }
 		 if($rnd == 3){ $it = 185; $count = rand(3,7); }
 		 if($rnd == 4){ $it = 1; $count = rand(1000000,1500000); }
 		 if($rnd == 5){ $it = 1055; $count = rand(3,7); }
 		 if($rnd == 6){ $it = 42; $count = 1; }
 		}
 		minus_item(1,433);
 		minus_item(1,384,$user_id);
 		plus_item($count,$it,$user_id);
 		$itm = $mysqli->query("SELECT name FROM base_items WHERE `id` = '".$it."' ")->fetch_assoc();
 		$user = $mysqli->query('SELECT * FROM users WHERE id = '.$_SESSION['user_id'])->fetch_assoc();
 		$today = date("F j, Y, g:i a");
 		$mysqli->query("INSERT INTO `user_box` (`user`,`item`,`data`) VALUES ('".$user['login']."','".$itm['name']."','".$today."') ");
 		return $_SESSION['TEXT_ITEMS_USE'] = "В ящике вы обнаружили ".$itm['name']." x".price($count);
 	}
 }else{
 	return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка!';
 }
 }
/*#Функция открытия ящиков юбилейных
function GoBox($usr) {
global $mysqli;
$iitm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$usr."' and `item_id` = '384' ")->fetch_assoc();
if($iitm){
	if(mt_rand(1,100) <= 50) {
		$rn = mt_rand(1,1000);
		if($rn >= 1 and $rn <= 3){//1-3
         $rnd = rand(1,3);
		  if($rnd == 1){ $pok = 250; }
		  if($rnd == 2){ $pok = 383; }//Skorupi
		  if($rnd == 3){ $pok = 244; }//Skorupi
		}elseif($rn > 3 and $rn <= 150){//5-30
         $rnd = rand(1,4);
		  if($rnd == 1){ $pok = 480; }
		  if($rnd == 2){ $pok = 638; }
		  if($rnd == 3){ $pok = 377; }
		  if($rnd == 4){ $pok = 633; }
		}elseif($rn > 151 and $rn <= 550){
          $rnd = rand(1,6);
		  if($rnd == 1){ $pok = 627; }//Chatot
		  if($rnd == 2){ $pok = 650; }
		  if($rnd == 3){ $pok = 755; }
		  if($rnd == 4){ $pok = 1; }
		  if($rnd == 5){ $pok = 79; }
		  if($rnd == 6){ $pok = 418; }
		}else{
			$rnd = rand(1,4);
			if($rnd == 1){ $pok = 580; }
			if($rnd == 2){ $pok = 710; }
			if($rnd == 3){ $pok = 325; }
			if($rnd == 4){ $pok = 564; }
		}
		newPokemonBox($pok,$usr);
		minus_item(1,383);
		minus_item(1,384,$user_id);
		$pok_base = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '".$pok."' ")->fetch_assoc();
		$user = $mysqli->query('SELECT * FROM users WHERE id = '.$_SESSION['user_id'])->fetch_assoc();
		$today = date("F j, Y, g:i a");
		$mysqli->query("INSERT INTO `user_box` (`user`,`pok`,`data`) VALUES ('".$user['login']."','".$pok_base['name']."','".$today."') ");
		return $_SESSION['TEXT_ITEMS_USE'] = 'В ящике вы обнаружили #'.numbPok($pok).' '.$pok_base["name"].'';
	}else{
		$rn = mt_rand(1,100);
		if($rn >= 1 and $rn <= 8){
			$rnd = rand(1,1);
         //if($rnd == 1){ $it = 27; $count = 1;   }
         if($rnd == 1){ $it = 1022; $count = 1; }

		}elseif($rn > 6 and $rn <= 30){
			$rnd = rand(1,2);

         if($rnd == 1){ $it = 1011; $count = 1; }
         if($rnd == 2){ $it = 1050; $count = 1; }
         //if($rnd == 3){ $it = 1012; $count = 1; }

		}else{
			$rnd = rand(1,3);
		 if($rnd == 1){ $it = 330; $count = rand(10,30); }
		 if($rnd == 2){ $it = 1; $count = rand(1000000,3500000); }
		 //if($rnd == 3){ $it = 246; $count = 1;  }
		 if($rnd == 3){ $it = 1; $count = rand(1000000,3500000); }
		}
		minus_item(1,383);
		minus_item(1,384,$user_id);
		plus_item($count,$it,$user_id);
		$itm = $mysqli->query("SELECT name FROM base_items WHERE `id` = '".$it."' ")->fetch_assoc();
		$user = $mysqli->query('SELECT * FROM users WHERE id = '.$_SESSION['user_id'])->fetch_assoc();
		$today = date("F j, Y, g:i a");
		$mysqli->query("INSERT INTO `user_box` (`user`,`item`,`data`) VALUES ('".$user['login']."','".$itm['name']."','".$today."') ");
		return $_SESSION['TEXT_ITEMS_USE'] = "В ящике вы обнаружили ".$itm['name']." x".price($count);
	}
}else{
	return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка!';
}
}
#Функция открытия ящиков
function GoBox2($usr) {
global $mysqli;
$iitm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$usr."' and `item_id` = '384' ")->fetch_assoc();
if($iitm){
	if(mt_rand(1,100) <= 40) {
		$rn = mt_rand(1,1000);
		if($rn >= 1 and $rn <= 3){//1-3
         $rnd = rand(1,3);
		  if($rnd == 1){ $pok = 487; }
		  if($rnd == 2){ $pok = 384; }//Skorupi
		  if($rnd == 3){ $pok = 639; }//Skorupi
		}elseif($rn > 3 and $rn <= 150){//5-30
         $rnd = rand(1,4);
		  if($rnd == 1){ $pok = 481; }
		  if($rnd == 2){ $pok = 378; }
		  if($rnd == 3){ $pok = 243; }
		  if($rnd == 4){ $pok = 374; }
		}elseif($rn > 151 and $rn <= 550){
          $rnd = rand(1,6);
		  if($rnd == 1){ $pok = 653; }//Chatot
		  if($rnd == 2){ $pok = 712; }
		  if($rnd == 3){ $pok = 757; }
		  if($rnd == 4){ $pok = 4; }
		  if($rnd == 5){ $pok = 410; }
		  if($rnd == 6){ $pok = 338; }
		}else{
			$rnd = rand(1,4);
			if($rnd == 1){ $pok = 599; }
			if($rnd == 2){ $pok = 692; }
			if($rnd == 3){ $pok = 108; }
			if($rnd == 4){ $pok = 299; }
		}
		newPokemonBox($pok,$usr);
		minus_item(1,428);
		minus_item(1,384,$user_id);
		$pok_base = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '".$pok."' ")->fetch_assoc();
		$user = $mysqli->query('SELECT * FROM users WHERE id = '.$_SESSION['user_id'])->fetch_assoc();
		$today = date("F j, Y, g:i a");
		$mysqli->query("INSERT INTO `user_box` (`user`,`pok`,`data`) VALUES ('".$user['login']."','".$pok_base['name']."','".$today."') ");
		return $_SESSION['TEXT_ITEMS_USE'] = 'В ящике вы обнаружили #'.numbPok($pok).' '.$pok_base["name"].'';
	}else{
		$rn = mt_rand(1,100);
		if($rn >= 1 and $rn <= 8){
			$rnd = rand(1,2);
         if($rnd == 1){ $it = 1; $count = 10000000;   }
         if($rnd == 2){ $it = 1038; $count = 1; }

		}elseif($rn > 6 and $rn <= 30){
			$rnd = rand(1,2);

         if($rnd == 1){ $it = 1019; $count = 1; }
         if($rnd == 2){ $it = 1036; $count = 1; }
         //if($rnd == 3){ $it = 1025; $count = 1; }

		}else{
			$rnd = rand(1,3);
		 if($rnd == 1){ $it = 330; $count = rand(10,30); }
		 if($rnd == 2){ $it = 1; $count = rand(1000000,3500000); }
		 //if($rnd == 3){ $it = 247; $count = 1; }
		 if($rnd == 3){ $it = 1; $count = rand(1000000,3500000); }
		}
		minus_item(1,428);
		minus_item(1,384,$user_id);
		plus_item($count,$it,$user_id);
		$itm = $mysqli->query("SELECT name FROM base_items WHERE `id` = '".$it."' ")->fetch_assoc();
		$user = $mysqli->query('SELECT * FROM users WHERE id = '.$_SESSION['user_id'])->fetch_assoc();
		$today = date("F j, Y, g:i a");
		$mysqli->query("INSERT INTO `user_box` (`user`,`item`,`data`) VALUES ('".$user['login']."','".$itm['name']."','".$today."') ");
		return $_SESSION['TEXT_ITEMS_USE'] = "В ящике вы обнаружили ".$itm['name']." x".price($count);
	}
}else{
	return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка!';
}
}
#Функция открытия ящиков
function GoBox3($usr) {
global $mysqli;
$iitm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$usr."' and `item_id` = '384' ")->fetch_assoc();
if($iitm){
	if(mt_rand(1,100) <= 40) {
		$rn = mt_rand(1,1000);
		if($rn >= 1 and $rn <= 3){//1-3
         $rnd = rand(1,3);
		  if($rnd == 1){ $pok = 484; }
		  if($rnd == 2){ $pok = 382; }//Skorupi
		  if($rnd == 3){ $pok = 245; }//Skorupi
		}elseif($rn > 3 and $rn <= 150){//5-30
         $rnd = rand(1,4);
		  if($rnd == 1){ $pok = 371; }
		  if($rnd == 2){ $pok = 379; }
		  if($rnd == 3){ $pok = 640; }
		  if($rnd == 4){ $pok = 482; }
		}elseif($rn > 151 and $rn <= 550){
          $rnd = rand(1,6);
		  if($rnd == 1){ $pok = 629; }//Chatot
		  if($rnd == 2){ $pok = 656; }
		  if($rnd == 3){ $pok = 714; }
		  if($rnd == 4){ $pok = 7; }
		  if($rnd == 5){ $pok = 142; }
		  if($rnd == 6){ $pok = 280; }
		}else{
			$rnd = rand(1,4);
			if($rnd == 1){ $pok = 594; }
			if($rnd == 2){ $pok = 747; }
			if($rnd == 3){ $pok = 337; }
			if($rnd == 4){ $pok = 399; }
		}
		newPokemonBox($pok,$usr);
		minus_item(1,433);
		minus_item(1,384,$user_id);
		$pok_base = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '".$pok."' ")->fetch_assoc();
		$user = $mysqli->query('SELECT * FROM users WHERE id = '.$_SESSION['user_id'])->fetch_assoc();
		$today = date("F j, Y, g:i a");
		$mysqli->query("INSERT INTO `user_box` (`user`,`pok`,`data`) VALUES ('".$user['login']."','".$pok_base['name']."','".$today."') ");
		return $_SESSION['TEXT_ITEMS_USE'] = 'В ящике вы обнаружили #'.numbPok($pok).' '.$pok_base["name"].'';
	}else{
		$rn = mt_rand(1,100);
		if($rn >= 1 and $rn <= 8){
			$rnd = rand(1,2);
         if($rnd == 1){ $it = 1051; $count = 3;   }
         if($rnd == 2){ $it = 1004; $count = 1;   }

		}elseif($rn > 6 and $rn <= 30){
			$rnd = rand(1,2);

         if($rnd == 1){ $it = 1003; $count = 1; }
         if($rnd == 2){ $it = 1006; $count = 1; }
         //if($rnd == 3){ $it = 1023; $count = 1; }

		}else{
		  $rnd = rand(1,3);
		 if($rnd == 1){ $it = 330; $count = rand(10,30); }
		 if($rnd == 2){ $it = 1; $count = rand(1000000,3500000); }
		 //if($rnd == 3){ $it = 253; $count = 1; }
		 if($rnd == 3){ $it = 1; $count = rand(1000000,3500000); }
		}

		minus_item(1,433);
		minus_item(1,384,$user_id);
		plus_item($count,$it,$user_id);
		$itm = $mysqli->query("SELECT name FROM base_items WHERE `id` = '".$it."' ")->fetch_assoc();
		$user = $mysqli->query('SELECT * FROM users WHERE id = '.$_SESSION['user_id'])->fetch_assoc();
		$today = date("F j, Y, g:i a");
		$mysqli->query("INSERT INTO `user_box` (`user`,`item`,`data`) VALUES ('".$user['login']."','".$itm['name']."','".$today."') ");
		return $_SESSION['TEXT_ITEMS_USE'] = "В ящике вы обнаружили ".$itm['name']." x".price($count);
	}
}else{
	return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка!';
}
}*/
#Функция набора витаминов
function boxwithdrugs($usr)
{
	global $mysqli;
	$iitm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '" . $usr . "'")->fetch_assoc();
	$rnd = rand(1, 6);
	if ($rnd == 1) {
		$it = 10;
		$count = 10;
	}
	if ($rnd == 2) {
		$it = 59;
		$count = 10;
	}
	if ($rnd == 3) {
		$it = 39;
		$count = 10;
	}
	if ($rnd == 4) {
		$it = 24;
		$count = 10;
	}
	if ($rnd == 5) {
		$it = 23;
		$count = 10;
	}
	if ($rnd == 6) {
		$it = 11;
		$count = 10;
	}
	minus_item(1, 1055);
	plus_item($count, $it, $user_id);
	$itm = $mysqli->query("SELECT name FROM base_items WHERE `id` = '" . $it . "' ")->fetch_assoc();
	return $_SESSION['TEXT_ITEMS_USE'] = "В коробке лежали " . $itm['name'] . " x" . price($count);
}
#Функция набор Чемпиона
function championBox($usr)
{
	global $mysqli;
	$iitm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '" . $usr . "'")->fetch_assoc();
	minus_item(1, 1060);
	plus_item(10, 330, $user_id);
	plus_item(5, 1026, $user_id);
	plus_item(3, 1055, $user_id);
	$itm = $mysqli->query("SELECT name FROM base_items WHERE `id` = '" . $it . "' ")->fetch_assoc();
	return $_SESSION['TEXT_ITEMS_USE'] = "Вы получили Набор тренировки х10, Набор ослабления х5, Набор витаминов х3.";
}
#Функция Новогоднего подарка
function xmaxPresent($usr)
{
	global $mysqli;
	$iitm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '" . $usr . "'")->fetch_assoc();
	$tm = rand(1000, 1025);
	$rnd = rand(1, 8);
	if ($rnd == 1) {
		$it = 5;
		$count = 1;
	}
	if ($rnd == 2) {
		$it = 6;
		$count = 1;
	}
	if ($rnd == 3) {
		$it = 33;
		$count = 1;
	}
	if ($rnd == 4) {
		$it = 34;
		$count = 1;
	}
	if ($rnd == 5) {
		$it = 40;
		$count = 1;
	}
	if ($rnd == 6) {
		$it = 44;
		$count = 1;
	}
	if ($rnd == 7) {
		$it = 49;
		$count = 1;
	}
	if ($rnd == 8) {
		$it = 52;
		$count = 1;
	}
	minus_item(1, 442);
	plus_item($count, $it, $user_id);
	plus_item(1, $tm, $user_id);
	plus_item(40, 330, $user_id);
	plus_item(1, 1051, $user_id);
	plus_item(2, 1053, $user_id);
	plus_item(3, 101, $user_id);
	plus_item(5, 1055, $user_id);
	plus_item(15, 309, $user_id);
	plus_item(2000000, 1, $user_id);
	$itm = $mysqli->query("SELECT name FROM base_items WHERE `id` = '" . $it . "' ")->fetch_assoc();
	$itmtm = $mysqli->query("SELECT name FROM base_items WHERE `id` = '" . $tm . "' ")->fetch_assoc();
	return $_SESSION['TEXT_ITEMS_USE'] = "Вы получили Кредиты х2.000.000, Набор тренировки х40, Набор витаминов х5, Билет удачи х1, Случайная карта х2, Тюбик с краской х3, Ванильная конфета х15, Модификатор " . $itm['name'] . " и так же " . $itmtm['name'] . " x1";
}
function emeraldDeck($usr)
{
	global $mysqli;
	$iitm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '" . $usr . "'")->fetch_assoc();
	plus_item(1, 385);
	plus_item(1, 386);
	plus_item(1, 387);
	plus_item(1, 388);
	plus_item(1, 389);
	plus_item(1, 390);
	plus_item(1, 391);
	plus_item(1, 392);
	plus_item(1, 393);
	plus_item(1, 394);
	plus_item(1, 395);
	plus_item(1, 396);
	plus_item(1, 397);
	plus_item(1, 417);
	plus_item(1, 418);
	plus_item(1, 419);
	plus_item(1, 420);
	plus_item(1, 421);
	plus_item(1, 422);
	plus_item(1, 423);
	plus_item(1, 425);
	plus_item(1, 424);
	minus_item(1, 1064);
	return $_SESSION['TEXT_ITEMS_USE'] = "Вы получили полный набор изумрудной колоды!";
}
function sapphfireDeck($usr)
{
	global $mysqli;
	$iitm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '" . $usr . "'")->fetch_assoc();
	plus_item(1, 416);
	plus_item(1, 415);
	plus_item(1, 414);
	plus_item(1, 413);
	plus_item(1, 412);
	plus_item(1, 411);
	plus_item(1, 410);
	plus_item(1, 409);
	plus_item(1, 408);
	plus_item(1, 407);
	plus_item(1, 406);
	plus_item(1, 405);
	plus_item(1, 404);
	plus_item(1, 403);
	plus_item(1, 402);
	plus_item(1, 401);
	plus_item(1, 400);
	plus_item(1, 399);
	plus_item(1, 398);
	plus_item(1, 426);
	plus_item(1, 424);
	plus_item(1, 425);
	minus_item(1, 1065);
	return $_SESSION['TEXT_ITEMS_USE'] = "Вы получили полный набор сапфировой колоды!";
}
function GoEventEgg($usr)
{
	global $mysqli;
		$rn = mt_rand(1, 1);
		if ($rn == 1) {
			$rnd = rand(1, 20);
			if ($rnd == 1) {
				$pok = 550;
			}
			if ($rnd == 2) {
				$pok = 442;
			}
			if ($rnd == 3) {
				$pok = 339;
			}
			if ($rnd == 4) {
				$pok = 276;
			}
			if ($rnd == 5) {
				$pok = 263;
			}
			if ($rnd == 6) {
				$pok = 211;
			}
			if ($rnd == 7) {
				$pok = 239;
			}
			if ($rnd == 8) {
				$pok = 399;
			}
			if ($rnd == 9) {
				$pok = 425;
			}
			if ($rnd == 10) {
				$pok = 427;
			}
			if ($rnd == 11) {
				$pok = 519;
			}
			if ($rnd == 12) {
				$pok = 559;
			}
			if ($rnd == 13) {
				$pok = 627;
			}
			if ($rnd == 14) {
				$pok = 629;
			}
			if ($rnd == 15) {
				$pok = 661;
			}
			if ($rnd == 16) {
				$pok = 702;
			}
			if ($rnd == 17) {
				$pok = 283;
			}
			if ($rnd == 18) {
				$pok = 300;
			}
			if ($rnd == 19) {
				$pok = 303;
			}
			if ($rnd == 20) {
				$pok = 325;
			}
		}
		newPokemon($pok, $_SESSION['user_id']);
		minus_item(1, 1045, $user_id);
		$pok_base = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '" . $pok . "' ")->fetch_assoc();
		$user = $mysqli->query('SELECT * FROM users WHERE id = ' . $_SESSION['user_id'])->fetch_assoc();
		$today = date("F j, Y, g:i a");
		return $_SESSION['TEXT_ITEMS_USE'] = 'В яйце вы обнаружили #' . numbPok($pok) . ' ' . $pok_base["name"] . '';
}
function paskhaEgg($item_id)
{
	global $mysqli;
			$rnd = rand(1, 19);
			if ($rnd == 1) {
				$pok = 803;
			}
			if ($rnd == 2) {
				$pok = 757;
			}
			if ($rnd == 3) {
				$pok = 747;
			}
			if ($rnd == 4) {
				$pok = 712;
			}
			if ($rnd == 5) {
				$pok = 701;
			}
			if ($rnd == 6) {
				$pok = 610;
			}
			if ($rnd == 7) {
				$pok = 570;
			}
			if ($rnd == 8) {
				$pok = 566;
			}
			if ($rnd == 9) {
				$pok = 529;
			}
			if ($rnd == 10) {
				$pok = 447;
			}
			if ($rnd == 11) {
				$pok = 227;
			}
			if ($rnd == 12) {
				$pok = 207;
			}
			if ($rnd == 13) {
				$pok = 175;
			}
			if ($rnd == 14) {
				$pok = 131;
			}
			if ($rnd == 15) {
				$pok = 669;
			}
			if ($rnd == 16) {
				$pok = 597;
			}
			if ($rnd == 17) {
				$pok = 595;
			}
			if ($rnd == 18) {
				$pok = 328;
			}
			if ($rnd == 19) {
				$pok = 246;
			}
		newPokemonPaskhaEgg($pok, $_SESSION['user_id']);
		minus_item(1, 447, $user_id);
		$pok_base = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '" . $pok . "' ")->fetch_assoc();
		$user = $mysqli->query('SELECT * FROM users WHERE id = ' . $_SESSION['user_id'])->fetch_assoc();
		$today = date("F j, Y, g:i a");
		return $_SESSION['TEXT_ITEMS_USE'] = 'В яйце вы обнаружили #' . numbPok($pok) . ' ' . $pok_base["name"] . '';
	}
function testNewDeck($usr)
{
	global $mysqli;
	$iitm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '" . $usr . "'")->fetch_assoc();
	$rn = mt_rand(1, 100);
	if ($rn >= 6) {
		$rnd = rand(1, 42);
		if ($rnd == 1) {
			$it = 385;
			$count = 1;
		}
		if ($rnd == 2) {
			$it = 386;
			$count = 1;
		}
		if ($rnd == 3) {
			$it = 387;
			$count = 1;
		}
		if ($rnd == 4) {
			$it = 388;
			$count = 1;
		}
		if ($rnd == 5) {
			$it = 389;
			$count = 1;
		}
		if ($rnd == 6) {
			$it = 390;
			$count = 1;
		}
		if ($rnd == 7) {
			$it = 391;
			$count = 1;
		}
		if ($rnd == 8) {
			$it = 392;
			$count = 1;
		}
		if ($rnd == 9) {
			$it = 393;
			$count = 1;
		}
		if ($rnd == 10) {
			$it = 394;
			$count = 1;
		}
		if ($rnd == 11) {
			$it = 395;
			$count = 1;
		}
		if ($rnd == 12) {
			$it = 396;
			$count = 1;
		}
		if ($rnd == 13) {
			$it = 397;
			$count = 1;
		}
		if ($rnd == 14) {
			$it = 398;
			$count = 1;
		}
		if ($rnd == 15) {
			$it = 399;
			$count = 1;
		}
		if ($rnd == 16) {
			$it = 400;
			$count = 1;
		}
		if ($rnd == 17) {
			$it = 401;
			$count = 1;
		}
		if ($rnd == 18) {
			$it = 402;
			$count = 1;
		}
		if ($rnd == 19) {
			$it = 403;
			$count = 1;
		}
		if ($rnd == 20) {
			$it = 404;
			$count = 1;
		}
		if ($rnd == 21) {
			$it = 405;
			$count = 1;
		}
		if ($rnd == 22) {
			$it = 406;
			$count = 1;
		}
		if ($rnd == 23) {
			$it = 407;
			$count = 1;
		}
		if ($rnd == 24) {
			$it = 408;
			$count = 1;
		}
		if ($rnd == 25) {
			$it = 409;
			$count = 1;
		}
		if ($rnd == 26) {
			$it = 410;
			$count = 1;
		}
		if ($rnd == 27) {
			$it = 411;
			$count = 1;
		}
		if ($rnd == 28) {
			$it = 412;
			$count = 1;
		}
		if ($rnd == 29) {
			$it = 413;
			$count = 1;
		}
		if ($rnd == 30) {
			$it = 414;
			$count = 1;
		}
		if ($rnd == 31) {
			$it = 415;
			$count = 1;
		}
		if ($rnd == 32) {
			$it = 416;
			$count = 1;
		}
		if ($rnd == 33) {
			$it = 417;
			$count = 1;
		}
		if ($rnd == 34) {
			$it = 418;
			$count = 1;
		}
		if ($rnd == 35) {
			$it = 419;
			$count = 1;
		}
		if ($rnd == 36) {
			$it = 420;
			$count = 1;
		}
		if ($rnd == 37) {
			$it = 421;
			$count = 1;
		}
		if ($rnd == 38) {
			$it = 422;
			$count = 1;
		}
		if ($rnd == 39) {
			$it = 423;
			$count = 1;
		}
		if ($rnd == 40) {
			$it = 426;
			$count = 1;
		}
	} else {
		$rnd = rand(1, 2);
		if ($rnd == 1) {
			$it = 424;
			$count = 1;
		}
		if ($rnd == 2) {
			$it = 425;
			$count = 1;
		}
	}
	plus_item($count, $it, $user_id);
	minus_item(1, 1053, $user_id);
	$itm = $mysqli->query("SELECT name FROM base_items WHERE `id` = '" . $it . "' ")->fetch_assoc();
	return $_SESSION['TEXT_ITEMS_USE'] = "Вы обнаружили " . $itm['name'] . " x" . price($count);
}
#Функция рандом карт
function Event($usr)
{
	global $mysqli;
	$iitm = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '" . $usr . "' and `item_id` = '1035' ")->fetch_assoc();
	if ($iitm) {
	} else {
		$rn = mt_rand(1, 1);
		if ($rn == 1) {
			$rnd = rand(1, 6);
			if ($rnd == 1) {
				$it = 330;
				$count = 2;
			}
			if ($rnd == 2) {
				$it = 42;
				$count = 1;
			}
			if ($rnd == 3) {
				$it = 72;
				$count = 5;
			}
			if ($rnd == 4) {
				$it = 269;
				$count = 1;
			}
			if ($rnd == 5) {
				$it = 427;
				$count = 1;
			}
			if ($rnd == 6) {
				$it = 1026;
				$count = 2;
			}
		}
		minus_item(1, 1035, $user_id);
		plus_item($count, $it, $user_id);
		$itm = $mysqli->query("SELECT name FROM base_items WHERE `id` = '" . $it . "' ")->fetch_assoc();
		return $_SESSION['TEXT_ITEMS_USE'] = "Духи принесли вам " . $itm['name'] . " x" . price($count);
	}
}
#Функция клан ордера
function ClanOrder()
{
	global $mysqli;
	minus_item(1, 257);
	minus_item(1, $item_id);
	$_SESSION['clan_order'] = true;
	echo "<script>window.location.href='game.php?fun=clan_order';</script>";
}
#Функция эмблемной книги
function ClanEblems()
{
	global $mysqli;

	$clan = $mysqli->query("SELECT * FROM base_clans WHERE `admin_id` = '" . $_SESSION['user_id'] . "' ")->fetch_assoc();
	if ($clan) {
		$mysqli->query("UPDATE base_clans SET emblem_count = emblem_count+10 WHERE `admin_id` = '" . $_SESSION['user_id'] . "'");
		minus_item(1, 258);
		return $_SESSION['TEXT_ITEMS_USE'] = 'Эмблемы успешно добавлены!';
	} else {
		return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка!';
	}
}
#Функция корня априкорна
function Aprikorn($pok_id)
{
	global $mysqli;
	minus_item(1, 288);
	$pok = $mysqli->query("SELECT * FROM user_pokemons WHERE `id` = '" . $pok_id . "'")->fetch_assoc();
	$evcount = $pok['ev'] + $pok['hp_ev'] + $pok['atc_ev'] + $pok['def_ev'] + $pok['speed_ev'] + $pok['spatc_ev'] + $pok['spdef_ev'];
	$mysqli->query("UPDATE user_pokemons SET ev = '" . $evcount . "', hp_ev = 0, atc_ev = 0, def_ev = 0, speed_ev = 0, spatc_ev = 0, spdef_ev = 0 WHERE id = '" . $pok_id . "'");
	return $_SESSION['TEXT_ITEMS_USE'] = 'EV успешно сброшены!';
}
function sweetYag($pok_id)
{
	global $mysqli;

	minus_item(1, 179);
	$pok = $mysqli->query("SELECT * FROM user_pokemons WHERE `id` = '" . $pok_id . "'")->fetch_assoc();
	if ($pok['simpaty'] == 1) {
		$nsimp = (rand(2, 3));
	} elseif ($pok['simpaty'] == 2) {
		$nsimp = (rand(1, 1));
	} elseif ($pok['simpaty'] == 3) {
		$nsimp = (rand(1, 2));
	}
	$mysqli->query("UPDATE user_pokemons SET simpaty = '" . $nsimp . "' WHERE id = '" . $pok_id . "'");
	return $_SESSION['TEXT_ITEMS_USE'] = 'Симпатия покемона сменилась!';
}
function Everstone($pok_id)
{
	global $mysqli;
	minus_item(1, 7);
	$pok = $mysqli->query("SELECT Everstone FROM user_pokemons WHERE `id` = '" . $pok_id . "'")->fetch_assoc();
	if ($pok['Everstone'] == 1) {
		$Everstone = 2;
	} else {
		$Everstone = 1;
	}
	$mysqli->query("UPDATE user_pokemons SET Everstone = '" . $Everstone . "' WHERE id = '" . $pok_id . "'");
	return $_SESSION['TEXT_ITEMS_USE'] = 'Симпатия покемона сменилась!';
}

function transsex($pok_id)
{
	global $mysqli;
	minus_item(1, 1027);
	$pok = $mysqli->query("SELECT * FROM user_pokemons WHERE `id` = '" . $pok_id . "'")->fetch_assoc();
	if ($pok['gender'] == male) {
		$ngend = female;
	} else {
		$ngend = male;
	}
	$mysqli->query("UPDATE user_pokemons SET gender = '" . $ngend . "' WHERE id = '" . $pok_id . "'");
	return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон сделал операцию!';
}
function Vitamin($pok_id, $itm)
{
	global $mysqli;
	$pok = $mysqli->query("SELECT * FROM user_pokemons WHERE `id` = '" . $pok_id . "'")->fetch_assoc();
	if ($pok['vitamines'] < 100) {
		if ($itm == 10) { // Йод
			if ($pok['hp_ev'] <= 124) {
				$mysqli->query("UPDATE `user_pokemons` SET `hp_ev` = `hp_ev` + 2, `vitamines` = `vitamines`+2 WHERE id = '" . $pok_id . "'");
				minus_item(1, $itm);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон удачно принял витамины!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'В одном стате максимум 126 EV!';
			}
		}
		if ($itm == 59) { // Протеин
			if ($pok['atc_ev'] <= 124) {
				$mysqli->query("UPDATE `user_pokemons` SET `atc_ev` = `atc_ev` + 2, `vitamines` = `vitamines`+2 WHERE id = '" . $pok_id . "'");
				minus_item(1, $itm);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон удачно принял витамины!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'В одном стате максимум 126 EV!';
			}
		}
		if ($itm == 39) { // Железо
			if ($pok['def_ev'] <= 124) {
				$mysqli->query("UPDATE `user_pokemons` SET `def_ev` = `def_ev` + 2, `vitamines` = `vitamines`+2 WHERE id = '" . $pok_id . "'");
				minus_item(1, $itm);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон удачно принял витамины!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'В одном стате максимум 126 EV!';
			}
		}
		if ($itm == 24) { // Углеводы
			if ($pok['speed_ev'] <= 124) {
				$mysqli->query("UPDATE `user_pokemons` SET `speed_ev` = `speed_ev` + 2, `vitamines` = `vitamines`+2 WHERE id = '" . $pok_id . "'");
				minus_item(1, $itm);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон удачно принял витамины!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'В одном стате максимум 126 EV!';
			}
		}
		if ($itm == 23) { // Кальций
			if ($pok['spatc_ev'] <= 124) {
				$mysqli->query("UPDATE `user_pokemons` SET `spatc_ev` = `spatc_ev` + 2, `vitamines` = `vitamines`+2 WHERE id = '" . $pok_id . "'");
				minus_item(1, $itm);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон удачно принял витамины!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'В одном стате максимум 126 EV!';
			}
		}
		if ($itm == 11) { // Цинк
			if ($pok['spdef_ev'] <= 124) {
				$mysqli->query("UPDATE `user_pokemons` SET `spdef_ev` = `spdef_ev` + 2, `vitamines` = `vitamines`+2 WHERE id = '" . $pok_id . "'");
				minus_item(1, $itm);
				return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон удачно принял витамины!';
			} else {
				return $_SESSION['TEXT_ITEMS_USE'] = 'В одном стате максимум 126 EV!';
			}
		}
	} else {
		return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон больше не может употреблять витамины!';
	}
}

function Ticet($itm)
{
	global $mysqli;
	$user = $mysqli->query('SELECT * FROM users WHERE id = ' . $_SESSION['user_id'])->fetch_assoc();
	$baseloc = $mysqli->query('SELECT * FROM base_location WHERE id = ' . $user['location'])->fetch_assoc();
	if ($user['location'] == 2 or  $baseloc['region'] == 3 or  $baseloc['region'] == 4 or $baseloc['region'] == 7 or $user['location'] == 1000 or $user['location'] == 1005 or $user['location'] == 10 or $user['location'] == 395 or $user['location'] == 270 or $user['location'] == 521 or $user['location'] == 1001  or $user['location'] == 1008  or $user['location'] == 1007) {
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы не можете совершить полет!';
	}
	if ($itm == 180) { // Джотто - Канто

		if ($baseloc['region'] == 1) {
			$samol = 1000;
		} else {
			$samol = 1001;
		}
		$tmroad = time() + 600;
		minus_item(1, $itm);
		$mysqli->query("UPDATE `users` SET `reload` = '1', `location` = '$samol', `time_road` = '$tmroad' WHERE `id` = '" . $_SESSION['user_id'] . "'");
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы удачно сели на самолет!';
	}
}
function Ticet1($itm)
{
	global $mysqli;
	$user = $mysqli->query('SELECT * FROM users WHERE id = ' . $_SESSION['user_id'])->fetch_assoc();
	$baseloc = $mysqli->query('SELECT * FROM base_location WHERE id = ' . $user['location'])->fetch_assoc();
	if ($baseloc['region'] == 2 or $baseloc['region'] == 4 or $baseloc['region'] == 7 or  $user['location'] == 1000 or $user['location'] == 1001  or $user['location'] == 1008  or $user['location'] == 1007) {
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы не можете совершить полет!';
	}

	if ($itm == 193) {  // Джотто - Селен
		if ($baseloc['region'] == 3) {
			$samol1 = 1108;
		} else {
			$samol1 = 1107;
		}
		$tmroad = time() + 600;
		minus_item(1, $itm);
		$mysqli->query("UPDATE `users` SET `reload` = '1', `location` = '$samol1', `time_road` = '$tmroad' WHERE `id` = '" . $_SESSION['user_id'] . "'");
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы удачно сели на самолет!';
	}
}
function Ticet2($itm)
{
	global $mysqli;
	$user = $mysqli->query('SELECT * FROM users WHERE id = ' . $_SESSION['user_id'])->fetch_assoc();
	$baseloc = $mysqli->query('SELECT * FROM base_location WHERE id = ' . $user['location'])->fetch_assoc();
	if ($baseloc['region'] == 1 or $baseloc['region'] == 4 or $baseloc['region'] == 7 or  $user['location'] == 1000 or $user['location'] == 1001  or $user['location'] == 1008  or $user['location'] == 1007) {
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы не можете совершить полет!';
	}

	if ($itm == 194) {  // Канто - Селен
		if ($baseloc['region'] == 3) {
			$samol2 = 1111;
		} else {
			$samol2 = 1112;
		}
		$tmroad = time() + 600;
		minus_item(1, $itm);
		$mysqli->query("UPDATE `users` SET `reload` = '1', `location` = '$samol2', `time_road` = '$tmroad' WHERE `id` = '" . $_SESSION['user_id'] . "'");
		return $_SESSION['TEXT_ITEMS_USE'] = 'Вы удачно сели на самолет!';
	}
}

function TM($pok_id, $itm)
{
	global $mysqli;
	$pk = $mysqli->query('SELECT basenum FROM user_pokemons WHERE id = ' . $pok_id)->fetch_assoc();
	$baseit = $mysqli->query('SELECT tm FROM base_items WHERE id = ' . $itm)->fetch_assoc();
	$tm = $mysqli->query("SELECT * FROM tm_pk WHERE `pok` = '" . $pk['basenum'] . "' and `attack` = '" . $baseit['tm'] . "'")->fetch_assoc();
	if ($tm) {
		$mysqli->query("INSERT INTO mypok_learn (atk , pok ) VALUES ('" . $baseit['tm'] . "','" . $pok_id . "') ");
		minus_item(1, $itm);
		return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон изучил атаку!';
	} else {
		return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон не может изучить эту атаку!';
	}
}

function TMTEST($pok_id, $itm)
{
	global $mysqli;
	$pk = $mysqli->query('SELECT basenum FROM user_pokemons WHERE id = ' . $pok_id)->fetch_assoc();
	$baseit = $mysqli->query('SELECT tm FROM base_items WHERE id = ' . $itm)->fetch_assoc();
	$attakidtm = $mysqli->query("SELECT atac_id FROM base_attacks WHERE `tmid` = '" . $baseit)->fetch_assoc();
	$tm = $mysqli->query("SELECT * FROM tm_pk WHERE `pok` = '" . $pk . "' and `attack` = '" . $attakidtm)->fetch_assoc();
	if ($tm) {
		$mysqli->query("INSERT INTO mypok_learn (atk , pok ) VALUES ('" . $attakidtm . "','" . $pok_id . "') ");
		minus_item(1, $itm);
		return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон изучил атаку!';
	} else {
		return $_SESSION['TEXT_ITEMS_USE'] = 'Покемон не может изучить эту атаку!';
	}
}

function Inkub($egg)
{
	global $mysqli;
	$eggs = $mysqli->query("SELECT reborn FROM user_items WHERE `user_id` = '" . $_SESSION['user_id'] . "' and `id` = '" . $egg . "' and `egg` = '1' LIMIT 1")->fetch_assoc();
	if ($eggs) {
		$rebs = round(($eggs['reborn'] - time()) / 86400);
		$reb = ($rebs / 2) * 86400 + time();
		$mysqli->query("UPDATE `user_items` SET `reborn` = '$reb' WHERE `id` = '" . $egg . "'");
		minus_item(1, 298);
		return $_SESSION['TEXT_ITEMS_USE'] = 'Время вылупления покемона сокращено!';
	} else {
		return $_SESSION['TEXT_ITEMS_USE'] = 'Ошибка!';
	}
}
