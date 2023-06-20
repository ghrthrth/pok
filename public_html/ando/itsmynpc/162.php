<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Lumenion';
$checkjecklamp  = $mysqli->query("SELECT * FROM awards WHERE img = 1062 AND user = ".$_SESSION['user_id'])->fetch_assoc();
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
if($npc == 162){
	if(empty($answer)){
		$textNPC = 'Приветствую тебя, Тренер. Вот и настало время получить обещанный "Сюрприз", но предупреждаю сразу - этот приз зависит только от твоего личного запаса удачи. Не огорчай меня, ежели не получишь желанного... Испытай свою удачу! <b>Лучше оставь свободное место для своего покемона, иначе можешь потерять его в Покецентре!</b>';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Давай подарок!</a></li>';
	}elseif($answer == 1 && !info_quest(162,'step') == 2 && $checkjecklamp['img'] == 1062){
        $pok_base = $mysqli->query("SELECT name FROM base_pokemon WHERE `id` = '".$randompok."' ")->fetch_assoc();
		$textNPC = 'Держи случайного покемона из ОГРОМНОГО списка. Я надеюсь, у тебя не было с собой 6-го покемона? Иначе можешь потерять подарок в покецентре.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Спасибо!</a></li>';
		$randompok = rand(1,123);
        if($randompok == 1){ newPokemonevent(1,$_SESSION['user_id']); }
        if($randompok == 2){ newPokemonevent(4,$_SESSION['user_id']); }
        if($randompok == 3){ newPokemonevent(7,$_SESSION['user_id']); }
        if($randompok == 4){ newPokemonevent(79,$_SESSION['user_id']); }
        if($randompok == 5){ newPokemonevent(102,$_SESSION['user_id']); }
        if($randompok == 6){ newPokemonevent(106,$_SESSION['user_id']); }
        if($randompok == 7){ newPokemonevent(123,$_SESSION['user_id']); }
        if($randompok == 8){ newPokemonevent(132,$_SESSION['user_id']); }
        if($randompok == 9){ newPokemonevent(142,$_SESSION['user_id']); }
        if($randompok == 10){ newPokemonevent(144,$_SESSION['user_id']); }
        if($randompok == 11){ newPokemonevent(145,$_SESSION['user_id']); }
        if($randompok == 12){ newPokemonevent(190,$_SESSION['user_id']); }
        if($randompok == 13){ newPokemonevent(200,$_SESSION['user_id']); }
        if($randompok == 14){ newPokemonevent(200,$_SESSION['user_id']); }
        if($randompok == 15){ newPokemonevent(207,$_SESSION['user_id']); }
        if($randompok == 16){ newPokemonevent(214,$_SESSION['user_id']); }
        if($randompok == 17){ newPokemonevent(215,$_SESSION['user_id']); }
        if($randompok == 18){ newPokemonevent(216,$_SESSION['user_id']); }
        if($randompok == 19){ newPokemonevent(227,$_SESSION['user_id']); }
        if($randompok == 20){ newPokemonevent(228,$_SESSION['user_id']); }
        if($randompok == 21){ newPokemonevent(241,$_SESSION['user_id']); }
        if($randompok == 22){ newPokemonevent(243,$_SESSION['user_id']); }
        if($randompok == 23){ newPokemonevent(244,$_SESSION['user_id']); }
        if($randompok == 24){ newPokemonevent(280,$_SESSION['user_id']); }
        if($randompok == 25){ newPokemonevent(290,$_SESSION['user_id']); }
        if($randompok == 26){ newPokemonevent(294,$_SESSION['user_id']); }
        if($randompok == 27){ newPokemonevent(299,$_SESSION['user_id']); }
        if($randompok == 28){ newPokemonevent(318,$_SESSION['user_id']); }
        if($randompok == 29){ newPokemonevent(322,$_SESSION['user_id']); }
        if($randompok == 30){ newPokemonevent(324,$_SESSION['user_id']); }
        if($randompok == 31){ newPokemonevent(327,$_SESSION['user_id']); }
        if($randompok == 32){ newPokemonevent(328,$_SESSION['user_id']); }
        if($randompok == 33){ newPokemonevent(336,$_SESSION['user_id']); }
        if($randompok == 34){ newPokemonevent(338,$_SESSION['user_id']); }
        if($randompok == 35){ newPokemonevent(341,$_SESSION['user_id']); }
        if($randompok == 36){ newPokemonevent(347,$_SESSION['user_id']); }
        if($randompok == 37){ newPokemonevent(353,$_SESSION['user_id']); }
        if($randompok == 38){ newPokemonevent(355,$_SESSION['user_id']); }
        if($randompok == 39){ newPokemonevent(366,$_SESSION['user_id']); }
        if($randompok == 40){ newPokemonevent(378,$_SESSION['user_id']); }
        if($randompok == 41){ newPokemonevent(377,$_SESSION['user_id']); }
        if($randompok == 42){ newPokemonevent(408,$_SESSION['user_id']); }
        if($randompok == 43){ newPokemonevent(410,$_SESSION['user_id']); }
        if($randompok == 44){ newPokemonevent(415,$_SESSION['user_id']); }
        if($randompok == 45){ newPokemonevent(418,$_SESSION['user_id']); }
        if($randompok == 46){ newPokemonevent(425,$_SESSION['user_id']); }
        if($randompok == 47){ newPokemonevent(431,$_SESSION['user_id']); }
        if($randompok == 48){ newPokemonevent(434,$_SESSION['user_id']); }
        if($randompok == 49){ newPokemonevent(436,$_SESSION['user_id']); }
        if($randompok == 50){ newPokemonevent(439,$_SESSION['user_id']); }
        if($randompok == 51){ newPokemonevent(440,$_SESSION['user_id']); }
        if($randompok == 52){ newPokemonevent(441,$_SESSION['user_id']); }
        if($randompok == 53){ newPokemonevent(442,$_SESSION['user_id']); }
        if($randompok == 54){ newPokemonevent(446,$_SESSION['user_id']); }
        if($randompok == 55){ newPokemonevent(447,$_SESSION['user_id']); }
        if($randompok == 56){ newPokemonevent(449,$_SESSION['user_id']); }
        if($randompok == 57){ newPokemonevent(451,$_SESSION['user_id']); }
        if($randompok == 58){ newPokemonevent(453,$_SESSION['user_id']); }
        if($randompok == 59){ newPokemonevent(456,$_SESSION['user_id']); }
        if($randompok == 60){ newPokemonevent(479,$_SESSION['user_id']); }
        if($randompok == 61){ newPokemonevent(480,$_SESSION['user_id']); }
        if($randompok == 62){ newPokemonevent(481,$_SESSION['user_id']); }
        if($randompok == 63){ newPokemonevent(482,$_SESSION['user_id']); }
        if($randompok == 64){ newPokemonevent(489,$_SESSION['user_id']); }
        if($randompok == 65){ newPokemonevent(506,$_SESSION['user_id']); }
        if($randompok == 66){ newPokemonevent(509,$_SESSION['user_id']); }
        if($randompok == 67){ newPokemonevent(511,$_SESSION['user_id']); }
        if($randompok == 68){ newPokemonevent(513,$_SESSION['user_id']); }
        if($randompok == 69){ newPokemonevent(515,$_SESSION['user_id']); }
        if($randompok == 70){ newPokemonevent(517,$_SESSION['user_id']); }
        if($randompok == 71){ newPokemonevent(524,$_SESSION['user_id']); }
        if($randompok == 72){ newPokemonevent(529,$_SESSION['user_id']); }
        if($randompok == 73){ newPokemonevent(532,$_SESSION['user_id']); }
        if($randompok == 74){ newPokemonevent(538,$_SESSION['user_id']); }
        if($randompok == 75){ newPokemonevent(539,$_SESSION['user_id']); }
        if($randompok == 76){ newPokemonevent(543,$_SESSION['user_id']); }
        if($randompok == 77){ newPokemonevent(551,$_SESSION['user_id']); }
        if($randompok == 78){ newPokemonevent(554,$_SESSION['user_id']); }
        if($randompok == 79){ newPokemonevent(557,$_SESSION['user_id']); }
        if($randompok == 80){ newPokemonevent(562,$_SESSION['user_id']); }
        if($randompok == 81){ newPokemonevent(566,$_SESSION['user_id']); }
        if($randompok == 82){ newPokemonevent(570,$_SESSION['user_id']); }
        if($randompok == 83){ newPokemonevent(592,$_SESSION['user_id']); }
        if($randompok == 84){ newPokemonevent(595,$_SESSION['user_id']); }
        if($randompok == 85){ newPokemonevent(610,$_SESSION['user_id']); }
        if($randompok == 86){ newPokemonevent(621,$_SESSION['user_id']); }
        if($randompok == 87){ newPokemonevent(624,$_SESSION['user_id']); }
        if($randompok == 88){ newPokemonevent(622,$_SESSION['user_id']); }
        if($randompok == 89){ newPokemonevent(632,$_SESSION['user_id']); }
        if($randompok == 90){ newPokemonevent(633,$_SESSION['user_id']); }
        if($randompok == 91){ newPokemonevent(636,$_SESSION['user_id']); }
        if($randompok == 92){ newPokemonevent(638,$_SESSION['user_id']); }
        if($randompok == 93){ newPokemonevent(639,$_SESSION['user_id']); }
        if($randompok == 94){ newPokemonevent(640,$_SESSION['user_id']); }
        if($randompok == 95){ newPokemonevent(641,$_SESSION['user_id']); }
        if($randompok == 96){ newPokemonevent(647,$_SESSION['user_id']); }
        if($randompok == 97){ newPokemonevent(659,$_SESSION['user_id']); }
        if($randompok == 98){ newPokemonevent(661,$_SESSION['user_id']); }
        if($randompok == 99){ newPokemonevent(664,$_SESSION['user_id']); }
        if($randompok == 100){ newPokemonevent(667,$_SESSION['user_id']); }
        if($randompok == 101){ newPokemonevent(669,$_SESSION['user_id']); }
        if($randompok == 102){ newPokemonevent(672,$_SESSION['user_id']); }
        if($randompok == 103){ newPokemonevent(677,$_SESSION['user_id']); }
        if($randompok == 104){ newPokemonevent(688,$_SESSION['user_id']); }
        if($randompok == 105){ newPokemonevent(694,$_SESSION['user_id']); }
        if($randompok == 106){ newPokemonevent(704,$_SESSION['user_id']); }
        if($randompok == 107){ newPokemonevent(701,$_SESSION['user_id']); }
        if($randompok == 108){ newPokemonevent(707,$_SESSION['user_id']); }
        if($randompok == 109){ newPokemonevent(708,$_SESSION['user_id']); }
        if($randompok == 110){ newPokemonevent(714,$_SESSION['user_id']); }
        if($randompok == 111){ newPokemonevent(712,$_SESSION['user_id']); }
        if($randompok == 112){ newPokemonevent(710,$_SESSION['user_id']); }
        if($randompok == 113){ newPokemonevent(725,$_SESSION['user_id']); }
        if($randompok == 114){ newPokemonevent(728,$_SESSION['user_id']); }
        if($randompok == 115){ newPokemonevent(722,$_SESSION['user_id']); }
        if($randompok == 116){ newPokemonevent(747,$_SESSION['user_id']); }
        if($randompok == 117){ newPokemonevent(755,$_SESSION['user_id']); }
        if($randompok == 118){ newPokemonevent(769,$_SESSION['user_id']); }
        if($randompok == 119){ newPokemonevent(778,$_SESSION['user_id']); }
        if($randompok == 120){ newPokemonevent(802,$_SESSION['user_id']); }
        if($randompok == 121){ newPokemonevent(491,$_SESSION['user_id']); }
        if($randompok == 122){ newPokemonevent(492,$_SESSION['user_id']); }
        if($randompok == 123){ newPokemonevent(488,$_SESSION['user_id']); }

		quest_update(162,2);
	}else{
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
}
?>