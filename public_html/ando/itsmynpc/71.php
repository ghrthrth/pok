<?php 
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Веселый Клоун';
if($npc == 71 && empty($answer)){
	$textNPC = 'Стоп! Это ты один из тех новеньких в честь которых мы готовим вечеринку?';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Да... *собираетесь с мыслями* Да, я недавно перебрался в Джото с Оранжевых Остров. А вы готовите вечеринку?</a></li>';
}elseif($npc == 71 && $answer == 1){
	$textNPC = 'Да тихо ты! Да, мы готовим вечеринку, но, прошу, никому не говори о ней.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">Окей. А что случилось? Почему на вас нет лица?</a></li>';
}elseif($npc == 71 && $answer == 2){
	$textNPC = 'Дело вот в чем, противные Венонаты, которые так любят шерстяные изделия, прогрызли мешки в которых были синие шарики наполненные гелием. Так вот, все шарики осободились и вылетели наружу, из-за того что Мистер Майм не закрыл окна на складе. Сейчас мы не знаем что делать, вот бы нашелся тот кто поможет найти все шарики...  ';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Хорошо, я постараюсь найти парочку.</a></li>';
}elseif($npc == 71 && $answer == 3){
	$textNPC = 'Спасибо огромное! Тогда я побежал репетировать развлекательную программу.';
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 