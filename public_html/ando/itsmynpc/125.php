<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Подозрительный тип';
if($npc == 125){
	if(empty($answer)){
		$textNPC = 'Слышь, тип, пойди - ка сюда.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да?</a></li>';
	}elseif($answer == 1 && !info_quest(125,'step') == 2){
		$textNPC = 'Слыхал ты теперь в нашем кругу? Здесь свои законы. Да и ремесло это опасное. Вот тебе, для защиты.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Ну, спасибо.</a></li>';
		$pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 123;
		}elseif($pok_rand > 50){
			$pok = 425;
		}elseif($pok_rand > 15){
			$pok = 285;
		}else{
			$pok = 328;
		}
		newPokemon($pok,$_SESSION['user_id']);
		quest_update(125,2);
	}else{
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
}