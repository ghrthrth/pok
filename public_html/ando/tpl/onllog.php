<?php
ini_set("display_errors", 0);
$vik = 1;
$usr = $mysqli->query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
$conquer = $mysqli->query("SELECT * FROM `base_location` WHERE `id` = '" . $usr['location'] . "'")->fetch_assoc();
if (date("G") >= 18 and date("G") < 20) {
  //Настройка шансов выбивания Item (базовые значения: 700 и 1000):
  $ChanceItemDrop1 = 200; // рейт 
  $ChanceItemDrop2 = 400; // Счастливые часы
} elseif ($usr['clan_id'] == $conquer['conquer']) {
  $ChanceItemDrop1 = 200; // рейт 
  $ChanceItemDrop2 = 400; // Захваченная лока
} else {
  $ChanceItemDrop1 = 300; // рейт 
  $ChanceItemDrop2 = 500; // Обычный рейт без умножителей
}

$switchEventPaskha = 0;

// if (date("G") >= 18 and date("G") < 20) {
//   //Настройка шансов выбивания Item (базовые значения: 700 и 1000):
//   $ChanceItemDrop1 = 300; // рейт 
//   $ChanceItemDrop2 = 450; // Счастливые часы
// } elseif ($usr['clan_id'] == $conquer['conquer']) {
//   $ChanceItemDrop1 = 300; // рейт 
//   $ChanceItemDrop2 = 450; // Захваченная лока
// } else {
//   $ChanceItemDrop1 = 500; // рейт 
//   $ChanceItemDrop2 = 700; // Обычный рейт без умножителей
// } // это на др. Затем - удалить


if ($vik == 1) {
  $gm = $mysqli->query("SELECT * FROM `game` WHERE`viktorina` <= '" . time() . "'")->fetch_assoc();
  $us = $mysqli->query("SELECT id FROM `users` WHERE `online_time` <= NOW() - INTERVAL 20 SECOND")->fetch_assoc();
  $vk = $mysqli->query("SELECT * FROM `viktorina` WHERE `status` = '0' ORDER BY RAND() ")->fetch_assoc();
  if ($user_id == $us['id'] and $gm['if'] > 0 and $vk['id'] > 0) {
    $mysqli->query("UPDATE `game` SET `viktorina` = '" . (time() + 60) . "',`ans`='" . $vk['id'] . "' WHERE `if` = '" . $gm['if'] . "'");
    $date = date("H:i");
    $quest = "Внимание вопрос: " . $vk['quest'];
    $mysqli->query("INSERT INTO chat(user, text, data, private, to_user, time) VALUES ('2', '" . $quest . "', '" . $date . "', '0','0', NOW() )");
    $mysqli->query("UPDATE viktorina SET status = '1' WHERE `id` = '" . $vk['id'] . "'");
  }
}

$mysqli->query("UPDATE users SET online_time = " . time() . " WHERE id = " . $_SESSION['user_id']);
$lifetime = time() - 300;
$mysqli->query('UPDATE users SET online = 0 WHERE online_time < ' . $lifetime);
$mysqli->query('UPDATE users SET online = 1 WHERE online_time > ' . $lifetime);
$app_ = $mysqli->query('SELECT id FROM app WHERE timeout < ' . time());
while ($app = $app_->fetch_assoc()) {
  $mysqli->query("DELETE FROM `app` WHERE `id` = '" . $app['id'] . "'");
}
if ($user['reload'] == 1) {
  $mysqli->query("UPDATE users SET reload = '0' WHERE `id` = '" . $user_id . "'");
  echo "<script>parent.frames._location.location.reload();</script>";
}

