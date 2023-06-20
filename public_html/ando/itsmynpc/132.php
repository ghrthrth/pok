<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Полицейский';
if($npc == 132){
	if(empty($answer)){
		$textNPC = 'Добро пожаловать, доблестный Защитник! Возьми новую экипировку для защиты.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Что именно?</a></li>';
	}elseif($answer == 1 && !info_quest(132,'step') == 2){
		$textNPC = 'Защита тренеров - очень непростая работа. Держи покемона. Он тебе поможет с этим делом.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Ну, спасибо.</a></li>';
		$pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 564;
		}elseif($pok_rand > 50){
			$pok = 079;
		}elseif($pok_rand > 25){
			$pok = 131;
		}else{
			$pok = 527;
		}
		newPokemon($pok,$_SESSION['user_id']);
		quest_update(132,2);
	}else{
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
}