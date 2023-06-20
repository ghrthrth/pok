<?php #Старушка
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Мистер Пропер';

function newPokemonevent($pok,$user_new) {
   global $mysqli;
  $pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '".$pok."' ")->fetch_assoc();
   $incpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$user_new."' and `active`='1'");
   $incpk_ = $incpk->num_rows; 
   if($incpk_ == 6){
    $activ = 0;
   }else{
    $activ = 1;
   }
  $shin = "normal";
  if($pok_base['sex_m'] == 0 and $pok_base['sex_f'] == 0){
    $gn = "no";
  }else{
  if(round($pok_base['sex_m']) >= rand(1,100)){ $gn = "male"; }else{ $gn = "female"; }
  }
  $hr = mt_rand(1,26);
  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '".$hr."' ")->fetch_assoc();
      $hg = rand(25,30);
      $ag = rand(25,30);
      $dg = rand(25,30);
      $sg = rand(25,30);
      $sag = rand(25,30);
      $sdg = rand(25,30);
    $s1 = round((($pok_base['hp'] * 2) + $hg) * (1/100) + 10 + 1);
    $s2 = round((($pok_base['atk'] * 2 + $ag) * 1/100 + 5) * $har['atk']);
    $s3 = round((($pok_base['def'] * 2 + $dg) * 1/100 + 5) * $har['def']);
    $s4 = round((($pok_base['spd'] * 2 + $sg) * 1/100 + 5) * $har['speed']);
    $s5 = round((($pok_base['satk'] * 2 + $sag) * 1/100 + 5) * $har['satk']);
    $s6 = round((($pok_base['sdef'] * 2 + $sdg) * 1/100 + 5) * $har['sdef']);

    $myLvl = 2;

  $exp_g = $mysqli->query('SELECT exp_group FROM base_pokemon WHERE id = '.$pok)->fetch_assoc();
  if($exp_g['exp_group'] == 1 OR $exp_g['exp_group'] == 2){ // Быстрый
    $nexp_m = 4*pow($myLvl,3)/5;
  }
  if($exp_g['exp_group'] == 3 OR $exp_g['exp_group'] == 4){ // Средний
    $nexp_m = pow($myLvl,3);
  } 
  if($exp_g['exp_group'] == 5){ // Средний медленный
    $nexp_m = 1.2*pow($myLvl,3)-15*pow($myLvl,2)+100*$myLvl-140;
  }
  if($exp_g['exp_group'] == 6 OR $exp_g['exp_group'] == 0){ // Медленный
    $nexp_m = 5*pow($myLvl,3)/4;
  }

$mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,spark,Weight) VALUES ('".$user_new."','".$pok_base['id']."','".$pok_base['id']."','".$pok_base['name']."  ','".$hr."','1','".time()."','".$activ."','shine','".$gn."','200','".$s1."','".$s1."','".$s2."','".$s3."','".$s4."','".$s5."','".$s6."','".$hg."','".$ag."','".$dg."','".$sg."','".$sag."','".$sdg."','".$user_new."','".$user_new."','0','".rand(1,3)."','1','".$pok_base['weight']."') ");
$pID = $mysqli->insert_id;
baseAttackPok($pID);
}
$user = $mysqli->query("SELECT * FROM users WHERE id = ".$_SESSION['user_id'])->fetch_assoc();
if($npc == 183 && empty($answer) && $user['spring_pok_count'] > 5 && !info_quest(183,'step') == 2){
		$textNPC = 'Ох, тренеров что так любят чистоту не так легко сыскать! Воистину, друг мой, ты заслужил награду эту! Ведь ты убрал целых '.$user['spring_pok_count'].' Траббишей!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Отлично, давайте награду!</a></li>';
	}elseif($npc == 183 && $answer == 1){
		$item1 = $mysqli->query("SELECT * FROM base_items WHERE categories = 1 AND dress = 1 ORDER BY rand() LIMIT 1")->fetch_assoc();
		$item2 = $mysqli->query("SELECT * FROM base_items WHERE categories = 1 AND dress = 1 ORDER BY rand() LIMIT 1")->fetch_assoc();
		$tm1 = $mysqli->query("SELECT * FROM base_items WHERE categories = 18 AND tm > 0 ORDER BY rand() LIMIT 1")->fetch_assoc();
		$tm2 = $mysqli->query("SELECT * FROM base_items WHERE categories = 18 AND tm > 0 ORDER BY rand() LIMIT 1")->fetch_assoc();
		if($user['spring_pok_count'] > 5 && !info_quest(183,'step') == 2){
			$textNPC = 'Держи сувенирного Траббиша! Позаботься о нём. Так же, ты получаешь случайные предметы: <b>'.$item1['name'].'</b> и <b>'.$item2['name'].'</b> . <br> Это еще не все! Совершенно случайные ТМ-Атаки: <b>'.$tm1['name'].'</b> и <b>'.$tm2['name'].'</b> . Так же, 50 Наборов тренировок, 7 случайных карт, 2.000.000 Кредитов и <b>Секретный ключ</b> х2!';
		    plus_item(2000000,1);
		    plus_item(50,330);
		    plus_item(7,1053);
		    plus_item(2,384);
		    plus_item(1,$item1['id']);
		    plus_item(1,$item2['id']);
		    plus_item(1,$tm1['id']);
		    plus_item(1,$tm2['id']);
		    $pokemonivent = 568;
		    newPokemonevent($pokemonivent,$_SESSION['user_id']);
		    quest_update(183,2);
		}else{
			if($user['spring_pok_count'] == 0){ 
				$textNPC = 'Прости, но ты очень мало участвовал в Субботнике...';
			}	
		}	
	}elseif($user['spring_pok_count'] <= 5){
     $textNPC = '  Прости, но ты очень мало участвовал в Субботнике...';
		
	
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?> 