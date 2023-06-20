<?php #Стефани
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Миссис Букер';
if($npc == 83 && empty($answer) && !info_quest(82,'step')){
	$textNPC = 'Добрый день. Что-то хотели?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Здравствуйте, нет, просто мимо проходил.</a></li>';
}elseif($npc == 83 && empty($answer) && info_quest(82,'step') == 1){
	$textNPC = 'Добрый день. Что-то хотели?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Здравствуйте, я ищу информацию об известных иследователях и специалистах в области покемонов, возможно, вы обладаете какой-то информацией?</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Здравствуйте, нет, просто мимо проходил.</a></li>';
}elseif($npc == 83 && $answer == 1  && info_quest(82,'step') == 1){
	$textNPC = 'Я жена Мистера Букера, одного успешного ученого и иследователя.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Отлично! Могу ли я с ним поговорить?</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Попробую найти специалиста получше...</a></li>';
}elseif($npc == 83 && $answer == 2  && info_quest(82,'step') == 1){
	$textNPC = 'К сожалению, он сейчас в Канто и я не могу с ним связаться. Попробуй найти его напарника Доктора Кватча в Канто.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Хорошо, спасибо за информацию!</a></li>';
}elseif($npc == 83 && $answer == 3  && info_quest(82,'step') == 1){
	$textNPC = 'Удачи, берегите себя!';
	quest_update(82,2);
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 