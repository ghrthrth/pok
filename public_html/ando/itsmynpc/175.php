<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$arena_ban = infUsr($user_id,"arena_ban"); 
$jet_week = infUsr($user_id,"jet_week");
$nameNPC = 'РандомАрена';
$cMPK =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$user_id."' and `active`='1' and `hp` > '0'");
         $cmpk_ = $cMPK->num_rows;
         function newPokArena($pok,$user_new) {
   global $mysqli;
  $pok_base = $mysqli->query("SELECT * FROM base_pokemon WHERE `id` = '".$pok."'")->fetch_assoc();
   $incpk =  $mysqli->query("SELECT * FROM `user_pokemons` WHERE `user_id`='".$user_new."' and `active`='1'");
   $incpk_ = $incpk->num_rows;
   if($incpk_ == 6){
    $activ = 0;
   }else{
    $activ = 1;
   }
  $shin = "arena";
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

    $myLvl = 100;

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
$atk_set = $mysqli->query("SELECT * FROM battle_pokset WHERE `basenum` = '".$pok_base['id']."' ORDER BY RAND() LIMIT 1")->fetch_assoc();
$trn = rand(1,6);
$trn_stat = rand(1,5);
$mysqli->query("INSERT INTO `user_pokemons` (`user_id`,`basenum`,`numbpu`,`name`,`character`,`lvl`,`date_get`,`active`,`type`,`gender`,`exp_max`,`hp`,`hp_max`,`attack`,`def`,`speed`,`sp_attack`,`sp_def`,`hp_gen`,`atc_gen`,`def_gen`,`speed_gen`,`spatc_gen`,`spdef_gen`,`owner`,`master`,`start_pok`,`simpaty`,`trade`,`trn`,`trn_stat`,`atk1`,`atk2`,`atk3`,`atk4`,spark,Weight) VALUES ('".$user_new."','".$pok_base['id']."','".$pok_base['id']."','".$pok_base['name']."','".$hr."','100','".time()."','".$activ."','".$shin."','".$gn."','200','".$s1."','".$s1."','".$s2."','".$s3."','".$s4."','".$s5."','".$s6."','".$hg."','".$ag."','".$dg."','".$sg."','".$sag."','".$sdg."','2','2','0','".rand(1,3)."','1','".$trn."','".$trn_stat."','".$atk_set['atk1']."','".$atk_set['atk2']."','".$atk_set['atk3']."','".$atk_set['atk4']."','0','".$pok_base['weight']."') ");
$pID = $mysqli->insert_id;
baseAttackPok($pID);
}
?>
<script language="javascript">
function arena_confrm(npc) {
        q=confirm('Вы уверены что хотите отозвать заявку участия на арене?');
        if (q) window.location='game.php?fun=m_npc&npc_id='+npc+'&answ_id=2';
    }
