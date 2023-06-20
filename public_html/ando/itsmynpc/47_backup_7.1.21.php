<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Мистер Шмидт ';
function newPokemon_auk($pok,$user_new) {
   global $mysqli;
  $pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '".$pok."'")->fetch_assoc();
   $incpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$user_new."' and `active`='1'");
   $incpk_ = $incpk->num_rows;
   if($incpk_ == 6){
    $activ = 0;
   }else{
    $activ = 1;
   }
  $shin = "shine";
  if($pok_base['sex_m'] == 0 and $pok_base['sex_f'] == 0){
    $gn = "no";
  }else{
  if(round($pok_base['sex_m']) >= rand(1,100)){ $gn = "male"; }else{ $gn = "female"; }
  }
  $hr = mt_rand(1,26);
  $har = $mysqli->query("SELECT * FROM har WHERE `id_har` = '".$hr."' ")->fetch_assoc();
      $hg = rand(34,38);
      $ag = rand(34,38);
      $dg = rand(34,38);
      $sg = rand(34,38);
      $sag = rand(34,38);
      $sdg = rand(34,38);
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

$mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,`spark`,`trade`,`Weight`) VALUES ('".$user_new."','".$pok_base['id']."','".$pok_base['id']."','".$pok_base['name']."','".$hr."','1','".time()."','".$activ."','".$shin."','".$gn."','200','".$s1."','".$s1."','".$s2."','".$s3."','".$s4."','".$s5."','".$s6."','".$hg."','".$ag."','".$dg."','".$sg."','".$sag."','".$sdg."','".$user_new."','".$user_new."','0','".rand(1,3)."','0','1','".$pok_base['weight']."') ");
$pID = $mysqli->insert_id;
baseAttackPok($pID);
}
if($npc == 47){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(empty($answer)){
$textNPC = 'Я готов обменять Изумрудную Колоду карт на что-нибудь ценное. Ты готов к сделке?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Где мне взять карты?</a></li><br>';
$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Какова награда?</a></li><br>';
$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Да, готов</a></li><br>';
}else
if($answer == 1){
$textNPC = 'Разве мы похожи на путешественников? Твоё дело искать, наше платить. Говорят такие карты встречаются во всех уголках мира. Нам требуется колода состоящая из 20 карт плюс Два Джокера - черный и белый. Итого 22 карты.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&map=1">У меня другой вопрос.</a></li>';	
}else
if($answer == 2){ 
$textNPC = 'Что дадим, то и возьмешь. Карты - это всегда риск. И азарт. Кто уклоняется от игры, тот ее проигрывает.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&map=1">У меня другой вопрос.</a></li>';	
}else
if($answer == 3){ 
if(item_isset(385,1) and item_isset(386,1) and item_isset(387,1) and item_isset(388,1) and item_isset(389,1) and item_isset(390,1) and item_isset(391,1) and item_isset(392,1) and item_isset(393,1) and item_isset(394,1) and item_isset(395,1) and item_isset(396,1) and item_isset(397,1) and item_isset(417,1) and item_isset(418,1) and item_isset(419,1) and item_isset(420,1) and item_isset(421,1) and item_isset(422,1) and item_isset(423,1) and item_isset(424,1) and item_isset(425,1)){
  $rn = mt_rand(1,13);
   if($rn == 1) { $pok = 749; } else //Chikorita //трава 
   if($rn == 2) { $pok = 142; } else //Totodile //вода
   if($rn == 3) { $pok = 196; } else //Aipom //норм
   if($rn == 4) { $pok = 197; } else //Phanpy //земля
   if($rn == 5) { $pok = 470; } else //Omanyte //вода + камень
   if($rn == 6) { $pok = 446; } else //Heatmor // огонь 
   if($rn == 7) { $pok = 482; } else //Drudigon //норм
   if($rn == 8) { $pok = 381; } else //Cubchoo // ледяной
   if($rn == 9) { $pok = 704; } else //Inkay //психический + темный
   if($rn == 10) { $pok = 717; } else //Shinx //электрический
   if($rn == 11) { $pok = 252; } else //Shinx //электрический
   if($rn == 12) { $pok = 255; } else //Shinx //электрический
   if($rn == 13) { $pok = 258; } else //Shinx //электрический
   if($rn == 14) { $pok = 554; } else //Shinx //электрический
   if($rn == 15) { $pok = 610; } else //Shinx //электрический
   /*if($rn == 1) { $pok = 152; } else //Chikorita //трава 
   if($rn == 2) { $pok = 158; } else //Totodile //вода
   if($rn == 3) { $pok = 190; } else //Aipom //норм
   if($rn == 4) { $pok = 231; } else //Phanpy //земля
   if($rn == 5) { $pok = 138; } else //Omanyte //вода + камень
   if($rn == 6) { $pok = 631; } else //Heatmor // огонь 
   if($rn == 7) { $pok = 621; } else //Drudigon //норм
   if($rn == 8) { $pok = 613; } else //Cubchoo // ледяной
   if($rn == 9) { $pok = 686; } else //Inkay //психический + темный
   if($rn == 10) { $pok = 610; } else //Shinx //электрический
   if($rn == 11) { $pok = 568; } else //Trubbish //яд
   if($rn == 12) { $pok = 396; } else //Starly //летающий + норм
   if($rn == 13) { $pok = 685; } else //Slurpuff //волшебный
   if($rn == 14) { $pok = 647; } else //Heracross //насекомое + боевой
   if($rn == 15) { $pok = 539; } else //Sawk //боевой
   if($rn == 16) { $pok = 333; } else //Swablu // летающий + дракон
   if($rn == 17) { $pok = 243; } else //Raikou //электрический
   if($rn == 18) { $pok = 379; } else //Registeel //стальной
   if($rn == 19) { $pok = 639; } //Terrakion //камень + боевой*/
   minus_item(1,385);
   minus_item(1,386);
   minus_item(1,387);
   minus_item(1,388);
   minus_item(1,389);
   minus_item(1,390);
   minus_item(1,391);
   minus_item(1,392);
   minus_item(1,393);
   minus_item(1,394);
   minus_item(1,395);
   minus_item(1,396);
   minus_item(1,397);
   minus_item(1,417);
   minus_item(1,418);
   minus_item(1,419);
   minus_item(1,420);
   minus_item(1,421);
   minus_item(1,422);
   minus_item(1,423);
   minus_item(1,425);
   minus_item(1,424);
  
   $dat = date("d.m");
   $inf = $mysqli->query("SELECT name from `base_pokemon` WHERE `id`='$pok'")->fetch_assoc();
   $mysqli->query("INSERT INTO `antikvar` (`data`,`user`,`pok`) VALUES ('".$dat."', '".$_SESSION['user_id']."','$pok')"); 
   newPokemon_auk($pok,$_SESSION['user_id']);
$textNPC = 'И так, фартуна выбрала '.$inf['name'];
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Спасибо!</a></li>';	
}else{
$textNPC = 'Карт не хватает.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Извините</a></li>';	
}
}
?>