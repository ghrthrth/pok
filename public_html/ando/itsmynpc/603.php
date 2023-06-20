<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Лаборант';
if($npc == 603){ }else{  die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>"); }
$textNPC = '*занимается своими делами*';
	if(!info_quest(603,'step')){
if(empty($answer)){
$textNPC = '...';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте! Вы тот самый лаборант , о котором говорил мне Профессор Грей. Он просил передать вам, чтобы вы передали образцы в лабораторию Козмо.</a></li><br>';
}else
if($answer == 1){
$textNPC = 'Извини, я тороплюсь, мне нужно добыть ещё 10 гранита.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Хм. Может я могу вам помочь ?</a></li>';	
}else
if($answer == 2){ 
	quest_update(603,2);
$textNPC = 'Может быть... *что-то делает*  ';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">*отправиться за гранитом*</a></li>';	
}
}else
if(info_quest(603,'step') == 2){
if(empty($answer)){
$textNPC = '...';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Я принёс для вас Гранит. Держите!</a></li><br>';
}else
if($answer == 1){
	if(item_isset(435,10)){
		 plus_item(1,436,$user_id);
		 minus_item(10,435,$user_id);
		 quest_update(603,8);
$textNPC = 'Ох, чёрт, прости... Я слишком сильно увлёкся работой и даже не заметил, как ты пришёл. Слушай, не мог бы ты ещё кое в чём мне помочь, не передашь посылку, профессору Козмо. Я думаю, он сильно обрадуется.';
$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Ничего страшного! Хорошо.</a></li>';	
}else{
$textNPC = 'Хм..';
}
}
}
?>