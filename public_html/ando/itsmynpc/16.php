<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Содзи';
if($npc == 16 && empty($answer) && !info_quest(2,'step')){
	$textNPC = 'Добрый день. Что-то хотели?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Здравствуйте, нет просто мимо проходил.</a></li>';
}elseif($npc == 16 && empty($answer) && info_quest(2,'step') == 2){
	if(!item_isset(173, 10) && !item_isset(274, 5) && !item_isset(275, 3)){
		$textNPC = 'Напоминаю, что тебе нужно принести 10 лечебной травы, 3 соты мёда и 5 гроздей винограда.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Да, я этим занимаюсь.</a></li>';
	}elseif(item_isset(173, 10) && item_isset(274, 5) && item_isset(275, 3)){
		$textNPC = 'Большое спасибо! Ты очень помог мне! Как я и говорила, в долгу я не люблю оставаться. Это должно помочь тебе с покемонами.<br />
					Получено: Кредит х50000, Именной бланк х1, Гритбол х10';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Большое спасибо.</a></li>';
		minus_item(10,173);
		minus_item(5,274);
		minus_item(3,275);
		plus_item(50000,1);
		plus_item(1,160);
		plus_item(10,61);
		quest_update(2,3,1);
	}else{
		$textNPC = 'Напоминаю, что тебе нужно принести 10 лечебной травы, 3 соты мёда и 5 гроздей винограда.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Да, я этим занимаюсь.</a></li>';
	}
}elseif($npc == 16 && empty($answer) && info_quest(2,'step') == 1){
	$textNPC = 'Добрый день. Что-то хотели?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да, я недавно заглядывал в бар и бармен поделился, что вам нужна помощь.</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Нет, извините.</a></li>';
}elseif($npc == 16 && $answer == 1  && info_quest(2,'step') == 1){
	$textNPC = 'Да совершенно верно.. Недавно я хотела открыть питомник, но не знаю как собрать покемонов, так как не являюсь тренером. Посоветовавшись с профессором в Канто я узнала, что покемонов лучше приманивать на поке-еду. Но чтобы приготовить его мне нужны некоторые ингридиенты. Как думаешь, сможешь мне помочь собрать их?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Конечно! А для чего я становился тренером!</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Нет, извините.</a></li>';
}elseif($npc == 16 && $answer == 2  && info_quest(2,'step') == 1){
	$textNPC = 'Отлично! Мне требуется 10 листов лечебной травы , 3 соты мёда и 5 гроздей винограда. Лечебную траву ты сможешь получить из Оддиша, мёд из Бидрилл и виноград из Манки. Как найдешь все приходи, я не останусь в долгу!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Все, я побежал!</a></li>';
}elseif($npc == 16 && $answer == 3  && info_quest(2,'step') == 1){
	$textNPC = 'Удачи!';
	quest_update(2,2);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 