<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Лайсинтия';
$img = "<img src='https://oldpokemon.ru/img/127.png'>";
if($npc == 127){
	if(empty($answer)){
		$textNPC = ''.$img.'   Подойди, не бойся! ^_^';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Слушаю?</a></li>';
	}elseif($answer == 1 && !info_quest(127,'step') == 2){
		$textNPC = ''.$img.'   Вот, держи. Но сейчас его не открыть, только в конце праздника Пасхи. Ну чтож, пока!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Спасибо!</a></li>';
		plus_item(1,1045,$_SESSION['user_id']);
		quest_update(127,2);
	}else{
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
}