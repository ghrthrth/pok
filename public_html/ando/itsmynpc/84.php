<?php #Стефани
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Доктор Кватч';
if($npc == 84 && empty($answer) && !info_quest(82,'step')){
	$textNPC = 'Добрый день. Что-то хотели?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Здравствуйте, нет просто мимо проходил.</a></li>';
}elseif($npc == 84 && empty($answer) && info_quest(82,'step') == 3){
	if(!item_isset(173, 11)){
		$textNPC = 'Напоминаю, что мне нужно Лечебная трава х11.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Да, я этим занимаюсь.</a></li>';
	}elseif(item_isset(173, 11)){
		$textNPC = 'Спасибо за помощь, держи, ты заслужил Травяной камень х1... А, кстати, Мистер Букер сейчас в Горном тоннеле, изучает поведение покемонов в глубоких пещерах.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Большое спасибо. Удачи.</a></li>';
		minus_item(11,173);
		plus_item(1,133);
	   quest_update(82,4);
	}else{
		$textNPC = 'Напоминаю, что мне нужно Лечебная трава х11.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Да, я этим занимаюсь.</a></li>';
	}
}elseif($npc == 84 && empty($answer) && info_quest(82,'step') == 2){
	$textNPC = 'Добрый день. Что-то хотели?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте, это вы Мистер Кватч?</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Нет, извините.</a></li>';
}elseif($npc == 84 && $answer == 1  && info_quest(82,'step') == 2){
	$textNPC = 'Да, а что?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Я ищу Мистера Букера,</a></li>';
}elseif($npc == 84 && $answer == 2  && info_quest(82,'step') == 2){
	$textNPC = 'Мистер Букер сейчас очень занят... О, пока он занят можешь помочь мне в одном деле? Я изучаю поведение Нидорины и Нидорино и у мне нужна Лечебная трава х11, чтобы узнать как действуют ее лечебные свойства на ядовитых покемонов.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Хорошо, я берусь за это дело, пока Мистер Букер занят. Скоро буду!</a></li>';
}elseif($npc == 84 && $answer == 3  && info_quest(82,'step') == 2){
	$textNPC = 'Жду твоей помощи, а пока я буду дальше наблюдать за покемонами.';
	quest_update(82,3);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 