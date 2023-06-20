<?php #Бридж
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Тимми';
$prov_pok1 = $mysqli->query("SELECT id FROM `user_pokemons` WHERE `active` = '1' and `basenum` = '193' and `character` = '22' and `lvl` = '50' and `user_id` = '".$user_id."'")->fetch_assoc();
if($npc == 87 && empty($answer)){
	if(!info_quest(87,'step')){
		$textNPC = '<sub>*хнык-хнык*</sub>';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Опять?! Почему ты плачешь?</a></li>';
	}elseif(info_quest(87,'step') == 1){
		$textNPC = 'Ты принес нужных покемонов?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да, держи!</a></li>';
	}else{
		$textNPC = 'Спасибо за помощь! Я этого никогда не забуду!';
	}
}elseif($npc == 87 && $answer == 1){
	if(!info_quest(87,'step')){
		$textNPC = 'Потому что мы не успеваем...';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Кто тебе сказал? Мы успеем!</a></li>';
	}elseif(info_quest(87,'step') == 1){
		if($prov_pok1['id']){
			$textNPC = 'Спасибо! Я побежал их качать! Держи: Cкобовое Кольцо х1 и Набор тренировки х2. Встретимся завтра!';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Удачи!</a></li>';
			$mysqli->query('DELETE FROM user_pokemons WHERE id = '.$prov_pok1['id']);
			plus_item(2,330);
			plus_item(1,42);
			minus_item(25,173);
			quest_update(87,2);
		}else{
			$textNPC = 'Тут нет нужных мне покемонов! Напоминаю, мне нужны Скромная #193 Yanma 50-lvl, а также 25 Лечебной травы.';
			$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Извини за беспокойствие.</a></li>';
		}
	}
}elseif($npc == 87 && $answer == 2){
	if(!info_quest(87,'step')){
		$textNPC = 'Точно?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Да, я сделаю все чтобы ты успел.</a></li>';
	}
}elseif($npc == 87 && $answer == 3){
	if(!info_quest(87,'step')){
		$textNPC = 'Хорошо! Тогда слушай мой план внимательно!';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">...</a></li>';
	}
}elseif($npc == 87 && $answer == 4){
	if(!info_quest(87,'step')){
		$textNPC = 'Мне нужна Скромная #193 Yanma 50-lvl, а также 25 Лечебной травы.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=4&map=1">Хорошо, я побежал на поиски!</a></li>';
		quest_update(87,1);
	}
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
}
?>