</script>
<?
if($npc == 175){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if($user['rarena'] == 0 and $user['na_rarene'] == 0){
if(empty($answer)){
$textNPC = 'Привет, я куратор этой арены. Правила очень просты. Побеждаешь в бою - получаешь жетон. Жетоны можно обменять на ценные призы. Чтобы начать бой нужно подать заявку.  Бои начнутся только тогда, когда на арене будет 4 и более человек, после каждого боя нужно снова подать заявку. Максимальное количество боев за неделю -150.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2">Подать заявку</a></li><br>';
//$moveNPC .= '<a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2">Когда будет сброс</a><br>';
}else{
	if($user['plus_jet'] == 1){
    if(time() < $user['arena_ban']){
      $textNPC = 'Еще не прошло 30 минут после выхода с арены. Передохните немного, это полезно! :)';
    }else{
$textNPC = 'Отлично, ожидайте когда 4 или более человек подадут заявки. Ты уже провел '.$jet_week.' боев.';
$mysqli->query("UPDATE users SET rarena = '1', na_rarene = '1', plus_jet = '0', jeton = '1' WHERE `id` = '".$_SESSION['user_id']."'");
while($cMPK_W = $cMPK->fetch_assoc()){
	$mysqli->query("UPDATE user_pokemons SET active = 0 WHERE active = 1 AND user_id = ".$user_id);
}
$pokemons_1_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_2_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_3_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_4_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_5_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_6_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
/*$pokemons_1 = rand(1,733);
$pokemons_2 = rand(1,733);
$pokemons_3 = rand(1,733);
$pokemons_4 = rand(1,733);
$pokemons_5 = rand(1,733);
$pokemons_6 = rand(1,733);*/
  newPokArena($pokemons_1_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_2_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_3_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_4_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_5_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_6_test['basenum'],$_SESSION['user_id']);
  $stat_upd = $mysqli->query('SELECT id FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1');
while($stat_update = $stat_upd->fetch_assoc()){
    stat_updates($stat_update['id']);
}
  $mysqli->query('UPDATE user_pokemons SET hp=hp_max WHERE user_id = '.$_SESSION['user_id'].' AND active = 1');
  $q = $mysqli->query('SELECT id,atk1,atk2,atk3,atk4 FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active=1');
   while($a = $q->fetch_assoc()){
  
      if($a['atk1'] > 0){
     $one = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk1'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp1 = '.$one['atac_pp'].' WHERE id = '.$a['id']); 
          }
        if($a['atk2'] > 0){
     $tw = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk2'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp2 = '.$tw['atac_pp'].' WHERE id = '.$a['id']);  
          }
          if($a['atk3'] > 0){
     $tr = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk3'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp3 = '.$tr['atac_pp'].' WHERE id = '.$a['id']);  
          }
          if($a['atk4'] > 0){
     $fr = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk4'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp4 = '.$fr['atac_pp'].' WHERE id = '.$a['id']);  
          }
     
     
  }
}
	}elseif($user['plus_jet'] == 0 and ($user['jet_week'] >= 150 or $user['jeton'] >= 300)){
		$textNPC = 'Вы уже провели 150 боев или заработали больше 300 жетонов за неделю. Приходите попозже.';
	}elseif($cmpk_ == 0 && $user['na_rarene'] == 0){
		$textNPC = 'Ваши покемоны не в состоянии сражаться.';
	}else{
    if(time() < $user['arena_ban']){
      $textNPC = 'Еще не прошло 30 минут после выхода с арены. Передохните немного, это полезно! :) ';
    }else{
$textNPC = 'Отлично, ожидайте когда 4 или более человек подадут заявки. Ты уже провел '.$jet_week.' боев.';
$mysqli->query("UPDATE users SET rarena = '1', na_rarene = '1' WHERE `id` = '".$_SESSION['user_id']."'");
while($cMPK_W = $cMPK->fetch_assoc()){
	$mysqli->query("UPDATE user_pokemons SET active = 0 WHERE active = 1 AND user_id = ".$user_id);
}
$pokemons_1_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_2_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_3_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_4_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_5_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_6_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
/*$pokemons_1 = rand(1,733);
$pokemons_2 = rand(1,733);
$pokemons_3 = rand(1,733);
$pokemons_4 = rand(1,733);
$pokemons_5 = rand(1,733);
$pokemons_6 = rand(1,733);*/
  newPokArena($pokemons_1_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_2_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_3_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_4_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_5_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_6_test['basenum'],$_SESSION['user_id']);
  $stat_upd = $mysqli->query('SELECT id FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1');
while($stat_update = $stat_upd->fetch_assoc()){
    stat_updates($stat_update['id']);
}
  $mysqli->query('UPDATE user_pokemons SET hp=hp_max WHERE user_id = '.$_SESSION['user_id'].' AND active = 1');
  $q = $mysqli->query('SELECT id,atk1,atk2,atk3,atk4 FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active=1');
   while($a = $q->fetch_assoc()){
  
      if($a['atk1'] > 0){
     $one = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk1'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp1 = '.$one['atac_pp'].' WHERE id = '.$a['id']); 
          }
        if($a['atk2'] > 0){
     $tw = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk2'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp2 = '.$tw['atac_pp'].' WHERE id = '.$a['id']);  
          }
          if($a['atk3'] > 0){
     $tr = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk3'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp3 = '.$tr['atac_pp'].' WHERE id = '.$a['id']);  
          }
          if($a['atk4'] > 0){
     $fr = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk4'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp4 = '.$fr['atac_pp'].' WHERE id = '.$a['id']);  
          }
     
     
  }
}
}
}
}else{
	if(empty($answer) && $user['na_rarene'] == 1){
$textNPC = 'Ты всегда можешь уйти из арены, отменив заявку.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=5">Поменять покемонов и начать следующий бой.</a></li><br>';
$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2">Отменить заявку</a></li><br>';
//$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4">Хочу вылечить покемонов!</a></li><br>';

}elseif($answer == 4 && $user['na_rarene'] == 1){
  $textNPC = 'Покемоны вылечены!';
    $mysqli->query('UPDATE user_pokemons SET hp=hp_max WHERE user_id = '.$_SESSION['user_id'].' AND active = 1');
  $q = $mysqli->query('SELECT id,atk1,atk2,atk3,atk4 FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active=1');
   while($a = $q->fetch_assoc()){
  
      if($a['atk1'] > 0){
     $one = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk1'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp1 = '.$one['atac_pp'].' WHERE id = '.$a['id']); 
          }
        if($a['atk2'] > 0){
     $tw = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk2'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp2 = '.$tw['atac_pp'].' WHERE id = '.$a['id']);  
          }
          if($a['atk3'] > 0){
     $tr = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk3'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp3 = '.$tr['atac_pp'].' WHERE id = '.$a['id']);  
          }
          if($a['atk4'] > 0){
     $fr = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk4'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp4 = '.$fr['atac_pp'].' WHERE id = '.$a['id']);  
          }
     
     
  }
  $mysqli->query("UPDATE users SET rarena = '1', reroll = '1' WHERE `id` = '".$_SESSION['user_id']."'");
}elseif($answer == 5 && $user['na_rarene'] == 1){
  if($user['reroll'] == 1 or $user['jeton'] >= 300 or $user['jet_week'] >= 150){
    $textNPC = 'Либо ты достиг лимита боев, либо ты уже сменил покемонов.';
  }else{
  $textNPC = 'Сначала я удалю нынешний набор покемонов.';
$mysqli->query('DELETE FROM user_pokemons WHERE type = "arena" AND user_id = '.$_SESSION['user_id']);
$mysqli->query("UPDATE users SET rarena = '0' WHERE `id` = '".$_SESSION['user_id']."'");
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=6"><sub>Следующий шаг</sub></a></li><br>';
}
}elseif($answer == 6 && $user['na_rarene'] == 1){
  $textNPC = 'Держи новый набор покемонов. Ты уже провел '.$jet_week.' боев.';
$pokemons_1_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_2_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_3_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_4_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_5_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
$pokemons_6_test = $mysqli->query("SELECT basenum FROM battle_pokset WHERE zapret = 0 ORDER BY RAND() LIMIT 1")->fetch_assoc();
/*$pokemons_1 = rand(1,733);
$pokemons_2 = rand(1,733);
$pokemons_3 = rand(1,733);
$pokemons_4 = rand(1,733);
$pokemons_5 = rand(1,733);
$pokemons_6 = rand(1,733);*/
  newPokArena($pokemons_1_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_2_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_3_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_4_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_5_test['basenum'],$_SESSION['user_id']);
  newPokArena($pokemons_6_test['basenum'],$_SESSION['user_id']);
  $stat_upd = $mysqli->query('SELECT id FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active = 1');
while($stat_update = $stat_upd->fetch_assoc()){
    stat_updates($stat_update['id']);
}
  $mysqli->query('UPDATE user_pokemons SET hp=hp_max WHERE user_id = '.$_SESSION['user_id'].' AND active = 1');
  $q = $mysqli->query('SELECT id,atk1,atk2,atk3,atk4 FROM user_pokemons WHERE user_id = '.$_SESSION['user_id'].' AND active=1');
   while($a = $q->fetch_assoc()){
  
      if($a['atk1'] > 0){
     $one = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk1'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp1 = '.$one['atac_pp'].' WHERE id = '.$a['id']); 
          }
        if($a['atk2'] > 0){
     $tw = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk2'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp2 = '.$tw['atac_pp'].' WHERE id = '.$a['id']);  
          }
          if($a['atk3'] > 0){
     $tr = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk3'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp3 = '.$tr['atac_pp'].' WHERE id = '.$a['id']);  
          }
          if($a['atk4'] > 0){
     $fr = $mysqli->query('SELECT atac_pp FROM base_attacks WHERE atac_id = '.$a['atk4'])->fetch_assoc();
     $mysqli->query('UPDATE user_pokemons SET pp4 = '.$fr['atac_pp'].' WHERE id = '.$a['id']);  
          }
     
     
  }
  $mysqli->query("UPDATE users SET rarena = '1', reroll = '1' WHERE `id` = '".$_SESSION['user_id']."'");

}else{
$banARENA = time() + 1800;
$textNPC = 'Приходи еще!';
$mysqli->query("UPDATE users SET rarena = '0', na_rarene = '0', arena_ban = '".$banARENA."' WHERE `id` = '".$_SESSION['user_id']."'");
$mysqli->query('DELETE FROM user_pokemons WHERE type = "arena" AND user_id = '.$_SESSION['user_id']);
      $mysqli->query("UPDATE user_pokemons SET active = 1 WHERE active = 0 AND user_id = '".$user_id."' ORDER BY RAND() LIMIT 1");
}
}
?>