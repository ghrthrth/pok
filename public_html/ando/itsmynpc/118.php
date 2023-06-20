<?php #Фред Сваровски
// 10.05.19 by wterh
// Проверка существования элементов
$npc    = array_key_exists('npc_id',$_GET)?obr_chis($_GET['npc_id']):'';
$answer = array_key_exists('answ_id',$_GET)?obr_chis($_GET['answ_id']):'';
$nameNPC = 'Строитель';
if($npc == 118 && empty($answer) && info_quest(117,'step') == 1){
	$textNPC = 'Не мешай стройке!';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=1&map=1">Извините, мне подсказали что вы можете помочь разобрать завал, который перекрывает тропу к берегу.</a></li>';
}elseif($npc == 118 && $answer == 1){
	$textNPC = 'У меня нет достаточно времени, я должен закончить стройку.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=2&map=1">А есть другие варианты?</a></li>';
	$moveNPC .= '<li id="txt"><a href="game.php?fun=m_location&map=1">Ну и работайте тут дальше!</a></li>';
}elseif($npc == 118 && $answer == 2){
	$textNPC = 'Разобрать завал можно с помощью #112 Rhydon 100-lvl, но на это потребуется время, около 30 минут.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_npc&npc_id='.$npc.'&answ_id=3&map=1">Спасибо за совет, а у вас есть этот покемон?</a></li>';
}elseif($npc == 118 && $answer == 3){
	$textNPC = 'Нет, но ты можешь встретить его на о. Селене.';
	$moveNPC = '<li id="txt"><a href="game.php?fun=m_location&map=1">Спасибо за совет!</a></li>';
	quest_update(117,2);
}elseif($npc == 118 && empty($answer)){
    $textNPC = 'Не мешай стройке!';	
}else{
	 die("<script>parent._location.location='game.php?fun=m_location&map=1';</script>");
 }
?> 