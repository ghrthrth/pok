<?php #Бридж
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Ветеринар';
$checktime = $mysqli->query('SELECT time_joto_quest FROM user_quests WHERE `quest_id` = 157 AND `user_id` = '.$_SESSION['user_id'].'')->fetch_assoc();
$time_quest = time() + 950400;
$time_now = time();
$randomdrugs = rand(1,6);
		if($randomdrugs == 1){ $drug = 10; }
		if($randomdrugs == 2){ $drug = 59; }
		if($randomdrugs == 3){ $drug = 39; }
		if($randomdrugs == 4){ $drug = 24; }
		if($randomdrugs == 5){ $drug = 23; }
		if($randomdrugs == 6){ $drug = 11; }
if($npc == 157 && empty($answer)){
	if(!info_quest(157,'step')){
		$textNPC = 'Где же эти травы... Неужели они где - то выпали?...';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте! У вас что - то случилось? </a></li>';
	}elseif(info_quest(157,'step') == 2 and $checktime['time_joto_quest'] <= $time_now){
  	    $textNPC = 'Оу, ты вернулся! И так, как я и говорила, Милтанкам нужно снова провести процедуру лечения. Ты готов? Помнишь условия?';
  	    $moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=5&map=1">Можете напомнить?</a></li>';
	}elseif(info_quest(157,'step') == 1){
		$textNPC = 'Ты уже собрал траву?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да, держите!</a></li>';
	}else{
		$textNPC = 'Помни, что скоро нужно будет повторить процедуру. Было бы очень неплохо, если ты ещё поможешь Милтанкам.';
	}
}elseif($npc == 157 && $answer == 1){
	if(!info_quest(157,'step')){
		$textNPC = 'Что? А, здравствуй. Нет, всё в порядке, а что ты тут делаешь?.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Мне давно хотелось посетить знаменитую ферму Джотто, посмотреть на Милтанков и попробовать местный десерт из молока этих милых покемонов, но тут увидел вас и выглядите вы как-то обеспокоенно. Может, я могу вам чем-то помочь?</a></li>';
}elseif(info_quest(157,'step') == 1){
		if(item_isset(173,70)){
			if(mt_rand(1,100)){
				$randomaward = rand(1,3);
				if($randomaward == 1){
				$textNPC = 'В самом деле! Не передать, насколько сильно я тебе благодарна! Вот, держи, это поможет тебе в твоём пути тренера! Если тебе не сложно - вернись через несколько дней сюда, возможно твоя помощь снова потребуется. Минздравпок в этот раз выделил тебе вот такую награду: Кредиты х500.000, Случайные витамины х20 и Наборы Тренировок х5!';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">До свидания!</a></li>';
			$mysqli->query("UPDATE user_quests SET `time_joto_quest` = '".$time_quest."' WHERE quest_id = '157' AND user_id = '".$_SESSION['user_id']."'");
			minus_item(70,173);
			plus_item(500000,1);
			plus_item(20,$drug);
			plus_item(5,330);
			quest_update(157,2);
				}
				if($randomaward == 2){
					$textNPC = 'В самом деле! Не передать, насколько сильно я тебе благодарна! Вот, держи, это поможет тебе в твоём пути тренера! Если тебе не сложно - вернись через несколько дней сюда, возможно твоя помощь снова потребуется. Минздравпок в этот раз выделил тебе вот такую награду: Скобовое кольцо и Самодельные сканеры х2!';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">До свидания!</a></li>';
			$mysqli->query("UPDATE user_quests SET `time_joto_quest` = '".$time_quest."' WHERE quest_id = '157' AND user_id = '".$_SESSION['user_id']."'");
			minus_item(70,173);
			plus_item(1,42);
			plus_item(2,185);
			quest_update(157,2);
				}
				if($randomaward == 3){
					$textNPC = 'В самом деле! Не передать, насколько сильно я тебе благодарна! Вот, держи, это поможет тебе в твоём пути тренера! Если тебе не сложно - вернись через несколько дней сюда, возможно твоя помощь снова потребуется. Минздравпок в этот раз выделил тебе вот такую награду: Наборы Тренировок х10, Кредиты х200.000 и Ванильная конфета x20!';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">До свидания!</a></li>';
			$mysqli->query("UPDATE user_quests SET `time_joto_quest` = '".$time_quest."' WHERE quest_id = '157' AND user_id = '".$_SESSION['user_id']."'");
			minus_item(70,173);
			plus_item(10,330);
			plus_item(200000,1);
			plus_item(15,309);
			quest_update(157,2);
				}
			}
		}else{
			$textNPC = 'У тебя не хватает. Напоминаю, что мне нужно 70 побегов Лечебной травы. Их можно добыть с диких Одишей.';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Простите, что - то я немного просчитался.</a></li>';
		}
	}
}elseif($npc == 157 && $answer == 2){
	if(!info_quest(157,'step')){
		$textNPC = 'Понятно. Такое дело, недавно ферме пришлось пережить возможно свои самые тяжёлые дни - весной всё поголовье Милтанков заразилось какой-то хворью, идентифицировать которую не вышло. К счастью, все покемоны успешно переболели и теперь идут на поправку, но теперь появилась другая проблема - для реабилитации Милтанкам необходима Лечебная Трава в особо крупном количестве и я в самом деле не знаю где взять столько...';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Не беда! Я вам помогу! Сколько требуется Лечебной Травы?</a></li>';
	}
}elseif($npc == 157 && $answer == 3){
	if(!info_quest(157,'step')){
		$textNPC = 'Необходимо 70 побегов.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Хорошо, я найду вам!</a></li>';
	}
}elseif($npc == 157 && $answer == 4){
	if(!info_quest(157,'step')){
		$textNPC = 'Поголовье Милтанков будет очень рады этому! Лечебную траву можно добыть с диких Одишей.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Да, я знаю. Спасибо!</a></li>';
		quest_update(157,1);
	}
}elseif($npc == 157 && $answer == 5){
	if(info_quest(157,'step') == 2){
		$textNPC = 'Нужно 70 побегов Лечебной травы. Добыть их так же можно с диких Одишей. Запомнил?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Да, Спасибо!</a></li>';
		quest_update(157,1);
	}
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?>