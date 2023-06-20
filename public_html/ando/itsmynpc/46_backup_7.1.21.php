<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Мистер Рихтер';
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
if($npc == 46){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(empty($answer)){
$textNPC = 'Я готов обменять Сапфировую Колоду карт на что-нибудь ценное. Ты готов к сделке?';
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
if(item_isset(416,1) and item_isset(415,1) and item_isset(414,1) and item_isset(413,1) and item_isset(412,1) and item_isset(411,1) and item_isset(410,1) and item_isset(409,1) and item_isset(408,1) and item_isset(407,1) and item_isset(406,1) and item_isset(405,1) and item_isset(404,1) and item_isset(403,1) and item_isset(402,1) and item_isset(401,1) and item_isset(400,1) and item_isset(399,1) and item_isset(398,1) and item_isset(426,1) and item_isset(424,1) and item_isset(425,1)){
  $rn = mt_rand(1,15);
   if($rn == 1) { $pok = 759; } else //Bulbasaur //трава + яд 
   if($rn == 2) { $pok = 131; } else //Cyndaquil //огонь
   if($rn == 3) { $pok = 134; } else //Klink
   if($rn == 4) { $pok = 135; } else //Sandshrew //земля
   if($rn == 5) { $pok = 136; } else //Kabuto // вода + камень
   if($rn == 6) { $pok = 328; } else //Chinchou //вода + элект
   if($rn == 7) { $pok = 380; } else //Stantler //норм
   if($rn == 8) { $pok = 669; } else //Smoochum //ледяной + псих
   if($rn == 9) { $pok = 481; } else //Scraggy // темные + боевой
   if($rn == 10) { $pok = 721; } else //Eevee
   if($rn == 11) { $pok = 152; } else //Eevee
   if($rn == 12) { $pok = 155; } else
   if($rn == 13) { $pok = 158; } else //Eevee
   if($rn == 14) { $pok = 551; } else //Eevee
   if($rn == 15) { $pok = 566; } else //Eevee

   /*if($rn == 1) { $pok = 1; } else //Bulbasaur //трава + яд 
   if($rn == 2) { $pok = 155; } else //Cyndaquil //огонь
   if($rn == 3) { $pok = 599; } else //Klink
   if($rn == 4) { $pok = 747; } else //Sandshrew //земля
   if($rn == 5) { $pok = 239; } else //Kabuto // вода + камень
   if($rn == 6) { $pok = 170; } else //Chinchou //вода + элект
   if($rn == 7) { $pok = 131; } else //Stantler //норм
   if($rn == 8) { $pok = 238; } else //Smoochum //ледяной + псих
   if($rn == 9) { $pok = 559; } else //Scraggy // темные + боевой
   if($rn == 10) { $pok = 133; } else //Eevee
   if($rn == 11) { $pok = 633; } else //Seviper //яд
   if($rn == 12) { $pok = 227; } else //Skarmory // стальной + летающий
   if($rn == 13) { $pok = 415; } else //Combee //насекомое + летающий
   if($rn == 14) { $pok = 683; } else //Aromatisse //волшебный
   if($rn == 15) { $pok = 538; } else //Throh //боевой
   if($rn == 16) { $pok = 714; } else //Druddigon // дракон
   if($rn == 17) { $pok = 245; } else //Suicune //вода
   if($rn == 18) { $pok = 377; } else //Regirock // каменный
   if($rn == 19) { $pok = 640; }  //Virizion // трава + боевой*/
   minus_item(1,416);
   minus_item(1,415);
   minus_item(1,414);
   minus_item(1,413);
   minus_item(1,412);
   minus_item(1,411);
   minus_item(1,410);
   minus_item(1,409);
   minus_item(1,408);
   minus_item(1,407);
   minus_item(1,406);
   minus_item(1,405);
   minus_item(1,404);
   minus_item(1,403);
   minus_item(1,402);
   minus_item(1,401);
   minus_item(1,400);
   minus_item(1,399);
   minus_item(1,398);
   minus_item(1,426);
   minus_item(1,424);
   minus_item(1,425);
  
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