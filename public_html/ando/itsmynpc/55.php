<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Парень в черном';
if($npc == 55){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
$textNPC = 'Убирайся!';
if(info_quest(48,'step') == 5){
if(empty($answer)){
$textNPC = 'Чего тебе?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Ты кое-что украл из склада. Верни.</a></li><br>';
}else
if($answer == 1){
$textNPC = 'Гуляй милюзга! Просить меня о чем-то может только Босс.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Значит поговорим с твоим Боссом.</a></li>';	
}else
if($answer == 2){ 
	quest_update(48,6);
$textNPC = 'Удачи в Канто! *смеется*';
}
}else
if(info_quest(48,'step') == 8){
if(empty($answer)){
$textNPC = 'Чего ты снова тут?';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Держи, это письмо от твоего Босса.</a></li><br>';
}else
if($answer == 1){
	quest_update(48,9);
	plus_item(1,178,$user_id);
	minus_item(1,181,$user_id);
$textNPC = 'Эм... *разворачивает письмо, внимательно вчитывается в каждую строку* Пха! Да забирай ты свою сферу! У меня таких навалом!';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Так-то лучше!</a></li>';	
}
}
?>