// arena
if ($user['location'] == 137) {
  $cAr =  $mysqli->query("SELECT * FROM `users` WHERE `barena`='1' and `online`='1' and `status` = 'free'");
  $cArena = $cAr->num_rows;
  if ($cArena >= 4) {
    $group = floor($cArena / 2);
    $i = 1;
    $Arena = array();
    $usA = $mysqli->query("SELECT id FROM `users` WHERE `barena`='1' and `online`='1' and `status` = 'free' ORDER BY RAND()");
    while ($usA_ = $usA->fetch_assoc()) {
      $Arena[$i] = $usA_['id'];
      $i = $i + 1;
    }
    for ($e = 0; $e++ <= $group;) {
      $m = $e - 1;
      $e2 = $e * 2;
      $e = $e + $m;
      $tdata = date("Y-m-d H:i:s");
      $mysqli->query("INSERT INTO battle (user1 , user2, data,loc,arena) VALUES ('" . $Arena[$e] . "','" . $Arena[$e2] . "', '" . $tdata . "','" . $user['location'] . "','1') ");
      $mysqli->query("UPDATE users SET status = 'battle',reload = '1' WHERE `id` = '" . $Arena[$e] . "'");
      $mysqli->query("UPDATE users SET status = 'battle',reload = '1' WHERE `id` = '" . $Arena[$e2] . "'");
    }
  }
}
// end arena
//new_random_arena
if ($user['location'] == 523) {
  $cAr =  $mysqli->query("SELECT * FROM `users` WHERE `rarena`='1' and `online`='1' and `status` = 'free'");
  $cArena = $cAr->num_rows;
  if ($cArena >= 4) {
    $group = floor($cArena / 2);
    $i = 1;
    $Arena = array();
    $usA = $mysqli->query("SELECT id FROM `users` WHERE `rarena`='1' and `online`='1' and `status` = 'free' ORDER BY RAND()");
    while ($usA_ = $usA->fetch_assoc()) {
      $Arena[$i] = $usA_['id'];
      $i = $i + 1;
    }
    for ($e = 0; $e++ <= $group;) {
      $m = $e - 1;
      $e2 = $e * 2;
      $e = $e + $m;
      $tdata = date("Y-m-d H:i:s");
      $mysqli->query("INSERT INTO battle (user1 , user2, data,loc,arena) VALUES ('" . $Arena[$e] . "','" . $Arena[$e2] . "', '" . $tdata . "','" . $user['location'] . "','1') ");
      $mysqli->query("UPDATE users SET status = 'battle',reload = '1' WHERE `id` = '" . $Arena[$e] . "'");
      $mysqli->query("UPDATE users SET status = 'battle',reload = '1' WHERE `id` = '" . $Arena[$e2] . "'");
    }
  }
}
//end new_random_arena
$count_pk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='" . $user['id'] . "' and `active`='1' and `hp` > '0' ");
$count_pk_ = $count_pk->num_rows;
if (item_isset(241, 1)) {
  if (mt_rand(1, 35) <= 5) {
    $rand_ = 1;
  } else {
    $rand_ = 3;
  }
} else {
  if (mt_rand(1, 100) <= 5) {
    $rand_ = 1;
  } else {
    $rand_ = 3;
  }
}
if (item_isset(146, 1)) {
  $item_find = "and (`item` = '0' or `item` = '146')";
} else {
  $item_find = "and `item` = '0'";
}
// Начало функции нападения покемона на игрока.
if ($user['timepok'] < time()) {
  // if ($conquer['trub_count'] > 0) {
    // $catchPok = $mysqli->query("SELECT * FROM `pok_town` WHERE (`region` = '0' or `region` = '" . $baseloc['region'] . "') and (`town`='" . $user['location'] . "' or `town` = '9999' or `town` = '999') and (`timeday` = '" . $timeday . "' or `timeday` = '3') $item_find and `chanc` >= '" . mt_rand($rand_, 10000) . "' ORDER BY RAND() LIMIT 1")->fetch_assoc();
  // } else {
    $catchPok = $mysqli->query("SELECT * FROM `pok_town` WHERE (`region` = '0' or `region` = '" . $baseloc['region'] . "') and (`town`='" . $user['location'] . "' or `town` = '999') and (`timeday` = '" . $timeday . "' or `timeday` = '3') $item_find and `chanc` >= '" . mt_rand($rand_, 10000) . "' ORDER BY RAND() LIMIT 1")->fetch_assoc();
  // } 
}
if ($user['status'] == "free" && $user['hunt'] == 1 && $count_pk_ > 0 && $baseloc['pve'] == 1 && isset($catchPok)) {
  $switchEventPaskha = 0;
  if($switchEventPaskha == 1){
    $eventHunt = rand(1,100);
  if($eventHunt <= 15 and quest_isset(207)){
    $rndmpok = rand(1,100);
    if($rndmpok > 2){
      $pokEvent = [15,57,89,130,272,405,429];
    }else{
      $pokEvent = [485];
    }
    $randKey = array_rand($pokEvent);
    $resultRand = $pokEvent[$randKey];

    $inCatchPok = $mysqli->query("SELECT * FROM `base_pokemon` WHERE `id`='" . $resultRand . "' LIMIT 1")->fetch_assoc();

  $inMyPok = $mysqli->query("SELECT * FROM `user_pokemons` WHERE  `user_id`='" . $user['id'] . "' and `hp`>'0' and `active`='1' ORDER BY start_pok DESC LIMIT 1")->fetch_assoc();
  if($rndmpok > 2){
    $lvl = 200;
  }else{
    $lvl = 300;
  }
  $lvlBas = $lvl + 1;
  $harR = rand(1, 26);
  $rdom = rand(1, 100);
  if (round($inCatchPok['sex_m']) == 0 && round($inCatchPok['sex_f']) == 0) {
    $sex = 0;
  } else {
    if (round($inCatchPok['sex_m']) >= $rdom) {
      $sex = 1;
    } else {
      $sex = 2;
    }
  }

  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '" . $harR . "'")->fetch_assoc();
  $hp =    round(($inCatchPok['hp'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 10 + $lvl);
  $atk =   round((($inCatchPok['atk'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['atk']);
  $def =   round((($inCatchPok['def'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['def']);
  $speed = round((($inCatchPok['spd'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['speed']);
  $sdef =  round((($inCatchPok['sdef'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['sdef']);
  $satk =  round((($inCatchPok['satk'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['satk']);
  if($rndmpok > 2){
  $atk_pok1 = $mysqli->query("SELECT * FROM attack_learn WHERE `poke_base_id` = '" . $resultRand . "' and `atc_lvl` < '$lvlBas' LIMIT 1")->fetch_assoc();
  $atk_pok2 = $mysqli->query("SELECT * FROM attack_learn WHERE `poke_base_id` = '" . $resultRand . "' and `atc_lvl` < '$lvlBas' and `atac_id` != '" . $atk_pok1['atac_id'] . "' LIMIT 1")->fetch_assoc();
  $atk_pok3 = $mysqli->query("SELECT * FROM attack_learn WHERE `poke_base_id` = '" . $resultRand . "' and `atc_lvl` < '$lvlBas' and `atac_id` != '" . $atk_pok1['atac_id'] . "' and `atac_id` != '" . $atk_pok2['atac_id'] . "' LIMIT 1")->fetch_assoc();
  $atk_pok4 = $mysqli->query("SELECT * FROM attack_learn WHERE `poke_base_id` = '" . $resultRand . "' and `atc_lvl` < '$lvlBas' and `atac_id` != '" . $atk_pok1['atac_id'] . "' and `atac_id` != '" . $atk_pok2['atac_id'] . "' and `atac_id` != '" . $atk_pok3['atac_id'] . "' LIMIT 1")->fetch_assoc();
  $atk1 = $atk_pok1['atac_id'];
  $atk2 = $atk_pok2['atac_id'];
  $atk3 = $atk_pok3['atac_id'];
  $atk4 = $atk_pok4['atac_id'];
  }else{
  $atk1 = 89;
  $atk2 = 463;
  $atk3 = 156;
  $atk4 = 242;
  }
  $user_status = $mysqli->query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
  $clantop = $mysqli->query('SELECT id FROM base_clans ORDER BY rating DESC LIMIT 1')->fetch_assoc();
  $rndItm = rand(1,100);
  if($rndmpok > 2){
  if($rndItm >= 1 and $rndItm <= 19 ){
    $arrayItems = [309, 1053, 330, 179, 101, 42];
    $rndK = array_rand($arrayItems);
    $item = $arrayItems[$rndK];
  }
  if($rndItm >= 20 and $rndItm <= 100 ){ $item = 446; }
  }else{
    $randItem = rand(1,100);
    if($randItem > 2){
    $arrayItems = [1060];
    $rndK = array_rand($arrayItems);
    $item = $arrayItems[$rndK];
    }else{
      $item = 384;
    }
  }
  $drp = $mysqli->query("SELECT * FROM drop_item WHERE `pok` = '" . $resultRand . "' or `pok` = '999' ORDER BY RAND()*chanc DESC LIMIT 1")->fetch_assoc();
  $checkquest = $mysqli->query("SELECT * FROM user_quests WHERE `user_id` = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
  $droplimit_445 = $mysqli->query("SELECT * FROM drop_item WHERE item = 445")->fetch_assoc();
      /* if($checkshinepok['type'] == "shine" and $checkshinepok['catch'] == 1){
              $item = 101;
            }*/







  $mysqli->query("INSERT INTO pokem_vs (basenum,numbpu,name,lvl,hp,hp_max,attack,def,speed,sp_attack,sp_def,har,type,gender,atk1,atk2,atk3,atk4,money,item,catch ) VALUES('" . $resultRand . "','" . $resultRand . "','" . $inCatchPok['name'] . "','$lvl','$hp','$hp','$atk','$def','$speed','$satk','$sdef','$harR','normal','$sex','$atk1','$atk2','$atk3','$atk4','500','$item','1')");
  $pID = $mysqli->insert_id;
  if (rand(1, 30) == 2) {
    $cap = 1;
  } elseif ($_SESSION['user_id'] == 1617) {
    $cap = 0;
  } else {
    $cap = 0;
  }
  $captha_timer = time() + 5;
  $mysqli->query("INSERT INTO battle (user1 , pok1 , pok2  , tip, data, kaptcha, kaptcha_timer) VALUES('" . $user['id'] . "','" . $inMyPok['id'] . "','$pID','1','" . date("Y-m-d H:i:s") . "','" . $cap . "','" . $captha_timer . "')");
  $mysqli->query("UPDATE users SET `status`='battle' WHERE id='" . $user['id'] . "'");
  echo "<script>parent.frames._location.location.reload();</script>";
  exit;
  }
}
  $inCatchPok = $mysqli->query("select * from `base_pokemon` WHERE `id`='" . $catchPok['pok'] . "' LIMIT 1")->fetch_assoc();

  $inMyPok = $mysqli->query("select * from `user_pokemons` WHERE  `user_id`='" . $user['id'] . "' and `hp`>'0' and `active`='1' ORDER BY start_pok DESC LIMIT 1")->fetch_assoc();
  $lvlNxt = $catchPok['lvl'] + 5;
  $lvl = rand($catchPok['lvl'], $lvlNxt);
  $lvlBas = $lvl + 1;
  $harR = rand(1, 26);
  $rdom = rand(1, 100);
  if (round($inCatchPok['sex_m']) == 0 && round($inCatchPok['sex_f']) == 0) {
    $sex = 0;
  } else {
    if (round($inCatchPok['sex_m']) >= $rdom) {
      $sex = 1;
    } else {
      $sex = 2;
    }
  }

  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '" . $harR . "'")->fetch_assoc();
  if (item_isset(231, 1)) {
    if (mt_rand(1, 800) == 1) {
      $shiny = "shine";
    } else {
      $shiny = "normal";
    }
  } else {
    if (mt_rand(1, 2000) == 1) {
      $shiny = "shine";
    } else {
      $shiny = "normal";
    }
  }
//   $hellowin = 0; //switch hellowin ivent
//   if ($hellowin == 1) {
//     /*$lvlhell = rand(1,100);
//   if($lvlhell >= 50){
//   if($catchPok['pok'] == 169 or $catchPok['pok'] == 38 or $catchPok['pok'] == 44 or $catchPok['pok'] == 94 or $catchPok['pok'] == 130 or $catchPok['pok'] == 217 or $catchPok['pok'] == 78 or $catchPok['pok'] == 241 or $catchPok['pok'] == 89 or $catchPok['pok'] == 128 or $catchPok['pok'] == 491) {
//     $shiny = "zombie"; 
//     $lvl = 150; 
//     $catchPok['catch'] = 1;
//   }else{ 
//     $shiny = "normal"; 
//   }
//  }else{*/
//     if ($catchPok['pok'] == 169 or $catchPok['pok'] == 38 or $catchPok['pok'] == 44 or $catchPok['pok'] == 94 or $catchPok['pok'] == 130 or $catchPok['pok'] == 217 or $catchPok['pok'] == 78 or $catchPok['pok'] == 241 or $catchPok['pok'] == 89 or $catchPok['pok'] == 128 or $catchPok['pok'] == 491) {
//       $shiny = "zombie";
//       $lvl = 15;
//       $catchPok['catch'] = 0;
//     } else {
//       $shiny = "normal";
//     }
//   }
  // $springevent = 0; // весенний ивент
  // if ($springevent == 1) {
  //   if ($catchPok['pok'] == 568 or $catchPok['pok'] == 569) {
  //     $lvl = 10;
  //     $catchPok['catch'] = 1;
  //     $mysqli->query("UPDATE `users` SET `spring_pok_count` = `spring_pok_count` + 1 WHERE id = " . $user['id']);
  //     $mysqli->query("UPDATE `base_location` SET `trub_count` = `trub_count` - 1 WHERE id = " . $user['location']);
  //   }
  // }
  /*$randompok = rand(1,150);
 $namepoktest = $mysqli->query("SELECT * FROM base_pokemon WHERE id = '".$randompok."'")->fetch_assoc();
 if($catchPok['pok'] == 150){ $catchPok['pok'] = $randompok; $inCatchPok['name'] = $namepoktest['name']; }*/


  $hp =    round(($inCatchPok['hp'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 10 + $lvl);
  $atk =   round((($inCatchPok['atk'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['atk']);
  $def =   round((($inCatchPok['def'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['def']);
  $speed = round((($inCatchPok['spd'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['speed']);
  $sdef =  round((($inCatchPok['sdef'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['sdef']);
  $satk =  round((($inCatchPok['satk'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['satk']);
  $atk_pok1 = $mysqli->query("SELECT * FROM attack_learn WHERE `poke_base_id` = '" . $catchPok['pok'] . "' and `atc_lvl` < '$lvlBas' LIMIT 1")->fetch_assoc();
  $atk_pok2 = $mysqli->query("SELECT * FROM attack_learn WHERE `poke_base_id` = '" . $catchPok['pok'] . "' and `atc_lvl` < '$lvlBas' and `atac_id` != '" . $atk_pok1['atac_id'] . "' LIMIT 1")->fetch_assoc();
  $atk1 = $atk_pok1['atac_id'];
  $atk2 = $atk_pok2['atac_id'];
  $user_status = $mysqli->query("SELECT * FROM `users` WHERE `id` = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
  $reit_money = $mysqli->query("SELECT * FROM switch_tab WHERE id = 1")->fetch_assoc();
  if (date("G") >= 18 and date("G") <= 20) {
    $money =  round((rand(5, 7) * $lvl + rand(1, 15)) / 2.1) * 1.0 * $reit_money['money_reit_happyhours']; // рейт дропа кредитов
  } else {
    $money =  round((rand(5, 7) * $lvl + rand(1, 15)) / 2.1) * 1.0 * $reit_money['money_reit']; // рейт дропа кредитов
  }
  if ($lvl >= 70) {
    $money = $money / 2;
  }
  if ($lvl >= 40) {
    $money = $money / 0.6;
  }
  if ($lvl <= 20) {
    $money = $money / 0.5;
  }
  if ($user_status['time_scaner'] > time()) {
    $money = $money * 2;
  }
  if ($usr['clan_id'] == $conquer['conquer']) {
    $money = $money * 1.5;
  }
  $clantop = $mysqli->query('SELECT id FROM base_clans ORDER BY rating DESC LIMIT 1')->fetch_assoc();
  $userclan = $mysqli->query('SELECT * FROM users WHERE id = ' . $_SESSION['user_id'] . '')->fetch_assoc();
  if ($userclan['clan_id'] == $clantop['id']) {
    $money = $money * 1.3;
  }
  $pk123 = $mysqli->query("SELECT * FROM battle WHERE `user1` = '" . $user_id . "' and  `atk1` = 6 LIMIT 1")->fetch_assoc();

  if ($pk123) {
    $money = $money * 100;
  }
  $item = 0;
  $normal = $ChanceItemDrop1;
  $normal2 = $ChanceItemDrop2;

  $drp = $mysqli->query("SELECT * FROM drop_item WHERE `pok` = '" . $catchPok['pok'] . "' or `pok` = '999' ORDER BY RAND()*chanc DESC LIMIT 1")->fetch_assoc();
  $checkquest = $mysqli->query("SELECT * FROM user_quests WHERE `user_id` = '" . $_SESSION['user_id'] . "'")->fetch_assoc();
  $droplimit_445 = $mysqli->query("SELECT * FROM drop_item WHERE item = 445")->fetch_assoc();
  /*$checkshinepok = $mysqli->query("SELECT * FROM pokem_vs WHERE `basenum` = '".$catchPok['pok']."' or `pok` = '999' ORDER BY RAND()*chanc DESC LIMIT 1")->fetch_assoc();*/
  if ($item == 0) {
    if ($drp['loc'] == 0 or $drp['loc'] == $user['location']) {
      if ($user_status['time_scaner'] > time()) {
        $chanse_drp = rand(1, $normal);
      } else {
        $chanse_drp = rand(1, $normal2);
      }
      if ($chanse_drp < $drp['chanc'] and $drp['quest_id'] == 0) {
        $item = $drp['item'];
        if ($item == 385) {
          $item = rand(385, 426);
        }
        if ($item == 385 and rand(1, 2500) == 998) {
          $item = 425;
        }
        if ($item == 385 and rand(1, 2500) == 1322) {
          $item = 424;
        }
        if ($item == 425 or $item == 424) {
          $item = 423;
        }
        if ($item == 445 and $drp['drop_limit'] > 0) {
          $mysqli->query("UPDATE drop_item SET drop_limit = drop_limit - 1 WHERE item = 445");
        }
      }
      /* if($checkshinepok['type'] == "shine" and $checkshinepok['catch'] == 1){
              $item = 101;
            }*/
      if ($drp['quest_id'] != 0) {
        $check_quest = $mysqli->query("SELECT * FROM user_quests WHERE user_id = '" . $_SESSION['user_id'] . "' AND quest_id = '" . $drp['quest_id'] . "' AND step = '" . $drp['quest_prc'] . "' ")->fetch_assoc();
        if ($check_quest) {
          if ($chanse_drp <= $drp['chanc']) {
            $item = $drp['item'];
            if ($drp['quest_upd'] != 0) {
              quest_update($drp['quest_id'], $drp['quest_upd']);
            }
          }
        }
      }
    }
  }







  $mysqli->query("INSERT INTO pokem_vs (basenum,numbpu,name,lvl,hp,hp_max,attack,def,speed,sp_attack,sp_def,har,type,gender,atk1,atk2,money,item,catch ) VALUES('" . $catchPok['pok'] . "','" . $catchPok['pok'] . "','" . $inCatchPok['name'] . "','$lvl','$hp','$hp','$atk','$def','$speed','$satk','$sdef','$harR','$shiny','$sex','$atk1','$atk2','$money','$item','" . $catchPok['catch'] . "')");
  $pID = $mysqli->insert_id;
  if (rand(1, 30) == 2) {
    $cap = 1;
  } elseif ($_SESSION['user_id'] == 1617) {
    $cap = 0;
  } else {
    $cap = 0;
  }
  $captha_timer = time() + 5;
  $mysqli->query("INSERT INTO battle (user1 , pok1 , pok2  , tip, data, kaptcha, kaptcha_timer) VALUES('" . $user['id'] . "','" . $inMyPok['id'] . "','$pID','1','" . date("Y-m-d H:i:s") . "','" . $cap . "','" . $captha_timer . "')");
  $mysqli->query("UPDATE users SET `status`='battle' WHERE id='" . $user['id'] . "'");
  echo "<script>parent.frames._location.location.reload();</script>";
}
// Конец функции нападения покемона на игрока.
if (item_isset(241, 1)) {
  $item_find = "and (`item` = '0' or `item` = '241')";
} else {
  $item_find = "and `item` = '0'";
}
if ($user['timepok'] < time()) {
  $catchPok = $mysqli->query("SELECT * from `pok_town` WHERE (`region` = '0' or `region` = '" . $baseloc['region'] . "') and (`town`='" . $user['location'] . "' or `town` = '999') and (`timeday` = '" . $timeday . "' or `timeday` = '3') $item_find and `chanc` >= '" . mt_rand($rand_, 10000) . "' ORDER BY RAND() LIMIT 1")->fetch_assoc();
}
if ($user['status'] == "free" && $user['hunt'] == 1 && $count_pk_ > 0 && $baseloc['pve'] == 1 && isset($catchPok)) {
  $inCatchPok = $mysqli->query("select * from `base_pokemon` WHERE `id`='" . $catchPok['pok'] . "' LIMIT 1")->fetch_assoc();

  $inMyPok = $mysqli->query("select * from `user_pokemons` WHERE  `user_id`='" . $user['id'] . "' and `hp`>'0' and `active`='1' ORDER BY start_pok DESC LIMIT 1")->fetch_assoc();
  $lvlNxt = $catchPok['lvl'] + 5;
  $lvl = rand($catchPok['lvl'], $lvlNxt);
  $lvlBas = $lvl + 1;
  $harR = rand(1, 26);
  $rdom = rand(1, 100);
  if (round($inCatchPok['sex_m']) == 0 && round($inCatchPok['sex_f']) == 0) {
    $sex = 0;
  } else {
    if (round($inCatchPok['sex_m']) >= $rdom) {
      $sex = 1;
    } else {
      $sex = 2;
    }
  }


  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '" . $harR . "'")->fetch_assoc();
  if (item_isset(231, 1)) {
    if (mt_rand(1, 800) == 1) {
      $shiny = "shine";
    } else {
      $shiny = "normal";
    }
  } else {
    if (mt_rand(1, 2000) == 1) {
      $shiny = "shine";
    } else {
      $shiny = "normal";
    }
  }



  $hp =    round(($inCatchPok['hp'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 10 + $lvl);
  $atk =   round((($inCatchPok['atk'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['atk']);
  $def =   round((($inCatchPok['def'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['def']);
  $speed = round((($inCatchPok['spd'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['speed']);
  $sdef =  round((($inCatchPok['sdef'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['sdef']);
  $satk =  round((($inCatchPok['satk'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['satk']);
  $atk_pok1 = $mysqli->query("SELECT * FROM attack_learn WHERE `poke_base_id` = '" . $catchPok['pok'] . "' and `atc_lvl` < '$lvlBas' LIMIT 1")->fetch_assoc();
  $atk_pok2 = $mysqli->query("SELECT * FROM attack_learn WHERE `poke_base_id` = '" . $catchPok['pok'] . "' and `atc_lvl` < '$lvlBas' and `atac_id` != '" . $atk_pok1['atac_id'] . "' LIMIT 1")->fetch_assoc();
  $atk1 = $atk_pok1['atac_id'];
  $atk2 = $atk_pok2['atac_id'];
  $user_status = $mysqli->query('SELECT * FROM user_status WHERE status = 1 and user_id = ' . $_SESSION['user_id'])->fetch_assoc();
  $reit_money = $mysqli->query("SELECT * FROM switch_tab WHERE id = 1")->fetch_assoc();
  if (date("G") >= 18 and date("G") <= 20) {
    $money =  round((rand(5, 7) * $lvl + rand(1, 15)) / 2.1) * 1.0 * $reit_money['money_reit_happyhours']; // рейт дропа кредитов
  } else {
    $money =  round((rand(5, 7) * $lvl + rand(1, 15)) / 2.1) * 1.0 * $reit_money['money_reit']; // рейт дропа кредитов
  }
  if ($lvl >= 70) {
    $money = $money / 2;
  }
  if ($lvl >= 40) {
    $money = $money / 0.6;
  }
  if ($lvl <= 20) {
    $money = $money / 0.5;
  }
  if ($user_status['date'] > time()) {
    $money = $money * 2;
  }
  $clantop = $mysqli->query('SELECT id FROM base_clans ORDER BY rating DESC LIMIT 1')->fetch_assoc();
  $userclan = $mysqli->query('SELECT * FROM users WHERE id = ' . $_SESSION['user_id'] . '')->fetch_assoc();
  if ($userclan['clan_id'] == $clantop['id']) {
    $money = $money * 1.3;
  }
  $pk123 = $mysqli->query("SELECT * FROM battle WHERE `user1` = '" . $user_id . "' and  `atk1` = 6 LIMIT 1")->fetch_assoc();

  if ($pk123) {
    $money = $money * 100;
  }
  $item = 0;
  $normal = $ChanceItemDrop1;
  $normal2 = $ChanceItemDrop2;

  $drp = $mysqli->query("SELECT * FROM drop_item WHERE `pok` = '" . $catchPok['pok'] . "' or `pok` = '999' ORDER BY RAND()*chanc DESC LIMIT 1")->fetch_assoc();
  if ($item == 0) {
    if ($drp['loc'] == 0 or $drp['loc'] == $user['location']) {
      if ($user_status['time_scaner'] > time()) {
        $chanse_drp = rand(1, $normal);
      } else {
        $chanse_drp = rand(1, $normal2);
      }
      if ($chanse_drp < $drp['chanc']) {
        $item = $drp['item'];
        if ($item == 385) {
          $item = rand(385, 426);
        }
        if ($item == 385 and rand(1, 2500) == 998) {
          $item = 425;
        }
        if ($item == 385 and rand(1, 2500) == 1322) {
          $item = 424;
        }
        if ($item == 425 or $item == 424) {
          $item = 423;
        }
      }
    }
  }



  //$mysqli->query("INSERT INTO pokem_vs (basenum,numbpu,name,lvl,hp,hp_max,attack,def,speed,sp_attack,sp_def,har,type,gender,atk1,atk2,money,item,catch ) VALUES('".$catchPok['pok']."','".$catchPok['pok']."','".$inCatchPok['name']."','$lvl','$hp','$hp','$atk','$def','$speed','$satk','$sdef','$harR','$shiny','$sex','$atk1','$atk2','$money','$item','".$catchPok['catch']."')");
  $pID = $mysqli->insert_id;
  if (rand(1, 16) == 2) {
    $cap = 1;
  } else {
    $cap = 0;
  }
  $captha_timer = time() + 5;
  //$mysqli->query("INSERT INTO battle (user1 , pok1 , pok2  , tip, data, kaptcha, kaptcha_timer) VALUES('".$user['id']."','".$inMyPok['id']."','$pID','1','".date("Y-m-d H:i:s")."','".$cap."','".$captha_timer."')");
  //$mysqli->query("UPDATE users SET `status`='battle' WHERE id='".$user['id']."'");
  echo "<script>parent.frames._location.location.reload();</script>";
}
if (item_isset(146, 1)) {
  $item_find = "and (`item` = '0' or `item` = '146')";
} else {
  $item_find = "and `item` = '0'";
}
if ($user['timepok'] < time()) {
  $catchPok = $mysqli->query("SELECT * from `pok_town` WHERE (`region` = '0' or `region` = '" . $baseloc['region'] . "') and (`town`='" . $user['location'] . "' or `town` = '999') and (`timeday` = '" . $timeday . "' or `timeday` = '3') $item_find and `chanc` >= '" . mt_rand($rand_, 10000) . "' ORDER BY RAND() LIMIT 1")->fetch_assoc();
}
if ($user['status'] == "free" && $user['hunt'] == 1 && $count_pk_ > 0 && $baseloc['pve'] == 1 && isset($catchPok)) {
  $inCatchPok = $mysqli->query("select * from `base_pokemon` WHERE `id`='" . $catchPok['pok'] . "' LIMIT 1")->fetch_assoc();

  $inMyPok = $mysqli->query("select * from `user_pokemons` WHERE  `user_id`='" . $user['id'] . "' and `hp`>'0' and `active`='1' ORDER BY start_pok DESC LIMIT 1")->fetch_assoc();
  $lvlNxt = $catchPok['lvl'] + 5;
  $lvl = rand($catchPok['lvl'], $lvlNxt);
  $lvlBas = $lvl + 1;
  $harR = rand(1, 26);
  $rdom = rand(1, 100);
  if (round($inCatchPok['sex_m']) == 0 && round($inCatchPok['sex_f']) == 0) {
    $sex = 0;
  } else {
    if (round($inCatchPok['sex_m']) >= $rdom) {
      $sex = 1;
    } else {
      $sex = 2;
    }
  }

  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '" . $harR . "'")->fetch_assoc();
  if (item_isset(231, 1)) {
    if (mt_rand(1, 800) == 1) {
      $shiny = "shine";
    } else {
      $shiny = "normal";
    }
  } else {
    if (mt_rand(1, 2000) == 1) {
      $shiny = "shine";
    } else {
      $shiny = "normal";
    }
  }



  $hp =    round(($inCatchPok['hp'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 10 + $lvl);
  $atk =   round((($inCatchPok['atk'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['atk']);
  $def =   round((($inCatchPok['def'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['def']);
  $speed = round((($inCatchPok['spd'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['speed']);
  $sdef =  round((($inCatchPok['sdef'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['sdef']);
  $satk =  round((($inCatchPok['satk'] * 2 + rand(1, 25) + (1 / 2)) * ($lvl / 100) + 5) * $har['satk']);
  $atk_pok1 = $mysqli->query("SELECT * FROM attack_learn WHERE `poke_base_id` = '" . $catchPok['pok'] . "' and `atc_lvl` < '$lvlBas' LIMIT 1")->fetch_assoc();
  $atk_pok2 = $mysqli->query("SELECT * FROM attack_learn WHERE `poke_base_id` = '" . $catchPok['pok'] . "' and `atc_lvl` < '$lvlBas' and `atac_id` != '" . $atk_pok1['atac_id'] . "' LIMIT 1")->fetch_assoc();
  $atk1 = $atk_pok1['atac_id'];
  $atk2 = $atk_pok2['atac_id'];
  $user_status = $mysqli->query('SELECT * FROM user_status WHERE status = 1 and user_id = ' . $_SESSION['user_id'])->fetch_assoc();
  $reit_money = $mysqli->query("SELECT * FROM switch_tab WHERE id = 1")->fetch_assoc();
  if (date("G") >= 18 and date("G") <= 20) {
    $money =  round((rand(5, 7) * $lvl + rand(1, 15)) / 2.1) * 1.0 * $reit_money['money_reit_happyhours']; // рейт дропа кредитов
  } else {
    $money =  round((rand(5, 7) * $lvl + rand(1, 15)) / 2.1) * 1.0 * $reit_money['money_reit']; // рейт дропа кредитов
  }
  if ($lvl >= 70) {
    $money = $money / 2;
  }
  if ($lvl >= 40) {
    $money = $money / 0.6;
  }
  if ($lvl <= 20) {
    $money = $money / 0.5;
  }
  if ($user_status['date'] > time()) {
    $money = $money * 2;
  }

  $clantop = $mysqli->query('SELECT id FROM base_clans ORDER BY rating DESC LIMIT 1')->fetch_assoc();
  $userclan = $mysqli->query('SELECT * FROM users WHERE id = ' . $_SESSION['user_id'] . '')->fetch_assoc();
  if ($userclan['clan_id'] == $clantop['id']) {
    $money = $money * 1.3;
  }
  $pk123 = $mysqli->query("SELECT * FROM battle WHERE `user1` = '" . $user_id . "' and  `atk1` = 6 LIMIT 1")->fetch_assoc();
  if ($pk123) {
    $money = $money * 100;
  }
  $item = 0;
  $normal = $ChanceItemDrop1;
  $normal2 = $ChanceItemDrop2;

  $drp = $mysqli->query("SELECT * FROM drop_item WHERE `pok` = '" . $catchPok['pok'] . "' or `pok` = '999' ORDER BY RAND()*chanc DESC LIMIT 1")->fetch_assoc();
  if ($item == 0) {
    if ($drp['loc'] == 0 or $drp['loc'] == $user['location']) {
      if ($user_status['time_scaner'] > time()) {
        $chanse_drp = rand(1, $normal);
      } else {
        $chanse_drp = rand(1, $normal2);
      }
      if ($chanse_drp < $drp['chanc']) {
        $item = $drp['item'];
        if ($item == 385) {
          $item = rand(385, 426);
        }
        if ($item == 385 and rand(1, 2500) == 998) {
          $item = 425;
        }
        if ($item == 385 and rand(1, 2500) == 1322) {
          $item = 424;
        }
        if ($item == 425 or $item == 424) {
          $item = 423;
        }
      }
    }
  }



  //$mysqli->query("INSERT INTO pokem_vs (basenum,numbpu,name,lvl,hp,hp_max,attack,def,speed,sp_attack,sp_def,har,type,gender,atk1,atk2,money,item,catch ) VALUES('".$catchPok['pok']."','".$catchPok['pok']."','".$inCatchPok['name']."','$lvl','$hp','$hp','$atk','$def','$speed','$satk','$sdef','$harR','$shiny','$sex','$atk1','$atk2','$money','$item','".$catchPok['catch']."')");
  $pID = $mysqli->insert_id;
  if (rand(1, 16) == 2) {
    $cap = 1;
  } else {
    $cap = 0;
  }
  $captha_timer = time() + 5;
  //$mysqli->query("INSERT INTO battle (user1 , pok1 , pok2  , tip, data, kaptcha, kaptcha_timer) VALUES('".$user['id']."','".$inMyPok['id']."','$pID','1','".date("Y-m-d H:i:s")."','".$cap."','".$captha_timer."')");
  //$mysqli->query("UPDATE users SET `status`='battle' WHERE id='".$user['id']."'");
  echo "<script>parent.frames._location.location.reload();</script>";
}

$weather = $mysqli->query('SELECT * FROM weather WHERE id = ' . $base_region['weather'])->fetch_assoc();
?>
<span id="txt"><b><?= $region; ?></b><br><?= $location; ?><br>Погода: <?= $weather['name']; ?></span>
<?php $toast = $mysqli->query("SELECT * FROM `toast` WHERE `user` = '" . $user_id . "'")->fetch_assoc();
if ($toast) {  ?>
  <script src="/js/core.js"></script>
  <script language="javascript" type="text/javascript">
    messOnWind("<?= $toast['type']; ?>", "<?= $toast['head']; ?>", "<?= $toast['text']; ?>", <?= $toast['load']; ?>);
  </script>
<?php
  $mysqli->query("DELETE FROM `toast` WHERE `id` = '" . $toast['id'] . "'");
} ?>