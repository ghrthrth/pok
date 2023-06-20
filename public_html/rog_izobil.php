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
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Первая попытка!</a></li>';
        $randompok = rand(1,123);
        if($randompok == 1){ $poke = 1; }
        if($randompok == 2){ $poke = 4; }
        if($randompok == 3){ $poke = 7; }
        if($randompok == 4){ $poke = 79; }
        if($randompok == 5){ $poke = 102; }
        if($randompok == 6){ $poke = 106; }
        if($randompok == 7){ $poke = 123; }
        if($randompok == 8){ $poke = 132; }
        if($randompok == 9){ $poke = 142; }
        if($randompok == 10){ $poke = 144; }
        if($randompok == 11){ $poke = 145; }
        if($randompok == 12){ $poke = 190; }
        if($randompok == 13){ $poke = 200; }
        if($randompok == 14){ $poke = 200; }
        if($randompok == 15){ $poke = 207; }
        if($randompok == 16){ $poke = 214; }
        if($randompok == 17){ $poke = 215; }
        if($randompok == 18){ $poke = 216; }
        if($randompok == 19){ $poke = 227; }
        if($randompok == 20){ $poke = 228; }
        if($randompok == 21){ $poke = 241; }
        if($randompok == 22){ $poke = 243; }
        if($randompok == 23){ $poke = 244; }
        if($randompok == 24){ $poke = 280; }
        if($randompok == 25){ $poke = 290; }
        if($randompok == 26){ $poke = 294; }
        if($randompok == 27){ $poke = 299; }
        if($randompok == 28){ $poke = 318; }
        if($randompok == 29){ $poke = 322; }
        if($randompok == 30){ $poke = 324; }
        if($randompok == 31){ $poke = 327; }
        if($randompok == 32){ $poke = 328; }
        if($randompok == 33){ $poke = 336; }
        if($randompok == 34){ $poke = 338; }
        if($randompok == 35){ $poke = 341; }
        if($randompok == 36){ $poke = 347; }
        if($randompok == 37){ $poke = 353; }
        if($randompok == 38){ $poke = 355; }
        if($randompok == 39){ $poke = 366; }
        if($randompok == 40){ $poke = 378; }
        if($randompok == 41){ $poke = 377; }
        if($randompok == 42){ $poke = 408; }
        if($randompok == 43){ $poke = 410; }
        if($randompok == 44){ $poke = 415; }
        if($randompok == 45){ $poke = 418; }
        if($randompok == 46){ $poke = 425; }
        if($randompok == 47){ $poke = 431; }
        if($randompok == 48){ $poke = 434; }
        if($randompok == 49){ $poke = 436; }
        if($randompok == 50){ $poke = 439; }
        if($randompok == 51){ $poke = 440; }
        if($randompok == 52){ $poke = 441; }
        if($randompok == 53){ $poke = 442; }
        if($randompok == 54){ $poke = 446; }
        if($randompok == 55){ $poke = 447; }
        if($randompok == 56){ $poke = 449; }
        if($randompok == 57){ $poke = 451; }
        if($randompok == 58){ $poke = 453; }
        if($randompok == 59){ $poke = 456; }
        if($randompok == 60){ $poke = 479; }
        if($randompok == 61){ $poke = 480; }
        if($randompok == 62){ $poke = 481; }
        if($randompok == 63){ $poke = 482; }
        if($randompok == 64){ $poke = 489; }
        if($randompok == 65){ $poke = 506; }
        if($randompok == 66){ $poke = 509; }
        if($randompok == 67){ $poke = 511; }
        if($randompok == 68){ $poke = 513; }
        if($randompok == 69){ $poke = 515; }
        if($randompok == 70){ $poke = 517; }
        if($randompok == 71){ $poke = 524; }
        if($randompok == 72){ $poke = 529; }
        if($randompok == 73){ $poke = 532; }
        if($randompok == 74){ $poke = 538; }
        if($randompok == 75){ $poke = 539; }
        if($randompok == 76){ $poke = 543; }
        if($randompok == 77){ $poke = 551; }
        if($randompok == 78){ $poke = 554; }
        if($randompok == 79){ $poke = 557; }
        if($randompok == 80){ $poke = 562; }
        if($randompok == 81){ $poke = 566; }
        if($randompok == 82){ $poke = 570; }
        if($randompok == 83){ $poke = 592; }
        if($randompok == 84){ $poke = 595; }
        if($randompok == 85){ $poke = 610; }
        if($randompok == 86){ $poke = 621; }
        if($randompok == 87){ $poke = 624; }
        if($randompok == 88){ $poke = 622; }
        if($randompok == 89){ $poke = 632; }
        if($randompok == 90){ $poke = 633; }
        if($randompok == 91){ $poke = 636; }
        if($randompok == 92){ $poke = 638; }
        if($randompok == 93){ $poke = 639; }
        if($randompok == 94){ $poke = 640; }
        if($randompok == 95){ $poke = 641; }
        if($randompok == 96){ $poke = 647; }
        if($randompok == 97){ $poke = 659; }
        if($randompok == 98){ $poke = 661; }
        if($randompok == 99){ $poke = 664; }
        if($randompok == 100){ $poke = 667; }
        if($randompok == 101){ $poke = 669; }
        if($randompok == 102){ $poke = 672; }
        if($randompok == 103){ $poke = 677; }
        if($randompok == 104){ $poke = 688; }
        if($randompok == 105){ $poke = 694; }
        if($randompok == 106){ $poke = 704; }
        if($randompok == 107){ $poke = 701; }
        if($randompok == 108){ $poke = 707; }
        if($randompok == 109){ $poke = 708; }
        if($randompok == 110){ $poke = 714; }
        if($randompok == 111){ $poke = 712; }
        if($randompok == 112){ $poke = 710; }
        if($randompok == 113){ $poke = 725; }
        if($randompok == 114){ $poke = 728; }
        if($randompok == 115){ $poke = 722; }
        if($randompok == 116){ $poke = 747; }
        if($randompok == 117){ $poke = 755; }
        if($randompok == 118){ $poke = 769; }
        if($randompok == 119){ $poke = 778; }
        if($randompok == 120){ $poke = 802; }
        if($randompok == 121){ $poke = 491; }
        if($randompok == 122){ $poke = 492; }
        if($randompok == 123){ $poke = 488; }
        $pok_b = $mysqli->query("SELECT * FROM base_pokemon WHERE id = '".$poke)->fetch_assoc();
	}elseif($answer == 1 && !info_quest(162,'step') == 2){
		$textNPC = 'Итак, тебе попался: <b>'.$pok_b['name'].'</b>! Устраивает, или желаешь поменять?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Меня устраивает!</a></li>';
        $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Спасибо!</a></li>';
		//$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Я все понял. Скоро буду!</a></li>';
		//quest_update(162,2);
	}else{
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
}
?>