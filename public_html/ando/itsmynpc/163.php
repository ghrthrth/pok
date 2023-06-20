<?php #Старушка
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Археолог Лукас';

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

if($npc == 163 && empty($answer) && item_isset(336, 1)){
		$textNPC = 'О-хо-хо, что тут у нас? Вернее, КТО тут у нас? Тренер покемонов, да? Ах, да, мне сообщили что вы ищите археологические древности нашего мира. Что-ж, вы собрали останки? От количества останков я смогу сложить образы древних покемонов, а вам же в награду дам нечто ценное, и такое же древнее. Хотите отдать мне ваши Осколки Пород?.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Я как раз для этого к вам и пришёл!</a></li>';
	}elseif($npc == 163 && $answer == 1){
		$all_count = 0;
		$snow = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = '336'")->fetch_assoc();
		if($snow){
			$all_count = $all_count + $snow['count'];
		}
		if($all_count < 10){  
			$textNPC = 'Маловато ты мне их принёс... Ну что-ж, в качестве утешительного бонуса ты получаешь: х3 Набора витамин, х30 Ванильная конфета, х10 Набор тренировки, х5 Набор ослабления. ';
		    plus_item(3,1055);
		    plus_item(30,309);
		    plus_item(10,330);
		    plus_item(5,1026);
		    minus_item($snow['count'],336); 
		
		}elseif($all_count >= 10 and $all_count <= 50){  
			$textNPC = 'Отличные ископаемые... Ну что-ж, ты получаешь: #564 Tirtouga, х1 Набора витамин, х10 Ванильная конфета, х5 Набор тренировки.';
			plus_item(1,1055);
		    plus_item(10,309);
		    plus_item(5,330);
		    minus_item($snow['count'],336); 
		    $pokemonivent = 564;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);
		
		}elseif($all_count >= 50 and $all_count <= 75){  
			$textNPC = 'Отличные ископаемые... Ну что-ж, ты получаешь: #436 Bronzor + 5 тренировок + 10 ванилек + набор витамин';
			plus_item(1,1055);
		    plus_item(10,309);
		    plus_item(5,330);
		    minus_item($snow['count'],336); 
		    $pokemonivent = 436;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);
		
		}elseif($all_count >= 75 and $all_count <= 90){  
			$textNPC = 'Отличные ископаемые... Ну что-ж, ты получаешь: #345 Lileep + 5 тренировок + 15 ванилек + набор витамин + 300т';
		    plus_item(300000,1);
			plus_item(1,1055);
		    plus_item(15,309);
		    plus_item(5,330);
		    minus_item($snow['count'],336); 
		    $pokemonivent = 345;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);
		
		}elseif($all_count >= 90 and $all_count <= 110){  
			$textNPC = 'Отличные ископаемые... Ну что-ж, ты получаешь: #343 Baltoy + 10 тренировок + 20 ванилек + 2 набора витамин + 400т';
		    plus_item(400000,1);
			plus_item(2,1055);
		    plus_item(20,309);
		    plus_item(10,330);
		    minus_item($snow['count'],336); 
		    $pokemonivent = 343;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);
		
		}elseif($all_count > 110 and $all_count <= 130){  
			$textNPC = 'Отличные ископаемые... Ну что-ж, ты получаешь: #524 Roggenrola + 10 тренировок + 25 ванилек + 3 набора витамин + 500т';
		    plus_item(500000,1);
			plus_item(3,1055);
		    plus_item(25,309);
		    plus_item(10,330);
		    minus_item($snow['count'],336); 
		    $pokemonivent = 524;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);	
	
		}elseif($all_count > 130 and $all_count <= 150){ 
			$textNPC = 'Отличные ископаемые... Ну что-ж, ты получаешь: #622 Golett + 15 тренировок + 30 ванилек + 3 набора витамин + 1.000.000кр';
		    plus_item(1000000,1);
			plus_item(3,1055);
		    plus_item(30,309);
		    plus_item(15,330);
		    minus_item($snow['count'],336); 
		    $pokemonivent = 622;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);
		}elseif($all_count > 150 and $all_count <= 175){ 
			$textNPC = 'Отличные ископаемые... Ну что-ж, ты получаешь: #410 Shieldon + 15 тренировок + 3 набора ослабления + 30 ванилек + 3 набора витамин + 1.500.000кр ';
		    plus_item(1500000,1);
			plus_item(3,1055);
		    plus_item(30,309);
		    plus_item(15,330);
		    plus_item(3,1026);
		    minus_item($snow['count'],336); 
		    $pokemonivent = 410;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);
		}elseif($all_count > 175 and $all_count <= 350){ 
			$textNPC = 'Отличные ископаемые... Ну что-ж, ты получаешь: #408 Cranidos + 20 наборов тренировки + 5 ослаблений + 30 ванилек + 4 набора витамин + 2.000.000кр ';
		    plus_item(2000000,1);
			plus_item(4,1055);
		    plus_item(30,309);
		    plus_item(20,330);
		    plus_item(5,1026);
		    minus_item($snow['count'],336); 
		    $pokemonivent = 408;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);
		}elseif($all_count > 350){  
			$textNPC = 'Отличные ископаемые... Ну что-ж, ты получаешь: #566 Archen + 25 тренировок + 5 ослаблений + 30 ванили + 5 наборов витамин + 2.500.000кр.';
		    plus_item(2500000,1);
			plus_item(5,1055);
		    plus_item(30,309);
		    plus_item(25,330);
		    plus_item(5,1026);
		    minus_item($snow['count'],336); 
		    $pokemonivent = 566;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);
		
		}else{
			if($all_count = 0) 
				$textNPC = 'У тебя нет с собой пород!';
			}	
			
	}elseif(!item_isset(336, 1)){
     $textNPC = 'У тебя нет с собой пород!';
		
	
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?> 