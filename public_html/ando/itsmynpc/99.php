<?php #Стефани
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Ценитель древностей';
if($npc == 99 && empty($answer) && !info_quest(97,'step')){
	$textNPC = 'Здраствуй! Есть интересные предметы на продажу?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Нет, я спешу.</a></li>';
}elseif($npc == 99 && empty($answer) && info_quest(97,'step') == 6){
	if(!item_isset(325, 1)){
		$textNPC = 'Ты доставил Посылку?';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Нет, я этим занимаюсь.</a></li>';
	}elseif(item_isset(325, 1)){
		$textNPC = 'Хорошая работа, забирай свою Статуэтку в форме Лапраса х1.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Большое спасибо.</a></li>';
		minus_item(1,325);
        plus_item (1,327);
	   quest_update(97,7);
	}
}elseif($npc == 99 && empty($answer) && info_quest(97,'step') == 2){
	$textNPC = 'Есть интересные предметы на продажу?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Статуэтка в форме Лапраса у Вас?</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Нет, я спешу.</a></li>';
}elseif($npc == 99 && $answer == 1  && info_quest(97,'step') == 2){
	$textNPC = 'Что? Да, у меня, а ты кто?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">У вас украденная статуэтка! Отдайте ее мне!</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Ничего... *Вспомнив что данный персонаж имеет дело с Командой R, вы решаете сбежать?*</a></li>';
}elseif($npc == 99 && $answer == 2  && info_quest(97,'step') == 2){
	$textNPC = 'С чего это я должен тебе ее отдавать? Я купил ее за кровнозаработанные деньги!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Я офицер полиции Эйстар Сити! Отдавайте статуэтку!</a></li>';
}elseif($npc == 99 && $answer == 3  && info_quest(97,'step') == 2){
	$textNPC = 'Малыш, кого ты хочешь напугать? Если тебе так нужна эта статуэтка, то помоги мне доставить Посылку х1 моему близкому другу, который живет в Восточном Джото - Стьюарту.';
		$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Эх... Хорошо...</a></li>';
	plus_item (1,322);	
	quest_update(97,3);
}elseif(item_isset(322, 1)){
	$textNPC = 'Ты доставил посылку?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Нет, я этим занимаюсь.</a></li>';	
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 