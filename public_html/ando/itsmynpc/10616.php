<?php #Старушка
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Пасхальный Кролик';

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

if($npc == 10616 && empty($answer) && item_isset(1044, 1)){
		$textNPC = 'Привет! Я собираю пасхальные яйца в свою коллекцию и хорошо вознаграждаю тех, кто готов мне с этим помочь. Чем больше яиц я получу, тем выше будет моя награда.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Я как раз для этого к вам и пришёл!</a></li>';
	}elseif($npc == 10616 && $answer == 1){
		$all_count = 0;
		$snow = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = '1044'")->fetch_assoc();
		if($snow){
			$all_count = $all_count + $snow['count'];
		}
		if($all_count < 50){  
			$textNPC = 'За свою помощь ты получаешь: #170 Chinchou 1-lvl, Кредит х200.000, Даркбол х3 и Именной бланк х1. ';
		    plus_item(200000,1);
		    plus_item(3,72);
		    plus_item(1,160);
		    minus_item($snow['count'],1044); 
		    $pokemonivent = 170;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);
		
		}elseif($all_count >= 50 and $all_count < 100){  
			$textNPC = 'За свою помощь ты получаешь: #177 Natu 1-lvl, Кредит х200.000, Самодельный сканер х2, Ванильная конфета х5, Скобовое кольцо х3.';
			plus_item(200000,1);
			plus_item(5,309);
			plus_item(3,42);
		    plus_item(2,185);
		    minus_item($snow['count'],1044); 
		    $pokemonivent = 177;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);
		
		}elseif($all_count >= 100 and $all_count < 150){  
			$textNPC = 'За свою помощь ты получаешь: #270 Lotad 1-lvl, Кредит х250.000, Самодельный сканер х2, Ванильная конфета х5, Скобовое кольцо х3, Сладкая ягода х2.';
		    plus_item(250000,1);
			plus_item(5,309);
			plus_item(3,42);
		    plus_item(2,185);
		    plus_item(2,179);
		    minus_item($snow['count'],1044); 
		    $pokemonivent = 270;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);
		
		}elseif($all_count >= 150 and $all_count < 250){  
			$textNPC = 'За свою помощь ты получаешь: #335 Zangoose 1-lvl, Кредит х300.000, Самодельный сканер х2, Ванильная конфета х10, Скобовое кольцо х3.';
		    plus_item(300000,1);
			plus_item(10,309);
			plus_item(3,42);
		    plus_item(2,185);
		    plus_item(2,179);
		    minus_item($snow['count'],1044); 
		    $pokemonivent = 335;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);
		
		}elseif($all_count >= 250 and $all_count < 400){  
			$textNPC = 'За свою помощь ты получаешь: #570 Zorua 1-lvl, Кредит х400.000, Самодельный сканер х2, Ванильная конфета х15, Скобовое кольцо х3, Набор тренировки х5, Сияющий камень х1.';
		    plus_item(400000,1);
			plus_item(15,309);
			plus_item(3,42);
		    plus_item(2,185);
		    plus_item(2,179);
		    plus_item(5,330);
		    plus_item(1,246);
		    minus_item($snow['count'],1044); 
		    $pokemonivent = 570;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);
		
		}elseif($all_count > 400 and $all_count < 700){  
			$textNPC = 'За свою помощь ты получаешь: #175 Togepi 1-lvl, Кредит х450.000, Самодельный сканер х2, Ванильная конфета х15, Скобовое кольцо х3, Набор тренировки х5, Эвольвер знаний х1.';
		    plus_item(450000,1);
			plus_item(15,309);
			plus_item(3,42);
		    plus_item(2,185);
		    plus_item(2,179);
		    plus_item(5,330);
		    plus_item(1,295);
		    minus_item($snow['count'],1044); 
		    $pokemonivent = 175;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);	
	
		}elseif($all_count > 700){  
			$textNPC = 'За свою помощь ты получаешь: #133 Eevee 1-lvl, Кредит х500.000, Самодельный сканер х2, Ванильная конфета х20, Скобовое кольцо х3, Набор тренировки х10, Магнит х1.';
		    plus_item(500000,1);
			plus_item(5,309);
			plus_item(3,42);
		    plus_item(2,185);
		    plus_item(2,179);
		    plus_item(10,330);
		    plus_item(1,28);
		    minus_item($snow['count'],1044); 
		    $pokemonivent = 133;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);
		
		}else{
			if($all_count = 0) 
				$textNPC = 'У тебя нет яиц!';
			}	
			
	}elseif(!item_isset(1044, 1)){
     $textNPC = 'У тебя нет яиц!';
		
	
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?> 