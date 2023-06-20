<?php #Старушка
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Снеговик';

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

$mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,spark,Weight) VALUES ('".$user_new."','".$pok_base['id']."','".$pok_base['name']." 2020','".$hr."','1','".time()."','".$activ."','snowy','".$gn."','200','".$s1."','".$s1."','".$s2."','".$s3."','".$s4."','".$s5."','".$s6."','".$hg."','".$ag."','".$dg."','".$sg."','".$sag."','".$sdg."','".$user_new."','".$user_new."','0','".rand(1,3)."','1','".$pok_base['weight']."') ");
$pID = $mysqli->insert_id;
baseAttackPok($pID);
}

if($npc == 507 && empty($answer) && item_isset(375, 1)){
		$textNPC = 'Ты готов получить подарочек? :3';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Подарочек?</a></li>';
	}elseif($npc == 507 && $answer == 1){
		$all_count = 0;
		$snow = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = '375'")->fetch_assoc();
		if($snow){
			$all_count = $all_count + $snow['count'];
		}
		if($all_count < 10){  
			$textNPC = 'За свою помощь ты получаешь: #172 Pichu 1-lvl и Кредит х500.00';
		    plus_item(500000,1);
		    minus_item($snow['count'],375); 
		    $pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 172;
		}elseif($pok_rand > 50){
			$pok = 172;
		}elseif($pok_rand > 15){
			$pok = 172;
		}else{
			$pok = 172;
		}
		newPokemonevent($pok,$_SESSION['user_id']);
		
		}elseif($all_count >= 10 and $all_count < 20){  
			$textNPC = 'За свою помощь ты получаешь: #172 Pichu 1-lvl и Набор тренировки х2';
		    plus_item(2,330);
		    minus_item($snow['count'],375); 
		    $pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 172;
		}elseif($pok_rand > 50){
			$pok = 172;
		}elseif($pok_rand > 15){
			$pok = 172;
		}else{
			$pok = 172;
		}
		newPokemonevent($pok,$_SESSION['user_id']);
		
		}elseif($all_count >= 20 and $all_count < 60){  
			$textNPC = 'За свою помощь ты получаешь: #172 Pichu 1-lvl с приставкой 2020 snowy, Набор тренировки х3 и покемона с приставкой 2020 snowy';
		    plus_item(3,330);
		    minus_item($snow['count'],375); 
		    $pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 172;
		}elseif($pok_rand > 50){
			$pok = 172;
		}elseif($pok_rand > 15){
			$pok = 172;
		}else{
			$pok = 172;
		}
		newPokemonevent($pok,$_SESSION['user_id']);
		
		$pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 506;
		}elseif($pok_rand > 50){
			$pok = 509;
		}elseif($pok_rand > 15){
			$pok = 231;
		}else{
			$pok = 506;
		}
		newPokemonevent($pok,$_SESSION['user_id']);
		
		}elseif($all_count >= 60 and $all_count < 80){  
			$textNPC = 'За свою помощь ты получаешь: #172 Pichu 1-lvl с приставкой 2020 snowy, Набор тренировки х3, Камень Рассвета и покемона с приставкой 2020 snowy';
		    plus_item(3,330);
		    plus_item(1,253);
		    minus_item($snow['count'],375); 
		    $pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 172;
		}elseif($pok_rand > 50){
			$pok = 172;
		}elseif($pok_rand > 15){
			$pok = 172;
		}else{
			$pok = 172;
		}
		newPokemonevent($pok,$_SESSION['user_id']);
		
		$pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 506;
		}elseif($pok_rand > 50){
			$pok = 509;
		}elseif($pok_rand > 15){
			$pok = 231;
		}else{
			$pok = 506;
		}
		newPokemonevent($pok,$_SESSION['user_id']);
		
		}elseif($all_count >= 80 and $all_count < 101){  
			$textNPC = 'За свою помощь ты получаешь: #172 Pichu 1-lvl с приставкой 2020 snowy, Набор тренировки х3, Эвольвер Знаний и покемона с приставкой 2020 snowy';
		    plus_item(3,330);
		    plus_item(1,295);
		    minus_item($snow['count'],375); 
		    $pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 172;
		}elseif($pok_rand > 50){
			$pok = 172;
		}elseif($pok_rand > 15){
			$pok = 172;
		}else{
			$pok = 172;
		}
		newPokemonevent($pok,$_SESSION['user_id']);
		
		$pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 387;
		}elseif($pok_rand > 50){
			$pok = 158;
		}elseif($pok_rand > 15){
			$pok = 387;
		}else{
			$pok = 498;
		}
		newPokemonevent($pok,$_SESSION['user_id']);
		
		}elseif($all_count > 100 and $all_count < 200){  
			$textNPC = 'За свою помощь ты получаешь: #172 Pichu 1-lvl с приставкой 2020 snowy, Секретный ключ х3, Эвольвер Знаний и покемона с приставкой 2020 snowy';
		    plus_item(3,384);
		    plus_item(1,295);
		    minus_item($snow['count'],375); 
		    $pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 172;
		}elseif($pok_rand > 50){
			$pok = 172;
		}elseif($pok_rand > 15){
			$pok = 172;
		}else{
			$pok = 172;
		}
		newPokemonevent($pok,$_SESSION['user_id']);
		
		$pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 607;
		}elseif($pok_rand > 50){
			$pok = 714;
		}elseif($pok_rand > 15){
			$pok = 570;
		}else{
			$pok = 607;
		}
		newPokemonevent($pok,$_SESSION['user_id']);	
	
		}elseif($all_count > 200){  
			$textNPC = 'За свою помощь ты получаешь: #172 Pichu 1-lvl с приставкой 2020 snowy, Секретный ключ х5, Эвольвер Знаний, TM 04 Calm Mind и покемона с приставкой 2020 snowy';
		    plus_item(5,384);
		    plus_item(1,295);
		    plus_item(1,1010);
		    minus_item($snow['count'],375); 
		    $pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 172;
		}elseif($pok_rand > 50){
			$pok = 172;
		}elseif($pok_rand > 15){
			$pok = 172;
		}else{
			$pok = 172;
		}
		newPokemonevent($pok,$_SESSION['user_id']);
		
		$pok_rand = rand(1,100);
			if($pok_rand > 75){
			$pok = 607;
		}elseif($pok_rand > 50){
			$pok = 714;
		}elseif($pok_rand > 15){
			$pok = 570;
		}else{
			$pok = 607;
		}
		newPokemonevent($pok,$_SESSION['user_id']);
		
		}else{
			if($all_count = 0) 
				$textNPC = 'У тебя нет снега!';
			}	
			
	}elseif(!item_isset(375, 1)){
     $textNPC = 'У тебя нет снега!';
		
	
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?> 