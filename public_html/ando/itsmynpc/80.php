<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Кондитер';
if($npc == 80){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(empty($answer)){
$textNPC = 'Ты собрал набор свечек для праздничного торта?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Где мне взять их?</a></li><br>';
$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">А что я получу в замен?</a></li><br>';
$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Да, вот же они!</a></li><br>';
}else
if($answer == 1){
$textNPC = 'Дропай из покемонов.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&map=1">У меня другой вопрос.</a></li>';	
}else
if($answer == 2){ 
$textNPC = 'Что дадим, то и возьмешь. Карты - это всегда риск. И азарт. Кто уклоняется от игры, тот ее проигрывает.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&map=1">У меня другой вопрос.</a></li>';	
}else
if($answer == 3){ 
if(item_isset(700,1) and item_isset(701,2) and item_isset(703,1) and item_isset(704,1) and item_isset(705,1) and item_isset(706,1)){
  $rn = mt_rand(1,3);
   if($rn == 1) { $pok = 511; } else
   if($rn == 2) { $pok = 513; } else
   if($rn == 3) { $pok = 515; } 
   minus_item(1,700);
   minus_item(2,701);
   minus_item(1,702);
   minus_item(1,703);
   minus_item(1,704);
   minus_item(1,705);
   minus_item(1,706);
   plus_item (3,330);
   plus_item (3,72);
   plus_item (15,41);
  
   $dat = date("d.m");
   $inf = $mysqli->query("SELECT name from `base_pokemon` WHERE `id`='$pok'")->fetch_assoc();
   newPokemon($pok,$_SESSION['user_id']);
$textNPC = 'Огромное спасибо! Вот держи Набор тренировки х3, Даркбол х3, Леденец х15 и '.$inf['name'];
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Спасибо!</a></li>';	
}else{
$textNPC = 'Тут нет полного набора!';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Извините</a></li>';	
}
}
?>