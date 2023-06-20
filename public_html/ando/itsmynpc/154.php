<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Ричард';
function newPokemon_fort($pok,$user_new) {
   global $mysqli;
  $pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '".$pok."'")->fetch_assoc();
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
      $hg = rand(31,34);
      $ag = rand(31,34);
      $dg = rand(31,34);
      $sg = rand(31,34);
      $sag = rand(31,34);
      $sdg = rand(31,34);
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

$mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,`spark`,`trade`,`Weight`) VALUES ('".$user_new."','".$pok_base['id']."','".$pok_base['id']."','".$pok_base['name']."','".$hr."','1','".time()."','".$activ."','".$shin."','".$gn."','200','".$s1."','".$s1."','".$s2."','".$s3."','".$s4."','".$s5."','".$s6."','".$hg."','".$ag."','".$dg."','".$sg."','".$sag."','".$sdg."','".$user_new."','".$user_new."','0','".rand(1,3)."','0','0','".$pok_base['weight']."') ");
$pID = $mysqli->insert_id;
baseAttackPok($pID);
}
if($npc == 154){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(empty($answer)){
$textNPC = 'У тебя есть Билет удачи? Если да, то ты можешь прокрутить колесо фортуны и испытать свою удачу!';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">А где мне найти билет?</a></li><br>';
$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">А где я могу найти список призов?</a></li><br>';
$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">У меня есть билет, и я хочу сыграть!</a></li><br>';
}else
if($answer == 1){
$textNPC = 'Даже не знаю как тебе подсказать. Вообще ходят слухи что его можно получить за игровые события, как ежедневный приз или даже найти у диких покемонов. Но я не знаю что из этого правда, а что ложь.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&map=1">У меня другой вопрос.</a></li>';   
}else
if($answer == 2){ 
$textNPC = 'Говорят что на каком - то "форуме" можно найти информацию об этом. Но я не знаю что такое "форум", так что удачи в поисках!';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&map=1">У меня другой вопрос.</a></li>';   
}else
if($answer == 3){ 
if(item_isset(1051,1)){
   if(mt_rand(1,100) <= 25){
      $mainrand = rand(1,1);
      if($mainrand == 1){
         $rndm = rand(1,31);
         if($rndm == 1){ $pok = 483; }
         if($rndm == 2){ $pok = 720; }
         if($rndm == 3){ $pok = 718; }
         if($rndm == 4){ $pok = 864; }
         if($rndm == 5){ $pok = 864; }
         if($rndm == 6){ $pok = 864; }
         if($rndm == 7){ $pok = 859; }
         if($rndm == 8){ $pok = 859; }
         if($rndm == 9){ $pok = 859; }
         if($rndm == 10){ $pok = 856; }
         if($rndm == 11){ $pok = 856; }
         if($rndm == 12){ $pok = 856; }
         if($rndm == 13){ $pok = 854; }
         if($rndm == 14){ $pok = 854; }
         if($rndm == 15){ $pok = 854; }
         if($rndm == 16){ $pok = 852; }
         if($rndm == 17){ $pok = 852; }
         if($rndm == 18){ $pok = 852; }
         if($rndm == 19){ $pok = 850; }
         if($rndm == 20){ $pok = 850; }
         if($rndm == 21){ $pok = 850; }
         if($rndm == 22){ $pok = 848; }
         if($rndm == 23){ $pok = 848; }
         if($rndm == 24){ $pok = 848; }
         if($rndm == 25){ $pok = 846; }
         if($rndm == 26){ $pok = 846; }
         if($rndm == 27){ $pok = 846; }
         if($rndm == 28){ $pok = 738; }
         if($rndm == 29){ $pok = 738; }
         if($rndm == 30){ $pok = 738; }
         if($rndm == 31){ $pok = 738; }
      }
      /*if($mainrand >= 1 and $mainrand <=1){
         $rndm = rand(1,1);
         if($rndm == 1){ $pok = 802; }
      }elseif($mainrand >= 2 and $mainrand <= 20){
         $rndm = rand(1,3);
         if($rndm == 1){ $pok = 374; }
         if($rndm == 2){ $pok = 641; }
         if($rndm == 3){ $pok = 378; }
      }else{
         $rndm = rand(1,4);
         if($rndm == 1){ $pok = 714; }
         if($rndm == 2){ $pok = 755; }
         if($rndm == 3){ $pok = 615; }
         if($rndm == 4){ $pok = 227; }
      }*/
      minus_item(1,1051);
      $dat = date("d.m");
      $inf = $mysqli->query("SELECT name from `base_pokemon` WHERE `id`='$pok'")->fetch_assoc();
      $mysqli->query("INSERT INTO `antifart` (`data`,`user`,`pok`) VALUES ('".$dat."', '".$_SESSION['user_id']."','$pok')"); 
      newPokemon_fort($pok,$_SESSION['user_id']);
      }else{
         $mainrand = mt_rand(1,100);
         if($mainrand >= 1 and $mainrand <= 15){
            $rndm = rand(1,6);
            if($rndm == 1){ $it = 1117; $count = 1; }
            if($rndm == 2){ $it = 1100; $count = 1; }
            if($rndm == 3){ $it = 1109; $count = 1; }
            if($rndm == 4){ $it = 1115; $count = 1; }
            if($rndm == 5){ $it = 1101; $count = 1; }
            if($rndm == 6){ $it = 1010; $count = 1; }
         }else{
            $rndm = rand(1,3);
            if($rndm == 1){ $it = 330;  $count = rand(20,65); }
            if($rndm == 2){ $it = 384; $count = 2; }
            if($rndm == 3){ $it = 1;    $count = rand(2000000,6000000); }
         }
      minus_item(1,1051);
      plus_item($count,$it,$user_id);
      $dat = date("d.m");
      $itm = $mysqli->query("SELECT name FROM base_items WHERE `id` = '".$it."' ")->fetch_assoc();
      $mysqli->query("INSERT INTO `antifart` (`data`,`user`,`item`,`count`) VALUES ('".$dat."', '".$_SESSION['user_id']."','$it','$count')"); 

   }
$textNPC = 'И так, колесо остановилось на  '.$inf['name'] .$itm['name']. ' x' .price($count);
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Спасибо!</a></li>';   
}else{
$textNPC = 'У тебя нет билета!.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Извините</a></li>';   
}
}
?>