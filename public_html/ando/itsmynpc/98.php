<?php #Стефани
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Офицер Дженни';
if($npc == 98 && empty($answer) && !info_quest(97,'step')){
	$textNPC = 'Гражданин, не мешайте! Проводится следствие.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Извините, офицер.</a></li>';
}elseif($npc == 98 && empty($answer) && info_quest(97,'step') == 1){
	$textNPC = 'Гражданин, не мешайте! Проводится следствие.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Я в курсе об ограблении музея истории и хочу помочь!</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Извините, офицер.</a></li>';
}elseif($npc == 98 && $answer == 1  && info_quest(97,'step') == 1){
	$textNPC = 'Нам не нужна помочь молокососов.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Я тренер покемонов! Я могу быть очень полезным!</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Не ожидал такой грубости от офицера...</a></li>';
}elseif($npc == 98 && $answer == 2  && info_quest(97,'step') == 1){
	$textNPC = 'Раз хочешь взять инициативу, то поищи человека, которому могли продать эти экспонаты.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Принято, Мисс.</a></li>';
}elseif($npc == 98 && $answer == 3  && info_quest(97,'step') == 1){
	$textNPC = 'Будь осторожен!';
	quest_update(97,2);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 