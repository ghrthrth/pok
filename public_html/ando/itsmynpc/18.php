<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Иследователь воды';
if($npc == 18 && empty($answer)){
	if(info_quest(3,'step') == 5 && item_isset(102,1)){
		$textNPC = 'Ты уже выполнил мое поручение?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да, держите.</a></li>';	
	}else{
		$textNPC = 'Хмммм. В этом озере кислорода в воде больше чем в соседнем. Хммм..';	
	}
	if(info_quest(3,'step') == 1){
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Эммм ,здравствуйте ,а чем вы тут занимаетесь?</a></li>';
	}
}elseif($npc == 18 && $answer == 1){
	if(info_quest(3,'step') == 5){
		$textNPC = 'Отлично. Итак . Я слышал о Старом мудреце, который однажды нашел дорогу туда, пещера где он живет находиться где то между скалами, это все что я знаю…О чуть не забыл, держи за старание.<br>
		<li>Получено: Самодельный сканер х1</li>';
		plus_item(185,1);
		quest_update(3,6);
	}else{
		$textNPC = 'Я исследую качество воды по всем регионам для Исследовательской Лаборатории Водных покемонов и знаете ли мой Сканер Воды сломался так не во время, что теперь мне приходиться все делать в ручную а у меня отчеты висят…';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Вы исследователь, а вы слышали что-нибудь о Хрустальном озере???</a></li>';
	}
}elseif($npc == 18 && $answer == 2){
	$textNPC = 'Я исследователь воды и в мою работу входит путешествовать по всем регионам. Я слышал о Старом мудреце, который однажды нашел дорогу туда…но у меня совершенно нету времени. Хотя если ты поможешь мне починить мой Сканер я расскажу тебе все что знаю…';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Я согласен!</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Нет уж, чините сами.<sub>[Уйти]</sub>.</a></li>';
}elseif($npc == 18 && $answer == 3){
	$textNPC = 'Вот держи. Я слышал в Старом районе есть мастерская ,думаю там смогут его починить.';
	plus_item(35,100);
	quest_update(3,2);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?>