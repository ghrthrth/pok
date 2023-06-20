<?php #Стефани
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Продавец ТМ-Атак в красном';
if($npc == 143 && empty($answer)){
	if(!item_isset(437, 1)){
		$textNPC = 'У вас нет самоцветов!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Да? А я и не заметил, простите.</a></li>';
	}elseif(item_isset(437, 1) && !info_quest(143,'step') == 8){
     $textNPC = 'Спасибо за участие в ивенте! Выберите ТМ - Атаку. Цена 100 самоцветов.';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=20&map=1">Я выбираю TM 6 - Toxic.</a></li>'; //1011
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=21&map=1">Я выбираю TM 13 - Ice Beam.</a></li>'; //1036
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=22&map=1">Я выбираю TM 24 - Thunderbolt.</a></li>'; //1050
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=23&map=1">Я выбираю TM 26 - Earthquake.</a></li>'; //1019
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=24&map=1">Я выбираю TM 35 - Flamethrower.</a></li>'; //1006
	}
	/*}elseif (info_quest(143,'step') == 8){
		$textNPC = 'Спасибо за твою помощь!';
	}*/
	    }elseif($npc == 143 && $answer == 20 && item_isset(437,100)){
	$textNPC = 'Ух-ты какая ТМ-Атака. Поздравляю тебя! Спасибо за участие!';	
		minus_item(100,437);
	  	plus_item(1,1011);
	  	quest_update(143,8,0);
        }elseif($npc == 143 && $answer == 21 && item_isset(437,100)){
	$textNPC = 'Ух-ты какая ТМ-Атака. Поздравляю тебя! Спасибо за участие!';	
		minus_item(100,437);
	  	plus_item(1,1036);
	  	quest_update(143,8,0);
	  	}elseif($npc == 143 && $answer == 22 && item_isset(437,100)){
	$textNPC = 'Ух-ты какая ТМ-Атака. Поздравляю тебя! Спасибо за участие!';	
		minus_item(100,437);
	  	plus_item(1,1050);
	  	quest_update(143,8,0);
	  	}elseif($npc == 143 && $answer == 23 && item_isset(437,100)){
	$textNPC = 'Ух-ты какая ТМ-Атака. Поздравляю тебя! Спасибо за участие!';	
		minus_item(100,437);
	  	plus_item(1,1019);
	  	quest_update(143,8,0);
	  	}elseif($npc == 143 && $answer == 24 && item_isset(437,100)){
	$textNPC = 'Ух-ты какая ТМ-Атака. Поздравляю тебя! Спасибо за участие!';	
		minus_item(100,437);
	  	plus_item(1,1006);
	  	quest_update(143,8,0);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 