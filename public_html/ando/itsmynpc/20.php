<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Профессор Оук';
if($npc == 20 && empty($answer)){
	if(info_quest(4,'step') == 5){
		$textNPC = 'Спасибо большое, ты очень помог.';
	}elseif(info_quest(4,'step') !== 5 && info_quest(4,'step') == 4 && item_isset(103,1) AND item_isset(104,1) AND item_isset(105,1)){
		$textNPC = 'Я благодарен тебе Юный Тренер, теперь новички смогут получить своих покемонов и начать свое путешествие. Думаю, у меня есть новый друг для тебя.';
		minus_item(1,103);
		minus_item(1,104);
		minus_item(1,105);
		$pok_rand = rand(1,100);
		if($pok_rand > 75){
			$pok = 37;
		}elseif($pok_rand > 50){
			$pok = 25;
		}elseif($pok_rand > 15){
			$pok = 35;
		}else{
			$pok = 58;
		}
		newPokemon($pok,$_SESSION['user_id']);
		quest_update(4,5,1);
	}elseif(info_quest(4,'step') == 1 || info_quest(4,'step') == 2 || info_quest(4,'step') == 3){
		$textNPC = 'Поторопитесь, скоро прибудут ученики.';
	}else{
		$textNPC = 'О, здравствуй молодой тренер я слышал ты получил сертификат , не мог бы ты теперь помочь с одним дельцем?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да, почему бы и нет.</a></li>';
		$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Я должен поймать всех покемонов, у меня нет свободного времени.<sub>[Уйти]</sub></a></li>';
	}
}elseif($npc == 20 && $answer == 1){
	$textNPC = 'Замечательно, в таком случае слушай. Через пару дней прибудут новички в Академию, а у меня пропали 3 покемона-малыша .Должно быть они снова играли между собой и ненароком ускакали. Их нужно срочно найти пока с ними ничего не случилось.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Я найду их и верну в целости и сохранности.</a></li>';
}elseif($npc == 20 && $answer == 2){
	$textNPC = 'Вот это дух! Отправляйся ,не буду тебя задерживать.';
	quest_update(4,1);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?>