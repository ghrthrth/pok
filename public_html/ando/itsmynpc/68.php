<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Продавец';
if($npc == 68){
	if(empty($answer)){
		$textNPC = 'Здравствуйте!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте.</a></li>';
	}elseif($answer == 1 && !info_quest(68,'step') == 2){
		$textNPC = 'Поздравляем, у нас акция, Вы совершенно бесплатно получаете TM 17 - Protect!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Спасибо.</a></li>';
		plus_item(1,1018,$user_id);
		quest_update(68,2);
	}else{
		die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
	}
}