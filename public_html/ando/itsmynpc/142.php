<?php #Стефани
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Продавец ТМ-Атак в синем';
if($npc == 142 && empty($answer)){
	if(!item_isset(437, 1)){
		$textNPC = 'У вас нет самоцветов!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Да? А я и не заметил, простите.</a></li>';
	}elseif(item_isset(437, 1) && !info_quest(142,'step') == 8){
     $textNPC = 'Спасибо за участие в ивенте! Выберите ТМ - Атаку. Цена 50 самоцветов.';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Я выбираю TM 12 - Taunt.</a></li>'; //1012
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Я выбираю TM 14 - Blizzard.</a></li>'; //1005
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Я выбираю TM 25 - Thunder.</a></li>'; //1004
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=5&map=1">Я выбираю TM 19 - Giga Drain.</a></li>'; //1025
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=6&map=1">Я выбираю TM 40 - Aerial Ace.</a></li>'; //1023
	}
	/*}elseif (info_quest(142,'step') == 8){
		$textNPC = 'Спасибо за участие!';
	}*/
}elseif($npc == 142 && $answer == 2 && item_isset(437,50)){
	$textNPC = 'Ух-ты какая ТМ-Атака. Поздравляю тебя! Спасибо за участие!';	
		minus_item(50,437);
	  	plus_item(1,1012);
	  	quest_update(142,8,0);
}elseif($npc == 142 && $answer == 3 && item_isset(437,50)){
	$textNPC = 'Ух-ты какая ТМ-Атака. Поздравляю тебя! Спасибо за участие!';	
		minus_item(50,437);
	  	plus_item(1,1005);
	  	quest_update(142,8,0);
	  	}elseif($npc == 142 && $answer == 4 && item_isset(437,50)){
	$textNPC = 'Ух-ты какая ТМ-Атака. Поздравляю тебя! Спасибо за участие!';	
		minus_item(50,437);
	  	plus_item(1,1004);
	  	quest_update(142,8,0);
	  	}elseif($npc == 142 && $answer == 5 && item_isset(437,50)){
	$textNPC = 'Ух-ты какая ТМ-Атака. Поздравляю тебя! Спасибо за участие!';	
		minus_item(50,437);
	  	plus_item(1,1025);
	  	quest_update(142,8,0);
	  	}elseif($npc == 142 && $answer == 6 && item_isset(437,50)){
	$textNPC = 'Ух-ты какая ТМ-Атака. Поздравляю тебя! Спасибо за участие!';	
		minus_item(50,437);
	  	plus_item(1,1023);
	  	quest_update(142,8,0);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 