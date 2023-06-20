<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Профессор Козмо';
if($npc == 604){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
if(empty($answer)){
$textNPC = 'Большое пасибо за помощь! Я очень рад тебя видеть, за это я готов отблагодарить тебя стартовым покемоном нашего региона, на выбор:';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Получить #252 Трикко </a></li><br>';
$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Получить #255 Торчик</a></li><br>';
$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=5&map=1">Получить #258 Мадкип </a></li><br>';
}else
if($answer == 1){
$textNPC = '....';
$moveNPC = '....';	
}else
if($answer == 2){ 
$textNPC = '....';
$moveNPC = '....';	
}else
if($answer == 3){ 
if(item_isset(436,1)){
  $rn = mt_rand(1,2);
   if($rn == 1) { $pok = 252; } else //Трикко
   if($rn == 2) { $pok = 252; }  //Трикко
   minus_item(1,436);
       quest_update(603,9);
   $dat = date("d.m");
   $inf = $mysqli->query("SELECT name from `base_pokemon` WHERE `id`='$pok'")->fetch_assoc();
   newStart($pok,$_SESSION['user_id']);
$textNPC = 'Вы выбрали '.$inf['name'];
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Спасибо!</a></li>';	
}else{
$textNPC = 'Посылки нет.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Извините</a></li>';	
}

}else
if($answer == 4){ 
if(item_isset(436,1)){
  $rn = mt_rand(1,2);
   if($rn == 1) { $pok = 255; } else //Торчик
   if($rn == 2) { $pok = 255; }  //Торчик
   minus_item(1,436);
       quest_update(603,9);
   $dat = date("d.m");
   $inf = $mysqli->query("SELECT name from `base_pokemon` WHERE `id`='$pok'")->fetch_assoc();
   newStart($pok,$_SESSION['user_id']);
$textNPC = 'Вы выбрали '.$inf['name'];
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Спасибо!</a></li>';	
}else{
$textNPC = 'Посылки нет.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Извините</a></li>';	
}


}else
if($answer == 5){ 
if(item_isset(436,1)){
  $rn = mt_rand(1,2);
   if($rn == 1) { $pok = 258; } else //Мадкип
   if($rn == 2) { $pok = 258; }  //Мадкип
   minus_item(1,436);
    quest_update(603,9);
   $dat = date("d.m");
   $inf = $mysqli->query("SELECT name from `base_pokemon` WHERE `id`='$pok'")->fetch_assoc();
   newStart($pok,$_SESSION['user_id']);
$textNPC = 'Вы выбрали '.$inf['name'];
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Спасибо!</a></li>';	
}else{
$textNPC = 'Посылки нет.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location">Извините</a></li>';
}
}
?>