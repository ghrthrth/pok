<?php #Стефани
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Стюарт';
if($npc == 100 && empty($answer) && !info_quest(97,'step')){
	$textNPC = 'Добрый день, вы кто?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Извините, проходил мимо.</a></li>';
}elseif($npc == 100 && empty($answer) && info_quest(97,'step') == 4){
	if(!item_isset(323, 5) && !item_isset(324, 5)){
		$textNPC = 'Напоминаю, мне нужны Каменные пластины х5 и Металлические пластины х5.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Да, я этим занимаюсь.</a></li>';
	}elseif(item_isset(323, 5) && item_isset(324, 5)){
		$textNPC = 'Спасибо, передай это Письмо х1 Ценителю..';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Хорошо</a></li>';
		minus_item(5,323);
		minus_item(5,324);
        plus_item (1,325);
	   quest_update(97,6);
	}
}elseif($npc == 100 && empty($answer) && info_quest(97,'step') == 3){
	$textNPC = 'Добрый день, вы кто?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Вам посылка от Ценителя древостей.</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Извините, проходил мимо.</a></li>';
}elseif($npc == 100 && $answer == 1  && info_quest(97,'step') == 3){
	$textNPC = 'Спасибо, мне кое что тоже нужно ему передать.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Грр... Давайте сюда!</a></li>';
}elseif($npc == 100 && $answer == 2  && info_quest(97,'step') == 3){
	$textNPC = 'Вот держ... А ты можешь мне помочь немного?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Только если быстро.</a></li>';
}elseif($npc == 100 && $answer == 3  && info_quest(97,'step') == 3){
	$textNPC = 'Принеси мне Каменные пластины х5 и Металлические пластины х5.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Эх... Хорошо...</a></li>';
    minus_item (1,322);
	quest_update(97,4);
}elseif(item_isset(325, 1)){
	$textNPC = 'Ты доставил письмо?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Нет, я этим занимаюсь.</a></li>';		
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 