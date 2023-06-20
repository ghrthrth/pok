<?php #Стефани
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Продавец Акссесуаров';
if($npc == 141 && empty($answer)){
	if(!item_isset(437, 1)){
		$textNPC = 'У вас нет самоцветов!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Да? А я и не заметил, простите.</a></li>';
	}elseif(item_isset(437, 1) && !info_quest(141,'step') == 8){
     $textNPC = 'Спасибо за участие в ивенте! Выбирайте из данных предметов 2. Цена им всем 50 самоцветов.';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Я выбираю Электрайзер.</a></li>'; //304
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Я выбираю Кусок ткани.</a></li>'; //307
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Я выбираю Протектор.</a></li>'; //302
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=5&map=1">Я выбираю Магмарайзер.</a></li>'; //305
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=6&map=1">Я выбираю Сияющий камень.</a></li>'; //246
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=7&map=1">Я выбираю Камень сумрака.</a></li>'; //247
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=8&map=1">Я выбираю Овальный камень.</a></li>'; //251
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=9&map=1">Я выбираю Камень Рассвета.</a></li>'; //253
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=10&map=1">Я выбираю Режущий клык.</a></li>'; //306
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=11&map=1">Я выбираю Режущий коготь.</a></li>'; //303
	}elseif (info_quest(141,'step') == 8){
		$textNPC = 'Выбирайте второй предмет! Цена им так же всем 50 самоцветов.';
    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=20&map=1">Я выбираю Электрайзер.</a></li>'; //304
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=21&map=1">Я выбираю Кусок ткани.</a></li>'; //307
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=22&map=1">Я выбираю Протектор.</a></li>'; //302
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=23&map=1">Я выбираю Магмарайзер.</a></li>'; //305
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=24&map=1">Я выбираю Сияющий камень.</a></li>'; //246
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=25&map=1">Я выбираю Камень сумрака.</a></li>'; //247
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=26&map=1">Я выбираю Овальный камень.</a></li>'; //251
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=27&map=1">Я выбираю Камень Рассвета.</a></li>'; //253
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=28&map=1">Я выбираю Режущий клык.</a></li>'; //306
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=29&map=1">Я выбираю Режущий коготь.</a></li>'; //303
	}
	/*}elseif (info_quest(141,'step') == 8){
		$textNPC = 'Спасибо за твою помощь!';
	}*/
}elseif($npc == 141 && $answer == 2 && item_isset(437,50)){
	$textNPC = 'Держи. Ты можешь приобрести ещё один, если нужно - обратись ко мне ещё раз!';	
		minus_item(50,437);
	  	plus_item(1,304);
	  	quest_update(141,8,0);
}elseif($npc == 141 && $answer == 3 && item_isset(437,50)){
	$textNPC = 'Держи. Ты можешь приобрести ещё один, если нужно - обратись ко мне ещё раз!';	
		minus_item(50,437);
	  	plus_item(1,307);
	  	quest_update(141,8,0);
	  	}elseif($npc == 141 && $answer == 4 && item_isset(437,50)){
	$textNPC = 'Держи. Ты можешь приобрести ещё один, если нужно - обратись ко мне ещё раз!';	
		minus_item(50,437);
	  	plus_item(1,302);
	  	quest_update(141,8,0);
	  	}elseif($npc == 141 && $answer == 5 && item_isset(437,50)){
	$textNPC = 'Держи. Ты можешь приобрести ещё один, если нужно - обратись ко мне ещё раз!';	
		minus_item(50,437);
	  	plus_item(1,305);
	  	quest_update(141,8,0);
	  	}elseif($npc == 141 && $answer == 6 && item_isset(437,50)){
	$textNPC = 'Держи. Ты можешь приобрести ещё один, если нужно - обратись ко мне ещё раз!';	
		minus_item(50,437);
	  	plus_item(1,246);
	  	quest_update(141,8,0);
	  	}elseif($npc == 141 && $answer == 7 && item_isset(437,50)){
	$textNPC = 'Держи. Ты можешь приобрести ещё один, если нужно - обратись ко мне ещё раз!';	
		minus_item(50,437);
	  	plus_item(1,247);
	  	quest_update(141,8,0);
	  	}elseif($npc == 141 && $answer == 8 && item_isset(437,50)){
	$textNPC = 'Держи. Ты можешь приобрести ещё один, если нужно - обратись ко мне ещё раз!';	
		minus_item(50,437);
	  	plus_item(1,251);
	  	quest_update(141,8,0);
	  	}elseif($npc == 141 && $answer == 9 && item_isset(437,50)){
	$textNPC = 'Держи. Ты можешь приобрести ещё один, если нужно - обратись ко мне ещё раз!';	
		minus_item(50,437);
	  	plus_item(1,253);
	  	quest_update(141,8,0);
	  	}elseif($npc == 141 && $answer == 10 && item_isset(437,50)){
	$textNPC = 'Держи. Ты можешь приобрести ещё один, если нужно - обратись ко мне ещё раз!';	
		minus_item(50,437);
	  	plus_item(1,306);
	  	quest_update(141,8,0);
	  	}elseif($npc == 141 && $answer == 11 && item_isset(437,50)){
	$textNPC = 'Держи. Ты можешь приобрести ещё один, если нужно - обратись ко мне ещё раз!';	
		minus_item(50,437);
	  	plus_item(1,303);
	  	quest_update(141,8,0);
	  }elseif($npc == 141 && $answer == 20 && item_isset(437,50)){
	$textNPC = 'Спасибо еще раз за участие! Удачи!';	
		minus_item(50,437);
	  	plus_item(1,304);
	  	quest_update(141,9,0);
}elseif($npc == 141 && $answer == 21 && item_isset(437,50)){
	$textNPC = 'Спасибо еще раз за участие! Удачи!';	
		minus_item(50,437);
	  	plus_item(1,307);
	  	quest_update(141,9,0);
	  	}elseif($npc == 141 && $answer == 22 && item_isset(437,50)){
	$textNPC = 'Спасибо еще раз за участие! Удачи!';	
		minus_item(50,437);
	  	plus_item(1,302);
	  	quest_update(141,9,0);
	  	}elseif($npc == 141 && $answer == 23 && item_isset(437,50)){
	$textNPC = 'Спасибо еще раз за участие! Удачи!';	
		minus_item(50,437);
	  	plus_item(1,305);
	  	quest_update(141,9,0);
	  	}elseif($npc == 141 && $answer == 24 && item_isset(437,50)){
	$textNPC = 'Спасибо еще раз за участие! Удачи!';	
		minus_item(50,437);
	  	plus_item(1,246);
	  	quest_update(141,9,0);
	  	}elseif($npc == 141 && $answer == 25 && item_isset(437,50)){
	$textNPC = 'Спасибо еще раз за участие! Удачи!';	
		minus_item(50,437);
	  	plus_item(1,247);
	  	quest_update(141,9,0);
	  	}elseif($npc == 141 && $answer == 26 && item_isset(437,50)){
	$textNPC = 'Спасибо еще раз за участие! Удачи!';	
		minus_item(50,437);
	  	plus_item(1,251);
	  	quest_update(141,9,0);
	  	}elseif($npc == 141 && $answer == 27 && item_isset(437,50)){
	$textNPC = 'Спасибо еще раз за участие! Удачи!';	
		minus_item(50,437);
	  	plus_item(1,253);
	  	quest_update(141,9,0);
	  	}elseif($npc == 141 && $answer == 28 && item_isset(437,50)){
	$textNPC = 'Спасибо еще раз за участие! Удачи!';	
		minus_item(50,437);
	  	plus_item(1,306);
	  	quest_update(141,9,0);
	  	}elseif($npc == 141 && $answer == 29 && item_isset(437,50)){
	$textNPC = 'Спасибо еще раз за участие! Удачи!';	
		minus_item(50,437);
	  	plus_item(1,303);
	  	quest_update(141,9,0);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 