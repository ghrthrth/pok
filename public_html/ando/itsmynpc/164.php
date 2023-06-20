<?php #Старушка
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Франциск';

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

if($npc == 164 && empty($answer) && item_isset(1058, 1) && item_isset(1059, 1)){
		$textNPC = 'Здравствуй тренер, я представляю Межрегиональное Сообщество Поэтов. Наверняка ты в курсе, что в последнее время у диких покемонов при себе имелись разные чернила и перья?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте, да. Но как они к ним попали? И почему вы спрашиваете?</a></li>';
	}elseif($npc == 164 && $answer == 1){
		$textNPC = 'История долгая, но если кратко - наше Сообщество существует уже более двух столетий. Соответственно имеются свои традиции, одной из которых является осенний банкет. Раз в семь лет, осенью, все члены сообщества собираются на подобном мероприятии, где могут представить понимающей публике венец своего творения.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Звучит интересно...</a></li>';
	}elseif($npc == 164 && $answer == 2){
	$textNPC = 'Верно, но мы уходим от сути. Как стало понятно, характер данного мероприятия обязывает уделять внимание даже таким мелочам, как чернила и перо. Тем не менее, всё было отлично - необходимые чернила, что были найдены в давно позабытом хранилище одной из старых типографических контор и перья диковинных птиц с другого континента, всё было доставлено в необходимом количестве.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Так что же тогда случилось?</a></li>';
	}elseif($npc == 164 && $answer == 3){
	$textNPC = 'Недавний шторм! Кто бы мог подумать, что добротный деревянный ящик может снести ветром? Да, мы нашли ящик, забрали остатки того, что не успели растащить дикие покемоны. Но этого крайне мало. Быть может, ты сможешь помочь? Некоторые члены нашего сообщества узнав об этом, сообщили, что будут весьма благодарны всем, кто окажет помощь.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Тогда держите. Это всё что мне удалось собрать. Думаю, другие тренеры тоже в скором времени вам помогут.</a></li>';
	}elseif($npc == 164 && $answer == 4 && item_isset(1058, 1) && item_isset(1059, 1)){

		$all_count = 0;
		$countitems1 = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = '1058'")->fetch_assoc();
		$countitems2 = $mysqli->query("SELECT * FROM `user_items` WHERE `user_id` = '".$user_id."' AND `item_id` = '1059'")->fetch_assoc();
		if($countitems1 and $countitems2){
			$all_count1 = $all_count1 + $countitems1['count'];
			$all_count2 = $all_count2 + $countitems2['count'];
		}
		$randomaward = rand(1,3);
		if($randomaward == 1){  
			$textNPC = 'Оу! Спасибо тренер! Тогда держи эти предметы и покемона. Они тебе понадобятся! 10 Наборов тренировок + 5 Наборов витамин + ТМ 35 и #725 Litten ';
		    plus_item(5,1055);
		    plus_item(10,330);
		    plus_item(1,1006);
		    minus_item($countitems1['count'],1058);
		    minus_item($countitems2['count'],1059);
		    $pokemonivent = 725;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);	  
		
		}elseif($randomaward == 2){  
			$textNPC = 'Оу! Спасибо тренер! Тогда держи эти предметы и покемона. Они тебе понадобятся! 10 Наборов тренировок + 5 Наборов витамин + ТМ 13 и #728 Popplio';
			plus_item(5,1055);
		    plus_item(10,330);
		    plus_item(1,1036);
		    minus_item($countitems1['count'],1058); 
		    minus_item($countitems2['count'],1059);
		    $pokemonivent = 728;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);	 

		}elseif($randomaward == 3){  
			$textNPC = 'Оу! Спасибо тренер! Тогда держи эти предметы и покемона. Они тебе понадобятся! 10 Наборов тренировок + 5 Наборов витамин + ТМ 26 и #722 Rowlet';
			plus_item(5,1055);
		    plus_item(10,330);
		    plus_item(1,1019);
		    minus_item($countitems1['count'],1058);
		    minus_item($countitems2['count'],1059);
		    $pokemonivent = 722;
		newPokemonevent($pokemonivent,$_SESSION['user_id']);	  
		
		}else{
			if($all_count = 0) 
				$textNPC = 'Что - то нужно?';
			}	
			
	}elseif(!item_isset(1058, 1) && !item_isset(1059, 1)){
     $textNPC = 'Что - то нужно?';
		
	
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?> 