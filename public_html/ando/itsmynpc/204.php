<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Победители';
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
      $hg = rand(29,31);
      $ag = rand(29,31);
      $dg = rand(29,31);
      $sg = rand(29,31);
      $sag = rand(29,31);
      $sdg = rand(29,31);
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

$mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,spark,Weight) VALUES ('".$user_new."','".$pok_base['id']."','".$pok_base['id']."','".$pok_base['name']."  ','".$hr."','1','".time()."','".$activ."','normal','".$gn."','200','".$s1."','".$s1."','".$s2."','".$s3."','".$s4."','".$s5."','".$s6."','".$hg."','".$ag."','".$dg."','".$sg."','".$sag."','".$sdg."','".$user_new."','".$user_new."','0','".rand(1,3)."','0','".$pok_base['weight']."') ");
$pID = $mysqli->insert_id;
baseAttackPok($pID);
}
if($npc =204){
	if(empty($answer)){
		$textNPC = 'Приветствую тебя, Тренер. Вот и настало время получить обещанный "Сюрприз", но предупреждаю сразу - этот приз зависит только от твоего личного запаса удачи. Не огорчай меня, ежели не получишь желанного... Испытай свою удачу! <b>Лучше оставь свободное место для своего покемона, иначе можешь потерять его в Покецентре!</b>';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Давай подарок!</a></li>';
	}elseif($answer == 1 && !info_quest(204,'step') == 2){
        $pok_base = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '".$randompok."' ")->fetch_assoc();
		$textNPC = 'Держи случайного покемона из ОГРОМНОГО списка. Я надеюсь, у тебя не было с собой 6-го покемона? Иначе можешь потерять подарок в покецентре. Вы получили: <b>'.$randompok['newPokemonevent'].'</b>';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Спасибо!</a></li>';
		$randompok = rand(1,29);
        if($randompok == 1){ newPokemonevent(204,$_SESSION['user_id']); }
        if($randompok == 2){ newPokemonevent(492,$_SESSION['user_id']); }
        if($randompok == 3){ newPokemonevent(489,$_SESSION['user_id']); }
        if($randompok == 4){ newPokemonevent(488,$_SESSION['user_id']); }
        if($randompok == 5){ newPokemonevent(481,$_SESSION['user_id']); }
        if($randompok == 6){ newPokemonevent(482,$_SESSION['user_id']); }
        if($randompok == 7){ newPokemonevent(480,$_SESSION['user_id']); }
        if($randompok == 8){ newPokemonevent(381,$_SESSION['user_id']); }
        if($randompok == 9){ newPokemonevent(377,$_SESSION['user_id']); }
        if($randompok == 10){ newPokemonevent(378,$_SESSION['user_id']); }
        if($randompok == 11){ newPokemonevent(379,$_SESSION['user_id']); }
        if($randompok == 12){ newPokemonevent(251,$_SESSION['user_id']); }
        if($randompok == 13){ newPokemonevent(243,$_SESSION['user_id']); }
        if($randompok == 14){ newPokemonevent(244,$_SESSION['user_id']); }
        if($randompok == 15){ newPokemonevent(245,$_SESSION['user_id']); }
        if($randompok == 16){ newPokemonevent(144,$_SESSION['user_id']); }
        if($randompok == 17){ newPokemonevent(145,$_SESSION['user_id']); }
        if($randompok == 18){ newPokemonevent(146,$_SESSION['user_id']); }
        if($randompok == 19){ newPokemonevent(881,$_SESSION['user_id']); }
        if($randompok == 20){ newPokemonevent(882,$_SESSION['user_id']); }
        if($randompok == 21){ newPokemonevent(799,$_SESSION['user_id']); }
        if($randompok == 22){ newPokemonevent(636,$_SESSION['user_id']); }
        if($randompok == 23){ newPokemonevent(246,$_SESSION['user_id']); }
        if($randompok == 24){ newPokemonevent(147,$_SESSION['user_id']); }
        if($randompok == 25){ newPokemonevent(443,$_SESSION['user_id']); }
        if($randompok == 26){ newPokemonevent(567,$_SESSION['user_id']); }
        if($randompok == 27){ newPokemonevent(636,$_SESSION['user_id']); }
        if($randompok == 28){ newPokemonevent(494,$_SESSION['user_id']); }
        if($randompok == 29){ newPokemonevent(773,$_SESSION['user_id']); }
   

		quest_update(204,2);
	}else{
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
}
?>