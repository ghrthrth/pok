<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Коллекционер меда';
if($npc == 70 && empty($answer)){
	$textNPC = 'Здравствуй,юнный тренер.Ты принес мой мёд?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=70&answ_id=1&map=1">Да,но это было не так просто,как казалосью </a></li>';
}elseif($npc == 70 && $answer == 1){
	$textNPC = 'Еще бы! Я так рад.За твой труд я щедро залпачу,но мне нужно сначало посетить свой замок,чтоб  тебя наградить.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=70&answ_id=2&map=1">Хорошо,я подожду.</a></li>';
}elseif($npc == 70 && $answer == 2){
	$textNPC = 'На это у меня уйдет 3-4 суток.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id=70&answ_id=3map=1">Тогда до скорой встречи. </a></li>';
}elseif($npc == 70 && $answer == 3){
	$textNPC = 'Спасибо тебе тренер,скоро увидимся!';
	


}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?>